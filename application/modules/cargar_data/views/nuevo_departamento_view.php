<div id = "page-wrapper">
	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12 col-md-12">
			<h1>Nuevo <small>Departamento de la Organización</small></h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
					Agregando un nuevo de departamento a la Infraestructura</li>
				</ol>

				<div class="alert alert-danger alert-dismissable hidden" id = "msj-error-componentes-ti" >
					<button  type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Error, no ha ingresado valores en alguno de los campos obligatorios.
				</div>
			</div><!-- end of col-12-->
		</div><!-- end of row Cabecera-->

	<!-- Formulario -->
<form id = "fr-nuevo-dpto" class = "form-horizontal" action="<?php echo site_url('index.php/cargar_datos/departamentos/guardar');?>" method="POST" role="form">
		<!-- Panel -->
		<div class = "row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				

				<div class = "panel panel-default">
					<div class = "panel-body">
						<h3 class = "text-primary"> Datos Básicos</h3> <hr>
						<!-- Nombre -->
						<div class="form-group" id = "fg-nombre-dpto">
							<label for="nombre" class="col-sm-2 control-label">Nombre</label>
							
							<div class="col-sm-9">
								<input type="text" class="form-control" id="nombre-dpto" 
									name = "nombre" placeholder="Nombre de Departamento" required = "required">
							</div><!-- col-9-->

							<div class = "col-md-1 hidden" id = "icon-nombre-dpto">
								<i class = "fa fa-times text-danger "></i>
							</div><!-- /col-1: Icono-->

						</div><!-- /form-group: Nombre-->

						<!-- Descripción-->
						<div class="form-group" id = "fg-descripcion-dpto">
							<label for="nombre" class="col-sm-2 control-label">
								Descripción
							</label>
							<div class="col-sm-9">
								<textarea name = "descripcion" id = "descripcion-dpto" class="form-control" rows="3"
								required = "required"
								></textarea>
							</div><!-- /col-9-->
							
							<div class = "col-md-1 hidden" id = "icon-descripcion-dpto">
								<i class = "fa fa-times text-danger"></i>
							</div><!-- /col-1: Icono-->	

						</div><!-- /form-group: Descripción-->

						<!-- Ícono de dpto. -->
						<div class="form-group">
								<label 
								for="icono" 
								class="col-sm-2 control-label"
								data-toggle = "tooltip"
								data-original-title = "Escoja un ícono "
								data-placement = "top">
								Ícono
							</label>

							<div class="col-sm-10">
								<div class="btn-group">
									<button data-icono = "icono" type="button" data-select = "si" class="btn btn-info" data-icofa = "fa-archive" ><i class = "fa fa-archive fa-2x"></i></button>
									<button data-icono = "icono" type="button" data-select = "no" class="btn btn-info" data-icofa = "fa-building-o"><i class = "fa fa-building-o fa-2x"></i></button>
									<button data-icono = "icono" type="button" data-select = "no" class="btn btn-info" data-icofa = "fa-desktop"><i class = "fa fa-desktop fa-2x"></i></button>
									<button data-icono = "icono" type="button" data-select = "no" class="btn btn-info" data-icofa = "fa-cog"><i class = "fa fa-cog fa-2x"></i></button>
									<button data-icono = "icono" type="button" data-select = "no" class="btn btn-info" data-icofa = "fa-cogs"><i class = "fa fa-cogs fa-2x"></i></button>
									<button data-icono = "icono" type="button" data-select = "no" class="btn btn-info" data-icofa = "fa-gavel"><i class = "fa fa-gavel fa-2x"></i></button>
									<button data-icono = "icono" type="button" data-select = "no" class="btn btn-info" data-icofa = "fa-keyboard-o"><i class = "fa fa-keyboard-o fa-2x"></i></button>
									<button data-icono = "icono" type="button" data-select = "no" class="btn btn-info" data-icofa = "fa-phone"><i class = "fa fa-phone fa-2x"></i></button>
									<button data-icono = "icono" type="button" data-select = "no" class="btn btn-info" data-icofa = "fa-suitcase"><i class = "fa fa-suitcase fa-2x"></i></button>
									<button data-icono = "icono" type="button" data-select = "no" class="btn btn-info" data-icofa = "fa-sitemap"><i class = "fa fa-sitemap fa-2x"></i></button>
									<button data-icono = "icono" type="button" data-select = "no" class="btn btn-info" data-icofa = "fa-tasks"><i class = "fa fa-tasks fa-2x"></i></button>
									<button data-icono = "icono" type="button" data-select = "no" class="btn btn-info" data-icofa = "fa-shield"><i class = "fa fa-shield fa-2x"></i></button>
									<button data-icono = "icono" type="button" data-select = "no" class="btn btn-info" data-icofa = "fa-laptop"><i class = "fa fa-laptop fa-2x"></i></button>
								</div>

							</div><!-- /col-10-->
							
							

						</div><!-- /form-group: Ícono-->

						<!-- Lista de Componentes para copiar-->
						<h3 class = "text-primary">Lista de Componentes de TI Asignables al Departamento</h3> <hr>
						<div class = "row">
							<div class = "col-md-12 ">
								<div class="panel panel-info">
									
									<div class="panel-body">
										<div class = "row">
											<div class = "col-md-4 col-md-offset-1">
												<div class = "form-group">
													<select id = "all-componentes-ti-dpto" size = "15" multiple class="form-control"  >
														<?php
															foreach ($list_comp_ti as $row) {
																printf('<option value = "%d">%s</option>',$row['id'],$row['nombre']);
															}
														?>
													</select>
													<span class = "help-block">Todos los Componentes de TI </span>
												</div><!-- /form-group: all-componentes-ti-dpto -->
											</div><!-- /col-4: Todos los Componentes de TI -->

											<div class = "col-md-2">
												<center>
												<div style = "margin-top:70px">
													<button 
														type="button"
														id = "add-comp-ti-dpto"
														class="btn btn-primary"
														data-toggle = "tooltip"
														data-original-title = "Agregar Componente al Dpto."
														data-placement = "top"
														>
														
														<i class = "fa fa-arrow-right fa-lg"></i>

													</button>
													<br><br>

													<button 
														type="button"
														id = "rm-comp-ti-dpto"
														class="btn btn-primary"
														data-toggle = "tooltip"
														data-original-title = "Remover Componente del Dpto."
														data-placement = "bottom"
														>
														
														<i class = "fa fa-arrow-left fa-lg"></i>

													</button>
												</div>
												</center>
											</div><!-- col-1: Botones de adicionar los componentes -->

											<!-- Lista de Componentes Copiados -->
											<div class = "col-md-4">
												<div class = "form-group" id = "fg-copied-componentes-ti-dpto">
													<select id = "copied-componentes-ti-dpto" size = "15" multiple class="form-control"  >
														<!-- Se llena desde jquery -->
														<!-- <option value = "1">Componente 1</option>
														<option value = "2">Componente 2</option> -->
													</select>
													<span class = "help-block">Componentes asignados al Departamento </span>
												</div><!-- /form-group-->
											</div>

											<div class = "col-md-1 hidden" id = "icon-copied-componentes-ti-dpto">
												<i class = "fa fa-times text-danger"></i>
											</div><!-- /col-1: Icono-->	

										</div><!--/row: inner lista de componentes -->
									</div>
								</div>		
							</div><!-- /col-->
						</div><!-- /row -->
						
						
						<!-- Boton Guardar-->
						<div class="row">
							<div class="col-xs-2 col-sm-2 col-md-1 col-lg-1">
								<button id = "btn-guardar-dpto" type="submit" class="btn btn-primary">Guardar</button>
							</div>

						</form><!-- /formulario -->

							<!-- Boton Cancelar-->
							<div class="col-xs-2 col-sm-2 col-md-1 col-lg-1">
								<a href = "<?php echo site_url('index.php/cargar_datos/departamentos'); ?>" class="btn btn-primary">Cancelar</a>
							</div>
								
							<div class="col-xs-8 col-sm-8 col-md-11 col-lg-11"><!-- Vacío -->
							</div>

						</div>


					</div><!-- /panel-body -->
				</div><!-- /panel-default-->
			</div><!-- /col-12: Panel -->
		</div><!-- /row: Panel -->



</div><!-- /page-wrapper-->