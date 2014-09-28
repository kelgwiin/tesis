<br><center><h2>Formulario de Nueva Incidencia</h2></center>


<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      La sección de registrar incidencia proporciona informacion de lo ocurrido con una falla o la incidencia del proceso o servicio afectado. 
 </div>

<?php echo form_open("/index.php/Disponibilidad/Recibirincidencia/"); ?>
<?php
	$codigo = array(
	  'name' => 'codigo',
	   'size' => '40',
	  'placeholder' => 'Nombre de la Incidencia'  
	);
	$descripcion = array(
	  'name' => 'descripcion',
	   'size' => '168',
	  'placeholder' => 'Descripcion de lo ocurrido'  
	);
	$servicio_id = array(
	  'name' => 'servicio_id',
	   'size' => '40',
	  'placeholder' => 'Escriba el servicio'  
	);
	$tiempo_caido = array(
	  'name' => 'tiempo_caido',
	   'size' => '40',
	  'placeholder' => 'Tiempo de Paralización de Operaciones '  
	);
	$pro_crit_afect = array(
	  'name' => 'pro_crit_afect',
	   'size' => '40',
	  'placeholder' => 'Numero de Procesos Criticos Afectados'  
	);
	$tiempo_retraso = array(
	  'name' => 'tiempo_retraso',
	   'size' => '40',
	  'placeholder' => 'Tiempo de Retrasos de Trabajo'  
	);
	$usuarios_afectados = array(
	  'name' => 'usuarios_afectados',
	   'size' => '40',
	  'placeholder' => 'Numero de Usuarios Afectados'  
	);
	$confiabilidad_informacion = array(
	  'name' => 'confiabilidad_informacion',
	   'size' => '40',
	  'placeholder' => 'Porcentaje de Confiabilidad de Informacion'  
	);
	$personal_recuperacion = array(
	  'name' => 'personal_recuperacion',
	  'size' => '40',
	  'placeholder' => 'Número de Recursos de Personal '  
	);

?>

	<label for=""></label>			
			<div class="form-group">
				<div class = "col-md-5 control-label">
					<?php echo form_label('Servicio Afectado:','serv' ); ?>
					<?php if($servicios!=false){
						echo form_dropdown('servic', $servicios);
					}else{
						echo "No hay Servicios Registrados";
					}
					 ?>			
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label" for="impacto_mejoras">Codigo de la Incidencia:</label>  
					<div class ="col-md-1">
   						<input type="text" class="input-group" name="codigo" value="<?php echo set_value('codigo'); ?>">
					</div>
				</div>
			</div>

<br><br><br>
    
<?php echo form_error('descripcion'); ?>
<form class="form-inline" role="form">
  <div class="offset1 span5 well">
    <label for="impacto_mejoras">Descripcion de la Incidencia:</label>
    <textarea class="form-control" rows="3" name="descripcion" ></textarea>
  </div> 
<?php echo form_error('tiempo_caido'); ?>
<form role="form">
  <div class="offset1 span5 well">
    <label for="impacto_mejoras">Tiempo de Paralizacion:</label>
      <input type="text" class="form-control" name="tiempo_caido" value="<?php echo set_value('tiempo_caido'); ?>">
  </div>
<?php echo form_error('tiempo_retraso'); ?>
<form role="form">
  <div class="offset1 span5 well">
    <label for="impacto_mejoras">Tiempo de Retrasos de Trabajo:</label>
    <input type="text" class="form-control" name="tiempo_retraso" value="<?php echo set_value('tiempo_retraso'); ?>">
  </div> 
<?php echo form_error('pro_crit_afect'); ?>
<form role="form">
  <div class="offset1 span5 well">
    <label for="impacto_mejoras">Numero de Procesos Criticos Afectados:</label>
    <input type="text" class="form-control" name="pro_crit_afect" value="<?php echo set_value('pro_crit_afect'); ?>">
  </div>       
 <?php echo form_error('usuarios_afectados'); ?> 
 <form role="form">
  <div class="offset1 span5 well">
    <label for="impacto_mejoras">Numero de Usuarios Afectados:</label>
    <input type="text" class="form-control" name="usuarios_afectados" value="<?php echo set_value('usuarios_afectados'); ?>">
  </div>
  <?php echo form_error('personal_recuperacion'); ?>
<form role="form">
  <div class="offset1 span5 well">
    <label for="impacto_mejoras">Número de Recursos de Personal:</label>
    <input type="text" class="form-control" name="personal_recuperacion" value="<?php echo set_value('personal_recuperacion'); ?>">
  </div>    
  <?php echo form_error('confiabilidad_informacion'); ?>
  <form role="form">
  <div class="offset1 span5 well">
    <label for="impacto_mejoras">Porcentaje de Confiabilidad de Informacion:</label>
    <input type="text" class="form-control" name="confiabilidad_informacion" value="<?php echo set_value('confiabilidad_informacion'); ?>">
  </div>
     
<br>

<div class="form-group">
	<label class="col-md-4 control-label" for=""></label>
		<div class="col-md-6 col-xs-12">
			<div class="row">
				<div class = "col-md-3 col-xs-6">
					<button id="" type = "submit" class="btn btn-primary">Guardar</button>
				</div>

			<div class ="col-md-3 col-xs-6">
				<a 	
					href="<?php echo base_url(); ?>index.php/Disponibilidad/" 
					class="btn btn-danger">Cancelar
				</a>	
			</div>

		<div class = "col-md-6"></div><!-- Vacío-->
		</div>
		</div><!-- /col-md-6-->
</div><!-- /form-group -->

</body>
</html>
			