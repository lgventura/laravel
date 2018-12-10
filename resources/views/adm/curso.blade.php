@extends('adm/master')

@section('content')
  <div class="row-fluid">
  	<div class="span12">
  		<div class="widget">
  			<div class="widget-title">
  				<h4><i class="icon-reorder"> </i>Cursos cadastrados</h4>
  			</div>
  			<div class="widget-body">
  				<a href="form_curso.php" class="btn btn-warning">
  					<i class="icon-plus icon-white"></i> Cadastrar Curso
  				</a>
  				<br /><br />
  				<table class="table table-striped table-bordered table-hover">
  					<thead>
  						<tr class="table-grey-head">
  							<th width="22%">Curso</th>
  							<th width="13%">Descrição</th>
  							<th width="12%">Duração</th>
  							<th width="10%">Total Carga Horario</th>
  							<th width="10%">Ações</th>
  						</tr>
  					</thead>
  					<tbody>
  						<tr class="odd gradeX">
  							<td>Administração</td>
  							<td>Administração de pequenas medias e grandes empresas</td>
  							<td>8 semestres</td>
  							<td>360 hrs</td>
  							<td>
  								<div class="btn-group">
  									<a class="btn" href="javascript:;" data-toggle="dropdown"><i class="icon-cog"></i> Ações</a><a class="btn dropdown-toggle" data-toggle="dropdown" href="#"><span class="icon-caret-down"></span> </a>
  									<ul class="dropdown-menu">
  										<li>
  											<a href="#"><i class="icon-pencil"></i> Editar</a>
  										</li>
  										<li>
  											<a href="#"><i class="icon-remove"></i> Deletar</a>
  										</li>
  									</ul>
  								</div>
  							</td>
  						</tr>
  					</tbody>
  				</table>
  				<div class="row-fluid">
  					<div class="span6">
  						<p style="padding-top:5px;">Total de curso:  1</p>
  					</div>
  					<div class="span6">
  						<div class="pagination" style="text-align: right;">
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>

  <link rel="stylesheet" type="text/css" href="admstyle/assets/gritter/css/jquery.gritter.css" />
  <script type="text/javascript" src="admstyle/assets/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript">
  @endsection
