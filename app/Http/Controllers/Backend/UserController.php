<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'nip' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('user.index')->with('alert', 'Successfully added item user !');
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
        $user = User::findOrfail($id);
        return view('backend.user.edit', compact('user'));
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
        $user = User::findOrfail($id);

        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'nip' => 'required',
            'email' => 'required',
            'level' => 'required',
        ]);

        $user->update($validatedData);

        return redirect()->route('user.index')->with('alert', 'Successfully managed to change the item user !');
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

    public function nonaktif($id)
    {
        $data = User::find($id);
        User::where('id','=', $id)->update([
            'status' => 0 #Non-aktif Sukses
        ]);
        return redirect()->route('user.index')->with('alert', 'Successfully deactived account !');
    }

    public function aktif($id)
    {
        $data = User::find($id);
        User::where('id','=', $id)->update([
            'status' => 1 #Aktif Sukses
        ]);
        return redirect()->route('user.index')->with('alert', 'Successfully activated account !');
    }

    public function dochange($id)
    {
        $user = User::findOrfail($id);
        return view('backend.user.change', compact('user'));
    }

    public function change(Request $request, $id)
    {
        $user = User::findOrfail($id);

        $data = $request->validate([
            'password' => 'required',
        ]);

        $data['password'] = Hash::make($data['password']);

        $user->update($data);

        return redirect()->route('user.index')->with('alert', 'Successfully managed to change the password !');
    }
}
