@extends('adm/master')

@section('content')


<!-- BEGIN BODY -->
<body class="fixed-top">
				<!-- BEGIN PAGE CONTENT-->
				<div id="page" class="dashboard">
                    <!-- BEGIN OVERVIEW STATISTIC BARS-->
                    <div class="row-fluid circle-state-overview">
                        <div class="span2 responsive clearfix" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle turquoise-color">
                                    <i class="icon-group"></i>
                                </div>
                                <p>
                                    <strong>{{ $contProf }}</strong>
                                    Professores
                                </p>
                            </div>
                        </div>
                        <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle red-color">
                                    <i class="icon-sitemap"></i>
                                </div>
                                <p>
                                    <strong>{{ $contCursos }}</strong>
                                    Cursos
                                </p>
                            </div>
                        </div>
                        <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle green-color">
                                    <i class="icon-book"></i>
                                </div>
                                <p>
                                    <strong>{{ $contDis }}</strong>
                                    Disciplinas
                                </p>
                            </div>
                        </div>
                        <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle gray-color">
                                    <i class="icon-list-alt"></i>
                                </div>
                                <p>
                                    <strong>{{ $contN }}</strong>
                                    Noticias
                                </p>
                            </div>
                        </div>
                        <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle purple-color">
                                    <i class="icon-heart"></i>
                                </div>
                                <p>
                                    <strong>{{ $contM }}</strong>
                                    Membros
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END OVERVIEW STATISTIC BARS-->

				<!-- END PAGE CONTENT-->
</body>
<!-- END BODY -->


@endsection
