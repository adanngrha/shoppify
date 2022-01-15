<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Cart;

class ProductController extends Controller
{
    public function detailProduct($productID)
    {
        $product = Product::where('id',$productID)->first();
        $category_id=$product->category_id;
        $category = Category::where('id', $category_id)->first();
        //$product_images = [];
        //$i = 0;
        //foreach ($products as $product) {
            $product_image = ProductImage::where('product_id', $product->id)->first();
            //$product_images[$i] = $product_image->picture;
            //$i++;
        //}

        //$product_images = Product_Image::all();
        return view('product.index', compact('product', 'product_image','category'));
    }

    
}
