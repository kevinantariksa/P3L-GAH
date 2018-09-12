<?php

namespace App\Http\Controllers;

use App\Fasilitas;
use App\PermintaanSpesial;
use App\hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\FasilitasController;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasilitas=Fasilitas::get();


        return view('/permintaanSpesial',['fasilitas'=>$fasilitas]);
    }

    public function index2()
    {
        $fasilitas=Fasilitas::get();


        return view('/tampilfasilitas',['fasilitas'=>$fasilitas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fasilitas=Fasilitas::all();
        $hotel=hotel::all();

         return view('/buatFasilitas',['fasilitas'=>$fasilitas,'hotel'=>$hotel]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request3)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function show(Fasilitas $fasilitas)
    {
      $fasilitas=  Fasilitas::create([


      ]);

      $permintaanKhsus = PermintaanSpesial::create([
        'id_fasilitas' => $data['id_fasilitas'],
        'id_reservasi' => $data['id_reservasi'],
        'jumlah' => $data['jumlah'],
        'total_harga' => $data['total_harga'],
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */


     public function add(Request $request){

        $fct=new Fasilitas;
        $fct->id_hotel = $request->input('branch');
        $fct->nama_fasilitas = $request->input('facility');
        $fct->harga = $request->input('price');
        $fct->deskripsi = $request->input('description');
        $fct->status_tersedia = '1';
        $fct->save();
        return redirect('/tampilfsl')->with('info','Facility Saved Successfully');
      }

    public function edit(Request $request,$id)
    {
      $fasilitas=Fasilitas::where('id_fasilitas',$id)->first();

      $data = array('id_fasilitas'=>$fasilitas->id_fasilitas,
        'id_hotel'=> $request->input('branch'),
        'nama_fasilitas'=> $request->input('facility'),
        'harga'=> $request->input('price'),
        'deskripsi'=> $request->input('description'),
        'status_tersedia'=> $request->availibility,
      );

      Fasilitas::where('id_fasilitas',$id)
      ->update($data);
      return redirect('/tampilfsl')->with('info','Facility Update Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
      $hotel=hotel::all();
      $fasilitas=Fasilitas::where('id_fasilitas',$id)->first();
      // dd($fasilitas);
      return view('updatefct',compact('fasilitas',$fasilitas,'hotel',$hotel));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fasilitas $fasilitas,$id)
    {
      Fasilitas::where('id_fasilitas',$id)
      ->delete();
      return redirect('/tampilfsl')->with('info','Facility Delete Successfully');
    }

    public function search(Request $request){
     $temp=$request->input('search');
     if(is_null($temp)){
      dd('cannot be null');
     }
     else{
       $fasilitas= Fasilitas::select('fasilitas.*')
               ->where('fasilitas.nama_fasilitas','like',$temp)
               ->orWhere('fasilitas.harga_fasilitas','like',$temp)
               ->orWhere('fasilitas.deskripsi','like',$temp)
               ->orderBy('fasilitas.id_fasilitas','asc')
               ->get();
     }
     $tipekamar=tipekamar::all();
     return view('tampilfasilitas',['fasilitas'=>$fasilitas]);
   }
}
