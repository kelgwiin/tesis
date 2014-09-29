<br><div class="col-lg-12"> <h1>Formulario de Oportunidades Tecnologicas</h1> </div>
<ol class="breadcrumb">
	<li class="active"><i class="fa fa-dashboard"></i> 
	La sección de tecnología de futuros proporciona una indicación de los posibles beneficios y oportunidades de explotación que existen para mejoras tecnológicas previstas.</li>
</ol>

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

<div id="page-wrapper">
<div class = "row">
<div class="row">
<div class = "col-md-12">
<div class="panel panel-default">
<div class="panel-body">
<div class = "col-md-10">
	<fieldset>
		<legend>Oportunidad Tecnológica</legend>
		<form class="form-inline" role="form">
  		<div class="col-md-3 control-label">
    		<label for="impacto_mejoras">Area/Sistema:</label>
   			 <input type="text" class="form-control" name="area" value="<?php echo set_value('area'); ?>" class="form-control input-md" required="required">
  		</div>
  		<br><br><br><br> 
		<form class="form-inline" role="form">
  		<div class="col-md-11 control-label">
    		<label for="impacto_mejoras">Descripcion:</label>
   			 <textarea class="form-control" rows="3" name="descripcion" class="form-control input-md" required="required"></textarea>
  		</div>
  		<br><br><br><br><br><br>
  		
  		<font color="red"><?php echo form_error('potencial_beneficio'); ?></font>		
		<form role="form">
  		<div class="col-md-11 control-label">
  			 <label for="impacto_mejoras">Potenciales Beneficios:</label>
    		 <textarea class="form-control" rows="3" name="potencial_beneficio" ></textarea>
 		 </div>
 		 <br><br><br><br><br><br>
 		 
 		<font color="red"><?php echo form_error('recursos_requeridos'); ?></font>  		
		<form role="form">
 		 <div class="col-md-11 control-label">
    		<label for="impacto_mejoras">Recursos Requeridos:</label>
   			 <textarea class="form-control" rows="3" name="recursos_requeridos" ></textarea>
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
			