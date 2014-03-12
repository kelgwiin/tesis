<br><center><h2>Formulario de Logros de Rendimiento</h2></center>

<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      Las Actividades que progresaron a subsanar las deficiencias en la disponibilidad de servicios TI existentes.
</div>

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
<div class="container">
		<div class="row">
			<div class="offset1 span5 well">
				<?php echo form_label('Servicios','serv' ); ?>
				<?php echo form_dropdown('servic', $servicios) ?>				
			</div>
		</div>
</div>
<?php echo form_error('descripcion_logros'); ?>
<form class="form-inline" role="form">
  <div class="offset1 span5 well">
    <label for="impacto_mejoras">Descripcion de los Logros:</label>
    <textarea class="form-control" rows="3" name="descripcion_logros" ></textarea>
  </div> 
<?php echo form_error('impacto_logros'); ?>
<form class="form-inline" role="form">
  <div class="offset1 span5 well">
    <label for="impacto_mejoras">Impacto de los Logros:</label>
    <textarea class="form-control" rows="3" name="impacto_logros" ></textarea>
  </div>
<?php echo form_error('beneficio_logros'); ?>
<form role="form">
  <div class="offset1 span5 well">
    <label for="impacto_mejoras">Beneficios de los Logros:</label>
     <textarea class="form-control" rows="3" name="beneficio_logros" ></textarea>
  </div>
<?php echo form_error('costo_logros'); ?>  
<form role="form">
  <div class="offset1 span5 well">
    <label for="impacto_mejoras">Costo de los Logros:</label>
    <input type="text" class="form-control" name="costo_logros" value="<?php echo set_value('costo_logros'); ?>" >
  </div>       
 
<br><br>

<center><button type="submit" class="btn btn-success"> Guardar </button></center>
<?php echo form_close(); ?>
<br><br>
<center><input type="button" value="Atras" onclick="location.href='tesis/index.php/Disponibilidad/Plan/'"/></center>
<br><br>

</body>
</html>
			