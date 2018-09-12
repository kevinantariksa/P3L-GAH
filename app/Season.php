<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
  protected $table='season';

  protected $primaryKey = 'id_season';
  public $timestamps = false;
}
