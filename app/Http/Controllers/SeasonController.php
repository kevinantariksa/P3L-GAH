<?php

namespace App\Http\Controllers;

use App\Season;
use App\TipeKamar;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $season=Season::all();

       return view('tampilSeason',['season'=>$season]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

           $season=Season::get();
           $tipekamar = TipeKamar::get();

           return view('/buatSeason',['season'=>$season,'tipekamar'=>$tipekamar]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     public function add(Request $request){

        $sea=new Season;
        $sea->tanggal_mulai = $request->input('mulai');
        $sea->tanggal_selesai = $request->input('selesai');
        $sea->nama_season = $request->input('facility');
        $sea->harga = $request->input('price');
        $sea->id_tipe_kamar =  $request->input('roomType');
        $sea->save();
        return redirect('/tampils')->with('info','Reservation Saved Successfully!!');
      }
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
     public function update($id)
     {
       $tipekamar=TipeKamar::all();
       $season=Season::where('id_season',$id)->first();
       // dd($fasilitas);
       return view('updateSeason',compact('season',$season,'tipekamar',$tipekamar))->with('info','Season Updated Successfully');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Season $season,$id)
     {
       Season::where('id_season',$id)
       ->delete();
       return redirect('/tampils')->with('info','Season Deleted Successfully');
     }
}
