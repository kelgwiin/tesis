<br><center><h2>Calendario de Eventos</h2></center>
<button class="btn btn-success" onclick="location.href='tesis/index.php/Disponibilidad/NuevoEvento/'" type="button">Nuevo Evento</button>
<button class="btn btn-default" onclick="location.href='tesis/index.php/Disponibilidad/'" type="button">Atras</button>
		
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
   
    <link href="http://localhost/tesis/assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://localhost/tesis/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://localhost/tesis/assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://localhost/tesis/assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="http://localhost/tesis/assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="http://localhost/tesis/assets/ico/favicon.png">
    <?php if(isset($head)):?>
       <?php foreach ($head as $file):?>
       <link href="<?php echo $file?>" rel="stylesheet" type="text/css" media="screen"/>
       <?php endforeach;?>
    <?php endif;?>
  </head>

  <body>
	
 <br><br>
    <div class="container">
	<div id="resultado"> </div>
      <div id="calendar"> </div>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<?php if(isset($footer)):?>
  <?php foreach ($footer as $file):?>
     <script src="<?php echo $file?>"></script>
  <?php endforeach;?>
<?php endif;?>
    <script src="http://localhost/tesis/assets/js/bootstrap-transition.js"></script>
    <script src="http://localhost/tesis/assets/js/bootstrap-alert.js"></script>
    <script src="http://localhost/tesis/assets/js/bootstrap-modal.js"></script>
    <script src="http://localhost/tesis/assets/js/bootstrap-dropdown.js"></script>
    <script src="http://localhost/tesis/assets/js/bootstrap-scrollspy.js"></script>
    <script src="http://localhost/tesis/assets/js/bootstrap-tab.js"></script>
    <script src="http://localhost/tesis/assets/js/bootstrap-tooltip.js"></script>
    <script src="http://localhost/tesis/assets/js/bootstrap-popover.js"></script>
    <script src="http://localhost/tesis/assets/js/bootstrap-button.js"></script>
    <script src="http://localhost/tesis/assets/js/bootstrap-collapse.js"></script>
    <script src="http://localhost/tesis/assets/js/bootstrap-carousel.js"></script>
    <script src="http://localhost/tesis/assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>
