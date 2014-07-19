<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Personal de la Organización</h1>
			<ol class="breadcrumb">
				<li class="active">
					<i class="fa fa-dashboard"></i> Carga de los Departamentos de la Organización.
				</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class = "panel-heading">
					<h3 class="panel-title">Cargar de personal por departamentos</h3>
				</div>
				<form class="form" action="<?php echo site_url('index.php/cargar_datos/personal') ?>" method="post">
					<fieldset>
						<!-- Select Basic -->
						<div class = "panel-body">
							<div class="form-group">
								<div class="col-md-4 col-md-offset-3">
									<select name="id_departamento" class="form-control">
										<?php foreach($departamentos as $key => $departamento) : ?>
											<option value="<?php echo $departamento->departamento_id ?>"
												<?php echo (isset($id_departamento) && ($id_departamento == $departamento->departamento_id)) ? 'selected' : '' ?>>
												<?php echo ucfirst($departamento->nombre) ?>
											</option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="col-md-2">
									<button class="btn btn-primary col-md-10">Cargar</button>
								</div>
							</div>
							<?php if(isset($id_departamento) && !empty($id_departamento)) : ?>
								<br /><hr />
								<?php if(isset($personal) && !empty($personal)) : ?>
									<div class="table-responsive">
							            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
							                <thead>
							                    <tr>
							                        <th>Email <i class="fa fa-sort"></i></th>
							                        <th>Código <i class="fa fa-sort"></i></th>
							                        <th>Cédula <i class="fa fa-sort"></i></th>
							                        <th>Nombre <i class="fa fa-sort"></i></th>
							                        <th>Cargo <i class="fa fa-sort"></i></th>
							                        <th>Teléfono <i class="fa fa-sort"></i></th>
						                        	<th>Eliminar</th>
							                    </tr>
							                </thead>
							                <tbody>
						                		<tr>
							                		<td>
							                			<a href="<?php echo site_url('index.php/continuidad/gestion_riesgos/riesgos/modificar/') ?>">
							                				<?php echo '$riesgo->denominacion' ?>
							                			</a>
							                		</td>
							                		<td><?php echo '$riesgo->categoria' ?></td>
							                		<td><?php echo '$riesgo->valoracion '?></td>
							                		<td><?php echo '$riesgo->categoria' ?></td>
							                		<td><?php echo '$riesgo->valoracion '?></td>
							                		<td><?php echo '$riesgo->valoracion '?></td>
							                		<td>
							                			<a data-toggle="modal" data-target="#delete<?php echo '$riesgo->id_riesgo' ?>">
							                				<span class="label label-danger">X</span>
							                			</a>
						                			</td>
							                	</tr>
							                	<div class="modal fade" id="delete<?php echo '$riesgo->id_riesgo' ?>" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
													<div class="modal-dialog modal-sm">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																<h4 class="modal-title" id="myModalLabel">Eliminar riesgo/amenaza</h4>
															</div>
															<div class="modal-body">
																¿Está seguro que desea eliminar el riesgo/amenaza <strong><?php echo ucfirst('$riesgo->denominacion') ?></strong>?<br />
																Esto probablemente afecte a las dependencias de este riesgo.
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-default" data-dismiss="modal">Atras</button>
																<a href="<?php echo base_url().'index.php/continuidad/gestion_riesgos/riesgos/eliminar/' ?>"
																	type="button" class="btn btn-danger">
																	Eliminar
																</a>
															</div>
														</div>
													</div>
												</div>
							                </tbody>
										</table>
									</div>
								<?php else : ?>
									<?php
										$msg = 'No se han cargado los datos del personal de el departamento '.ucfirst($dpto_actual->nombre).'. ';
										$link = '<a href="'.base_url().'index.php/cargar_datos/personal/cargar_personal/'.$id_departamento.'"><strong><u>Pulse aquí</u></strong></a> para ingresar personal a este departamento';
										print_alert($msg.$link,'info');
									?>
								<?php endif ?>
							<?php endif ?>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>