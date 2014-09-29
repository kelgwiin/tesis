<br><div class="col-lg-12"> <h1>Formulario de Logros de Rendimiento</h1> </div>
<ol class="breadcrumb">
	<li class="active"><i class="fa fa-dashboard"></i> 
	Las Actividades que progresaron a subsanar las deficiencias en la disponibilidad de servicios TI existentes.</li>
</ol>

<?php echo form_open("/index.php/Disponibilidad/Recibirlogros/"); ?>
<?php
	$servicio_id = array(
	  'name' => 'servicio_id',
	  'size' => '30',
	  'placeholder' => 'Escriba el servicio'  
	);

	$impacto_logros = array(
	  'name' => 'impacto_logros',
	  'size' => '168',
	  'placeholder' => 'Impacto de los Logros'  
	);
	$descripcion_logros = array(
	  'name' => 'descripcion_logros',
	  'size' => '168',
	  'placeholder' => 'Descripcion de los Logros'  
	);
	
	$beneficio_logros = array(
	  'name' => 'beneficio_logros',
	  'size' => '168',
	  'placeholder' => 'Beneficios de los Logros '  
	);
	$costo_logros = array(
	  'name' => 'costo_logros',
	  'size' => '30',
	  'placeholder' => 'Costo de los Logros'  
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
		<legend>Logro en el Rendimiento</legend>
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
   				 	<input type="text" class="input-group" name="costo_logros" value="<?php echo set_value('costo_logros'); ?>" data-toggle="tooltip" data-original-title="Ej: 2500.50" class="form-control input-md" required="required">
  			</div> 	 
		</div>
		<form class="form-inline" role="form">
 		 <div class="col-md-11 control-label">
   			 <label for="impacto_mejoras">Descripcion de los Logros:</label>
   			 <textarea class="form-control" rows="3" name="descripcion_logros" class="form-control input-md" required="required"></textarea>
  		</div> 
  		<br><br><br><br><br><br>
  		
  		<font color="red"><?php echo form_error('impacto_logros'); ?></font>		
		<form class="form-inline" role="form">
  		<div class="col-md-11 control-label">
    		<label for="impacto_mejoras">Impacto de los Logros:</label>
    		<textarea class="form-control" rows="3" name="impacto_logros" ></textarea>
  		</div>
  		<br><br><br><br><br><br>
  		
  		<font color="red"><?php echo form_error('beneficio_logros'); ?></font>		
		<form role="form">
  		<div class="col-md-11 control-label">
   			 <label for="impacto_mejoras">Beneficios de los Logros:</label>
    		 <textarea class="form-control" rows="3" name="beneficio_logros" ></textarea>
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

			<div class = "col-md-6"></div><!-- Vacío-->
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
			