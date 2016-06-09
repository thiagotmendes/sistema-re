<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','sistema Resende Chaves')</title>

    <!-- Bootstrap -->
    @section('style')
      <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
      <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
      <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }} ">

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    @show
  </head>
  <body>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">
            <img src="http://gruporesendechaves.com.br/wp-content/themes/resendechaves/images/logo.jpg" alt=""
            style="height:100% !important; float:left; margin-right:15px;" />
            Grupo Resende Chaves
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="">Olá Sr(a):
              @foreach($nome_usuario as $user)
                {{ $user }}
              @endforeach
              </a>
            </li>
            <li>
              <a href="<?= route('deslogar') ?>">Sair <i class="fa fa-sign-out" aria-hidden="true"></i></a>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          @include('include.menu')
        </div>
        <div class="col-md-9">
          @yield('container')
        </div>
      </div>
    </div>

    @section('script')
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="js/jquery-1.12.4.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.js"></script>
      <script src="js/functions.js"></script>
    @show
  </body>
</html>
