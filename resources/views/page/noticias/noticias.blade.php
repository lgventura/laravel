@extends('page.master')

@section('content')


  <!-- Page Title bar -->
  <section class="defult-page-title overlay-black">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="page-title-box">
            <h2><span>Noticias</span></h2>
            <p><a href="{{url('/')}}">Home</a> / <a href="{{url('page.noticias')}}">Blog</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Blog Start -->
  <section class="blog-section">
    <div class="container">
      <div class="row">
        @foreach ($dados as $d)

          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="blog-col">
              <a href="{{url('page/noticias/detalhes/'.$d->id)}}">
                <div class="blog-img">
                  <img src="{{'/'.$d->caminho}}" alt="">
                  <div class="post-date">
                    <h3>{{ Carbon\Carbon::parse($d->noticia->data)->format('d/m/Y') }}</h3>
                  </div>
                  <div class="overlay"></div>
                </div>
              </a>
              <h4><a href="{{url('page/noticias/detalhes/'.$d->id)}}">{{$d->noticia->titulo}}</a></h4>
              <p>{{$d->noticia->resumo}}</p>
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
                  {{ $dados->links() }}
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
