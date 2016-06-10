<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Resende chaves</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="container">
      <div class="col-md-4 col-md-offset-4 form-login">
        <div class="text-center">
          <img src="http://gruporesendechaves.com.br/wp-content/themes/resendechaves/images/logo.jpg" alt="" />
        </div>
        <?php if($_GET['msg']): ?>
          <div class="alert alert-danger" style="margin:10px 0;"> Erro ao tentar efetuar o Login <br /> tente novamente preenchendo os campos abaixo corretamente </div>
        <?php endif; ?>
        <form class="" action="<?= route('geralogin') ?>" method="post">
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" id="" placeholder="">
          </div>
          <div class="form-group">
            <label for="">Senha</label>
            <input type="password" name="senha" class="form-control" id="" placeholder="">
            <?= csrf_field(); ?>

          </div>
          <button type="submit" name="button" class="btn btn-primary">Logar</button>
        </form>

      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.12.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
  </body>
</html>
