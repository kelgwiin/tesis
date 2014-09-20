<script type="text/javascript" src="<?=base_url()?>application/modules/cargar_data/views/servicio_proveedores/js/operaciones_ajax.js"></script>



<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Gesti&#243;n de Proveedores de Servicio</h1>
			<br>
		</div>
	</div>
	<ol class="breadcrumb">
				<li class="active">
					<i class="fa fa-exchange"></i>  Secci&#243;n que brinda las opciones para Ver, Crear, Actualizar y Eliminar los Proveedores de Servicios de TI en el Sistema.
				</li>
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

	<div class="alert alert-danger text-center" role="alert" id="error" style="display: none;">
	</div>

	<div class="panel panel-primary">

		<div class="panel-heading">
	   		<h3 class="panel-title"> <i class="fa fa-exchange"></i> Proveedores de Servicio</h3>
	  	</div>

	  	<div class="panel-body">



		<a class="btn btn-success" id="nuevo_proceso" href="<?php echo base_url().'index.php/cargar_datos/servicio_proveedores/crear'?>"> <i class="fa fa-plus"></i>  Agregar Nuevo Proveedor de Servicio</a><br><br>
		
		<div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="dataTables-tipos">
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
                                        <th width="15%">Nombre <i class="fa fa-sort"></i></th>
                                        <th>Tipo <i class="fa fa-sort"></i></th>
                                        <th width="40%">Descripcion <i class="fa fa-sort"></i></th>
                                        <th>Acciones <i class="fa fa-sort"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php
                                	foreach($servicio_proveedores as $servicio_proveedor)
		           					 { ?>
		           						<tr id="<?php echo $servicio_proveedor->proveedor_id; ?>" class="text-left">

							                <td> <?php $data = array(
											    'name'        => 'checkbox_'.$servicio_proveedor->proveedor_id,
											    'id'          => 'checkbox_'.$servicio_proveedor->proveedor_id,
											    'class'       =>  'checkbox',

											    'value'       => $servicio_proveedor->proveedor_id,
											    'checked'     => FALSE,
											    );

											echo form_checkbox($data); ?> </td>
							                <td> <?php echo $servicio_proveedor->nombre; ?>  </td>
							                <td> <?php echo $servicio_proveedor->tipo; ?>  </td>
							                <td> <?php 
                                                  if(strlen($servicio_proveedor->descripcion)> 300)
                                                        {       
                                                                $conntent = substr($servicio_proveedor->descripcion, 0, 300);
                                                                echo $conntent.' (...)';                                                       
                                                        }
                                                   else
                                                        {
                                                                echo $servicio_proveedor->descripcion;
                                                       
                                                        }     
							                			//echo $proceso->descripcion; ?> </td>
							                <td class="text-center"> <a href="<?php echo base_url().'index.php/cargar_datos/servicio_proveedores/ver/'.$servicio_proveedor->proveedor_id ?>" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Ver"><i class="fa fa-search"></i></a> 
							                	 <a href="<?php echo base_url().'index.php/cargar_datos/servicio_proveedores/modificar/'.$servicio_proveedor->proveedor_id ?>" type="button" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Actualizar"><i class="fa fa-pencil"></i></a>
							                	 <a type="button" class="btn btn-danger btn-xs" onclick="deleteProveedor(<?php echo $servicio_proveedor->proveedor_id; ?>);" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-times"></i></a> </td>
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
		        <p><div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> ¿Est&#225; seguro que desea <b>Eliminar</b> este Proveedor de Servicio?</div></p>
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
		        <p><div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> ¿Est&#225; seguro que desea <b>Eliminar TODOS</b> los Proveedores de Servicio Seleccionados?</div></p>
		      </div>
		      <div class="modal-footer">
		      	<button  id="eliminarselect_confirm" class="btn btn-danger">Eliminar</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>      
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

</div>