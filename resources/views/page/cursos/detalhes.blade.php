@extends('page.master')

@section('content')

    <!-- Page Title bar -->
    <section class="defult-page-title overlay-black">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-box">
                        <h2><span>Curso: </span> {{$dados->nome}}</h2>
                        <p><a href="index-one.html">Home</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Course Single Start -->
    <section class="course-single-area">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="course-single-col">
                        
                        <h2>{{$dados->nome}}</h2>
                        <p>{{ $dados->descricao }}</p>
                        <div class="course-features">
                            <h3>Disciplinas</h3>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="course-features-col clearfix">
                                        <ul>
                                          @foreach ($dados->disciplinas as $d)
                                            <li>{{$d->nome}}</li>
                                          @endforeach
                                        </ul>

                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <div class="course-features-col">
                                        <img src="{{url($dados->img)}}" alt="">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
