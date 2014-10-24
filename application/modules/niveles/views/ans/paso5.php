
	 <h3 > <b>Responsabilidades</b><small><a type="button" class="btn btn-xs" data-toggle="modal" data-target="#ayuda_responsabilidades_acuerdo">
 	(<i class="fa fa-info-circle"></i> <u>Ayuda</u>)</a></small></h3> <hr><br>
   <div class="row">
	  <div class="form-group">

			        <div class="col-md-offset-1 required">
						<label for="tipo_servicio" class="col-md-2 control-label text-right">Responsabilidades</label>		    
					</div>

			        <div class="col-md-8">
			            <?php $data = array(
			            		'value' => set_value('responsabilidades'),
		                        'name'        => 'responsabilidades',
		                        'id'          => 'responsabilidades', 
		                        'class'          => 'form-control boxsizingBorder',
		                        'placeholder' => '',
		                        //'rows' => '6',                           
		                                  );
		                echo form_textarea($data)?>
			        </div>
	 </div>
	 <div class="form-group">
	     <div class="control-label col-md-3">
	      </div>
	      	<div class="col-md-8">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('responsabilidades');
				 ?>
				</label>
			</div>
		</div>
   </div>


	
    <h3 > <b>Puntos de Contactos</b><small><a type="button" class="btn btn-xs" data-toggle="modal" data-target="#ayuda_contacto_acuerdo">
 	(<i class="fa fa-info-circle"></i> <u>Ayuda</u>)</a></small></h3> <hr><br>
   <div class="row">
	  <div class="form-group">

			        <div class="col-md-offset-1 required">
						<label for="tipo_servicio" class="col-md-2 control-label text-right">Información de Contacto</label>		    
					</div>

			        <div class="col-md-8">
			            <?php $data = array(
			            		'value' => set_value('contactos'),
		                        'name'        => 'contactos',
		                        'id'          => 'contactos', 
		                        'class'          => 'form-control boxsizingBorder',
		                        'placeholder' => '',
		                        //'rows' => '6',                           
		                                  );
		                echo form_textarea($data)?>
			        </div>
	 </div>
	 <div class="form-group">
	     <div class="control-label col-md-3">
	      </div>
	      	<div class="col-md-8">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('contactos');
				 ?>
				</label>
			</div>
		</div>
   </div>

    <h3 > <b>Costos y Penalidades</b><small><a type="button" class="btn btn-xs" data-toggle="modal" data-target="#ayuda_costos_acuerdo">
 	(<i class="fa fa-info-circle"></i> <u>Ayuda</u>)</a></small></h3> <hr><br>
   <div class="row">
	  <div class="form-group">

			        <div class="col-md-offset-1">
						<label for="tipo_servicio" class="col-md-2 control-label text-right">Costos y Penalidades</label>		    
					</div>

			        <div class="col-md-8">
			            <?php $data = array(
			            		'value' => set_value('costos'),
		                        'name'        => 'costos',
		                        'id'          => 'costos', 
		                        'class'          => 'form-control boxsizingBorder',
		                        'placeholder' => '',
		                        //'rows' => '6',                           
		                                  );
		                echo form_textarea($data)?>
			        </div>
	 </div>
	 <div class="form-group">
	     <div class="control-label col-md-3">
	      </div>
	      	<div class="col-md-8">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('costos');
				 ?>
				</label>
			</div>
		</div>
   </div>


    <h3 > <b>Glosario</b><small><a type="button" class="btn btn-xs" data-toggle="modal" data-target="#ayuda_glosario_acuerdo">
 	(<i class="fa fa-info-circle"></i> <u>Ayuda</u>)</a></small></h3> <hr><br>
   <div class="row">
	  <div class="form-group">

			        <div class="col-md-offset-1">
						<label for="tipo_servicio" class="col-md-2 control-label text-right">Definiciones, Siglas y Abreviaturas  </label>		    
					</div>

			        <div class="col-md-8">
			            <?php $data = array(
			            		'value' => set_value('glosario'),
		                        'name'        => 'glosario',
		                        'id'          => 'glosario', 
		                        'class'          => 'form-control boxsizingBorder',
		                        'placeholder' => '',
		                        //'rows' => '6',                           
		                                  );
		                echo form_textarea($data)?>
			        </div>
	 </div>
	 <div class="form-group">
	     <div class="control-label col-md-3">
	      </div>
	      	<div class="col-md-8">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('glosario');
				 ?>
				</label>
			</div>
		</div>

   </div>





   <br><br><br><hr>

  <div class='row tex'>
	 <div class="col-md-1 col-md-offset-2">
	 <a id="back-step-4" class="btn btn-default">Volver</a>
	 </div>
	<div class="col-md-1">
	 <button id="activate-step-5" type="submit" class="btn btn-success">Crear Acuerdo</button>
	 </div>

	 <div class="col-md-1 col-md-offset-4">
	 <a class="btn btn-danger" data-toggle="modal" data-target="#salir_modal">Cancelar</a>
	 </div>
 </div><br>