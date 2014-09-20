<script type="text/javascript" src="<?=base_url()?>application/modules/cargar_data/views/servicio_procesos/js/operaciones_ajax.js"></script>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Gesti&#243;n de Procesos de Servicio</h1>
			<ol class="breadcrumb">
				<li class="active">
					<i class="fa fa-cogs"></i>  Secci&#243;n que brinda las opciones para Ver, Crear, Actualizar y Eliminar Procesos de Servicio para el Servicio Seleccionado.
				</li>
			</ol>
		</div>
	</div>




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
      
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class = "panel-heading">
					<h3 class="panel-title"><i class="fa fa-cogs"></i> Procesos de Servicio</h3>
				</div>
				<div class="panel-body">

					 <?php
						    // Apertura de Formulario
						    $attributes = array('role' => 'form','class'=>'form-horizontal');
							echo form_open(base_url().'index.php/cargar_datos/servicio_procesos',$attributes); 
					    ?>
					<br>
					<div class="form-group">
	 		

						<div class="col-lg-3 col-lg-offset-4 ">

							 <?php
					        	$options = array(
					        		'seleccione' => 'Seleccione un Servicio',		        	  
				               );
								foreach($servicios as $servicio)
					            { 
					              $options[$servicio->servicio_id] = $servicio->nombre;
					            }


					        ?>

					      	 <?php echo form_dropdown('servicios', $options,set_value('servicios',@$servicio_proceso_id),'class="form-control" id="dropdown_servicio_procesos" '); ?>	
				        </div>


				 		<div class="required">
							<button type="submit" class="btn btn-primary col-lg-1">Cargar</button>	    
						</div>

					</div>
					<div class="form-group">
				      	<div class="control-label col-lg-4">
				      	</div>
				      	<div class="col-lg-5">
						    <label style="color:red;">
						   	<?php 
						        echo form_error('servicios');
							 ?>
							</label>
						</div>
					</div>	

					

					<?php if(isset($servicio_proceso_id) && !empty($servicio_proceso_id)) : ?>

						
						<?php if(!$procesos) : ?>

						<hr>
						<br>	
						<div class="alert alert-info col-lg-8 col-lg-offset-2 text-center" role="alert"><b>¡No existen Procesos relacionados a este Servicio! </b>
						<a href="<?php echo base_url().'index.php/cargar_datos/servicio_procesos/crear/'.$servicio_proceso_id ?>" type="button" class="btn btn-primary"> <i class="fa fa-plus"></i> Agregar Nuevo Proceso de Servicio</a></div>
						
						<?php else : ?>

						<hr>
						<br>
						<a class="btn btn-success" id="nuevo_proceso" href="<?php echo base_url().'index.php/cargar_datos/servicio_procesos/crear/'.$servicio_proceso_id ?>"> <i class="fa fa-plus"></i>  Agregar Nuevo Proceso de Servicio</a><br><br>

						<div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="dataTables-procesos">
                                <thead>
                                    <tr >
                                    	<th class="text-left" width="10%"> <?php $data = array(
											    'name'        => 'checkbox_all',
											    'id'          => 'checkbox_all',
											    'value'       => 'select',
											    'checked'     => FALSE,
											    );

											echo form_checkbox($data); ?>
											<a type="button" class="btn btn-danger btn-xs disabled" onclick="" data-toggle="tooltip" data-placement="top" title="Eliminar Seleccionados" id="delete_checkbox"><i class="fa fa-times"> </i> Eliminar</a></th>
                                        <th width="20%">Nombre del Proceso <i class="fa fa-sort"></i></th>
                                        <th width="25%">Descripcion <i class="fa fa-sort"></i></th>
                                        <th width="15%">Tipo <i class="fa fa-sort"></i></th>
                                        <th>Acciones <i class="fa fa-sort"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php
                                	foreach($procesos_servicio as $proceso)
		           					 { ?>
		           						<tr id="<?php echo $proceso->servicio_proceso_id; ?>" class="text-left">

							                <td> <?php $data = array(
											    'name'        => 'checkbox_'.$proceso->servicio_proceso_id,
											    'id'          => 'checkbox_'.$proceso->servicio_proceso_id,
											    'class'       =>  'checkbox',
											    'value'       => $proceso->servicio_proceso_id,
											    'checked'     => FALSE,
											    );

											echo form_checkbox($data); ?> </td>

							                <td> <?php echo $proceso->nombre; ?>  </td>
							                <td> 
							                	<?php if($proceso->descripcion != NULL) : ?>
							                	<?php 
                                                  if(strlen($proceso->descripcion)> 300)
                                                        {       
                                                                $conntent = substr($proceso->descripcion, 0, 300);
                                                                echo $conntent.' (...)';                                                       
                                                        }
                                                   else
                                                        {
                                                                echo $proceso->descripcion;
                                                       
                                                        }      ?> 

                                                  <?php else : ?>
							                 		<em>No posee</em>
							                 	<?php endif ?>
							                 </td>
							                 <td> 
							                 	<?php if($proceso->tipo != NULL) : ?>

							                 	<?php echo $proceso->tipo; ?> 

							                 	<?php else : ?>
							                 		<em>No posee</em>
							                 	<?php endif ?>

							                 </td>
							                <td class="text-center"> <a href="<?php echo base_url().'index.php/cargar_datos/servicio_procesos/ver/'.$proceso->servicio_proceso_id ?>" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Ver"><i class="fa fa-search"></i></a> 
							                	 <a href="<?php echo base_url().'index.php/cargar_datos/servicio_procesos/modificar/'.$proceso->servicio_proceso_id ?>" type="button" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Actualizar"><i class="fa fa-pencil"></i></a>
							                	 <a type="button" class="btn btn-danger btn-xs" onclick="deleteProcesoServicio(<?php echo $proceso->servicio_proceso_id; ?>,<?php echo $proceso->servicio_id; ?>);" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-times"></i></a> </td>
							            </tr>
							         <?php } ?>    
                                </tbody>

                            </table>
                        </div>

						<?php endif ?>

					



					<?php endif ?>

					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		      
		      </div>
		      <div class="modal-body text-center">
		        <p><div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> ¿Est&#225; seguro que desea <b>Eliminar</b> este Proceso de Servicio?</div></p>
		      </div>
		      <div class="modal-footer">
		      	<button type="submit" id="eliminar_confirm" class="btn btn-danger">Eliminar</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>      
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

	<div class="modal fade" id="eliminar_todos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		      
		      </div>
		      <div class="modal-body text-center">
		        <p><div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> ¿Est&#225; seguro que desea <b>Eliminar TODOS</b> los Procesos de Servicio Seleccionadas?</div></p>
		      </div>
		      <div class="modal-footer">
		      	<button  id="eliminarselect_confirm" class="btn btn-danger">Eliminar</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>      
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
