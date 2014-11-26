<script type="text/javascript" src="<?=base_url()?>application/modules/catalogo/views/js/operaciones_ajax.js"></script>


<div id="page-wrapper">

	<ol class="breadcrumb">
				<li class="active"><i class="fa fa-wrench"></i> 
					Vista de T&#233;cnica del Servicio Seleccionado.</li>
				</ol>


	<div class="col-lg-7 col-lg-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading"> <i class="fa fa-list"></i> Servicio - Vista de T&#233;cnica</div>
			<div class="panel-body">
				<div class="table-responsive">
				<table class="table">	
					<thead>
						 <tr>
						  <td><img src="<?=base_url().$servicio_actual->ruta_imagen?>" width='80' height='80'  class="img-thumbnail"></td>
						<td></td>
						</tr>
					</thead>	
					<tbody>
						
						 <tr>
						  <td class="col-lg-4"><b>Nombre</b></td>
						  <td class="col-lg-8 text-left"><span class="label label-primary"><?php echo $servicio_actual->nombre; ?></span></td>
						</tr>

						<tr>
						  <td class="col-lg-4"><b>Descripci&#243;n</b></td>
						  <td class="col-lg-8 text-left"><?php echo $servicio_actual->descripcion; ?></td>
						</tr>

					    <tr>
						  <td class="col-lg-4"><b>Caracter&#237;sticas</b></td>
						  <td class="col-lg-8 text-left"><?php echo $servicio_actual->caracteristicas; ?></td>
						</tr>

					
						 <td class="col-lg-4"><b>Fecha de Creaci&#243;n</b></td>
						  <td class="col-lg-8 text-left"><?php 
							                	 $date = date_create($servicio_actual->fecha_creacion);
							                	 echo date_format($date,"d/m/y"); ?> </td>
						</tr>

					   <tr>
						  <td class="col-lg-4"><b>Categoria</b></td>
						  <td class="col-lg-8 text-left"><?php echo $servicio_actual->categoria_servicio; ?></td>
						</tr>

						 <tr>
						  <td class="col-lg-4"><b>Tipo</b></td>
						  <td class="col-lg-8 text-left"><?php echo $servicio_actual->tipo_servicio; ?></td>
						</tr>


						 <tr>
						  <td class="col-lg-4"><b>Proveedor del Servicio</b></td>
						  <td class="col-lg-8 text-left"><?php echo $proveedor->nombre; ?></td>
						</tr>

						<tr>
						  <td class="col-lg-4"><b>Propietario del Servicio</b></td>
						  <td class="col-lg-8 text-left"><?php echo $propietario->codigo_empleado.' - '.$propietario->nombre; ?></td>
						</tr>

						
						<tr>
						  <td class="col-lg-4"><b>Servicios Soportados</b></td>
						  <td class="col-lg-8 text-left">
						  	 <?php $last = end($servicios_soportados); ?>
						  	<?php if(count($servicios_soportados) > 0) : ?>
					    
								<?php foreach ($servicios_soportados as $servicio_soportado) : ?>
									<?php foreach ($servicios as $servicio) : ?>
										<?php if($servicio_soportado->servicio_soportado == $servicio->servicio_id) : ?>
										   
										    <?php if($servicio_soportado != $last) : ?>      
												<a href="<?php echo base_url('index.php/catalogo/vista_completa/'.$servicio_soportado->servicio_soportado);?>" target="_blank">
													<?php echo $servicio->nombre;?> </a> <?php echo ", ";?> 
											<?php else : ?>
											<a href="<?php echo base_url('index.php/catalogo/vista_completa/'.$servicio_soportado->servicio_soportado);?>" target="_blank">
												<?php echo $servicio->nombre;?> </a>
											<?php endif ?>	
										
										<?php endif ?>
									<?php endforeach ?>
							    <?php endforeach ?>
																				
					    	<?php else : ?>
								<em> No Posee </em>
							<?php endif ?>

						  </td>
						</tr>


						<tr>
						  <td class="col-lg-4"><b>Servicios de Apoyo</b></td>
						  <td class="col-lg-8 text-left">
						  	 <?php $last = end($servicios_soporte); ?>
						  	<?php if(count($servicios_soporte) > 0) : ?>
					    
								<?php foreach ($servicios_soporte as $servicio_soporte) : ?>
									<?php foreach ($servicios as $servicio) : ?>
										<?php if($servicio_soporte->servicio_soporte == $servicio->servicio_id) : ?>
										   
										    <?php if($servicio_soporte != $last) : ?>  
										    <a href="<?php echo base_url('index.php/catalogo/vista_completa/'.$servicio_soporte->servicio_soporte);?>" target="_blank">    
												<?php echo $servicio->nombre;?> </a> <?php echo ", ";?>
											<?php else : ?>
											 <a href="<?php echo base_url('index.php/catalogo/vista_completa/'.$servicio_soporte->servicio_soporte);?>" target="_blank">  
												<?php echo $servicio->nombre;?></a> 
											<?php endif ?>	
										
										<?php endif ?>
									<?php endforeach ?>
							    <?php endforeach ?>
																				
					    	<?php else : ?>
								<em> No Posee </em>
							<?php endif ?>

						  </td>
						</tr>


						<tr>
						  <td class="col-lg-4"><b>Infraestructura de Soporte</b></td>
						  <td class="col-lg-8 text-left">
						  	 <?php $last = end($servicio_componentes); ?>
						  	<?php if(count($servicio_componentes) > 0) : ?>
					    
								<?php foreach ($servicio_componentes as $servicio_componente) : ?>
									<?php foreach ($componentes_ti as $componente_ti) : ?>
										<?php if($servicio_componente->componente_id == $componente_ti->componente_ti_id) : ?>
										   
										    <?php if($servicio_componente != $last) : ?>      
												<?php echo $componente_ti->nombre.", ";?> 
											<?php else : ?>
												<?php echo $componente_ti->nombre;?>
											<?php endif ?>	
										
										<?php endif ?>
									<?php endforeach ?>
							    <?php endforeach ?>
																				
					    	<?php else : ?>
								<em> No Posee </em>
							<?php endif ?>

						  </td>
						</tr>




						<tr> <td></td><td></td></tr>	
						
			
	
					</tbody>
				</table>
			</div>
			</div>

		
			

			<div class="panel-footer text-right">
				<a href="<?php echo base_url('index.php/catalogo');?>" type="button" class="btn btn-default" id="cancelar">Volver al Cat&#225;logo Completo</a>
				<a href="<?php echo base_url('index.php/catalogo/lista_servicios/'.$servicio_actual->categoria_servicio);?>" type="button" class="btn btn-default" id="cancelar">Volver al Cat&#225;logo por Categor&#237;as</a>
	         
       		 </div>
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

			<?php echo form_close(); ?>

	</div>