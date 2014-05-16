<!-- Creado el 27-04-2014 por Kelwin Gamez <kelgwiin@gmail.com> -->

<div id="page-wrapper">
	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<h1>Gestión de Costos Indirectos</h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
					Permite la Carga de los Costos Indirectos de la infraestructura de TI</li>
				</ol>

				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					En el siguiente apartado se muestran las distintas categorías que se encuentran asociadas
					a los <strong>Costos Indirectos</strong> de la Organización. Usted deberá seleccionar la que desee
					cargar.
				</div>

				<?php
				if(isset($guardado_exitoso) && $guardado_exitoso){
					echo '
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						El registro ha sido guardado con éxito.
					</div>
					';
				}
				?>

			</div><!-- end of col-12-->
		</div><!-- end of row Cabecera-->

		<div class="row">
			<div class = "col-md-12">

				<ul class = "list-unstyled">
					<li><i class = "fa fa-angle-double-right"> </i> <a href="<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Arrendamiento');?>">
						Arrendamiento de Servicios o Activos.</a>

					</li>

					<li><i class = "fa fa-angle-double-right"> </i> <a href="<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Mantenimiento');?>">
						Mantenimiento e Instalación.
					</a></li>

					<li><i class = "fa fa-angle-double-right"></i>  <a href="<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Formacion');?>">
						Formación de Personal.</a></li>

						<li><i class = "fa fa-angle-double-right"></i>  <a href= "<?php echo site_url('index.php/Costos/CargarCostosIndirectos/HonorariosProf');?>">
							Honorarios de Profesionales en el área de TI.</a></li>

							<li><i class = "fa fa-angle-double-right"></i>  <a href="<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Utileria');?>">
								Utilería.</a></li>
							</ul>

							<!-- Panel para Table - Listar Costos Indirectos -->
							<div class="panel panel-primary">
								<!-- Default panel contents -->
								<div class="panel-heading"><strong>Lista de Costos Indirectos</strong></div>

								<!-- Table -->
								<!-- Listado de Costos Indirectos -->
								<div class="table-responsive">
									<table id  = "list-costos-ind" class="table table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>Nombre</th>
												<th>Grupo</th>
												<th>Costo</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>

											<?php 
											if($costos_indirectos['num_rows'] > 0 ){
												for($i = 0; $i < $costos_indirectos['num_rows']; $i++) {
													$c = $costos_indirectos['list'][$i];

													echo '<tr>';
													printf('<td>%s</td>',$i+1);
													printf('<td>%s</td>',$c['nombre']);
													printf('<td>%s</td>',$c['grupo']);
													printf('<td>%s</td>',$c['costo']);

													echo '
													<!-- acciones-->
													<td >
													<div class = "row">
														<div class = "col-md-1">
															<a href="#" class = "btn"
															data-toggle = "tooltip"
															data-original-title = "Editar"
															>
															<i class = "fa fa-pencil negro"></i>
															</a>
														</div>

														<div class = "col-md-1">
															<a href="#" class = "btn"
															data-toggle = "tooltip"
															data-original-title = "Eliminar"
																>
															<i class = "fa fa-times rojo"></i>
															</a>
														</div>

														<div class = "col-md-1">
															<a href="" ref="#" class = "btn"
															data-toggle = "tooltip"
															data-original-title = "Ver detalle"
															>	
															<i class = "fa fa-eye verde"></i>
															</a>
														</div>
														</div>
													</td>

										';
										echo '</tr>';
									}
								}else{
									echo '<h3 class = "text-muted"> La búsqueda ha generado cero (0) resultados</h3>';
								}


								?>

								</tbody>
							</table>
						</div><!-- /table-responsive-->

					</div><!-- /panel-primary-->


				</div><!-- /col-md-12-->
			</div><!-- /row -->

</div><!-- /page-wrapper -->