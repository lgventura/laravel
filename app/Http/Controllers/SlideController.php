<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SlideRequest; // chama a request para Slide
use App\Slide; // Chama o model Slide

class SlideController extends Controller
{
  public function index()
  {
    $dados = Slide::paginate(5);//paginar
    $cont = Slide::get()->count();

    $texto = "Slides";
    $url = '/adm/slides';

    $view = [
      'dados' => $dados,
      'texto'=> $texto,
      'url' => $url,
      'cont' => $cont,
    ];

    return view('adm/slides/lista', $view);

    //dd($dados); Depuração
    //return view('adm/Slide');
  }

  public function add(){

    $texto = "Slides";
    $cadastrar = "Cadastrar Slide'";
    $url = '/adm/slides';
    $urlCad = '/adm/slides/add';

    $view = [
      'cadastrar' => $cadastrar,
      'texto'=> $texto,
      'url' => $url,
      'urlCad' => $urlCad,

    ];

    return view('adm/slides/form', $view);

  }

  public function inserir(SlideRequest $request){
    //dd($request);
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
      $upload = $request->img->storeAs('midias/slides', $nameFile);
    }

    $slide = new Slide();
    $slide->texto = $request->get('texto');
    $slide->ativo = $request->get('ativo');
    $slide->img = "storage/".$upload;



    if($slide->save()){

      return redirect('adm/slides')->with('certo', 'Membro cadastrado com sucesso');

    }else{
      return back()->with('erro', 'Erro ao cadastrar o Membro');
    }

  }

  public function deletar($id){

    if(Slide::find($id)->delete()){
      return back()->with('certo', 'Slides excluido com sucesso');
    }else{
      return back()->with('erro', 'Erro ao excluir Slides');
    }

  }

  public function dados($id){

    $dados = Slide::find($id);

    $view = [
      'dados' => $dados,
    ];

    return view('adm/slides/form', $view);

  }

  public function editar(SlideRequest $request){

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
      $upload = $request->img->storeAs('midias/slides', $nameFile);
    }



    $slide = new Slide();
    $slide = Slide::find($request->get('id'));

    $slide->texto = $request->get('texto');
    $slide->ativo = $request->get('ativo');
    $slide->img = "storage/".$upload;

    if($slide->update()){

      return redirect('adm/slides')->with('certo', 'Slide editado com sucesso');

    }else{
      return back()->with('erro', 'Erro ao editar o Slides');
    }

  }

}
