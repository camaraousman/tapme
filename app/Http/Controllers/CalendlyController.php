<?php

namespace App\Http\Controllers;

use App\Models\Calendly;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CalendlyController extends Controller
{
    public function index(){
        return view('calendly.calendly', );
    }

    public function fetch_all(){
        return Calendly::where('user_id', Auth::id())->first();
    }

    public function store(Request $request){
        $request->validate([
            'url' => 'required',
            'english_text' => 'required|max:35'
        ]);

        $data = [];
        $data['user_id'] = Auth::id();

        if($request->has('french_text')){
            if($request->french_text != ''){
                $request->validate([
                    'french_text' => 'string|max:35'
                ]);

                $data['french_text'] = $request->french_text;
            }
        }

        DB::beginTransaction();
        try {
            $calendly = Calendly::where('user_id', Auth::id());
            if($calendly->exists())
                $calendly->delete();

            $data['english_text'] = $request->english_text;
            $data['url'] = $request->url;
            Calendly::create($data);
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json('Exception '.$e);
        }

        return response()->json([
            'status' => 1,
            'message' => ''.__('Updated successfully')
        ]);
    }
}
