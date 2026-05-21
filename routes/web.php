<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Models\User;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HargaKertasController;
use App\Http\Controllers\JenisLaminatingController;
use App\Http\Controllers\BiayaLainLainController;
use App\Http\Controllers\BiayaCetakCoverController;
use App\Http\Controllers\TipeJilidController;
use App\Http\Controllers\TipeKlikController;
use App\Http\Controllers\BiayaJilidLemController;
use App\Http\Controllers\DaftarKonsumenController;
use App\Http\Controllers\PotongController;
use App\Http\Controllers\BiayaJilidSpiralController;

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

Route::get('/dbase', function () {
    return view('admin.dbase');
});

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

# ============================================================
# DBASE — CRUD semua tabel database
# ============================================================

# Harga Kertas
Route::get('/harga-kertas',            [HargaKertasController::class, 'index']);
Route::post('/harga-kertas',           [HargaKertasController::class, 'store']);
Route::get('/harga-kertas/{id}',       [HargaKertasController::class, 'show']);
Route::put('/harga-kertas/{id}',       [HargaKertasController::class, 'update']);
Route::delete('/harga-kertas/{id}',    [HargaKertasController::class, 'destroy']);

# Jenis Laminating
Route::get('/jenis-laminating',        [JenisLaminatingController::class, 'index']);
Route::post('/jenis-laminating',       [JenisLaminatingController::class, 'store']);
Route::get('/jenis-laminating/{id}',   [JenisLaminatingController::class, 'show']);
Route::put('/jenis-laminating/{id}',   [JenisLaminatingController::class, 'update']);
Route::delete('/jenis-laminating/{id}',[JenisLaminatingController::class, 'destroy']);

# Biaya Lain-lain
Route::get('/biaya-lain-lain',         [BiayaLainLainController::class, 'index']);
Route::post('/biaya-lain-lain',        [BiayaLainLainController::class, 'store']);
Route::get('/biaya-lain-lain/{id}',    [BiayaLainLainController::class, 'show']);
Route::put('/biaya-lain-lain/{id}',    [BiayaLainLainController::class, 'update']);
Route::delete('/biaya-lain-lain/{id}', [BiayaLainLainController::class, 'destroy']);

# Biaya Cetak Cover
Route::get('/biaya-cetak-cover',         [BiayaCetakCoverController::class, 'index']);
Route::post('/biaya-cetak-cover',        [BiayaCetakCoverController::class, 'store']);
Route::get('/biaya-cetak-cover/{id}',    [BiayaCetakCoverController::class, 'show']);
Route::put('/biaya-cetak-cover/{id}',    [BiayaCetakCoverController::class, 'update']);
Route::delete('/biaya-cetak-cover/{id}', [BiayaCetakCoverController::class, 'destroy']);

# Tipe Jilid
Route::get('/tipe-jilid',              [TipeJilidController::class, 'index']);
Route::post('/tipe-jilid',             [TipeJilidController::class, 'store']);
Route::get('/tipe-jilid/{id}',         [TipeJilidController::class, 'show']);
Route::put('/tipe-jilid/{id}',         [TipeJilidController::class, 'update']);
Route::delete('/tipe-jilid/{id}',      [TipeJilidController::class, 'destroy']);

# Tipe Klik
Route::get('/tipe-klik',               [TipeKlikController::class, 'index']);
Route::post('/tipe-klik',              [TipeKlikController::class, 'store']);
Route::get('/tipe-klik/{id}',          [TipeKlikController::class, 'show']);
Route::put('/tipe-klik/{id}',          [TipeKlikController::class, 'update']);
Route::delete('/tipe-klik/{id}',       [TipeKlikController::class, 'destroy']);

# Biaya Jilid Lem
Route::get('/biaya-jilid-lem',         [BiayaJilidLemController::class, 'index']);
Route::post('/biaya-jilid-lem',        [BiayaJilidLemController::class, 'store']);
Route::get('/biaya-jilid-lem/{id}',    [BiayaJilidLemController::class, 'show']);
Route::put('/biaya-jilid-lem/{id}',    [BiayaJilidLemController::class, 'update']);
Route::delete('/biaya-jilid-lem/{id}', [BiayaJilidLemController::class, 'destroy']);

# Daftar Konsumen
Route::get('/daftar-konsumen',         [DaftarKonsumenController::class, 'index']);
Route::post('/daftar-konsumen',        [DaftarKonsumenController::class, 'store']);
Route::get('/daftar-konsumen/{id}',    [DaftarKonsumenController::class, 'show']);
Route::put('/daftar-konsumen/{id}',    [DaftarKonsumenController::class, 'update']);
Route::delete('/daftar-konsumen/{id}', [DaftarKonsumenController::class, 'destroy']);

# Potong
Route::get('/potong',                  [PotongController::class, 'index']);
Route::post('/potong',                 [PotongController::class, 'store']);
Route::get('/potong/{id}',             [PotongController::class, 'show']);
Route::put('/potong/{id}',             [PotongController::class, 'update']);
Route::delete('/potong/{id}',          [PotongController::class, 'destroy']);

# Biaya Jilid Spiral
Route::get('/biaya-jilid-spiral',         [BiayaJilidSpiralController::class, 'index']);
Route::post('/biaya-jilid-spiral',        [BiayaJilidSpiralController::class, 'store']);
Route::get('/biaya-jilid-spiral/{id}',    [BiayaJilidSpiralController::class, 'show']);
Route::put('/biaya-jilid-spiral/{id}',    [BiayaJilidSpiralController::class, 'update']);
Route::delete('/biaya-jilid-spiral/{id}', [BiayaJilidSpiralController::class, 'destroy']);