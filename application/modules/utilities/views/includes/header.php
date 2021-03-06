<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="#">
    <base href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/'; ?>" />
    <title><?php echo (!empty($title_name)) ? $title_name.' | SIGITEC' : 'SIGITEC' ?></title>
    <!-- Bootstrap core CSS -->
    <link rel="icon" href="<?php echo site_url('assets/back/img/favicon.ico') ?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/sb-admin/css/bootstrap.css" >
    
    <!-- Add custom CSS here -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/sb-admin/css/sb-admin.css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/sb-admin/font-awesome/css/font-awesome.min.css">
    
    <link href="<?php echo base_url(); ?>assets/timepicker/bootstrap-datetimepicker.css" rel="stylesheet">
    
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/custom.config.css">
    
    <link href="<?php echo base_url(); ?>assets/datepicker/css/datepicker.css" rel="stylesheet">
    
    <!-- JavaScript -->
    <script src="<?php echo base_url(); ?>assets/front/sb-admin/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>
     <script src="<?php echo base_url(); ?>assets/timepicker/moment.js"></script>
    <script src="<?php echo base_url(); ?>assets/front/sb-admin/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar2.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/fullcalendar/lang-all.js"></script>
    <script src="<?php echo base_url(); ?>assets/timepicker/bootstrap-datetimepicker.js"></script>

    <script src="<?php echo base_url() ?>assets/js/dataTables/jquery.dataTables.js"></script>
	<script src="<?php echo base_url() ?>assets/js/dataTables/dataTables.bootstrap.js"></script>

	<script>
	    $(document).ready(function() {
	        $('#dataTables-example').dataTable();
	    });
	</script>


    <!-- Page Specific Plugins -->
    <script src="<?php echo base_url(); ?>assets/front/sb-admin/js/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/front/sb-admin/js/tablesorter/jquery.tablesorter.js"></script>
    <script src="<?php echo base_url(); ?>assets/front/sb-admin/js/tablesorter/tables.js"></script>
    <script src="<?php echo base_url(); ?>assets/front/highcharts/highcharts.js"></script>
	<script src="<?php echo base_url(); ?>assets/front/highcharts/exporting.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.mask.js"></script>
  
  <!-- Configurations JS -->
    <script src="<?php echo base_url(); ?>assets/front/js/apps/App.js"></script>

    <!-- Editor de texto -->
    <script src="<?=base_url()?>assets/js/editor_texto/tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/datepicker/js/bootstrap-datepicker.js"></script>
   
    <!-- Modulo de Gestion de Niveles de Servicios-->
    <script type="text/javascript">

         var config = {
            base: "<?php echo base_url(); ?>",
            
            };
    </script>

    <link href="<?=base_url()?>application/modules/cargar_data/views/servicio/css/required_field.css" rel="stylesheet">

    <!-- ./ Modulo de Gestion de Servicios-->

    <style>
	    .steps ul
	    {
	        list-style:none;
	    }
	
	    .steps ul li
	    {
	        list-style:none;
	        padding:5px 6px;
	        border: 2px solid #848484;
	        display:inline;
	        border-radius:7px;
	        font-size:10px;
	        font-weight:bold;
	        margin:0;
	        color:#848484;
	    }
	
	    .steps ul li.active
	    {
	        list-style:none;
	        background:#848484;
	        color:white;
	    }
	</style>
  

  </head>

  <body>
  	<?php $mensajes[] = array('avatar' => 'http://placehold.it/50x50',
			  					'nombre' => 'John Smith',
								'mensaje' => "Hey, Te quería preguntar algo...Prueba Interna Mensaje. :)",
								'hora' => "4:34 PM" );
	      $num_msg = count($mensajes);
		  // $alertas[] = array('alerta_id' => 1,
		  					 // 'prioridad' => 'Danger',
		  					 // 'categoria' => "Operaciones",
							 // 'desc' => "Alerta máxima (Prueba)");
		  // $num_ale = count($alertas);
		  $nombre_usuario = "John Smith";
    ?>

    <div id="wrapper">
      <!-- sigue: header_sidebar.php (en header.php), Se carga dinámicamente desde el controlador -->