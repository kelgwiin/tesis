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
		$( "input#fecha-compra-componente-ti" ).datepicker();
		$( "input#fecha-elaboracion-componente-ti" ).datepicker();
	});
</script>
<!-- /DATEPICKER: Fin de scripts-->

<?php
	//NOTA
	//Este mismo archivo permite mostrar el formulario de "actualizar" y nuevo.
	//Todo esta determinado por las condiciones de $accion
?>

<div id = "page-wrapper">

	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12 col-md-12">
			<!-- Título -->
			<h1><?php
				if($accion == 'actualizar'){
					echo "Actualizar";
				}else{
					echo "Nuevo";
				}
			?> <small>Componente de TI</small></h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
					<?php
						if($accion == 'actualizar'){
							echo "Actualizando el componente de TI de la Infraestructura";
						}else{
							echo "Agregando un nuevo de componente de TI a la Infraestructura";
						}
					?>
					</li>
				</ol>

				<div class="alert alert-danger alert-dismissable hidden" id = "msj-error-componentes-ti" >
					<button  type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Error, no ha ingresado valores en alguno de los campos obligatorios.
				</div>
			</div><!-- end of col-12-->
		</div><!-- end of row Cabecera-->

		<!-- Formulario -->
		<form 
			<?php 
				if($accion == "actualizar"){
					echo 'id = "fr-actualizar-componente-ti" ';
					echo 'action="'.site_url('index.php/cargar_datos/componentes_ti/actualizar_guardar/'.$comp_ti['componente_ti_id']).'"';
				}else{//Nuevo
					echo 'id = "fr-nuevo-componente-ti" ';
					echo 'action="'.site_url('index.php/cargar_datos/componentes_ti/guardar').'"';
				}
			?>
			method="POST" role="form"
		>
			
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
									<div class="form-group" data-id = "fg-nombre-componente-ti">
										<label for="nombre" class="col-md-2 control-label">Nombre </label>

										<div class="col-md-8 col-lg-8">
											<input type="text" class="form-control" 
												name = "nombre" id="nombre-componente-ti" placeholder="Nombre del componente" 
												<?php
													if($accion == "actualizar"){
														printf('value = "%s"',$comp_ti['nombre']);
													}
												?>
												required >
										</div>

										<div class = "col-md-2 hidden"  data-id = "nombre-componente-ti">
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

								<div class="form-group" data-id = "fg-categoria-componente-ti">
									<label for="categoria" class="col-md-2  control-label">Categoría </label>
									<div class="col-md-7 col-md-offset-1">
										<select name="categoria" id="categoria-componente-ti" class="form-control" >
											<?php
												foreach ($categorias as $cat) {
													if($accion == "actualizar" && $cat['nombre'] == $categ['nomcateg']){
														echo '<option selected = "selected"';
													}else{
														echo '<option';
													}
													printf(' value = "%d" data-base = "%d">%s</option>',$cat['ma_categoria_id'],
														$cat['valor_base'], $cat['nombre']);
												}
											?>	
										</select>
									</div><!-- /col-6 Categoría -->	

									<div class = "col-md-2 hidden" id = "categoria-componente-ti">
										<i class = "fa fa-times text-danger">
										</i>
									</div><!-- /col-2: Icono-->

								</div><!--/form-group: Categoría -->
							</div><!--/col-6-->

						</div><!-- /row:  Nombre y Categoría-->


						<!-- Descripción-->
						<br>
						<div class="row">
							<div class = "col-md-12">
								<div class="form-group" data-id = "fg-descripcion-componente-ti">
									<label for="descripcion" class="col-md-2 control-label">Descripción</label>

									<div class = "col-md-9">
										<textarea name = "descripcion" id = "descripcion-componente-ti" 
										class="form-control text-left" rows="3" required = "required"
										><?php 
											if($accion == "actualizar"){
												echo $comp_ti['descripcion'];
											}
										?></textarea>
									</div>

									<div class = "col-md-1 hidden" data-id = "icon-descripcion-componente-ti">
										<i class = "fa fa-times text-danger">
										</i>
									</div><!-- /col-2: Icono-->
								</div>
							</div><!-- /col-12 -->
						</div><!-- /row -->

						<!-- Tipo de asignación -->
						<br>
						<div class="row">
							<div class = "col-md-6">
								<div class="form-group" data-id = "fg-tipo-asignacion-componente-ti">
									<label for="tipo_asignacion" class="col-md-4 control-label">Tipo de asignación</label>

									<div class = "col-md-8">
										<select name="tipo_asignacion" id="tipo-asignacion-componente-ti" class="form-control" >
											<?php
												if($accion == "actualizar"){
													$op = array('UNI'=>'Única','MULT' =>'Múltiple');
													foreach ($op as $k => $v) {
														if($k == $comp_ti['tipo_asignacion']){
															printf('<option value = "%s" selected = "selected">%s</option>',
															$k,$v);				
														}else{
															printf('<option value = "%s">%s</option>',$k,$v);	
														}
													}
												}else{
													echo '<option value = "UNI">Única</option>
														  <option value = "MULT">Múltiple</option>';
												}
											?>

										</select>
										<span class = "help-block">Si escoje <em>múltiple</em> un único ítem puede ser asignado a varios dpto,
										el campo de <em>cantidad</em> debe ser uno (1). Para el caso de <em>único</em> las asignaciones dependerán de la cantidad </span>

									</div>

									<div class = "col-md-1 hidden" data-id = "icon-tipo-asignacion-componente-ti">
										<i class = "fa fa-times text-danger">
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
								<div class="form-group " data-id = "fg-fecha-compra-componente-ti">
									<label for="fecha_compra" class="col-md-4 control-label">Fecha de Compra </label>

									<div class="col-md-5">
										<input type="text"  name = "fecha_compra" 

										<?php
											if($accion == "actualizar"){
												$fcom = explode(" ", $comp_ti['fecha_compra']);
												printf('value = "%s"',$fcom[0]);	
											}
										?>
										 class="form-control" id="fecha-compra-componente-ti" required>
									</div>

									<div class = "col-md-1 hidden" data-id = "icon-fecha-compra-componente-ti">
										<i class = "fa fa-times text-danger">
										</i>
									</div><!-- /col-2: icono-->

									<div class = "col-md-2"></div> <!-- Vacío-->

								</div><!-- /form-group: fecha de compra-->

							</div><!-- /col-6: fecha de compra-->

							<!-- Fecha de Elaboración del Componente de TI (no la del registro)-->

							<div class="col-md-6">
								<div class="form-group " data-id = "fg-fecha-elaboracion-componente-ti">
									<label for="fecha_elaboracion" class="col-md-5 control-label">Fecha de Elaboración </label>

									<div class="col-md-5">
										<input type="text" name = "fecha_elaboracion"  
											<?php
												if($accion == "actualizar"){
													$fcom = explode(" ", $comp_ti['fecha_elaboracion']);
													printf('value = "%s"',$fcom[0]);	
												}
											?>
										class="form-control" id="fecha-elaboracion-componente-ti" required>
									</div><!-- /col-5: input-->

									<div class = "col-md-1 hidden" data-id = "icon-fecha-elaboracion-componente-ti">
										<i class = "fa fa-times text-danger">
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
								<div class="form-group " data-id = "fg-tiempo-vida-componente-ti">
									<label for="tiempo_vida" class="col-md-4 control-label">Tiempo de Vida </label>

									<div class="col-md-5">
										<input type="number" min = "1" name = "tiempo_vida" 
											class="form-control" id="tiempo-vida-componente-ti"
										 	placeholder = "Tiempo de Vida" required
										 	<?php 
										 		if($accion == "actualizar"){
													printf('value="%s"',$comp_ti['tiempo_vida']);
										 		}
											?>
										 	>
									</div><!-- /col-5: input-->

									<div class = "col-md-1 hidden" data-id = "icon-tiempo-vida-componente-ti">
										<i class = "fa fa-times text-danger">
										</i>
									</div><!-- /col-2: icono-->

									<div class = "col-md-2"></div> <!-- Vacío-->

								</div><!-- /form-group: tiempo de vida-->

							</div><!-- /col-6: tiempo de vida-->

							<!-- Unidad del tiempo de vida -->
							<div class="col-md-6">
								<div class="form-group " data-id = "fg-unidad-tiempo-vida-componente-ti">
									<label for="unidad-tiempo-vida-componente-ti" class="col-md-5 control-label">Unidad de Tiempo de Vida </label>

									<div class="col-md-5">
										<select name="unidad_tiempo_vida" id="unidad-tiempo-vida-componente-ti" class="form-control">
											<?php
												if($accion == "actualizar"){
													$uni = array("DD","MM","AA");
													foreach ($uni as $value) {
														if($comp_ti['unidad_tiempo_vida'] == $value){
															printf('<option value="%s" selected="selected">%s</option>',$value,nomtimeS($value));
														}else{
															printf('<option value="%s">%s</option>',$value,nomtimeS($value));
														}
													}	
												}else{
													echo '
														<option value="DD">Días</option>
														<option value="MM">Meses</option>
														<option value="AA">Años</option>
													';
												}
												
											?>
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
								<div class="form-group " data-id = "fg-precio-componente-ti">
									<label for="precio" class="col-md-4 control-label">Precio </label>

									<div class="col-md-5">
										<input type="text" pattern = "\d+((.\d+)|(\d*))"  
										name = "precio" class="form-control" 
										id="precio-componente-ti" placeholder = "0.00" required
										<?php 
											if($accion == "actualizar"){
												printf('value="%s"',$comp_ti['precio']);
											}
										?>
										>
									</div><!-- /col-5: input-->

									<div class = "col-md-1 hidden" data-id = "icon-precio-componente-ti">
										<i class = "fa fa-times text-danger">
										</i>
									</div><!-- /col-2: icono-->

									<div class = "col-md-2"></div> <!-- Vacío-->

								</div><!-- /form-group: Precio-->

							</div><!-- /col-6: Precio-->

							<!-- Cantidad -->
							<div class="col-md-6">
								<div class="form-group " data-id = "fg-cantidad-componente-ti">
									<label for="cantidad-componente-ti" class="col-md-5 control-label">Cantidad </label>

									<div class="col-md-5">
										<input type="number" name="cantidad" id="cantidad-componente-ti" 
										class="form-control"  min="1"  required="required" 
										placeholder = "Cantidad"
										<?php 
											if($accion == "actualizar"){
												printf(' value = "%s" ',$comp_ti['cantidad']);

												if($comp_ti['tipo_asignacion'] == 'MULT'){
													echo ' disabled = "disabled" ';
												}
											}
										?>
										>
									</div>

									<div class = "col-md-1 hidden" data-id = "icon-cantidad-componente-ti">
										<i class = "fa fa-times text-danger">
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
								<div class="form-group " data-id = "fg-capacidad-componente-ti">
									<label for="capacidad" class="col-md-4 control-label">Capacidad (c/u)</label>


									<div class="col-md-5">
										<input type="text" name = "capacidad" pattern = "\d+((.\d+)|(\d*))"
										class="form-control" id="capacidad-componente-ti" placeholder = "0.00" 
											<?php 
												if($accion == "actualizar"){
													printf('value="%s" ',$comp_ti['capacidad']);
													//Colocando el campo como requerido
													if($categ['basecateg'] != -1){
														echo 'required = "required" ';
													}
												}else{
													echo 'required = "required" ';
												}
											?>
										>
										<span class = "help-block">La capacidad es por cada ítem,  no la sumatoria</span>
									</div><!-- /col-5: input-->

									<div class = "col-md-1 hidden" data-id = "icon-capacidad-componente-ti">
										<i class = "fa fa-times text-danger">
										</i>
									</div><!-- /col-2: icono-->

									<div class = "col-md-2"></div> <!-- Vacío-->

								</div><!-- /form-group: Capacidad-->

							</div><!-- /col-6: Precio-->

							<!-- Unidad de Capacidad -->
							<div class="col-md-6">
								<div class="form-group " data-id = "fg-ma-unidad-medida-componente-ti">
									<label for="unidad-medida-capacidad-componente-ti" class="col-md-5 control-label">Unidad de Capacidad </label>

									<!-- Viene de consulta según la categoría elegida (Dyn)-->
									<div class="col-md-5">
										<!-- Este select se llena desde jquery al hacer click en categoría -->
										<select name="ma_unidad_medida_id" id="ma-unidad-medida-componente-ti" class="form-control">
											<?php
												foreach ($unidades as $uni) {
													if($accion == "actualizar" && $uni['abrev_nombre'] == $categ['abrev_unidad']){
														echo '<option selected="selected"';	
													}else{
														echo '<option';
													}
													printf(' value = "%d" data-nivel = "%d">%s</option>',
														$uni['ma_unidad_medida_id'], $uni['valor_nivel'],$uni['abrev_nombre']);
												}
											?>
										</select>
									</div>

									<div class = "col-md-1 hidden" data-id = "icon-ma-unidad-medida-componente-ti">
										<i class = "fa fa-times text-danger">
										</i>	
									</div><!-- /col-2: icono-->

								</div><!-- /form-group: Unidad de Capacidad-->

							</div><!-- /col-6: Unidad Capacidad-->

						</div><!-- /row 4: Capacidad y su Unidad -->


						<!-- Boton Guardar/Actualizar-->
						<div class="row">
							<div class="col-xs-2 col-sm-2 col-md-1 col-lg-1">
								<button id = "btn-guardar-componentes-ti" type="submit" class="btn btn-primary">Guardar</button>
							</div>

						</form><!-- /formulario -->

							<!-- Boton Cancelar-->
							<div class="col-xs-2 col-sm-2 col-md-1 col-lg-1">
								<a href = "<?php echo site_url('index.php/cargar_datos/componentes_ti/1'); ?>" class="btn btn-danger">Cancelar</a>
							</div>
							<div class="col-xs-8 col-sm-8 col-md-11 col-lg-11"></div><!-- Vacío -->
						</div>


					</div><!-- /panel-body -->
				</div><!-- /panel-default-->
				</div><!-- /col-12: Panel -->
			</div><!-- /row: Panel Principal -->

	</div><!-- /page-wrapper -->

