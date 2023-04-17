<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class template extends Controller
{
    public function index()
    {
        return view('template');
    }
}
