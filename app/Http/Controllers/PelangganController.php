<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use Illuminate\Contracts\Auth\Authenticatable;;

class PelangganController extends Controller
{

    protected $table = 'pelanggan';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Pelanggan::where('id_pel', 11)->get();
        return view('\profile',['profile'=>$profile]);
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
      
      $pelanggan=  new Pelanggan;
      $pelanggan->nama= $request->nama;
      $pelanggan->email= $request->email;
      $pelanggan->no_identitas= $request->no_identitas;
      $pelanggan->alamat= $request->alamat;
      $pelanggan->telp= $request->telp;
      $pelanggan->id_role= $request->id_role;
      $pelanggan->id_pel= $request->id_pel;
      $pelanggan-> save();

      Auth::loginUsingId($user->getAuthIdentifier());
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
}
