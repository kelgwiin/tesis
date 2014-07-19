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
			<h1>Gestión de Costos Indirectos <small>Utilería</small></h1>

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
							<div class = "col-md-10">
								<form class="form-horizontal"
									id = "fr_utileria"
									action="<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Utileria/Guardar');?>"
									method = "post"
								>
									<fieldset>

										<!-- Form Name -->
										<legend>Utilería</legend>

										<!-- Text input - Nombre -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="nombre">Nombre</label>  
											<div class="col-md-6">
												<input id="nombre" name="nombre" type="text" placeholder="nombre" class="form-control input-md" required="">

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
										<!-- Text input - Fecha -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="fecha">Fecha</label>  
											<div class="col-md-6">
												<input id="fecha" name="fecha" type="text" placeholder="fecha" class="form-control input-md" required="">
												<span class="help-block">Fecha cuando se realizó la inversión.</span>  
											</div>
										</div>

										<!-- Textarea - Descripción -->
										<div class="form-group">
											<label class="col-md-4 control-label" for="descripcion">Descripción</label>
											<div class="col-md-6">                     
												<textarea class="form-control pull-left" id="descripcion" name="descripcion" placeholder = "descripción"></textarea>
											</div>
										</div>

									</fieldset>
									
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
														class="btn btn-primary">Cancelar
													</a>	
												</div>

												<div class = "col-md-6"></div><!-- Vacío-->
											</div>
										</div><!-- /col-md-6-->
									</div><!-- /form-group -->


								</form>

							</div><!-- /col-md-8 -->
						</div><!-- /row inner-->
					</div><!-- /panel-body-->

				</div><!-- /panel-default-->
			</div><!-- /col-md-12 -->
		</div><!-- /row -->

		<!-- Direccionamiento de formularios-->
		<div class = "row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<ul class="pager">
					<!-- Boton de Honorarios Profesionales -->
					<li class="previous">
						<a	href = "<?php echo site_url('index.php/Costos/CargarCostosIndirectos/HonorariosProf');?>"
							><i class ="fa fa-long-arrow-left"></i> <strong>Honorarios Profesionales</strong></a>
						</li>

					</ul>
				</div>
			</div>
			<!-- Fin de Direccionamiento de formularios -->

	<?php 
		// Colocando Instrucción para indicar si va a obtener data de Actualzación
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
		 		$('form#fr_utileria').attr('action','index.php/Costos/CargarCostosIndirectos/Utileria/GuardarAct/'+id_act);
		 		//Obteniendo la data a través del post
		 		//post
		 		url = "index.php/Costos/CargarCostosIndirectos/DetallesAct";
		 		params = {table_name:'utileria',id:id_act};
		 		dataType = "json";
		 		fo_process = function(data){
					$('input[name=nombre]').attr('value',data.nombre);
					$('input[name=costo]').attr('value',data.costo);
					$('input[name=fecha]').attr('value',data.fecha);
					$('textarea[name=descripcion]').append(data.descripcion);
		 		};
		 		$.post(url,params,fo_process, dataType);
		 	}//end of if
		});
	</script>

</div><!-- /page-wrapper -->