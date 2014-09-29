<br><div class="col-lg-12"> <h1>Formulario de Nueva Incidencia</h1> </div>

<ol class="breadcrumb">
	<li class="active"><i class="fa fa-dashboard"></i> 
	La sección de registrar incidencia proporciona informacion de lo ocurrido con una falla o la incidencia del proceso o servicio afectado.</li>
</ol>

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
	  'placeholder' => 'Procesos Criticos Afectados'  
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
			<div id="page-wrapper">
			<div class = "row">
			<div class="row">
			<div class = "col-md-12">
			<div class="panel panel-default">
			<div class="panel-body">
			<div class = "col-md-10">
				<fieldset>
					<legend>Incidencia</legend>
			<div class="form-group">
				<div class = "col-md-5 control-label">
					<?php echo form_label('Servicio Afectado:','serv' ); ?>
					<?php if($servicios!=false){
						echo form_dropdown('servic', $servicios); 	
					}else{ ?>
						<font color="red">No hay Servicios Registrados</font>
					<?php  } ?>
					 		
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label" for="impacto_mejoras">Código de la Incidencia:</label>  
   						<input type="text" class="input-group" name="codigo" value="<?php echo set_value('codigo'); ?>" class="form-control input-md" required="required">
				</div>
			</div>
			<form class="form-inline" role="form">
  				<div class="col-md-11 control-label">
    				<label for="impacto_mejoras">Descripcion de la Incidencia:</label>
   					 <textarea class="form-control" rows="3" name="descripcion" class="form-control input-md" required="required"></textarea>
  				</div> 
			<br><br><br><br><br><br>
			
			<font color="red"><?php echo form_error('tiempo_caido'); ?></font>
			<form role="form">
  			<div class="col-md-5 control-label">
   				 <label for="impacto_mejoras">Tiempo de Paralizacion:</label>
     			 <input type="text" class="form-control" name="tiempo_caido" value="<?php echo set_value('tiempo_caido'); ?>" data-toggle="tooltip" data-original-title="Ej: 3 min, 1 hora, 5 segundos" >
  			</div>
  			
  			<font color="red"><?php echo form_error('tiempo_retraso'); ?></font>
			<form role="form">
 			 <div class="col-md-5 control-label">
   				 <label for="impacto_mejoras">Tiempo de Retrasos de Trabajo:</label>
   				 <input type="text" class="form-control" name="tiempo_retraso" value="<?php echo set_value('tiempo_retraso'); ?>" data-toggle="tooltip" data-original-title="Ej: 3 min, 1 hora, 5 segundos" >
 			 </div> 
 			 <br><br><br><br>
 			 
 			 <font color="red"><?php echo form_error('pro_crit_afect'); ?></font>			
			<form role="form">
 			 <div class="col-md-5 control-label">
   				 <label for="impacto_mejoras">Procesos Criticos Afectados:</label>
   				 <input type="text" class="form-control" name="pro_crit_afect" value="<?php echo set_value('pro_crit_afect'); ?>" data-toggle="tooltip" data-original-title="Número de Procesos Criticos Afectados">
  			</div>       
  			
  			<font color="red"><?php echo form_error('usuarios_afectados'); ?></font> 			 
 			<form role="form">
 			 <div class="col-md-5 control-label">
   				 <label for="impacto_mejoras">Usuarios Afectados:</label>
   				 <input type="text" class="form-control" name="usuarios_afectados" value="<?php echo set_value('usuarios_afectados'); ?>" data-toggle="tooltip" data-original-title="Número de Usuarios Afectados">
 			 </div>
 			 <br><br><br><br>
 			 
 			 <font color="red"><?php echo form_error('personal_recuperacion'); ?></font>   			
			<form role="form">
 			 <div class="col-md-5 control-label">
   				 <label for="impacto_mejoras">Recursos de Personal:</label>
   				 <input type="text" class="form-control" name="personal_recuperacion" value="<?php echo set_value('personal_recuperacion'); ?>" data-toggle="tooltip" data-original-title="Número de personas involucradas en la solución de la incidencia">
 			 </div>    
 			
 			 <font color="red"><?php echo form_error('confiabilidad_informacion'); ?></font>  			
 			 <form role="form">
 			 <div class="col-md-5 control-label">
  				  <label for="impacto_mejoras">Confiabilidad de Informacion:</label>
   				 <input type="text" class="form-control" name="confiabilidad_informacion" value="<?php echo set_value('confiabilidad_informacion'); ?>" data-toggle="tooltip" data-original-title="Ingrese el número de porcentaje de confiabilidad de la información">
  			</div>
  			 <br><br><br><br>
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
			