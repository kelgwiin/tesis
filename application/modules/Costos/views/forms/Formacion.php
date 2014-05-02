<!-- Creado el 30-04-2014 por Kelwin Gamez <kelgwiin@gmail.com> -->
<div id="page-wrapper">
	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<h1>Gestión de Costos Indirectos <small>Formación de Personal</small></h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
					Permite la Carga de los Costos Indirectos de la infraestructura de TI</li>
				</ol>

				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					En este apartado se ingresan los montos invertidos en <strong>Formación de Personal</strong>, ya sea que vayan a ser
					usuarios o formen parte del grupo central de del Departamento TI.
				</div>
			</div><!-- end of col-12-->
		</div><!-- end of row Cabecera-->

		<div class="row">
			<div class = "col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class = "col-md-8">
								<form class = "form-horizontal">
									<fieldset>

										<!-- Form Name -->
										<legend>Formación de Personal</legend>

										<!-- Select Basic - Tipo de Formación realizada -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="selectbasic">Tipo</label>
											<div class="col-md-5">
												<select id="selectbasic" name="tipo" class="form-control">
													<option value="certificaciones">Certificaciones</option>
													<option value="cursos">Cursos</option>
													<option value="cap_usuario_final">Capacitación Usuario Final</option>
													<option value="consultores_externos">Consultores Externos</option>
												</select>
											</div>
										</div>

										<!-- Text input-->
										<div class="form-group">
											<label class="col-md-4 control-label" for="descripcion_breve">Descripción breve</label>  
											<div class="col-md-5">
												<input id="descripcion_breve" name="descripcion_breve" type="text" placeholder="Descripción breve" class="form-control input-md" required="">
												
											</div>
										</div>

										<!-- Appended Input-->
										<div class="form-group">
											<label class="col-md-4 control-label" for="costo">Costo</label>
											<div class="col-md-5">
												<div class="input-group">
													<input id="costo" name="costo" class="form-control" placeholder="costo" type="text" required="required">
													<span class="input-group-addon">Bs.</span>
												</div>
												
											</div>
										</div>
										<!-- Text input-->
										<div class="form-group">
											<label class="col-md-4 control-label" for="fecha">Fecha</label>  
											<div class="col-md-5">
												<input id="fecha" name="fecha" type="text" placeholder="fecha" class="form-control input-md" required="">
												
											</div>
										</div>


									</fieldset>

									<!-- Button  - Guardar-->
									<div class="form-group">
										<label class="col-md-4 control-label" for=""></label>
										<div class="col-md-4">
											<button type = "submit" id="" name="btn-guardar-formacion" class="btn btn-primary">Guardar</button>
										</div>
									</div>
								</form>
							</div><!-- col-8 inner -->
						</div><!-- /row-->
					</div><!-- /panel-body-->
				</div><!-- /panel-default-->
			</div>
		</div>

		<!-- Direccionamiento de formularios-->
		<div class = "row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<ul class="pager">
					<!-- Boton de Mantenimiento -->
					<li class="previous">
						<a	href = "<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Mantenimiento');?>"
							><i class ="fa fa-long-arrow-left"></i> <strong>Mantenimiento</strong></a>
						</li>

						<!-- Boton de Honorarios Profesionales -->
						<li class="next">
							<a 	href = "<?php echo site_url('index.php/Costos/CargarCostosIndirectos/HonorariosProf');?>"
								><strong>Mantenimiento</strong> <i class ="fa fa-long-arrow-right"></i></a>
							</li>

							
						</ul>
					</div>
				</div>
				<!-- Fin de Direccionamiento de formularios -->
</div><!-- /page-wrapper-->