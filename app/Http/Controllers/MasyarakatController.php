<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'email' => 'required',
            'password' => 'required',
            'telp' => 'required',
        ]);

        $masyarakat = Masyarakat::create([
            'nama_lengkap' => $request->input('nama_lengkap'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'telp' => $request->input('telp'),
        ]);

        // if($masyarakat)
        // {
        //     return redirect()->route('masyarakat.index')->with(['success' => 'Data Petugas Berhasil di Tambahkan']);
        // }
        // else
        // {
        //     return redirect()->route('masyarakat.index')->with(['error' => 'Data Petugas Gagal di Tambahkan']);
        // }
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
