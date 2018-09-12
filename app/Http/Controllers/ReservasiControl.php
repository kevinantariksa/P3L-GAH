<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

use App\Kamar;
use App\Reservasi;
use App\ReservasiConfirm;
use App\tipeKamar;
use App\PermintaanSpesial;
use App\Fasilitas;
use App\TransaksiTipe;
use App\Transaksi;

class ReservasiControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $login=Auth::user();
        $fasilitas=Fasilitas::get();
        $user_data = $request->all();
        $current = Carbon::now();
        $generate=$current->format('dmy');
        $cekin =Carbon::parse($user_data['tanggalCheckin']);
        $cekout =Carbon::parse($user_data['tanggalCheckout']);
        $lama = $cekin ->diffInDays($cekout);
        $cekin2 =Carbon::parse($user_data['tanggalCheckin'])->format('Y-m-d');
        $cekout2 =Carbon::parse($user_data['tanggalCheckout'])->format('Y-m-d');
        if ($lama==0) {
          $lama=1;
        }
        $kamar= Kamar::get()->first();
        $tipekamar= tipeKamar::get();



        $reservasiconf = new ReservasiConfirm;
        $reservasiconf->id_pel= $request->id_pel;
        $reservasiconf->id_peg= $lama;
        $reservasiconf->id_user= $request->id_user;
        $reservasiconf->id_hotel= $request->id_hotel;
        $reservasiconf->nama_institusi= $request->nama_institusi;
        $reservasiconf->id_reservasi_status= $request->id_reservasi_status;
        $reservasiconf->id_reservasi_tipe= $request->id_reservasi_tipe;
        $reservasiconf->kode_reservasi= $request->kode_reservasi;
        $reservasiconf->periode_waktu_bayar= $request->periode_waktu_bayar;
        $reservasiconf->jumlah_kamar= $request->jumlah_kamar;
        $reservasiconf->dewasa= $request->dewasa;
        $reservasiconf->anak= $request->anak;
        $reservasiconf->urutan_reservasi= $request->urutan_reservasi;
        $reservasiconf->tgl_reservasi= $current;
        $reservasiconf->save();





        $reservasiview = ReservasiConfirm::get()->last();
        return view('reservasi',[ 'generate' => $generate,
        'data' => $user_data,'lama' => $lama,
        'kamar' => $kamar, 'tipekamar' => $tipekamar, 'reservasiconf' => $reservasiconf, 'reservasiview' => $reservasiview,
        'cekin' => $cekin2, 'cekout'=>$cekout2,'fasilitas'=>$fasilitas,
       ]);
    }
     public function index2()
     {
       $kode = ReservasiConfirm::max('id_reservasi');
       $kode = $kode+1;
         return view('index',compact('kode'));
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tampil()
    {
      $reservasi = Reservasi::orderBy('id_reservasi','desc')->limit(1)->get();
      $reservasiconf = ReservasiConfirm::orderBy('id_reservasi','desc')->limit(1)->get();
      $fct = PermintaanSpesial::orderBy('id_reservasi','desc')->limit(1)->get();

      return view('reservasiConfirm',[ 'reservasi' => $reservasi,'reservasiconf'=> $reservasiconf,'fct'=>$fct]);
    }

    public function Check()
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
      $reservasi =new Reservasi;
      $reservasiconf = ReservasiConfirm::get()->last();
      $reservasi->id_reservasi = $request->id_reservasi;
      $reservasi->id_kamar = $request->tipekamar;
      $reservasi->id_season = $request->id_season;
      $reservasi->banyak_reservasi = $request->banyak_reservasi;
      $banyak = $reservasi->banyak_reservasi;
      $temp = $request->tipekamar;
      $lama = $reservasiconf->id_peg;
      if ($temp == 1) {
        $reservasi->total_harga_kamar = 500000*$lama*$banyak;
      }

      elseif ($temp == 2) {
        $reservasi->total_harga_kamar = 600000*$lama*$banyak;
      }
      elseif ($temp == 3) {
        $reservasi->total_harga_kamar = 700000*$lama*$banyak;
      }
      else {
        $reservasi->total_harga_kamar = 800000*$lama*$banyak;
      }

      $reservasi->tgl_check_in = $request->tanggalCheckin;
      $reservasi->tgl_check_out = $request->tanggalCheckout;
      $reservasi-> save();


      $reservasiconf->kode_reservasi= $request->kode_reservasi;
      $reservasiconf->jumlah_kamar= $request->banyak_reservasi;
      $reservasiconf->save();

      $permintaanKhsus = new PermintaanSpesial;
      $permintaanKhsus->id_reservasi = $request->id_reservasi;
      $permintaanKhsus->id_fasilitas = $request->idfasilitas;
      $permintaanKhsus->jumlah = $request->jumlah;
      $fas = $request->idfasilitas;
  $fct = PermintaanSpesial::orderBy('id_reservasi','desc')->limit(1)->first();
      if ($fas == 1){
          $permintaanKhsus->total_harga = 150000*$banyak;}
      elseif($fas == 2){
        $permintaanKhsus->total_harga = 10000*$banyak;}

      elseif ($fas == 3){
        $permintaanKhsus->total_harga = 25000*$banyak;}

      elseif ($fas == 4){
        $permintaanKhsus->total_harga = 75000*$banyak;}

      elseif ($fas == 5){
        $permintaanKhsus->total_harga = 20000*$banyak;}

      elseif ($fas == 6){
       $permintaanKhsus->total_harga = 50000*$banyak;}

      elseif ($fas == 7){
        $permintaanKhsus->total_harga = 100000*$banyak;}

      elseif ($fas == 8){
        $permintaanKhsus->total_harga = 100000*$banyak;}

      elseif ($fas == 9){
        $permintaanKhsus->total_harga = 200000*$banyak;}

      elseif ($fas == 10){
        $permintaanKhsus->total_harga = 150000*$banyak;}

      elseif ($fas == 11){
        $permintaanKhsus->total_harga = 10000*$banyak;
      }
      else{
        $permintaanKhsus->total_harga = 25000*$banyak;
        }


      $permintaanKhsus->save();


      $ttl= $permintaanKhsus->total_harga+$reservasi->total_harga_kamar;

      return view('reservasiConfirm',[ 'reservasi' => $reservasi, 'reservasiconf'=> $reservasiconf, 'permintaanKhsus' =>$permintaanKhsus,'fct'=>$fct,'lama'=>$lama,'ttl'=>$ttl]);
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

     public function ed()
     {
       $kode = ReservasiConfirm::max('id_reservasi');
       $kode = $kode+1;

       $reservasi = Reservasi::orderBy('id_reservasi','desc')->limit(1)->get();
       $reservasiconf = ReservasiConfirm::orderBy('id_reservasi','desc')->limit(1)->get();

         return view('/editreservasi',compact('kode','reservasi','reservasiconf'));

     }
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
        $permintaanKhsus = PermintaanSpesial::where('id_reservasi',$id)->delete();
        $hapusreservasi = Reservasi::where('id_reservasi',$id)->delete();
        $hapusreservasi2 = ReservasiConfirm::where('id_reservasi',$id)->delete();

        dd('suceed');
        return view('/history')->with('info','Reservation has been canceled successfully');

    }

    public function search(Request $request)
   {
      $keyword = $request->search;

      $reservasi = ReservasiConfirm::where('kode_reservasi', 'LIKE', "%$keyword%")->first();

       //$reservasi->appends($request->only('keyword'));
    //dd($reservasi);
       return view('hasilcari', compact('reservasi',$reservasi));
   }

   public function cari()
   {

     return view('searchReservasi');
   }


   public function history()
   {
     $now = Carbon::now()->format('Y-m-d');
     $reservasi = DB::table('reservasi')
            ->join('reservasiruangan', 'reservasi.id_reservasi', '=', 'reservasiruangan.id_reservasi')
            ->join('kamar','reservasiruangan.id_kamar','=','kamar.id_kamar')
            ->join('tipekamar','kamar.id_tipe_kamar','=','tipekamar.id_tipe_kamar')
            ->where('reservasi.id_user','=','2')
            ->select('reservasi.*', 'reservasiruangan.*','kamar.*','tipekamar.*')
            ->distinct()
            ->get();
    //dd($now);

      return view('showhistory',compact('reservasi',$reservasi,'now',$now));
   }

   public function cancel()
   {
     dd('succeed');
   }

   public function form($id)
   {
     $reservasi=Reservasi::where('id_reservasi', $id);
     return view('ulangrsv',['reservasi'=>$reservasi]);
   }

   public function repeatrsv($id)
   {
     $fasilitas=Fasilitas::get();
     $user_data = $request->all();
     $current = Carbon::now();
     $generate=$current->format('dmy');
     $cekin =Carbon::parse($user_data['tanggalCheckin']);
     $cekout =Carbon::parse($user_data['tanggalCheckout']);
     $lama = $cekin ->diffInDays($cekout);
     $cekin2 =Carbon::parse($user_data['tanggalCheckin'])->format('Y-m-d');
     $cekout2 =Carbon::parse($user_data['tanggalCheckout'])->format('Y-m-d');
     if ($lama==0) {
       $lama=1;
     }
     $kamar= Kamar::get()->first();
     $tipekamar= tipeKamar::get();

     $reservasiconf = new ReservasiConfirm;
     $reservasiconf->id_pel= $request->id_pel;
     $reservasiconf->id_peg= $request->id_peg;
     $reservasiconf->id_user= $request->id_user;
     $reservasiconf->id_hotel= $request->id_hotel;
     $reservasiconf->nama_institusi= $request->nama_institusi;
     $reservasiconf->id_reservasi_status= $request->id_reservasi_status;
     $reservasiconf->id_reservasi_tipe= $request->id_reservasi_tipe;
     $reservasiconf->kode_reservasi= $request->kode_reservasi;
     $reservasiconf->periode_waktu_bayar= $request->periode_waktu_bayar;
     $reservasiconf->jumlah_kamar= $request->jumlah_kamar;
     $reservasiconf->dewasa= $request->dewasa;
     $reservasiconf->anak= $request->anak;
     $reservasiconf->urutan_reservasi= $request->urutan_reservasi;
     $reservasiconf->tgl_reservasi= $current;
     $reservasiconf->save();

     $reservasiview = ReservasiConfirm::get()->last();
     return view('reservasi',[ 'generate' => $generate,
     'data' => $user_data,'lama' => $lama,
     'kamar' => $kamar, 'tipekamar' => $tipekamar, 'reservasiconf' => $reservasiconf, 'reservasiview' => $reservasiview,
     'cekin' => $cekin2, 'cekout'=>$cekout2,'fasilitas'=>$fasilitas,
    ]);

   }


}
