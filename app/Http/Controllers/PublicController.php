<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Address;
use App\Models\Calendly;
use App\Models\Email;
use App\Models\Media;
use App\Models\Phone;
use App\Models\Social;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use JeroenDesloovere\VCard\VCard;
use Symfony\Component\HttpFoundation\Response;

class PublicController extends Controller
{
    public function index($username){
        $user = User::where('username', $username);

        if(!$user->exists())
            abort(404);

        $user = $user->first();

        $data = $this->get_all($user['id']);
        $data['user'] = $user;

        if(!session()->has('locale')){
            App::setLocale($user['language']);
        }


        return view('public', $data);
    }

    public function phones(Request $request){
        $data = [];
        $phone_details = new PhoneController();

        $data['office_number'] = $phone_details->get_phones($request->user_id, 0);
        $data['mobile_number'] = $phone_details->get_phones($request->user_id, 1);

        return response()->json($data);
    }

    public function emails(Request $request){
        $data = [];
        $email_details = new EmailController();

        $data['office_email'] = $email_details->get_emails($request->user_id, 0);
        $data['personal_email'] = $email_details->get_emails($request->user_id, 1);

        return response()->json($data);
    }

    public function addresses(Request $request){
        $data = [];

        $address =  Address::where('user_id', $request->user_id)->first();

        if(!$address)
            return response()->json($data);

        $data['address_text'] = $address->address;
        $data['address_url'] = $address->url;
        $data['has_map'] = $address->has_map;

        return response()->json($data);
    }

    public function socials(Request $request){
        $social = Social::where('user_id', $request->id)->select('slug as key', 'url as value')->get();
        $array = json_decode(json_encode($social), true);

        return response()->json($array);
    }

    public function get_calendly(Request $request){
        $calendly = Calendly::where('user_id', $request->user_id);

        if($calendly->exists()){
            return response()->json([
               'calendly_exists' => 1,
               'url' => $calendly->first()->url,
               'english_text' => $calendly->first()->english_text,
               'french_text' => $calendly->first()->french_text,
            ]);
        }

        return response()->json([
            'calendly_exists' => 0,
        ]);
    }

    public function get_all($id){
        $phones = Phone::where('user_id', $id);
        $emails = Email::where('user_id', $id);
        $address = Address::where('user_id', $id);
        $socials = Social::where('user_id', $id);
        $websites = Website::where('user_id', $id);
        $about = About::where('user_id', $id);
        $images = Media::where('user_id', $id)->first();


        $data['phones_exists'] = $phones->exists() ? 1 : 0;
        $data['emails_exists'] = $emails->exists() ? 1 : 0;
        $data['addresses_exists'] = $address->exists() ? 1 : 0;
        $data['socials_exists'] = $socials->exists() ? 1 : 0;
        $data['websites_exists'] = $websites->exists() ? 1 : 0;
        $data['about_exists'] = $about->exists() ? 1 : 0;

        if($images->image_1 == null && $images->image_2 == null && $images->image_3 == null && $images->image_4 == null){
            $data['images_exists'] = 0;
        }else{
            $data['images_exists'] = 1;
        }


        $phones = $phones->get();
        $emails = $emails->get();
        $address = $address->get();
        $socials = $socials->get();
        $websites = $websites->get();
        $about = $about->get();

        $data['phones'] = $phones;
        $data['emails'] = $emails;
        $data['addresses'] = $address;
        $data['socials'] = $socials;
        $data['websites'] = $websites;
        $data['about'] = $about;
        $data['image_1'] = $images->image_1;
        $data['image_2'] = $images->image_2;
        $data['image_3'] = $images->image_3;
        $data['image_4'] = $images->image_4;

        return $data;
    }

    public function prepare_export($username){
        $data = [];
        $user = User::where('username', $username)->first();
        $id = $user->id;
        $first_name = $user->first_name;
        $last_name = $user->last_name;
        $title = $user->title;
        $position = $user->position;
        $company = $user->company;

        $user_details = $this->get_all($id);

        $data['first_name'] = $first_name;
        $data['last_name'] = $last_name;
        $data['title'] = $title;
        $data['position'] = $position;
        $data['company'] = $company;
        $data['phones'] = $user_details['phones'];
        $data['emails'] = $user_details['emails'];
        $data['addresses'] = $user_details['addresses'];
        $data['socials'] = $user_details['socials'];
        $data['websites'] = $user_details['websites'];

        return $data;
    }

    public function export_vcard($username){
        $data = $this->prepare_export($username);

        // define vcard
        $vcard = new VCard();

        // define variables
        $lastname = $data['last_name'];
        $firstname = $data['first_name'];

        // add personal data
        $vcard->addName($lastname, $firstname);

        // add work data
        $vcard->addCompany($data['company']);
        $vcard->addJobtitle($data['title']);
        $vcard->addRole($data['position']);

        foreach ($data['phones'] as $phone){
            if($phone['type'] == 0)
                $vcard->addPhoneNumber($phone['number'], 'PREF;WORK');
            else if ($phone['type'] == 1)
                $vcard->addPhoneNumber($phone['number']);
        }
        foreach ($data['emails'] as $email){
            if($email['type'] == 0)
                $vcard->addEmail($email['email'], 'PREF;WORK');
            else if($email['type'] == 1)
                $vcard->addEmail($email['email']);
        }

        foreach ($data['addresses'] as $address){
            $vcard->addAddress($address['address']);
        }
        foreach ($data['websites'] as $website){
            $vcard->addURL($website['url']);
        }

        $content = $vcard->getOutput();

        $response = new Response();
        $response->setContent($content);
        $response->setStatusCode(200);
        $response->headers->set('Content-Type', 'text/x-vcard');
        $response->headers->set('Content-Disposition', 'attachment; filename="'.$firstname.'.vcf"');
        $response->headers->set('Content-Length', mb_strlen($content, 'utf-8'));

        return $response;
    }
}
