

  <h3 > <b> Duración del Acuerdo</b><small><a type="button" class="btn btn-xs" data-toggle="modal" data-target="#ayuda_duracion_acuerdo">
 	(<i class="fa fa-info-circle"></i> <u>Ayuda</u>)</a></small></h3> <hr><br><br>

  <div class="row">
  	<div class="col-md-5">
    	<div class="form-group">
			
			<div class="required text-right">
				<label for="service_name" class="col-md-5 control-label">Fecha de Inicio</label> 
			</div>

		    <div class="col-md-7">
		       <div class="input-group">
		       <input type='text' name="fecha_inicio" class="form-control" id='dpd1' value="<?php echo set_value('fecha_inicio'); ?>"/>
		       <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
		   	   </div>

		    </div>
		</div>
		<div class="form-group">
	     <div class="control-label col-md-5">
	      </div>
	      	<div class="col-md-7">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('fecha_inicio');
				 ?>
				</label>
			</div>
		</div>
		<br>
		<div class="form-group">
			<div class="required">
				<label for="prioridad_servicio" class="col-md-5 control-label text-right">Intervalos de Revisi&#243;n de Acuerdo</label>		    
			</div>

			<div class="col-md-7">
			       <?php
			       	$options = array(
			       	  'seleccione' => 'Seleccione una Modalidad',
			       	  'Mensual' => 'Mensual',
			       	  'Trimestral' => 'Trimestral',
			       	  'Semestral' => 'Semestral',
			       	  'Anual' => 'Anual',
			       	  'Bienal' => 'Bienal',
	                );
			        ?>
		            <?php echo form_dropdown('intervalo_revision', $options,set_value('intervalo_revision'),'class="form-control" id="dropdown_intervalo_revision"'); ?>
	        </div>
		</div>
		<div class="form-group">
	     <div class="control-label col-md-5">
	      </div>
	      	<div class="col-md-7">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('intervalo_revision');
				 ?>
				</label>
			</div>
		</div>
			
	</div> 	

	  	<div class="col-md-5">
    	<div class="form-group">
			
			<div class="required text-left">
				<label for="service_name" class="col-md-5 control-label">Fecha de Culminaci&#243;n</label> 
			</div>

		    <div class="col-md-7" >

		        <div class="input-group">
		       <input type='text' name="fecha_culminacion" class="form-control" id='dpd2' value="<?php echo set_value('fecha_culminacion'); ?>"/>
		       <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
		   	   </div>
		    </div>
		</div>
		<div class="form-group">
	     <div class="control-label col-md-5">
	      </div>
	      	<div class="col-md-7">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('fecha_culminacion');
				 ?>
				</label>
				</div>
			</div>
		</div> 

  </div>
  <br>

   <h3 > <b> Objetivos del Acuerdo</b><small><a type="button" class="btn btn-xs" data-toggle="modal" data-target="#ayuda_objetivo_acuerdo">
 	(<i class="fa fa-info-circle"></i> <u>Ayuda</u>)</a></small></h3> <hr><br>
   <div class="row">
	  <div class="form-group">

			        <div class="required col-md-offset-1">
						<label for="tipo_servicio" class="col-md-2 control-label text-right">Objetivos </label>		    
					</div>

			        <div class="col-md-8">
			            <?php $data = array(
			            		'value' => set_value('objetivos_acuerdo'),
		                        'name'        => 'objetivos_acuerdo',
		                        'id'          => 'objetivos_acuerdo', 
		                        'class'          => 'form-control boxsizingBorder',
		                        'placeholder' => '',
		                        //'rows' => '6',                           
		                                  );
		                echo form_textarea($data)?>
			        </div>
	 </div>
	 <div class="form-group">
	     <div class="control-label col-md-3 text-right">
	      </div>
	      	<div class="col-md-8">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('objetivos_acuerdo');
				 ?>
				</label>
			</div>
		</div>
   </div>
   <br>


   <h3 > <b> Alcance y Exclusiones del Acuerdo</b><small><a type="button" class="btn btn-xs" data-toggle="modal" data-target="#ayuda_alcance_acuerdo">
 	(<i class="fa fa-info-circle"></i> <u>Ayuda</u>)</a></small></h3> <hr><br>
   <div class="row">
	  <div class="form-group">

			        <div class="required col-md-offset-1">
						<label for="tipo_servicio" class="col-md-2 control-label text-right">Alcance y Exclusiones </label>		    
					</div>

			        <div class="col-md-8">
			            <?php $data = array(
			            		'value' => set_value('alcance'),
		                        'name'        => 'alcance',
		                        'id'          => 'alcance', 
		                        'class'          => 'form-control boxsizingBorder',
		                        'placeholder' => '',
		                        //'rows' => '6',                           
		                                  );
		                echo form_textarea($data)?>
			        </div>
	 </div>

	  <div class="form-group">
	     <div class="control-label col-md-3 text-right">
	      </div>
	      	<div class="col-md-8">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('alcance');
				 ?>
				</label>
			</div>
		</div>

   </div>
   <br>

   <h3 > <b> Condiciones para la Terminaci&#243;n del Acuerdo</b><small><a type="button" class="btn btn-xs" data-toggle="modal" data-target="#ayuda_terminacion_acuerdo">
 	(<i class="fa fa-info-circle"></i> <u>Ayuda</u>)</a></small></h3> <hr><br>
   <div class="row">
	  <div class="form-group">

			        <div class="col-md-offset-1">
						<label for="tipo_servicio" class="col-md-2 control-label text-right">Condiciones para Terminaci&#243;n </label>		    
					</div>

			        <div class="col-md-8">
			            <?php $data = array(
			            		'value' => set_value('condiciones_terminacion'),
		                        'name'        => 'condiciones_terminacion',
		                        'id'          => 'condiciones_terminacion', 
		                        'class'          => 'form-control boxsizingBorder',
		                        'placeholder' => '',
		                        //'rows' => '6',                           
		                                  );
		                echo form_textarea($data)?>
			        </div>
	 </div>
	  <div class="form-group">
	     <div class="control-label col-md-3 text-right">
	      </div>
	      	<div class="col-md-8">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('condiciones_terminacion');
				 ?>
				</label>
			</div>
		</div>

   </div>
   
   <br>

    <h3 > <b>Procedimientos para Actualizar/Modificar el Acuerdo</b><small><a type="button" class="btn btn-xs" data-toggle="modal" data-target="#ayuda_modificacion_acuerdo">
 	(<i class="fa fa-info-circle"></i> <u>Ayuda</u>)</a></small></h3> <hr><br>
   <div class="row">
	  <div class="form-group">

			        <div class="col-md-offset-1">
						<label for="tipo_servicio" class="col-md-2 control-label text-right">Procedimientos  </label>		    
					</div>

			        <div class="col-md-8">
			            <?php $data = array(
			            		'value' => set_value('modificacion'),
		                        'name'        => 'modificacion',
		                        'id'          => 'modificacion', 
		                        'class'          => 'form-control boxsizingBorder',
		                        'placeholder' => '',
		                        //'rows' => '6',                           
		                                  );
		                echo form_textarea($data)?>
			        </div>
	 </div>
	   <div class="form-group">
	     <div class="control-label col-md-3 text-right">
	      </div>
	      	<div class="col-md-8">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('modificacion');
				 ?>
				</label>
			</div>
		</div>
   </div>


 <br><br><hr>

  <div class='row tex'>
	 <div class="col-md-1 col-md-offset-2">
	 <a id="activate-step-1" class="btn btn-default">Volver</a>
	 </div>
	<div class="col-md-1">
	 <a id="activate-step-3" class="btn btn-primary">Siguiente</a>
	 </div>

	 <div class="col-md-1 col-md-offset-4">
	 <a class="btn btn-danger" data-toggle="modal" data-target="#salir_modal">Cancelar</a>
	 </div>
 </div>
