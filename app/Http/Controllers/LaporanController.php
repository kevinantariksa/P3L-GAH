<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Carbon\Carbon;
use PdfReport;

use App\Kamar;
use App\Reservasi;
use App\ReservasiConfirm;
use App\tipeKamar;
use App\PermintaanSpesial;
use App\Fasilitas;
use App\TransaksiTipe;
use App\Transaksi;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/reportindex');
    }

    public function pelanggan()
    {
            //$pegawai = Auth::guard('pegawai')->user();
            $sysdate = Carbon::now();
            $getYear =$sysdate->year;
            $count = 0;
            for($i = 0; $i<13; $i++){
                if($i == 0){
                    $januari = DB::table('users')
                                        ->whereMonth('created_at', '01')
                                        ->whereYear('created_at', $getYear)
                                        ->count();
                    $count = $count + $januari;
                }else
                if($i == 1){
                    $februari = DB::table('users')
                                        ->whereMonth('created_at', '02')
                                        ->whereYear('created_at', $getYear)
                                        ->count();
                    $count = $count + $februari;
                }else
                if($i == 2){
                    $maret = DB::table('users')
                                        ->whereMonth('created_at', '03')
                                        ->whereYear('created_at', $getYear)
                                        ->count();
                    $count = $count + $maret;
                }else
                if($i == 3){
                    $april = DB::table('users')
                                        ->whereMonth('created_at', '04')
                                        ->whereYear('created_at',$getYear)
                                        ->count();
                    $count = $count + $april;
                }else
                if($i == 4){
                    $mei = DB::table('users')
                                        ->whereMonth('created_at', '05')
                                        ->whereYear('created_at', $getYear)
                                        ->count();
                    $count = $count + $mei;
                }else
                if($i == 5){
                    $juni = DB::table('users')
                                        ->whereMonth('created_at', '06')
                                        ->whereYear('created_at', $getYear)
                                        ->count();
                    $count = $count + $juni;
                }else
                if($i == 6){
                    $juli = DB::table('users')
                                        ->whereMonth('created_at', '07')
                                        ->whereYear('created_at', $getYear)
                                        ->count();
                    $count = $count + $juli;
                }else
                if($i == 7){
                    $agustus = DB::table('users')
                                        ->whereMonth('created_at', '08')
                                        ->whereYear('created_at', $getYear)
                                        ->count();
                    $count = $count + $agustus;
                }else
                if($i == 8){
                    $september = DB::table('users')
                                        ->whereMonth('created_at', '09')
                                        ->whereYear('created_at', $getYear)
                                        ->count();
                    $count = $count + $september;
                }else
                if($i == 9){
                    $oktober = DB::table('users')
                                        ->whereMonth('created_at', '10')
                                        ->whereYear('created_at', $getYear)
                                        ->count();
                    $count = $count + $oktober;
                }else
                if($i == 10){
                    $november = DB::table('users')
                                        ->whereMonth('created_at', '11')
                                        ->whereYear('created_at', $getYear)
                                        ->count();
                    $count = $count + $november;
                }else
                if($i == 11){
                    $desember = DB::table('users')
                                        ->whereMonth('created_at', '12')
                                        ->whereYear('created_at', $getYear)
                                        ->count();
                    $count = $count + $desember;
                }
            }

            return view('/reportcustomer', compact('getYear', 'count','januari','februari','maret',
                        'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'november', 'oktober', 'desember'));

    }

    public function pendapatan2()
    {

      //hitung berdasarkan kamar + Supossed to be jumlah manusia disini
      $sysdate = Carbon::now();
      $getYear =$sysdate->year;
      $countsup = 0;
      $countdd= 0;
      $countexec= 0;
      $countjs= 0;
      $total=0;

      $cscountsup = 0;
      $cscountdd= 0;
      $cscountexec= 0;
      $cscountjs= 0;
      $totalcs=0;


                $superiorpersonal = DB::table('reservasiruangan')
                                    ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                    ->join('kamar','reservasiruangan.id_kamar','=','kamar.id_kamar')
                                    ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                    ->where('reservasi.id_reservasi_tipe','=',1)
                                    ->orWhere('kamar.id_tipe_kamar','=',1)
                                    ->sum('reservasiruangan.total_harga_kamar');
            $superiorgrup = DB::table('reservasiruangan')
                                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                  ->join('kamar','reservasiruangan.id_kamar','=','kamar.id_kamar')
                                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                  ->where('reservasi.id_reservasi_tipe','=',2)
                                  ->orWhere('kamar.id_tipe_kamar','=',1)
                                  ->sum('reservasiruangan.total_harga_kamar');
            $countsup = $superiorpersonal+$superiorgrup;


            $deluxepersonal = DB::table('reservasiruangan')
                                ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                ->join('kamar','reservasiruangan.id_kamar','=','kamar.id_kamar')
                                ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                ->where('reservasi.id_reservasi_tipe','=',1)
                                ->orWhere('kamar.id_tipe_kamar','=',2)
                                ->sum('reservasiruangan.total_harga_kamar');
        $deluxegrup = DB::table('reservasiruangan')
                              ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                              ->join('kamar','reservasiruangan.id_kamar','=','kamar.id_kamar')
                              ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                              ->where('reservasi.id_reservasi_tipe','=',2)
                              ->orWhere('kamar.id_tipe_kamar','=',2)
                              ->sum('reservasiruangan.total_harga_kamar');
        $countdd = $deluxepersonal+$deluxegrup;


        $execpersonal = DB::table('reservasiruangan')
                            ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                            ->join('kamar','reservasiruangan.id_kamar','=','kamar.id_kamar')
                            ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                            ->where('reservasi.id_reservasi_tipe','=',1)
                            ->orWhere('kamar.id_tipe_kamar','=',3)
                            ->sum('reservasiruangan.total_harga_kamar');
    $execgrup = DB::table('reservasiruangan')
                          ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                          ->join('kamar','reservasiruangan.id_kamar','=','kamar.id_kamar')
                          ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                          ->where('reservasi.id_reservasi_tipe','=',2)
                          ->orWhere('kamar.id_tipe_kamar','=',3)
                          ->sum('reservasiruangan.total_harga_kamar');
    $countexec = $execpersonal+$execgrup;


    $jspersonal = DB::table('reservasiruangan')
                        ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                        ->join('kamar','reservasiruangan.id_kamar','=','kamar.id_kamar')
                        ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                        ->where('reservasi.id_reservasi_tipe','=',1)
                        ->orWhere('kamar.id_tipe_kamar','=',4)
                        ->sum('reservasiruangan.total_harga_kamar');
$jsgrup = DB::table('reservasiruangan')
                      ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                      ->join('kamar','reservasiruangan.id_kamar','=','kamar.id_kamar')
                      ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                      ->where('reservasi.id_reservasi_tipe','=',2)
                      ->orWhere('kamar.id_tipe_kamar','=',4)
                      ->sum('reservasiruangan.total_harga_kamar');
$countjs = $jspersonal+$jsgrup;

//////////////////////////////////////////////////////////////////////////////////CUSTOMEER
//////////////////////////////////////////////////////////////////////////////////CUSTOMEER
//////////////////////////////////////////////////////////////////////////////////CUSTOMEER$
$cssuperiorpersonal = DB::table('reservasiruangan')
                    ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                    ->join('kamar','reservasiruangan.id_kamar','=','kamar.id_kamar')
                    ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                    ->where('reservasi.id_reservasi_tipe','=',1)
                    ->orWhere('kamar.id_tipe_kamar','=',1)
                    ->sum('reservasi.dewasa','reservasi,anak');
$cssuperiorgrup = DB::table('reservasiruangan')
                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                  ->join('kamar','reservasiruangan.id_kamar','=','kamar.id_kamar')
                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                  ->where('reservasi.id_reservasi_tipe','=',2)
                  ->orWhere('kamar.id_tipe_kamar','=',1)
                  ->sum('reservasi.dewasa','reservasi,anak');
$cscountsup = $cssuperiorpersonal+$cssuperiorgrup;


$csdeluxepersonal = DB::table('reservasiruangan')
                ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                ->join('kamar','reservasiruangan.id_kamar','=','kamar.id_kamar')
                ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                ->where('reservasi.id_reservasi_tipe','=',1)
                ->orWhere('kamar.id_tipe_kamar','=',2)
                ->sum('reservasi.dewasa','reservasi,anak');
$csdeluxegrup = DB::table('reservasiruangan')
              ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
              ->join('kamar','reservasiruangan.id_kamar','=','kamar.id_kamar')
              ->whereYear('reservasiruangan.tgl_check_in', $getYear)
              ->where('reservasi.id_reservasi_tipe','=',2)
              ->orWhere('kamar.id_tipe_kamar','=',2)
              ->sum('reservasi.dewasa','reservasi,anak');
$cscountdd = $csdeluxepersonal+$csdeluxegrup;


$csexecpersonal = DB::table('reservasiruangan')
            ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
            ->join('kamar','reservasiruangan.id_kamar','=','kamar.id_kamar')
            ->whereYear('reservasiruangan.tgl_check_in', $getYear)
            ->where('reservasi.id_reservasi_tipe','=',1)
            ->orWhere('kamar.id_tipe_kamar','=',3)
            ->sum('reservasi.dewasa','reservasi,anak');
$csexecgrup = DB::table('reservasiruangan')
          ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
          ->join('kamar','reservasiruangan.id_kamar','=','kamar.id_kamar')
          ->whereYear('reservasiruangan.tgl_check_in', $getYear)
          ->where('reservasi.id_reservasi_tipe','=',2)
          ->orWhere('kamar.id_tipe_kamar','=',3)
          ->sum('reservasi.dewasa','reservasi,anak');
$cscountexec = $csexecpersonal+$csexecgrup;


$cjspersonal = DB::table('reservasiruangan')
        ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
        ->join('kamar','reservasiruangan.id_kamar','=','kamar.id_kamar')
        ->whereYear('reservasiruangan.tgl_check_in', $getYear)
        ->where('reservasi.id_reservasi_tipe','=',1)
        ->orWhere('kamar.id_tipe_kamar','=',4)
        ->sum('reservasi.dewasa','reservasi,anak');
$cjsgrup = DB::table('reservasiruangan')
      ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
      ->join('kamar','reservasiruangan.id_kamar','=','kamar.id_kamar')
      ->whereYear('reservasiruangan.tgl_check_in', $getYear)
      ->where('reservasi.id_reservasi_tipe','=',2)
      ->orWhere('kamar.id_tipe_kamar','=',4)
      ->sum('reservasi.dewasa','reservasi,anak');
$cscountjs = $cjspersonal+$cjsgrup;

        $total = $countsup+$countdd+$countjs+$countexec;
        $totalcs = $cscountsup+$cscountdd+$cscountjs+$cscountexec;

      return view('/reportkamar', compact('getYear', 'total','countsup','countjs','countdd','countjs','countexec','superiorgrup','superiorpersonal','deluxegrup'
    ,'deluxepersonal','execgrup','execpersonal','jsgrup','jspersonal','cssuperiorgrup','cssuperiorpersonal','csdeluxegrup'
  ,'csdeluxepersonal','csexecgrup','csexecpersonal','cjsgrup','cjspersonal','totalcs','cscountsup','cscountjs','cscountdd','cscountjs','cscountexec'));
    }


    public function pendapatan1()
    {
      //pendapatan per jenis tammu grup/personal
      $sysdate = Carbon::now();
      $getYear =$sysdate->year;
      $count = 0;
      $count2 = 0;
      for($i = 0; $i<13; $i++){
          if($i == 0){
              $januari = DB::table('reservasiruangan')
                                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                  ->whereMonth('reservasiruangan.tgl_check_in', '01')
                                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                  ->where('reservasi.id_reservasi_tipe','=',1)
                                  ->sum('reservasiruangan.total_harga_kamar');
              $count = $count + $januari;

              $januari2 = DB::table('reservasiruangan')
                                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                  ->whereMonth('reservasiruangan.tgl_check_in', '01')
                                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                  ->where('reservasi.id_reservasi_tipe','=',2)
                                  ->sum('reservasiruangan.total_harga_kamar');
              $count2 = $count2 + $januari2;

          }else
          if($i == 1){
              $februari =  DB::table('reservasiruangan')
                                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                  ->whereMonth('reservasiruangan.tgl_check_in', '02')
                                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                  ->where('reservasi.id_reservasi_tipe','=',1)
                                  ->sum('reservasiruangan.total_harga_kamar');
              $count = $count + $februari;

              $februari2 =  DB::table('reservasiruangan')
                                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                  ->whereMonth('reservasiruangan.tgl_check_in', '02')
                                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                  ->where('reservasi.id_reservasi_tipe','=',2)
                                  ->sum('reservasiruangan.total_harga_kamar');
              $count2 = $count2 + $februari2;
          }else
          if($i == 2){
              $maret = DB::table('reservasiruangan')
                                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                  ->whereMonth('reservasiruangan.tgl_check_in', '03')
                                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                  ->where('reservasi.id_reservasi_tipe','=',1)
                                  ->sum('reservasiruangan.total_harga_kamar');
              $count = $count + $maret;

              $maret2 = DB::table('reservasiruangan')
                                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                  ->whereMonth('reservasiruangan.tgl_check_in', '03')
                                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                  ->where('reservasi.id_reservasi_tipe','=',2)
                                  ->sum('reservasiruangan.total_harga_kamar');
              $count2 = $count2 + $maret2;
          }else
          if($i == 3){
              $april = DB::table('reservasiruangan')
                                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                  ->whereMonth('reservasiruangan.tgl_check_in', '04')
                                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                  ->where('reservasi.id_reservasi_tipe','=',1)
                                  ->sum('reservasiruangan.total_harga_kamar');
              $count = $count + $april;

              $april2 = DB::table('reservasiruangan')
                                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                  ->whereMonth('reservasiruangan.tgl_check_in', '04')
                                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                  ->where('reservasi.id_reservasi_tipe','=',2)
                                  ->sum('reservasiruangan.total_harga_kamar');
              $count2 = $count2 + $april2;
          }else
          if($i == 4){
              $mei = DB::table('reservasiruangan')
                                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                  ->whereMonth('reservasiruangan.tgl_check_in', '05')
                                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                  ->where('reservasi.id_reservasi_tipe','=',1)
                                  ->sum('reservasiruangan.total_harga_kamar');
              $count = $count + $mei;
              $mei2 = DB::table('reservasiruangan')
                                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                  ->whereMonth('reservasiruangan.tgl_check_in', '05')
                                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                  ->where('reservasi.id_reservasi_tipe','=',2)
                                  ->sum('reservasiruangan.total_harga_kamar');
              $count2 = $count2 + $mei2;
          }else
          if($i == 5){
              $juni = DB::table('reservasiruangan')
                                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                  ->whereMonth('reservasiruangan.tgl_check_in', '06')
                                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                  ->where('reservasi.id_reservasi_tipe','=',1)
                                  ->sum('reservasiruangan.total_harga_kamar');
              $count = $count + $juni;
              $juni2 = DB::table('reservasiruangan')
                                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                  ->whereMonth('reservasiruangan.tgl_check_in', '06')
                                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                  ->where('reservasi.id_reservasi_tipe','=',2)
                                  ->sum('reservasiruangan.total_harga_kamar');
              $count2 = $count2 + $juni2;
          }else
          if($i == 6){
              $juli =DB::table('reservasiruangan')
                                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                  ->whereMonth('reservasiruangan.tgl_check_in', '07')
                                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                  ->where('reservasi.id_reservasi_tipe','=',1)
                                  ->sum('reservasiruangan.total_harga_kamar');
              $count = $count + $juli;

              $juli2 =DB::table('reservasiruangan')
                                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                  ->whereMonth('reservasiruangan.tgl_check_in', '07')
                                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                  ->where('reservasi.id_reservasi_tipe','=',2)
                                  ->sum('reservasiruangan.total_harga_kamar');
              $count2 = $count2 + $juli2;
          }else
          if($i == 7){
              $agustus =DB::table('reservasiruangan')
                                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                  ->whereMonth('reservasiruangan.tgl_check_in', '08')
                                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                  ->where('reservasi.id_reservasi_tipe','=',1)
                                  ->sum('reservasiruangan.total_harga_kamar');
              $count = $count + $agustus;
              $agustus2 =DB::table('reservasiruangan')
                                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                  ->whereMonth('reservasiruangan.tgl_check_in', '08')
                                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                  ->where('reservasi.id_reservasi_tipe','=',2)
                                  ->sum('reservasiruangan.total_harga_kamar');
              $count2 = $count2 + $agustus2;
          }else
          if($i == 8){
              $september = DB::table('reservasiruangan')
                                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                  ->whereMonth('reservasiruangan.tgl_check_in', '09')
                                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                  ->where('reservasi.id_reservasi_tipe','=',1)
                                  ->sum('reservasiruangan.total_harga_kamar');
              $count = $count + $september;
              $september2 = DB::table('reservasiruangan')
                                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                  ->whereMonth('reservasiruangan.tgl_check_in', '09')
                                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                  ->where('reservasi.id_reservasi_tipe','=',2)
                                  ->sum('reservasiruangan.total_harga_kamar');
              $count2 = $count2 + $september2;
          }else
          if($i == 9){
              $oktober = DB::table('reservasiruangan')
                                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                  ->whereMonth('reservasiruangan.tgl_check_in', '10')
                                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                  ->where('reservasi.id_reservasi_tipe','=',1)
                                  ->sum('reservasiruangan.total_harga_kamar');
              $count = $count + $oktober;
              $oktober2 = DB::table('reservasiruangan')
                                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                  ->whereMonth('reservasiruangan.tgl_check_in', '10')
                                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                  ->where('reservasi.id_reservasi_tipe','=',2)
                                  ->sum('reservasiruangan.total_harga_kamar');
              $count2 = $count2 + $oktober2;
          }else
          if($i == 10){
              $november = DB::table('reservasiruangan')
                                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                  ->whereMonth('reservasiruangan.tgl_check_in', '11')
                                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                  ->where('reservasi.id_reservasi_tipe','=',1)
                                  ->sum('reservasiruangan.total_harga_kamar');
              $count = $count + $november;
              $november2 = DB::table('reservasiruangan')
                                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                  ->whereMonth('reservasiruangan.tgl_check_in', '11')
                                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                  ->where('reservasi.id_reservasi_tipe','=',2)
                                  ->sum('reservasiruangan.total_harga_kamar');
              $count2 = $count2 + $november2;
          }else
          if($i == 11){
              $desember = DB::table('reservasiruangan')
                                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                  ->whereMonth('reservasiruangan.tgl_check_in', '12')
                                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                  ->where('reservasi.id_reservasi_tipe','=',1)
                                  ->sum('reservasiruangan.total_harga_kamar');
              $count = $count + $desember;
              $desember2 = DB::table('reservasiruangan')
                                  ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                  ->whereMonth('reservasiruangan.tgl_check_in', '12')
                                  ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                  ->where('reservasi.id_reservasi_tipe','=',2)
                                  ->sum('reservasiruangan.total_harga_kamar');
              $count2 = $count2 + $desember2;
          }
      }
      $cjan= $januari+$januari2;
      $cfeb= $februari+$februari2;
      $cmar= $maret+$maret2;
      $capr= $april+$januari2;
      $cmei= $mei+$mei2;
      $cjun= $juni+$juni2;
      $cjul= $juli+$juli2;
      $cagt= $agustus+$agustus2;
      $csep= $september+$september2;
      $cokt= $oktober+$oktober2;
      $cnov= $november+$november2;
      $cdes= $desember+$desember2;
      $ctot=$count+$count2;

      return view('/reportincome', compact('getYear', 'count','januari','februari','maret',
                  'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'november', 'oktober', 'desember',
                  'count2','januari2','februari2','maret2',
                              'april2', 'mei2', 'juni2', 'juli2', 'agustus2', 'september2', 'november2', 'oktober2', 'desember2',
                            'cjan','cfeb','cmar','capr','cmei','cjun','cjul','cagt','csep','cokt','cnov','cdes','ctot'));

    }


    public function branch()
    {
      //pendapatan per canbang
      //
      $sysdate = Carbon::now();
      $getYear =$sysdate->year;
      $count = 0;

                $jogja = DB::table('reservasiruangan')
                                    ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                    ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                    ->where('reservasi.id_hotel','=',1)
                                    ->sum('reservasiruangan.total_harga_kamar');


                      $bandung = DB::table('reservasiruangan')
                                          ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                                          ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                                          ->where('reservasi.id_hotel','=',2)
                                          ->sum('reservasiruangan.total_harga_kamar');
                      $count = $jogja + $bandung;



      return view('/reportcabang', compact('getYear', 'count','jogja','bandung'));
    }



    public function tipe()
      {
        //best customer
        // select pelanggan.namauser as nama, sum(total) as total
        // from reservasi join reservasiruangan join user join pelanggan
        // groupby id_user
        // orderby total asc
        // limit 5
        // ambilnya pake foreach
        $sysdate = Carbon::now();
        $getYear =$sysdate->year;
        $customer =  DB::table('reservasiruangan')
                            ->join('reservasi','reservasiruangan.id_reservasi','=','reservasi.id_reservasi')
                            ->join('users','reservasi.id_user','=','users.id_user')
                            ->join('pelanggan','users.id_pel','=','pelanggan.id_pel')
                            ->join('transaksi','reservasi.id_reservasi','=','transaksi.id_reservasi')
                            ->select('pelanggan.nama AS nama',DB::raw('SUM(reservasiruangan.total_harga_kamar) as total'))
                            ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                            ->where('reservasi.id_pel','>=','1')
                            ->orWhere('reservasi.id_reservasi_status','=','2')
       ->whereYear('reservasiruangan.tgl_check_in', $getYear)
                            ->orWhere('reservasi.id_reservasi_status','=','4')
                            ->groupBy('nama')
                            ->orderBy('total','desc')
                            ->limit(5)
                            ->get();
          // dd($customer);

          return view('/reportType',compact('customer','getYear'));
      }


    public function displayReport(Request $request) {
    // Retrieve any filters
    $fromDate = $request->input('from_date');
    $toDate = $request->input('to_date');
    $sortBy = $request->input('sort_by');

    // Report title
    $title = 'Registered User Report';

    // For displaying filters description on header
    $meta = [
        'Registered on' => $fromDate . ' To ' . $toDate,
        'Sort By' => $sortBy
    ];

    // Do some querying..
    $queryBuilder = User::select(['name', 'balance', 'registered_at'])
                        ->whereBetween('registered_at', [$fromDate, $toDate])
                        ->orderBy($sortBy);

    // Set Column to be displayed
    $columns = [
        'Name' => 'name',
        'Registered At', // if no column_name specified, this will automatically seach for snake_case of column name (will be registered_at) column from query result
        'Total Balance' => 'balance',
        'Status' => function($result) { // You can do if statement or any action do you want inside this closure
            return ($result->balance > 100000) ? 'Rich Man' : 'Normal Guy';
        }
    ];

    /*
        Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).

        - of()         : Init the title, meta (filters description to show), query, column (to be shown)
        - editColumn() : To Change column class or manipulate its data for displaying to report
        - editColumns(): Mass edit column
        - showTotal()  : Used to sum all value on specified column on the last table (except using groupBy method). 'point' is a type for displaying total with a thousand separator
        - groupBy()    : Show total of value on specific group. Used with showTotal() enabled.
        - limit()      : Limit record to be showed
        - make()       : Will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
    */
    return PdfReport::of($title, $meta, $queryBuilder, $columns)
                    ->editColumn('Registered At', [
                        'displayAs' => function($result) {
                            return $result->registered_at->format('d M Y');
                        }
                    ])
                    ->editColumn('Total Balance', [
                        'displayAs' => function($result) {
                            return thousandSeparator($result->balance);
                        }
                    ])
                    ->editColumns(['Total Balance', 'Status'], [
                        'class' => 'right bold'
                    ])
                    ->showTotal([
                        'Total Balance' => 'point' // if you want to show dollar sign ($) then use 'Total Balance' => '$'
                    ])
                    ->limit(20)
                    ->stream(); // or download('filename here..') to download pdf
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
