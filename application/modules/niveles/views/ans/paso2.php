
 <h2> PASO 2</h2><hr><br><br>

 <div class="row">
	<div class="col-md-5">

		  	<div class="form-group">
			
			<div class="required">
				<label for="service_name" class="col-md-4 control-label">Nombre del Servicio</label> 
			</div>

		    <div class="col-md-7">

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

	</div>

	<div class="col-md-7">

	</div>
 </div>



 <br><br>

 <div class='row tex'>
	 <div class="col-md-1 col-md-offset-5">
	 <a id="activate-step-1" class="btn btn-default">Volver</a>
	 </div>
	 <div class="col-md-1">
	 <button id="activate-step-3" class="btn btn-primary">Siguiente</button>
	 </div>
 </div>
 <br>