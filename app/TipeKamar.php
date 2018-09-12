<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipeKamar extends Model
{
  protected $table='tipekamar';

  protected $primaryKey = 'id_tipe_kamar';
  public $timestamps = false;
}
