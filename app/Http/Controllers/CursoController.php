<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CursoRequest; // chama a request para curso
use App\Curso; // Chama o model curso
use App\Disciplina;
use DB;


class CursoController extends Controller
{
  public function index()
  {
    $dados = Curso::paginate(5);//paginar

    $cont = Curso::get()->count();

    $titulo = "Cursos";
    $url = '/adm/curso';
    //$dados = Curso::orderBy('nome')->paginate(3);   "Código para ordenar a exibição"

    //$dados  = Curso::orderBy('nome')
    //->where('id', '=', '2')
    //->paginate(3);

    $view = [
      'dados' => $dados,
      'titulo'=> $titulo,
      'url' => $url,
      'cont' => $cont,
    ];

    return view('adm/curso/lista', $view);

    //dd($dados); Depuração
    //return view('adm/curso');
  }

  public function add(){

    $disciplinas = Disciplina::orderBy('nome')->get();

    $titulo = "Cursos";
    $cadastrar = "Cadastrar Curso";
    $url = '/adm/curso';
    $urlCad = '/adm/curso/add';

    $view = [
      'titulo'=> $titulo,
      'cadastrar' => $cadastrar,
      'url' => $url,
      'urlCad' => $urlCad,

      'disciplinas'  => $disciplinas,

    ];

    return view('adm/curso/form', $view);

  }

  public function inserir(CursoRequest $request){
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
      $upload = $request->img->storeAs('midias/cursos', $nameFile);
    }

    DB::beginTransaction();

    try {

      $curso = new Curso($dados);
      $curso->img = "storage/".$upload;
      $curso->save();

      $curso->disciplinas()->attach($dados['disciplina']);

      DB::commit();
      return redirect('adm/curso')->with('certo', 'Curso cadastrado com sucesso');

    } catch (\Exception $e) {
      DB::rollback();
      return back()->with('erro', 'Erro ao cadastrar o Curso');
    }

  }

  public function deletar($id){

    if(Curso::find($id)->delete()){
      return back()->with('certo', 'Curso excluido com sucesso');
    }else{
      return back()->with('erro', 'Erro ao excluir Curso');
    }

  }

  public function dados($id){

    $dados = Curso::with(['disciplinas'])->find($id);
    $disciplinas = Disciplina::orderBy('nome')->get();

    $titulo = "Cursos";
    $cadastrar = "Editar Curso";
    $url = '/adm/curso';
    $urlCad = '/adm/curso';

    $vetDisc = [];

    foreach ($dados->disciplinas as $d) {
      $vetDisc[] = $d->id;
    }

    $view = [
      'titulo'=> $titulo,
      'cadastrar' => $cadastrar,
      'url' => $url,
      'urlCad' => $urlCad,

      'disciplinas'  => $disciplinas,
      'vetDisc' => $vetDisc,
      'dados' => $dados,
    ];

    return view('adm/curso/form', $view);

  }

  public function editar(CursoRequest $request){

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
      $upload = $request->img->storeAs('midias/slides', $nameFile);
    }

    DB::beginTransaction();

    try {

      $curso = Curso::find($dados['id']);
      $curso->img = "storage/".$upload;
      $curso->nome = $dados['nome'];
      $curso->descricao = $dados['descricao'];
      $curso->duracao = $dados['duracao'];
      $curso->ch_total = $dados['ch_total'];
      $curso->update();
      $curso->disciplinas()->sync($dados['disciplina']);
      DB::commit();
      return redirect('adm/curso')->with('certo', 'Curso '.$dados['nome'].' editado com sucesso');

    } catch (\Exception $e) {
      DB::rollback();
      return back()->with('erro', 'Erro ao editar o Curso');
    }

  }

}
