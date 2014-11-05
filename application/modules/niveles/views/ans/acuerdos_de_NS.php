<script type="text/javascript" src="<?=base_url()?>application/modules/niveles/views/ans/js/operaciones.js"></script>

<div id="page-wrapper">
	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<h1>Gesti&#243;n de Acuerdos de Niveles de Servicios</h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-suitcase"></i> 
					Secci&#243;n que brinda las opciones para Ver, Crear, Actualizar y Eliminar los Acuerdos de Niveles de Servicios de TI en el Sistema.</li>
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



<div class="panel panel-primary">

		<div class="panel-heading">
	   		<h3 class="panel-title"> <i class="fa fa-suitcase"></i> Acuerdos de Niveles de Servicios</h3>
	  	</div>

	  	<div class="panel-body">


		<br><a class="btn btn-info" id="nuevo_proceso" href="<?php echo base_url().'index.php/niveles_de_servicio/gestion_ANS/crear_ANS'?>"> <i class="fa fa-plus"></i>  Crear Nuevo ANS</a><br><br>
		
		<div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="dataTables-acuerdos">
                                    <thead>
                                    <tr >
                                    	<th class="text-left" width="9%"> <?php $data = array(
											    'name'        => 'checkbox_all',
											    'id'          => 'checkbox_all',
											    'value'       => 'select',
											    'checked'     => FALSE,
											    );

											echo form_checkbox($data); ?>
											<a type="button" class="btn btn-danger btn-xs disabled" onclick="" data-toggle="tooltip" data-placement="top" title="Eliminar Seleccionados" id="delete_checkbox"><i class="fa fa-times"> </i> Eliminar</a></th>
                                        <th width="10%">Nombre <i class="fa fa-sort"></i></th>
                                        <th width="10%"> Estatus <i class="fa fa-sort"></i></th>
                                        <th width="15%">Servicio <i class="fa fa-sort"></i></th>
                                       
                                        <th width="10%">Fecha Inicio <i class="fa fa-sort"></i></th>
                                        <th >Fecha Culminación <i class="fa fa-sort"></i></th>
                                        <th >Gestor <i class="fa fa-sort"></i></th>
                                        <th>Cliente(s)<i class="fa fa-sort"></i></th> 
                                        <th width="10%">Disponibilidad <i class="fa fa-sort"></i></th> 
                                         <th width="10%">Creado el <i class="fa fa-sort"></i></th>
                                        <th width="10%">Acciones <i class="fa fa-sort"></i></th>
                                    </tr>
                                </thead>
                                 <tbody>
                                	<?php
                                	foreach($acuerdos as $acuerdo)
		           					 { ?>
		           						<tr id="<?php echo $acuerdo->acuerdo_nivel_id; ?>" class="text-left">

							                <td> <?php $data = array(
											    'name'        => 'checkbox_'.$acuerdo->acuerdo_nivel_id,
											    'id'          => 'checkbox_'.$acuerdo->acuerdo_nivel_id,
											    'class'       =>  'checkbox',
											    'value'       => $acuerdo->acuerdo_nivel_id,
											    'checked'     => FALSE,
											    );

											echo form_checkbox($data); ?> </td>
							                <td> <?php echo $acuerdo->nombre_acuerdo; ?></td>
							                 <td> 
							                 	<?php if($acuerdo->fecha_final > date('Y-m-d')) : ?>
									  				<span class="label label-success"><?php echo 'Activo'; ?></span>

									  			<?php else : ?>
									  				<span class="label label-danger"><?php echo 'Vencido'; ?></span>
									  			<?php endif ?>
							                  </td>	
							                <td> <?php 
							                          foreach($servicios as $servicio)
							                			{
							                				if($servicio->servicio_id == $acuerdo->id_servicio)
							                				{
							                					echo $servicio->nombre; 
							                				}
							                			} ?> </td>

							              
							                <td> 
							                	<?php
							                	 $date = date_create($acuerdo->fecha_inicio);
							                	 echo date_format($date,"d/m/Y"); ?></td>
							                 <td> <?php 
							                 $date = date_create($acuerdo->fecha_final);
							                	 echo date_format($date,"d/m/Y"); ?></td>
							                <td> 
							                	 <?php foreach($empleados as $empleado)
							                			{
							                				if($empleado->id_personal == $acuerdo->gestor_servicio)
							                				{
							                					echo $empleado->codigo_empleado.' - '.$empleado->nombre; 
							                				}
							                			}
							                	   ?></td>
							                <td> <?php echo $acuerdo->cliente; ?> </td>
							               	<td class='text-center'><b> <?php echo $acuerdo->porcentaje_disp; ?>% </b></td>	

												   <td>  
							                	<?php 
							                	 $date = date_create($acuerdo->fecha_creacion_acuerdo);
							                	 echo date_format($date,"d/m/Y"); ?>  </td>
							                
							                <td class="text-center"> 
							                				                	 <a href="<?php echo base_url().'index.php/niveles_de_servicio/gestion_ANS/ver_ANS/'.$acuerdo->acuerdo_nivel_id ?>" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Ver"><i class="fa fa-search"></i></a> 
							                	<a href="<?php echo base_url().$acuerdo->ruta_pdf;?>"  target="_blank" type="button" class="btn btn-xs" data-toggle="tooltip" data-placement="top" title="Documento PDF del ANS" style="background-color:#A3A375; color: white;"><b><i class="fa fa-file-pdf-o"></i></b></a> 
				
							                	 <a href="<?php echo base_url().'index.php/niveles_de_servicio/gestion_ANS/modificar_ANS/'.$acuerdo->acuerdo_nivel_id.'/actualizar' ?>" type="button" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Actualizar"><i class="fa fa-pencil"></i></a>
							                	 <a type="button" class="btn btn-danger btn-xs" onclick="deleteAcuerdo(<?php echo $acuerdo->acuerdo_nivel_id; ?>);" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-times"></i></a><br><br>
							                	 <a type="button" href="<?php echo base_url().'index.php/niveles_de_servicio/gestion_ANS/Nuevo_ANS_base/'.$acuerdo->acuerdo_nivel_id.'/nuevo_ans_base' ?>" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Crear Nuevo ANS en base a este Acuerdo"><i class="fa fa-file-text"></i> Nuevo ANS base</a>
							                </td>
							            </tr>
							         <?php } ?>    
                                </tbody>
                            </table>
                        </div>
		  	</div><!-- Panel body  -->

     
	</div>

	<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		      
		      </div>
		      <div class="modal-body text-center">
		        <p><div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> ¿Est&#225; seguro que desea <b>Eliminar</b> este Acuerdo de Niveles de Servicio?</div></p>
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
		        <p><div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> ¿Est&#225; seguro que desea <b>Eliminar TODOS</b> los Acuerdos de Niveles de Servicio Seleccionados?</div></p>
		      </div>
		      <div class="modal-footer">
		      	<button  id="eliminarselect_confirm" class="btn btn-danger">Eliminar</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>      
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->