<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservasiConfirm extends Model
{
  protected $table='reservasi';
  protected $fillable = [
      'id_pel','id_user','id_hotel','nama_institusi','id_reservasi_status','kode_reservasi', 'periode_waktu_bayar',
      'jumlah_kamar','dewasa','anak','urutan_reservasi','tgl_reservasi',
  ];
  public function user()
  {
          return $this->belongsTo('reservasicnf');
  }

  protected $primaryKey = 'id_reservasi';
  public $timestamps = false;
}
