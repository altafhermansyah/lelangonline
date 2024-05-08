<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function regis(Request $request)
    {
        $this->validate($request, [
            'nama_petugas' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required',
        ]);

        $user = User::create([
            'nama_petugas' => $request->input('nama_petugas'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'id_level' => $request->input('level'),
        ]);

        return redirect()->route('login')->with(['success' => 'Registrasi Berhasil']);

    }
}
