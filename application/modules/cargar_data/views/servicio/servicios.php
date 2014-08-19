 <script type="text/javascript" src="<?=base_url()?>application/modules/cargar_data/views/servicio/js/operaciones_ajax.js"></script>
<div id="page-wrapper">


		
    <h1>Nuevo Servicio</h1><br><br>

	<div class="panel panel-primary">

	<div class="panel-heading">
   		<h3 class="panel-title">Creacion de un Nuevo Servicio</h3>
  	</div>

  	<div class="panel-body">
	    <?php
		    // Apertura de Formulario
		    $attributes = array('role' => 'form', 'id'=> 'new_service_form','class'=>'form-horizontal');
			echo form_open(base_url().'users/signup/',$attributes); 
	    ?>

	    <div class="form-group">
			
			<div class="required">
				<label for="service_name" class="col-lg-4 control-label">Nombre del Servicio</label> 
			</div>

		    <div class="col-lg-3">

		       	<?php	
				    $input_data = array(
		            'value'=> set_value('name'),
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

	        <div class="required">
				<label for="tipo_servicio" class="col-lg-4 control-label">Descripci&#243;n</label>		    
			</div>

	        <div class="col-lg-5">
	            <?php $data = array(
                        'name'        => 'descripcion',
                        'id'          => 'descripcion', 
                        'class'          => 'form-control boxsizingBorder',
                        //'rows' => '6',                           
                                  );
                echo form_textarea($data)?>
	        </div>
	    </div>

	    <div class="form-group">
	        
	    	<div class="required">
				<label for="tipo_servicio" class="col-lg-4 control-label">Caracter&#237;sticas</label>		    
			</div>

	        <div class="col-lg-5">
	            <?php $data = array(
                        'name'        => 'caracteristicas',
                        'id'          => 'caracteristicas', 
                        'class'          => 'form-control boxsizingBorder',
                        //'rows' => '6',                           
                                  );
                echo form_textarea($data)?>
	        </div>
	    </div>
	 
		<div class="form-group">
	 		
	 		<div class="required">
				<label for="categoria_servicio" class="col-lg-4 control-label">Categoria del Servicio</label>		    
			</div>

			<div class="col-lg-3">
		        <?php
		        	$options = array(
		        	  'seleccione' => 'Seleccione una Categoria',
	                );
		        ?>

	            <?php echo form_dropdown('categoria_servicio', $options,'seleccione','class="form-control" id="dropdown_categorias"'); ?>
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
	        ?>

	            <?php echo form_dropdown('tipo_servicio', $options,'seleccione','class="form-control" id="dropdown_tipos"'); ?>
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
		        ?>
		        
		        <?php echo form_dropdown('propietario_servicio', $options,'seleccione','class="form-control" id="dropdown_propietario"'); ?>
			</div>
	    </div>

		<div class="form-group">
	        <div class="required">
				<label for="categoria_servicio" class="col-lg-4 control-label">Impacto en el Negocio</label>		    
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

	            <?php echo form_dropdown('impacto_servicio', $options,'seleccione','class="form-control" id="dropdown_impacto"'); ?>
	        </div>
	    </div>

	


	 	<div class="col-lg-3">
	     <button class="btn btn-primary form-group">Crear Servicio</button>
	    <?php echo form_close(); ?>
		</div>

	</div>

</div> <!-- Page wraper -->