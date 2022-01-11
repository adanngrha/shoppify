<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class BuyerController extends Controller
{
    public function profile() {
        $userID = Auth::id();
        $user = User::where('id', $userID)->first();
        $user_profile = Profile::where('user_id', $userID)->first();
        return view('buyer.profile.index', compact('user_profile', 'user'));
    }

    public function storeProfile(Request $request) {
        $input = $request->all();
        Profile::create($input);
        return redirect('/profile');
    }

    public function editProfile(Request $request, $user_id) {
        $profile = Profile::find($user_id);
        $profile->update([
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
        ]);
        return redirect('/profile');
    }

    public function editEmail(Request $request, $userID) {
        $user = User::where('id', $userID)->first();
        if($user->email == $request->old_email) {
            $user->update([
                'email' => $request->new_email,
            ]);
            return redirect('/profile');
        } else {
            return redirect('/profile/change-email');
        }
    }

    public function editPassword(Request $request, $userID) {
        $user = User::where('id', $userID)->first();
        if ($user->pasword == $request->old_password) {
            $user->update([
                'password' => $request->new_password,
            ]);
            return redirect('/profile');
        } else {
            return redirect('/profile/change-password');
        }
    }

}
