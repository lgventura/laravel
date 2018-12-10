<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disciplina extends Model
{
  use SoftDeletes;
  protected $fillable = ['nome', 'descricao', 'semestres', 'ch', 'professore_id'];

  public function cursos(){
    return $this->belongsToMany(Curso::class, 'cursos_has_disciplinas', 'disciplinas_id', 'cursos_id');
  }

  public function professor(){
    return $this->belongsTo(Professore::class, 'professore_id', 'id');
  }
}
