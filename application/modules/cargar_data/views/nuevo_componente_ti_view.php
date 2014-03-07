<div id = "page-wrapper">
	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12 col-md-12">
			<h1>Nuevo <small>Componente de TI</small></h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
					Agregando un nuevo de componente de TI a la Infraestructura</li>
				</ol>

				<div class="alert alert-danger alert-dismissable " id = "error-componentes-ti" >
					<button  type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Error, no ha ingresado valores en alguno de los campos obligatorios.
				</div>
			</div><!-- end of col-12-->
		</div><!-- end of row Cabecera-->



		<!-- Formulario -->
		<form action="cargar_datos/componentes_ti/guardar" method="POST" role="form">
			<!-- Panel -->
			<div class = "row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class = "panel panel-default">
						<div class = "panel-body">
							<h3 class = "text-primary"> Datos Básicos</h3> <hr>

							<!-- Nombre y Categoría-->
							<div class="row">

								<!-- Nombre-->

								<div class="col-md-6 ">
									<div class="form-group has-error" id = "nombre-componente-ti">
										<label for="nombre" class="col-md-2 control-label">Nombre </label>

										<div class="col-md-8 col-lg-8">
											<input type="text" class="form-control" name = "nombre" id="nombre" placeholder="Nombre del componente" required >
										</div>

										<div class = "col-md-2 col-lg-2"  id = "nombre-componente-ti">
											<i class = "fa fa-times text-danger"
											data-toggle = "tooltip"
											data-original-title = "Sólo números"
											data-placement = "right">

										</i>
									</div><!-- /col-2: icono -->

								</div><!-- /form-group: nombre-->
							</div><!-- /col-5: Nombre-->

							<!-- Categoría (lista)-->
							<div class="col-md-6">

								<div class="form-group" id = "categoria-componente-ti">
									<label for="categoria" class="col-md-2  control-label">Categoría </label>
									<div class="col-md-7 col-md-offset-1">
										<select name="categoria" id="categoria" class="form-control" >
											<option value = "cat1">Categoría 1</option>
											<option value = "cat1">Categoría 1</option>
											<option value = "cat1">Categoría 1</option>
											<option value = "cat1">Categoría 1</option>
										</select>
									</div><!-- /col-6 Categoría -->	

									<div class = "col-md-2 col-lg-2" id = "categoria-componente-ti">
										<i class = "fa fa-check text-success">
										</i>
									</div><!-- /col-2: Icono-->

								</div><!--/form-group: Categoría -->
							</div><!--/col-6-->

						</div><!-- /row:  Nombre y Categoría-->


						<!-- Descripción-->
						<br>
						<div class="row">
							<div class = "col-md-12">
								<div class="form-group has-success" id = "descripcion-componente-ti">
									<label for="descripcion" class="col-md-2 control-label">Descripción</label>

									<div class = "col-md-9">
										<textarea name = "descripcion" id = "descripcion" class="form-control" rows="3"></textarea>
									</div>

									<div class = "col-md-1 col-lg-1" id = "descripcion-componente-ti">
										<i class = "fa fa-check text-success">
										</i>
									</div><!-- /col-2: Icono-->
								</div>
							</div><!-- /col-12 -->
						</div><!-- /row -->

						
						<!-- CARACTERÍSTICAS del Componente de TI-->

						<!-- CAMPOS DE LA BD
							- fecha_compra
							- fecha_elaboracion ( del componente de ti, más no del registro)
							- tiempo_vida
							- unidad_tiempo
							- precio
							- capacidad
							- cantidad
							- activa
							- unidad_medida (de capacidad)
							- abrev_unidad_medida (2) -->

						<h3 class = "text-primary"> Características</h3> <hr>

						<!-- Fecha compra y elaboración - Row 1 -->
						<div class = "row">

							<!-- Fecha de Compra -->

							<div class="col-md-6">
								<div class="form-group " id = "fecha-compra-componente-ti">
									<label for="fecha_compra" class="col-md-4 control-label">Fecha de Compra </label>

									<div class="col-md-5">
										<input type="date" name = "fecha_compra" class="form-control" id="fecha_compra" required>
									</div>

									<div class = "col-md-1 " id = "fecha-compra-componente-ti">
										<i class = "fa fa-check text-success">
										</i>
									</div><!-- /col-2: icono-->

									<div class = "col-md-2"></div> <!-- Vacío-->

								</div><!-- /form-group: fecha de compra-->

							</div><!-- /col-6: fecha de compra-->

							<!-- Fecha de Elaboración del Componente de TI (no la del registro)-->

							<div class="col-md-6">
								<div class="form-group " id = "fecha-elaboracion-componente-ti">
									<label for="fecha_elaboracion" class="col-md-5 control-label">Fecha de Elaboración </label>

									<div class="col-md-5">
										<input type="date" name = "fecha_elaboracion" class="form-control" id="fecha_elaboración" required>
									</div><!-- /col-5: input-->

									<div class = "col-md-1 " id = "fecha-elaboracion-componente-ti">
										<i class = "fa fa-check text-success">
										</i>
									</div><!-- /col-2: icono-->


								</div><!-- /form-group: fecha de elaboración-->

							</div><!-- /col-6: fecha de elaboración-->

						</div><!-- /row 1: fecha compra y elaboración -->

						<br>
						<br>
						<!-- Tiempo de vida y su unidad - Row 2-->
						<div class = "row">

							<!-- Tiempo de vida -->

							<div class="col-md-6">
								<div class="form-group " id = "tiempo-vida-componente-ti">
									<label for="tiempo_vida" class="col-md-4 control-label">Tiempo de Vida </label>

									<div class="col-md-5">
										<input type="number" min = "1" name = "tiempo_vida" class="form-control" id="tiempo_vida" placeholder = "Tiempo de Vida" required>
									</div><!-- /col-5: input-->

									<div class = "col-md-1 " id = "tiempo-vida-componente-ti">
										<i class = "fa fa-check text-success">
										</i>
									</div><!-- /col-2: icono-->

									<div class = "col-md-2"></div> <!-- Vacío-->

								</div><!-- /form-group: tiempo de vida-->

							</div><!-- /col-6: tiempo de vida-->

							<!-- Unidad del tiempo de vida -->

							<div class="col-md-6">
								<div class="form-group " id = "unidad-tiempo-vida-componente-ti">
									<label for="unidad-tiempo-vida-componente-ti" class="col-md-5 control-label">Unidad de Tiempo de Vida </label>

									<div class="col-md-5">
										<select name="" id="input" class="form-control">
											<option value="hh">Días</option>
											<option value="mm">Meses</option>
											<option value="aaaa">Años</option>
										</select>
									</div>

									<div class = "col-md-2" ></div><!-- Vacío-->

								</div><!-- /form-group: fecha de elaboración-->

							</div><!-- /col-6: fecha de elaboración-->

						</div><!-- /row 2: Tiempo de vida y su unidad -->


						<br>
						<br>
						<!-- Precio y Cantidad - Row 3-->
						<div class = "row">

							<!-- Precio -->

							<div class="col-md-6">
								<div class="form-group " id = "precio-componente-ti">
									<label for="precio" class="col-md-4 control-label">Precio </label>

									<div class="col-md-5">
										<input type="number" min = "1" name = "precio" class="form-control" id="precio" placeholder = "Precio" required>
									</div><!-- /col-5: input-->

									<div class = "col-md-1 " id = "precio-componente-ti">
										<i class = "fa fa-check text-success">
										</i>
									</div><!-- /col-2: icono-->

									<div class = "col-md-2"></div> <!-- Vacío-->

								</div><!-- /form-group: Precio-->

							</div><!-- /col-6: Precio-->

							<!-- Cantidad -->
							<div class="col-md-6">
								<div class="form-group " id = "cantidad-componente-ti">
									<label for="cantidad-componente-ti" class="col-md-5 control-label">Cantidad </label>

									<div class="col-md-5">
										<input type="number" name="" id="input" class="form-control"  min="1"  required="required" placeholder = "Cantidad">
									</div>

									<div class = "col-md-1 " id = "cantidad-componente-ti">
										<i class = "fa fa-check text-success">
										</i>
									</div><!-- /col-2: icono-->



								</div><!-- /form-group: fecha de elaboración-->

							</div><!-- /col-6: fecha de elaboración-->

						</div><!-- /row 3: Precio y Cantidad -->

						<br>
						<br>
						<!-- Capacidad y su Unidad - Row 4 -->
						<div class = "row">

							<!-- Capacidad (c/u) -->

							<div class="col-md-6">
								<div class="form-group " id = "capacidad-componente-ti">
									<label for="capacidad" class="col-md-4 control-label">Capacidad (c/u)</label>

									<div class="col-md-5">
										<input type="number" min = "1" name = "capacidad" class="form-control" id="capacidad" placeholder = "Capacidad" required>
										<span class = "help-block">La capacidad es por cada ítem  no la sumatoria</span>
									</div><!-- /col-5: input-->

									<div class = "col-md-1 " id = "capacidad-componente-ti">
										<i class = "fa fa-check text-success">
										</i>
									</div><!-- /col-2: icono-->

									<div class = "col-md-2"></div> <!-- Vacío-->

								</div><!-- /form-group: Capacidad-->

							</div><!-- /col-6: Precio-->

							<!-- Unidad de Capacidad -->
							<div class="col-md-6">
								<div class="form-group " id = "unidad-medida-capacidad-componente-ti">
									<label for="unidad-medida-capacidad-componente-ti" class="col-md-5 control-label">Unidad de Capacidad </label>

									<!-- Viene de consulta según la -->
									<div class="col-md-5">
										<select name="unidad-medida-capacidad-componente-ti" id="input" class="form-control">
											<option value="MB">MB</option>
											<option value="KB">KB</option>
											<option value="GB">GB</option>
											<option value="TB">TB</option>
											<option value="EB">EB</option>
										</select>
									</div>

									<div class = "col-md-1 " id = "unidad-medida-capacidad-componente-ti">
										<i class = "fa fa-check text-success">
										</i>	
									</div><!-- /col-2: icono-->

								</div><!-- /form-group: fecha de elaboración-->

							</div><!-- /col-6: fecha de elaboración-->

						</div><!-- /row 4: Capacidad y su Unidad -->


						<!-- Boton Guardar-->
						<div class="row">
							<div class="col-xs-2 col-sm-2 col-md-1 col-lg-1">
								<button type="submit" class="btn btn-primary">Guardar</button>
							</div>

						</form><!-- /formulario -->

							<!-- Boton Cancelar-->
							<div class="col-xs-2 col-sm-2 col-md-1 col-lg-1">
								<a href = "<?php echo site_url('cargar_datos/componentes_ti'); ?>" class="btn btn-primary">Cancelar</a>
							</div>
							<div class="col-xs-8 col-sm-8 col-md-11 col-lg-11"></div><!-- Vacío -->
						</div>


					</div><!-- /panel-body -->
				</div><!-- /panel-default-->
				</div><!-- /col-12: Panel -->
			</div><!-- /row: Panel Principal -->




		<!-- Conjunto de formularios dentro de Modales (TEMPORALMENTE BORRADO BORRAR)-->

		<!-- Agregar Categoría	-->
		<div class="modal fade" id = "Modal-nueva-categoria-componente-ti">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Nueva <small>Categoría</small></h4>
					</div><!-- /modal-header -->

					<div class="modal-body">
						<p>One fine body&hellip;</p>
					</div><!-- /modal-body-->

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<button type="button" class="btn btn-primary" id = "guardar-categoria-componente-ti">Guardar</button>
					</div><!-- /modal-footer-->
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->


	</div><!-- /page-wrapper -->

