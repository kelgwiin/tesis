<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="#">
    <base href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/'; ?>" />
    <title>Gestión de la Capacidad | SIGITEC</title>
     <link rel="icon" href="<?php echo site_url('assets/back/img/favicon.ico') ?>" type="image/x-icon" />
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/sb-admin/css/bootstrap.css" >
    <!-- Add custom CSS here -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/sb-admin/css/sb-admin.css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/sb-admin/font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    
    <!-- JavaScript -->
    <script src="<?php echo base_url(); ?>assets/front/sb-admin/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>assets/front/sb-admin/js/bootstrap.js"></script>
    <!-- Page Specific Plugins -->
    <script src="<?php echo base_url(); ?>assets/front/sb-admin/js/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/front/sb-admin/js/tablesorter/jquery.tablesorter.js"></script>
    <script src="<?php echo base_url(); ?>assets/front/sb-admin/js/tablesorter/tables.js"></script>
    <script src="<?php echo base_url(); ?>assets/front/highcharts/highcharts.js"></script>
	 <script src="<?php echo base_url(); ?>assets/front/highcharts/exporting.js"></script>
    
  </head>

  <body>
  	<?php $mensajes[] = array('avatar' => 'http://placehold.it/50x50',
			  					'nombre' => 'John Smith',
								'mensaje' => "Hey, Te quería preguntar algo...Prueba Interna Mensaje. :)",
								'hora' => "4:34 PM" );
	      $num_msg = count($mensajes);
		  $alertas[] = array('alerta_id' => 1,
		  					 'prioridad' => 'Danger',
		  					 'categoria' => "Operaciones",
							 'desc' => "Alerta máxima (Prueba)");
		  $num_ale = count($alertas);
		  $nombre_usuario = "John Smith";
    ?>

    <div id="wrapper">
      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/Capacidad/">Módulo Gestión de la Capacidad</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li class="active"><a href="<?php echo base_url(); ?>"><i class="fa fa-flag"></i> Volver A Módulos Principales</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/Capacidad/"><i class="fa fa-bar-chart-o"></i> Descripción</a></li>
            <!-- Modulo de Componentes IT -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Componentes IT<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url(); ?>index.php/Capacidad/ComponentesIT/">General</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/Capacidad/ComponentesIT/Procesador/">Procesador</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/Capacidad/ComponentesIT/Memoria/">Memoria</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/Capacidad/ComponentesIT/Almacenamiento/">Almacenamiento</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/Capacidad/ComponentesIT/Redes/">Redes</a></li>
              </ul>
            </li>
            <!-- Modulo de Servicios -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Servicios<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url(); ?>index.php/Capacidad/Servicios/">General</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/Capacidad/Servicio/Servicio1/Procesador">Procesador</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/Capacidad/Servicio/Servicio1/Memoria">Memoria</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/Capacidad/Servicio/Servicio1/Almacenamiento">Almacenamiento</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/Capacidad/Servicio/Servicio1/Redes">Redes</a></li>
              </ul>
            </li>
            <!-- Modulo de Departamentos -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Departamentos<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url(); ?>index.php/Capacidad/Departamentos/">General</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/Capacidad/Departamentos/">Procesador</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/Capacidad/Departamentos/">Memoria</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/Capacidad/Departamentos/">Almacenamiento</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/Capacidad/Departamentos">Redes</a></li>
              </ul>
            </li>
            <!-- Modulo de Umbrales -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Umbrales<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url(); ?>index.php/Capacidad/Umbrales/">General</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/Capacidad/Umbrales/">Procesador</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/Capacidad/Umbrales/">Memoria</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/Capacidad/Umbrales/">Almacenamiento</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/Capacidad/Umbrales">Redes</a></li>
              </ul>
            </li>
            <!-- Gestion de la Capacidad -->
          </ul>
		  <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown messages-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              	<i class="fa fa-envelope"></i> Mensajes 
              		<span class="badge"><?php echo $num_msg; ?></span> <b class="caret"></b> <!-- Hacer una función que pregunte constantemente por mensajes para sistema -->
              </a>
              <ul class="dropdown-menu">
                <li class="dropdown-header"><?php echo $num_msg; ?> Mensajes Nuevos</li>
                <?php foreach($mensajes as $m){ ?>
                <li class="message-preview">
                  <a href="#">
                    <span class="avatar"><img src="<?php echo $m['avatar']; ?>"></span>
                    <span class="name"><?php echo $m['nombre']; ?>:</span>
                    <span class="message"><?php echo $m['mensaje']; ?></span>
                    <span class="time"><i class="fa fa-clock-o"></i> <?php echo $m['hora']; ?></span>
                  </a>
                </li>
                <li class="divider"></li>
                <?php } ?>                
                <li><a href="#">Ver Inbox <span class="badge"><?php echo $num_msg; ?></span></a></li>
              </ul>
            </li>
            <li class="dropdown alerts-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> Alertas <span class="badge"><?php echo $num_ale; ?></span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
              	<?php foreach($alertas as $a){ ?>
                <li><a href="#"><?php echo $a['desc']; ?> <span class="label label-<?php echo strtolower($a['prioridad']); ?>"><?php echo $a['categoria']; ?></span></a></li>
                <li class="divider"></li>
                <?php } ?>
                <li><a href="#">Ver Todas</a></li> <!-- Enlace a alertas -->
              </ul>
            </li>
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $nombre_usuario; ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Perfil</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge"><?php echo $num_msg; ?></span></a></li>
                <li><a href="#"><i class="fa fa-gear"></i> Preferencias</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url() ?>index.php/usuarios/cerrar-sesion"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>