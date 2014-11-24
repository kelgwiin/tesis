

 <!--<h3> <b>Selección del Servicio</b><small><a type="button" class="btn btn-xs" data-container="body" data-toggle="popover" data-placement="right" 
 		data-content="<?php $ayuda_servicio;?>" data-original-title="" title="">(<i class="fa fa-info-circle"></i> <u>Ayuda</u>)</a></small></h3>  <hr><br>-->


 <h3> <b>Nombre del Acuerdo</b></h3> <hr><br>

  <div class="row">
	<div class="col-md-9">
		 <div class="form-group">
				
				<div class="required text-right">
					<label for="service_name" class="col-md-3 control-label">Nombre del Acuerdo</label> 
				</div>

							<?php if($operacion == 'actualizar') : ?>
							<?php $acuerdo_nombre = $acuerdo->nombre_acuerdo; ?>
			                <?php else : ?>
							<?php $acuerdo_nombre =''; ?>	
							<?php endif ?>				

			    <div class="col-md-8">
			       <input type='text' name="nombre_acuerdo" class="form-control" id='nombre_acuerdo' value="<?php echo set_value('nombre_acuerdo',@$acuerdo_nombre); ?>"/>
			     

			    </div>
			</div>
			<div class="form-group">
		     <div class="control-label col-md-3">
		      </div>
		      	<div class="col-md-8">
				    <label style="color:red;">
				   	<?php 
				        echo form_error('nombre_acuerdo');
					 ?>
					</label>
				</div>
			</div>
	 </div>
</div>
		<br>		

 <h3> <b>Selección del Servicio</b><small><a type="button" class="btn btn-xs" data-toggle="modal" data-target="#ayuda_servicio">
 	(<i class="fa fa-info-circle"></i> <u>Ayuda</u>)</a></small></h3>  <hr><br>

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

		 <?php echo form_dropdown('servicio', $options,set_value('servicio',@$acuerdo->id_servicio),'class="form-control" id="dropdown_servicio" '); ?>	
	 	</div>
	 </div>	 


	<div class="form-group">
	     <div class="control-label col-md-5">
	      </div>
	      	<div class="col-md-7">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('servicio');
				 ?>
				</label>
			</div>
	</div>

	</div> 
  </div>

  
 <br>

 <h3> <b>Partes interesadas</b><small><a type="button" class="btn btn-xs" data-toggle="modal" data-target="#ayuda_partes_interesadas">
 	(<i class="fa fa-info-circle"></i> <u>Ayuda</u>)</a></small></h3> <hr><br>      

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

		      	 <?php echo form_dropdown('gestor', $options,set_value('gestor',@$acuerdo->gestor_servicio),'class="form-control" id="dropdown_gestor" '); ?>	
		    </div>
		</div>


		<div class="form-group">
		     <div class="control-label col-md-5">
		      </div>
		      	<div class="col-md-7">
				    <label style="color:red;">
				   	<?php 
				        echo form_error('gestor');
					 ?>
			 </label>
		</div>
	</div>

	</div>

	<div class="col-md-7">

	  <div class="form-group">

			<div class="required">
				<label for="tipo_servicio" class="col-md-2 control-label">Cliente(s)</label>		    
			</div>

			<div class="col-md-9">
			 <?php $data = array(
			       'value' => set_value('clientes',@$acuerdo->cliente),
		            'name'        => 'clientes',
		            'id'          => 'clientes', 
		            'class'          => 'form-control boxsizingBorder',
		            'rows' => '2',                           
		                                  );
		          echo form_textarea($data)?>
			 </div>
	</div>


	<div class="form-group">
	     <div class="control-label col-md-2">
	      </div>
	      	<div class="col-md-9">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('clientes');
				 ?>
				</label>
			</div>
	</div>

	<div class="form-group">
			
			<div class="required text-right">
				<label for="service_name" class="col-md-2 control-label">Representante del Cliente</label> 
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

		      	 <?php echo form_dropdown('representante_cliente', $options,set_value('representante_cliente',@$acuerdo->representante_cliente),'class="form-control" id="dropdown_representante_cliente" '); ?>	
		    </div>
		</div>


		<div class="form-group">
		     <div class="control-label col-md-2">
		      </div>
		      	<div class="col-md-7">
				    <label style="color:red;">
				   	<?php 
				        echo form_error('representante_cliente');
					 ?>
			 </label>
		</div>
	</div>

	</div>
  </div>



 <br><br><hr>

 <div class='row tex'>
	 <div class="col-md-1 col-md-offset-2">
	 <a id="activate-step-1" class="btn btn-default" disabled="disabled">Volver</a>
	 </div>
	<div class="col-md-1">
	 <a id="activate-step-2" class="btn btn-primary">Siguiente</a>
	 </div>

	 <div class="col-md-1 col-md-offset-4">
	 <a class="btn btn-danger" data-toggle="modal" data-target="#salir_modal">Cancelar</a>
	 </div>
 </div>
