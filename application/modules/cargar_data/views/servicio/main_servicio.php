<script type="text/javascript" src="<?=base_url()?>application/modules/cargar_data/views/servicio/js/operaciones_ajax.js"></script>

<div id="page-wrapper">


	

	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<h1>Gesti&#243;n de Servicios</h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-list"></i> 
					Secci&#243;n que brinda las opciones para Ver, Crear, Actualizar y Eliminar los Servicios de TI en el Sistema.</li>
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
     <div class="alert alert-success text-center" role="alert" id="success2" style="display: none;">
	</div>

	<div class="panel panel-primary">

		<div class="panel-heading">
	   		<h3 class="panel-title"> <i class="fa fa-list"></i> Servicios</h3>
	  	</div>

	  	<div class="panel-body">



		<div class="row col-lg-12 text-right">

	                    <a href="<?php echo base_url('index.php/cargar_datos/servicio_categorias');?>" type="button" class="btn btn-primary btn-xs"><b> <i class="fa fa-folder-open-o"></i> Gestion de Categor&#237;as </b> </a>

	                    <a href="<?php echo base_url('index.php/cargar_datos/servicio_tipos');?>" type="button" class="btn btn-primary btn-xs"><b> <i class="fa fa-bars"></i> Gestion de Tipos </b> </a>

	                    <a href="<?php echo base_url('index.php/cargar_datos/servicio_proveedores');?>" type="button" class="btn btn-primary btn-xs"><b> <i class="fa fa-exchange"></i> Gestion de Proveedores </b> </a>

	                    <a href="<?php echo base_url('index.php/cargar_datos/servicio_soportados');?>" type="button" class="btn btn-primary btn-xs"><b> <i class="fa fa-retweet"></i> Gestion de Soporte de Servicios </b> </a>

	                    <a href="<?php echo base_url('index.php/cargar_datos/procesos_de_negocio_soportados');?>" type="button" class="btn btn-primary btn-xs"><b> <i class="fa fa-plus-square"></i> Asignar Procesos Negocios a Servicios </b> </a>
	    </div>
		<a class="btn btn-success" id="nuevo_proceso" href="<?php echo base_url().'index.php/cargar_datos/servicios/crear'?>"> <i class="fa fa-plus"></i>  Agregar Nuevo Servicio</a><br><br>
		
		<div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="dataTables-servicio">
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
                                        <th >Nombre <i class="fa fa-sort"></i></th>
                                        <th >Descripcion <i class="fa fa-sort"></i></th>
                                        <th >Creado el <i class="fa fa-sort"></i></th>
                                        <th width="10%">Proovedor <i class="fa fa-sort"></i></th>
                                        <th >Tipo <i class="fa fa-sort"></i></th>
                                        <th >Categoria <i class="fa fa-sort"></i></th>
                                        <th>Propietario <i class="fa fa-sort"></i></th>
                                        <th>Prioridad de Negocio <i class="fa fa-sort"></i></th>
                                        <th width="10%">Acciones <i class="fa fa-sort"></i></th>
                                    </tr>
                                </thead>
                                 <tbody>
                                	<?php
                                	foreach($servicios as $servicio)
		           					 { ?>
		           						<tr id="<?php echo $servicio->servicio_id; ?>" class="text-left">

							                <td> <?php $data = array(
											    'name'        => 'checkbox_'.$servicio->servicio_id,
											    'id'          => 'checkbox_'.$servicio->servicio_id,
											    'class'       =>  'checkbox',
											    'value'       => $servicio->servicio_id,
											    'checked'     => FALSE,
											    );

											echo form_checkbox($data); ?> </td>
							                <td> <?php echo $servicio->nombre; ?>  </td>
							                <td> <?php 
                                                  if(strlen($servicio->descripcion)> 100)
                                                        {       
                                                                $conntent = substr($servicio->descripcion, 0, 100);
                                                                echo $conntent.' (...)';                                                       
                                                        }
                                                   else
                                                        {
                                                                echo $servicio->descripcion;
                                                       
                                                        }     
							                			//echo $proceso->descripcion; ?> </td>

							                <td>  
							                	<?php 
							                	 $date = date_create($servicio->fecha_creacion);
							                	 echo date_format($date,"d/m/y"); ?>  </td>
							                <td> 
							                 <?php foreach($proveedores as $proveedor)
							                			{
							                				if($proveedor->proveedor_id == $servicio->proveedor_servicio)
							                				{
							                					echo $proveedor->nombre; 
							                				}
							                			}
							                	   ?></td>
							                <td> <?php echo $servicio->tipo_servicio; ?>  </td>
							                <td> <?php echo $servicio->categoria_servicio; ?>  </td>
							                <td>  
							                <?php foreach($propietarios as $propietario)
							                			{
							                				if($propietario->id_personal == $servicio->propietario_servicio)
							                				{
							                					echo $propietario->codigo_empleado.' - '.$propietario->nombre; 
							                				}
							                			}
							                	   ?> </td>
							                <td> <?php echo $servicio->prioridad_servicio; ?>  </td>			
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


	<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		      
		      </div>
		      <div class="modal-body text-center">
		        <p><div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> ¿Est&#225; seguro que desea <b>Eliminar</b> este Servicio?</div></p>
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
		        <p><div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> ¿Est&#225; seguro que desea <b>Eliminar TODOS</b> los Servicios Seleccionados?</div></p>
		      </div>
		      <div class="modal-footer">
		      	<button  id="eliminarselect_confirm" class="btn btn-danger">Eliminar</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>      
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
</div><!-- end of page-wrapper-->