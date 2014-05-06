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
			</div><!-- end of col-12-->
		</div><!-- end of row Cabecera-->

		<div class="row">
			<div class = "col-md-12">

				<ul class = "list-unstyled">
					<li><i class = "fa fa-angle-double-right"> </i> <a href="<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Arrendamiento');?>">
						Arrendamiento de Servicios o Activos.</a>
					
					</li>

					<li><i class = "fa fa-angle-double-right"> </i> <a href="<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Mantenimiento');?>">
						Mantenimiento de Hardware e Instalación de Sistemas.
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
												<th>Tipo</th>
												<th>Costo</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>dasd</td>
												<td>dsads</td>
												<td>dasd</td>
												<!-- acciones-->
												<td>
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
														<i class = "fa fa-eye"></i>
														</a>
													</div>

											<tr>
												<td>2</td>
												<td>dasd</td>
												<td>dsads</td>
												<td>dasd</td>
												<!-- acciones-->
												<td>
													<div class = "col-md-1">
														<a href="#" class = "btn"
														data-toggle = "tooltip"
														data-original-title = "Editar"
														>
														<i class = "fa fa-pencil"></i>
														</a>
													</div>

													<div class = "col-md-1">
														<a href="#" class = "btn"
														data-toggle = "tooltip"
														data-original-title = "Eliminar"
														>
														<i class = "fa fa-times"></i>
														</a>
													</div>

													<div class = "col-md-1">
														<a href="" ref="#" class = "btn"
														data-toggle = "tooltip"
														data-original-title = "Ver detalle"
														>	
														<i class = "fa fa-eye"></i>
														</a>
													</div>
									</td>
								</tr>

							
							</tbody>
						</table>
					</div><!-- /table-responsive-->

				</div><!-- /panel-primary-->


			</div><!-- /col-md-12-->
		</div><!-- /row -->

</div><!-- /page-wrapper -->