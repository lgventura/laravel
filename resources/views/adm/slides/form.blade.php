@extends('adm/master')

@section('content')

  <div class="row-fluid">
    <div class="span12">
      <div class="widget">
        <div class="widget-title">

          @isset($dados)
            <h4><i class="icon-pencil"> </i>
              Editar Slides: {{ $dados->nome }}
            @else
              <h4><i class="icon-plus"> </i>
                Cadastrar novo Membro
              @endisset </h4>

            </div>
            <div class="widget-body">

              <form action="@if(isset($dados)){{ url('/adm/slides/editar') }}@else{{ url('/adm/slides/inserir') }}@endif" method="post" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @isset($dados)
                  <input type="hidden" name="id" value="{{ $dados->id }}">
                @endisset

                <div class="control-group @if ($errors->has('texto')) error @endif">
                  <label class="control-label" for="texto">Titulo do Slide:</label>
                  <div class="controls">
                    <input type="text" class="span6" name="texto" id="texto" value="@if(isset($dados->texto)){{$dados->texto}}@else{{old('texto')}}@endif"/>
                      <span class="help-inline"> {{ $errors->first('texto') }} </span>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Imagem do Slide</label>
                    <div class="controls">
                      <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="span4">


                        <div class="alert alert-warning">As imagens Adicionadas devem estar com o tamanho de 1920x1280</div>

                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                          <img src="@if(isset($dados)){{$dados->img}}@else admstyle/image/sem.jpeg @endif" alt="" />
                          </div>
                          <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                          <div>
                            <span class="btn btn-file"><span class="fileupload-new">Selecione a imagem do slide</span>
                            <span class="fileupload-exists">Selecionar</span>
                            <input type="file" class="default" id="img" name="img" accept="image/*"/></span>
                              <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remover</a>
                            </div>
                            <span class="help-inline "> {{ $errors->first('img') }} </span>
                          </div>
                          </div>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">Slide Ativo?</label>
                        <div class="controls">
                          <label class="radio line">
                            <input type="radio" name="ativo" id="ativo" value="1"@if(isset($dados) && $dados->ativo == 1)
                              {{ 'checked' }}
                            @endif
                            />
                            Sim
                          </label>
                          <label class="radio line">
                            <input type="radio" name="ativo" id="ativo" value="2" @if(isset($dados) && $dados->ativo == 2){{ 'checked' }}@endif/>
                              Não
                            </label>
                          </div>
                        </div>


                        <div class="form-actions">
                          <button type="submit" class="btn blue"><i class="icon-ok"></i> Salvar</button>
                          <a href="Curso.php">ou cancelar</a>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <script src="admstyle/js/jquery-1.8.2.min.js"></script>
                <script type="text/javascript" src="admstyle/assets/ckeditor/ckeditor.js"></script>
                <script src="admstyle/assets/bootstrap/js/bootstrap.min.js"></script>
                <script type="text/javascript" src="admstyle/assets/bootstrap/js/bootstrap-fileupload.js"></script>
                <script src="admstyle/js/jquery.blockui.js"></script>


              @endsection
