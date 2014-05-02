<!-- Creado el 30-04-2014 por Kelwin Gamez <kelgwiin@gmail.com> -->
<div id="page-wrapper">
	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<h1>Gestión de Costos Indirectos <small>Arrendamiento</small></h1>

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
						<div class = "row">
							<div class = "col-md-10">
								<form id = "fr_" class="form-horizontal" method= "post">
									<fieldset>

										<!-- Form Name -->
										<legend>Arrendamiento</legend>

										<!-- Text input - Nombre de Servicio a Arrendar-->
										<div class="form-group">
											<label class="col-md-4 control-label" for="nombre-arrendamiento">Nombre de Servicio o Activo</label>  
											<div class="col-md-4">
												<input id="nombre-arrendamiento" name="nombre-arrendamiento" type="text" placeholder="Nombre" class="form-control input-md" required="required">
											</div>
										</div>

										<!-- Appended Input - Costo -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="costo">Costo</label>
											<div class="col-md-4">
												<div class="input-group">
													<input id="costo" name="costo" class="form-control" placeholder="Costo" type="text" required="">
													<span class="input-group-addon">Bs.</span>
												</div>
												
											</div>
										</div>

										<!-- Text input - Fecha inicio -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="fecha_inicial">Fecha inicial</label>  
											<div class="col-md-4">
												<input id="fecha_inicial" name="fecha_inicial" placeholder="fecha inicial de arrendamiento" type="text" class="form-control input-md" required="required">
											</div>
										</div>

										<!-- Text input - Fecha final -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="fecha_inicial">Fecha fin</label>  
											<div class="col-md-4">
												<input id="fecha_inicial" name="fecha_inicial" type="text" placeholder = "fecha final de arrendamiento" class="form-control input-md" required="required">
											</div>
										</div>

										<!-- Text input - Tiempo Arrendamiento -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="tiempo">Tiempo de Arrendamiento</label>  
											<div class="col-md-4">
												<input id="tiempo" name="tiempo" type="number" min = "1" placeholder="Tiempo" class="form-control input-md" required="required">
											</div>
										</div>

										<!-- Select Basic - Esquema de Tiempo -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="esquema-tiempo">Esquema de Tiempo</label>
											<div class="col-md-4">
												<select id="esquema-tiempo" name="esquema-tiempo" class="form-control">
													<option value="mensual">Mensual</option>
													<option value="trimestral">Trimestral</option>
													<option value="semestral">Semestral</option>
													<option value="anual">Anual</option>
												</select>
											</div>
										</div>



									</fieldset>
									<!-- Button  - Guardar-->
									<div class="form-group">
										<label class="col-md-4 control-label" for=""></label>
										<div class="col-md-4">
											<button id="" name="" class="btn btn-primary">Guardar</button>
										</div>
									</div>
								</form>
							</div><!-- /col-md-10-->
						</div><!-- /row inner-->


					</div>
				</div><!-- /panel panel-deafult-->

			</div><!-- /col-md-12 -->
		</div><!-- /row: Cuerpo de los formularios -->

		<!-- Direccionamiento de formularios-->
		<div class = "row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<ul class="pager">
					<!-- Boton de Menú de Costos Indirectos  -->
					<li class="previous">
						<a	href = "<?php echo site_url('index.php/Costos/CargarCostosIndirectos');?>"
							><i class ="fa fa-long-arrow-left"></i> <strong>Gestión de Costos Indirectos</strong></a>
						</li>

						<!-- Boton de Mantenimiento -->
						<li class="next">
							<a 	href = "<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Mantenimiento');?>"
								><strong>Mantenimiento</strong> <i class ="fa fa-long-arrow-right"></i></a>
							</li>


						</ul>
					</div>
				</div>
				<!-- Fin de Direccionamiento de formularios -->
</div><!-- /page-wrapper -->