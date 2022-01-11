<?php

namespace App\Http\Controllers;

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
        return redirect('/home');
    }

    public function login() {
        return view('auth.login');
    }

    public function storeLogin(Request $request) {
        $this->validate($request,[
            'username' => 'required|',
            'password' => 'min:6|',
        ]);
        $user=User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                if ($user->hasRole('buyer')) {
                    Auth::login($user);
                    return redirect('home');
                }
                elseif ($user->hasRole('seller')) {
                    Auth::login($user);
                    return redirect('home');
                }
            }
            return redirect('login');
        }
        return redirect('login');
    }
}
