<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\PostController;
use App\Http\Controllers\Auth\AssetController;
use App\Http\Controllers\Auth\EventController;
use App\Http\Controllers\Auth\StaffController;
use App\Http\Controllers\Auth\GalleryController;
use App\Http\Controllers\Auth\ServiceController;
use App\Http\Controllers\Auth\CarouselController;
use App\Http\Controllers\Auth\CategoryController;
use App\Http\Controllers\Auth\DownloadController;
use App\Http\Controllers\Auth\HomePageController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AboutPageController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\ContactPageController;
use App\Http\Controllers\Auth\DevotionController;
use App\Http\Controllers\Auth\MessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::controller(DashboardController::class)->group(function() {
    Route::get('dashboard', 'dashboard')->name('dashboard');

    // Contact
    Route::get('contact-forms', 'contactForms');
    Route::get('contact-forms/{id}', 'showForms');
    Route::get('contact-forms/{id}/delete', 'deleteForms');
    // Prayer request
    Route::get('prayer-forms', 'prayerRequestForms');
    Route::get('prayer-forms/{id}', 'showPrayerRequestForms');
    // Testimony
    Route::get('testimony-forms', 'testimonyForms');
    Route::get('testimony-forms/{id}', 'editTestimonyForms');
    Route::get('testimony-forms/edit/{id}', 'showTestimonyForms');
});

Route::controller(RegisterController::class)->group(function() {
    Route::post('register_user', 'register')->name('register_user');
    Route::get('users', 'index')->name('users');
    Route::get('user_edit/{id}', 'edit')->name('user_edit');
    Route::post('user_update/{id}', 'update')->name('user_update');
    Route::get('user_del/{id}', 'destroy')->name('user_del');
});

Route::resource('categories', CategoryController::class);
Route::get('categories/{categories}/delete', [CategoryController::class, 'destroy']);

Route::resource('my_assets', AssetController::class);
Route::get('my_assets/{my_assets}/delete', [AssetController::class, 'destroy']);

Route::resource('posts', PostController::class);
Route::get('posts/{posts}/delete', [PostController::class, 'destroy']);

Route::resource('galleries', GalleryController::class);
Route::get('galleries/{galleries}/delete', [GalleryController::class, 'destroy']);
Route::get('galleries/{galleries}/image', [GalleryController::class, 'destroyImage']);

Route::resource('contacts', ContactPageController::class);

Route::resource('about-us', AboutPageController::class);

Route::resource('my_uploads', DownloadController::class);
Route::get('my_uploads/{uploads}/delete', [DownloadController::class, 'destroy']);

Route::resource('events', EventController::class);
Route::get('events/{events}/delete', [EventController::class, 'destroy']);

Route::resource('staff', StaffController::class);
Route::get('staff/{staff}/delete', [StaffController::class, 'destroy']);

Route::resource('my_service', ServiceController::class);
Route::get('my_service/{my_service}/delete', [ServiceController::class, 'destroy']);

Route::resource('carousels', CarouselController::class);
Route::get('carousels/{carousels}/delete', [CarouselController::class, 'destroy']);

Route::resource('home-page', HomePageController::class);
Route::get('home-page/{home-page}/delete', [HomePageController::class, 'destroy']);

Route::resource('message', MessageController::class);
Route::get('message/{message}/delete', [MessageController::class, 'destroy']);

Route::resource('devotions', DevotionController::class);
Route::get('devotions/{devotions}/delete', [DevotionController::class, 'destroy']);

//Website

Route::controller(HomeController::class)->group(function(){
    // Home
    Route::get('/', 'index');
    // About
    Route::get('/about/brief_history', 'about');
    Route::get('/about/mission_vision', 'missionVision');
    Route::get('/about/rules_belief', 'rulesBelief');
    Route::get('/about/rules_conduct', 'rulesConduct');
    Route::get('/about/tenets', 'tenets');

    Route::get('directorate/{directorate}', 'baseDirectorate');
    Route::get('directorate/social_services/{directorate}', 'socialServices');

    // Contact
    Route::get('contact', 'contact');

    // Prayer Request
    Route::get('prayer_request', 'prayerRequest');

    // Gallery
    Route::get('media/gallery', 'gallery');
    Route::get('media/gallery/{group_id}', 'view_gallery');

    // Media
    Route::get('media/downloads/{downloads}', 'downloads');
    Route::get('media/messages/{messages}', 'messages');
    Route::get('media/download/{id}', 'downloadFile');
    Route::get('media/message/{id}', 'playMessages');

    Route::post('forms/contact', 'postForms');
    Route::post('forms/prayer_request', 'prayerRequestForms');
    Route::post('forms/testimony', 'testimoniesForms');


    // Post
    Route::get('media/news', 'news');
    Route::get('media/news/{news_id}', 'view_news');

    // Leadership
    Route::get('leadership/general_council', 'generalCouncil');
    Route::get('leadership/executives', 'executivesMembers');
    Route::get('leadership/council_apostles_prophets', 'councilApostlesProphets');
    Route::get('leadership/management_team', 'managementTeam');
    Route::get('leadership/former_leaders', 'formerLeaderships');
    Route::get('leadership/profile/{id}', 'profileOfLeadership');

    Route::get('event/calender', 'calender');
});

