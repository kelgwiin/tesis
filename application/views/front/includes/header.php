<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="#">
    <base href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/'; ?>" />
    <title>Gestión de Usuarios | SIGITEC</title>
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
  
  <!-- Configurations JS -->
    <script src="<?php echo base_url(); ?>assets/front/js/apps/App.js"></script>
    <style type="text/css">
      ul.sub-menu li
      {
        font-size: 11px;
        height: 30px;
      }
      ul.sub-menu li a:hover
      {
        vertical-align: middle;
        height: 20px;
      }
    </style>
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
          <a class="navbar-brand" href="<?php echo base_url(); ?>">SIGITEC</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li class="active"><a href="<?php echo base_url(); ?>"><i class="fa fa-flag"></i> Inicio</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/operaciones/"><i class="fa fa-bar-chart-o"></i> Gestión de Operaciones</a></li>
            <li><a href="tables.html"><i class="fa fa-table"></i> Acuerdos de Niveles de Servicio</a></li>
            <!-- Gestion de la Capacidad -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Gestión de Capacidad <b class="caret"></b></a>
              <ul class="dropdown-menu sub-menu">
                <li><a href="<?php echo base_url(); ?>index.php/Capacidad/">Descripción</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/Capacidad/ComponentesIT/">Componetes IT</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/Capacidad/Servicios/">Servicios</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/Capacidad/Departamentos/">Departamentos</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/Capacidad/Umbrales">Umbrales</a></li>
              </ul>
            </li>  
            <!-- Gestion de la Capacidad -->
            <li><a href="<?php echo site_url('index.php/continuidad-negocio') ?>"><i class="fa fa-retweet"></i> Continuidad del Negocio</a></li>
            <li><a href="<?php echo site_url('index.php/Costos');?>"><i class="fa fa-clipboard"></i> Gestión de Costos</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/Disponibilidad/"><i class="fa fa-clock-o"></i> Gestión de Disponibilidad</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i> <?php echo 'Gestión de Usuarios' ?> <b class="caret"></b>
              </a>
              <ul class="dropdown-menu sub-menu">
                <li><a href="<?php echo base_url() ?>index.php/usuarios"><?php echo 'Ver usuarios' ?></a></li>
                <li><a href="<?php echo base_url() ?>index.php/usuarios/crear"><?php echo 'Crear usuarios' ?></a></li>
                <li><a href="<?php echo base_url() ?>index.php/usuarios/buscar"><?php echo 'Buscar usuarios' ?></a></li>
              </ul>
            </li>
          </ul>
		  <ul class="nav navbar-nav navbar-right navbar-user">
              
              <!-- Button of Apps Menu -->
              <li>
              <a
              id="popoverMenu"
              data-toggle="popover" data-placement="bottom" 
              data-html = "true"
              data-title = "Servicios"
              data-container="body"
              data-content='
              <!--Menu de Apps de los Servicios-->
              

              <div class="row">
               <div class="col-lg-4 col-md-4">
                <!-- GESTIÓN DE OPERACIONES-->

                <a type="button" class="btn"
                  title="Gestión de Operaciones" 
                  href = "operaciones"  
                 >
                 <i class="fa fa-cogs fa-3x"></i> <br> <small>Gestión de<br>Operaciones</small>
                 </a>
                </div>

                <div class="col-lg-4 col-md-4">
                 <!-- GESTIÓN DE CAPACIDAD-->
                 <a type="button" class="btn"
                  title="Gestión de Capacidad" 
                  href = "<?php echo site_url("index.php/Capacidad");?>"  
                 >
                 <i class="fa fa-book fa-3x"></i> <br> <small>Gestión de<br>Capacidad</small>
                 </a> 
                 </div>

                 <div class="col-lg-4 col-md-4">
                 <!-- GESTIÓN DE RIESGOS-->
                 <a type="button" class="btn "
                  title="Gestión de Riesgos" 
                  href = "#"  
                 >
                 <i class="fa fa-fire-extinguisher fa-3x"></i> <br> <small>Gestión de<br>Continuidad<br>del Negocio</small>
                 </a> 
               </div>

             </div>
             <br> 

              <div class="row">
               <div class="col-lg-4 col-md-4">
                <!-- GESTIÓN DE COSTOS-->
                <a type="button" class="btn"
                  title="Gestión de Costos" 
                  href = "<?php echo site_url('index.php/Costos');?>"  
                 >
                 <i class="fa fa-clipboard fa-3x"></i> <br> <small> Gestión de<br>Costos</small>
                 </a>
                </div>

                <div class="col-lg-4 col-md-4">
                 <!-- GESTIÓN DE DISPONIBILIDAD-->
                 <a type="button" class="btn"
                  title="Gestión de Disponibilidad" 
                  href = "<?php echo site_url("index.php/Disponibilidad");?>"  
                 >
                 <i class="fa fa-clock-o fa-3x"></i> <br> <small>Gestión de<br>Disponibilidad</small>
                 </a> 
                 </div>
                 
                 <div class="col-lg-4 col-md-4">
                 <!-- ACUERDOS DE NIVELES DE SERVICIO-->
                 <a type="button" class="btn"
                  title="Acuerdos de Niveles de Servicio" 
                  href = "#"  
                 >
                 <i class="fa fa-suitcase fa-3x"></i><br> <small>Gestión de<br>Nvls. de Serv.</small>
                 </a> 
               </div>

             </div>
             <br>

             <div class="row">
               <div class="col-lg-4 col-md-4">
                <!-- ACCESO A USUARIOS-->
                <a type="button" class="btn"
                  title="Acceso a Usuaios" 
                  href = "#"  
                 >
                 <i class="fa fa-users fa-3x"></i> <br> <small>Acceso<br>a Usuarios</small>
                 </a>
                 </div>

                 <div class="col-lg-4 col-md-4">
                 <!-- CARGAR INFRAESTRUCTURA-->
                 <a type="button" class="btn"
                  title="Cargar Infraestructura" 
                  href = "<?php echo site_url("index.php/cargar_datos");?>"  
                 >
                 <i class="fa fa-sitemap fa-3x"></i> <br> <small>Cargar<br> Infraestructura</small>
                 </a>
                 </div>
                 
                 <div class="col-lg-4 col-md-4">
                 <!-- AJUSTE DE SISTEMA-->
                 <a type="button" class="btn"
                  title="Ajuste de Sistema" 
                  href = "#"  
                 >
                 <i class="fa fa-wrench fa-3x"></i> <br> <small>Ajustes de<br>Sistema</small>
                 </a> 
               </div>

             </div>
              '

              data-original-title="" title="" >
              <i class = "fa fa-th" id = "tooltipMenuIcon" data-toggle="tooltip"
              data-original-title="Aplicaciones"
              data-placement = "left"
              >
                
              </i>
            </a>
            </li>
            <li class="divider"></li>
            <!-- end of button of Apps Menu -->

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
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i>
                <?php $nombre_usuario = !empty($this->session->userdata('user')->nombre) ? $this->session->userdata('user')->nombre : 'Usuario' ?>
                <?php echo $nombre_usuario; ?> <b class="caret"></b></a>
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