<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Lelang;
use App\Models\History;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $history = History::with('barang', 'masyarakat', 'lelang')->paginate(5);
        return view('admin.laporan.index', compact('history'));
    }

    public function create(Request $request)
    {
        $history = History::with('barang', 'masyarakat', 'lelang')->get();

        $pdf = Pdf::loadView('admin.laporan.print', compact('history'));
        return $pdf->stream();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'penawaran' => 'required',
            'id_lelang' => 'required',
            'id_barang' => 'required',
            'id_masyarakat' => 'required',
        ]);

        $history = History::create([
            'penawaran' => $request->input('penawaran'),
            'id_lelang' => $request->input('id_lelang'),
            'id_barang' => $request->input('id_barang'),
            'id_masyarakat' => $request->input('id_masyarakat'),
        ]);

        if($history)
        {
            return redirect()->route('dashboard')->with(['success' => 'Tawaran Anda Berhasil Masuk']);
        }
        else
        {
            return redirect()->route('dashboard')->with(['error' => 'Data history Gagal di Tambahkan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $this->validate($request, [
            'pemenang' => 'required',
        ]);
        $selectedValue = $_POST['pemenang'];

        $lelang = Lelang::findOrFail($id);

        list($idMasyarakat, $penawaran) = explode('|', $selectedValue);

        $lelang->update([
            'id_masyarakat' => $idMasyarakat,
            'harga_akhir' => $penawaran,
            'status' => 'ditutup'
        ]);

        if($lelang)
        {
            return redirect()->route('lelang.index')->with(['update' => 'Berhasil Memilih Pemenang']);
        }
        else
        {
            return redirect()->route('lelang.index')->with(['error' => 'Gagal Memilih Pemenang']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(History $history)
    {
        //
    }
}
