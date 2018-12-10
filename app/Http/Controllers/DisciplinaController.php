<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DisciplinaRequest; // chama a request para Disciplina
use App\Disciplina; // Chama o model Disciplina
use App\Professore;


class DisciplinaController extends Controller
{
  public function index()
  {
    $dados = Disciplina::paginate(5);//paginar

    $cont = Disciplina::get()->count();

    $titulo = "Diciplinas";
    $url = '/adm/disciplina';

    $view = [
      'dados' => $dados,
      'titulo'=> $titulo,
      'url' => $url,
      'cont' => $cont,
    ];

    return view('adm/disciplina/lista', $view);

  }

  public function add(){
    $prof = Professore::orderBy('nome')->get();

    $professor = [
      'prof' => $prof,
    ];

    $titulo = "Disciplinas";
    $cadastrar = "Cadastrar Disciplina";
    $url = '/adm/disciplina';
    $urlCad = '/adm/disciplina/add';

    $view = [
        'titulo'=> $titulo,
        'cadastrar' => $cadastrar,
        'url' => $url,
        'urlCad' => $urlCad,

    ];


    return view('adm/disciplina/form', $professor, $view);

  }

  public function inserir(DisciplinaRequest $request){

    $dados = $request->except('_token');
    $disciplina = new Disciplina($dados);

    if($disciplina->save()){

      return redirect('adm/disciplina')->with('certo', 'Disciplina cadastrada com sucesso');

    }else{
      return back()->with('erro', 'Erro ao cadastrar o Disciplina');
    }

  }

  public function deletar($id){

    if(Disciplina::find($id)->delete()){
      return back()->with('certo', 'Disciplina excluida com sucesso');
    }else{
      return back()->with('erro', 'Erro ao excluir Disciplina');
    }

  }

  public function dados($id){

    $dados = Disciplina::find($id);
    $prof = Professore::orderBy('nome')->get();

    $view = [
      'dados' => $dados,
      'prof'  => $prof,
    ];

    return view('adm/disciplina/form', $view);

  }

  public function editar(DisciplinaRequest $request){

    $dados = $request->except('_token');

    if(Disciplina::find($dados['id'])->update($dados)){

      return redirect('adm/disciplina')->with('certo', 'Disciplina '.$dados['nome'].' editada com sucesso');

    }else{
      return back()->with('erro', 'Erro ao editar o Disciplina');
    }

  }

}
