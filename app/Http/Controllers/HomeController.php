<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function dashboard()
    {
        return view('admin.home.index');
    }
}
