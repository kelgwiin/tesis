<script type="text/javascript" src="<?=base_url()?>application/modules/niveles/views/rns/js/operaciones.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/niveles/views/ans/css/ans.css">

<div id="page-wrapper">
	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<h1>Gesti&#243;n de Requisitos de Niveles de Servicio</h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-file-text"></i> 
					Secci&#243;n que brinda las opciones para Ver, Crear, Actualizar y Eliminar los  Requisitos de Niveles de Servicio.</li>
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
	   		<h3 class="panel-title"> <i class="fa fa-file-text"></i>  Requisitos de Niveles de Servicio</h3>
	  	</div>

	  	<div class="panel-body">


		<br><a class="btn btn-info" id="nuevo_proceso" href="<?php echo base_url().'index.php/requisito_niveles_servicio/gestion_RNS/crear_RNS'?>"> <i class="fa fa-plus"></i>  Crear Nuevo RNS</a><br><br>
		
		<div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="dataTables-requisito">
                                    <thead>
                                    <tr >
                                    	<th class="text-left" width="5%"> <?php $data = array(
											    'name'        => 'checkbox_all',
											    'id'          => 'checkbox_all',
											    'value'       => 'select',
											    'checked'     => FALSE,
											    );

											echo form_checkbox($data); ?>
											<a type="button" class="btn btn-danger btn-xs disabled" onclick="" data-toggle="tooltip" data-placement="top" title="Eliminar Seleccionados" id="delete_checkbox"><i class="fa fa-times"> </i> Eliminar</a></th>
                                         <th  width="10%">Nombre de RNS<i class="fa fa-sort"></i></th>                                      
                                        <th  width="10%">Cliente(s)<i class="fa fa-sort"></i></th> 
                                         <th width="10%">Servicio <i class="fa fa-sort"></i></th>
                                           <th width="17%"> Confiabilidad <i class="fa fa-sort"></i></th>
                                        <th width="12%">% Disponibilidad <i class="fa fa-sort"></i></th>
                                        <th width="15%"> Disponibilidad (Horas) <i class="fa fa-sort"></i></th>
                                        <th width="10%"> Creado el <i class="fa fa-sort"></i></th>
                                      
                                        <th width="15%">Acciones <i class="fa fa-sort"></i></th>
                                    </tr>
                                </thead>
                                 <tbody>
                                	<?php
                                	foreach($requisitos as $requisito)
		           					 { ?>
		           						<tr id="<?php echo $requisito->requisito_id; ?>" class="text-left">

							                <td> <?php $data = array(
											    'name'        => 'checkbox_'.$requisito->requisito_id,
											    'id'          => 'checkbox_'.$requisito->requisito_id,
											    'class'       =>  'checkbox',
											    'value'       => $requisito->requisito_id,
											    'checked'     => FALSE,
											    );

											echo form_checkbox($data); ?> </td>

							                 <td> <?php echo $requisito->nombre; ?> </td>
                                             
                                             <td> <?php echo $requisito->cliente; ?> </td>

							                <td> <?php 
							                          foreach($servicios as $servicio)
							                			{
							                				if($servicio->servicio_id == $requisito->id_servicio)
							                				{
							                					echo $servicio->nombre; 
							                				}
							                			} ?> </td>

							                	 <td>


												 <b><i>Numero de Caídas (Por <?php echo $requisito->unidad_num_caidas; ?>):</i></b><br><br>

												
													<div class="progress">
													  <div class="progress-bar progress-bar-success" style="width: 33%">
													    	<div class='text-center'><b>Normal</b></div>
													  </div>
													  <div class="progress-bar progress-bar-warning" style="width: 33%">
													      <div class='text-center'><b> Alerta </b></div>
													  </div>
													  <div class="progress-bar progress-bar-danger" style="width: 34%">
													       <div class='text-center'><b>Fallo</b> </div>
													  </div>
													</div>
													<div class="progress-meter">
														<div class="meter meter-left" style="width: 33%;"><span class="meter-text">0 Caídas</span></div>
														<div class="meter meter-left" style="width: 33%;"><span class="meter-text">
																																		<?php if($requisito->minimo_num_caidas > 1) : ?>
																													                 	<?php echo  $requisito->minimo_num_caidas.' caídas'; ?> 
																													                 	<?php else : ?>
																													                 	<?php echo  $requisito->minimo_num_caidas.' caída'; ?>
																													                 	<?php endif ?>
																																		</span></div>
										    			<div class="meter meter-left" style="width: 34%;"><span class="meter-text">
										    																							<?php if($requisito->maximo_num_caidas > 1) : ?>
																													                 	<?php echo  $requisito->maximo_num_caidas.' caídas'; ?> 
																													                 	<?php else : ?>
																													                 	<?php echo  $requisito->maximo_num_caidas.' caída'; ?>
																													                 	<?php endif ?>
										    																							</span></div>

													</div><br>
									

							               	 </td>


							        							             
							               	<td class='text-center'><b> <?php echo $requisito->porcentaje_disp; ?>% </b></td>	

							               	<td>
							               		<b>Horas por Semana:</b>
							               		 <?php 

													    	$horas_disponibilidad = $requisito->minutos_disp_semanal / 60;

													    	if(is_int($horas_disponibilidad))
													    	{
													    		echo $horas_disponibilidad.' Horas';
													    	}
													    	else
													    	{
													    	    $numero = $horas_disponibilidad; 
													    	    $separa = explode(".",$numero); 
													    	    $separa[1];
													    	    $horas = floor($horas_disponibilidad);
													    	    $str = '0.'.$separa[1];
													    	    $decimal = (float) $str;
													    	    $segundos = $decimal*60;
													    		echo $horas.' Horas y '.floor($segundos).' Minutos';
													    		
												    		}

													    ?><br>
											     <b>Horas por Mes:</b>
											      <?php 

													    	$horas_disponibilidad = $requisito->minutos_disp_mensual / 60;

													    	if(is_int($horas_disponibilidad))
													    	{
													    		echo $horas_disponibilidad.' Horas';
													    	}
													    	else
													    	{
													    	    $numero = $horas_disponibilidad; 
													    	    $separa = explode(".",$numero); 
													    	    $separa[1];
													    	    $horas = floor($horas_disponibilidad);
													    	    $str = '0.'.$separa[1];
													    	    $decimal = (float) $str;
													    	    $segundos = $decimal*60;
													    		echo $horas.' Horas y '.floor($segundos).' Minutos';
													    		
												    		}

													    ?><br>
											   <b>Horas por Año:</b>
											   <?php 

													    	$horas_disponibilidad = $requisito->minutos_disp_anual / 60;

													    	if(is_int($horas_disponibilidad))
													    	{
													    		echo $horas_disponibilidad.' Horas';
													    	}
													    	else
													    	{
													    	    $numero = $horas_disponibilidad; 
													    	    $separa = explode(".",$numero); 
													    	    $separa[1];
													    	    $horas = floor($horas_disponibilidad);
													    	    $str = '0.'.$separa[1];
													    	    $decimal = (float) $str;
													    	    $segundos = $decimal*60;
													    		echo $horas.' Horas y '.floor($segundos).' Minutos';
													    		
												    		}

													    ?><br>
							               	 </td>


							               	  <td>  
							                	<?php 
							                	 $date = date_create($requisito->fecha_creacion_requisito);
							                	 echo date_format($date,"d/m/Y"); ?>  </td>

							               

							                
							                <td class="text-center"> 
							                	 <a href="<?php echo base_url().'index.php/requisito_niveles_servicio/gestion_RNS/ver_RNS/'.$requisito->requisito_id ?>" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Ver"><i class="fa fa-search"></i></a> 
							                	 <a href="<?php echo base_url().$requisito->ruta_pdf;?>"  target="_blank" type="button" class="btn btn-xs" data-toggle="tooltip" data-placement="top" title="Documento PDF del ANS" style="background-color:#A3A375; color: white;"><b><i class="fa fa-file-pdf-o"></i></b></a> 
				
							                	 <a href="<?php echo base_url().'index.php/requisito_niveles_servicio/gestion_RNS/modificar_RNS/'.$requisito->requisito_id?>" type="button" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Actualizar"><i class="fa fa-pencil"></i></a>
							                	 <a type="button" class="btn btn-danger btn-xs" onclick="deleteRequisito(<?php echo $requisito->requisito_id;?>);" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-times"></i></a><br><br>
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
		        <p><div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> ¿Est&#225; seguro que desea <b>Eliminar</b> este Requisto de Niveles de Servicio?</div></p>
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
		        <p><div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> ¿Est&#225; seguro que desea <b>Eliminar TODOS</b> los Requistos de Niveles de Servicio Seleccionados?</div></p>
		      </div>
		      <div class="modal-footer">
		      	<button  id="eliminarselect_confirm" class="btn btn-danger">Eliminar</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>      
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->