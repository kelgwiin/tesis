
	 <h3 > <b>Responsabilidades</b><small><a type="button" class="btn btn-xs" data-toggle="modal" data-target="#ayuda_responsabilidades_acuerdo">
 	(<i class="fa fa-info-circle"></i> <u>Ayuda</u>)</a></small></h3> <hr><br>
   <div class="row">
	  <div class="form-group">

			        <div class="col-md-offset-1 required">
						<label for="tipo_servicio" class="col-md-2 control-label text-right">Responsabilidades</label>		    
					</div>

			        <div class="col-md-8">
			            <?php $data = array(
			            		'value' => set_value('responsabilidades',@$acuerdo->responsabilidades),
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
			            		'value' => set_value('contactos',@$acuerdo->contactos),
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
			            		'value' => set_value('costos',@$acuerdo->cobros),
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
			            		'value' => set_value('glosario',@$acuerdo->glosario),
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

      <?php if($operacion == 'actualizar') : ?>
		<button data-toggle="modal" data-target="#modificar" class="btn btn-warning">Actualizar Acuerdo</button>
	  <?php else : ?>
	  <button type="submit" class="btn btn-success"><i class="fa fa-file-text"></i> Crear Acuerdo</button>
	 <?php endif ?>
	 
	 </div>

	 <div class="col-md-1 col-md-offset-4">
	 <a class="btn btn-danger" data-toggle="modal" data-target="#salir_modal">Cancelar</a>
	 </div>
 </div><br>

  <div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		      
		      </div>
		      <div class="modal-body text-center">
		        <p><div class="alert alert-warning" role="alert"><i class="fa fa-exclamation-triangle"></i> ¿Est&#225; seguro que desea <b>Actualizar</b> este Acuerdo de Niveles de Servicio?</div></p>
		      </div>
		      <div class="modal-footer">
		      	<button type="submit" class="btn btn-warning">Actualizar</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>      
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
