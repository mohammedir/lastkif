<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//بستخدم هاد الكود لو بدي احفظ اخر لغة كان فاتحها الشخص
    Auth::routes();



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function(){ //...

    Route::group(['middleware'=>['guest']],function (){
        Route::get('/', function()
        {
            return view('auth.login');
        });
    });

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::resource('slider', '\App\Http\Controllers\SliderController');
    Route::resource('pages', '\App\Http\Controllers\PagesController');
    Route::get('/edit_page/{id}', '\App\Http\Controllers\PagesController@edit');
    Route::resource('/update_page', '\App\Http\Controllers\PagesController');

    Route::resource('SEO-Page', '\App\Http\Controllers\SeoController');
    Route::resource('SEO-Page', '\App\Http\Controllers\SeoController');
    Route::resource('Halls-menu', '\App\Http\Controllers\SeoController');
    Route::resource('socialmedia', '\App\Http\Controllers\SocialmediaController');
    Route::resource('widgets', '\App\Http\Controllers\WidgetsTableController');
    Route::resource('getNotification', '\App\Http\Controllers\GetNotificatiosController');

    Route::get('export_getNotification', 'GetNotificatiosController@export');

    Route::get('/changeStatus', '\App\Http\Controllers\SliderController@changeSliderStatus')->name('changeStatus');

    Route::post('/addslider', '\App\Http\Controllers\SliderController@store')->name('addslider');

    Route::get('/changePageStatus', '\App\Http\Controllers\PagesController@changePageStatus')->name('changePageStatus');

    Route::get('pdf_getNotification', 'GetNotificatiosController@pdf');

    Route::group(['middleware' => ['auth']], function() {

        Route::resource('roles','RoleController');

        Route::resource('users','UserController');

    });

    Route::resource('settings','\App\Http\Controllers\SettingsController');

    Route::resource('menus','\App\Http\Controllers\MenusController');

    Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');





});




/*
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{*/

    /*Route::get('/', function()
    {
        return view('dashboard');
    });*/
    /*Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


    Route::resource('slider', '\App\Http\Controllers\SliderController');
    Route::resource('pages', '\App\Http\Controllers\PagesController');
    Route::resource('SEO-Page', '\App\Http\Controllers\SeoController');


});

Auth::routes();*/



