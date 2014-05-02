<!-- Creado el 30-04-2014 por Kelwin Gamez <kelgwiin@gmail.com> -->
<div id="page-wrapper">
	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<h1>Gestión de Costos Indirectos <small>Mantenimiento</small></h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
					Permite la Carga de los Costos Indirectos de la infraestructura de TI</li>
				</ol>


			</div><!-- end of col-12-->
		</div><!-- end of row Cabecera-->

		<div class="row">
			<div class = "col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<form class = "form-horizontal">
								<!-- DATOS BÁSICOS -->
								<div class = "col-md-8">
									<fieldset>
										<!-- Form Name -->
										<!-- MANTENIMIETO -->
										<legend>Datos Básicos</legend>

										<!-- Select Basic -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="tipo_operacion">Tipo de Operación</label>
											<div class="col-md-4">
												<select id="tipo_operacion" name="tipo_operacion" class="form-control">
													<option value="mantenimiento">Mantenimiento</option>
													<option value="instalacion">Instalación</option>
												</select>
											</div>
										</div>

										<!-- Appended Input-->
										<div class="form-group">
											<label class="col-md-4 control-label" for="costo">Costo</label>
											<div class="col-md-4">
												<div class="input-group">
													<input id="costo" name="costo" class="form-control" placeholder="Costo" type="text" required="">
													<span class="input-group-addon">Bs.</span>
												</div>

											</div>
										</div>
										<!-- Text input-->
										<div class="form-group">
											<label class="col-md-4 control-label" for="fecha">Fecha</label>  
											<div class="col-md-4">
												<input id="fecha" name="fecha" type="text" placeholder="Fecha de mantenimiento" class="form-control input-md" required="">

											</div>
										</div>

										<!-- Select Basic -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="departamento">Departamento</label>
											<div class="col-md-4">
												<select id="departamento" name="departamento" class="form-control">
													<option value="1">dpto1</option>
													<option value="2">dpto2</option>
													<option value="3">dpto3</option>
												</select>
											</div>
										</div>

										<!-- Select Basic -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="categoria">Categoría</label>
											<div class="col-md-4">
												<select id="categoria" name="categoria" class="form-control">
													<option value="1">categ</option>
													<option value="2">categ1</option>
													<option value="-1">No Aplica</option>
												</select>
											</div>
										</div>

										<!-- Textarea -->
										<div class="form-group">
										  <label class="col-md-4 control-label" for="descripcion">Descripción</label>
										  <div class="col-md-4">                     
										    <textarea class="form-control" id="descripcion" name="descripcion" required = "required">Descripción</textarea>	
										  </div>
										</div>

									</fieldset>

									<!-- DATOS DE ENCARGADO DE MANTENIMIENTO-->
									<fieldset>
										<!-- Form Name -->
										<legend>Encargado de Matenimiento o Instalción </legend>

										<!-- Text input-->
										<div class="form-group">
											<label class="col-md-4 control-label" for="nombre">Nombre</label>  
											<div class="col-md-4">
												<input id="nombre" name="nombre" type="text" placeholder="nombre" class="form-control input-md" required="">

											</div>
										</div>


										<!-- Text input-->
										<div class="form-group">
											<label class="col-md-4 control-label" for="apellido"></label>  
											<div class="col-md-4">
												<input id="apellido" name="apellido" type="text" placeholder="apellido" class="form-control input-md" required="">

											</div>
										</div>

										<!-- Text input-->
										<div class="form-group">
											<label class="col-md-4 control-label" for="coreo">Correo</label>  
											<div class="col-md-4">
												<input id="coreo" name="coreo" type="text" placeholder="correo electrónico" class="form-control input-md" required="">

											</div>
										</div>

										<!-- Text input-->
										<div class="form-group">
											<label class="col-md-4 control-label" for="telefono">Teléfono</label>  
											<div class="col-md-4">
												<input id="telefono" name="telefono" type="tel" placeholder="teléfono" class="form-control input-md" required="">

											</div>
										</div>

										<!-- Button  - Guardar -->
										<div class="form-group">
										  <label class="col-md-4 control-label" for="guardar"></label>
										  <div class="col-md-4">
										    <button id="guardar" name="guardar" class="btn btn-primary">Guardar</button>
										  </div>
										</div>

									</fieldset><!-- Encargado de Mantenimiento y/o Instalación -->



								</div>

							</form>
						</div><!-- /row inner-->
					</div><!-- /panel-body -->

				</div><!-- /panel-default-->
			</div><!-- /col-md-12 -->
		</div><!-- /row-->

		<!-- Direccionamiento de formularios-->
		<div class = "row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<ul class="pager">
					<!-- Boton de Arrendamiento de Servicios y Activos -->
					<li class="previous">
						<a	href = "<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Arrendamiento');?>"
							><i class ="fa fa-long-arrow-left"></i> <strong>Arrendamiento</strong></a>
						</li>

						<!-- Boton de Formación del Personal-->
						<li class="next">
							<a 	href = "<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Formacion');?>"
								><strong>Formación del Personal</strong> <i class ="fa fa-long-arrow-right"></i></a>
							</li>


						</ul>
					</div>
				</div>
				<!-- Fin de Direccionamiento de formularios -->

</div><!-- /page-wrapper-->