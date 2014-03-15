<br><center><h2>Formulario de Opciones de Mejoras</h2></center>

<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      Se incluye las diferentes opciones en las que se puede mejorar el servicio
</div>

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
<div class="container">
		<div class="row">
			<div class="offset1 span5 well">
				<?php echo form_label('Servicios','serv' ); ?>
				<?php echo form_dropdown('servic', $servicios) ?>				
			</div>
		</div>
</div>
<?php echo form_error('descripcion_mejoras'); ?>
<form class="form-inline" role="form">
  <div class="offset1 span5 well">
    <label for="impacto_mejoras">Descripcion de la Mejora:</label>
    <textarea class="form-control" rows="3" name="descripcion_mejoras" value="<?php echo set_value('descripcion_mejoras'); ?>" ></textarea>
  </div>  
<?php echo form_error('impacto_mejoras'); ?>
<form class="form-inline" role="form">
  <div class="offset1 span5 well">
    <label for="impacto_mejoras">Impacto de la Mejora:</label>
    <textarea class="form-control" rows="3" name="impacto_mejoras" value="<?php echo set_value('impacto_mejoras'); ?>"   ></textarea>
  </div>
<?php echo form_error('beneficio_mejoras'); ?>
<form role="form">
  <div class="offset1 span5 well">
    <label for="impacto_mejoras">Beneficios de la Mejora:</label>
     <textarea class="form-control" rows="3" name="beneficio_mejoras" value="<?php echo set_value('beneficio_mejoras'); ?>"></textarea>
  </div>
  <?php echo form_error('costo_mejoras'); ?>
<form role="form">
  <div class="offset1 span5 well">  	
    <label for="impacto_mejoras">Costo de la Mejora:</label>
    <input type="text" class="form-control" name="costo_mejoras" value="<?php echo set_value('costo_mejoras'); ?>">
  </div>       
 
<br><br>

<center><button type="submit" class="btn btn-success">Guardar</button></center>
<?php echo form_close(); ?>
<br><br>
<center><input type="button" value="Atras" onclick="location.href='<?php echo base_url(); ?>index.php/Disponibilidad/Plan/'"/></center>
<br><br>

</body>
</html>
			