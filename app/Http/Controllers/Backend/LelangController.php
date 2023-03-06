<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Barang;
use App\Models\Lelang;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LelangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        $masyarakat = Masyarakat::all();
        $user = User::all();
        $lelangs = Lelang::all();
        
        return view('backend.lelang.index', compact('barang', 'masyarakat', 'lelangs', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        return view('backend.lelang.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // return $request;

        $barang = Barang::findOrfail($id);

        $lelang = new Lelang;
        $lelang->id_barang = $request->input('id_barang');
        $lelang->tgl_mulai = $request->input('tgl_mulai');
        $lelang->tgl_akhir = $request->input('tgl_akhir');
        $lelang->harga_awal = $barang->harga_awal; 

        dd($lelang);
        // $lelang->save();
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
        $lelangs = Lelang::find($id);
        return view('backend.lelang.edit', compact('lelangs'));
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
        $lelangs = Lelang::find($id);

        $data = $request->validate([
            'tgl_mulai' => 'required',
            'tgl_akhir' => 'required',
        ]);

        $lelangs->update($data);

        return redirect()->route('lelang.index')->with('alert', 'Successfully managed to change the date lelang !');
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

    public function tambah()
    {
        $barangs = Barang::all();
        $masyarakat = Masyarakat::all();
        return view('backend.lelang.create', compact('barangs', 'masyarakat'));
    }

    public function add(Request $request)
    {
        $lelang = new Lelang;
        // $barangs = Barang::all();
        $date = Carbon::now();

        $lelang->id_barang = $request->input('id_barang');
        // $lelang->harga_awal = $request->get($barangs);
        $lelang->tgl_mulai = $request->input('tgl_mulai');
        $lelang->tgl_akhir = $request->input('tgl_akhir');
        $lelang->created_by = Auth()->user()->id;
        $lelang->created_date = $date->toDateTimeString();
        // $lelang->id_masyarakat = $request->input('id_masyarakat');
        // $lelang->harga_awal = $barang->id_barang; 
        // dd($lelang);
        $lelang->save();

        return redirect()->route('lelang.index')->with('alert', 'Successfully added item lelang !');
    }

    public function cancel($id)
    {
        $lelang = Lelang::find($id);
        Lelang::where('id','=', $id)->update([
            'status' => 'cancel' #cancel lelang
        ]);
        $status = 'cancel';

        if(Lelang::where('status','=', $status))
        {
            Barang::where('id', $lelang->id_barang, $id)->update([
                'status' => 'new' #cancel lelang
            ]);
        }
        return redirect()->route('lelang.index')->with('alert', 'Successfully canceled lelang !');
    }

    public function closed($id)
    {
        $lelang = Lelang::find($id);
        Lelang::where('id','=', $id)->update([
            'status' => 'closed' #cancel lelang
        ]);
        $status = 'closed';

        if(Lelang::where('status','=', $status))
        {
            Barang::where('id', $lelang->id_barang, $id)->update([
                'status' => 'sold' #cancel lelang
            ]);
        }
        return redirect()->route('lelang.index')->with('alert', 'Successfully closed lelang !');
    }
    public function open($id)
    {
        $lelang = Lelang::find($id);
        Lelang::where('id','=', $id)->update([
            'status' => 'open' #cancel lelang
        ]);
        $status = 'open';

        if(Lelang::where('status','=', $status))
        {
            Barang::where('id', $lelang->id_barang, $id)->update([
                'status' => 'proses' #cancel lelang
            ]);
        }
        return redirect()->route('lelang.index')->with('alert', 'Successfully opened lelang !');
    }
}
