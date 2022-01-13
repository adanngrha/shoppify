<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductImage;

class AdminController extends Controller
{
    public function orders() {
        $user = User::where('username', 'admin')->first();
        return view('admin.orders', compact('user'));
    }

    public function products() {
        $user = User::where('username', 'admin')->first();
        $products = Product::all();
        $seller_username = [];
        $product_images = [];
        $i = 0;
        foreach ($products as $product) {
            $seller = User::where('id', $product->user_id)->first();
            $seller_username[$i] = $seller->username;
            $product_image = ProductImage::where('product_id', $product->id)->first();
            $product_images[$i] = $product_image->picture;
            $i++;
        }
        return view('admin.products', compact('user', 'products', 'seller_username', 'product_images'));
    }
}
