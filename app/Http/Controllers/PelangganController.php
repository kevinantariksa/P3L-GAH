<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pelanggan;
use App\Kamar;
use App\TransaksiTipe;
use App\ReservasiConfirm;
use App\Transaksi;
use App\Reservasi;
use App\PermintaanSpesial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        $user = Auth::user();
         $profile = Pelanggan::find($user->id_pel);
         $kamar= Kamar::get();
         // dd($profile);
         return view('profile', ['prof' => $profile, 'kamar' => $kamar]);
     }
    public function index2()
    {
       // $user = Auth::user();
       //  $profile = Pelanggan::find($user->id_pel);

        // dd($profile);
        return view('isiDataTransfer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('reservasiConfirm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current = Carbon::now();
        $current->format('Y-m-d');

      $pelanggan=  new Pelanggan;
      $pelanggan->nama= $request->nama;
      $pelanggan->email= $request->email;
      $pelanggan->no_identitas= $request->no_identitas;
      $pelanggan->alamat= $request->alamat;
      $pelanggan->telp= $request->telp;
      $pelanggan->id_role= $request->id_role;


      $transaksi = new Transaksi;
      $idrsv=ReservasiConfirm::orderBy('id_reservasi','desc')->limit(1)->first();
      $idrsvr=Reservasi::orderBy('id_reservasi','desc')->limit(1)->first();
      $spesial=PermintaanSpesial::orderBy('id_reservasi','desc')->limit(1)->first();
      $transaksi->id_reservasi = $idrsv->id_reservasi;
      $transaksi->id_transaksi_tipe = 1;
      $transaksi->id_peg= 6;
      $transaksi->id_status_transaksi=1;
      $transaksi->id_ruangan_reservasi=$idrsvr->id_ruangan_reservasi;
      $transaksi->id_permintaan_spesial=$spesial->id_permintaan_spesial;
      $transaksi->tanggal_transaksi =$current;
      $transaksi->deposit = 300000;
      $transaksi->jumlah_uang=300000;


      $transaksitipe = new TransaksiTipe;
      $transaksitipe->id_jenis_transaksi = 1;
      $transaksitipe->nama = $request->nama;
      $transaksitipe->nomor_kartu = $request->kartu;
      $pelanggan-> save();
      $transaksi->save();
      $transaksitipe->save();


      //Auth::loginUsingId($user->getAuthIdentifier());
        return redirect('/')->with('alert','Saved Successfully');
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
     public function edit()
    {
      $user = Auth::user();
      $pelanggan = Pelanggan::find($user->id_pel);

      //if(!$blog)
      //abort(404);
      //dd('not found!');

      //dd($blog
      // dd($pelanggan);
      return view('editPelanggan', [ 'dataPelanggan' => $pelanggan]);
    }

    public function update(Request $request)
    {
      $user = Auth::user();
      $pelanggan = Pelanggan::find($user->id_pel);

      $user_data['pelanggan']['email'] = $user->email;
      $user_data['pelanggan']['nama'] = $request->nama;
      $user_data['pelanggan']['no_identitas'] = $request->no_identitas;
      $user_data['pelanggan']['telp'] = $request->telp;
      $user_data['pelanggan']['alamat'] = $request->alamat;
      $pelanggan->update($user_data['pelanggan']);
      // $pelanggan-> save();

      $userData= User::find($user->id_pel);
      $user_data['user']['email'] = $request->email;
      // dd($user_data);
      $userData->update($user_data['user']);
      //dd('success');
      return redirect('/profile');
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

    public function history(){
      $resersvStatus1=2;
      $resersvStatus2=4;

      $user = Auth::user();
      $profile = Pelanggan::find($user->id_pel);
      $reservasi= reservasiConfirm::join('hotel','reservasi.id_hotel','=','hotel.id_hotel')
                                    ->join('pelanggan','reservasi.id_pel','=','pelanggan.id_pel')
                                    ->join('tipereservasi','reservasi.id_reservasi_tipe','=','tipereservasi.id_reservasi_tipe')
                                    ->select('reservasi.id_reservasi','reservasi.kode_reservasi','pelanggan.nama as nama','hotel.alamat as alamat','tipereservasi.reservasi_tipe as tipereservasi','reservasi.dewasa','reservasi.anak','reservasi.tgl_reservasi')
                                    ->where('reservasi.id_pel',$user->id_pel)
                                    ->where('reservasi.id_reservasi_status',$resersvStatus1)
                                    ->get();
      return view('history',['reservasi'=>$reservasi]);
    }

    public function cancel($id){
      reservasiConfirm::where('id_reservasi',$id)
      ->update(['id_reservasi_status'=>3]);
      return redirect('/history')->with('info','Cancel Reservation Successfully');
    }

    public function editReservasiRuangan($id){
      $reservasi=reservasiConfirm::where('id_reservasi',$id)->first();
      $reservasiRuangan=Reservasi::where('id_reservasi',$id)->first();
      $ruangan=Kamar::join('reservasiruangan','reservasiruangan.id_kamar','=','kamar.id_kamar')
                    ->join('tipekamar','kamar.id_tipe_kamar','=','tipekamar.id_tipe_kamar')
                    ->select('kamar.id_kamar','kamar.nomor_ruangan','tipekamar.tipe_kamar')
                    ->where('reservasiruangan.tgl_check_in','<=',$reservasiRuangan->tgl_check_in)
                    ->where('reservasiruangan.tgl_check_out','>=',$reservasiRuangan->tgl_check_in)
                    ->orwhere('reservasiruangan.tgl_check_in','<=',$reservasiRuangan->tgl_check_out)
                    ->where('reservasiruangan.tgl_check_out','>=',$reservasiRuangan->tgl_check_out)
                    ->get();

      return view('editReservasiRuangan',['reservasiRuangan'=>$reservasiRuangan,'ruangan'=>$ruangan,'reservasi'=>$reservasi]);
    }
    public function editReservasi(Request $request,$id){

      $this->validate($request,[
        'adult'=>'required',
        'child'=>'required',
        'room'=>'required',
        'totalRoom'=>'required',
      ]);

      $dewasa=$request->input('adult');
      $anak=$request->input('child');
      $id_kamar=$request->input('room');
      $total=$request->input('totalRoom');

      $kamar=Kamar::where('id_kamar',$id_kamar)->first();
      $reservasiRuangan=Reservasi::where('id_reservasi',$id)->first();

      $tempPriceNow=$kamar->harga*$total;
      $tempPriceOld=$reservasiRuangan->total_harga_kamar;

      if($tempPriceNow>=$tempPriceOld){
        $newTotal=$tempPriceNow-$tempPriceOld;
        $text='Update Successfully, but have to pay again IDR '.$newTotal;
      }else{
        $text='Update Successfully, you dont need to pay anymore';
      }

      reservasiConfirm::where('id_reservasi',$id)
                      ->update(['dewasa'=>$dewasa,'anak'=>$anak,'jumlah_kamar'=>$total]);
      reservasi::where('id_reservasi',$id)
                ->update(['id_kamar'=>$id_kamar,'total_harga_kamar'=>$tempPriceNow]);

      return redirect('/history')->with('info',$text);

    }
}
