<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::with('level')->paginate(10);
        return view('admin.petugas.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function regis(Request $request)
    // {
    //     $this->validate($request, [
    //         'nama_petugas' => 'required',
    //         'email' => 'required',
    //         'password' => 'required',
    //         'level' => 'required',
    //     ]);

    //     $user = User::create([
    //         'nama_petugas' => $request->input('nama_petugas'),
    //         'email' => $request->input('email'),
    //         'password' => Hash::make($request->input('password')),
    //         'id_level' => $request->input('level'),
    //     ]);

    //     return redirect()->route('login')->with(['success' => 'Registrasi Berhasil']);

    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

        if($user)
        {
            return redirect()->route('user.index')->with(['success' => 'Data Petugas Berhasil di Tambahkan']);
        }
        else
        {
            return redirect()->route('user.index')->with(['error' => 'Data Petugas Gagal di Tambahkan']);
        }
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
        $user = User::findOrFail($id);

        $user->delete();

        if($user)
        {
            return redirect()->route('user.index')->with(['delete' => 'Data Petugas Berhasil di Hapus']);
        }
        else
        {
            return redirect()->route('user.index')->with(['error' => 'Data Petugas Gagal di Hapus']);
        }
    }
}
