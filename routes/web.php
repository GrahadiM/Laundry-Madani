<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SettingWebsiteController;

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

Route::group(['middleware' => ['xss']], function () {
    Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('fe.index');
    Route::get('/about', [App\Http\Controllers\FrontendController::class, 'about'])->name('fe.about');
    Route::get('/service', [App\Http\Controllers\FrontendController::class, 'service'])->name('fe.service');
    // Route::get('/service/{package:slug}', [App\Http\Controllers\FrontendController::class, 'service_detail'])->name('fe.service.detail');
    Route::get('/service/{id}', [App\Http\Controllers\FrontendController::class, 'service_detail'])->name('fe.service.detail');
    Route::get('/checkout/{id}', [App\Http\Controllers\FrontendController::class, 'checkout'])->name('fe.checkout');
    Route::post('/checkout_post', [App\Http\Controllers\FrontendController::class, 'checkout_post'])->name('fe.checkout.post');
    Route::get('/testimonial', [App\Http\Controllers\FrontendController::class, 'testimonial'])->name('fe.testimonial');
    Route::get('/history', [App\Http\Controllers\FrontendController::class, 'history'])->name('fe.history');
    Route::get('/history/{id}', [App\Http\Controllers\FrontendController::class, 'history_detail'])->name('fe.history_detail');

    Auth::routes([
        'login'    => true,
        'logout'   => true,
        'register' => true,
        'reset'    => false,   // for resetting passwords
        'confirm'  => false,  // for additional password confirmations
        'verify'   => false,  // for email verification
    ]);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::middleware(['auth'])->group(function() {
        Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
            Route::get('/', 'edit')->name('edit');
            Route::put('/', 'update')->name('update');
            Route::post('upload', 'upload')->name('upload');
            Route::put('password', 'password')->name('password');
        });
    });

    Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function() {
        Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
            Route::get('/', 'edit')->name('edit');
            Route::put('/', 'update')->name('update');
            Route::post('upload', 'upload')->name('upload');
            Route::put('password', 'password')->name('password');
        });

        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::resource('categories', CategoryController::class);

        Route::controller(SettingWebsiteController::class)->prefix('setting')->name('setting.')->group(function () {
            Route::get('website', 'index')->name('index');
            Route::put('website/{admin_website}', 'update')->name('update');
        });

        Route::get('/clear', function () {
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('config:cache');
            Artisan::call('view:clear');
            Artisan::call('optimize');

            return redirect()->back()->with('success', 'Cleared!');
        })->name('clear');
    });

    Route::get('switch_language/{language}', function ($lang) {
        if (! in_array($lang, config('app.available_locales'))) {
            abort(400);
        }
        // Save locale to session.
        request()->session()->put('lang', $lang);
        return redirect()->back();
    })->name('switch_language');
});
