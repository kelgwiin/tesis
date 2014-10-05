<br><div class="col-lg-12"> <h1>Formulario de Opciones de Mejoras</h1> </div>
<ol class="breadcrumb">
	<li class="active"><i class="fa fa-dashboard"></i> 
	Se incluye las diferentes opciones en las que se puede mejorar el servicio</li>
</ol>

<?php echo form_open("/index.php/Disponibilidad/Recibiropciones/"); ?>
<?php
	$servicio_id = array(
	  'name' => 'servicio_id',
	  'size' => '30',
	  'placeholder' => 'Escriba el servicio'  
	);

	$impacto_mejoras = array(
	  'name' => 'impacto_mejoras',
	  'size' => '168',
	  'placeholder' => 'Impacto de la Mejora'  
	);
	$descripcion_mejoras = array(
	  'name' => 'descripcion_mejoras',
	  'size' => '168',
	  'placeholder' => 'Descripcion de la Mejora'  
	);
	
	$beneficio_mejoras = array(
	  'name' => 'beneficio_mejoras',
	  'size' => '168',
	  'placeholder' => 'Beneficios de la Mejora '  
	);
	$costo_mejoras = array(
	  'name' => 'costo_mejoras',
	  'size' => '30',
	  'placeholder' => 'Costo de la Mejora'  
	);
?>

<div id="page-wrapper">
<div class = "row">
<div class="row">
<div class = "col-md-12">
<div class="panel panel-default">
<div class="panel-body">
<div class = "col-md-10">
	<fieldset>
		<legend>Opción de Mejora</legend>
		<div class="form-group">
			<div class = "col-md-5 control-label">
				<?php echo form_label('Servicios:','serv' ); ?>
				<?php if($servicios!=false){
						echo form_dropdown('servic', $servicios); 	
				}else{ ?>
					<font color="red">No hay Servicios Registrados</font>
				<?php  } ?>
			</div>
				<form role="form">
 			<div class="form-group"> 				
  					 <label for="impacto_mejoras" class="col-md-1 control-label">Costo:</label>
   				 	<input type="text" class="input-group" name="costo_mejoras" value="<?php echo set_value('costo_mejoras'); ?>" data-toggle="tooltip" data-original-title="Ej: 2500.50" class="form-control input-md" required="required" >
  			</div> 	 
		</div>
		<form class="form-inline" role="form">
  		<div class="col-md-11 control-label">
   			 <label for="impacto_mejoras">Descripcion de la Mejora:</label>
    		<textarea class="form-control" rows="3" name="descripcion_mejoras" value="<?php echo set_value('descripcion_mejoras'); ?>" class="form-control input-md" required="required"></textarea>
  		</div> 
		<br><br><br><br><br><br>
		
		<font color="red"><?php echo form_error('impacto_mejoras'); ?></font>		
		<form class="form-inline" role="form">
  		<div class="col-md-11 control-label">
    		<label for="impacto_mejoras">Impacto de la Mejora:</label>
    		<textarea class="form-control" rows="3" name="impacto_mejoras" value="<?php echo set_value('impacto_mejoras'); ?>"   ></textarea>
  		</div>
  		<br><br><br><br><br><br>
  		
  		<font color="red"><?php echo form_error('beneficio_mejoras'); ?></font>				
		<form role="form">
		  <div class="col-md-11 control-label">
   			 <label for="impacto_mejoras">Beneficios de la Mejora:</label>
   			  <textarea class="form-control" rows="3" name="beneficio_mejoras" value="<?php echo set_value('beneficio_mejoras'); ?>"></textarea>
  		  </div>
  		  <br><br><br><br><br><br>
 		
 		<div class="form-group">
			<label class="col-md-4 control-label" for=""></label>
			<div class="col-md-6 col-xs-12">
			<div class="row">
				<div class = "col-md-3 col-xs-6">
					<button id="" type = "submit" class="btn btn-primary">Guardar</button>
				</div>
				
			<?php echo form_close(); ?>
			<div class ="col-md-3 col-xs-6">
				<input type="button" class="btn btn-danger" value="Cancelar" onclick="location.href='<?php echo base_url(); ?>index.php/Disponibilidad/Plan/'"/>				
			</div>
			</div>
			</div><!-- /col-md-6-->
		</div><!-- /form-group -->
	</fieldset>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</body>
</html>
			