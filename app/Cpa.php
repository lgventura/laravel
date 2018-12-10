<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cpa extends Model
{
  use SoftDeletes;
  protected $fillable = ['descricao'];

  public function membro(){
      return $this->hasMany(Membro::class);
  }

}
