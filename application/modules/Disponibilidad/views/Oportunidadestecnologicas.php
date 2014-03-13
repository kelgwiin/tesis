<br><center><h2>Formulario de Oportunidades Tecnologicas</h2></center>

<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      La sección de tecnología de futuros proporciona una indicación de los posibles beneficios y oportunidades de explotación que existen para mejoras tecnológicas previstas. 
 </div>

<?php echo form_open("/index.php/Disponibilidad/Recibiroportunidades/"); ?>
<?php
		
	$descripcion = array(
	  'name' => 'descripcion',
	  'size' => '168',
	  'placeholder' => 'Descripcion de la Oportunidad Tecnologica'  
	);
	
	$area = array(
	  'name' => 'area',
	  'size' => '50',
	  'placeholder' => 'Area/Sistema'  
	);
	
	$potencial_beneficio = array(
	  'name' => 'potencial_beneficio',
	  'size' => '168',
	  'placeholder' => 'Potencial Beneficio de la Oportunidad Tecnologica'  
	);
	$recursos_requeridos = array(
	  'name' => 'recursos_requeridos',
	  'size' => '168',
	  'placeholder' => 'Recursos Requeridos'  
	);
?>
<?php echo form_error('descripcion'); ?>
<form class="form-inline" role="form">
  <div class="offset1 span5 well">
    <label for="impacto_mejoras">Descripcion:</label>
    <textarea class="form-control" rows="3" name="descripcion" ></textarea>
  </div>
<?php echo form_error('area'); ?>
<form class="form-inline" role="form">
  <div class="offset1 span5 well">
    <label for="impacto_mejoras">Area/Sistema:</label>
    <input type="text" class="form-control" name="area" value="<?php echo set_value('area'); ?>" >
  </div> 
<?php echo form_error('potencial_beneficio'); ?>
<form role="form">
  <div class="offset1 span5 well">
    <label for="impacto_mejoras">Potencial Beneficio de la Oportunidad Tecnologica:</label>
     <textarea class="form-control" rows="3" name="potencial_beneficio" ></textarea>
  </div>
  <?php echo form_error('recursos_requeridos'); ?>
<form role="form">
  <div class="offset1 span5 well">
    <label for="impacto_mejoras">Recursos Requeridos:</label>
    <textarea class="form-control" rows="3" name="recursos_requeridos" ></textarea>
    
  </div> 

<br><br>

<center><button type="submit" class="btn btn-success">Guardar</button></center>
<?php echo form_close(); ?>
<br><br>
<center><input type="button" value="Atras" onclick="location.href='tesis/index.php/Disponibilidad/Plan/'"/></center>
<br><br>

</body>
</html>
			