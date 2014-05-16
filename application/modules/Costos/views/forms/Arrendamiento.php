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
		$( "input#fecha_inicial_vigencia" ).datepicker();
	});
</script>


<!-- /DATEPICKER: Fin de scripts-->

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
								<form id = "fr_arrendamiento" class="form-horizontal" 
								method= "post" action = "<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Arrendamiento/Guardar');?>">
									<fieldset>

										<!-- Form Name -->
										<legend>Arrendamiento</legend>

										<!-- Text input - Nombre de Servicio a Arrendar-->
										<div class="form-group">
											<label class="col-md-4 control-label" for="nombre">Nombre de Servicio o Activo</label>  
											<div class="col-md-6">
												<input id="nombre" name="nombre" type="text" placeholder="nombre" class="form-control input-md" required="required">
											</div>
										</div>

										<!-- Select Basic - Motivos  -->
										<!-- Se llena dese base de datos -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="ma_motivo_id">Motivos de Arrendamiento</label>
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

										<!-- Appended Input - Costo -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="costo">Costo</label>
											<div class="col-md-6">
												<div class="input-group">
													<input id="costo" name="costo" class="form-control" placeholder="costo" type="text" pattern = "\d+((.\d+)|(\d*))" required="">
													<span class="input-group-addon"><?php echo $org['abrev_moneda'];?>.</span>
												</div>
												
											</div>
										</div>

										<!-- Text input - Fecha Inicial Vigencia  -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="fecha_inicial_vigencia">Fecha inicial de vigencia</label>  
											<div class="col-md-6">
												<input id="fecha_inicial_vigencia" name="fecha_inicial_vigencia" placeholder="fecha inicial de arrendamiento" type="text" class="form-control input-md" required="required">
											</div>
										</div>

										<!-- Text input - Tiempo Arrendamiento -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="tiempo">Tiempo de Arrendamiento</label>  
											<div class="col-md-6">
												<input id="tiempo" name="tiempo" type="number" min = "1" placeholder="tiempo" class="form-control input-md" required="required">
											</div>
										</div>

										<!-- Select Basic - Esquema de Tiempo -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="esquema-tiempo">Esquema de Tiempo</label>
											<div class="col-md-6">
												<select id="esquema_tiempo" name="esquema_tiempo" class="form-control">
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
										<div class="col-md-6">
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