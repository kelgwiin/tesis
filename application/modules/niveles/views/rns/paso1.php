

 <!--<h3> <b>Selección del Servicio</b><small><a type="button" class="btn btn-xs" data-container="body" data-toggle="popover" data-placement="right" 
 		data-content="<?php $ayuda_servicio;?>" data-original-title="" title="">(<i class="fa fa-info-circle"></i> <u>Ayuda</u>)</a></small></h3>  <hr><br>-->


<h3> <b>Nombre del Documento de Requisitos</b></h3> <hr><br>

  <div class="row">
		 <div class="form-group">
				
				<div class="required text-right">
					<label for="service_name" class="col-md-2 control-label">Nombre</label> 
				</div>

			    <div class="col-md-7">
			       <input type='text' name="nombre_requisito" class="form-control" id='nombre_requisito' value="<?php echo set_value('nombre_requisito'); ?>"/>
			     

			    </div>
			</div>
			<div class="form-group">
		     <div class="control-label col-md-2">
		      </div>
		      	<div class="col-md-8">
				    <label style="color:red;">
				   	<?php 
				        echo form_error('nombre_requisito');
					 ?>
					</label>
				</div>
			</div>
	 
</div>
		<br>	
	

 <h3> <b>Selección del Servicio</b><small><a type="button" class="btn btn-xs" data-toggle="modal" data-target="#ayuda_servicio">
 	(<i class="fa fa-info-circle"></i> <u>Ayuda</u>)</a></small></h3>  <hr><br>

  <div class="row">

	 <div class="form-group">

	 	<div class="required text-right">
				<label for="service_name" class="col-md-2 control-label">Servicio</label> 
			</div>

		<div class="col-md-3">		
		 <?php
			$options = array(
				'seleccione' => 'Seleccione un Servicio',		        	  
			);
			foreach($servicios as $servicio)
			{ 
				$options[$servicio->servicio_id] = $servicio->nombre;
			}


		?>

		 <?php echo form_dropdown('servicio', $options,set_value('servicio'),'class="form-control" id="dropdown_servicio" '); ?>	
	 	</div>
	 </div>	 


	<div class="form-group">
	     <div class="control-label col-md-2">
	      </div>
	      	<div class="col-md-3">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('servicio');
				 ?>
				</label>
			</div>
	</div>

	</div> 

  
 <br>

 <h3> <b>Nombre del Cliente</b><small><a type="button" class="btn btn-xs" data-toggle="modal" data-target="#ayuda_partes_interesadas">
 	(<i class="fa fa-info-circle"></i> <u>Ayuda</u>)</a></small></h3> <hr><br>      

 <div class="row">


	  <div class="form-group">

			<div class="required">
				<label for="tipo_servicio" class="col-md-2 control-label">Cliente(s)</label>		    
			</div>

			<div class="col-md-6">
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


	<div class="form-group">
	     <div class="control-label col-md-2">
	      </div>
	      	<div class="col-md-6">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('clientes');
				 ?>
				</label>
			</div>
	</div>

  </div>



 <br><br><hr>

 <div class='row tex'>
	 <div class="col-md-1 col-md-offset-2">
	 <a id="activate-step-1" class="btn btn-default" disabled="disabled">Volver</a>
	 </div>
	<div class="col-md-1">
	 <a id="activate-step-3" class="btn btn-primary">Siguiente</a>
	 </div>

	 <div class="col-md-1 col-md-offset-4">
	 <a class="btn btn-danger" data-toggle="modal" data-target="#salir_modal">Cancelar</a>
	 </div>
 </div>
