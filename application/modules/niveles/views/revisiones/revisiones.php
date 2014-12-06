<script type="text/javascript" src="<?=base_url()?>application/modules/niveles/views/revisiones/js/operaciones_ajax.js"></script>
<link href="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar2.1.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/niveles/views/revisiones/css/calendario.css">

<style>
.datepicker{z-index:1151 !important;}

.borderless tbody tr td, .borderless thead tr th {
    border: none;
}

#asistentes .modal-dialog  {width:75%;}

#asistentes_modificar .modal-dialog  {width:75%;}

.list-left li, .list-right li {
            cursor: pointer;
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
   			data-keyboard="false" data-toggle="modal" data-target="#nuevo_evento" href="<?php //echo base_url().'index.php/niveles_de_servicio/gestion_ANS/crear_ANS'?>"> <i class="fa fa-plus"></i>  Crear Nuevo Evento</a><hr>
		</div>

		

	     
	     <?php $errores = validation_errors(); ?>

	     <?php if($nuevo == true) { ?>


		<div style="display: none;">
				 <input type='text' name="errores" class="form-control" id='errores'  value="<?php echo strlen($errores); ?>"/>
		</div>

		<div style="display: none;">
				 <input type='text' name="nuevo_bandera" class="form-control" id='nuevo_bandera'  value="nuevo_bandera"/>
		</div>

		<div style="display: none;">
				 <input type='text' name="modificar_bandera" class="form-control" id='modificar_bandera'  value=""/>
				</div>

		 <?php }
		      ?>



		  <?php if($modificacion == true) { ?>

			
				<div style="display: none;">
						 <input type='text' name="errores_modificar" class="form-control" id='errores_modificar'  value="<?php echo strlen($errores); ?>"/>
				</div>

				<div style="display: none;">
				 <input type='text' name="modificar_bandera" class="form-control" id='modificar_bandera'  value="modificar_bandera"/>
				</div>

					<div style="display: none;">
				 <input type='text' name="nuevo_bandera" class="form-control" id='nuevo_bandera'  value=""/>
				</div>

		      <?php }
		      ?>

		<div class="panel panel-primary">
		  <div class="panel-heading text-center">
		    <h3 class="panel-title"><b><i class="fa fa-calendar-o"></i> Próximos Eventos</b></h3>
		  </div>
		  <div class="panel-body" style="height:400px; max-height:400px; overflow-y: scroll;">



		    <table class="table" >

		      <thead>

		     <?php if(count($eventos_recientes) > 0) : ?>
			
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
				  					if($evento_reciente->tipo_evento == 'vencimiento_ANS')
				  					{echo "Todo el Día";}
				  					else
				  					{echo date_format($inicio,'h:i a');}	
				  					 ?></td>

				  		<td  width="30%" class="text-right"> <?php $fin = date_create($evento_reciente->fin);
				  					echo '<b>Fin:</b> '.date_format($fin,'d/m');  ?> <br><?php
				  					if($evento_reciente->tipo_evento == 'vencimiento_ANS')
				  					{echo "Todo el Día";}
				  					else
				  					{echo date_format($fin,'h:i a');}	
				  					 ?></td>

				  	</tr>

				  <?php endforeach ?>

			  <?php else : ?>

			  	<tr>
				  		<td><div class="alert alert-info text-center" role="alert"> <b> <i class="fa fa-exclamation-circle"></i> No existen Eventos dentro de los próximos 8 días. </b></div> </td>

				</tr>




			  <?php endif ?>



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
<div class="modal fade" id="nuevo_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

							<div id="contenedor_dropdown_acuerdos"  style="display: none;">
									<div class="form-group acuerdos-list">
				
												<div class="required text-right">
													<label for="service_name" class="col-md-4  control-label">Acuerdo de Niveles de Servicio</label> 
												</div>

											    <div class="col-md-7">

											         <?php
											        	$options = array(
											        		'seleccione' => 'Seleccione un Acuerdo',		        	  
										                );

														foreach($acuerdos as $acuerdo)
											            { 
											              $options[$acuerdo->acuerdo_nivel_id] = $acuerdo->nombre_acuerdo;
											            }


											        ?>

											      	 <?php echo form_dropdown('acuerdos', $options,set_value('acuerdos'),'class="form-control"  id="dropdown_acuerdos" '); ?>	
											    </div>
											</div>


											<div class="form-group">
											     <div class="control-label col-md-4">
											      </div>
											      	<div class="col-md-7">
													    <label style="color:red;" id="error_requisitos">
													    	 	<?php 
																        echo form_error('acuerdos');
																	 ?>
													   	
												        </label>
													</div>
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

							<div class="col-md-1 col-md-offset-4">
							<a id="agregar_asistentes" class="btn btn-success"><i class="fa fa-users"></i> Agregar Asistentes</a>
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


<div class="modal fade bs-example-modal-lg" id='asistentes' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" 
   data-keyboard="false"> 
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myLargeModalLabel">Agregar Asistentes al Evento</h4>
        </div>
        <div class="modal-body" id="contenido_modal_asistentes">
         
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-calendar"></i> 
					Esta Secci&#243;n brinda la opción de asignar asistentes al Evento que esta siendo Creado. Para Asignar una persona a la lista de asistentes, primero
					debe seleccionarla de la Lista del Personal de la Organización y luego dar click al botón con la flecha que apunta hacia la derecha. Para Remover a una persona de la lista de asistentes, primero
					debe seleccionarla de la Lista de Asistentes y luego dar click al botón con la flecha que apunta hacia la izquierda.<br> Para Seleccionar todos los elementos de la lista puede hace click en el boton
					ubicado al lado derecho de la barra de busqueda.</li>
				</ol><br>

         	<div class="row">
					<div class="dual-list list-left col-md-5" style="margin-left: 50px;">
		            <div class="well text-left">
		                <div class="row">
		                    <div class="col-md-10">
		                        <div class="input-group">
							       <input type='text' name="SearchDualList" class="form-control" placeholder="Buscar"/>
							       <span class="input-group-addon"><i class="fa fa-search"></i></span>
							   	 </div>
		                    </div>
		                    <div class="col-md-2">
		                        <div class="btn-group">
		                            <a class="btn btn-default selector" data-toggle="tooltip" data-original-title="Seleccionar Todo" ><i class="fa fa-square-o"></i></a>
		                        </div>
		                    </div>
		                </div>

		                <br><div class="text-center"><b>Personal de la Organización</b></div>


		               <!-- <div id="asistentes_personal" class="alert alert-info text-center" role="alert" style="display: none;"> <b> <i class="fa fa-exclamation-circle"></i> Todo el Personal Asistirá a este Evento </b></div>-->
		                
		               			<?php //$defaultvalue = '1'; ?>
								<select id="personal" name='personal[]' class="form-control lista_empleados_nuevo lista_empleados"  size="10" style="margin-top: 25px; overflow-x:auto;" multiple>
									<?php foreach($personal as $key => $person) : ?>
										<optgroup label="<?php echo ucwords($key) ?>" class="<?php echo ucwords($key) ?>">
											<?php foreach($person as $k => $per) : ?>

												<?php if(!in_array($per->id_personal, $asistentes_evento)) : ?>
													<option value="<?php echo $per->id_personal ?>" data-nombre="<?php echo $per->nombre ?>" data-codigo="<?php echo $per->codigo_empleado ?>"
														data-dpto="<?php echo ucwords($key) ?>">
														<?php echo $per->nombre." - ".$per->codigo_empleado ?>
													</option>
												<?php endif ?>
											<?php endforeach ?>
										</optgroup>
									<?php endforeach ?>
								</select>


		            </div>
		        </div>

		        <div class="col-md-1 list-arrows" style="margin-top: 90px">
								<center>
									<div>
										<button type="button" class="btn btn-primary move-right" data-toggle="tooltip" id="add_asistente" 
											data-original-title="Agregar Asitentes al Evento" data-placement="top">
											<i class = "fa fa-arrow-right fa-lg"></i>
										</button>
										<br /><br />
										<button type="button" class="btn btn-primary move-left" data-toggle="tooltip" id="remove_asistente"
											data-original-title="Remover Asitentes del Evento" data-placement="bottom">
											<i class="fa fa-arrow-left fa-lg"></i>
										</button>
									</div>
								</center>
				</div>

		        <div class="dual-list list-right col-md-5">
		            <div class="well" id='well2'>
		                <div class="row">
		                
		                    <div class="col-md-10">
		                         <div class="input-group">
							       <input type='text' name="SearchDualList" class="form-control" placeholder="Buscar"/>
							       <span class="input-group-addon"><i class="fa fa-search"></i></span>
							   	  </div>
		                    </div>
		                        <div class="col-md-2">
		                        <div class="btn-group">
		                            <a class="btn btn-default selector" data-toggle="tooltip" data-original-title="Seleccionar Todo" ><i class="fa fa-square-o"></i></a>
		                        </div>
		                    </div>
		                </div>

		                <br><div class="text-center"><b>Asistentes al Evento</b></div>

						<!--<div id="alerta_asistentes" class="alert alert-info text-center" role="alert" style="display: none;"> <b> <i class="fa fa-exclamation-circle"></i> Este Evento No Posee Asistentes </b></div> -->
						
						<select id="asistentes_evento" name="asistentes_evento[]" class="form-control lista_empleados" size="10" style="margin-top: 25px;overflow-x:auto;" multiple>


		                	<?php if(count($asistentes) > 0) : ?>

		                		<?php foreach($asistentes as $asistente) : ?>
												<option value="<?php echo $asistente['id_personal'] ?>" data-nombre="<?php echo $asistente['nombre'] ?>" data-codigo="<?php echo $asistente['codigo_empleado'] ?>"
													data-dpto="<?php echo ucwords($asistente['departamento']) ?>" style="margin-left:16px;" selected >
													<?php echo $asistente['nombre']." - ".$asistente['codigo_empleado'] ?>
												</option>
								<?php endforeach ?>
									
		                	<?php endif ?>
						</select>
		            </div>
		        </div>

        </div>

        </div>
           <div class="modal-footer">
		        <button type="button"  id='listo_modal_asistentes' class="btn btn-success" data-dismiss="modal">Listo</button>      
		      </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

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


      		<tr id="campo_ans" style="display: none;">
      			<td>
      				<b>ANS: </b>
      			</td>
      			<td id="tabla_ans">
      				
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

      		<tr>
      			<td>
      				<b>Asistentes: </b>
      			</td>
      			<td id="tabla_asistentes">
      				
      				
      			</td>
      		</tr>

      	</table>
        
      </div>
      <div class="modal-footer" id="footer_vista_evento">
        
      </div>
    </div>
  </div>
</div>







         <?php
		    // Apertura de Formulario
		    $attributes = array('role' => 'form', 'id'=> 'new_service_form','class'=>'form-horizontal');
			echo form_open_multipart(base_url().'index.php/niveles_de_servicio/gestion_Revisiones/modificar_evento',$attributes); 
	      ?>

<!-- Modal -->
<div class="modal fade" id="modificar_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calendar-o"></i> Modificar Evento</h4>
      </div>
      <div class="modal-body">
        	<div class="row">


			      		<div class="form-group">
							
							<div class="required text-right">
								<label for="service_name" class="col-md-4 control-label">Nombre del Evento</label> 
							</div>

						    <div class="col-md-7">
						       <input type='text' name="nombre_evento_modificar" class="form-control" id='nombre_evento_modificar'  value="<?php echo set_value('nombre_evento_modificar'); ?>"/>
						     

						    </div>
						</div>

						<div class="form-group">
					     <div class="control-label col-md-4">
					      </div>
					      	<div class="col-md-7">
							    <label id='nombre_evento_error' style="color:red;">
							  		<?php 
								        echo form_error('nombre_evento_modificar');
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
								       	  'reunion' => 'Reunión',
								       	  'otro' => 'Otro',

						                );
								        ?>
							            <?php echo form_dropdown('tipo_evento_modificar', $options,set_value('tipo_evento_modificar'),'class="form-control" id="dropdown_tipo_evento_modificar"'); ?>
						       
						   	   </div>

						</div>
						<div class="form-group">
					     <div class="control-label col-md-4">
					      </div>
					      	<div class="col-md-7">
							    <label style="color:red;">
							   	<?php 
							        echo form_error('tipo_evento_modificar');
								 ?>
								</label>
							</div>
						</div>


						<div id="contenedor_dropdown_acuerdos_modificar"  style="display: none;">
									<div class="form-group acuerdos-list">
				
												<div class="required text-right">
													<label for="service_name" class="col-md-4  control-label">Acuerdo de Niveles de Servicio</label> 
												</div>

											    <div class="col-md-7">

											         <?php
											        	$options = array(
											        		'seleccione' => 'Seleccione un Acuerdo',		        	  
										                );

														foreach($acuerdos as $acuerdo)
											            { 
											              $options[$acuerdo->acuerdo_nivel_id] = $acuerdo->nombre_acuerdo;
											            }


											        ?>

											      	 <?php echo form_dropdown('acuerdos_modificar', $options,set_value('acuerdos_modificar'),'class="form-control"  id="dropdown_acuerdos_modificar" '); ?>	
											    </div>
											</div>


											<div class="form-group">
											     <div class="control-label col-md-4">
											      </div>
											      	<div class="col-md-7">
													    <label style="color:red;" id="error_requisitos">
													    	 	<?php 
																        echo form_error('acuerdos_modificar');
																	 ?>
													   	
												        </label>
													</div>
										    </div>
						       </div>



						  <div class="form-group">

						        <div class="">
									<label for="tipo_servicio" class="col-md-4 control-label text-right">Lugar del Evento </label>		    
								</div>

						        <div class="col-md-7">
						            <?php $data = array(
						            		'value' => set_value('lugar_evento_modificar'),
					                        'name'        => 'lugar_evento_modificar',
					                        'id'          => 'lugar_evento_modificar', 
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
									        echo form_error('lugar_evento_modificar');
										 ?>
										</label>
									</div>
								</div>



							<div class="form-group">
						
								<div class="required text-right">
									<label for="service_name" class="col-md-4 control-label">Inicio</label> 
								</div>

							    <div class="col-md-5">
							       <div class="input-group">
							       <input type='text' name="inicio_evento_modificar" class="form-control" id='inicio_evento_modificar' value="<?php echo set_value('inicio_evento_modificar'); ?>"/>
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
								        echo form_error('inicio_evento_modificar');
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
							       <input type='text' name="fin_evento_modificar" class="form-control" id='fin_evento_modificar' value="<?php echo set_value('fin_evento_modificar'); ?>"/>
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
								        echo form_error('fin_evento_modificar');
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
						            		'value' => set_value('descripcion_evento_modificar'),
					                        'name'        => 'descripcion_evento_modificar',
					                        'id'          => 'descripcion_evento_modificar', 
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
									        echo form_error('descripcion_evento_modificar');
										 ?>
										</label>
									</div>
								</div>

							<div class="col-md-1 col-md-offset-4">
							<a id="agregar_asistentes_modificar" class="btn btn-success"><i class="fa fa-users"></i> Actualizar Asistentes</a>
							</div>


			</div>

				<div style="display: none;">				
				 <input type='text' name="id_evento_modificar" class="form-control" id='id_evento_modificar'  value="<?php echo set_value('id_evento_modificar'); ?>"/>
				</div>

      </div>
      <div class="modal-footer">
         <a data-dismiss="modal" id='cancelar_modificar' class="btn btn-danger" >Cancelar</a>
		 <button data-toggle="modal" data-target="#modificar"  id="modificar_boton" class="btn btn-warning">Modificar Evento</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade bs-example-modal-lg" id='asistentes_modificar' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" 
   data-keyboard="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myLargeModalLabel">Actualizar Asistentes al Evento</h4>
        </div>
        <div class="modal-body" id="contenido_modal_asistentes_modificar">
         
         <ol class="breadcrumb">
				<li class="active"><i class="fa fa-calendar"></i> 
					Esta Secci&#243;n brinda la opción de asignar y remover asistentes del Evento que esta siendo Modificado. Para Asignar una persona a la lista de asistentes, primero
					debe seleccionarla de la Lista del Personal de la Organización y luego dar click al botón con la flecha que apunta hacia la derecha. Para Remover a una persona de la lista de asistentes, primero
					debe seleccionarla de la Lista de Asistentes y luego dar click al botón con la flecha que apunta hacia la izquierda.<br> Para Seleccionar todos los elementos de la lista puede hace click en el boton
					ubicado al lado derecho de la barra de busqueda.</li>
				</ol><br>

         	<div class="row">
					<div class="dual-list list-left col-md-5" style="margin-left: 50px;">
		            <div class="well text-left">
		                <div class="row">
		                    <div class="col-md-10">
		                        <div class="input-group">
							       <input type='text' name="SearchDualList" class="form-control" placeholder="Buscar"/>
							       <span class="input-group-addon"><i class="fa fa-search"></i></span>
							   	 </div>
		                    </div>
		                    <div class="col-md-2">
		                        <div class="btn-group">
		                            <a class="btn btn-default selector" data-toggle="tooltip" data-original-title="Seleccionar Todo" ><i class="fa fa-square-o"></i></a>
		                        </div>
		                    </div>
		                </div>

		                <br><div class="text-center"><b>Personal de la Organización</b></div>


		               <!-- <div id="asistentes_personal" class="alert alert-info text-center" role="alert" style="display: none;"> <b> <i class="fa fa-exclamation-circle"></i> Todo el Personal Asistirá a este Evento </b></div>-->
		                
		               			<?php //$defaultvalue = '1'; ?>
								<select id="personal_modificar" name='personal_modificar[]' class="form-control lista_empleados_modificar lista_empleados"  size="10" style="margin-top: 25px; overflow-x:auto;" multiple>
									<?php foreach($personal as $key => $person) : ?>
										<optgroup label="<?php echo ucwords($key) ?>" class="<?php echo ucwords($key) ?>">
											<?php foreach($person as $k => $per) : ?>

												<?php if(!in_array($per->id_personal, $asistentes_evento)) : ?>
													<option value="<?php echo $per->id_personal ?>" data-nombre="<?php echo $per->nombre ?>" data-codigo="<?php echo $per->codigo_empleado ?>"
														data-dpto="<?php echo ucwords($key) ?>">
														<?php echo $per->nombre." - ".$per->codigo_empleado ?>
													</option>
												<?php endif ?>
											<?php endforeach ?>
										</optgroup>
									<?php endforeach ?>
								</select>


		            </div>
		        </div>

		        <div class="col-md-1 list-arrows" style="margin-top: 90px">
								<center>
									<div>
										<button type="button" class="btn btn-primary move-right_modificar" data-toggle="tooltip" id="add_asistente" 
											data-original-title="Agregar Asitentes al Evento" data-placement="top">
											<i class = "fa fa-arrow-right fa-lg"></i>
										</button>
										<br /><br />
										<button type="button" class="btn btn-primary move-left_modificar" data-toggle="tooltip" id="remove_asistente"
											data-original-title="Remover Asitentes del Evento" data-placement="bottom">
											<i class="fa fa-arrow-left fa-lg"></i>
										</button>
									</div>
								</center>
				</div>

		        <div class="dual-list list-right col-md-5">
		            <div class="well" id='well2'>
		                <div class="row">
		                
		                    <div class="col-md-10">
		                         <div class="input-group">
							       <input type='text' name="SearchDualList" class="form-control" placeholder="Buscar"/>
							       <span class="input-group-addon"><i class="fa fa-search"></i></span>
							   	  </div>
		                    </div>
		                        <div class="col-md-2">
		                        <div class="btn-group">
		                            <a class="btn btn-default selector" data-toggle="tooltip" data-original-title="Seleccionar Todo" ><i class="fa fa-square-o"></i></a>
		                        </div>
		                    </div>
		                </div>

		                <br><div class="text-center"><b>Asistentes al Evento</b></div>

						<!--<div id="alerta_asistentes" class="alert alert-info text-center" role="alert" style="display: none;"> <b> <i class="fa fa-exclamation-circle"></i> Este Evento No Posee Asistentes </b></div> -->
						
						<select id="asistentes_evento_modificar" name="asistentes_evento_modificar[]" class="form-control lista_empleados" size="10" style="margin-top: 25px;overflow-x:auto;" multiple>


		                	<?php if(count($asistentes) > 0) : ?>

		                		<?php foreach($asistentes as $asistente) : ?>
												<option value="<?php echo $asistente['id_personal'] ?>" data-nombre="<?php echo $asistente['nombre'] ?>" data-codigo="<?php echo $asistente['codigo_empleado'] ?>"
													data-dpto="<?php echo ucwords($asistente['departamento']) ?>" style="margin-left:16px;" selected >
													<?php echo $asistente['nombre']." - ".$asistente['codigo_empleado'] ?>
												</option>
								<?php endforeach ?>
									
		                	<?php endif ?>
						</select>
		            </div>
		        </div>

        </div>

        </div>
           <div class="modal-footer">
		        <button type="button"  id='listo_modal_asistentes_modificar' class="btn btn-success" data-dismiss="modal">Listo</button>      
		      </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


<div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		      
		      </div>
		      <div class="modal-body text-center">
		        <p><div class="alert alert-warning" role="alert"><i class="fa fa-exclamation-triangle"></i> ¿Est&#225; seguro que desea <b>Modificar</b> este Evento?</div></p>
		      </div>
		      <div class="modal-footer">
		      	<button type="submit" id="actualizar_confirm_modificar" class="btn btn-warning">Modificar</button>
		        <button type="button" class="btn btn-default" id="cancelar_modificacion" data-dismiss="modal">Cancelar</button>      
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->


 <?php echo form_close(); ?>



 	<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		      
		      </div>
		      <div class="modal-body text-center">
		        <p><div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> ¿Est&#225; seguro que desea <b>Eliminar</b> este Evento?</div></p>
		      </div>
		      <div class="modal-footer">
		      	<button type="submit" id="eliminar_confirm" class="btn btn-danger">Eliminar</button>
		        <button type="button" id="cancelar_eliminacion" class="btn btn-default" data-dismiss="modal">Cancelar</button>      
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->










