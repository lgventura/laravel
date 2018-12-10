<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Midia extends Model
{
  use SoftDeletes;
  protected $fillable = ['caminho'];

  public function noticia(){
    return $this->belongsTo(Noticia::class, 'noticias_id', 'id');
  }

}
