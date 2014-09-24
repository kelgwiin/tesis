<script type="text/javascript" src="<?=base_url()?>application/modules/cargar_data/views/servicio_categorias/js/operaciones_ajax.js"></script>
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
			<h1>Gesti&#243;n de Categor&#237;as de Servicio</h1>
		</div>
	</div>

	<div class="panel panel-primary">
		<div class="panel-heading"> <i class="fa fa-plus-circle"></i> Crear Nueva Categor&#237;a de Servicio</div>
		<br>
		 <?php
		 // Apertura de Formulario
		$attributes = array('role' => 'form', 'id'=> 'new_service_form','class'=>'form-horizontal');
		echo form_open_multipart(base_url().'index.php/cargar_datos/servicio_categorias/crear',$attributes); 
		?>

		<div class="form-group">
			
			<div class="">
				<label class="col-md-4 control-label">Imagen para Cat&#225;logo</label> 
			</div>

		    <div class="col-md-7">

		       	 <div id="imagePreview"></div>
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
			<label for="categoria_name" class="col-lg-4 control-label">Nombre de la Categor&#237;a</label> 
		</div>
	    <div class="col-lg-4">

	       	<?php	
			    $input_data = array(
	            'value'=> set_value('categoria_name'),
		        'name'        => 'categoria_name',
		        'id'          => 'categoria_name',
		        'placeholder' => 'Nombre de la Categor&#237;a',
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
			        echo form_error('categoria_name');
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
		   	<div class="col-lg-offset-5 col-lg-10">
			    <button type="submit" class="btn btn-primary">Crear</button> 
		    	<a href="<?php echo base_url('index.php/cargar_datos/servicio_categorias');?>" type="button" class="btn btn-danger" id="cancelar">Cancelar</a>
		    </div> 	
		</div>


			  
		<?php echo form_close(); ?>
	</div>