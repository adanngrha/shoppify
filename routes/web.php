<?php

use App\Http\Controllers\BuyerController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

// Login Regis
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'storeLogin']);
Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('register', [LoginController::class, 'storeRegister']);

Route::middleware('auth')->group(function() {
    Route::get('logout', [LoginController::class, 'logout']);
    Route::get('/home', function() {
        return view('home');
    });

    Route::middleware('is.admin')->group(function() {
        Route::get('/admin', function() {
            return view('admin.dashboard');
        });
    });

    Route::middleware('is.buyer')->group(function() {
        Route::get('/profile', [BuyerController::class, 'profile'])->name('profile');
        Route::get('/address', function () {
            return view('buyer.address.index');
        });

        Route::prefix('profile')->group(function () {
            Route::get('/change-password', function () {
                return view('buyer.profile.change_password');
            });
            Route::get('/change-email', function () {
                return view('buyer.profile.change_email');
            });
        });

        Route::prefix('address')->group(function () {
            Route::get('/add-address', function () {
                return view('buyer.address.add_address');
            });
        });

    });

    Route::middleware('is.seller')->group(function() {

    });
});
