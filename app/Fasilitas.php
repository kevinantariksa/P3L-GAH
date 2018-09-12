<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
  protected $table = 'fasilitas';

  protected $primaryKey = 'id_fasilitas';
  public $timestamps = false;
}
