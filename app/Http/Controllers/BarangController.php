<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::paginate(5);
        return view('admin.barang.index', compact('barang'));
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
            'nama_barang' => 'required',
            'tgl' => 'required',
            'harga_awal' => 'required',
            'deskripsi' => 'required',
        ]);

        $barang = Barang::create([
            'nama_barang' => $request->input('nama_barang'),
            'tgl' => $request->input('tgl'),
            'harga_awal' => $request->input('harga_awal'),
            'deskripsi_barang' => $request->input('deskripsi'),
        ]);

        if($barang)
        {
            return redirect()->route('barang.index')->with(['success' => 'Data Barang Berhasil di Tambahkan']);
        }
        else
        {
            return redirect()->route('barang.index')->with(['error' => 'Data Barang Gagal di Tambahkan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $this->validate($request, [
            'nama_barang' => 'required',
            'tgl' => 'required',
            'harga_awal' => 'required',
            'deskripsi' => 'required',
        ]);

        $barang = Barang::findOrFail($id);

        $barang->update([
            'nama_barang' => $request->input('nama_barang'),
            'tgl' => $request->input('tgl'),
            'harga_awal' => $request->input('harga_awal'),
            'deskripsi_barang' => $request->input('deskripsi'),
        ]);

        if($barang)
        {
            return redirect()->route('barang.index')->with(['update' => 'Data Barang Berhasil di Update']);
        }
        else
        {
            return redirect()->route('barang.index')->with(['error' => 'Data Barang Gagal di Update']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $barang = Barang::findOrFail($id);

        $barang->delete();

        if($barang)
        {
            return redirect()->route('barang.index')->with(['delete' => 'Data Barang Berhasil di Hapus']);
        }
        else
        {
            return redirect()->route('barang.index')->with(['error' => 'Data Barang Gagal di Hapus']);
        }
    }
}
