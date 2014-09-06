<script type="text/javascript" src="<?=base_url()?>application/modules/cargar_data/views/procesos_negocio/js/operaciones_ajax.js"></script>

<div id="page-wrapper">

		<div class="col-lg-12">
			<h1>Gesti&#243;n de Procesos de Negocio</h1>
		</div><br><br>

	<div class="col-lg-7 col-lg-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading"> <i class="fa fa-building-o"></i> Proceso de Negocio - Detalle </div>
			<div class="panel-body">
				<div class="table-responsive">
				<table class="table">	
					<thead>
						 <tr>
						  <td class="col-lg-4"><b>Nombre</b></td>
						  <td class="col-lg-8 text-left"><?php echo $proceso->nombre; ?></td>
						</tr>
					</thead>	
					<tbody>
						 <tr>
						  <td class="col-lg-4"><b>Descripci&#243;n</b></td>
						  <td class="col-lg-8 text-left"><?php echo $proceso->descripcion; ?></td>
						</tr>	

						 <tr>
						  <td class="col-lg-4"><b>Departamento</b></td>
						  <td class="col-lg-8 text-left"><?php foreach($departamentos as $departamento)
							                			{
							                				if($proceso->id_departamento == $departamento->departamento_id)
							                				{
							                					echo $departamento->nombre; 
							                				}
							                			}
							                	   ?></td>
						</tr>	
					</tbody>
				</table>
			</div>
			</div>

			 <?php
				 // Apertura de Formulario
				$attributes = array('role' => 'form', 'id'=> 'form_process','class'=>'form-horizontal');
				echo form_open(base_url().'index.php/cargar_datos/procesos_de_negocio/eliminar',$attributes); 
				?>

				<div style="display: none;">				
				<?php echo form_input('proceso_id', $proceso->procesoneg_id);
				      echo form_input('delete_ver', true);
			
				?>
				</div>
			

			<div class="panel-footer text-right">
				<a href="<?php echo base_url('index.php/cargar_datos/procesos_de_negocio');?>" type="button" class="btn btn-default" id="cancelar">Volver</a>
	                <a href="<?php echo base_url().'index.php/cargar_datos/procesos_de_negocio/modificar/'.$proceso->procesoneg_id ?>"  data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Actualizar</a>
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
		        <p><div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> ¿Est&#225; seguro que desea <b>Eliminar</b> este Proceso de Negocio?</div></p>
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