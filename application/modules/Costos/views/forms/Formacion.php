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
			<h1>Gestión de Costos Indirectos <small>Formación de Personal</small></h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
					Permite la Carga de los Costos Indirectos de la infraestructura de TI</li>
				</ol>

				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					En este apartado se ingresan los montos invertidos en <strong>Formación de Personal</strong>, ya sea que vayan a ser
					usuarios o formen parte del grupo central de TI.
				</div>
			</div><!-- end of col-12-->
		</div><!-- end of row Cabecera-->

		<div class="row">
			<div class = "col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class = "col-md-10">
								<form class = "form-horizontal" 
									id = "fr_formacion"
									action="<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Formacion/Guardar');?>"
									method = "post">

									<fieldset>

										<!-- Form Name -->
										<legend>Formación de Personal</legend>

										<!-- Select Basic - Tipo de Formación realizada -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="formacion_tipo_id">Tipo</label>
											<div class="col-md-5">
												<select id="formacion_tipo_id" name="formacion_tipo_id" class="form-control">
													<?php 
														foreach ($tipos as $t) {
															printf('<option value = "%s">%s</option>',$t['id'], $t['nombre']);
														}
													 ?>
												</select>
											</div>
										</div>

										<!-- Text input - Descripcion Breve-->
										<div class="form-group">
											<label class="col-md-4 control-label" for="descripcion_breve">Descripción breve</label>  
											<div class="col-md-5">
												<input id="descripcion_breve" name="descripcion_breve" type="text" 
													placeholder="descripción breve" class="form-control input-md" required="">
												
											</div>
										</div>

										<!-- Appended Input - Costo-->
										<div class="form-group">
											<label class="col-md-4 control-label" for="costo">Costo</label>
											<div class="col-md-3">
												<div class="input-group">
													<input id="costo" name="costo" class="form-control" placeholder="costo" type="text" pattern = "\d+((.\d+)|(\d*))" required="required">
													<span class="input-group-addon"><?php echo $org['abrev_moneda'];?>.</span>
												</div>
												
											</div>
										</div>
										<!-- Text input  - Fecha -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="fecha">Fecha</label>  
											<div class="col-md-3">
												<input id="fecha" name="fecha" type="text" placeholder="fecha" class="form-control input-md" required="">
												
											</div>
										</div>


									</fieldset>

								<br>
								<!-- Buttons: Guardar | Cancelar-->
								<div class="form-group">
									<label class="col-md-4 control-label" for=""></label>
									<div class="col-md-6 col-xs-12">
										<div class="row">
											<div class = "col-md-3 col-xs-6">
												<button id="" type = "submit" class="btn btn-primary">Guardar</button>
											</div>

											<div class ="col-md-3 col-xs-6">
												<a 	
													href="<?php echo site_url('index.php/Costos/CargarCostosIndirectos');?>" 
													class="btn btn-danger">Cancelar
												</a>	
											</div>

											<div class = "col-md-6"></div><!-- Vacío-->
										</div>
									</div><!-- /col-md-6-->
								</div><!-- /form-group -->


								</form>
							</div><!-- col-10 inner -->

							<div class = "col-md-2"></div><!-- Vacio-->
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
								><strong>Honorarios Prof.</strong> <i class ="fa fa-long-arrow-right"></i></a>
							</li>

							
						</ul>
					</div>
				</div>
				<!-- Fin de Direccionamiento de formularios -->



	<?php 
		// Colocando Instrucción para indicar si va a obtener data de Actualización
		if(isset($id_actualizar)){
			echo '<span id = "actualizar" data-status = "yes" data-id = "'.$id_actualizar.'"></span>';
		}
	 ?>

	<script>
		$(function(){
		 	//Verificando si corresponde a actualizar
		 	if($('span#actualizar').attr('data-status') == "yes"){
		 		id_act = $('span#actualizar').attr('data-id');
		 		//form action
		 		$('form#fr_formacion').attr('action','index.php/Costos/CargarCostosIndirectos/Formacion/GuardarAct/'+id_act);
		 		//Obteniendo la data a través del post
		 		//post
		 		url = "index.php/Costos/CargarCostosIndirectos/DetallesAct";
		 		params = {table_name:'formacion',id:id_act};
		 		dataType = "json";
		 		fo_process = function(data){
		 			$('select option[value='+data.formacion_tipo_id+']').attr('selected','selected');//tipo
		 			$('input[name=descripcion_breve]').attr('value',data.descripcion_breve);
		 			$('input[name=costo]').attr('value',data.costo);
		 			$('input[name=fecha]').attr('value',data.fecha);
		 		};
		 		$.post(url,params,fo_process, dataType);
		 	}//end of if
		});
	</script>
</div><!-- /page-wrapper-->