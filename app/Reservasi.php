<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
  protected $table='reservasiruangan';
  protected $fillable = [
      'id_reservasi','id_kamar','id_season','banyak_reservasi','total_harga_kamar','tgl_check_in','tgl_check_out',
  ];

  protected $primaryKey = 'id_ruangan_reservasi';
  public $timestamps = false;
}
