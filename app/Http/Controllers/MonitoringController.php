<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\monitoring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MonitoringController extends Controller
{
    // SEARCH USER
    public function table(Request $request)
{
    $search = $request->input('search');
    

    // Inisialisasi query builder untuk model Monitoring
    $query = monitoring::query();

    // Jika ada parameter 'search', tambahkan kondisi pencarian ke query
    if ($search) {
        $query->where(function ($subQuery) use ($search) {
            $subQuery->where('id', 'LIKE', '%' . $search . '%')
                ->orWhere(function ($subSubQuery) use ($search) {
                    $subSubQuery->where('modul', 'LIKE', '%' . $search . '%')
                        ->orWhere('tipe', 'LIKE', '%' . $search . '%')
                        ->orWhere('kode', 'LIKE', '%' . $search . '%');
                })
                ->orWhere(DB::raw("CONCAT(id, ' ', modul, ' ', tipe, ' ', kode)"), 'LIKE', '%' . $search . '%');
        });
    }
    
    else{
        $index = monitoring::all(); // Mengambil semua data table event_log
    }

    // Eksekusi query dan ambil data
    $index = $query->get();

    return view('user.table', ['index' => $index, 'request' => $request]);
}


    // SEARCH ADMIN

    public function table_admin(Request $request)
    {

    $search = $request->input('search');

    // Inisialisasi query builder untuk model Monitoring
    $query = monitoring::query();

    // Jika ada parameter 'search', tambahkan kondisi pencarian ke query
    if ($search) {
        $query->where('id', 'LIKE', '%' . $search . '%')
            ->orWhere('modul', 'LIKE', '%' . $search . '%')
            ->orWhere('tipe', 'LIKE', '%' . $search . '%')
            ->orWhere('kode', 'LIKE',  '%' . $search . '%');
    }
    else{
        $index_admin = monitoring::all(); // Mengambil semua data table event_log
    }

    // Eksekusi query dan ambil data
    $index_admin = $query->get();

        return view('admin.table', ['index_admin' => $index_admin,  'request' => $request]);

    }


    // SEARCH USER MANAGEMENT

    public function usermanagement_table(Request $request)
    {

        $search = $request->input('search');

        // Inisialisasi query builder untuk model Monitoring
        $query = User::query();
    
        // Jika ada parameter 'search', tambahkan kondisi pencarian ke query
        if ($search) {
            $query->where('id', 'LIKE', '%' . $search . '%')
                ->orWhere('name', 'LIKE', '%' . $search . '%')
                ->orWhere('role', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%');
        }
        else{
            $user_table = User::all(); // Mengambil semua data table event_log
        }
    
        // Eksekusi query dan ambil data
        $user_table = $query->get();

        return view('usermanagement.listuser', ['user_table' => $user_table,  'request' => $request]);

    }
 

    // COUNT 

    public function index()
    {
        $totalData = monitoring::count();
        $totalAdmin = User::where('role','0')->count();   

        return redirect('user.dashboard',compact('totalData'));
    }

    

}
