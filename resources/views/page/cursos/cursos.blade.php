@extends('page.master')

@section('content')

<body>
    <!-- Main Header Start -->
    <!-- Page Title bar -->
    <section class="defult-page-title overlay-black">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-box">
                        <h2>Nossos <span>Cursos</span></h2>
                        <p><a href="{{url('/')}}">Home</a> / <a href="{{url('page/cursos')}}">Cursos</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Course Start -->
    <section class="course-area">
        <div class="container">
            <div class="row">
                @foreach ($dadosC as $c)
                  <div class="col-lg-4 col-md-6 col-sm-6">
                      <div class="course-col">
                          <div class="course-item">
                              <div class="course-image">
                                  <img src="{{url($c->img)}}" alt="">
                              </div>
                              <h4><a href="course-single.html">{{$c->nome}}</a></h4>
                              <?php $c->descricao = substr($c->descricao, 0, strrpos(substr($c->descricao, 0, 150), ' ')) . '...'; ?>
                              <p>{{ $c->descricao }}</p>
                              <a class="btn btn-primary my-btn" href="{{url('page/cursos/detalhes/'.$c->id) }}" role="button">Detalhes</a>
                          </div>
                      </div>
                  </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="my-pagination">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                  {{ $dadosC->links() }}
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

  @endsection
