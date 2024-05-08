<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Lelang;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function masyarakat(){
        // $id_masyarakat = null;
        // if (Auth::guard('web')->check()) {
        // $id = Auth::guard('web')->id();
        // $masyarakat = Masyarakat::find($id);
        // if ($masyarakat) {
        // $id_masyarakat = $masyarakat->id;
        // }
        // }
        $lelang = Lelang::with('barang', 'masyarakat')->paginate(6);
        // $barang = Barang::paginate(6);
        // $masyarakat = Masyarakat::where
        return view('masyarakat.index', compact('lelang'));
    }
}
