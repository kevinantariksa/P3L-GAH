<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Pegawai extends Model
{
  protected $table = 'pegawai';
  protected $fillable = [
      'id_role','telp','email','nama','id_hotel'
  ];

  protected $primaryKey = 'id_peg';
  public $timestamps = false;
}
