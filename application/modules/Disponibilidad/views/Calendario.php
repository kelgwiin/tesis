<br><center><h2>Calendario de Eventos</h2></center>
<button class="btn btn-primary" onclick="location.href='<?php echo base_url(); ?>index.php/Disponibilidad/NuevoEvento/'" type="button">Nuevo Evento</button>
<button class="btn btn-default" onclick="location.href='<?php echo base_url(); ?>index.php/Disponibilidad/'" type="button">Atras</button>
		
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
   
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    
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
    

  </body>
</html>
