@extends('adm/master')

@section('content')

  <div class="row-fluid">
    <div class="span12">
      <div class="widget">
        <div class="widget-title">

          @isset($dados)
            <h4><i class="icon-pencil"> </i>
              Editar Curso: {{ $dados->nome }}
            @else
              <h4><i class="icon-plus"> </i>
                Cadastrar novo Curso
              @endisset </h4>

            </div>
            <div class="widget-body">

              <form action="@if(isset($dados)){{ url('/adm/curso/editar') }}@else{{ url('/adm/curso/inserir') }}@endif" method="post" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @isset($dados)
                  <input type="hidden" name="id" value="{{ $dados->id }}">
                @endisset

                <div class="control-group @if ($errors->has('nome')) error @endif">
                  <label class="control-label" for="nome">Nome:</label>
                  <div class="controls">
                    <input type="text" class="span6" name="nome" id="nome" value="@if(isset($dados->nome)){{$dados->nome}}@else{{old('nome')}}@endif"/>
                      <span class="help-inline"> {{ $errors->first('nome') }} </span>
                    </div>
                  </div>

                  <div class="control-group @if ($errors->has('descricao')) error @endif">
                    <label class="control-label" for="Descricao">Descrição:</label>
                    <div class="controls">
                      <textarea name="descricao" id="descricao" class="span6" rows="6">@if(isset($dados->descricao)){{$dados->descricao}}@else{{old('descricao')}}@endif</textarea>
                        <span class="help-inline"> {{ $errors->first('descricao') }} </span>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">Disciplinas do Curso:</label>
                      <div class="controls">
                        <select data-placeholder="Selecione as Disciplinas" class="chosen span6" multiple="multiple" tabindex="6" name="disciplina[]">
                            @foreach ($disciplinas as $d)
                              @isset($dados)
                                <option @if(in_array($d->id, $vetDisc)) selected @endif value="{{$d->id}}" >{{$d->nome}}</option>
                              @else
                                <option value="{{$d->id}}" >{{$d->nome}}</option>
                              @endisset
                            @endforeach
                        </select>
                      </div>
                    </div>


                    <div class="control-group @if ($errors->has('duracao')) error @endif ">
                      <label class="control-label" for="duracao">Duração:</label>
                      <div class="controls">
                        <div class="input-prepend input-append">
                          <input type="text" class="span6" name="duracao" id="duracao" value="@if(isset($dados->duracao)){{$dados->duracao}}@else{{old('duracao')}}@endif"/><span class="add-on">Semestre(s)</span>
                          </div>
                          <span class="help-inline">{{ $errors->first('duracao') }}</span>
                        </div>
                      </div>

                      <div class="control-group @if ($errors->has('ch_total')) error @endif">
                        <label class="control-label" for="ch_total">Carga Horaria:</label>
                        <div class="controls">
                          <div class="input-prepend input-append">
                            <input type="text" class="span6" name="ch_total" id="ch_total" value="@if(isset($dados->ch_total)){{$dados->ch_total}}@else{{old('ch_total')}}@endif"/><span class="add-on">Hora(s)</span>
                            </div>
                            <span class="help-inline"> {{ $errors->first('ch_total') }} </span>
                          </div>
                        </div>

                        <div class="control-group">
                          <label class="control-label">Imagem do Curso</label>
                          <div class="controls">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                              <div class="span4">
                                <div class="alert alert-warning">As imagens Adicionadas devem estar com o tamanho de 400x280</div>
                              <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="@if(isset($dados)){{$dados->img}}@else admstyle/image/sem.jpeg @endif" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                  <span class="btn btn-file"><span class="fileupload-new">Selecione a imagem do Curso</span>
                                  <span class="fileupload-exists">Selecionar</span>
                                  <input type="file" class="default" id="img" name="img" accept="image/*"/></span>
                                    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remover</a>
                                  </div>
                                  <span class="help-inline "> {{ $errors->first('img') }} </span>
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
