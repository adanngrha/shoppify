<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;

class HomeController extends Controller
{
    public function home() {
        $products = Product::all();
        $product_images = [];
        $i = 0;
        foreach ($products as $product) {
            $product_image = ProductImage::where('product_id', $product->id)->first();
            $product_images[$i] = $product_image->picture;
            $i++;
        }
        return view('home', compact('products', 'product_images'));
    }
}
