<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Gestión de Continuidad del Negocio</h1>
			<?php echo $breadcrumbs ?>
			<h3>Estrategias de Recuperación del Negocio</h3>
		</div>
	</div>
	
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
			<a href="<?php echo site_url('index.php/continuidad/estrategias/crear') ?>" class="btn btn-success">
				<i class="fa fa-plus"></i> Agregar nueva estrategia</a>
		</div>
	</div>
	
	<div class="row" style="margin-top: 25px">
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Estrategias de recuperación del negocio</h3>
				</div>
				<div class="panel-body">
					<?php if(isset($estrategias) && !empty($estrategias)) : ?>
						<div class="table-responsive">
				            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
				                <thead>
				                    <tr>
				                        <th>Denominación <i class="fa fa-sort"></i></th>
				                        <th>Tipo <i class="fa fa-sort"></i></th>
				                        <th>Costo <i classs="fa fa-sort"></i></th>
				                        <th>Tiempo <i claas="fa fa-sort"></i></th>
				                        <th>Localización <i clls="fa fa-sort"></i></th>
			                        	<th>Eliminar</th>
				                    </tr>
				                </thead>
				                <tbody>
									<?php foreach($estrategias as $key => $strat) : ?>
										<tr>
											<td>
												<a href="<?php echo site_url('index.php/continuidad/estrategias/modificar/'.$strat->id_estrategia) ?>">
													<?php echo $strat->denominacion ?>
												</a>
											</td>
											<td><?php echo $strat->tipoestrat_denom ?></td>
											<td><?php echo 'Bsf. '.$strat->costo ?></td>
											<td style="font-size: 11px"><?php echo date('d-m-Y',strtotime($strat->fecha_inicio)).' | '.date('d-m-Y',strtotime($strat->fecha_fin)) ?></td>
											<td><?php echo character_limiter($strat->localizacion,20) ?></td>
											<td>
					                			<a data-toggle="modal" data-target="#delete<?php echo $strat->id_estrategia ?>">
					                				<span class="label label-danger">X</span>
					                			</a>
				                			</td>
										</tr>
										<div class="modal fade" id="delete<?php echo $strat->id_estrategia ?>" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
											<div class="modal-dialog modal-sm">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title" id="myModalLabel">Eliminar estrategia</h4>
													</div>
													<div class="modal-body">
														¿Está seguro que desea eliminar la estrategia de recuperación <strong><?php echo ucfirst($strat->denominacion) ?></strong>?<br />
														Esto probablemente afecte a las dependencias de esta estrategia.<br />
														Por favor proceda con cautela.
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Atras</button>
														<a href="<?php echo base_url().'index.php/continuidad/estrategias/eliminar/'.$strat->id_estrategia ?>"
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
					<?php else : ?>
						<?php print_alert('No hay estrategias de recuperación creadas hasta el momento. Cree una nueva estrategia en el botón de arriba.','danger') ?>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</div>