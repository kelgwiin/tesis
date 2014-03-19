<div id = "page-wrapper">
<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<h1>Componentes de TI </h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
					Carga de los componentes de tecnología de información (TI) de la organización.</li>
			</ol>

			<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Muestra una lista de todos los <strong>Componentes de TI</strong> que se encuentran hasta el momento cargados. Además
					permite agregar nuevos componentes según las necesidades de la organización. De igual forma podrá
					editar la información asociada a ellos.
			</div>

			<div
				<?php
					if(isset($guardado_exitoso) && $guardado_exitoso){
						echo 'class="alert alert-success alert-dismissable show"';
					}else{
						echo 'class="alert alert-success alert-dismissable hidden"';
					}
				?> 
				id = "msj-componente-ti-guardado">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				El Componente de TI ha sido <strong>creado</strong> con Éxito!
			</div>

			<!-- Mensaje de Error Inesperado -->
			<div class="alert alert-danger alert-dismissable hidden" id = "msj-error-inesperado-basico">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Ha ocurrido un error <strong>inesperado</strong>.
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
					href = "<?php echo site_url('index.php/cargar_datos/componentes_ti/nuevo');?>"
					data-toggle="tooltip" 
					data-original-title="Agregar nuevo componente de TI"
					data-placement = "top"
					><i class = "fa fa-plus-square fa-lg"></i></a>
				</div>

				<!--campo buscar -->
				<div class="form-group ">
					<label class="sr-only" for="buscarComponentesTI">Buscar</label>
					<input type="text" class="form-control" id="buscar" name = "buscarComponentesTI" placeholder="Buscar">
				</div>
				
				<!-- lista de filtrado -->
				<div class = "form-group">
					<label class="sr-only" for="filtroComponentesTI">Filtro</label>
					<select name="filtroComponentesTI"
						 	id="filtroComponentesTI"
						 	class="form-control"
						 	data-toggle="tooltip"
							data-original-title="Opción de filtrado"
							data-placement = "top">
						<option>Todos</option>
						<option value="nombre">Nombre</option>
						<option value="categoria">Categoría</option>
					</select>
				</div>

				<!-- boton de buscar-->
				<div class = "form-group">
					<label class="sr-only" for="btnBuscar">btnBuscar</label>
					<button 
							class="btn btn-default"
							data-toggle="tooltip"
							data-original-title="Buscar Componente(s) de TI"
							data-placement = "top"
							id = "btn-buscar-componente-ti">
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

	<!-- Lista de Componentes de TI-->
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			
			<div class="panel panel-primary">
				<div class = "panel-heading"><!-- Outter -->
					<h3 class = "panel-title">Lista de Componentes de TI</h3>
				</div><!-- /panel-heading outter-->

				<div class = "panel-body">
				<!-- Columna IZQUIERDA -->
					<div  class = "row">
						<div class="col-xs-6 ">
							<!-- Componente: comp1 -->
							<div class="panel panel-info"><!-- Inner-->

								<div class="panel-heading">
									<div class="row">
										
										<!-- Nombre de Componente & Botones (Izquierda)-->
										<div class = "col-xs-10">
											<!-- Nombre de Componente-->
											<div class = "row">
												<div class = "col-xs-12">
													<p>Nombre Componente</p>
												</div><!-- col-12 -->	
											</div><!-- /row -->
											
											<!-- Botones: Desplegar, editar, eliminar-->
											<div class="row">
												<div class = "col-xs-6">
													<div class="btn-group">
														<!-- Botón de despliegue-->
														<a  class="btn"
															data-id = "comp1"
															data-fieldIT = "caracteristicas"
															data-toggle="tooltip" 
															data-original-title="Características"
															data-placement = "bottom">
															<i id = "comp1" class = "fa fa-caret-right fa-lg"></i>	
														</a>
														<a  class="btn"
															data-id = "comp1"
															data-fieldIT = "editar"
															data-toggle="tooltip" 
															data-original-title="Editar"
															data-placement = "bottom">
															<i class = "fa fa-pencil fa-lg"></i>	
														</a>
														<a  class="btn"
															data-id = "comp1"
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

								<div class="panel-body hidden" data-id = "comp1">
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
										<div class = "col-xs-6">
											<ul>
												<li><p class = "text-muted">Fecha de Compra</p> 02/02/2032</li>
												<li><p class = "text-muted">Fecha de Creación</p> 02/02/2032</li>
												<li><p class = "text-muted">Fecha de Elaboración</p> 02/02/2032</li>
												<li><p class = "text-muted">Tiempo de Vida</p> 123 (Unidad de tiempo de vida)</li>
											</ul>
										</div>
										
										<div class = "col-xs-6">
											<ul>
												<li><p class = "text-muted">Precio</p> 12212 bs</li>
												<li><p class = "text-muted">Capacidad</p> 3424 (Unidad medida capacidad abbr)</li>
												<li><p class = "text-muted">Cantidad</p> 123</li>
											</ul>
										</div>
										

									</div><!-- /row-->	


								</div><!-- /panel-body -->
							</div> <!-- panel-info -->

							<br>

							<!-- Componente: comp2-->
							<div class="panel panel-info"><!-- Inner-->

								<div class="panel-heading">
									<div class="row">
										
										<!-- Nombre de Componente & Botones (Izquierda)-->
										<div class = "col-xs-10">
											<!-- Nombre de Componente-->
											<div class = "row">
												<div class = "col-xs-12">
													<p>Nombre Componente</p>
												</div><!-- col-12 -->	
											</div><!-- /row -->
											
											<!-- Botones: Desplegar, editar, eliminar-->
											<div class="row">
												<div class = "col-xs-6">
													<div class="btn-group">
														<!-- Botón de despliegue-->
														<a  class="btn"
															data-id = "comp2"
															data-fieldIT = "caracteristicas"
															data-toggle="tooltip" 
															data-original-title="Características"
															data-placement = "bottom">
															<i id = "comp2" class = "fa fa-caret-right fa-lg"></i>	
														</a>
														<a  class="btn"
															data-id = "comp2"
															data-fieldIT = "editar"
															data-toggle="tooltip" 
															data-original-title="Editar"
															data-placement = "bottom">
															<i class = "fa fa-pencil fa-lg"></i>	
														</a>
														<a  class="btn"
															data-id = "comp2"
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

								<div class="panel-body hidden" data-id = "comp2">
									<!-- Etiqueta Característica -->
									<div class = "row">
										<div class = "col-xs-12">
											<h3>Características</h3>
										</div><!--/col-xs-12 -->
									</div><!-- /row-->

									<!-- Lista de características-->	
									<div class = "row">
										<div class = "col-xs-6">
											<ul>
												<li><p class = "text-muted">Fecha</p> 02/02/2032</li>
												<li><p class = "text-muted">Capacidad</p> 25</li>
												<li><p class = "text-muted">Descripción</p> sdfdfdfdfd</li>
											</ul>
										</div>
										
										<div class = "col-xs-6">
											<ul>
												<li><p class = "text-muted">Fecha</p> 02/02/2032</li>
												<li><p class = "text-muted">Capacidad</p> 25</li>
												<li><p class = "text-muted">Descripción</p> sdfdfdfdfd</li>
											</ul>
										</div>
										


									</div><!-- /row-->	


								</div><!-- /panel-body -->
							</div> <!-- panel-info -->

							<br>

							<!-- Componente: comp3-->
							<div class="panel panel-info"><!-- Inner-->

								<div class="panel-heading">
									<div class="row">
										
										<!-- Nombre de Componente & Botones (Izquierda)-->
										<div class = "col-xs-10">
											<!-- Nombre de Componente-->
											<div class = "row">
												<div class = "col-xs-12">
													<p>Nombre Componente</p>
												</div><!-- col-12 -->	
											</div><!-- /row -->
											
											<!-- Botones: Desplegar, editar, eliminar-->
											<div class="row">
												<div class = "col-xs-6">
													<div class="btn-group">
														<!-- Botón de despliegue-->
														<a  class="btn"
															data-id = "comp3"
															data-fieldIT = "caracteristicas"
															data-toggle="tooltip" 
															data-original-title="Características"
															data-placement = "bottom">
															<i id = "comp3" class = "fa fa-caret-right fa-lg"></i>	
														</a>
														<a  class="btn"
															data-id = "comp3"
															data-fieldIT = "editar"
															data-toggle="tooltip" 
															data-original-title="Editar"
															data-placement = "bottom">
															<i class = "fa fa-pencil fa-lg"></i>	
														</a>
														<a  class="btn"
															data-id = "comp3"
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

								<div class="panel-body hidden" data-id = "comp3">
									<!-- Etiqueta Característica -->
									<div class = "row">
										<div class = "col-xs-12">
											<h3>Características</h3>
										</div><!--/col-xs-12 -->
									</div><!-- /row-->

									<!-- Lista de características-->	
									<div class = "row">
										<div class = "col-xs-6">
											<ul>
												<li><p class = "text-muted">Fecha</p> 02/02/2032</li>
												<li><p class = "text-muted">Capacidad</p> 25</li>
												<li><p class = "text-muted">Descripción</p> sdfdfdfdfd</li>
											</ul>
										</div>
										
										<div class = "col-xs-6">
											<ul>
												<li><p class = "text-muted">Fecha</p> 02/02/2032</li>
												<li><p class = "text-muted">Capacidad</p> 25</li>
												<li><p class = "text-muted">Descripción</p> sdfdfdfdfd</li>
											</ul>
										</div>
										
									</div><!-- /row-->	


								</div><!-- /panel-body -->
							</div> <!-- panel-info -->

						</div><!-- columna Izquierda-->


						<!-- Columna DERECHA-->
						<div class="col-xs-6">
							
							<div class="panel panel-info"><!-- Inner-->

								<div class="panel-heading">
									<div class="row">
										
										<!-- Nombre de Componente & Botones (Izquierda)-->
										<div class = "col-xs-10">
											<!-- Nombre de Componente-->
											<div class = "row">
												<div class = "col-xs-12">
													<p>Nombre Componente</p>
												</div><!-- col-12 -->	
											</div><!-- /row -->
											
											<!-- Botones: Desplegar, editar, eliminar-->
											<div class="row">
												<div class = "col-xs-6">
													<div class="btn-group">
														<!-- Botón de despliegue-->
														<a  class="btn"
															data-id = "comp4"
															data-fieldIT = "caracteristicas"
															data-toggle="tooltip" 
															data-original-title="Características"
															data-placement = "bottom">
															<i id = "comp4" class = "fa fa-caret-right fa-lg"></i>	
														</a>
														<a  class="btn"
															data-id = "comp4"
															data-fieldIT = "editar"
															data-toggle="tooltip" 
															data-original-title="Editar"
															data-placement = "bottom">
															<i class = "fa fa-pencil fa-lg"></i>	
														</a>
														<a  class="btn"
															data-id = "comp4"
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

								<div class="panel-body hidden" data-id = "comp4">
									<!-- Etiqueta Característica -->
									<div class = "row">
										<div class = "col-xs-12">
											<h3>Características</h3>
										</div><!--/col-xs-12 -->
									</div><!-- /row-->

									<!-- Lista de características-->	
									<div class = "row">
										<div class = "col-xs-6">
											<ul>
												<li><p class = "text-muted">Fecha</p> 02/02/2032</li>
												<li><p class = "text-muted">Capacidad</p> 25</li>
												<li><p class = "text-muted">Descripción</p> sdfdfdfdfd</li>
											</ul>
										</div>
										
										<div class = "col-xs-6">
											<ul>
												<li><p class = "text-muted">Fecha</p> 02/02/2032</li>
												<li><p class = "text-muted">Capacidad</p> 25</li>
												<li><p class = "text-muted">Descripción</p> sdfdfdfdfd</li>
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

	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
			<a class = "btn btn-primary" 
					href = "<?php echo site_url('index.php/cargar_datos/componentes_ti/nuevo');?>"
					data-toggle="tooltip" 
					data-original-title="Agregar nuevo componente de TI"
					data-placement = "top">
			<i class = "fa fa-plus-square fa-lg"></i> Nuevo
			</a>
		</div>
		<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
		</div>
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
</div><!-- /row: Paginación-->

<br><br>

<!-- Direccionamiento de formularios-->
<div class="row">
	<div class="col-lg-4">
		<!-- Boton de Cargar Datos Básicos-->
		<a 	class = "btn btn-default" 
			href = "<?php echo site_url('index.php/cargar_datos/basico');?>"
			
			data-toggle="tooltip"
			data-original-title="Cargar Datos Básicos"
			data-placement = "top"
		>
			Básico 
			<i class = "fa fa-chevron-circle-left fa-2x"></i>
		</a>

		<!-- Boton de Departamentos -->
		<a 	class = "btn btn-default" 
			href = "<?php echo site_url('index.php/cargar_datos/departamentos');?>"
			
			data-toggle="tooltip"
			data-original-title="Cargar Departamentos"
			data-placement = "top"
		>
			<i class = "fa fa-chevron-circle-right fa-2x"></i>
			Departamentos
		</a>
		
	</div><!-- end of col 12 -->
</div><!-- end of: row Direccionamiento de formularios -->
<!-- Fin de Direccionamiento de formularios -->

</div><!-- end of: page wrapper -->




