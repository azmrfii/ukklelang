<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // $lelang = Lelang::all();
        $lelangs = DB::table('lelangs')->join('barangs', 'lelangs.id_barang', '=', 'barangs.id')
        ->leftJoin('gambars', 'gambars.id_barang', '=', 'barangs.id')
        ->where('lelangs.tgl_mulai', '<', Carbon::now())
        ->where('lelangs.tgl_akhir', '>', Carbon::now())
        ->where('lelangs.status', '=', 'open')
        ->get();
        // return redirect()->route('homemasyarakat');
        return view('welcome', compact('lelangs'));
    }
    public function coba()
    {
        return view('coba');
    }
}
