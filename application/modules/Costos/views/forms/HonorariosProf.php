<!-- Creado el 30-04-2014 por Kelwin Gamez <kelgwiin@gmail.com> -->

<!-- Scripts de DATEPICKER-->
<script src="<?php echo site_url('assets/front/jquery-ui/js/jquery.ui.core.js');?>"></script>
<script src="<?php echo site_url('assets/front/jquery-ui/js/jquery.ui.datepicker.js');?>"></script>
<script src="<?php echo site_url('assets/front/jquery-ui/js/jquery.ui.widget.js');?>"></script>

<!-- Traducción Español -->
<script src="<?php echo site_url('assets/front/jquery-ui/js/i18n/jquery.ui.datepicker-es.js');?>"></script>

<!-- Config CSS-->
<link rel="stylesheet" href="<?php echo site_url('assets/front/jquery-ui/css/themes/ui-lightness/jquery.ui.all.css');?>">

<!-- Inicialización de los datepicker-->
<script>
	$(function() {
		$( "input#fecha" ).datepicker();
		$( "input#fecha_desde" ).datepicker();
		$( "input#fecha_hasta" ).datepicker();
	});
</script>
<!-- /DATEPICKER: Fin de scripts-->


<div id="page-wrapper">
	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<h1>Gestión de Costos Indirectos <small>Honorarios de Profesionales de TI</small></h1>

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
							<div class = "col-md-8">
								<form class = "form-horizontal"
									action="<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Honorario/Guardar');?>"
									method = "post"
								>
									<!-- DATOS BÁSICOS -->
									<fieldset>

										<!-- Form Name -->
										<legend>Honorarios Profesionales</legend>

										<!-- Text input-->
										<div class="form-group">
											<label class="col-md-4 control-label" for="textinput">Nombre de Cargo</label>  
											<div class="col-md-6">
												<input id="nombre" name="nombre" type="text" placeholder="nombre de cargo" class="form-control input-md" required="">
											</div>
										</div>

										<!-- Appended Input - Costo-->
										<div class="form-group">
											<label class="col-md-4 control-label" for="costo">Costo</label>
											<div class="col-md-6">
												<div class="input-group">
													<input id="costo" name="costo" class="form-control" placeholder="costo" type="text" pattern = "\d+((.\d+)|(\d*))" required="">
													<span class="input-group-addon"><?php echo $org['abrev_moneda'];?>.</span>
												</div>

											</div>
										</div>

										<!-- Text input - Número de Profesionales-->
										<div class="form-group">
											<label class="col-md-4 control-label" for="numero_profesionales">Número de Profesionales</label>  
											<div class="col-md-6">
												<input id="numero_profesionales" name="numero_profesionales" type="text" placeholder="número" class="form-control input-md" required="">

											</div>
										</div>

									</fieldset>

									<!-- VIGENCIA (fechas)-->
									<fieldset>

										<!-- Form Name -->
										<legend>Vigencia</legend>

										<!-- Text input - Fecha Desde -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="fecha_desde">Desde</label>  
											<div class="col-md-6">
												<input id="fecha_desde" name="fecha_desde" type="text" placeholder="fecha desde" class="form-control input-md" required="">

											</div>
										</div>

										<!-- Text input - Fecha Hasta-->
										<div class="form-group">
											<label class="col-md-4 control-label" for="fecha_hasta">Hasta</label>  
											<div class="col-md-6">
												<input id="fecha_hasta" name="fecha_hasta" type="text" placeholder="fecha hasta" class="form-control input-md" required="">

											</div>
										</div>


									</fieldset>
									<!-- Button  - Guardar -->
									<div class="form-group">
										<label class="col-md-4 control-label" for="btn-guardar"></label>
										<div class="col-md-4">
											<button type = "submit" id="btn-guardar" class="btn btn-primary">Guardar</button>
										</div>
									</div>

								</form>
							</div>

						</div><!-- /row inner -->
					</div><!-- /panel-body-->

				</div><!-- /panel-default -->
			</div><!-- /col-md-12 -->
		</div><!-- /row-->

		<!-- Direccionamiento de formularios-->
		<div class = "row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<ul class="pager">
					<!-- Boton de Formación del Personal -->
					<li class="previous">
						<a	href = "<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Formacion');?>"
							><i class ="fa fa-long-arrow-left"></i> <strong>Formación del Personal</strong></a>
						</li>

						<!-- Boton de Utilería -->
						<li class="next">
							<a 	href = "<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Utileria');?>"
								><strong>Utilería</strong> <i class ="fa fa-long-arrow-right"></i></a>
							</li>


						</ul>
					</div>
				</div>
				<!-- Fin de Direccionamiento de formularios -->
</div><!-- /page-wrapper-->