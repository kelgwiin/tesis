<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Gestión de Continuidad del Negocio</h1>
			<?php echo $breadcrumbs ?>
			<h3>Listado de categorías de riesgos y amenazas</h3>
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
		<div class="col-lg-3" style="left: 51px">
			<a href="<?php echo base_url() ?>index.php/continuidad/gestion_riesgos/categorias/crear" class="btn btn-success">
				<i class="fa fa-plus"></i> Agregar nueva categoria</a>
		</div>
	</div>
	
	<div class="row" style="margin-top: 25px">
		<div class="col-lg-12">
			<div class="table-responsive">
	            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                <thead>
	                    <tr>
	                        <th>Tipo de amenaza <i class="fa fa-sort"></i></th>
	                        <th>Descripción <i class="fa fa-sort"></i></th>
	                        <th>Eliminar</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	<?php foreach($categorias as $key => $categoria) : ?>
	                		<tr>
		                		<td>
		                			<a href="<?php echo base_url().'index.php/continuidad/gestion_riesgos/categorias/modificar/'.$categoria->id_categoria ?>"
		                				data-toggle="tooltip" data-original-title="Click para ver o modificar esta categoría">
		                				<?php echo ucfirst($categoria->categoria) ?>
		                			</a>
		                		</td>
		                		<td><?php echo character_limiter($categoria->descripcion,80) ?></td>
		                		<td>
		                			<a data-toggle="modal" data-target="#delete<?php echo $categoria->id_categoria ?>">
		                				<span class="label label-danger">X</span>
		                			</a>
		                		</td>
		                	</tr>
		                	<div class="modal fade" id="delete<?php echo $categoria->id_categoria ?>" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Eliminar categoría</h4>
										</div>
										<div class="modal-body">
											¿Está seguro que desea eliminar la categoría <strong><?php echo ucfirst($categoria->categoria) ?></strong>?<br />
											Esto probablemente afecte a los riesgos que se encuentran dentro de esta categoría.<br />
											Al eliminar una categoría, se <strong>eliminarán</strong> los riesgos y amenazas y los Planes de Continuidad del Negocio ligados a la categoría en cuestión.<br />
											Por favor proceda con cautela.
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Atras</button>
											<a href="<?php echo base_url().'index.php/continuidad/gestion_riesgos/categorias/eliminar/'.$categoria->id_categoria ?>"
												type="button" class="btn btn-danger">
												Eliminar
											</a>
										</div>
									</div>
								</div>
							</div>
	                	<?php endforeach; ?>
	                </tbody>
				</table>
			</div>
		</div>
	</div>
</div>