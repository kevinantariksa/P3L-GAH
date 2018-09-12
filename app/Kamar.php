<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table='kamar';

    protected $primaryKey = 'id_kamar';
    public $timestamps = false;
}
