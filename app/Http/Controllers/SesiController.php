<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SesiController extends Controller
{

    //INDEXX

    function indexx()

    {
        return view('login');
    }

    //LOGIN

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email Perlu Diisi',
            'password.required' => 'Password Perlu Diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'admin') {
                return redirect('/admin');
            } elseif (Auth::user()->role == 'user') {
                return redirect('/user');
            } else {
                // Pengguna dengan peran lainnya, sesuaikan tindakan sesuai kebutuhan Anda
                return redirect('')->withErrors('Peran pengguna tidak valid')->withInput();
            }
        } else{
            return redirect('')->withErrors('Username tidak sesuai')->withInput();
        }
        
    }

    // LOGOUT
    
    function logout()
    {
        Auth::logout();
        return redirect('');
    }
   
}
