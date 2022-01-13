<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Profile;
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

    // Address
    public function address() {
        $userID = Auth::id();
        $addresses = Address::all()->where('user_id', $userID);
        return view('buyer.address.index', compact('addresses'));
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
        return redirect('address')->with('status', 'Profile data successfully add!');
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
        return redirect('address')->with('status', 'Profile data successfully update!');;
    }

    public function deleteAddress($addressID) {
        Address::destroy($addressID);
        return redirect('address')->with('status', 'Profile data successfully delete!');;
    }
    // Address
}
