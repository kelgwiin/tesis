
 <h3 class = "text-primary"> Selección del Servicio</h3> <hr><br>

  <div class="row">
	<div class="col-md-5">

	 <div class="form-group">

	 	<div class="required text-right">
				<label for="service_name" class="col-md-5 control-label">Servicio</label> 
			</div>

		<div class="col-md-7">		
		 <?php
			$options = array(
				'seleccione' => 'Seleccione un Servicio',		        	  
			);
			foreach($servicios as $servicio)
			{ 
				$options[$servicio->servicio_id] = $servicio->nombre;
			}


		?>

		 <?php echo form_dropdown('servicios', $options,set_value('servicios',@$servicio_proceso_id),'class="form-control" id="dropdown_servicio_procesos" '); ?>	
	 	</div>
	 </div>	    
	</div> 
  </div>
 <br><br>

 <h3 class = "text-primary"> Partes interesadas</h3> <hr><br>

 <div class="row">
	<div class="col-md-5">

		  	<div class="form-group">
			
			<div class="required text-right">
				<label for="service_name" class="col-md-5 control-label">Gestor de Niveles de Servicio</label> 
			</div>

		    <div class="col-md-7">

		         <?php
		        	$options = array(
		        		'seleccione' => 'Seleccione una Persona',		        	  
	                );
					//$options['-1'] = 'Seleccione un Departamento';
					foreach($personal as $persona)
		            { 
		              $options[$persona->id_personal] = $persona->codigo_empleado." - ".$persona->nombre;
		            }


		        ?>

		      	 <?php echo form_dropdown('propietario_servicio', $options,set_value('propietario_servicio'),'class="form-control" id="dropdown_propietario" '); ?>	
		    </div>
		</div>

	</div>

	<div class="col-md-7">

	  <div class="form-group">

			<div class="required">
				<label for="tipo_servicio" class="col-md-2 control-label">Clientes</label>		    
			</div>

			<div class="col-md-9">
			 <?php $data = array(
			       'value' => set_value('clientes'),
		            'name'        => 'clientes',
		            'id'          => 'clientes', 
		            'class'          => 'form-control boxsizingBorder',
		            'rows' => '2',                           
		                                  );
		          echo form_textarea($data)?>
			 </div>
	</div>

	</div>
  </div>



 <br><br><hr>

 <div class='row tex'>
	 <div class="col-md-2 col-md-offset-5">
	 <button id="activate-step-2" class="btn btn-primary btn-lg">Siguiente</button>
	 </div>
 </div>
 <br>