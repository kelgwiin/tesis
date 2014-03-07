<div id = "page-wrapper">
	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<h1>Servicios</h1>
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
					Carga de los Servicios.</li>
				</ol>

				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Muestra una lista de todos los <strong>Servicios</strong> que se encuentran hasta el momento cargados. Además
					permite agregar nuevos  <strong>servicios</strong> según las necesidades de la organización. De igual forma podrá
					editar la información asociada a ellos.
				</div>

				<div class="alert alert-success alert-dismissable" id = "main-componentes-ti-guardado">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					El Servicio ha sido <strong>creado</strong> con Éxito!
				</div>
			</div><!-- /col-12-->
		</div><!-- /row: breadcrumb -->

<!-- Cabecera:  Buscar, filtrar, nuevo-->
	<div class="row">
		<!-- Buscar, filtrar, nuevo-->
		<div class="col-lg-6">

			<div  class="form-inline">
				<!-- Nota: Esto por lo general debería usarse con la etiqueta "form"
				pero para efectos de formtateo de la página (línea) funciona, lo uso con la
				etiqueta "div" porque me interesa tener dos botones que hagan distintas
				acciones, lo cual no podría hacer si usara la etiqueta "form"-->

				<!-- boton nuevo-->
				<div class = " form-group" >
					<a class = "btn btn-primary" 
					href = "cargar_datos/servicios/nuevo"
					data-toggle="tooltip" 
					data-original-title="Agregar nuevo Servicio"
					data-placement = "top"
					><i class = "fa fa-plus-square fa-lg"></i></a>
				</div>

				<!--campo buscar -->
				<div class="form-group ">
					<label class="sr-only" for="buscarServicios">Buscar</label>
					<input type="text" class="form-control" id="buscar" name = "buscarServicios" placeholder="Buscar">
				</div>
				
				<!-- lista de filtrado -->
				<div class = "form-group">
					<label class="sr-only" for="filtroServicios">Filtro</label>
					<select name="filtroServicios"
						 	id="filtroServicios"
						 	class="form-control"
						 	data-toggle="tooltip"
							data-original-title="Opción de filtrado"
							data-placement = "top">
						<option value="nombre">Nombre</option>
						<option value="todos">Todos</option>
					</select>
				</div>
				
				

				<!-- boton de buscar-->
				<div class = "form-group">
					<label class="sr-only" for="btnBuscar">btnBuscar</label>
					<button 
							class="btn btn-default"
							data-toggle="tooltip"
							data-original-title="Buscar Servicio(s)"
							data-placement = "top"
							id = "btn-buscar-servicio">
						<i class = "fa fa-search" ></i>
					</button>
				</div><!-- /form-group: btn Buscar-->

			<!-- checkbox de Genera Ingresos-->
				<div class = "form-group">
					
					<div class="checkbox">
						<label
						data-toggle = "tooltip"
						data-original-title = "¿El Servicio genera ingresos?">
							<input type="checkbox">
							Genera Ingresos 
						</label>
					</div><!-- /checkbox-->

				</div><!-- /form-group: Checkbox Genera Ingresos -->

			</div><!-- /form-inline-->
		</div><!-- /col-6: Buscar, filtrado, nuevo-->
		
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">	
		</div></div>
	</div><!-- /row: Cabecera: buscar, filtrar nuevo-->

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<hr>
		</div>
	</div>


<!-- Lista de Servicios-->
<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			
			<div class="panel panel-primary">
				<div class = "panel-heading"><!-- Outter -->
					<h3 class = "panel-title">Lista de Servicios</h3>
				</div><!-- /panel-heading outter-->

				<div class = "panel-body">

					<div  class = "row">

						<!-- Columna IZQUIERDA -->
						<div class="col-xs-6 ">
							<!-- Departamento: servicio1 -->
							<div class="panel panel-info"><!-- Inner-->

								<div class="panel-heading">
									<div class="row">
										
										<!-- Nombre de Componente & Botones (Izquierda)-->
										<div class = "col-xs-10">
											<!-- Nombre de Componente-->
											<div class = "row">
												<div class = "col-xs-12">
													<p>Nombre servicio</p>
												</div><!-- col-12 -->	
											</div><!-- /row -->
											
											<!-- Botones: Desplegar, editar, eliminar-->
											<div class="row">
												<div class = "col-xs-6">
													<div class="btn-group">
														<!-- Botón de despliegue-->
														<a  class="btn"
															data-id = "servicio1"
															data-fieldIT = "caracteristicas"
															data-toggle="tooltip" 
															data-original-title="Características"
															data-placement = "bottom">
															<i id = "servicio1" class = "fa fa-caret-right fa-lg"></i>	
														</a>
														<a  class="btn"
															data-id = "servicio1"
															data-fieldIT = "editar"
															data-toggle="tooltip" 
															data-original-title="Editar"
															data-placement = "bottom">
															<i class = "fa fa-pencil fa-lg"></i>	
														</a>
														<a  class="btn"
															data-id = "servicio1"
															data-fieldIT = "eliminar"
															data-toggle="tooltip" 
															data-original-title="Eliminar"
															data-placement = "bottom">
															<i class = "fa fa-times fa-lg"></i>	
														</a>

													</div><!-- /btn-group -->
												</div><!-- /col-xs-6-->

												<!-- Vacío, completar espacio-->
												<div class = "col-xs-6"></div>
											</div><!-- row -->

										</div><!-- /col-xs-10 -->


										<!-- Logotipo de Categoría (Derecha)-->
										<div class="col-xs-2">
											<i
												data-toggle="tooltip" 
												data-original-title="Categ. NomCat"
												data-placement = "top"
												class = "fa fa-laptop fa-3x"></i>
										</div>
									</div><!-- /row-->
								</div><!-- /panel-heading-->

								<div class="panel-body hidden" data-id = "servicio1">
									<!-- Etiqueta Característica -->
									<div class = "row">
										<div class = "col-xs-12">
											<h3>Características</h3>
										</div><!--/col-xs-12 -->
									</div><!-- /row-->

									<!-- Lista de CARACTERÍSTICAS-->

									<!-- Datos Básicos -->
									<div class="row">
										<div class = "col-xs-12">
											<h4> 
												<a 	class = "btn"
													data-toggle ="tooltip"
													data-original-title = "Mostrar"
													data-fieldIT = "caracteristicas-servicios"
													data-id = "datos-basicos">

													<i id = "datos-basicos" class = "fa fa-caret-right fa-lg"></i>
												</a>
												Datos Básicos
											</h4>

											<div class = "hidden" data-id = "datos-basicos">
												<ul>
													<li><p class = "text-muted">Fecha de creación</p>04-03-2014</li>
													<li><p class = "text-muted">Descripción</p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
													<li><p class = "text-muted">Tipo de Servicio</p>Usuario/Sistema</li>
													<li><p class = "text-muted">Genera Ingresos</p> xxx cantidad de ingresos</li>
												</ul>

												<hr>
											</div><!-- /datos-basicos-->

										</div><!-- /col-12 -->	
									</div><!-- /row: Datos Básicos -->


									<!-- Cronograma Estimado de Ejecución  -->
									<div class="row">
										<div class = "col-xs-12">
											<h4> 
												<a 	class = "btn"
													data-toggle ="tooltip"
													data-original-title = "Mostrar"
													data-fieldIT = "caracteristicas-servicios"
													data-id = "cronograma-estimado-ejecucion">

													<i id = "cronograma-estimado-ejecucion" class = "fa fa-caret-right fa-lg"></i>
												</a>
												Cronograma estimado de ejecución
											</h4>
											<!-- Tabla con el cronograma -->
											<div class = "hidden" data-id = "cronograma-estimado-ejecucion" >

												<table class="table table-condensed table-hover">
													<thead>
														<tr>
															<th>Descripción</th>
															<th>Desde</th>
															<th>Hasta</th>
															<th>Operación/Comando</th>
														</tr>
													</thead>

													<tbody>
														<tr>
															<td>sdfdsf</td>
															<td>fsdfsdf</td>
															<td>sdfsdf</td>
															<!-- Lista de Operaciones/Comandos-->
															<td>
																<a  class="btn"
																data-id = "comandos-operaciones1"
																data-fieldIT = "comandos-operaciones"
																data-toggle="tooltip" 
																data-original-title="Comandos y Operaciones"
																data-placement = "bottom">
																<i id = "comandos-operaciones1" class = "fa fa-caret-right fa-lg"></i>	
															</a>
															<ul data-id = "comandos-operaciones1" class = "hidden">
																<li>Comando y Operación</li>
																<li>Comando y Operación</li>
																<li>Comando y Operación</li>
															</ul>
															</td><!-- /Celda: Operaciones/Comandos-->
														</tr>

														<tr>
														<td>sdfdsf</td>
														<td>fsdfsdf</td>
														<td>sdfsdf</td>
														<!-- Lista de Operaciones/Comandos-->
														<td>
															<a  class="btn"
															data-id = "comandos-operaciones2"
															data-fieldIT = "comandos-operaciones"
															data-toggle="tooltip" 
															data-original-title="Comandos y Operaciones"
															data-placement = "bottom">
															<i id = "comandos-operaciones2" class = "fa fa-caret-right fa-lg"></i>	
														</a>
														<ul data-id = "comandos-operaciones2" class = "hidden">
															<li>Comando y Operación</li>
															<li>Comando y Operación</li>
															<li>Comando y Operación</li>
														</ul>
														</td><!-- /Celda: Operaciones/Comandos-->
														</tr>
													</tbody>
												</table>

												<hr>
											</div><!--/tabla: Cronograma de Ejecución -->

										</div><!-- /col-12 -->	

									</div><!-- /row: Cronograma Estimado de Ejecución --><!-- Cronograma Estimado de Ejecución  -->


									<!-- Umbrales-->
									<div class="row">
										<div class = "col-xs-12">
											<h4> 
												<a 	class = "btn"
													data-toggle ="tooltip"
													data-original-title = "Mostrar"
													data-fieldIT = "caracteristicas-servicios"
													data-id = "umbrales">

													<i id = "umbrales" class = "fa fa-caret-right fa-lg"></i>
												</a>
												Umbrales
											</h4>

											<!-- Tabla de Umbrales -->
											<div class = "hidden" data-id = "umbrales">
												<table class="table table-condensed table-hover">
													<thead>
														<tr>
															<th>Descripción</th>
															<th>Tiempo A.</th>
															<th>Valor</th>
															<th>Medida</th>
														</tr>
													</thead>

													<tbody>
														<tr>
															<td>sdfdsf</td>
															<td>fsdfsdf</td>
															<td>sdfsdf</td>
															<td>sdfsdf</td>

														</tr>

														<tr>
															<td>sdfdsf</td>
															<td>fsdfsdf</td>
															<td>sdfsdf</td>
															<td>kfds fdf d</td>
													</tr>
													</tbody>
												</table>
											</div><!-- /umbrales-->
										</div><!-- /col-12 -->	
									</div><!-- /row: Umbrales -->


								</div><!-- /panel-body -->
							</div> <!-- panel-info -->

							<br>
							

						</div><!-- Columna IZQUIERDA-->


						<!-- Columna DERECHA-->
						<div class="col-xs-6">
							
							<!-- Departamento: servicio2 -->
							<div class="panel panel-info"><!-- Inner-->

								<div class="panel-heading">
									<div class="row">
										
										<!-- Nombre de Componente & Botones (Izquierda)-->
										<div class = "col-xs-10">
											<!-- Nombre de Componente-->
											<div class = "row">
												<div class = "col-xs-12">
													<p>Nombre servicio</p>
												</div><!-- col-12 -->	
											</div><!-- /row -->
											
											<!-- Botones: Desplegar, editar, eliminar-->
											<div class="row">
												<div class = "col-xs-6">
													<div class="btn-group">
														<!-- Botón de despliegue-->
														<a  class="btn"
															data-id = "servicio2"
															data-fieldIT = "caracteristicas"
															data-toggle="tooltip" 
															data-original-title="Características"
															data-placement = "bottom">
															<i id = "servicio2" class = "fa fa-caret-right fa-lg"></i>	
														</a>
														<a  class="btn"
															data-id = "servicio2"
															data-fieldIT = "editar"
															data-toggle="tooltip" 
															data-original-title="Editar"
															data-placement = "bottom">
															<i class = "fa fa-pencil fa-lg"></i>	
														</a>
														<a  class="btn"
															data-id = "servicio2"
															data-fieldIT = "eliminar"
															data-toggle="tooltip" 
															data-original-title="Eliminar"
															data-placement = "bottom">
															<i class = "fa fa-times fa-lg"></i>	
														</a>

													</div><!-- /btn-group -->
												</div><!-- /col-xs-6-->

												<!-- Vacío, completar espacio-->
												<div class = "col-xs-6"></div>
											</div><!-- row -->

										</div><!-- /col-xs-10 -->


										<!-- Logotipo de Categoría (Derecha)-->
										<div class="col-xs-2">
											<i
												data-toggle="tooltip" 
												data-original-title="Categ. NomCat"
												data-placement = "top"
												class = "fa fa-laptop fa-3x"></i>
										</div>
									</div><!-- /row-->
								</div><!-- /panel-heading-->

								<div class="panel-body hidden" data-id = "servicio2">
									<!-- Etiqueta Característica -->
									<div class = "row">
										<div class = "col-xs-12">
											<h3>Características</h3>
										</div><!--/col-xs-12 -->
									</div><!-- /row-->

									<!-- Lista de características-->
									<div class="row">
										<div class = "col-xs-12">
											<ul>
												<li><p class = "text-muted">Descripción</p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
											</ul>
										</div>	
									</div>

									<div class = "row">
										<div class = "col-xs-12">
											<ul>
												<li><p class = "text-muted">Fecha de Creación</p> 02/02/2032</li>
												<li>
													<p class = "text-muted"><strong>Componentes de TI</strong></p> 
														<ul>
														    <li>Comp1</li>
														    <li>Comp2</li>
														    <li>Comp3</li>
														    <li>Comp4</li>
														    <li>Comp5</li>
														</ul>
												</li>
											</ul>
										</div>

									</div><!-- /row-->	


								</div><!-- /panel-body -->
							</div> <!-- panel-info -->

						</div><!-- columna Derecha-->



					</div><!-- inner row-->

				</div><!-- /panel-body-->			
			</div><!-- /panel info-->

		</div><!-- /col 12-->
</div><!-- /row panel principal-->

<!-- Boton Nuevo -->
<div class="row">
	<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
		<a class = "btn btn-primary" 
			href = "cargar_datos/servicios/nuevo"
			data-toggle="tooltip" 
			data-original-title="Agregar nuevo Servicio"
			data-placement = "top">
			<i class = "fa fa-plus-square fa-lg"></i> Nuevo
		</a>
	</div><!-- /col-1 -->
	<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11"></div><!-- Vacío-->
</div><!-- /row: btn Nuevo-->


<!-- Paginación-->
<div class="row">
	<div class="col-xs-4 col-sm-12 col-md-4 col-lg-4 col-md-offset-4">
		<ul class="pagination">
		<li class = "disabled"><a href="#"><i class = "fa fa-backward"></i></a></li>
			<li class = "active"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
		<li><a href="#"><i class = "fa fa-forward"></i></a></li>
		</ul>
	</div><!-- /col-4 -->
</div><!-- /row: Paginación -->

<br><br>

<!-- Direccionamiento de formularios-->
<div class="row">
	<div class="col-lg-4">
		<!-- Boton de Departametos-->
		<a 	class = "btn btn-default" 
			href = "<?php echo site_url('cargar_datos/departamentos');?>"
			
			data-toggle="tooltip"
			data-original-title="Cargar Departamentos"
			data-placement = "top"
		>
			Departamentos
			<i class = "fa fa-chevron-circle-left fa-2x"></i>
		</a>
	</div><!-- end of col 12 -->
</div><!-- end of: row Direccionamiento de formularios -->

</div><!-- end of: page-wrapper-->