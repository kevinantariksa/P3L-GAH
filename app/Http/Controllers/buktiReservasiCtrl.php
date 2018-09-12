<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservasi;
use App\Kamar;
use App\Pelanggan;
use App\ReservasiConfirm;
use App\TipeKamar;
use App\Kasur;
class buktiReservasiCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $rsvc = ReservasiConfirm::where('id_pel', 2)->orderBy('id_reservasi','desc')->limit(1)->get();
      $reservasi = Reservasi::where('id_reservasi', 2)->orderBy('id_reservasi','desc')->limit(1)->get();
      $pelanggan = Pelanggan::where('id_pel',2)->get();
      $kamar = Kamar::where('id_kamar', 2)->get();
      $tipekamar= TipeKamar::where('id_tipe_kamar', 2)->get();
      $kasur = Kasur::where('id_kasur', 2)->get();

        return view('printBukti',['rsvc'=>$rsvc,'reservasi'=>$reservasi,'pelanggan'=>$pelanggan,'kamar'=>$kamar, 'tipekamar'=> $tipekamar, 'kasur'=>$kasur]);
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
}
