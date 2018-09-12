<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiTipe extends Model
{
  protected $table = 'tipetransaksi';

  protected $primaryKey = 'id_tipe_transaksi';
  public $timestamps = false;
}
