<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CalendlyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\TranslationsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return redirect()->to('/dashboard');
});

//Route::get('/public/{id}', [PublicController::class, 'index']);
Route::post('phones', [PublicController::class, 'phones'])->name('public.phones');
Route::post('emails', [PublicController::class, 'emails'])->name('public.emails');
Route::post('addresses', [PublicController::class, 'addresses'])->name('public.addresses');
Route::post('socials', [PublicController::class, 'socials'])->name('public.socials');
Route::post('get_calendly', [PublicController::class, 'get_calendly'])->name('public.get_calendly');
Route::get('{id}_'.'export', [PublicController::class, 'export_vcard'])->name('export_vcard');

Route::post('send-mail', [ContactController::class, 'send_email'])->name('send-email');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
    Route::get('/barcode',[DashboardController::class, 'barcode'])->name('barcode');


    Route::get('/contacts',[ContactController::class, 'index'])->name('contacts');
    Route::post('/get_contact',[ContactController::class, 'get_contact'])->name('get_contact');

    Route::get('/media',[MediaController::class, 'index'])->name('media');
    Route::post('/upload_media_image',[MediaController::class, 'upload_media_image'])->name('upload_media_image');
    Route::post('/delete_media_image',[MediaController::class, 'delete_media_image'])->name('delete_media_image');



    Route::get('/calendly',[CalendlyController::class, 'index'])->name('calendly.index');
    Route::get('/calendly/fetch_all',[CalendlyController::class, 'fetch_all'])->name('calendly.fetch_all');
    Route::post('/calendly/store',[CalendlyController::class, 'store'])->name('calendly.store');

    Route::get('abouts', [AboutController::class, 'index'])->name('abouts.index');
    Route::post('abouts', [AboutController::class, 'store'])->name('abouts.store');

    Route::get('phones', [PhoneController::class, 'index'])->name('phones.index');
    Route::post('phones', [PhoneController::class, 'store'])->name('phones.store');

    Route::get('emails', [EmailController::class, 'index'])->name('emails.index');
    Route::post('emails', [EmailController::class, 'store'])->name('emails.store');

    Route::get('addresses', [AddressController::class, 'index'])->name('addresses.index');
    Route::post('addresses', [AddressController::class, 'store'])->name('addresses.store');

    Route::get('websites', [WebsiteController::class, 'index'])->name('websites.index');
    Route::post('websites', [WebsiteController::class, 'store'])->name('websites.store');

    Route::get('socials', [SocialController::class, 'index'])->name('socials.index');
    Route::post('socials', [SocialController::class, 'store'])->name('socials.store');


    Route::get('/profile', [AccountController::class, 'index'])->name('profile.edit');
    Route::get('/fetch_all', [AccountController::class, 'fetch_all'])->name('profile.fetch_all');
    Route::post('/upload', [AccountController::class, 'upload'])->name('profile.upload');
    Route::post('/profile', [AccountController::class, 'basic_info'])->name('profile.basic_info');
    Route::post('/update_password', [AccountController::class, 'update_password'])->name('profile.update_password');
    Route::post('/profile_choice', [AccountController::class, 'profile_choice'])->name('profile.profile_choice');
    Route::post('/language_choice', [AccountController::class, 'language_choice'])->name('profile.language_choice');

    Route::resource('/users', UserController::class);
});

Route::get('language_'.'{locale}', [LanguageController::class, 'index']);

Route::get('/{id}', [PublicController::class, 'index']);

