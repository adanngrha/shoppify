<?php


use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Models\Product;
use App\Models\ProductImage;
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

Route::get('/', [HomeController::class, 'home']);

// Login Regis
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'storeLogin']);
Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('register', [LoginController::class, 'storeRegister']);
Route::get('detail-product/{productID}', [ProductController::class, 'detailProduct'])->name('detailProduct');

Route::middleware('auth')->group(function() {
    Route::get('logout', [LoginController::class, 'logout']);
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    
    //Route::get('detail-product/{productID}', [ProductController::class, 'detailProduct'])->name('detailProduct');

    //admin
    Route::middleware('is.admin')->group(function() {
        Route::prefix('admin')->group(function () {
            Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
            Route::get('/products', [AdminController::class, 'products'])->name('orders');
        });
    });

    //buyer
    Route::middleware('is.buyer')->group(function() {
        Route::get('/profile', [BuyerController::class, 'profile'])->name('profile');
        Route::get('/address', [BuyerController::class, 'address'])->name('address');

        // Profile Routes
        Route::prefix('profile')->group(function () {
            Route::post('/change-profile', [BuyerController::class, 'editProfile'])->name('editProfile');
            Route::get('/change-email', function () {
                return view('buyer.profile.change_email');
            });
            Route::post('/change-email', [BuyerController::class, 'editEmail'])->name('editEmail');
            Route::get('/change-password', function () {
                return view('buyer.profile.change_password');
            });
            Route::post('/change-password', [BuyerController::class, 'editPassword'])->name('editPassword');
        });

        // Address Routes
        Route::prefix('address')->group(function () {
            Route::get('/add-address', function () {
                return view('buyer.address.add_address');
            });
            Route::post('/add-address', [BuyerController::class, 'addAddress'])->name('addAddress');
            Route::get('show-address/{addressID}', [BuyerController::class, 'showAddress'])->name('showAddress');
            Route::post('edit-address/{addressID}', [BuyerController::class, 'editAddress'])->name('editAddress');
            Route::get('delete-address/{addressID}', [BuyerController::class, 'deleteAddress'])->name('deleteAddress');
        });

    });

    //seller
    Route::middleware('is.seller')->group(function() {
        //Product
        Route::prefix('product')->group(function () {
            Route::get('/add-product', [SellerController::class, 'createProduct'])->name('createProduct');
            Route::post('/list-product', [SellerController::class, 'storeProduct']);
            Route::get('/list-product', [SellerController::class, 'index'])->name('index');
            Route::get('/{id}', [SellerController::class, 'editProduct'])->name('editProduct');
            Route::put('/{id}', [SellerController::class, 'updateProduct'])->name('updateProduct');
            Route::delete('/{id}', [SellerController::class, 'destroyProduct'])->name('destroyProduct');
        });

        // Profile Routes
        Route::get('/profile', [SellerController::class, 'profile'])->name('profile');

        Route::prefix('profile')->group(function () {
            Route::post('/change-profile', [SellerController::class, 'editProfile'])->name('editProfile');
            Route::get('/change-email', function () {
                return view('seller.profile.change_email');
            });
            Route::post('/change-email', [SellerController::class, 'editEmail'])->name('editEmail');
            Route::get('/change-password', function () {
                return view('seller.profile.change_password');
            });
            Route::post('/change-password', [SellerController::class, 'editPassword'])->name('editPassword');
        });
    });
});
