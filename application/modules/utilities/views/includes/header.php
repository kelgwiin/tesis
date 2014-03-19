<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="#">
    <base href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/'; ?>" />
    <title><?php echo $title_name;?></title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/sb-admin/css/bootstrap.css" >
    <!-- Add custom CSS here -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/sb-admin/css/sb-admin.css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/sb-admin/font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/custom.config.css">    
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
    <script src="assets/front/js/apps/App.js"></script>
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
      <!-- sigue: header_sidebar.php (en header.php), Se carga dinámicamente desde el controlador -->