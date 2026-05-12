<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // UPDATE USER
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // update password jika diisi
        if($request->password){
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Akun berhasil diupdate');
    }

    // DELETE USER
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->back()->with('success', 'Akun berhasil dihapus');
    }
}