<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/images/logo/logo.png">
    <link rel="shortcut icon" type="image/png" href="/images/logo/logo.png">

    <title>Fafit Faculdades Integradas de Itararé</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="/css/style.css">


    <!-- Responsive stylesheet  -->
    <link rel="stylesheet" type="text/css" href="/css/responsive.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status"></div>
    </div>

    <!-- Main Header Start -->
    <header class="main-herader">
        <!-- Header top start -->
        <div class="header-topbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-8">
                        <div class="header-topbar-col clearfix">
                            <ul>
                                <li>
                                    <p><i class="fa fa-phone" aria-hidden="true"></i> Tel.: (0xx15) 3531-8484 </p>
                                </li>
                                <li>
                                    <p><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="#">secretaria@fafit.com.br</a>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 ml-auto col-md-6 col-sm-4">
                        <div class="header-topbar-col clearfix">
                            <div class="social-link-group">
                                            @if (Route::has('login'))
                                            @auth
                                                <a class="btn btn-default my-btn" href="{{ url('/adm/dashboard') }}">Painel de Administração</a>
                                            @else
                                                <a class="btn btn-default my-btn" href="{{ route('login') }}">Login</a>
                                            @endauth
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header top end -->

        <!-- Navigation -->
        <nav class="navbar navbar-expand-md nav navbar-dark">

          <div class="container">
            <div class="span4">

              <a class="navbar-brand" href="{{ url('/')}}">
                  <img src="/images/logo/logo.png" alt="">
              </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">

                <li class="nav-item active dropdown">
                    <a class="nav-link" href="{{ url('/') }}">Home <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#">Cursos <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('page/cursos') }}">Todos os Cursos</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" href="#">Professores<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('page/professor') }}">Todos Professores</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" href="#">Noticias <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('page/noticias')}}">Todas as Noticias</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('contatos')}}">Contatos</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
    </header>


@yield('content')


    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-col">
                        <img class="footer-logo" src="/images/logo/logo-2.png" alt="">
                        <p class="top-para">As Faculdades Integradas de Itararé à FAFIT-FACIC, projetadas em princípios éticos e humanísticos, têm por missão contribuir na formação integral de cidadãos, por meio da produção e difusão do conhecimento e da cultura, em um contexto de pluralidade.</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <div class="footer-col">
                        <h3>Atalhos</h3>
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('contatos')}}">Entre em Contato</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="footer-col">
                        <h3>Ultimas Noticias</h3>
                        @foreach ($dadosN as $n)

                          <div class="post-box">
                              <img src="{{url($n->caminho)}}" alt="">
                              <p>{{ Carbon\Carbon::parse($n->noticia->data)->formatLocalized('%A %d de %B de %Y')}}</p>
                              <p>{{ $n->noticia->resumo }}</p>
                          </div>

                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-col address-col">
                        <h3>Contate nos</h3>
                        <p>Para maiores informações sobre procedimentos internos (ex: solicitação de protocolos, 2ª via de boleto, rematrícula, etc.) acesse nossa base de perguntas e respostas mais frequentes e tutoriais.</p>
                        <ul>
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i>Rua: João Batista Veiga, 1725 - CEP: 18460-000 - Itararé(SP)</li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i> secretaria@fafit.com.br</li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i>Tel.: (0xx15) 3531-8484 </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Copyright Start -->
    <section class="copyright-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright-col text-center">
                        <p>©2018. Desenvolvido por <a href="#" target="_blank">Luiz Gustavo Ventura.</a> Todos os direitos reservados.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <a href="#" class="scrollup">
        <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
    </a>


    <!-- jQuery -->
    <script type="text/javascript" src="/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="/js/popper.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

    <!-- all plugins and JavaScript -->
    <script type="text/javascript" src="/js/sticky-nav.js"></script>
    <script type="text/javascript" src="/js/css3-animate-it.js"></script>
    <script type="text/javascript" src="/js/imagesloaded.min.js"></script>
    <script type="text/javascript" src="/js/jquery.filterizr.min.js"></script>
    <script type="text/javascript" src="/js/VideoPopUp.jquery.js"></script>
    <script type="text/javascript" src="/js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="/js/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="/js/jarallax.min.js"></script>
    <script type="text/javascript" src="/js/lightbox.min.js"></script>


    <!-- Main Custom JS -->
    <script type="text/javascript" src="/js/custom.js"></script>

    <!-- Color Switcher /js -->

</body>

</html>
