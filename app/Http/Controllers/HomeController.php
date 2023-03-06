<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Gambar;
use App\Models\Lelang;
use App\Models\Penawaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $this->middleware('auth:masyarakat');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    // public function home()
    // {
    //     // $lelangs = Lelang::paginate(9);
    //     $lelangs = DB::table('lelangs')->join('barangs', 'lelangs.id_barang', '=', 'barangs.id')
    //                                 ->leftJoin('gambars', 'gambars.id_barang', '=', 'barangs.id')
    //                                 ->get();
    //     return view('welcome', compact('lelangs'));
    // }

    public function dashboard()
    {
        $penawarans = Penawaran::all();
        return view('backend.dashboard', compact('penawarans'));
    }

    public function home()
    {
        $lelangs = DB::table('lelangs')->join('barangs', 'lelangs.id_barang', '=', 'barangs.id')
                                    ->leftJoin('gambars', 'gambars.id_barang', '=', 'barangs.id')
                                    ->where('lelangs.status', '=', 'open')
                                    ->get();
     
        return view('welcome', compact('lelangs'));
    }
    
    public function penawaran($id)
    {
        // $lelangs = Lelang::find($id);
        // $barang = Barang::find($id);
        // $gambar = Gambar::find($id);
        $lelangs = DB::table('lelangs')->join('barangs', 'lelangs.id_barang', '=', 'barangs.id')
                                    ->leftJoin('gambars', 'gambars.id_barang', '=', 'barangs.id')
                                    
                                    ->get()
                                    // ->reject('harga_awal')
                                    ->where('id', '=', $id);
        //                             // ->find($id);
        return view('front.penawaran', compact('lelangs'));
    }
    public function error()
    {
        return abort(403);
    }
    public function coba()
    {
        // dd('gabisa login');
        return view('coba');
    }

    public function pemenang()
    {
        $penawarans = Penawaran::where('id_masyarakat', Auth::user()->id)->get();
        return view('front.pemenang', compact('penawarans'));
    }

    public function riwayat()
    {
        $penawarans = Penawaran::all();
        $lelangs = DB::table('lelangs')->join('barangs', 'lelangs.id_barang', '=', 'barangs.id')
                                    ->leftJoin('gambars', 'gambars.id_barang', '=', 'barangs.id')
                                    ->get();

        return view('front.riwayat', compact('lelangs', 'penawarans'));
    }
    public function detail()
    {
        // $penawarans = DB::table('penawarans')->where('id_masyarakat', Auth::user()->id)->get();
        $penawarans = Penawaran::where('id_masyarakat', Auth::user()->id)->get();

        $lelangs = DB::table('lelangs')->join('barangs', 'lelangs.id_barang', '=', 'barangs.id')
                                    ->leftJoin('gambars', 'gambars.id_barang', '=', 'barangs.id')
                                    ->get();

        return view('front.detailriwayat', compact('lelangs', 'penawarans'));
    }
    public function datalelang()
    {
        $lelangs = DB::table('lelangs')->join('barangs', 'lelangs.id_barang', '=', 'barangs.id')
                                    ->leftJoin('gambars', 'gambars.id_barang', '=', 'barangs.id')
                                    ->where('lelangs.status', '=', 'open')
                                    ->get();

        return view('front.datalelang', compact('lelangs'));
    }
}
