<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CpaRequest; // chama a request para Cpa
use App\Cpa; // Chama o model Cpa
use App\Http\Requests\MembroRequest; // chama a request para Cpa
use App\Membro; // Chama o model Cpa

class CpaController extends Controller
{
  public function index()
  {
    $dados = Membro::paginate(5);//paginar
    $cont = Membro::get()->count();
    $titulo = "C.P.A";
    $url = '/adm/cpa';

    $view = [
      'dados' => $dados,
      'titulo'=> $titulo,
      'url' => $url,
      'cont' => $cont,
    ];
    

    return view('adm/cpa/lista', $view);

    //dd($dados); Depuração
    //return view('adm/Cpa');
  }

  public function add(){

    $titulo = "C.P.A";
    $cadastrar = "Cadastrar Membro";
    $url = '/adm/cpa';
    $urlCad = '/adm/cpa/add';

    $view = [
        'titulo'=> $titulo,
        'cadastrar' => $cadastrar,
        'url' => $url,
        'urlCad' => $urlCad,

    ];

    return view('adm/cpa/form', $view);

  }

  public function inserir(CpaRequest $request){

    $cpa = new Cpa();
    $cpa->descricao = $request->get('descricao');
    $cpa->save();
    $cpaid = $cpa->id;

    $membros = new Membro();
    $membros->nome = $request->get('nome');
    $membros->cargos = $request->get('cargos');
    $membros->cpas_id = $cpaid;
    $membros->save();

    if($membros->save() ){

      return redirect('adm/cpa')->with('certo', 'Membro cadastrado com sucesso');

    }else{
      return back()->with('erro', 'Erro ao cadastrar o Membro');
    }

  }

  public function deletar($id){

    if(Cpa::find($id)->delete()){
      return back()->with('certo', 'Professor excluido com sucesso');
    }else{
      return back()->with('erro', 'Erro ao excluir Professor');
    }

  }

  public function dados($id){

    $dados = Cpa::find($id);

    $view = [
      'dados' => $dados,
    ];

    return view('adm/professor/form', $view);

  }

  public function editar(CpaRequest $request){

    $dados = $request->except('_token');

    if(Cpa::find($dados['id'])->update($dados)){

      return redirect('adm/professor')->with('certo', 'Professor '.$dados['nome'].' editado com sucesso');

    }else{
      return back()->with('erro', 'Erro ao editar o Professor');
    }

  }

}
