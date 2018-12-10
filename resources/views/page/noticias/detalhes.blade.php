@extends('page.master')

@section('content')
      <!-- Page Title bar -->
    <section class="defult-page-title overlay-black">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-box">
                        <h2><span>Noticia:</span> {{ $dados->noticia->titulo }}</h2>
                        <p><a href="{{url('/')}}">Home</a> / <a href="{{url('page/noticias')}}">Todas as Noticias</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Single Start -->
    <section class="blog-single-field">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="blog-single-col">
                        <img src="{{'/'.$dados->caminho}}" alt="">
                        <h3>{{$dados->noticia->resumo}}</h3>
                        <p>{{$dados->noticia->corpo}}</p>
                        <div class="form-field">
                            <form>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Seu Nome">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" placeholder="Seu E-mail">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="">
                                            <textarea class="form-control" rows="6" placeholder="Deixe um comentario..."></textarea>
                                            <button class="btn btn-default my-btn" type="submit" value="Submit Form">Enviar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                  <div class="sidebar-col">
                    <div class="sidebar-search-box">
                      <form>
                        <div class="input-group">
                          <input placeholder="Pesquisar..." class="form-control" name="search-field" type="text">
                          <span class="input-group-btn">
                            <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                          </span>
                        </div>
                      </form>
                    </div>
                    <div class="categories">
                      <div class="sidebar-title">
                        <h3>Links Uteis</h3>
                      </div>
                      <ul class="clearfix">
                        <li><a href="#">Academico Online</a></li>
                        <li><a href="#">Biblioteca Online</a></li>
                        <li><a href="#">Radio 88,7fm - Educadora fafit <img src="/images/educadora.jpg" style="width:30px; height:30px; margin-left: 10px" alt=""> </a></li>
                        <li> <hr> </li>
                        <li> <h5> Financiamento Estudantil</h5> </li>
                        <li><a href="#">Programa Escola da Familia <img src="/images/familia.jpg" style="width:60px; height:30px; margin-left:10px" alt=""> </a></li>
                        <li><a href="#">FIES <img src="/images/fies.jpg" style="width:50px; height:30px; margin-left: 165px" alt=""> </a></li>
                        <li><a href="#">ProUni <img src="/images/prouni.jpg" style="width:45px; height:30px; margin-left: 158px" alt=""> </a></li>
                        <li> <hr> </li>
                      </ul>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>
@endsection
