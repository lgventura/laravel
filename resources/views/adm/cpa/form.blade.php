@extends('adm/master')

@section('content')

  <div class="row-fluid">
    <div class="span12">
      <div class="widget">
        <div class="widget-title">

          @isset($dados)
            <h4><i class="icon-pencil"> </i>
              Editar Membro da C.P.A: {{ $dados->nome }}
            @else
              <h4><i class="icon-plus"> </i>
                Cadastrar novo Membro
          @endisset </h4>

            </div>
            <div class="widget-body">

              <form action="@if(isset($dados)){{ url('/adm/cpa/editar') }}@else{{ url('/adm/cpa/inserir') }}@endif" method="post" class="form-horizontal">
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

                  <div class="control-group @if ($errors->has('cargos')) error @endif">
                    <label class="control-label" for="titulacao">Cargo:</label>
                    <div class="controls">
                      <input type="text" class="span6" name="cargos" id="cargos" value="@if(isset($dados->cargos)){{$dados->cargos}}@else{{old('cargos')}}@endif"/>
                        <span class="help-inline"> {{ $errors->first('cargos') }} </span>
                      </div>
                    </div>

                  <div class="control-group @if ($errors->has('descricao')) error @endif">
                    <label class="control-label" for="Descricao">Descrição:</label>
                    <div class="controls">
                      <textarea name="descricao" id="descricao" class="span6" rows="6">@if(isset($dados->descricao)){{$dados->descricao}}@else{{old('descricao')}}@endif</textarea>
                        <span class="help-inline"> {{ $errors->first('descricao') }} </span>
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
