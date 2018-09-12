<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kasur extends Model
{
  protected $table='jeniskasur';

  protected $primaryKey = 'id_kasur';
  public $timestamps = false;
}
