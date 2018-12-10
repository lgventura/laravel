@extends('page.master')

@section('content')


    <!-- Page Title bar -->
    <section class="defult-page-title overlay-black">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-box">
                        <h2>Nossos <span>Professores</span></h2>
                        <p><a href="{{url('/')}}">Home</a> / <a href="{{url('page/professor')}}">Professores</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Teachers Start -->
    <section class="teachers-area">
        <div class="container">
            <div class="row">
                @foreach ($dadosP as $p)

                  <div class="col-lg-3 col-md-6 col-sm-6">
                      <div class="teachers-col">
                          <a href="{{url('page/professor/detalhes/'.$p->id)}}"><div class="teacher-img">
                              <img src="{{url($p->img)}}" alt="">
                          </div></a>
                          <h4><a href="{{url('page/professor/detalhes/'.$p->id)}}">{{$p->nome}}</a></h4>
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
                                {{ $dadosP->links() }}
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

  @endsection
