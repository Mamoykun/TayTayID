<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Models;
use Session;


class LoginController extends Controller
{
    public function postlogin(Request $request)
    {
        // dd($request->all());
        if (Auth::attempt($request->only('email','password'))) {
            return redirect('updatedigi');
        }else {
            return redirect('login');  
        }
    } 

    public function logout(Request $request)
    {
       Auth::logout();
       return redirect('pembayaran');
    }
}