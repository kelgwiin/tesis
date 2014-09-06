<script type="text/javascript" src="<?=base_url()?>application/modules/cargar_data/views/procesos_negocio/js/operaciones_ajax.js"></script>

<div id="page-wrapper">

	<div class="row">
		<div class="col-lg-12">
			<h1>Gesti&#243;n de Procesos de Negocio</h1>
		</div>
	</div>

	<div class="panel panel-primary">
		<div class="panel-heading"> <i class="fa fa-plus-circle"></i> Crear Nuevo Proceso de Negocio</div>
		<br>
		 <?php
		 // Apertura de Formulario
		$attributes = array('role' => 'form', 'id'=> 'new_service_form','class'=>'form-horizontal');
		echo form_open(base_url().'index.php/cargar_datos/procesos_de_negocio/crear',$attributes); 
		?>
		<div class="form-group">
		
		<div class="required">
			<label for="process_name" class="col-lg-4 control-label">Nombre</label> 
		</div>
	    <div class="col-lg-4">

	       	<?php	
			    $input_data = array(
	            'value'=> set_value('process_name'),
		        'name'        => 'process_name',
		        'id'          => 'process_name',
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
			        echo form_error('process_name');
				 ?>
				</label>
			</div>
		</div>	

	    <div class="form-group">
	        <div class="required">
				<label for="descripcion" class="col-lg-4 control-label">Descripci&#243;n</label>		    
			</div>
	        <div class="col-lg-5">
	            <?php $data = array(
	            		   'value'=> set_value('descripcion'),
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
				<label for="departamentos" class="col-lg-4 control-label">Departamento</label>		    
			</div>
			<div class="col-lg-4">
		        <?php
		        	$options = array(
		        		'-1' => 'Seleccione un Departamento',		        	  
	                );
					//$options['-1'] = 'Seleccione un Departamento';
					foreach($departamentos as $departamento)
		            { 
		              $options[$departamento->departamento_id] = $departamento->nombre;
		            }


		        ?>

		       <?php echo form_dropdown('departamentos', $options,set_value('departamentos'),'class="form-control" id="dropdown_departamentos" '); ?>

		    </div>
		</div>

		<div class="form-group">
	      	<div class="control-label col-lg-4">
	      	</div>
	      	<div class="col-lg-5">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('departamentos');
				 ?>
				</label>
			</div>
		</div>	

		<div class="form-group">
		   	<div class="col-lg-offset-5 col-lg-10">
			    <button type="submit" class="btn btn-primary">Crear</button> 
		    	<a href="<?php echo base_url('index.php/cargar_datos/procesos_de_negocio');?>" type="button" class="btn btn-danger" id="cancelar">Cancelar</a>
		    </div> 	
		</div>


			  
		<?php echo form_close(); ?>
	</div>