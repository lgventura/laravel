@extends('page.master')

@section('content')

  <!-- Slider Start -->
  <section class="main-slider-area">
    <ul class="main-slider slide">

      @foreach ($dados as $d)

        <li class="slide__item item-bg-1">
          <div class="slide-caption">
            <h2 class="slide-caption__title">{{$d->texto}}</h2>
            <img src="{{$d->img}}" alt="">

          </div>
        </li>
      @endforeach
    </ul>
  </section>

  <!-- Features Start -->
  <section class="blog-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="section-title">
            <div class="title-style">
              <h2>Quem Somos</h2>
              <div class="title-icon">
                <i class="icofont icofont-hat"></i>
              </div>
            </div>
            <p>As Faculdades Integradas de Itararé à FAFIT-FACIC, projetadas em princípios éticos e humanísticos, têm por missão contribuir na formação integral de cidadãos, por meio da produção e difusão do conhecimento e da cultura, em um contexto de pluralidade.</p>

            <p><h6>Princípios da <b>FAFIT-FACIC:</b></h6></p>
            <p><b>Igualdade:</b> Todos os indivíduos são iguais perante a sociedade, com os mesmos direitos e deveres e serão possuidores, com igualdade, ao final de cada curso, do melhor conhecimento, na respectiva especialidade.</p>
            <p><b>Qualidade:</b> O ensino e a vivência escolar são conduzidos de modo a criar as melhores e mais apropriadas oportunidades para que os indivíduos se desenvolvam na sua potencialidade, culturalmente, politicamente, socialmente, humanisticamente e profissionalmente.</p>
            <p><b>Democracia:</b> A responsabilidade pelo cumprimento desta missão estáo dividida entre alunos, professores, funcionários, administradores e comunidade, que participando crítica e enfaticamente do processo acadêmico, promovem o exercício da plena cidadania.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
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
                <li><a href="#">Radio 88,7fm - Educadora fafit <img src="images/educadora.jpg" style="width:60px; height:60px; margin-left: 30px" alt=""> </a></li>
                <li> <hr> </li>
                <li> <h5> Financiamento Estudantil</h5> </li>
                <li><a href="#">Programa Escola da Familia <img src="images/familia.jpg" style="width:90px; height:60px; margin-left:30px" alt=""> </a></li>
                <li><a href="#">FIES <img src="images/fies.jpg" style="width:80px; height:60px; margin-left: 180px" alt=""> </a></li>
                <li><a href="#">ProUni <img src="images/prouni.jpg" style="width:70px; height:60px; margin-left: 180px" alt=""> </a></li>
                <li> <hr> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="blog-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-8">
          <div class="section-title">
            <div class="title-style">
              <h2>Ultimas Noticias</h2>
              <div class="title-icon">
                <i class="icofont icofont-hat"></i>
              </div>
            </div>
            <p>Ultimas Noticias Cadastradas em nosso portal</p>
          </div>
        </div>
      </div>
      <div class="row animatedParent animateOnce">
        @foreach ($dadosN as $d)

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
    </div>
  </section>


  <!-- About Start -->

  <!-- Course Start -->
  <section class="course-area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-8">
          <div class="section-title">
            <div class="title-style">
              <h2>Alguns de Nossos Cursos</h2>
              <div class="title-icon">
                <i class="icofont icofont-hat"></i>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="row animatedParent animateOnce">
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
    </div>
  </section>

  <!-- Counter Start -->

  <!-- Teachers Start -->
  <section class="teachers-area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-8">
          <div class="section-title">
            <div class="title-style">
              <h2>Alguns de Nossos Professores</h2>
              <div class="title-icon">
                <i class="icofont icofont-hat"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row ">


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
      </div>
    </section>

  @endsection
