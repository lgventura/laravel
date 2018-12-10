<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
  <title></title>
  <base href="{{ url('') }}"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="w2net" name="author" />
  <link href="admstyle/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="admstyle/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
  <link href="admstyle/assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
  <link href="admstyle/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="admstyle/css/style.css" rel="stylesheet" />
  <link href="admstyle/css/style_responsive.css" rel="stylesheet" />
  <link href="admstyle/css/style_default.css" rel="stylesheet" id="style_color" />

  <link href="admstyle/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="admstyle/assets/gritter/css/jquery.gritter.css" />
  <link rel="stylesheet" type="text/css" href="admstyle/assets/uniform/css/uniform.default.css" />
  <link rel="stylesheet" type="text/css" href="admstyle/assets/chosen-bootstrap/chosen/chosen.css" />
  <link rel="stylesheet" type="text/css" href="admstyle/assets/jquery-tags-input/jquery.tagsinput.css" />
  <link rel="stylesheet" type="text/css" href="admstyle/assets/clockface/css/clockface.css" />
  <link rel="stylesheet" type="text/css" href="admstyle/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
  <link rel="stylesheet" type="text/css" href="admstyle/assets/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="admstyle/assets/bootstrap-timepicker/compiled/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="admstyle/assets/bootstrap-colorpicker/css/colorpicker.css" />
  <link rel="stylesheet" href="admstyle/assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
  <link rel="stylesheet" href="admstyle/assets/data-tables/DT_bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="admstyle/assets/bootstrap-daterangepicker/daterangepicker.css" />
  <link href="admstyle/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="admstyle/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
  <link href="admstyle/assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />

  <link href="admstyle/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="admstyle/css/style.css" rel="stylesheet" />
  <link href="admstyle/css/style_responsive.css" rel="stylesheet" />
  <link href="admstyle/css/style_default.css" rel="stylesheet" id="style_color" />

  <link href="admstyle/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="admstyle/assets/uniform/css/uniform.default.css" />
  <link rel="stylesheet" type="text/css" href="admstyle/assets/chosen-bootstrap/chosen/chosen.css" />

  <link rel="stylesheet" href="admstyle/assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />


  <script src="admstyle/js/jquery-1.8.3.min.js"></script>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
  <!-- BEGIN HEADER -->
  <div id="header" class="navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
      <div class="container-fluid">
        <!-- BEGIN LOGO -->
        <a class="brand" href="index.html">
          <img src="admstyle/img/logo.png" alt="" />
        </a>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="arrow"></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <div id="top_menu" class="nav notify-row">
          <!-- BEGIN NOTIFICATION -->

        </div>
        <!-- END  NOTIFICATION -->
        <div class="top-nav ">
          <ul class="nav pull-right top-menu" >
            <!-- BEGIN USER LOGIN DROPDOWN -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="username"> @auth
                    {{ Auth::user()->name }}
                @else
                    Usuário não cadastrado
                @endauth  </span>
              </a>
              <ul class="dropdown-menu">
                <li class="divider"></li>
                <li><a href="{{ route('register') }}"> <i class="icon-star"></i> Cadastrar novo Usuário</a></li>
                <li class="divider"></li>
                <li><a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-key"></i> Sair</a></li>
                <li class="divider"></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

              </ul>
            <!-- END USER LOGIN DROPDOWN -->
          </ul>
          <!-- END TOP NAVIGATION MENU -->
        </div>
      </div>
    </div>
    <!-- END TOP NAVIGATION BAR -->
  </div>
  <!-- END HEADER -->
  <!-- BEGIN CONTAINER -->
  <div id="container" class="row-fluid">
    <!-- BEGIN SIDEBAR -->
    <div id="sidebar" class="nav-collapse collapse">

      <div class="sidebar-toggler hidden-phone"></div>

      <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
      <div class="navbar-inverse">
        <form class="navbar-search visible-phone">
          <input type="text" class="search-query" placeholder="Search" />
        </form>
      </div>
      <!-- END RESPONSIVE QUICK SEARCH FORM -->
      <!-- BEGIN SIDEBAR MENU -->
      <ul class="sidebar-menu">
        <li class=""><a class="" href="{{ url('/adm/dashboard') }}"><span class="icon-box"><i class=" icon-dashboard"></i></span> Dashboard</a></li>
        <li class=""><a class="" href="{{ url('/adm/professor') }}"><span class="icon-box"><i class="icon-group"></i></span> Professores</a></li>
        <li class=""><a class="" href="{{ url('/adm/curso') }}"><span class="icon-box"><i class="icon-sitemap"></i></span> Curso</a></li>
        <li class=""><a class="" href="{{ url('/adm/disciplina') }}"><span class="icon-box"><i class="icon-book"></i></span> Disciplinas</a></li>
        <li class=""><a class="" href="{{ url('/adm/cpa') }}"><span class="icon-box"><i class="icon-briefcase"></i></span> C.P.A </a></li>
        <li class=""><a class="" href="{{ url('/adm/noticias') }}"><span class="icon-box"><i class="icon-bullhorn"></i></span> Noticias </a></li>
        <li class=""><a class="" href="{{ url('/adm/slides') }}"><span class="icon-box"><i class=" icon-magic"></i></span> Slides </a></li>
      </ul>
      <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE -->
    <div id="main-content">
      <!-- BEGIN PAGE CONTAINER-->
      <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid">
          <div class="span12">
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <h3 class="page-title">
              Painel Administrativo
              <small>Painel de administração: Fafit</small>
            </h3>
            <ul class="breadcrumb">
              <li>
                <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
              </li>
              <li>
                @isset($titulo)
                <a href="{{ url($url) }}">

                    {{ $titulo }}
                  @else
                    Dashboard
                @endisset
              </a> <span class="divider">&nbsp;</span>
              </li>
              @isset($cadastrar)
                <li><a href="{{ url($urlCad) }}">{{ $cadastrar }}</a><span class="divider-last">&nbsp;</span></li>
              @endisset

            </ul>
            <!-- END PAGE TITLE & BREADCRUMB-->

          </div>
        </div>

        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        @if (session('erro'))

          <div class="alert alert-error">
            <strong>Erro!</strong><br>
            <ul>
              {{ session('erro') }}
            </ul>
          </div>

        @endif

        @if (session('certo'))

          <div class="alert alert-success">
            <strong>Sucesso!</strong><br>
            <ul>
              {{ session('certo') }}
            </ul>
          </div>

        @endif

        <!-- Conteudo -->
        @yield('content')
      </div>
      <!-- END PAGE CONTAINER-->
    </div>
    <!-- END PAGE -->
  </div>
  <!-- END CONTAINER -->
  <!-- BEGIN FOOTER -->
  <div id="footer">
    <div class="span pull-right">
      <span class="go-top"><i class="icon-arrow-up"></i></span>
    </div>
  </div>
  <!-- END FOOTER -->
  <!-- BEGIN JAVASCRIPTS -->
  <!-- Load javascripts at bottom, this will reduce page load time -->
  <script src="admstyle/assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="admstyle/js/jquery.blockui.js"></script>
  <!-- ie8 fixes -->
  <!--[if lt IE 9]>
  <script src="js/excanvas.js"></script>
  <script src="js/respond.js"></script>
  <![endif]-->
  <script type="text/javascript" src="admstyle/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
  <script type="text/javascript" src="admstyle/assets/uniform/jquery.uniform.min.js"></script>
  <script src="admstyle/assets/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
  <script type="text/javascript" src="admstyle/assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
  <script src="admstyle/js/scripts.js"></script>



 <script type="text/javascript" src="admstyle/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
 <script type="text/javascript" src="admstyle/assets/uniform/jquery.uniform.min.js"></script>
 <script type="text/javascript" src="admstyle/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
 <script type="text/javascript" src="admstyle/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
 <script type="text/javascript" src="admstyle/assets/clockface/js/clockface.js"></script>
 <script type="text/javascript" src="admstyle/assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
 <script type="text/javascript" src="admstyle/assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
 <script type="text/javascript" src="admstyle/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
 <script type="text/javascript" src="admstyle/assets/bootstrap-daterangepicker/date.js"></script>
 <script type="text/javascript" src="admstyle/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
 <script type="text/javascript" src="admstyle/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
 <script type="text/javascript" src="admstyle/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
 <script type="text/javascript" src="admstyle/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
 <script src="admstyle/assets/fancybox/source/jquery.fancybox.pack.js"></script>
 <script src="admstyle/js/scripts.js"></script>

  <script>
  jQuery(document).ready(function() {
    // initiate layout and plugins
    App.init();

  });
  </script>
  <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
