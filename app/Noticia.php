<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Noticia extends Model
{
  use SoftDeletes;
  protected $fillable = ['titulo', 'corpo', 'resumo', 'data', 'palavras_chaves', 'eh_cpa', 'eh_coordenador'];

  public function midia(){
      return $this->hasMany(Midia::class);
  }

}
