<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CursoRequest; // chama a request para curso
use App\Professore; // Chama o model Professore
use App\Curso;
use App\Disciplina;
use App\Midia;
use App\Membro;

class DashboardController extends Controller
{
  public function index()
  {
    $contProf = Professore::get()->count();
    $contCursos = Curso::get()->count();
    $contDis = Disciplina::get()->count();
    $contN = Midia::get()->count();
    $contM = Membro::get()->count();

    $titulo = "Dashboard";
    $url = '/adm/dashboard';
    $view = [
      'titulo'=> $titulo,
      'url' => $url,
      'contProf' => $contProf,
      'contCursos' => $contCursos,
      'contDis' => $contDis,
      'contN' => $contN,
      'contM' => $contM,
    ];

    return view('adm/dashboard', $view);
  }


}
