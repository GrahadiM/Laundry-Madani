<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClothesController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\SettingWebsiteController;
use App\Http\Controllers\Admin\TransactionController;

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
    Route::controller(FrontendController::class)->name('fe.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/about', 'about')->name('about');
        Route::get('/service', 'service')->name('service');
        Route::get('/testimonial', 'testimonial')->name('testimonial');
        Route::middleware(['auth'])->group(function() {
            Route::get('/service/{package:slug}', 'service_detail')->name('service.detail');
            // Route::get('/service/{id}', 'service_detail')->name('service.detail');
            Route::get('/checkout/{package:slug}', 'checkout')->name('checkout');
            // Route::get('/checkout/{id}', 'checkout')->name('checkout');
            Route::post('/checkout_post', 'checkout_post')->name('checkout.post');
            Route::get('/checkout_clear', 'checkout_clear')->name('checkout.clear');
            Route::get('/history', 'history')->name('history');
            Route::get('/history/{id}', 'history_detail')->name('history_detail');
            Route::get('/clothes/{id}', 'clothes')->name('clothes');
            Route::post('/clothes_post', 'clothes_post')->name('clothes.post');
        });
    });

    Auth::routes([
        'login'    => true,
        'logout'   => true,
        'register' => true,
        'reset'    => false,   // for resetting passwords
        'confirm'  => false,  // for additional password confirmations
        'verify'   => false,  // for email verification
    ]);

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::middleware(['auth'])->group(function() {
        Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
            Route::get('/', 'edit')->name('edit');
            Route::put('/', 'update')->name('update');
            Route::post('upload', 'upload')->name('upload');
            Route::put('password', 'password')->name('password');
        });
    });

    Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function() {

        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('packages', PackageController::class);
        Route::resource('transactions', TransactionController::class);
        Route::controller(TransactionController::class)->name('transactions.')->group(function () {
            Route::get('/status/{id}', 'status')->name('status');
            Route::put('/status/{id}', 'status_update')->name('status_update');
        });
        Route::resource('clothes', ClothesController::class);

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
