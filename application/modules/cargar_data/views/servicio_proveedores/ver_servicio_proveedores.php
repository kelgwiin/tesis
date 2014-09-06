<script type="text/javascript" src="<?=base_url()?>application/modules/cargar_data/views/servicio_proveedores/js/operaciones_ajax.js"></script>


<div id="page-wrapper">

		<div class="col-lg-12">
			<h1>Gesti&#243;n de Proveedores de Servicio</h1>
		</div><br><br>

	<div class="col-lg-7 col-lg-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading"> <i class="fa fa-exchange"></i> Proveedor de Servicio - Detalle </div>
			<div class="panel-body">
				<div class="table-responsive">
				<table class="table">	
					<thead>
						 <tr>
						  <td class="col-lg-4"><b>Nombre del Proveedor</b></td>
						  <td class="col-lg-8 text-left"><?php echo $servicio_proveedor->nombre; ?></td>
						</tr>
					</thead>	
					<tbody>
						 <tr>
						  <td class="col-lg-4"><b>Tipo de Proveedor</b></td>
						  <td class="col-lg-8 text-left"><?php echo $servicio_proveedor->tipo; ?></td>
						</tr>

						 <tr>
						  <td class="col-lg-4"><b>Descripci&#243;n</b></td>
						  <td class="col-lg-8 text-left"><?php echo $servicio_proveedor->descripcion; ?></td>
						</tr>	

					</tbody>
				</table>
			</div>
			</div>

			 <?php
				 // Apertura de Formulario
				$attributes = array('role' => 'form', 'id'=> 'form_process','class'=>'form-horizontal');
				echo form_open(base_url().'index.php/cargar_datos/servicio_proveedores/eliminar',$attributes); 
				?>

				<div style="display: none;">				
				<?php echo form_input('proveedor_id', $servicio_proveedor->proveedor_id);
					  echo form_input('delete_ver', true);

			
				?>
				</div>
			

			<div class="panel-footer text-right">
				<a href="<?php echo base_url('index.php/cargar_datos/servicio_proveedores');?>" type="button" class="btn btn-default" id="cancelar">Volver</a>
	                <a href="<?php echo base_url().'index.php/cargar_datos/servicio_proveedores/modificar/'.$servicio_proveedor->proveedor_id ?>"  data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Actualizar</a>
	                <a  data-original-title="Eliminar" data-target="#eliminar" data-toggle="modal" type="button" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Eliminar</a>

	         
       		 </div>
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

			<?php echo form_close(); ?>

	</div>