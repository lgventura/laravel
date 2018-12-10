<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Noticia;
use App\Midia;
use App\Curso;
use App\Professore;
use App\Disciplina;

class PageController extends Controller
{
  public function index()
  {

      $dados = Slide::where('ativo', '=', 1)->get();
      $dadosN = Midia::orderBy('id' , 'desc')->take(3)->get();
      $dadosC = Curso::inRandomOrder()->take(6)->get();
      $dadosP = Professore::inRandomOrder()->take(4)->get();

      $view = [
        'dados' => $dados,
        'dadosN' => $dadosN,
        'dadosC' => $dadosC,
        'dadosP' => $dadosP,
      ];

      //dd($view);
      return view('page.inicio.index', $view);
  }

  public function cursos()
  {
      $dadosN = Midia::orderBy('id' , 'desc')->take(3)->get();
      $dadosC = Curso::paginate(3);

      $view = [
        'dadosN' => $dadosN,
        'dadosC' => $dadosC,
      ];

      return view('page.cursos.cursos', $view);
  }

  public function detalhesC($id)
  {
      $dadosN = Midia::orderBy('id' , 'desc')->take(3)->get();
      $dados = Curso::with(['disciplinas'])->find($id);

      $view = [
        'dadosN' => $dadosN,
        'dados' => $dados,
      ];

      return view('page.cursos.detalhes', $view);
  }

  public function professor()
  {
      $dadosN = Midia::orderBy('id' , 'desc')->take(3)->get();
      $dadosP = Professore::orderBy('nome')->paginate(4);

      $view = [
        'dadosN' => $dadosN,
        'dadosP' => $dadosP,
      ];

      return view('page.professores.professor', $view);
  }

  public function detalhesP($id)
  {
      $dadosN = Midia::orderBy('id' , 'desc')->take(3)->get();
      $disciplina = disciplina::get();
      $professor = Professore::find($id);


      $view = [
        'dadosN' => $dadosN,
        'professor' => $professor,
        'disciplina' => $disciplina,
      ];


      return view('page.professores.detalhes', $view);
  }

  public function noticias()
  {
      $dadosN = Midia::orderBy('id' , 'desc')->take(3)->get();
      $dados = Midia::orderBy('id', 'desc')->paginate(6);

      $view = [
        'dadosN' => $dadosN,
        'dados' => $dados,
      ];

      return view('page.noticias.noticias', $view);
  }

  public function detalhesN($id)
  {
      $dadosN = Midia::orderBy('id' , 'desc')->take(3)->get();
      $dados = Midia::find($id);


      $view = [
        'dadosN' => $dadosN,
        'dados' => $dados,
      ];


      return view('page.noticias.detalhes', $view);
  }
  public function contatos()
  {

      $dadosN = Midia::orderBy('id' , 'desc')->take(3)->get();

      $view = [

        'dadosN' => $dadosN,

      ];


      return view('page.contatos', $view);
  }
}
