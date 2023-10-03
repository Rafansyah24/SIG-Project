<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\monitoring;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     */ 
    public function index(Request $request)
    {
        
        if($request->has('search')){
            $index = monitoring::where('id','LIKE','%' .$request->search. '%')->get(); // Menambahkan metode get() untuk mengeksekusi query
        }else{
            $index = monitoring::all(); // Mengambil semua data table event_log
        }

        return view('user.table', ['index' => $index,  'request' => $request]);
    }


    public function index_admin(Request $request)
    {

        if($request->has('search')){
            $index_admin = monitoring::where('id','LIKE','%' .$request->search. '%')->get(); // Menambahkan metode get() untuk mengeksekusi query
        }else{
            $index_admin = monitoring::all(); // Mengambil semua data table event_log
        }

        return view('admin.table', ['index_admin' => $index_admin,  'request' => $request]);

    }

    public function user_table(Request $request)
    {

        if($request->has('search')){
            $user_table = User::where('id','LIKE','%' .$request->search. '%')->get(); // Menambahkan metode get() untuk mengeksekusi query
        }else{
            $user_table = User::all(); // Mengambil semua data table event_log
        }

        return view('usermanagement.listuser', ['user_table' => $user_table,  'request' => $request]);

    }




}
