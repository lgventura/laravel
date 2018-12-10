@extends('adm/master')

@section('content')

  <div class="row-fluid">
    <div class="span12">
      <div class="widget">
        <div class="widget-title">

          @isset($dados)
            <h4><i class="icon-pencil"> </i>
              Editar Disciplina: {{ $dados->nome }}
            @else
              <h4><i class="icon-plus"> </i>
                Cadastrar nova Disciplina
          @endisset </h4>

            </div>
            <div class="widget-body">

              <form action="@if(isset($dados)){{ url('/adm/disciplina/editar') }}@else{{ url('/adm/disciplina/inserir') }}@endif" method="post" class="form-horizontal">
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

                  <div class="control-group @if ($errors->has('Quantos Semestre tem essa disciplina?')) error @endif ">
                    <label class="control-label" for="semestres">Quantos Semestre tem essa disciplina?:</label>
                    <div class="controls">
                      <div class="input-prepend input-append">
                        <input type="text" class="span6" name="semestres" id="semestres" value="@if(isset($dados->semestres)){{$dados->semestres}}@else{{old('semestres')}}@endif"/><span class="add-on">Semestre(s)</span>
                        </div>
                        <span class="help-inline">{{ $errors->first('semestres') }}</span>
                      </div>
                    </div>

                  <div class="control-group @if ($errors->has('descricao')) error @endif">
                    <label class="control-label" for="Descricao">Descrição:</label>
                    <div class="controls">
                      <textarea name="descricao" id="descricao" class="span6" rows="6">@if(isset($dados->descricao)){{$dados->descricao}}@else{{old('descricao')}}@endif</textarea>
                        <span class="help-inline"> {{ $errors->first('descricao') }} </span>
                      </div>
                    </div>

                    <div class="control-group @if ($errors->has('ch')) error @endif">
                      <label class="control-label" for="ch">Carga Horaria:</label>
                      <div class="controls">
                        <div class="input-prepend input-append">
                          <input type="text" class="span6" name="ch" id="ch" value="@if(isset($dados->ch)){{$dados->ch}}@else{{old('ch')}}@endif"/><span class="add-on">Hora(s)</span>
                          </div>
                          <span class="help-inline"> {{ $errors->first('ch') }} </span>
                        </div>
                      </div>

                      <div class="control-group">
                         <label for="professore_id" class="control-label">Professor que ministra</label>
                         <div class="controls">
                            <select class="span6 chosen" id="professore_id" name="professore_id" data-placeholder="Escolha o Professor" tabindex="1">
                              <option value="{{$n = null}}">Sem professor</option>
                              @foreach ($prof as $p)
                                  <option value="{{$p->id}}">{{$p->nome}}</option>
                              @endforeach
                            </select>
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

              @endsection
