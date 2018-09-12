<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  protected $table = 'role';
  protected $fillable = [

  ];

  

  protected $primaryKey = 'id_role';
  public $timestamps = false;
}
