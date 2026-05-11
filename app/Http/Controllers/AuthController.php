<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:users,email',
        'role' => 'required',
        'password' => 'required|min:6'
    ]);

    User::create([
        'name' => 'user',
        'email' => $request->email,
        'role' => $request->role,
        'password' => Hash::make($request->password)
    ]);

    return redirect('/register')
        ->with('success', 'Akun berhasil dibuat');
}
}

