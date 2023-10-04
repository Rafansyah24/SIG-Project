<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\monitoring;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function indexmin()

    {
        return view('index');
    }

    function user()
    {
        $totalData = monitoring::count();
        
        return view('user.dashboard',['totalData' => $totalData]);
    }

    function admin()
    {
        $totalData = monitoring::count();
        $totalAdmin = User::where('role','admin')->count();   
        $totalAkun = User::count();   
        $totalUser = User::where('role','user')->count();   

        return view('admin.dashboard',['totalData' => $totalData,'totalAdmin' => $totalAdmin,'totalUser' => $totalUser,'totalAkun' => $totalAkun]);
    }

    
}
