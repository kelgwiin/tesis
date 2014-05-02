<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="author" content="f6rnando">
    <base href="<?php echo base_url(); ?>" />
    <title><?php echo_conditional($title,$title,'Sistema de Gestión de Infraestructuras de Tecnologías de Información') ?></title>
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-144x144-precomposed.png">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://bootsnipp.com/css/bootsnipp.css?ver=2">
    <style type="text/css">
      body
      {
        background-image: url('assets/back/img/imagen.png');
      }
      #form_div
      {
        padding: 20px 40px;
        background-color: #ffffff;
        border: 1px solid #A4A4A4;
      }
      .form-signin input[type="text"]
      {
        margin-bottom: -1px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
      }
      .form-signin input[type="password"]
      {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
      .form-signin .form-control
      {
        position: relative;
        font-size: 16px;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
      }
      .colorgraph
      {
        height: 5px;
        border-top:0;
        background: #c4e17f;
        border-radius: 5px;
        background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
      }
    </style>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.2.0/respond.js"></script>
    <![endif]-->
  </head>
  <body>
    <div id="wrap">
      <nav class="navbar navbar-default" role="navigation" style="margin-bottom: 0;">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <div class="animbrand">
              <a class="navbar-brand" href="<?php echo base_url().'index.php/usuarios/iniciar-sesion'; ?>"><?php echo $base_url_tit ?></a>
            </div>
          </div>
        </div>
      </nav>
      <div class="container">
        <div class="row">
          <div class="col-md-12" style="height: 20px">&nbsp;</div>
          <div class="col-md-8 col-md-offset-2" style="text-align: center">
            <h2><strong><?php echo $project_tit ?></strong></h2>
          </div>
        </div>
        <div class="row" style="margin-top:40px;">
          <div class="col-md-4 col-md-offset-4" id="form_div">
            <?php echo form_error('email') ?>
            <?php echo form_error('password') ?>
            <div id="jquery_formerror" style="padding: 8px; text-align: center">
              <!-- LLENA ERRORES DE VALIDACION POR JQUERY O POR PHP SI ESTA LA VARIABLA $error SETTEADA -->
              <?php echo_conditional($this->session->flashdata('error'),$this->session->flashdata('error'),'') ?>
            </div>
            <form method="POST" action="index.php/usuario/login" class="form-signin">
              <fieldset>
                <h2 class="sign-up-title">Iniciar Sesión</h2>
                <hr>
                <div id="div_email" class="form-group <?php echo (strlen(form_error('email'))) ? 'has-error' : '' ?>">
                  <input class="form-control email-title" placeholder="E-mail" name="email" type="email" value="<?php echo set_value('email') ?>" required autofocus />
                </div>
                <div id="div_pass" class="form-group <?php echo (strlen(form_error('password'))) ? 'has-error' : '' ?>" style="margin-top: -17px">
                  <input class="form-control" placeholder="Contraseña" name="password" type="password" value="<?php echo set_value('email') ?>" required />
                </div>
                <a class="pull-right" href="#">¿Olvidó la contraseña?</a>
                <div style="margin-bottom: 10px">&nbsp;</div>
                <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
                <br>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <?php echo @$usuario_login_js ?>
  </body>
</html>