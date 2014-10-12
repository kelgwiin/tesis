<script type="text/javascript" src="<?=base_url()?>application/modules/cargar_data/views/servicio_procesos/js/operaciones_ajax.js"></script>

<div id="page-wrapper">

	<div class="row">
		<div class="col-lg-12">
			<h1>Gesti&#243;n de Procesos de Servicio</h1>
		</div>
	</div>

	<div class="panel panel-primary">
		<div class="panel-heading"> <i class="fa fa-cogs"></i> Procesos de Servicio - Actualizar </div>
		<br>
		 <?php
		 // Apertura de Formulario
		$attributes = array('role' => 'form', 'id'=> 'new_service_form','class'=>'form-horizontal');
		echo form_open(base_url().'index.php/cargar_datos/servicio_procesos/modificar/'.$servicio_proceso->servicio_proceso_id,$attributes); 

	
		?>

		<?php foreach($servicios as $servicio)
			{
		       if($servicio->servicio_id == $servicio_proceso->servicio_id)
					{
						$servicio_name = $servicio->nombre; 
				   }
			}?>

		<div class="form-group">
		

		<div class="">
			<label  class="col-lg-4 control-label">Nombre del Servicio</label> 
		</div>
	    <div class="col-lg-4">

	       	<?php	
			    $input_data = array(
	            'value'=> set_value('servicio_name',@$servicio_name),
		        'name'        => 'servicio_name',
		        'id'          => 'servicio_name',
		        'placeholder' => 'Nombre del Servicio',
		        'type' =>'text',
		        'autocomplete'=> "off",
		        'class' => "form-control",
		        'readonly'    => 'readonly'
		        );
		        echo form_input($input_data);
		    ?>	
	    </div>
		</div>

		<div class="form-group">
		
		<div class="required">
			<label for="categoria_name" class="col-lg-4 control-label">Nombre del Proceso</label> 
		</div>
	    <div class="col-lg-4">

	       	<?php	
			    $input_data = array(
	            'value'=> set_value('servicio_proceso_name',@$servicio_proceso->nombre),
		        'name'        => 'servicio_proceso_name',
		        'id'          => 'servicio_proceso_name',
		        'placeholder' => 'Nombre del Proceso',
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
			        echo form_error('servicio_proceso_name');
				 ?>
				</label>
			</div>
		</div>	

	    <div class="form-group">
	        <div class="">
				<label for="descripcion" class="col-lg-4 control-label">Descripci&#243;n</label>		    
			</div>
	        <div class="col-lg-5">
	            <?php $data = array(
	            		   'value'=> set_value('descripcion',@$servicio_proceso->descripcion),
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
		
		<div class="">
			<label for="categoria_name" class="col-lg-4 control-label">Tipo de Proceso</label> 
		</div>
	    <div class="col-lg-4">

	       	<?php	
			    $input_data = array(
	            'value'=> set_value('tipo_proceso_servicio',@$servicio_proceso->tipo),
		        'name'        => 'tipo_proceso_servicio',
		        'id'          => 'tipo_proceso_servicio',
		        'placeholder' => 'Nombre del Proceso',
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
			        echo form_error('tipo_proceso_servicio');
				 ?>
				</label>
			</div>
		</div>	

		<div class="form-group">
		   	<div class="col-lg-offset-5 col-lg-10">
			    <button data-toggle="modal" data-target="#modificar" class="btn btn-warning">Actualizar</button> 
		    	<a href="<?php echo base_url('index.php/cargar_datos/servicio_procesos/'.$servicio_proceso->servicio_id);?>" type="button" class="btn btn-danger" id="cancelar">Cancelar</a>
		    </div> 	
		</div>



		 <div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		      
		      </div>
		      <div class="modal-body text-center">
		        <p><div class="alert alert-warning" role="alert"><i class="fa fa-exclamation-triangle"></i> ¿Est&#225; seguro que desea <b>Actualizar</b> este Proceso de Servicio?</div></p>
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

