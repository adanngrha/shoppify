<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function orders() {
        $user = User::where('username', 'admin')->first();
        return view('admin.orders', compact('user'));
    }

    public function products() {
        $user = User::where('username', 'admin')->first();
        return view('admin.products', compact('user'));
    }
}
