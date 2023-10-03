<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\monitoring;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function userlist()
    {
        $user_table = User::all();
        return view('usermanagement.listuser', compact('user_table'));
    }

    public function usercreate()
    {
        return view('usermanagement.usercreate');
    }

    public function insertuser(Request $request)
    {
        User::create([
            'name' => $request->name,
            'level' => $request->level,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('users/list/page')->with('success', 'Data has been Added!');
    }

    public function userupdate($id)
    {
        $data = User::find($id);
        return view('usermanagement.userupdate', compact('data'));
    }

    public function userupdating(Request $request, $id)
    {
        $data = User::find($id);
        $data->update($request->all());
        return redirect()->route('users/list/page')->with('success', 'Data has been Updated!');
    }

    public function userdelete(Request $request, $id)
    {
        $row = User::find($id);
        $row->delete();
        return redirect()->route('users/list/page')->with('success', 'Data has been Deleted!');
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
