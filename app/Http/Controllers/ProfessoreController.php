<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfessoreRequest; // chama a request para Professore
use App\Professore; // Chama o model Professore


class ProfessoreController extends Controller
{
  public function index()
  {
    $dados = Professore::paginate(5);//paginar
    $cont = Professore::get()->count();

    $titulo = "Professores";
    $url = '/adm/professor';

    $view = [
      'dados' => $dados,
      'titulo'=> $titulo,
      'url' => $url,
      'cont' => $cont,
    ];

    return view('adm/professor/lista', $view);

    //dd($dados); Depuração
    //return view('adm/Professore');
  }

  public function add(){

    $titulo = "Professores";
    $cadastrar = "Cadastrar Professor";
    $url = '/adm/professor';
    $urlCad = '/adm/professor/add';

    $view = [
        'titulo'=> $titulo,
        'cadastrar' => $cadastrar,
        'url' => $url,
        'urlCad' => $urlCad,

    ];

    return view('adm/professor/form', $view);

  }

  public function inserir(ProfessoreRequest $request){
    $dados = $request->except('_token', 'img');
    $nameFile = null;
    // Verifica se informou o arquivo e se é válido
    if ($request->hasFile('img') && $request->file('img')->isValid()) {

      // Define um aleatório para o arquivo baseado no timestamps atual
      $name = uniqid(date('HisYmd'));

      // Recupera a extensão do arquivo
      $extension = $request->img->extension();

      // Define finalmente o nome
      $nameFile = "{$name}.{$extension}";

      // Faz o upload:
      $upload = $request->img->storeAs('midias/professor', $nameFile);
    }

    $Professore = new Professore($dados);
    $Professore->img = "storage/".$upload;

    if($Professore->save()){

      return redirect('adm/professor')->with('certo', 'Professor cadastrado com sucesso');

    }else{
      return back()->with('erro', 'Erro ao cadastrar o Professor');
    }

  }

  public function deletar($id){

    if(Professore::find($id)->delete()){
      return back()->with('certo', 'Professor excluido com sucesso');
    }else{
      return back()->with('erro', 'Erro ao excluir Professor');
    }

  }

  public function dados($id){

    $dados = Professore::find($id);

    $view = [
      'dados' => $dados,
    ];

    return view('adm/professor/form', $view);

  }

  public function editar(ProfessoreRequest $request){

    $dados = $request->except('_token');

    if(Professore::find($dados['id'])->update($dados)){

      return redirect('adm/professor')->with('certo', 'Professor '.$dados['nome'].' editado com sucesso');

    }else{
      return back()->with('erro', 'Erro ao editar o Professor');
    }

  }

}
