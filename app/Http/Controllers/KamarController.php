<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipeKamar;
use App\Kamar;
use App\hotel;
use App\Kasur;


class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $kamar= Kamar::join('jeniskasur','kamar.id_kasur','=','jeniskasur.id_kasur')
              ->join('hotel','kamar.id_hotel','=','hotel.id_hotel')
              ->join('tipekamar','kamar.id_tipe_kamar','=','tipekamar.id_tipe_kamar')
              ->select('kamar.id_kamar as id_kamar','jeniskasur.jenis_kasur as jenis_kasur','hotel.alamat as alamat','kamar.nomor_ruangan as nomor_ruangan','kamar.lantai as lantai','tipekamar.tipe_kamar as tipe_kamar','kamar.kapasitas as kapasitas','kamar.harga as harga','kamar.deskripsi as deskripsi','kamar.status_merokok as status_merokok')
              ->orderBy('kamar.id_kamar','asc')
              ->get();
      $tipekamar=Tipekamar::all();
      return view('/tampiltarif',['kamar'=>$kamar,'tipekamar'=>$tipekamar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $hotel=hotel::all();
       $tipekamar=tipekamar::all();
       $jeniskasur=Kasur::all();

       return view('create',['tipekamar'=>$tipekamar,'hotel'=>$hotel,'jeniskasur'=>$jeniskasur]);
    }

    public function add(Request $request){
       $this->validate($request,[
         'floor'=>'required',
         'capacity'=>'required',
         'price'=>'required',
         'description'=>'required',
         'bedType'=>'required',
         'roomType'=>'required',
         'branch'=>'required',
         'smokingStatus'=>'required'
       ]);

       $kamar=new kamar;
       $kamar->id_kasur = $request->input('bedType');
       $kamar->gambar = '-';
       $kamar->id_hotel = $request->input('branch');
       $kamar->nomor_ruangan ='-';
       $kamar->lantai = $request->input('floor');
       $kamar->id_tipe_kamar = $request->input('roomType');
       $kamar->kapasitas = $request->input('capacity');
       $kamar->harga = $request->input('price');
       $kamar->deskripsi = $request->input('description');
       $kamar->status_merokok = $request->input('smokingStatus');
       $kamar->status_tersedia = '1';
       $kamar->save();
       return redirect('/tampil')->with('info','Room Saved Successfully');
     }

     public function update($id){
       $kamar=kamar::where('id_kamar',$id)->first();
       $hotel=hotel::all();
       $tipekamar=tipekamar::all();
       $jeniskasur=Kasur::all();
       return view('update',['kamar'=>$kamar,'hotel'=>$hotel,'jeniskasur'=>$jeniskasur,'tipekamar'=>$tipekamar]);
     }

     public function edit(Request $request,$id){
       $kamar=kamar::where('id_kamar',$id)->first();

       $this->validate($request,[
         'floor'=>'required',
         'capacity'=>'required',
         'price'=>'required',
         'description'=>'required',
         'bedType'=>'required',
         'branch'=>'required',
         'smokingStatus'=>'required'
       ]);

       $data = array('id_kamar'=>$kamar->id_kamar,
         'id_kasur'=> $request->input('bedType'),
         'id_hotel'=> $request->input('branch'),
         'nomor_ruangan'=> $kamar->nomor_ruangan,
         'lantai'=> $request->input('floor'),
         'id_tipe_kamar'=> $kamar->id_tipe_kamar,
         'kapasitas'=> $request->input('capacity'),
         'harga'=> $request->input('price'),
         'deskripsi'=> $request->input('description'),
         'status_merokok'=> $request->input('smokingStatus'),
         'status_tersedia'=> $kamar->status_tersedia,
         'gambar'=> $kamar->gambar
       );

       kamar::where('id_kamar',$id)
       ->update($data);
       return redirect('/tampil')->with('info','Room Update Successfully');
     }

     public function delete($id){
       kamar::where('id_kamar',$id)
       ->delete();
       return redirect('/tampil')->with('info','Room Delete Successfully');
     }

     public function search(Request $request){
      $temp=$request->input('search');
      if(is_null($temp)){
        $kamar= kamar::join('jeniskasur','kamar.id_kasur','=','jeniskasur.id_kasur')
                ->join('hotel','kamar.id_hotel','=','hotel.id_hotel')
                ->join('tipekamar','kamar.id_tipe_kamar','=','tipekamar.id_tipe_kamar')
                ->select('kamar.id_kamar as id_kamar','jeniskasur.jenis_kasur as jenis_kasur','hotel.alamat as alamat','kamar.nomor_ruangan as nomor_ruangan','kamar.lantai as lantai','tipekamar.tipe_kamar as tipe_kamar','kamar.kapasitas as kapasitas','kamar.harga as harga','kamar.deskripsi as deskripsi','kamar.status_merokok as status_merokok')
                ->orderBy('kamar.id_kamar','asc')
                ->get();
      }
      else{
        $kamar= kamar::join('jeniskasur','kamar.id_kasur','=','jeniskasur.id_kasur')
                ->join('hotel','kamar.id_hotel','=','hotel.id_hotel')
                ->join('tipekamar','kamar.id_tipe_kamar','=','tipekamar.id_tipe_kamar')
                ->select('kamar.id_kamar as id_kamar','jeniskasur.jenis_kasur as jenis_kasur','hotel.alamat as alamat','kamar.nomor_ruangan as nomor_ruangan','kamar.lantai as lantai','tipekamar.tipe_kamar as tipe_kamar','kamar.kapasitas as kapasitas','kamar.harga as harga','kamar.deskripsi as deskripsi','kamar.status_merokok as status_merokok')
                ->where('jeniskasur.jenis_kasur','like',$temp)
                ->orWhere('kamar.harga','like',$temp)
                ->orWhere('tipekamar.tipe_kamar','like',$temp)
                ->orderBy('kamar.id_kamar','asc')
                ->get();
      }
      $tipekamar=tipekamar::all();
      return view('tampiltarif',['kamar'=>$kamar,'tipekamar'=>$tipekamar]);
    }
}
