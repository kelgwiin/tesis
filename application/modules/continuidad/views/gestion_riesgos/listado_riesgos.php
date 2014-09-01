<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Gestión de Continuidad del Negocio</h1>
			<?php echo $breadcrumbs ?>
			<h3>Listado de riesgos y Amenazas</h3>
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
			<a href="<?php echo base_url() ?>index.php/continuidad/gestion_riesgos/riesgos/crear" class="btn btn-success">
				<i class="fa fa-plus"></i> Agregar nuevo riesgo
			</a>
		</div>
	</div>
	
	<div class="row" style="margin-top: 25px">
		<div class="col-lg-12">
			<div class="table-responsive">
	            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                <thead>
	                    <tr>
	                        <th>Denominación <i class="fa fa-sort"></i></th>
	                        <th>Categoría <i class="fa fa-sort"></i></th>
	                        <th>Valoración <i class="fa fa-sort"></i></th>
                        	<th>Eliminar</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	<?php foreach($riesgos as $key => $riesgo) : ?>
	                		<?php
								switch ($riesgo->valoracion)
								{
									case 'Baja': $font = '#6E6E6E'; break;
									case 'Media-Baja': $font = '#0489B1'; break;
									case 'Media': $font = '#868A08'; break;
									case 'Media-Alta': $font = '#FF4000'; break;
									case 'Alta': $font = '#8A0808'; break;
								}
							?>
	                		<tr>
		                		<td>
		                			<a href="<?php echo site_url('index.php/continuidad/gestion_riesgos/riesgos/modificar/'.$riesgo->id_riesgo) ?>">
		                				<?php echo $riesgo->denominacion ?>
		                			</a>
		                		</td>
		                		<td><?php echo $riesgo->categoria ?></td>
		                		<td style="color: <?php echo $font ?>"><?php echo $riesgo->valoracion ?></td>
		                		<td>
		                			<a data-toggle="modal" data-target="#delete<?php echo $riesgo->id_riesgo ?>">
		                				<span class="label label-danger">X</span>
		                			</a>
	                			</td>
		                	</tr>
		                	<div class="modal fade" id="delete<?php echo $riesgo->id_riesgo ?>" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Eliminar riesgo/amenaza</h4>
										</div>
										<div class="modal-body">
											¿Está seguro que desea eliminar el riesgo/amenaza <strong><?php echo ucfirst($riesgo->denominacion) ?></strong>?<br />
											Esto probablemente afecte a las dependencias de este riesgo.
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Atras</button>
											<a href="<?php echo base_url().'index.php/continuidad/gestion_riesgos/riesgos/eliminar/'.$riesgo->id_riesgo ?>"
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
		</div>
	</div>
</div>