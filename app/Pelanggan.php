<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Pelanggan extends Model
{
  protected $table = 'pelanggan';
  protected $fillable = [
      'id_role','email','nama','no_identitas', 'telp','alamat',
  ];

  protected $primaryKey = 'id_pel';
  public $timestamps = false;
}
