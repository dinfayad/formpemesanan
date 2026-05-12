<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Models\User;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('login');
});

# PROSES LOGIN
Route::post('/login', function (Request $request) {

    $email = $request->email;
    $password = $request->password;

    // AKUN ADMIN (hardcode dulu)
    if ($email === 'admin@gmail.com' && $password === 'admin123') {

        // simpan session login
        session(['is_admin' => true]);

        return redirect('/dashboard');
    }

    return back()->with('error', 'Email atau password salah!');
});

# LOGOUT
Route::get('/logout', function () {
    session()->forget('is_admin');
    return redirect('/');
});


Route::get('/dashboard', function() {
    return view('dashboard');
});

Route::get('/form-pemesanan', function () {
    return view('form.form');
});

Route::get('/bahan-baku/create', [BahanBakuController::class, 'create']);

Route::post('/bahan-baku/store', [BahanBakuController::class, 'store']);

Route::get('/bahan-baku/list', [BahanBakuController::class, 'list']);

Route::delete('/bahan-baku/delete/{id}', [BahanBakuController::class, 'delete']);

Route::get('/bahan-baku/edit/{id}', [BahanBakuController::class, 'edit']);
Route::put('/bahan-baku/update/{id}', [BahanBakuController::class, 'update']);

Route::get('/register', function () {
    return view('admin.akun_create');
});

Route::post('/register', [AuthController::class, 'register']);

Route::get('/akun-list', function () {

    $users = User::all();

    return view('admin.akun_list', compact('users'));
});

Route::put('/user/{id}', [UserController::class, 'update']);
Route::delete('/user/{id}', [UserController::class, 'destroy']);

Route::get('/listpending', function () {
    return view('form.listpending'); 
});