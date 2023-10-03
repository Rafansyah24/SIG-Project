<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function indexmin()

    {
        return view('index');
    }

    function user()
    {
        return view('user.dashboard');
    }

    function admin()
    {
        return view('admin.dashboard');
    }

    
}
