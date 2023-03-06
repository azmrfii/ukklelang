<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Barang;
use App\Models\Lelang;
use App\Models\Penawaran;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PenawaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('tes');
        $penawarans = Penawaran::all();
        $masyarakat = Masyarakat::all();
        return view('backend.penawaran.index', compact('penawarans', 'masyarakat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function riwayat()
    {
        $penawarans = Penawaran::all();
        return view('backend.penawaran.index', compact('penawarans'));
    }
    
    public function pemenang()
    {
        $penawarans = Penawaran::all();
        return view('backend.penawaran.pemenang', compact('penawarans'));
    }
    public function tawar()
    {
        $lelangs = DB::table('lelangs')->join('barangs', 'lelangs.id_barang', '=', 'barangs.id')
        ->leftJoin('gambars', 'gambars.id_barang', '=', 'barangs.id')
        ->get();
        // $lelangs = Lelang::all();
        return view('backend.penawaran.tawar', compact('lelangs'));
    }

    public function cobatawar()
    {
        $lelangs = Lelang::all();
        $barang = Barang::all();
        return view('backend.penawaran.tawar', compact('lelangs', 'barang'));
    }

    public function gotawar(Request $request)
    {
        $data = $request->all();
        // return $request;

        $date = Carbon::now();

        $penawaran = new Penawaran;
        $penawaran->id_lelang = $data['id_lelang'];
        $penawaran->harga_penawaran = $data['harga_penawaran'];
        $penawaran->tgl_penawaran = $date->toDateTimeString();
        $penawaran->id_masyarakat = Auth()->user()->id;

        // ddd($penawaran);
        $penawaran->save();
        return redirect()->route('home')->with('alert', 'bisa');
    }

    public function table()
    {
        return view('backend.penawaran.table');
    }

    public function confirm($id)
    {
        // $lelang = Lelang::find($id);
        // Lelang::where('id','=', $id)->update([
        //     'status' => 'confirmed' #cancel lelang
        // ]);
        // $status = 'confirmed';

        // if(Lelang::where('status','=', $status))
        // {
        //     // Barang::where('id', $lelang->id_barang, $id)->update([
        //     //     'status' => 'sold' #cancel lelang
        //     // ]);
        //     Penawaran::where('id', $lelang->id_masyarakat, $id)->update([
        //         'id_masyarakat' => 'sold' #cancel lelang
        //     ]);
        // }

        // $lelangs = Lelang::find($id);
        // $penawaran = Penawaran::find($id);
        // $status = 'confirmed';

        // $penawarans = Penawaran::where('id', )
        // $lelangs = Lelang::where('id', $penawaran->id_lelang)->update([
        //     'status' => $status #Non-aktif Sukses
        // ]);

        // // $lelangs->status = $status;
        // $lelangs->id_masyarakat = $penawarans->id_masyarakat;
        // $lelangs->harga_akhir = $penawarans->harga_penawaran;

        // dd($lelangs);


        $data = Lelang::find($id);
        Lelang::where('id','=', $id)->update([
            'status' => 'confirmed' #Non-aktif Sukses
        ]);
        return redirect()->route('pemenanglelang')->with('alert', 'Successfully confirm lelang !');
    }
}
