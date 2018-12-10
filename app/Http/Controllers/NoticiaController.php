<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NoticiaRequest; // chama a request para Noticia
use App\Noticia; // Chama o model Noticia
use App\Http\Requests\MembroRequest; // chama a request para Noticia
use App\Midia; // Chama o model Noticia
use Carbon\Carbon;

class NoticiaController extends Controller
{
  public function index()
  {
    $dados = Midia::paginate(5);//paginar
    $cont = Midia::get()->count();

    $titulo = "Noticias";
    $url = '/adm/noticias';

    $view = [
      'dados' => $dados,
      'titulo'=> $titulo,
      'url' => $url,
      'cont' => $cont,
    ];

    return view('adm/noticias/lista', $view);

    //dd($dados); Depuração
    //return view('adm/Noticia');
  }

  public function add(){

    $titulo = "Noticias";
    $cadastrar = "Cadastrar Noticia'";
    $url = '/adm/noticia';
    $urlCad = '/adm/noticia/add';

    $view = [
      'cadastrar' => $cadastrar,
      'titulo'=> $titulo,
      'url' => $url,
      'urlCad' => $urlCad,

    ];

    return view('adm/noticias/form', $view);

  }

  public function inserir(NoticiaRequest $request){
    $data = Carbon::parse($request->get('data'))->format('Y-m-d');
    $not = new Noticia();
    $not->titulo = $request->get('titulo');
    $not->corpo = $request->get('corpo');
    $not->resumo = $request->get('resumo');
    $not->data = $data;
    $not->palavras_chaves = $request->get('palavras_chaves');
    $not->eh_cpa = $request->get('eh_cpa');
    $not->eh_coordenador = $request->get('eh_coordenador');
    $not->save();
    $noticiaId = $not->id;

    $nameFile = null;
    // Verifica se informou o arquivo e se é válido
    if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

      // Define um aleatório para o arquivo baseado no timestamps atual
      $name = uniqid(date('HisYmd'));

      // Recupera a extensão do arquivo
      $extension = $request->foto->extension();

      // Define finalmente o nome
      $nameFile = "{$name}.{$extension}";

      // Faz o upload:
      $upload = $request->foto->storeAs('midias/noticias', $nameFile);
    }

    $mid = new Midia();
    $mid->caminho = "storage/".$upload;
    $mid->Noticias_id = $noticiaId;

    // Verifica se informou o arquivo e se é válido
    $mid->save();

    if($mid->save() ){

      return redirect('adm/noticias')->with('certo', 'Membro cadastrado com sucesso');

    }else{
      return back()->with('erro', 'Erro ao cadastrar o Membro');
    }

  }

  public function deletar($id){

    if(Noticia::find($id)->delete()){
      return back()->with('certo', 'Noticia excluido com sucesso');
    }else{
      return back()->with('erro', 'Erro ao excluir Noticia');
    }

  }

  public function dados($id){

    $dados = Midia::find($id);

    $view = [
      'dados' => $dados,
    ];

    return view('adm/noticias/form', $view);

  }

  public function editar(NoticiaRequest $request){

    $data = Carbon::parse($request->get('data'))->format('Y-m-d');
    $not = new Noticia();
    $not = Noticia::find($request->get('idN'));

    $not->titulo = $request->get('titulo');
    $not->corpo = $request->get('corpo');
    $not->resumo = $request->get('resumo');
    $not->data = $data;
    $not->palavras_chaves = $request->get('palavras_chaves');
    $not->eh_cpa = $request->get('eh_cpa');
    $not->eh_coordenador = $request->get('eh_coordenador');
    $not->update();

    $nameFile = null;
    // Verifica se informou o arquivo e se é válido
    if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

      // Define um aleatório para o arquivo baseado no timestamps atual
      $name = uniqid(date('HisYmd'));

      // Recupera a extensão do arquivo
      $extension = $request->foto->extension();

      // Define finalmente o nome
      $nameFile = "{$name}.{$extension}";

      // Faz o upload:
      $upload = $request->foto->storeAs('midias/noticias', $nameFile);
    }else{
      $upload = "sem foto";
    }

    $mid = new Midia();
    $mid = Midia::find($request->get('id'));
    $mid->caminho = "storage/".$upload;
    $mid->Noticias_id = $not->id;

    // Verifica se informou o arquivo e se é válido
    if($mid->update() ){

      return redirect('adm/noticias')->with('certo', 'Noticia Editada com sucesso');

    }else{
      return back()->with('erro', 'Erro ao cadastrar o Membro');
    }

  }

}
