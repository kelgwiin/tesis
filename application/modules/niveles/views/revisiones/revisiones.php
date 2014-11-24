<script type="text/javascript" src="<?=base_url()?>application/modules/niveles/views/revisiones/js/operaciones_ajax.js"></script>
<link href="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar2.1.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/niveles/views/revisiones/css/calendario.css">

<style>
.datepicker{z-index:1151 !important;}

.borderless tbody tr td, .borderless thead tr th {
    border: none;
}

</style>



<div id="page-wrapper">

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
	<div class="panel panel-primary">
	   <div class="panel-heading text-center">
		   <h3 class="panel-title"> <b> <i class="fa fa-calendar"></i>  Calendario </b> </h3>
		  </div>
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

		<div class="panel panel-primary">
		  <div class="panel-heading text-center">
		    <h3 class="panel-title"><b><i class="fa fa-calendar-o"></i> Próximos Eventos</b></h3>
		  </div>
		  <div class="panel-body" style="height:400px; max-height:400px; overflow-y: scroll;">



		    <table class="table" >

		      <thead>

		     
			
			  <?php foreach ($eventos_recientes as $evento_reciente) :?>
			  	
			  	<tr>
			  		<td> 							<?php if($evento_reciente->tipo_evento == 'revision_ANS') : ?>
									  				<span class="label" style="background-color:#42A321;"> </span>
												  	<?php endif ?>
							                 		<?php if($evento_reciente->tipo_evento == 'renovacion_ANS') : ?>
									  				<span class="label" style="background-color:#FF7519;" > </span>
												  	<?php endif ?>
												  	<?php if($evento_reciente->tipo_evento == 'vencimiento_ANS') : ?>
												  				<span class="label" style="background-color:#E64545;"> </span>
												  	<?php endif ?>
												  	<?php if($evento_reciente->tipo_evento == 'reunion') : ?>
												  				<span class="label" style="background-color:#3366FF;"> </span>
												  	<?php endif ?> 
												  	<?php if($evento_reciente->tipo_evento == 'otro') : ?>
												  				<span class="label" style="background-color:#8E8E86;"> </span>
												  	<?php endif ?> 
					</td>
			  		<td  width="30%"> <?php echo $evento_reciente->nombre_evento; ?></td>

			  		<td  width="30%" class="text-right"> <?php 
			  					$inicio = date_create($evento_reciente->inicio);
			  					echo '<b>Inicio:</b> '.date_format($inicio,'d/m') ?> <br><?php
			  					echo date_format($inicio,'h:i a'); ?></td>

			  		<td  width="30%" class="text-right"> <?php $fin = date_create($evento_reciente->fin);
			  					echo '<b>Fin:</b> '.date_format($fin,'d/m');  ?> <br><?php
			  					echo date_format($fin,'h:i a'); ?></td>

			  	</tr>

			  <?php endforeach ?>

			   </thead>
			   <TBODY></TBODY>

			</table>

		  </div>
		</div>


		<div class="panel panel-default">
		    
		  	<table class="table borderless">
		  		<tr>
		  			<td><div class='col-lg-1'> <span class="label" style="background-color:#42A321;"> </span></div> <div class='col-lg-offset-2'><b>Revisión de ANS</b></div> </td>
		  			<td><div class='col-lg-1'><span class="label" style="background-color:#FF7519;" > </span></div> <div class='col-lg-offset-2'><b> Renovación de ANS</b></div> </td>
		  		</tr>

		  		<tr>
		  			<td><div class='col-lg-1'><span class="label" style="background-color:#E64545;"> </span></div> <div class='col-lg-offset-2'><b> Vencimiento de ANS</b></div></td>
		  			<td><div class='col-lg-1'><span class="label" style="background-color:#3366FF;" > </span></div> <div class='col-lg-offset-2'><b> Reunión </b></div></td>
		  		</tr>
 
		  		<tr>
		  			<td><div class='col-lg-1'><span class="label" style="background-color:#8E8E86;" > </span></div> <div class='col-lg-offset-2'><b> Otro </b></div></td>
		  		</tr>
		  	</table>

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
				

						    	<div class="required">
									<label  class="col-md-4 control-label">Tipo de Evento</label> 
								</div>
						    	 
						       <div class="col-md-7">
						       		<?php
								       	$options = array(
								       	  'seleccione' => 'Seleccione un Tipo',
								       	  'revision_ANS' => 'Revisión de ANS',
								       	  'renovacion_ANS' => 'Renovación de ANS',
								       	  'vencimiento_ANS' => 'Vencimiento de ANS',								       	  
								       	  'reunion' => 'Reunión',
								       	  'otro' => 'Otro',

						                );
								        ?>
							            <?php echo form_dropdown('tipo_evento', $options,set_value('tipo_evento'),'class="form-control" id="dropdown_tipo_evento"'); ?>
						       
						   	   </div>

						</div>
						<div class="form-group">
					     <div class="control-label col-md-4">
					      </div>
					      	<div class="col-md-7">
							    <label style="color:red;">
							   	<?php 
							        echo form_error('tipo_evento');
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




<!-- Modal -->
<div class="modal fade bs-example-modal-sm" id='modal_evento' tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Vista Evento</h4>
      </div>
      <div class="modal-body">

      	<table class="table borderless">
      		<thead>
      		<tr>
      			<td width="30%">
      				<b>Nombre del Evento: </b>
      			</td>
      			<td id="tabla_nombre">
      				
      			</td>
      		</tr>
      	   </thead>

      		<tr>
      			<td>
      				<b>Tipo del Evento: </b>
      			</td>
      			<td id="tabla_tipo">
      				
      			</td>
      		</tr>

      		<tr>
      			<td>
      				<b>Lugar del Evento: </b>
      			</td>
      			<td id="tabla_lugar">
      				
      			</td>
      		</tr>

      		<tr>
      			<td>
      				<b>Inicio: </b>
      			</td>
      			<td id="tabla_inicio">
      				
      			</td>
      		</tr>

      		<tr>
      			<td>
      				<b>Fin: </b>
      			</td>
      			<td id="tabla_fin">
      				
      			</td>
      		</tr>

      		<tr>
      			<td>
      				<b>Descripción: </b>
      			</td>
      			<td id="tabla_descripcion">
      				
      			</td>
      		</tr>

      	</table>
        
      </div>
      <div class="modal-footer" id="footer_vista_evento">
        
      </div>
    </div>
  </div>
</div>