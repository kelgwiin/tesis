
<div id="page-wrapper">


		
    <h1>Gesti&#243;n de Servicios de TI</h1><br>

	<div class="panel panel-primary">

	<div class="panel-heading">
   		<i class="fa fa-plus-circle"></i> Crear Nuevo Servicio de TI
  	</div>

  	<div class="panel-body">
	    <?php
		    // Apertura de Formulario
		    $attributes = array('role' => 'form', 'id'=> 'new_service_form','class'=>'form-horizontal');
			echo form_open(base_url().'index.php/cargar_datos/servicio/crear',$attributes); 
	    ?>

	    <div class="form-group">
			
			<div class="required">
				<label for="service_name" class="col-lg-4 control-label">Nombre del Servicio</label> 
			</div>

		    <div class="col-lg-3">

		       	<?php	
				    $input_data = array(
		            'value'=> set_value('service_name'),
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
	      	<div class="control-label col-lg-4">
	      	</div>
	      	<div class="col-lg-5">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('service_name');
				 ?>
				</label>
			</div>
		</div>	



	    <div class="form-group">

	        <div class="required">
				<label for="tipo_servicio" class="col-lg-4 control-label">Descripci&#243;n</label>		    
			</div>

	        <div class="col-lg-5">
	            <?php $data = array(
	            		'value' => set_value('descripcion'),
                        'name'        => 'descripcion',
                        'id'          => 'descripcion', 
                        'class'          => 'form-control boxsizingBorder',
                        //'rows' => '6',                           
                                  );
                echo form_textarea($data)?>
	        </div>
	    </div>

	    <div class="form-group">
	      	<div class="control-label col-lg-4">
	      	</div>
	      	<div class="col-lg-5">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('descripcion');
				 ?>
				</label>
			</div>
		</div>	

	    <div class="form-group">
	        
	    	<div class="required">
				<label for="tipo_servicio" class="col-lg-4 control-label">Caracter&#237;sticas</label>		    
			</div>

	        <div class="col-lg-5">
	            <?php $data2 = array(
	            		'value' => set_value('caracteristicas_servicio'),
                        'name'        => 'caracteristicas_servicio',
                        'id'          => 'caracteristicas_servicio', 
                        'class'          => 'form-control boxsizingBorder',
                        //'rows' => '6',                           
                                  );
                echo form_textarea($data2)?>
	        </div>
	    </div>

	    <div class="form-group">
	      	<div class="control-label col-lg-4">
	      	</div>
	      	<div class="col-lg-5">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('caracteristicas_servicio');
				 ?>
				</label>
			</div>
		</div>	
	 
		<div class="form-group">
	 		
	 		<div class="required">
				<label for="categoria_servicio" class="col-lg-4 control-label">Categor&#237;a del Servicio</label>		    
			</div>

			<div class="col-lg-3">

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

		      	 <?php echo form_dropdown('categoria_servicio', $options,set_value('categoria_servicio'),'class="form-control" id="dropdown_categorias" '); ?>	

	        </div>
		</div>
		<div class="form-group">
	      	<div class="control-label col-lg-4">
	      	</div>
	      	<div class="col-lg-5">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('categoria_servicio');
				 ?>
				</label>
			</div>
		</div>	

		<div class="form-group">
	        <div class="required">
				<label for="tipo_servicio" class="col-lg-4 control-label">Tipo de Servicio</label>		    
			</div>

			<div class="col-lg-3">

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

		      	 <?php echo form_dropdown('tipo_servicio', $options,set_value('tipo_servicio'),'class="form-control" id="dropdown_tipos" '); ?>	
	
	        </div>
	    </div>

	    <div class="form-group">
	      	<div class="control-label col-lg-4">
	      	</div>
	      	<div class="col-lg-5">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('tipo_servicio');
				 ?>
				</label>
			</div>
		</div>	


		<div class="form-group">
	        <div class="required">
				<label for="tipo_servicio" class="col-lg-4 control-label">Proveedor del Servicio</label>		    
			</div>

			<div class="col-lg-3">

				 <?php
		        	$options = array(
		        		'seleccione' => 'Seleccione un Proveedor',		        	  
	                );
					//$options['-1'] = 'Seleccione un Departamento';
					foreach($proveedores as $proveedor)
		            { 
		              $options[$proveedor->nombre] = $proveedor->nombre;
		            }


		        ?>

		      	 <?php echo form_dropdown('proveedor_servicio', $options,set_value('proveedor_servicio'),'class="form-control" id="dropdown_proveedor" '); ?>	
	
	        </div>
	    </div>

	    <div class="form-group">
	      	<div class="control-label col-lg-4">
	      	</div>
	      	<div class="col-lg-5">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('proveedor_servicio');
				 ?>
				</label>
			</div>
		</div>	

	    <div class="form-group">
	        <div class="required">
				<label for="tipo_servicio" class="col-lg-4 control-label">Propietario del Servicio</label>		    
			</div>

			<div class="col-lg-3">

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

	    <div class="form-group">
	      	<div class="control-label col-lg-4">
	      	</div>
	      	<div class="col-lg-5">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('propietario_servicio');
				 ?>
				</label>
			</div>
		</div>	

		<div class="form-group">
	        <div class="required">
				<label for="impacto_servicio" class="col-lg-4 control-label">Impacto en el Negocio</label>		    
			</div>

			<div class="col-lg-3">
		        <?php
		        	$options = array(
		        	  'seleccione' => 'Seleccione una Categoria',
		        	  'Baja' => 'Baja',
		        	  'Media' => 'Media',
		        	  'Alta' => 'Alta',

	                );
		        ?>

	            <?php echo form_dropdown('impacto_servicio', $options,set_value('impacto_servicio'),'class="form-control" id="dropdown_impacto"'); ?>
	        </div>
	    </div>

	    <div class="form-group">
	      	<div class="control-label col-lg-4">
	      	</div>
	      	<div class="col-lg-5">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('impacto_servicio');
				 ?>
				</label>
			</div>
		</div>	

	


	 	<div class="col-lg-1 col-lg-offset-5">
	     <button type="submit" class="btn btn-primary form-group">Crear Servicio</button>
	     </div>
	     <div class="col-lg-1">
	     <a href="<?php echo base_url('index.php/cargar_datos/servicios');?>" type="button" class="btn btn-danger" id="cancelar">Cancelar</a>
	    <?php echo form_close(); ?>
		</div>

	</div>

</div> <!-- Page wraper -->