<style>
#loading
{
	background:#FFF url(<?php echo '/assets/back/continuidad_uploads/gif/720.GIF'; ?>) no-repeat center center;
	height: 100px;
	width: 100px;
	position: fixed;
	z-index: 1000;
	left: 55%;
	top: 50%;
	margin: -25px 0 0 -25px;
}
</style>
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
	
	<!-- <div class="row">
		<div class="col-lg-12">
			<a href="<?php echo site_url('index.php/continuidad/continuidad/mailing') ?>" class="btn btn-primary">Email</a>
		</div>
	</div> -->
	
	<div class="row">
		<div class="col-lg-9"></div>
		<div class="col-lg-2" style="left: 71px">
			<a href="<?php echo site_url('index.php/continuidad/crear_pcn/'.$val) ?>" class="btn btn-success">
				<i class="fa fa-plus"></i> Agregar nuevo PCN</a>
		</div>
	</div>
	
	<div class="row" style="margin-top: 25px">
		<?php if(isset($planes_continuidad) && !empty($planes_continuidad)) : ?>
			<div class="col-lg-12">
				&raquo; <a href="<?php echo site_url('index.php/continuidad/validar_pcn/'.$val) ?>">Validar Planes de Continuidad del Negocio</a>
			</div>
		<?php endif ?>
		<div class="col-lg-12" style="margin-top: 25px">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Planes de continuidad del negocio para riesgos con valoración <?php echo $valoracion ?></h3>
				</div>
				<div class="panel-body">
					<?php if(!isset($planes_continuidad) OR empty($planes_continuidad)) : ?>
						<?php print_alert('<strong>No existe ningún Plan de Continuidad del Negocio para riesgos con valoración '.$valoracion.'. Puede crear uno dando click al botón de arriba.</strong>','danger') ?>
					<?php else : ?>
						<div id="loading"></div>
						<div class="table-responsive">
				            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
				                <thead>
				                    <tr>
				                        <th>Código <i class="fa fa-sort"></i></th>
				                        <th>Denominación <i class="fa fa-sort"></i></th>
				                        <!-- <th>Departamento <i class="fa fa-sort"></i></th> -->
				                        <th>Responsable <i class="fa fa-sort"></i></th>
				                        <th>Estado del PCN <i class="fa fa-sort"></i></th>
				                        <th>Fecha de creación <i class="fa fa-sort"></i></th>
			                        	<th><span data-toggle="tooltip" title="Indica si el PCN fue verificado por la gerencia">Validado</span></th>
			                        	<th><span data-toggle="tooltip" title="Click para descargar PDF">PDF</span></th>
			                        	<th>Activar</th>
			                        	<th>Eliminar</th>
				                    </tr>
				                </thead>
				                <tbody>
				                	<?php foreach($planes_continuidad as $key => $plan) : ?>
				                		<?php
				                			switch ($plan->id_estado)
				                			{
												case 1: $color = '#298A08'; break;
												case 2: $color = '#B18904'; break;
												case 3: $color = '#B40404'; break;
												default: $color = '#B18904'; break;
											}
				                		?>
				                		<tr>
				                			<td>
				                				<a href="<?php echo base_url().'index.php/continuidad/listado_pcn/modificar/'.$val.'/'.$plan->id_continuidad ?>">
				                					<?php echo $plan->codigo ?>
				                				</a>
				                			</td>
				                			<td><span data-toggle="tooltip" title="<?php echo $plan->denominacion ?>"><?php echo character_limiter($plan->denominacion,20) ?></span></td>
				                			<!-- <td><?php echo ucfirst($plan->dpto_nombre) ?></td> -->
				                			<td><?php echo $plan->nombre_empleado ?></td>
				                			<td style="color: <?php echo $color ?>"><?php echo ucfirst($plan->estado) ?></td>
				                			<td><?php echo date('d-m-Y h:i A', strtotime($plan->fecha_creacion)) ?></td>
				                			<td style="text-align: center">
				                				<?php if($plan->validado) : ?>
				                					<i class="fa fa-check" style="color: green" data-toggle="tooltip" title="Fecha de validación: <?php echo $plan->fecha_validacion ?>"></i>
				                				<?php else : ?>
				                					<i class="fa fa-times" style="color: red"></i>
				                				<?php endif ?>
				                			</td>
				                			<td>
				                				<?php if(isset($plan->pdf) && !empty($plan->pdf) && file_exists($plan->pdf)) : ?>
				                					<a href="<?php echo site_url('index.php/continuidad/descargar_pdf/'.$val.'/'.$plan->id_continuidad) ?>" data-toggle="tooltip" title="Click para descargar el PDF de este PCN">
				                						<i class="fa fa-file"></i>
				                					</a>
				                				<?php else : ?>
				                					<span data-toggle="tooltip" title="PELIGRO: Este PCN no presenta PDF asociado">
				                						<i class="fa fa-file"></i>
			                						</span>
				                				<?php endif ?>
				                				
				                			</td>
				                			<td>
				                				<input type="checkbox" <?php echo ($plan->id_estado == 1) ? 'checked' : '' ?>
				                					data-toggle="modal" data-target="#activar<?php echo $plan->id_continuidad ?>" />
				                			</td>
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
														<a href="<?php echo base_url().'index.php/continuidad/listado_pcn/eliminar/'.$val.'/'.$plan->id_continuidad ?>"
															type="button" class="btn btn-danger">
															Eliminar
														</a>
													</div>
												</div>
											</div>
										</div>
										<div class="modal fade" id="activar<?php echo $plan->id_continuidad ?>" tabindex="-1" role="dialog" aria-labelledby="activar" aria-hidden="true">
											<div class="modal-dialog modal-sm">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title" id="myModalLabel"><?php echo ($plan->id_estado == 1) ? 'Desactivar' : 'Activar' ?> Plan de Continuidad del Negocio</h4>
													</div>
													<div class="modal-body">
														Va a <?php echo ($plan->id_estado == 1) ? 'desactivar' : 'activar' ?> el Plan de Continuidad del Negocio <strong><?php echo ucfirst($plan->denominacion) ?></strong> para la amenaza <strong><?php echo ucfirst($plan->riesgos_denominacion) ?></strong><br />
														¿Está seguro que desea continuar con la <?php echo ($plan->id_estado == 1) ? 'des' : '' ?>activación del PCN?
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Atras</button>
														<button onclick="activate_pcn(<?php echo $plan->id_continuidad ?>,'<?php echo $val ?>',<?php echo ($plan->id_estado == 1) ? '2' : '1' ?>)" type="button" class="btn btn-<?php echo ($plan->id_estado == 1) ? 'danger' : 'primary' ?>">
															<?php echo ($plan->id_estado == 1) ? 'Desa' : 'A' ?>ctivar
														</button>
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
<?php echo $listado_js ?>