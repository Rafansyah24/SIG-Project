<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\SesiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard-user', function () {
    return view('user.dashboard');
});

Route::get('/dashboard-admin', function () {
    return view('admin.dashboard');
});

Route::get('/table',[MonitoringController::class,'index']);
Route::get('/table-admin',[MonitoringController::class,'index_admin']);
Route::get('/usermanagement',[MonitoringController::class,'user_table']);


Route::get('/login', function () {
    return view('login');
});


// LOGIN

// Route::middleware(['guest'])->group(function () {
//     Route::get('/',[MonitoringController::class,'indexx'])->name('login');
//     Route::post('/',[MonitoringController::class,'login']); 
// });

Route::middleware(['guest'])->group(function () {
    Route::get('/',[SesiController::class,'indexx'])->name('login');
    Route::post('/',[SesiController::class,'login']); 
});


// LOGIN ADMIN
Route::get('/home',function(){
    return redirect('/index');
});

// LOGOUT

Route::middleware(['auth'])->group(function () {
    Route::get('/index',[AdminController::class,'indexmin'])->middleware('userAkses:indexxx');
    Route::get('/admin',[AdminController::class,'admin'])->middleware('userAkses:admin');
    Route::get('/user',[AdminController::class,'user'])->middleware('userAkses:user');
});
Route::get('/logout',[SesiController::class,'logout']);


// USER MANAGEMENT      

Route::controller(UserManagementController::class)->group(function () {
    Route::get('users/list/page', 'userlist')->middleware('auth')->name('users/list/page');
    Route::get('users/add/new', 'usercreate')->middleware('auth')->name('users/add/new');
    Route::get('users/update/{id}', 'userupdate')->middleware('auth')->name('users/update/{id}');
    route::post('users/add/save', 'insertuser')->middleware('auth')->name('users/add/save');
    route::post('users/updating/{id}', 'userupdating')->middleware('auth')->name('users/updating/{id}');
    route::get('users/delete/{id}', 'userdelete')->middleware('auth')->name('users/delete/{id}');
});

