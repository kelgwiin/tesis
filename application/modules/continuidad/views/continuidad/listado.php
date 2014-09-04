<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Gestión de Continuidad del Negocio</h1>
			<?php echo $breadcrumbs ?>
			<h3>Listado de Planes de Continuidad del Negocio</h3>
		</div>
	</div>
	
	<?php
		$val = str_replace('-', ' ', $valoracion);
		$val = strtolower($val);
		$val = str_replace(' ', '-', $val);//echo_pre($planes_continuidad);
	?>
	
	<div class="row">
		<div class="col-lg-12">
			<?php 
				if($this->session->flashdata('alert_success')) print_alert($this->session->flashdata('alert_success'));
				if($this->session->flashdata('alert_error')) print_alert($this->session->flashdata('alert_error'),'danger');
			?>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-9"></div>
		<div class="col-lg-2" style="left: 71px">
			<a href="<?php echo site_url('index.php/continuidad/crear_pcn/'.$val) ?>" class="btn btn-success">
				<i class="fa fa-plus"></i> Agregar nuevo PCN</a>
		</div>
	</div>
	
	<div class="row" style="margin-top: 25px">
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Planes de continuidad del negocio con valoración <?php echo $valoracion ?></h3>
				</div>
				<div class="panel-body">
					<?php if(!isset($planes_continuidad) OR empty($planes_continuidad)) : ?>
						<?php print_alert('<strong>No existe ningún Plan de Continuidad del Negocio para riesgos con valoración '.$valoracion.'. Puede crear uno dando click al botón de arriba.</strong>','danger') ?>
					<?php else : ?>
						<div class="table-responsive">
				            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
				                <thead>
				                    <tr>
				                        <th>Código <i class="fa fa-sort"></i></th>
				                        <th>Denominación <i class="fa fa-sort"></i></th>
				                        <th>Departamento <i class="fa fa-sort"></i></th>
				                        <th>Responsable <i class="fa fa-sort"></i></th>
				                        <th>Tipo de PCN <i class="fa fa-sort"></i></th>
				                        <th>Estado del PCN <i class="fa fa-sort"></i></th>
				                        <th>Fecha de creación <i class="fa fa-sort"></i></th>
			                        	<th>Eliminar</th>
				                    </tr>
				                </thead>
				                <tbody>
				                	<?php foreach($planes_continuidad as $key => $plan) : ?>
				                		<tr>
				                			<td>
				                				<a href="<?php echo base_url().'index.php/continuidad/listado_pcn/modificar/'.$val.'/'.$plan->id_continuidad ?>">
				                					<?php echo $plan->codigo ?>
				                				</a>
				                			</td>
				                			<td><?php echo $plan->denominacion ?></td>
				                			<td><?php echo ucfirst($plan->dpto_nombre) ?></td>
				                			<td><?php echo $plan->nombre_empleado ?></td>
				                			<td><?php echo ucfirst($plan->tipo_plan) ?></td>
				                			<td><?php echo ucfirst($plan->estado) ?></td>
				                			<td><?php echo date('d-m-Y h:i A', strtotime($plan->fecha_creacion)) ?></td>
				                			<td>
					                			<a data-toggle="modal" data-target="#delete<?php echo $plan->id_continuidad ?>">
					                				<span class="label label-danger">X</span>
					                			</a>
					                		</td>
				                		</tr>
				                		<div class="modal fade" id="delete<?php echo $plan->id_continuidad ?>" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
											<div class="modal-dialog modal-sm">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title" id="myModalLabel">Eliminar Plan de Continuidad del Negocio</h4>
													</div>
													<div class="modal-body">
														¿Está seguro que desea eliminar el PCN para <strong><?php echo ucfirst($plan->denominacion) ?></strong>?<br />
														Esto probablemente afecte a los elementos que se encuentran dentro de este PCN.
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Atras</button>
														<a href="<?php echo base_url().'index.php/continuidad/listado_pcn/eliminar/'.$plan->id_continuidad ?>"
															type="button" class="btn btn-danger">
															Eliminar
														</a>
													</div>
												</div>
											</div>
										</div>
				                	<?php endforeach ?>
				                </tbody>
							</table>
						</div>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</div>
