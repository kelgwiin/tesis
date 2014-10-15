<script type="text/javascript" src="<?=base_url()?>application/modules/niveles/views/js/operaciones_ajax.js"></script>

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


		<br><a class="btn btn-info" id="nuevo_proceso" href="<?php echo base_url().'index.php/niveles_de_servicio/gestion_ANS/crear_ANS'?>"> <i class="fa fa-plus"></i>  Crear ANS</a><br><br>
		
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
                                        <th>Clientes <i class="fa fa-sort"></i></th> 
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
							                <td> <?php echo $acuerdo->nombre_acuerdo; ?>  </td>
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

							              
							                <td> <?php echo $acuerdo->fecha_inicio; ?></td>
							                 <td> <?php echo $acuerdo->fecha_final; ?></td>
							                <td> <?php echo $acuerdo->gestor_servicio; ?></td>
							                <td> <?php echo $acuerdo->cliente; ?> </td>
							               	<td> <?php echo $acuerdo->porcentaje_disp; ?>% </td>	

												   <td>  
							                	<?php 
							                	 $date = date_create($acuerdo->fecha_creacion_acuerdo);
							                	 echo date_format($date,"d/m/y"); ?>  </td>
							                
							                <td class="text-center"> <a href="<?php echo base_url().'index.php/cargar_datos/servicios/ver/'.$servicio->servicio_id ?>" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Ver"><i class="fa fa-search"></i></a> 
							                	 <a href="<?php echo base_url().'index.php/cargar_datos/servicios/modificar/'.$servicio->servicio_id ?>" type="button" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Actualizar"><i class="fa fa-pencil"></i></a>
							                	 <a type="button" class="btn btn-danger btn-xs" onclick="deleteServicio(<?php echo $servicio->servicio_id; ?>);" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-times"></i></a> </td>
							            </tr>
							         <?php } ?>    
                                </tbody>
                            </table>
                        </div>
		  	</div><!-- Panel body  -->
	</div>