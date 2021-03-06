<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\Cart;
use App\Models\Address;
use App\Models\Courier;
use App\Models\ProductImage;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BuyerController extends Controller
{
    // Profile
    public function profile() {
        $userID = Auth::id();
        $user = User::where('id', $userID)->first();
        $user_profile = Profile::where('user_id', $userID)->first();
        return view('buyer.profile.index', compact('user_profile', 'user'));
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
        return redirect('/buyer-profile')->with('status', 'Profile data successfully update!');
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
            return redirect('buyer-profile');
        } else {
            return redirect('buyer-profile/change-email');
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
            return redirect('buyer-profile');
        } else {
            return redirect('buyer-profile/change-password');
        }
    }
    // Profile

    // Address
    public function address() {
        $userID = Auth::id();
        $addresses = Address::all()->where('user_id', $userID)->sortByDesc('utama');
        return view('buyer.address.index', compact('addresses', 'userID'));
    }

    public function addAddress(Request $request) {
        $userID = Auth::id();
        $this->validate($request, [
            'full_name' => 'required|',
            'phone_number' => 'required|',
            'address_name' => 'required|',
            'city' => 'required|',
            'province' => 'required|',
            'postal_code' => 'required|',
        ]);

        Address::create([
            'user_id' => $userID,
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'address_name' => $request->address_name,
            'city' => $request->city,
            'province' => $request->province,
            'postal_code' => $request->postal_code,
        ]);
        return redirect('buyer-address')->with('status', 'Profile data successfully add!');
    }

    public function showAddress(Request $request, $addressID) {
        $address = Address::where('id', $addressID)->first();
        return view('buyer.address.edit_address', compact('address'));
    }

    public function editAddress(Request $request, $addressID) {
        $address = Address::where('id', $addressID)->first();
        $this->validate($request, [
            'full_name' => 'required|',
            'phone_number' => 'required|',
            'address_name' => 'required|',
            'city' => 'required|',
            'province' => 'required|',
            'postal_code' => 'required|',
        ]);
        $input = $request->all();
        $address->update($input);
        return redirect('buyer-address')->with('status', 'Profile data successfully update!');;
    }

    public function deleteAddress($addressID) {
        Address::destroy($addressID);
        return redirect('buyer-address')->with('status', 'Profile data successfully delete!');
    }

    public function utama($user_id, $address_id) {
        $address = Address::all()->where('user_id', $user_id);
        $address->each(function ($utama) {
            $utama->update([
                'utama'=>'0',
            ]);
        });
        $choosen_address = Address::where('id', $address_id)->first();
        $choosen_address->update([
            'utama' => '1',
        ]);
        return redirect('buyer-address');
    }
    // Address

    //Cart
    public function addCart(Request $request, $productID) {
        $user=request()->user();

        $user->carts()->attach($productID, ['quantity' => $request->quantity]);

        return redirect()->back();
    }

    public function showCart() {
        $user = request()->user();
        $user->load('carts', 'carts.product_images');
        $carts = $user->carts;

        return view('buyer.cart.index', compact('carts'));
    }

    public function deleteCart($cartID) {
        $user = request()->user();
        $cart = Cart::where('id', $cartID)->first();

        $user->carts()->detach($cart->products->id);
        return redirect('viewcart')->with('status', 'Profile data successfully delete!');
    }

    public function editCart(Request $request, $cartID) {
        $cart = Cart::where('id', $cartID)->first();
        $input = $request->all();
        $cart->update($input);
        return redirect()->back()->with('status', 'Data cart successfully update!');;
    }
    //Cart

    // Checkout

    public function checkout() {

        // Alamat Pengiriman
        $user_id = Auth::id();
        $profile = Profile::where('user_id', $user_id)->first();
        $address = Address::where('user_id', $user_id)->where('utama', '1')->first();

        // Item Dipesan
        $carts = Cart::where('user_id', $user_id)->get();
        $count = Cart::where('user_id', $user_id)->count();

        // Kurir dan Service
        $couriers = Courier::all();
        $services = Service::all();
        $payments = PaymentMethod::all();

        return view('buyer.checkout.index', compact('profile', 'address', 'carts', 'couriers', 'services', 'payments'));

    }

    public function order(Request $request) {
        $order=Order::create([
            "buyer_id" => $request["buyer_id"],
            "address_id" => $request["address_id"],
            "courier_id" => $request["courier"],
            "service_id" => 1,
            "payment_method_id" => $request["payment"],
            "message" => $request["message"],
            "total" => $request["total"],
        ]);

        $paymentID=$order->payment_method_id;
        $payment=PaymentMethod::where('id',$paymentID)->first();

        $total=$order->total;


        return view('buyer.checkout.order', compact('payment','total'));
    }
    // Checkout

}

