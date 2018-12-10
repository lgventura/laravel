<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Membro extends Model
{
  use SoftDeletes;
  protected $fillable = ['nome', 'cargos'];

  public function cpa(){
    return $this->belongsTo(Cpa::class, 'cpas_id', 'id');
  }

}
