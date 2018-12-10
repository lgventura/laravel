<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professore;
use App\Disciplina;

class TesteController extends Controller
{
  /*  public function teste()
    {
      $prof = Professore::with(['disciplina'])->get();

      $dis = Disciplina::with(['professor'])->get();

    }*/

    $dis = Disciplina::with(['cursos'])->get();

    $retorno = '';
    foreach ($dis as $d) {
      $retorno .= $d->nome. '<br>';

      foreach ($d->cursos as $c) {
        $retorno .= '---- Curso: '.$c->nome.'<br>';
      }
    }
}
