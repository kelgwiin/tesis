<br><center><h2>Calendario de Eventos</h2></center>
	<div class="form-group">
		<div class="row">
			<div class="col-md-10" style="left: 51px">
					<a href="<?php echo base_url() ?>index.php/Disponibilidad/NuevoEvento/" class="btn btn-success">
						<i class="fa fa-plus"></i> Nuevo Evento</a>
			</div>
				
			<div class ="col-md-1">
				<input type="button" class="btn btn-danger" value="Atras" onclick="location.href='<?php echo base_url(); ?>index.php/Disponibilidad/'"/>				
			</div>

		</div>
	</div><!-- /form-group -->
		
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
