<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function cart()
    {
        $users = User::where('role_id',2)->whereHas('carts')->get();
        return view('admin.cart.user', compact('users'));
    }
}
