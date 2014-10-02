
  <h3 class = "text-primary"> Duración del Acuerdo</h3> <hr><br><br>

  <div class="row">
  	<div class="col-md-5">
    	<div class="form-group">
			
			<div class="required text-right">
				<label for="service_name" class="col-md-5 control-label">Fecha de Inicio</label> 
			</div>

		    <div class="col-md-7">
		       <div class="input-group">
		       <input type='text' class="form-control" id='dpd1'/>
		       <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
		   	   </div>

		    </div>
		</div>
		<br><br><br>
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
		            <?php echo form_dropdown('prioridad_servicio', $options,set_value('prioridad_servicio'),'class="form-control" id="dropdown_prioridad"'); ?>
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
		       <input type='text' class="form-control" id='dpd2'/>
		       <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
		   	   </div>
		    </div>
		</div>
	</div> 

  </div>
  <br><br>


   <h3 class = "text-primary"> Objetivos del Acuerdo</h3> <hr><br>
   <div class="row">
	  <div class="form-group">

			        <div class="required col-md-offset-1">
						<label for="tipo_servicio" class="col-md-2 control-label text-right">Objetivos </label>		    
					</div>

			        <div class="col-md-8">
			            <?php $data = array(
			            		'value' => set_value('procedimiento_solicitud'),
		                        'name'        => 'procedimiento_solicitud',
		                        'id'          => 'procedimiento_solicitud', 
		                        'class'          => 'form-control boxsizingBorder',
		                        'placeholder' => 'Describir el impacto positivo de tener el servicio disponible y / o el impacto negativo de lo contrario. 
		                                          El impacto se puede cuantificar por el número de usuarios afectados, el impacto sobre cada usuario, 
		                                          y el coste para la empresa.',
		                        //'rows' => '6',                           
		                                  );
		                echo form_textarea($data)?>
			        </div>
	 </div>
   </div>
   <br><br>


   <h3 class = "text-primary"> Alcance del Acuerdo</h3> <hr><br>
   <div class="row">
	  <div class="form-group">

			        <div class="required col-md-offset-1">
						<label for="tipo_servicio" class="col-md-2 control-label text-right">Alcance </label>		    
					</div>

			        <div class="col-md-8">
			            <?php $data = array(
			            		'value' => set_value('procedimiento_solicitud'),
		                        'name'        => 'procedimiento_solicitud',
		                        'id'          => 'procedimiento_solicitud', 
		                        'class'          => 'form-control boxsizingBorder',
		                        'placeholder' => 'Describir el impacto positivo de tener el servicio disponible y / o el impacto negativo de lo contrario. 
		                                          El impacto se puede cuantificar por el número de usuarios afectados, el impacto sobre cada usuario, 
		                                          y el coste para la empresa.',
		                        //'rows' => '6',                           
		                                  );
		                echo form_textarea($data)?>
			        </div>
	 </div>
   </div>
   <br><br>

   <h3 class = "text-primary"> Condiciones para la Terminaci&#243;n del Acuerdo</h3> <hr><br>
   <div class="row">
	  <div class="form-group">

			        <div class="col-md-offset-1">
						<label for="tipo_servicio" class="col-md-2 control-label text-right">Condiciones para Terminaci&#243;n </label>		    
					</div>

			        <div class="col-md-8">
			            <?php $data = array(
			            		'value' => set_value('procedimiento_solicitud'),
		                        'name'        => 'procedimiento_solicitud',
		                        'id'          => 'procedimiento_solicitud', 
		                        'class'          => 'form-control boxsizingBorder',
		                        'placeholder' => 'Describir el impacto positivo de tener el servicio disponible y / o el impacto negativo de lo contrario. 
		                                          El impacto se puede cuantificar por el número de usuarios afectados, el impacto sobre cada usuario, 
		                                          y el coste para la empresa.',
		                        //'rows' => '6',                           
		                                  );
		                echo form_textarea($data)?>
			        </div>
	 </div>
   </div>
   
   <br><br>
    <h3 class = "text-primary">Procedimientos para Actualizar/Modificar el Acuerdo</h3> <hr><br>
   <div class="row">
	  <div class="form-group">

			        <div class="col-md-offset-1">
						<label for="tipo_servicio" class="col-md-2 control-label text-right">Procedimientos  </label>		    
					</div>

			        <div class="col-md-8">
			            <?php $data = array(
			            		'value' => set_value('procedimiento_solicitud'),
		                        'name'        => 'procedimiento_solicitud',
		                        'id'          => 'procedimiento_solicitud', 
		                        'class'          => 'form-control boxsizingBorder',
		                        'placeholder' => 'Describir el impacto positivo de tener el servicio disponible y / o el impacto negativo de lo contrario. 
		                                          El impacto se puede cuantificar por el número de usuarios afectados, el impacto sobre cada usuario, 
		                                          y el coste para la empresa.',
		                        //'rows' => '6',                           
		                                  );
		                echo form_textarea($data)?>
			        </div>
	 </div>
   </div>


 <br><br><br><hr>

 <div class='row tex'>
	 <div class="col-md-1 col-md-offset-5">
	 <a id="activate-step-1" class="btn btn-default btn-lg">Volver</a>
	 </div>
	 <div class="col-md-1">
	 <button id="activate-step-3" class="btn btn-primary btn-lg">Siguiente</button>
	 </div>
 </div>
 <br>