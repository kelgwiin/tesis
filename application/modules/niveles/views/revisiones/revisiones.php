<script type="text/javascript" src="<?=base_url()?>application/modules/niveles/views/revisiones/js/operaciones_ajax.js"></script>
<link href="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar2.1.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/niveles/views/revisiones/css/calendario.css">

<style>
.datepicker{z-index:1151 !important;}

</style>

<div id="page-wrapper">
<h2>Calendario de Revisiones y Reuniones.</h2>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-calendar"></i> 
					Secci&#243;n que brinda las opciones para ver y fijar reuniones para Revision de ANS.</li>
				</ol>


<?php if($this->session->flashdata('Success')) { ?>
	<div class="alert alert-success text-center" role="alert" id="message">
		<i class="fa fa-check"></i> <b><?php echo $this->session->flashdata('Success');?></b>
	</div>

      <?php }
      ?>


    <?php if($this->session->flashdata('Error')) { ?>
	<div class="alert alert-danger text-center" role="alert" id="message">
		<i class="fa fa-exclamation-circle"></i> <b><?php echo $this->session->flashdata('Error');?></b>
	</div>

      <?php }
      ?>


<div class='col-lg-8'>
	<div class="panel panel-default">
	  <div class="panel-body">
	    	
			<div id='calendar'></div>
			
	  </div>
	</div>
</div>


	<div class='col-lg-4'>	
		<div class="row text-center">
			<a class="btn btn-info" data-backdrop="static" id='ver_formulario_evento'
   			data-keyboard="false" data-toggle="modal" data-target="#myModal" href="<?php //echo base_url().'index.php/niveles_de_servicio/gestion_ANS/crear_ANS'?>"> <i class="fa fa-plus"></i>  Crear Nuevo Evento</a><hr>
		</div>

		

	     <?php $errores = validation_errors(); ?>

		<div style="display: none;">
				 <input type='text' name="errores" class="form-control" id='errores'  value="<?php echo strlen($errores); ?>"/>
		</div>

		<div class="panel panel-info">
		  <div class="panel-heading text-center">
		    <h3 class="panel-title"><b><i class="fa fa-search"></i> Próximas Revisiones</b></h3>
		  </div>
		  <div class="panel-body" style="height:470px; max-height:470px; overflow-y: scroll;">
		    

		    <table class="table table-condensed">

		      <thead>
		      	<tr>
		      		<td width="30%"><b>Nombre</b></td>
		      		<td width="30%"><b>Inicio</b></td>
		      		<td width="30%"><b>Fin</b></td>

		      	</tr>

		      </thead>
			
			  <?php foreach ($eventos_recientes as $evento_reciente) :?>
			  	
			  	<tr>

			  		<td> <?php echo $evento_reciente->nombre_evento; ?></td>

			  		<td> <?php 
			  					$inicio = date_create($evento_reciente->inicio);
			  					echo date_format($inicio,'d/m h:i a'); ?></td>

			  		<td> <?php $fin = date_create($evento_reciente->fin);
			  					echo date_format($fin,'d/m h:i a');  ?></td>

			  	</tr>

			  <?php endforeach ?>

			</table>

		  </div>
		</div>

	   

	</div>



<?php
		    // Apertura de Formulario
		    $attributes = array('role' => 'form', 'id'=> 'new_service_form','class'=>'form-horizontal');
			echo form_open_multipart(base_url().'index.php/niveles_de_servicio/gestion_Revisiones/nuevo_evento',$attributes); 
	      ?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calendar-o"></i> Nuevo Evento</h4>
      </div>
      <div class="modal-body">
        	<div class="row">


			      		<div class="form-group">
							
							<div class="required text-right">
								<label for="service_name" class="col-md-4 control-label">Nombre del Evento</label> 
							</div>

						    <div class="col-md-7">
						       <input type='text' name="nombre_evento" class="form-control" id='nombre_evento'  value="<?php echo set_value('nombre_evento'); ?>"/>
						     

						    </div>
						</div>

						<div class="form-group">
					     <div class="control-label col-md-4">
					      </div>
					      	<div class="col-md-7">
							    <label id='nombre_evento_error' style="color:red;">
							  		<?php 
								        echo form_error('nombre_evento');
									 ?>
								</label>
							</div>
						</div>



						  <div class="form-group">

						        <div class="">
									<label for="tipo_servicio" class="col-md-4 control-label text-right">Lugar del Evento </label>		    
								</div>

						        <div class="col-md-7">
						            <?php $data = array(
						            		'value' => set_value('lugar_evento'),
					                        'name'        => 'lugar_evento',
					                        'id'          => 'lugar_evento', 
					                        'class'          => 'form-control boxsizingBorder',
					                        'placeholder' => '',
					                        'rows' => '2',                           
					                                  );
					                echo form_textarea($data)?>
						        </div>
							 </div>

							  <div class="form-group">
							     <div class="control-label col-md-4 text-right">
							      </div>
							      	<div class="col-md-7">
									    <label style="color:red;">
									   	<?php 
									        echo form_error('lugar_evento');
										 ?>
										</label>
									</div>
								</div>


							<!--<div class="form-group">
								 <div class="control-label col-md-4">
							      </div>

								<div class="checkbox col-md-7">
								   
							       <div class="input-group">
								      <input id='todo_dia' type="checkbox"> Evento todo el día<br> 
								   </div>
								 </div>
							 </div> -->


							<div class="form-group">
						
								<div class="required text-right">
									<label for="service_name" class="col-md-4 control-label">Inicio</label> 
								</div>

							    <div class="col-md-5">
							       <div class="input-group">
							       <input type='text' name="evento_inicio" class="form-control" id='inicio_evento' value="<?php echo set_value('evento_inicio'); ?>"/>
							       <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							   	   </div>

							    </div>
							</div>
							<div class="form-group">
						     <div class="control-label col-md-4">
						      </div>
						      	<div class="col-md-7">
								    <label style="color:red;">
								   	<?php 
								        echo form_error('evento_inicio');
									 ?>
									</label>
								</div>
							</div>


							<div class="form-group">
						
								<div class="required text-right">
									<label for="service_name" class="col-md-4 control-label">Fin</label> 
								</div>

							    <div class="col-md-5">
							       <div class="input-group">
							       <input type='text' name="evento_fin" class="form-control" id='fin_evento' value="<?php echo set_value('evento_fin'); ?>"/>
							       <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							   	   </div>

							    </div>
							</div>
							<div class="form-group">
						     <div class="control-label col-md-4">
						      </div>
						      	<div class="col-md-5">
								    <label style="color:red;">
								   	<?php 
								        echo form_error('evento_fin');
									 ?>
									</label>
								</div>
							</div>



						  <div class="form-group">

						        <div class="">
									<label for="tipo_servicio" class="col-md-4 control-label text-right">Descripción del Evento </label>		    
								</div>

						        <div class="col-md-7">
						            <?php $data = array(
						            		'value' => set_value('descripcion_evento'),
					                        'name'        => 'descripcion_evento',
					                        'id'          => 'descripcion_evento', 
					                        'class'          => 'form-control boxsizingBorder',	
					                        'placeholder' => '',
					                        'rows' => '2',                           
					                                  );
					                echo form_textarea($data)?>
						        </div>
							 </div>

							  <div class="form-group">
							     <div class="control-label col-md-4 text-right">
							      </div>
							      	<div class="col-md-7">
									    <label style="color:red;">
									   	<?php 
									        echo form_error('descripcion_evento');
										 ?>
										</label>
									</div>
								</div>


			</div>
      </div>
      <div class="modal-footer">
         <a data-dismiss="modal" class="btn btn-danger" >Cancelar</a>
		 <button type="submit" class="btn btn-primary">Crear Evento</button>
      </div>
    </div>
  </div>
</div>
 <?php echo form_close(); ?>