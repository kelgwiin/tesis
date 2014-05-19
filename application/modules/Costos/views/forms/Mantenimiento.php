<!-- Creado el 30-04-2014 por Kelwin Gamez <kelgwiin@gmail.com> -->

<!-- Scripts de DATEPICKER-->
<script src="<?php echo site_url('assets/front/jquery-ui/js/jquery.ui.core.js');?>"></script>
<script src="<?php echo site_url('assets/front/jquery-ui/js/jquery.ui.datepicker.js');?>"></script>
<script src="<?php echo site_url('assets/front/jquery-ui/js/jquery.ui.widget.js');?>"></script>

<!-- Traducción Español -->
<script src="<?php echo site_url('assets/front/jquery-ui/js/i18n/jquery.ui.datepicker-es.js');?>"></script>

<!-- Config CSS-->
<link rel="stylesheet" href="<?php echo site_url('assets/front/jquery-ui/css/themes/custom-theme/jquery-ui-1.10.4.custom.css');?>">

<!-- Inicialización de los datepicker-->
<script>
	$(function() {
		$( "input#fecha" ).datepicker();
	});
</script>
<!-- /DATEPICKER: Fin de scripts-->

<div id="page-wrapper">
	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<h1>Gestión de Costos Indirectos <small>Mantenimiento e Instalación</small></h1>

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
							<form method="post" class = "form-horizontal" 
							action="<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Mantenimiento/Guardar');?>">
								<!-- DATOS BÁSICOS -->
								<div class = "col-md-8">
									<fieldset>
										<!-- Form Name -->
										<!-- MANTENIMIETO -->
										<legend>Datos Básicos</legend>

										<!-- Select Basic - Tipo de Operación -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="tipo_operacion">Tipo de Operación</label>
											<div class="col-md-6">
												<select id="tipo_operacion" name="tipo_operacion" class="form-control">
													<option value="mantenimiento">Mantenimiento</option>
													<option value="instalacion">Instalación</option>
												</select>
											</div>
										</div>

										<!-- Text input - Nombre Mantenimiento/Instalación-->
										<div class="form-group">
											<label class="col-md-4 control-label" for="nombre_mantenimiento">Nombre Mantenimiento/Instalación</label>  
											<div class="col-md-6">
												<input id="nombre_mantenimiento" name="nombre_mantenimiento" type="text" placeholder="nombre mantenimiento/instalción" class="form-control input-md" required="required">

											</div>
										</div>

										<!-- Select Basic - Motivos  -->
										<!-- Se llena dese base de datos -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="ma_motivo_id">Motivos de Mantenimiento/Instalación</label>
											<div class="col-md-6">
												<select id="descripcion" name="ma_motivo_id" class="form-control">
													<?php
														foreach ($motivos as $m) {
															printf('<option value = "%s">%s</option>',$m['ma_motivo_id'],$m['nombre']);
														}
													?>

												</select>
											</div>
										</div>

										<!-- Appended Input - Costo-->
										<div class="form-group">
											<label class="col-md-4 control-label" for="costo">Costo</label>
											<div class="col-md-6">
												<div class="input-group">
													<input id="costo" name="costo" class="form-control" placeholder="costo" type="text" pattern = "\d+((.\d+)|(\d*))" required="required">
													<span class="input-group-addon"><?php echo $org['abrev_moneda'];?>.</span>
												</div>

											</div>
										</div>
										<!-- Text input - Fecha de realización del mantenimiento/instalación -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="fecha">Fecha</label>  
											<div class="col-md-6">
												<input id="fecha" name="fecha" type="text" placeholder="fecha de mantenimiento/instalción" class="form-control input-md" required="required">

											</div>
										</div>

										<!-- Select Basic  - Departamento -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="departamento_id">Departamento</label>
											<div class="col-md-6">
												<select id="departamento_id" name="departamento_id" class="form-control">
													<?php 
														foreach ($dptos as $d) {
															printf('<option value="%s">%s</option>',$d['id'],$d['nombre']);
														}
													 ?>
												</select>
											</div>
										</div>

										<!-- Select Basic - Categoría -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="ma_categoria_id">Categoría</label>
											<div class="col-md-6">
												<select id="ma_categoria_id" name="ma_categoria_id" class="form-control">
													<?php 
														foreach ($categorias as $c) {
															printf('<option value="%s">%s</option>',$c['id'],$c['nombre']);
														}
													 ?>
												</select>
											</div>
										</div>
									</fieldset>


									<!-- DATOS DE ENCARGADO DE MANTENIMIENTO-->
									<fieldset>
										<!-- Form Name -->
										<legend>Encargado de Matenimiento/Instalación</legend>

										<!-- Text input - Nombre -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="nombre">Nombre</label>  
											<div class="col-md-6">
												<input id="nombre" name="nombre" type="text" placeholder="nombre" class="form-control input-md" required="required">

											</div>
										</div>


										<!-- Text input - Apellido -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="apellido"></label>  
											<div class="col-md-6">
												<input id="apellido" name="apellido" type="text" placeholder="apellido" class="form-control input-md" required="required">

											</div>
										</div>


										<!-- Text input - Correo -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="email">Correo</label>  
											<div class="col-md-6">
												<input id="email" name="email" type="email" placeholder="correo electrónico" class="form-control input-md" required="required">

											</div>
										</div>

										<!-- Text input- Teléfono -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="telefono">Teléfono</label>  
											<div class="col-md-6">
												<input id="telefono" name="telefono" type="tel" placeholder="teléfono" class="form-control input-md" required="required">

											</div>
										</div>


									</fieldset><!-- Encargado de Mantenimiento y/o Instalación -->

									<!-- Button  - Guardar -->
									<div class="form-group">
										<label class="col-md-4 control-label" for="guardar"></label>
										<div class="col-md-4">
											<button id="guardar" type = "submit" class="btn btn-primary">Guardar</button>
										</div>
									</div>

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