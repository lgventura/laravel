@extends('adm/master')

@section('content')

  <div class="row-fluid">
    <div class="span12">
      <div class="widget">
        <div class="widget-title">

          @isset($dados)
            <h4><i class="icon-pencil"> </i>
              Editar Noticia
            @else
              <h4><i class="icon-plus"> </i>
                Cadastrar nova Noticia
              @endisset </h4>

            </div>
            <div class="widget-body">

              <form action="@if(isset($dados)){{ url('/adm/noticias/editar') }}@else{{ url('/adm/noticias/inserir') }}@endif" method="post" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @isset($dados)
                  <input type="hidden" name="id" value="{{ $dados->id }}">
                  <input type="hidden" name="idN" value="{{ $dados->noticia->id }}">
                @endisset

                <div class="control-group @if ($errors->has('titulo')) error @endif">
                  <label class="control-label" for="titulo">Titulo:</label>
                  <div class="controls">
                    <input type="text" class="span6" name="titulo" id="titulo" value="@if(isset($dados->noticia->titulo)){{$dados->noticia->titulo}}@else{{old('titulo')}}@endif"/>
                      <span class="help-inline"> {{ $errors->first('titulo') }} </span>
                    </div>
                  </div>

                  <div class="control-group @if ($errors->has('corpo')) error @endif">
                    <label class="control-label" for="corpo">Corpo:</label>
                    <div class="controls">
                      <textarea name="corpo" id="corpo" class="span6" rows="6">@if(isset($dados->noticia->corpo)){{$dados->noticia->corpo}}@else{{old('corpo')}}@endif</textarea>
                        <span class="help-inline"> {{ $errors->first('corpo') }} </span>
                      </div>
                    </div>

                    <div class="control-group @if ($errors->has('resumo')) error @endif">
                      <label class="control-label" for="titulacao">resumo:</label>
                      <div class="controls">
                        <input type="text" class="span6" name="resumo" id="resumo" value="@if(isset($dados->noticia->resumo)){{$dados->noticia->resumo}}@else{{old('resumo')}}@endif"/>
                          <span class="help-inline"> {{ $errors->first('resumo') }} </span>
                        </div>
                      </div>

                      <div class="control-group @if ($errors->has('palavras_chaves')) error @endif">
                        <label class="control-label" for="titulacao">palavras_chaves:</label>
                        <div class="controls">
                          <input type="text" class="span6" name="palavras_chaves" id="palavras_chaves" value="@if(isset($dados->noticia->palavras_chaves)){{$dados->noticia->palavras_chaves}}@else{{old('palavras_chaves')}}@endif"/>
                            <span class="help-inline"> {{ $errors->first('palavras_chaves') }} </span>
                          </div>
                        </div>

                        <div class="control-group @if ($errors->has('data')) error @endif">
                          <label class="control-label" for="data">data:</label>
                          <div class="controls">
                            <input class=" m-ctrl-medium date-picker" size="16" type="text" id="data" name="data" value="@if(isset($dados->noticia->data)){{$dados->noticia->data}}@else{{old('data')}}@endif" />
                            </div>
                          </div>

                        <div class="control-group">
                          <label class="control-label">É Um Membro da C.P.A?</label>
                          <div class="controls">
                            <label class="radio line">
                              <input type="radio" name="eh_cpa" id="eh_cpa" value="1"@if(isset($dados) && $dados->noticia->eh_cpa == 1)
                                {{ 'checked' }}
                              @endif
                              />
                              Sim
                            </label>
                            <label class="radio line">
                              <input type="radio" name="eh_cpa" id="eh_cpa" value="2" @if(isset($dados) && $dados->noticia->eh_cpa == 2){{ 'checked' }}@endif/>
                                Não
                              </label>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label">É Um Coordenador?</label>
                            <div class="controls">
                              <label class="radio line">
                                <input type="radio" name="eh_coordenador" id="eh_coordenador" value="1"@if(isset($dados) && $dados->noticia->eh_coordenador == 1)
                                  {{ 'checked' }}
                                @endif
                                />
                                Sim
                              </label>
                              <label class="radio line">
                                <input type="radio" name="eh_coordenador" id="eh_coordenador" value="2" @if(isset($dados) && $dados->noticia->eh_coordenador == 2){{ 'checked' }}@endif/>
                                  Não
                                </label>
                              </div>
                            </div>

                            <div class="control-group">
                                    <label class="control-label">Imagem da noticia</label>
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="admstyle/image/sem.jpeg" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                       <span class="btn btn-file"><span class="fileupload-new">Selecione a imagem da noticia</span>
                                       <span class="fileupload-exists">Selecionar</span>
                                       <input type="file" class="default" id="foto" name="foto" accept="image/*"/></span>
                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remover</a>
                                            </div>
                                        </div>
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
