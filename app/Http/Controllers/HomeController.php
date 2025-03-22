<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function user()
    {
        return view('user.home');
    }
    public function admin()
    {
        return view('admin.home');
    }
}
