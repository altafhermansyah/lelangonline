<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Lelang;
use App\Models\History;
use App\Models\Masyarakat;
use Illuminate\Http\Request;

class LelangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lelang = Lelang::with('barang', 'users', 'masyarakat')->paginate(6);
        $barang = Barang::all();
        $user = User::all();
        $history = History::all();
        return view('admin.lelang.index', compact('lelang', 'barang', 'user', 'history'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_barang' => 'required',
            'tgl_lelang' => 'required',
            'id_user' => 'required',
            'status' => 'in:dibuka,ditutup',
        ]);

        $status = $request->input('status');
        if ($request->input('status') === null) {
            $status = 'ditutup';
        }

        $lelang = Lelang::create([
            'id_barang' => $request->input('id_barang'),
            'tgl_lelang' => $request->input('tgl_lelang'),
            'id_users' => $request->input('id_user'),
            'status' => $status,
        ]);

        if($lelang)
        {
            return redirect()->route('lelang.index')->with(['success' => 'Data Lelang Berhasil di Tambahkan']);
        }
        else
        {
            return redirect()->route('lelang.index')->with(['error' => 'Data Lelang Gagal di Tambahkan']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $lelang = Lelang::findOrFail($id);

        $lelang->update([
            'status' => 'ditutup',
        ]);

        if($lelang)
        {
            return redirect()->route('lelang.index')->with(['update' => 'Lelang Berhasil di Tutup']);
        }
        else
        {
            return redirect()->route('lelang.index')->with(['error' => 'Lelang Gagal di Gagal']);
        }
    }

}
?>
