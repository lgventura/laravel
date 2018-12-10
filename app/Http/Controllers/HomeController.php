<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CursoRequest; // chama a request para curso
use App\Professore; // Chama o model Professore
use App\Curso;
use App\Disciplina;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $contProf = Professore::get()->count();
      $contCursos = Curso::get()->count();
      $contDis = Disciplina::get()->count();

      $titulo = "Dashboard";
      $url = '/adm/dashboard';
      $view = [
        'titulo'=> $titulo,
        'url' => $url,
        'contProf' => $contProf,
        'contCursos' => $contCursos,
        'contDis' => $contDis,
      ];

      return view('adm/dashboard', $view);
    }
}
