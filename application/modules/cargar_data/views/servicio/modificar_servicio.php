<script type="text/javascript" src="<?=base_url()?>application/modules/cargar_data/views/servicio/js/operaciones_ajax.js"></script>
<style>
#imagePreview {
    width: 80px;
    height: 80px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
</style>

<div id="page-wrapper">

	<div class="row">
		<div class="col-lg-12">
			<h1>Gesti&#243;n de Servicios de TI</h1>
		</div>
	</div>

	<div class="panel panel-primary">
		<div class="panel-heading"> <i class="fa fa-list"></i> Servicio - Actualizar</div>
		<br>

		<div class="panel-body">
				 <?php
				 // Apertura de Formulario
				$attributes = array('role' => 'form', 'id'=> 'new_service_form','class'=>'form-horizontal');
				echo form_open_multipart(base_url().'index.php/cargar_datos/servicios/modificar/'.$servicio->servicio_id,$attributes); 

			
				?>
				 <h3 class = "text-primary"> Datos Básicos</h3> <hr>
					<div class="row">
					<div class="col-md-5">
			    	<div class="form-group">
					
					<div class="required">
						<label for="service_name" class="col-md-4 control-label">Nombre del Servicio</label> 
					</div>

				    <div class="col-md-7">

				       	<?php	
						    $input_data = array(
				            'value'=> set_value('service_name',@$servicio->nombre),
					        'name'        => 'service_name',
					        'id'          => 'service_name',
					        'placeholder' => 'Nombre del Servicio',
					        //'autofocus'=>  'autofocus',
					        'type' =>'text',
					        'autocomplete'=> "off",
					        'class' => "form-control",
					        //'title'=> 'Solo Caracteres Alfabéticos, minimo:3/maximo:20',
					        //'required' => 'required',
					        //'pattern'=> '[A-Za-z]{3,12}',
					        );
					        echo form_input($input_data);
					    ?>	
				    </div>
				</div>
				 <div class="form-group">
			      	<div class="control-label col-md-4">
			      	</div>
			      	<div class="col-md-7">
					    <label style="color:red;">
					   	<?php 
					        echo form_error('service_name');
						 ?>
						</label>
					</div>
				</div>


				<div class="form-group">
			
					<div class="">
						<label class="col-md-4 control-label">Imagen para Cat&#225;logo</label> 
					</div>

				    <div class="col-md-7">

				       	 <div id="imagePreview" style="background-image: url(<?=base_url().$servicio->ruta_imagen?>);"></div>
		    			<input id="uploadFile" type="file" name="userfile" size="20" />
		    			<h5><small>Tamaño max: <b>140x140</b>. Peso max: <b>50 kb.</b> Formato: <b>jpg|png</b>. </small></h5> 
				    </div>
				</div>

				 <div class="form-group">
			      	<div class="control-label col-md-4">
			      	</div>
			      	<div class="col-md-7">
					    <label style="color:red;">
					   	<?php 
					        echo $mensaje;
						 ?>
						</label>
					</div>
				</div>


				<div class="form-group">
			        <div class="required">
						<label class="col-md-4 control-label">Estatus del Servicio</label>		    
					</div>

					<div class="col-md-7">

						 
			       		<?php
					       	$options = array(
					       	  'seleccione' => 'Seleccione',
					       	  'Activo' => 'Activo',
					       	  'Retirado' => 'Retirado',
			                );
					        ?>
				            <?php echo form_dropdown('estatus_servicio', $options,set_value('estatus_servicio',@$servicio->estatus),'class="form-control" id="dropdown_estatus_servicio"'); ?>
			     
				       </div>
			    </div>

			    <div class="form-group">
			      	<div class="control-label col-md-4">
			      	</div>
			      	<div class="col-md-7">
					    <label style="color:red;">
					   	<?php 
					        echo form_error('estatus_servicio');
						 ?>
						</label>
					</div>
				</div>	



				<div class="form-group">
			 		
			 		<div class="required">
						<label for="categoria_servicio" class="col-md-4 control-label">Categor&#237;a del Servicio</label>		    
					</div>

					<div class="col-md-7">

						 <?php
				        	$options = array(
				        		'seleccione' => 'Seleccione una Categor&#237;a',		        	  
			                );
							//$options['-1'] = 'Seleccione un Departamento';
							foreach($servicio_categorias as $servicio_categoria)
				            { 
				              $options[$servicio_categoria->nombre] = $servicio_categoria->nombre;
				            }


				        ?>

				      	 <?php echo form_dropdown('categoria_servicio', $options,set_value('categoria_servicio',@$servicio->categoria_servicio),'class="form-control" id="dropdown_categorias" '); ?>	

			        </div>
				</div>
				<div class="form-group">
			      	<div class="control-label col-md-4">
			      	</div>
			      	<div class="col-md-7">
					    <label style="color:red;">
					   	<?php 
					        echo form_error('categoria_servicio');
						 ?>
						</label>
					</div>
				</div>


				<div class="form-group">
			        <div class="required">
						<label for="tipo_servicio" class="col-md-4 control-label">Tipo de Servicio</label>		    
					</div>

					<div class="col-md-7">

						 <?php
				        	$options = array(
				        		'seleccione' => 'Seleccione un Tipo',		        	  
			                );
							//$options['-1'] = 'Seleccione un Departamento';
							foreach($servicio_tipos as $servicio_tipo)
				            { 
				              $options[$servicio_tipo->nombre] = $servicio_tipo->nombre;
				            }


				        ?>

				      	 <?php echo form_dropdown('tipo_servicio', $options,set_value('tipo_servicio',@$servicio->tipo_servicio),'class="form-control" id="dropdown_tipos" '); ?>	
			
			        </div>
			    </div>

			    <div class="form-group">
			      	<div class="control-label col-md-4">
			      	</div>
			      	<div class="col-md-7">
					    <label style="color:red;">
					   	<?php 
					        echo form_error('tipo_servicio');
						 ?>
						</label>
					</div>
				</div>	


				<div class="form-group">
			        <div class="required">
						<label for="tipo_servicio" class="col-md-4 control-label">Proveedor del Servicio</label>		    
					</div>

					<div class="col-md-7">

						 <?php
				        	$options = array(
				        		'seleccione' => 'Seleccione un Proveedor',		        	  
			                );
							//$options['-1'] = 'Seleccione un Departamento';
							foreach($proveedores as $proveedor)
				            { 
				              $options[$proveedor->proveedor_id] = $proveedor->nombre;
				            }


				        ?>

				      	 <?php echo form_dropdown('proveedor_servicio', $options,set_value('proveedor_servicio',@$servicio->proveedor_servicio),'class="form-control" id="dropdown_proveedor" '); ?>	
			
			        </div>
			    </div>

			    <div class="form-group">
			      	<div class="control-label col-md-4">
			      	</div>
			      	<div class="col-md-7">
					    <label style="color:red;">
					   	<?php 
					        echo form_error('proveedor_servicio');
						 ?>
						</label>
					</div>
				</div>	

			    <div class="form-group">
			        <div class="required">
						<label for="tipo_servicio" class="col-md-4 control-label">Propietario del Servicio</label>		    
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

				      	 <?php echo form_dropdown('propietario_servicio', $options,set_value('propietario_servicio',@$servicio->propietario_servicio),'class="form-control" id="dropdown_propietario" '); ?>
				       </div>
			    </div>

			    <div class="form-group">
			      	<div class="control-label col-md-4">
			      	</div>
			      	<div class="col-md-7">
					    <label style="color:red;">
					   	<?php 
					        echo form_error('propietario_servicio');
						 ?>
						</label>
					</div>
				</div>	
   
		</div>


		<div class="col-md-7" style="border-left:1px solid #D0D0D0 ;">

				  <div class="form-group">

			        <div class="required">
						<label for="tipo_servicio" class="col-md-2 control-label">Descripci&#243;n</label>		    
					</div>

			        <div class="col-md-9">
			            <?php $data = array(
			            		'value' => set_value('descripcion',@$servicio->descripcion),
		                        'name'        => 'descripcion',
		                        'id'          => 'descripcion', 
		                        'class'          => 'form-control boxsizingBorder',
		                        //'rows' => '6',                           
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
					        echo form_error('descripcion');
						 ?>
						</label>
					</div>
				</div>	

				 <div class="form-group">
	        
	    	<div class="required">
				<label for="tipo_servicio" class="col-md-2 control-label">Caracter&#237;sticas</label>		    
			</div>

	        <div class="col-md-9">
	            <?php $data2 = array(
	            		'value' => set_value('caracteristicas_servicio',@$servicio->caracteristicas),
                        'name'        => 'caracteristicas_servicio',
                        'id'          => 'caracteristicas_servicio', 
                        'class'          => 'form-control boxsizingBorder',
                        //'rows' => '6',                           
                                  );
                echo form_textarea($data2)?>
	        </div>
	    </div>

	    <div class="form-group">
	      	<div class="control-label col-md-2">
	      	</div>
	      	<div class="col-md-9">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('caracteristicas_servicio');
				 ?>
				</label>
			</div>
		</div>	
		</div>	
		</div>

		 <h3 class = "text-primary"> Informaci&#243;n del Negocio</h3> <hr>
		 <div class="row">
		
			<div class="col-md-5 ">

					<div class="form-group">
				        <div class="required">
							<label for="prioridad_servicio" class="col-md-4 control-label">Prioridad en el Negocio</label>		    
						</div>

						<div class="col-md-7">
					        <?php
					        	$options = array(
					        	  'seleccione' => 'Seleccione una Categoria',
					        	  'Baja' => 'Baja',
					        	  'Media' => 'Media',
					        	  'Alta' => 'Alta',

				                );
					        ?>

				            <?php echo form_dropdown('prioridad_servicio', $options,set_value('prioridad_servicio',@$servicio->prioridad_servicio),'class="form-control" id="dropdown_prioridad"'); ?>
				        </div>
				    </div>

				    <div class="form-group">
				      	<div class="control-label col-md-4">
				      	</div>
				      	<div class="col-md-7">
						    <label style="color:red;">
						   	<?php 
						        echo form_error('prioridad_servicio');
							 ?>
							</label>
						</div>
					</div>			
			</div>

			<div class="col-md-7 ">

				  <div class="form-group">

			        <div class="">
						<label for="tipo_servicio" class="col-md-2 control-label">Impacto en el Negocio</label>		    
					</div>

			        <div class="col-md-9">
			            <?php $data = array(
			            		'value' => set_value('impacto',@$servicio->impacto),
		                        'name'        => 'impacto',
		                        'id'          => 'impacto', 
		                        'class'          => 'form-control boxsizingBorder',
		                        //'rows' => '6',                           
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
					        echo form_error('impacto');
						 ?>
						</label>
					</div>
				</div>	


			</div>

		</div>



		 <h3 class = "text-primary"> Informaci&#243;n de Contacto y Procedimientos de Solicitud </h3> <hr>
		 <div class="row ">

		 	  <div class="form-group">

			        <div class="">
						<label for="tipo_servicio" class="col-md-2 control-label">Procedimiento de Solicitud</label>		    
					</div>

			        <div class="col-md-9">
			            <?php $data = array(
			            		'value' => set_value('procedimiento_solicitud',@$servicio->procedimiento_solicitud),
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

			    <div class="form-group">
			      	<div class="control-label col-md-2">
			      	</div>
			      	<div class="col-md-9">
					    <label style="color:red;">
					   	<?php 
					        echo form_error('procedimiento_solicitud');
						 ?>
						</label>
					</div>
				</div>	


				 <div class="form-group">

			        <div class="">
						<label for="tipo_servicio" class="col-md-2 control-label">Informaci&#243;n de Contacto</label>		    
					</div>

			        <div class="col-md-9">
			            <?php $data = array(
			            		'value' => set_value('contacto',@$servicio->contacto),
		                        'name'        => 'contacto',
		                        'id'          => 'contacto', 
		                        'class'          => 'form-control boxsizingBorder',
		                        //'rows' => '6',                           
		                                  );
		                echo form_textarea($data)?>
			        </div>
			    </div>

	
		
			<div class="col-md-5 ">

							
			</div>

			<div class="col-md-7 ">

				


			</div>

		</div>
		<hr>

		<div class="form-group">
		   	<div class="col-lg-offset-5 col-lg-10">
			    <button data-toggle="modal" data-target="#modificar" class="btn btn-warning">Actualizar</button> 
		    	<a href="<?php echo base_url('index.php/cargar_datos/servicios');?>" type="button" class="btn btn-danger" id="cancelar">Cancelar</a>
		    </div> 	
		</div>

	</div>



		 <div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		      
		      </div>
		      <div class="modal-body text-center">
		        <p><div class="alert alert-warning" role="alert"><i class="fa fa-exclamation-triangle"></i> ¿Est&#225; seguro que desea <b>Actualizar</b> este Servicio?</div></p>
		      </div>
		      <div class="modal-footer">
		      	<button type="submit" class="btn btn-warning">Actualizar</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>      
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->


		
			  
		<?php echo form_close(); ?>
	</div>

