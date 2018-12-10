<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Professore extends Model
{
  use SoftDeletes;
  protected $fillable = ['nome', 'titulacao', 'descricao', 'coordenador'];

  public function disciplina(){
      return $this->hasMany(Disciplina::class);
  }
}
