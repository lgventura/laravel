@extends('page.master')

@section('content')


    <!-- Page Title bar -->
    <section class="defult-page-title overlay-black">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-box">
                        <h2>Professor:  <span>{{$professor->nome}}</span> </h2>
                        <p><a href="{{url('/')}}">Home</a> / <a href="{{url('page/professor')}}">Professores</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Teachers Single Start -->
    <section class="teacher-single-area">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5">
                    <div class="teacher-single-col">
                        <img src="{{"/".$professor->img}}" alt="">
                    </div>
                </div>
                <div class="col-md-7 col-sm-7">
                    <div class="teacher-single-col">
                        <div class="teacher-biography">
                            <ul>
                                <li><strong>Nome : </strong> {{ $professor->nome }}</li>
                                <li><strong>TItulação : </strong> {{$professor->titulacao}}</li>
                                <li><strong><h5>Disciplinas :</h5> </strong>
                                  <ul>
                                    @foreach ($disciplina as $d)
                                      @if ($d->professore_id == $professor->id)
                                        <li>{{ $d->nome }}</li>
                                      @endif
                                    @endforeach
                                  </ul>
                                </li>
                                <li><strong>Descrição</strong></li>
                            </ul>
                            <p>{{$professor->descricao}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

  @endsection
