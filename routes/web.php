<?php

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

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/profile', function () {
    return view('buyer.profile.index');
});

Route::prefix('profile')->group(function(){
    Route::get('/change-password', function () {
        return view('buyer.profile.change_password');
    });
    
    Route::get('/change-email', function () {
        return view('buyer.profile.change_email');
    });
});

Route::get('/address', function () {
    return view('buyer.address.index');
});

Route::prefix('address')->group(function(){
    Route::get('/add-address', function () {
        return view('buyer.address.add_address');
    });
});


