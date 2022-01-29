<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function register() {
        $roles=Role::all();
        return view('auth.register', compact('roles'));
    }

    public function storeRegister(Request $request) {

        $this->validate($request,[
            'username' => 'required|alpha_dash|unique:users,username',
            'email'=>'required|email|unique:users',
            'password' => 'min:6|required_with:password2|same:password2',
            'password2' => 'min:6',
        ]);
        $user=User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole($request->role);
        $email = $request->email;
        $id = User::where('email', $email)->select('id')->get();
        $user=Profile::create([
            'user_id' => $id[0]->id,
            'full_name' => '',
            'phone_number' => '',
            'gender' => 'male',
        ]);
        $user = User::where('username', $request->username)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                if ($user->hasRole('buyer')) {
                    Auth::login($user);
                    return redirect('home');
                } elseif ($user->hasRole('seller')) {
                    Auth::login($user);
                    return redirect('home');
                }
            }
            return redirect('login');
        }
        return redirect('/');
    }

    public function login() {
        return view('auth.login');
    }

    public function storeLogin(Request $request) {
        $this->validate($request,[
            'username' => 'required|',
            'password' => 'min:6|',
        ]);

        $user=User::where('username', $request->username)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                if ($user->hasRole('buyer')) {
                    Auth::login($user);
                    return redirect('home');
                }
                elseif ($user->hasRole('seller')) {
                    Auth::login($user);
                    return redirect('home');
                } else {
                    Auth::login($user);
                    return redirect('admin/orders');
                }
            }
            return redirect('login');
        }
        return redirect('login');
    }

    public function logout()
    {
        auth()->logout();
        Session::flush();
        return redirect('/');
    }
}
