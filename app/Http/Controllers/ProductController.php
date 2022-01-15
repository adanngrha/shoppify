<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductImage;

class ProductController extends Controller
{
    public function detailProduct($productID)
    {
        $products = Product::where('id',$productID)->first();
        //$product_images = [];
        //$i = 0;
        //foreach ($products as $product) {
            $product_image = ProductImage::where('product_id', $products->id)->first();
            //$product_images[$i] = $product_image->picture;
            //$i++;
        //}

        //$product_images = Product_Image::all();
        return view('product.index', compact('products', 'product_image'));
    }
}
