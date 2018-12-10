@extends('adm/master')

@section('content')

<div class="row-fluid">
	<div class="span12">
		<div class="widget">
			<div class="widget-title">
				<h4><i class="icon-reorder"> </i>Noticias cadastradas</h4>
			</div>
			<div class="widget-body">
				<a href="{{ url('/adm/noticias/add') }}" class="btn btn-warning">
					<i class="icon-plus icon-white"></i> Cadastrar Nova Noticia
				</a>
				<br /><br />
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr class="table-grey-head">
							<th width="25%">Titulo</th>
							<th width="40%">Resumo</th>
							<th width="12%">Palavras Chaves</th>
						</tr>
					</thead>
					<tbody>
            @foreach($dados as $d)
						<tr class="odd gradeX">
							<td>{{ $d->noticia->titulo }}</td>
              <td>{{ $d->noticia->resumo }}</td>
              <td>{{ $d->noticia->palavras_chaves }}</td>
							<td>
								<div class="btn-group">
									<a class="btn" href="javascript:;" data-toggle="dropdown"><i class="icon-cog"></i> Ações
												</a><a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
														<span class="icon-caret-down"></span> </a>
									<ul class="dropdown-menu">
										<li>
											<a href="{{url('adm/noticias/dados/'.$d->id) }}"><i class="icon-pencil"></i> Editar</a>
										</li>
										<li>
											<a href="{{ url('adm/noticias/deletar/'.$d->id) }}"><i class="icon-remove"></i> Deletar</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
          @endforeach
					</tbody>
				</table>
				<div class="row-fluid">
					<div class="span6">
						<p style="padding-top:5px;">Total de noticias cadastradas: {{ $cont }}</p>
					</div>
					<div class="span6">
						<div class="pagination" style="text-align: right;">
								{{ $dados->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
