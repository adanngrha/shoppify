<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use File;


class SellerController extends Controller
{
    // Profile
    public function profile() {
        $userID = Auth::id();
        $user = User::where('id', $userID)->first();
        $user_profile = Profile::where('user_id', $userID)->first();
        return view('seller.profile.index', compact('user_profile', 'user'));
    }

    public function editProfile(Request $request) {
        $this->validate($request,[
            'full_name' => 'required|',
            'phone_number'=>'required|',
            'gender' => 'required|',
        ]);
        $userID = Auth::id();
        $profile = Profile::where('user_id', $userID)->first();
        $profile->update([
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
        ]);
        return redirect('/profile')->with('status', 'Profile data successfully update!');
    }

    public function editEmail(Request $request) {
        $this->validate($request, [
            'old_email' => 'required',
            'new_email' => 'required',
        ]);

        $userID = Auth::id();
        $user = User::where('id', $userID)->first();
        if($user->email == $request->old_email) {
            $user->update([
                'email' => $request->new_email,
            ]);
            return redirect('profile');
        } else {
            return redirect('profile/change-email');
        }
    }

    public function editPassword(Request $request) {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'min:6|required_with:new_password2|same:new_password2',
            'new_password2' => 'min:6',
        ]);

        $userID = Auth::id();
        $user = User::where('id', $userID)->first();
        if(Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);
            return redirect('profile');
        } else {
            return redirect('profile/change-password');
        }
    }
    // Profile

    //Product
    public function createProduct()
    {
        return view('seller.product.add_product');
    }

    public function storeProduct(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'location' => 'required',
            'picture' => 'required|mimes:jpeg,jpg,png|max:2200'
        ]);

        $userID = Auth::id();
        $picture = $request->picture;
        $new_picture = time() . ' - ' . $picture->getClientOriginalName();

        $product=Product::create([
            "user_id" => $userID,
            "name" => $request["name"],
            "price" => $request["price"],
            "stock" => $request["stock"],
            "description" => $request["description"],
            "location" => $request["location"],
        ]);

        $product->product_images()->create([
            'product_id' => $product->id,
            'picture' => $new_picture,
        ]);


        $picture->move('img-product-upload/', $new_picture);

        return redirect('/product/list-product')->with('success', 'Product data successfully add!');
    }

    public function index()
    {
        $userID = Auth::id();
        $products = Product::all()->where('user_id', $userID);

        $product_images = [];
        $i = 0;
        foreach ($products as $product) {
            $product_image = ProductImage::where('product_id', $product->id)->first();
            $product_images[$i] = $product_image->picture;
            $i++;
        }

        //$product_images = Product_Image::all();
        return view('seller.product.index', compact('products', 'product_images'));
    }

    public function editProduct($id) {
        $product = Product::find($id);
        $product_image = ProductImage::find('product_id', $product->id)->first();
        
        return view('seller.product.edit_product',compact('product', 'product_image'));
    }

    public function updateProduct($id, Request $request) {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'location' => 'required',
            'picture' => 'required|mimes:jpeg,jpg,png|max:2200'
        ]);

        $product = Product::findorfail($id);
        $product_id=$product->id;
        $product_image = ProductImage::findorfail($product_id);
        if ($request->has('picture')) {
            File::delete("img-product-upload/".$product_image->picture);
            $picture = $request->picture;
            $new_picture = time() . ' - ' . $picture->getClientOriginalName();
            $picture->move('img-product-upload/', $new_picture);
            $product_data = [
                "name" => $request["name"],
                "price" => $request["price"],
                "stock" => $request["stock"],
                "description" => $request["description"],
                "location" => $request["location"],
            ];
                $product_img_data = [
                    'picture' => $new_picture,
                ];
        } else {
            $product_data = [
                "name" => $request["name"],
                "price" => $request["price"],
                "stock" => $request["stock"],
                "description" => $request["description"],
                "location" => $request["location"],
            ];
        }
        
        $product->update($product_data);
        $product_image->update($product_img_data);

        return redirect('/product/list-product')->with('success', 'Data product successfully updated!');
    }

    public function destroyProdcut($id) {
        $product = Product::find($id);
        $product_id=$product->id;
        ProductImage::destroy($id);
        Product::destroy($product_id);
        
        //$product = Product::where('id', $id)->delete();
        //$product_image = Product::find($id)->product_images()->delete();
        //$product->product_images()->whereId($id)->delete();
        return redirect('/product/list-product')->with('success', 'Submission successfully deleted!');
    }

    //Product
}
