<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
  use SoftDeletes;
  protected $fillable = ['nome', 'descricao', 'duracao', 'ch_total'];
  //public $timestamps = false;

  public function disciplinas()
  {
    return $this->belongsToMany(Disciplina::class, 'cursos_has_disciplinas', 'cursos_id', 'disciplinas_id');
  }
}
