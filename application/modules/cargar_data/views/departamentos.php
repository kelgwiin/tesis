<div id = "page-wrapper">
	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<h1>Departamentos de la Organización</h1>
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
					Carga de los Departamentos de la Organización.</li>
				</ol>

				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Muestra una lista de todos los <strong>departamentos</strong> que se encuentran hasta el momento cargados. Además
					permite agregar nuevos  <strong>departamentos</strong> según las necesidades de la organización. De igual forma podrá
					editar la información asociada a ellos.
				</div>

				<div class="alert alert-success alert-dismissable" id = "main-componentes-ti-guardado">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					El Departamento ha sido <strong>creado</strong> con Éxito!
				</div>
		</div><!-- /col-12-->
	</div><!-- /row: breadcrumb - Cabecera-->


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
					href = "<?php echo site_url('index.php/cargar_datos/departamentos/nuevo');?>"
					data-toggle="tooltip" 
					data-original-title="Agregar nuevo Departamento"
					data-placement = "top"
					><i class = "fa fa-plus-square fa-lg"></i></a>
				</div>

				<!--campo buscar -->
				<div class="form-group ">
					<label class="sr-only" for="buscarDepartamentos">Buscar</label>
					<input type="text" class="form-control" id="buscar" name = "buscarDepartamentos" placeholder="Buscar">
				</div>
				
				<!-- lista de filtrado -->
				<div class = "form-group">
					<label class="sr-only" for="filtroDepartamentos">Filtro</label>
					<select name="filtroDepartamentos"
						 	id="filtroDepartamentos"
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
							data-original-title="Buscar Departamento(s)"
							data-placement = "top"
							id = "btn-buscar-departamento">
						<i class = "fa fa-search" ></i>
					</button>
				</div>
			</div>
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


<!-- Lista de Departamentos-->
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			
			<div class="panel panel-primary">
				<div class = "panel-heading"><!-- Outter -->
					<h3 class = "panel-title">Lista de Departamentos</h3>
				</div><!-- /panel-heading outter-->

				<div class = "panel-body">

					<div  class = "row">

						<!-- Columna IZQUIERDA -->
						<div class="col-xs-6 ">
							<!-- Departamento: dpto1 -->
							<div class="panel panel-info"><!-- Inner-->

								<div class="panel-heading">
									<div class="row">
										
										<!-- Nombre de Componente & Botones (Izquierda)-->
										<div class = "col-xs-10">
											<!-- Nombre de Componente-->
											<div class = "row">
												<div class = "col-xs-12">
													<p>Nombre Dpto</p>
												</div><!-- col-12 -->	
											</div><!-- /row -->
											
											<!-- Botones: Desplegar, editar, eliminar-->
											<div class="row">
												<div class = "col-xs-6">
													<div class="btn-group">
														<!-- Botón de despliegue-->
														<a  class="btn"
															data-id = "dpto1"
															data-fieldIT = "caracteristicas"
															data-toggle="tooltip" 
															data-original-title="Características"
															data-placement = "bottom">
															<i id = "dpto1" class = "fa fa-caret-right fa-lg"></i>	
														</a>
														<a  class="btn"
															data-id = "dpto1"
															data-fieldIT = "editar"
															data-toggle="tooltip" 
															data-original-title="Editar"
															data-placement = "bottom">
															<i class = "fa fa-pencil fa-lg"></i>	
														</a>
														<a  class="btn"
															data-id = "dpto1"
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

								<div class="panel-body hidden" data-id = "dpto1">
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

							<br>
							
						</div><!-- columna izquierda-->


						<!-- Columna DERECHA-->
						<div class="col-xs-6">
							
							<!-- Departamento: dpto2 -->
							<div class="panel panel-info"><!-- Inner-->

								<div class="panel-heading">
									<div class="row">
										
										<!-- Nombre de Componente & Botones (Izquierda)-->
										<div class = "col-xs-10">
											<!-- Nombre de Componente-->
											<div class = "row">
												<div class = "col-xs-12">
													<p>Nombre Dpto</p>
												</div><!-- col-12 -->	
											</div><!-- /row -->
											
											<!-- Botones: Desplegar, editar, eliminar-->
											<div class="row">
												<div class = "col-xs-6">
													<div class="btn-group">
														<!-- Botón de despliegue-->
														<a  class="btn"
															data-id = "dpto2"
															data-fieldIT = "caracteristicas"
															data-toggle="tooltip" 
															data-original-title="Características"
															data-placement = "bottom">
															<i id = "dpto2" class = "fa fa-caret-right fa-lg"></i>	
														</a>
														<a  class="btn"
															data-id = "dpto2"
															data-fieldIT = "editar"
															data-toggle="tooltip" 
															data-original-title="Editar"
															data-placement = "bottom">
															<i class = "fa fa-pencil fa-lg"></i>	
														</a>
														<a  class="btn"
															data-id = "dpto2"
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

								<div class="panel-body hidden" data-id = "dpto2">
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
			href = "<?php echo site_url('index.php/cargar_datos/departamentos/nuevo');?>"
			data-toggle="tooltip" 
			data-original-title="Agregar nuevo Departamento"
			data-placement = "top">
			<i class = "fa fa-plus-square fa-lg"></i> Nuevo
		</a>
	</div>
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

<!-- Direccionamiento de formularios-->
<div class = "row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<ul class="pager">
		  <!-- Boton de Componentes de TI -->
		  <li class="previous">
		  	<a	href = "<?php echo site_url('index.php/cargar_datos/componentes_ti/1');?>"
				data-toggle="tooltip"
				data-original-title="Cargar Componentes de TI"
				data-placement = "top"
		  	><i class ="fa fa-long-arrow-left"></i> <strong>Componentes de TI</strong></a>
		  </li>

		<!-- Boton de Servicios-->
		  <li class="next">
		  	<a 	href = "<?php echo site_url('index.php/cargar_datos/servicios');?>"
				data-toggle="tooltip"
				data-original-title="Cargar Servicios"
				data-placement = "top"
		  	><strong>Servicios</strong> <i class ="fa fa-long-arrow-right"></i></a>
		  </li>

		  
		</ul>
	</div>
</div>
<!-- Fin de Direccionamiento de formularios -->



</div><!-- end of: page-wrapper-->