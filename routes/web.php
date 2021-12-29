<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\CustomUsersController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\HallsController;
use App\Http\Controllers\SpecialEventsController;
use App\Http\Controllers\ViewImageController;

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
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ], function () { //...

    Route::group(['middleware' => ['guest']], function () {
        Route::get('/', function () {
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

    Route::group(['middleware' => ['auth']], function () {

        Route::resource('roles', 'RoleController');

        Route::resource('users', 'UserController');

    });

    Route::resource('settings', '\App\Http\Controllers\SettingsController');

    Route::resource('menus', '\App\Http\Controllers\MenusController');

    Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');

//TODO :: Start Moomen Route
    Route::prefix('events')->group(function () {
        Route::get('/', [EventsController::class, 'index'])->name('events');
        Route::get('/table', [EventsController::class, 'table'])->name('events.table');
        Route::get('/fetch', [EventsController::class, 'fetch'])->name('events.fetch');
        Route::post('/create', [EventsController::class, 'create'])->name('events.create');
        Route::post('/update/{id}', [EventsController::class, 'update'])->name('events.update');
        Route::get('/users/{id}', [EventsController::class, 'eventUsers'])->name('events.users');
        Route::get('/show/{id}', [EventsController::class, 'show'])->name('events.show');
        Route::delete('/delete/{id}', [EventsController::class, 'destroy'])->name('events.delete');
        Route::post('/upload/image', [EventsController::class, 'upload_image'])->name('events.upload_image');
        Route::get('/{id}/sponsor/images', [EventsController::class, 'sponsor_image'])->name('events.sponsor_image');
        Route::delete('/sponsor/image/delete/{id}', [EventsController::class, 'sponsor_image_destroy'])->name('events.sponsor_image_destroy');

        /*New*/
        Route::get('/createevent', [EventsController::class, 'createevent'])->name('events.createevent');
        Route::post('/store', [EventsController::class, 'store'])->name('events.store');
        Route::get('/edit/{id}', [EventsController::class, 'edit'])->name('events.edit');
        Route::post('/updateevent/{id}', [EventsController::class, 'updateevent'])->name('events.updateevent');
    });

    Route::prefix('view_image')->group(function () {
        Route::get('/{image_link}', [ViewImageController::class, 'index'])->name('view_image');
    });

    Route::prefix('specialevents')->group(function () {
        Route::get('/', [SpecialEventsController::class, 'index'])->name('specialevents');
    });

    Route::prefix('halls')->group(function () {
        Route::get('/', [HallsController::class, 'index'])->name('halls');
        Route::get('/create', [HallsController::class, 'create'])->name('halls.create');
        Route::post('/store', [HallsController::class, 'store'])->name('halls.store');
        Route::get('/edit/{id}', [HallsController::class, 'edit'])->name('halls.edit');
        Route::post('/update/{id}', [HallsController::class, 'update'])->name('halls.update');
        Route::delete('/delete/{id}', [HallsController::class, 'destroy'])->name('halls.destroy');
    });

    Route::prefix('customusers/')->group(function () {
        Route::get('/agents/{type}', [CustomUsersController::class, 'index'])->name('customusers.agents');
        Route::get('/partners/{type}', [CustomUsersController::class, 'index'])->name('customusers.partners');
        Route::get('/managers/{type}', [CustomUsersController::class, 'index'])->name('customusers.managers');
        Route::get('/providers/{type}', [CustomUsersController::class, 'index'])->name('customusers.providers');
        Route::get('/edit/{id}', [CustomUsersController::class, 'edit'])->name('customusers.edit');
        Route::post('/update/agents/{id}', [CustomUsersController::class, 'update_agents'])->name('customusers.update_agents');
        Route::post('/update/partners/{id}', [CustomUsersController::class, 'update_partners'])->name('customusers.update_partners');
        Route::post('/update/managers/{id}', [CustomUsersController::class, 'update_managers'])->name('customusers.update_managers');
        Route::post('/update/providers/{id}', [CustomUsersController::class, 'update_providers'])->name('customusers.update_providers');
        Route::delete('/delete/{id}', [CustomUsersController::class, 'destroy'])->name('customusers.delete');
        Route::get('/create/agents', [CustomUsersController::class, 'create_agents'])->name('customusers.create.agents');
        Route::get('/create/partners', [CustomUsersController::class, 'create_partners'])->name('customusers.create.partners');
        Route::get('/create/managers', [CustomUsersController::class, 'create_managers'])->name('customusers.create.managers');
        Route::get('/create/providers', [CustomUsersController::class, 'create_providers'])->name('customusers.create.providers');
        Route::post('/store/agents', [CustomUsersController::class, 'store_agents'])->name('customusers.store.agents');
        Route::post('/store/partners', [CustomUsersController::class, 'store_partners'])->name('customusers.store.partners');
        Route::post('/store/managers', [CustomUsersController::class, 'store_managers'])->name('customusers.store.managers');
        Route::post('/store/providers', [CustomUsersController::class, 'store_providers'])->name('customusers.store.providers');
        Route::post('/upload/image', [CustomUsersController::class, 'upload_image'])->name('customusers.upload_image');
    });
    //TODO :: End Moomen Route


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



