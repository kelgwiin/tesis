<?php 
	if($actualizar){
		echo '
			<!-- Labels para controla de eliminación de campos al actualizar-->
			<div id = "list-id-cronograma">
			</div>

			<div id = "list-id-comando-oper">
			</div>

			<div id = "list-id-umbral">
			</div>

			<div id = "list-id-proceso">
			</div>

		';	
	}
	

?>
<style>
	.red{color: #d9534f}
</style>
<div id = "page-wrapper">
	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12 col-md-12">
			<h1>
			<?php 
				if($actualizar){
					echo 'Actualizar';
				}else{
					echo 'Nuevo';
				}
			?>
			<small>Servicio</small></h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
					<?php
						if($actualizar){
							echo 'Actualizando el servicio de la ';
						}else{
							echo 'Agregando un nuevo servicio a la ';
						}
					?>
					 Infraestructura</li>
			</ol>

			<div class="alert alert-danger alert-dismissable hidden" id = "msj-error-servicios" >
				<button  type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Error, no ha ingresado valores en alguno de los campos obligatorios.
			</div>

			<!-- Mensaje de Error Inesperado -->
			<div class="alert alert-danger alert-dismissable hidden" id = "msj-error-inesperado-basico">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Ha ocurrido un error <strong>inesperado</strong>.
			</div>
			
		</div><!-- end of col-12-->
	</div><!-- end of row Cabecera-->

<!-- Formulario -->
<form id = "fr-nuevo-servicio" 
	action =
	"<?php 
		if($actualizar){
			echo site_url('index.php/cargar_datos/servicios/actualizar_guardar/'. $servicio['servicio_id']);
		}else{
			echo site_url('index.php/cargar_datos/servicios/guardar');
		}
	?>" 
 	method="POST" role="form"

 	<?php 
 		if($actualizar){
 			echo 'data-oper = "actualizar"';
 		}else{
 			echo 'data-oper = "nuevo"';
 		}
 	?>
 >
	<!-- Panel -->
	<div class = "row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<div class="panel panel-default">
				
				<div class="panel-body">

					<!-- DATOS BÁSICOS -->
					<h3 class = "text-primary">Datos Básicos </h3> <hr>
					
					<!-- Nombre y Tipo de Servicio -->
					<div class="row">
						<!-- Nombre -->
						<div class  = "col-md-6">
							<div class="form-group" id = "fg-nombre-servicio">
								<label for="nombre" class="col-md-2 control-label">Nombre </label>

								<div class="col-md-8 col-lg-8">
									<input type="text" class="form-control" name = "nombre" id="nombre-servicio" 
									placeholder="Nombre del componente" required 
									<?php
										if($actualizar){
											printf(' value = "%s" ',$servicio['nombre']);
										}
									?>
									>
								</div>

								<div class = "col-md-2 hidden"  id = "icon-nombre-servicio">
									<i class = "fa fa-times text-danger"
										data-toggle = "tooltip"
										data-original-title = "Sólo números"
										data-placement = "right">

									</i>
								</div><!-- /col-2: icono -->

							</div><!-- /form-group: Nombre-->
						</div><!-- /col-6: Nombre -->

						<!-- Tipo de Servicio -->
						<div class="col-md-6">
							<div class="form-group" id = "fg-tipo-servicio">
								<label for="tipo_servicio" class="col-md-4  control-label">Tipo de Servicio </label>

								<div class="col-md-6">
									<select name="tipo_servicio" id="tipo-servicio" class="form-control" >
										<?php
											if($actualizar){
												$op = array('USR'=>'Usuario','SYS'=>'Sistema');
												foreach ($op as $k=>$v) {
													if($k == $servicio['tipo']){
														printf('<option value = "%s" selected>%s </option>  ',$k,$v);
													}else{
														printf('<option value = "%s">%s </option> ',$k,$v);
													}
												}
											}else{
												echo '
													<option value = "USR">Usuario </option>
													<option value = "SYS">Sistema</option>
												';
											}
										?>

										
									</select>
								</div><!-- /col-6 Tipo de Servicio -->	

								<div class = "col-md-2 hidden " id = "icon-tipo-servicio">
									<i class = "fa fa-times text-danger">
									</i>
								</div><!-- /col-2: Icono-->

							</div><!--/form-group: Tipo de Servicio -->
							</div><!--/col-6-->
					</div><!-- /row: Nombre y Tipo de Servicio -->

					<!-- Genera Ingresos y Campo de Monto (Tentativo)-->
					<br>
					<div class = "row">
						<div class = "col-md-6">

							<div class = "form-group" id = "fg-genera-ingresos-nuevo-servicio">
								<label for="genera_ingresos" class="sr-only">Genera Ingresos </label>

								<div class = "col-md-9">
									<div class="checkbox" data-cb = "genera-ingresos-nuevo-servicio">
										<label
											data-toggle = "tooltip"
											data-original-title = "¿El servicio genera ingresos financieros?">
											<strong>Genera Ingresos Financieros</strong>
											<input type="checkbox" name = "genera_ingresos" 
												id = "genera-ingresos-nuevo-servicio"
												data-cb = "genera-ingresos-nuevo-servicio"
												<?php 
													if($actualizar && $servicio['genera_ingresos']){
														echo ' checked = "checked" ';
													}
												?>
												>
										</label>
									</div><!-- /checkbox-->
								</div><!-- /col-8: Checkbox Genera Ingresos -->

								<div class = "col-md-3 hidden" id = "icon-genera-ingresos-nuevo-servicio">
									<i class = "fa fa-times text-danger">
									</i>
								</div><!-- /col-2: Icono-->

							</div><!-- /form-group-->

							
						</div><!-- /col-6: Checkbox Genera Ingresos -->

						<!-- Campo de Monto -->	
						<div class = "col-md-6">
							<div class = "form-group " id = "fg-monto-ingreso-nuevo-servicio">
								<label 
									data-toggle = "tooltip"

									data-original-title = "Se habilita al tildar que genera ingresos"
									data-placement = "left"
									for="monto_ingreso" class="col-md-4 control-label">Cant. Ingresos </label>

								<div class = "col-md-6">
									<input type="number" min = "1" class="form-control" 
										name = "monto_ingreso" id="monto-ingreso-nuevo-servicio" 
										placeholder="Cantidad de Ingresos" 
										<?php
											if($actualizar && $servicio['genera_ingresos']){
												echo ' required = "required" ';
												printf('value = "%s" ',$servicio['cantidad_ingresos']);
											}else{
												echo ' disabled  = "disabled" ';
											}

										?>
										
									>
									<span class = "help-block">
										<?php
											printf('Cantidad de ingresos en <strong>%s</strong> generados por transacción.',$org['moneda']);
										?>
									</span>
								</div>

								<div class = "col-md-1 hidden" id = "icon-monto-ingreso-nuevo-servicio">
									<i class = "fa fa-times text-danger">
									</i>
								</div><!-- /col-2: Icono-->
							</div><!-- /form-group-->
						</div><!-- /col-4 Campo de Monto -->

					</div><!-- /row: Genera Ingresos y Campo de Monto -->

					<!-- Descripción-->
					<br>
					<div class="row">
						<div class = "col-md-12">
							<div class="form-group " id = "fg-descripcion-datos-basicos-servicio">
								<label for="descripcion-datos-basicos" class="col-md-2 control-label">Descripción</label>

								<div class = "col-md-9">
									<textarea name = "descripcion_datos_basicos" id = "descripcion-datos-basicos-servicio" 
										class="form-control text-left" rows="3"
										><?php
											if($actualizar){
												echo $servicio['descripcion'];
											}
										?></textarea>
								</div>

								<div class = "col-md-1 hidden" id = "icon-descripcion-datos-basicos-servicio">
									<i class = "fa fa-times text-danger">
									</i>
								</div><!-- /col-2: Icono-->
							</div><!-- /form-group-->
						</div><!-- /col-12 -->
					</div><!-- /row: Descripción -->
						

					<!-- CRONOGRAMAS DE EJECUCIÓN -->
					<h3 class = "text-primary">Cronogramas de Ejecución</h3> <hr>
							
					<!-- Boton de Añadir formulario de Cronograma de Ejecución-->
					<div class = "row">
						<div class="col-md-1">
							<a  class = "btn "
								data-id = "btn-add-forms-cronograma"
								data-toggle = "tooltip"  
								data-original-title = "Agregar cronograma a final "
								data-placement = "top">

								<i class = "fa fa-plus fa-lg"></i> Añadir
							</a>
						</div><!-- /col-1-->

						<div class="col-md-1">
							<a  class = "btn red"
								data-id = "btn-remove-forms-cronograma"
								data-toggle = "tooltip"  
								data-original-title = "Eliminar último cronograma"
								data-placement = "top">

								<i class = "fa fa-minus fa-lg"></i> Eliminar
							</a>
						</div><!-- /col-1-->

						<div class = "col-md-10"></div><!-- Vacío-->
					</div><!-- /row: Boton Añadir formulario -->

					<!-- Lista de formularios de Cronograma de Ejecución incrustados dentro de paneles -->
					<div class = "row">
						
						<!-- Contador de Item de Cronograma de  Ejecución-->
						<?php
							if($actualizar){
								$n_crono = count($list_tarea);
							}
						?>
						<label class = "sr-only"  id = "num-filas-cronogramas"
							data-num-filas = 
						 "<?php 
						 	if($actualizar){
						 		echo $n_crono;
						 	}else{
						 		echo "1";
						 	}
						 ?>"

						 ></label>	

						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" data-fcronograma = "forms-cronograma">
						<?php 
							if($actualizar){
								for ($i_crono=0; $i_crono < $n_crono ; $i_crono++) { 
									$idx = $i_crono+1;
									$t = $list_tarea[$i_crono];
									//Cabecera
									echo '
									<div class="panel panel-info sche-bgcolor" data-id = "form-cronograma-'.$idx.'" data-db-id = "'.$t['tarea_id'].'">
										<div class="panel-body">
											
											<!-- Numeración -->
											<div class="row">
												<div class ="col-md-12">
													<p class = "text-muted "><strong><small>CRONOGRAMA #'.$idx.'</small></strong></p>	
												</div>
											</div><!-- Numeración -->
											<br>

											';
									//Campos de Cronograma
									echo '
											<!-- Campos de Cronograma de Ejecución -->
										  	<div class = "row" ><!-- inner -->
										  		<!-- Desccripción del  Cronograma -->
										  		<div class = "col-md-2"><!-- label -->
										  			<label for = "descripcion-cronograma-'.$idx.'1" class ="control-label">Descripción</label>
										  		</div>
										  		<div class="col-md-3">
										  			<input type="text" name="descripcion-cronograma-'.$idx.'" data-secuencia = "'.$idx.'"
										  				class="form-control"  required="required"  placeholder = "Descripción"
										  				data-toggle = "tooltip" data-original-title = "Descripción del Cronograma"
										  				value = "'.$t['descripcion'].'"
										  			>
										  		</div><!-- /col-3: Descripción del Cronograma-->

										  		<!-- Horario desde-->
										  		<div class = "col-md-1"><!-- label -->
										  			<label for = "horario-desde-cronograma-'.$idx.'" class = "control-label">Desde</label>
										  		</div>
										  		<div class="col-md-2">
										  			<input type="time" name="horario-desde-cronograma-'.$idx.'" data-secuencia = "'.$idx.'"
										  				class="form-control"  required="required"  placeholder = "Desde"
										  				data-toggle = "tooltip" data-original-title = "Horario inicial"
										  				value = "'.$t['horario_desde'].'"
										  				>
										  		</div><!-- /col-3: Horario desde-->

										  		<!-- Horario hasta -->
										  		<div class = "col-md-1"><!-- label -->
										  			<label for = "horario-hasta-cronograma-'.$idx.'" class = "control-label">Hasta</label>
										  		</div>
										  		<div class="col-md-2">
										  			<input type="time" name="horario-hasta-cronograma-'.$idx.'" data-secuencia = "'.$idx.'"
										  				class="form-control"  required="required"  placeholder = "Hasta"
										  				data-toggle = "tooltip" data-original-title = "Horario final"
										  				value = "'.$t['horario_hasta'].'">
										  		</div><!-- /col-3: Horario hasta-->

										  		<div class = "col-md-1"></div><!-- vacío-->
										  	</div><!-- /row: Campos de Cronograma de Ejecución-->
									';

									//Comandos & Operaciones
									//Botones
									echo '
										  	<!-- Registro de Comandos y Operaciones -->
										  	<br>
										  	<h4 class = "text-primary">Registro de Comandos y Operaciones </h4>

										  	<!-- Boton de Añadir y Eliminar formulario de Comandos y Operaciones-->
										  	<div class = "row">
										  		<div class="col-md-1">
										  			<a  class = "btn "
										  				data-id = "btn-add-forms-comandos-oper"
										  				data-secuencia = "'.$idx.'"
										  				data-toggle = "tooltip"  
										  				data-original-title = "Agregar formulario al final"
										  				data-placement = "top">

										  				<i class = "fa fa-plus fa-lg"></i> Añadir
										  			</a>
										  		</div><!-- /col-1-->

										  		<div class="col-md-1">
										  			<a  class = "btn red"
										  				data-id = "btn-remove-forms-comandos-oper"
										  				data-secuencia = "'.$idx.'"
												  		data-toggle = "tooltip"  
										  				data-original-title = "Eliminar último formulario"
										  				data-placement = "top">

										  				<i class = "fa fa-minus fa-lg"></i> Eliminar
										  			</a>
										  		</div><!-- /col-1-->

										  		<div class = "col-md-10"></div><!-- Vacío-->
											</div><!-- /row: Boton Añadir y Eliminar formulario de Comandos y Operaciones -->
									';

									//Lista de comandos & operaciones
									$list_tarea_detalle = $t['list_tarea_detalle'];
									$n_co = count($list_tarea_detalle);
									echo '

										<!-- Lista de Comandos y Operaciones -->
										<div class = "row"  >
											<div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12" data-fcomandos-oper = "form-comando-oper-'.$idx.'">
												
												<!--Contador de numeros  de filas de comandos y operaciones -->
												<label class = "sr-only" id = "num-filas-comandos-oper-'.$idx.'" data-num-filas = "'.$n_co.'"></label>';

										//Campos de comandos & Operaciones
										for ($j=0; $j < $n_co; $j++) { 
											$jdx = $j+1;
											$tdet = $list_tarea_detalle[$j];
											echo '
												<!--Campos Iniciales -->
												<div class="row" data-id = "sec-'.$idx.'-comando-oper-'.$jdx.'" data-db-id = "'.$tdet['tarea_detalle_id'].'"><!-- inner de Comandos y Operaciones -->
													<!-- Comando -->
													<div class = "col-md-3">
														<input type="text" name="comando-'.$idx.'-'.$jdx.'" data-secuencia = "'.$idx.'"
															class="form-control"  required="required"  placeholder = "Comando"
															data-toggle = "tooltip" data-original-title = "Comando"
															value = "'.$tdet['comando'].'"
															>
													</div><!-- /col-3: Comando -->

													<!-- Operación -->
													<div class = "col-md-3">
														<input type="text" name="operacion-'.$idx.'-'.$jdx.'" data-secuencia = "'.$idx.'"
															class="form-control"  required="required"  placeholder = "Operación"
															data-toggle = "tooltip" data-original-title = "Operación a ejecutar"
															value = "'.$tdet['operacion'].'"
															>
													</div><!-- /col-3: Operación -->
													
													<div class = "col-md-6"></div><!-- Vacío-->

													<!-- /row: Comandos y Operaciones -->
												</div>
											';			
										}		

										echo'<!-- A partir de aquí se agregar desde JQUERY -->

											</div><!-- /col-12-->
												
												<!-- /row: Lista de Comandos y Operaciones -->
										</div>
									';

									//Pie de página 
									echo '
											</div><!-- /panel-body-->
											<!-- /panel-->
										</div>
									';

								}

							}else{
								//Se crea el formulario inicial normal de nuevo cronograma
								echo '
								<div class="panel panel-info sche-bgcolor" data-id = "form-cronograma-1">
									<div class="panel-body">
										
										<!-- Numeración -->
										<div class="row">
											<div class ="col-md-12">
												<p class = "text-muted "><strong><small>CRONOGRAMA #1</small></strong></p>	
											</div>
										</div><!-- Numeración -->
										<br>

										<!-- Campos de Cronograma de Ejecución -->
									  	<div class = "row" ><!-- inner -->
									  		<!-- Desccripción del  Cronograma -->
									  		<div class = "col-md-2"><!-- label -->
									  			<label for = "descripcion-cronograma-1" class ="control-label">Descripción</label>
									  		</div>
									  		<div class="col-md-3">
									  			<input type="text" name="descripcion-cronograma-1" data-secuencia = "1"
									  			class="form-control"  required="required"  placeholder = "Descripción"
									  			data-toggle = "tooltip" data-original-title = "Descripción del Cronograma">
									  		</div><!-- /col-3: Descripción del Cronograma-->

									  		<!-- Horario desde-->
									  		<div class = "col-md-1"><!-- label -->
									  			<label for = "horario-desde-cronograma-1" class = "control-label">Desde</label>
									  		</div>
									  		<div class="col-md-2">
									  			<input type="time" name="horario-desde-cronograma-1" data-secuencia = "1"
									  			class="form-control"  required="required"  placeholder = "Desde"
									  			data-toggle = "tooltip" data-original-title = "Horario inicial">
									  		</div><!-- /col-3: Horario desde-->

									  		<!-- Horario hasta -->
									  		<div class = "col-md-1"><!-- label -->
									  			<label for = "horario-hasta-cronograma-1" class = "control-label">Hasta</label>
									  		</div>
									  		<div class="col-md-2">
									  			<input type="time" name="horario-hasta-cronograma-1" data-secuencia = "1"
									  			class="form-control"  required="required"  placeholder = "Hasta"
									  			data-toggle = "tooltip" data-original-title = "Horario final">
									  		</div><!-- /col-3: Horario hasta-->

									  		<div class = "col-md-1"></div><!-- vacío-->
									  	</div><!-- /row: Campos de Cronograma de Ejecución-->

									  	<!-- Registro de Comandos y Operaciones -->
									  	<br>
									  	<h4 class = "text-primary">Registro de Comandos y Operaciones </h4>

									  	<!-- Boton de Añadir y Eliminar formulario de Comandos y Operaciones-->
									  	<div class = "row">
									  		<div class="col-md-1">
									  			<a  class = "btn "
									  				data-id = "btn-add-forms-comandos-oper"
									  				data-secuencia = "1"
									  				data-toggle = "tooltip"  
									  				data-original-title = "Agregar formulario al final"
									  				data-placement = "top">

									  				<i class = "fa fa-plus fa-lg"></i> Añadir
									  			</a>
									  		</div><!-- /col-1-->

									  		<div class="col-md-1">
									  			<a  class = "btn red"
									  				data-id = "btn-remove-forms-comandos-oper"
									  				data-secuencia = "1"
											  		data-toggle = "tooltip"  
									  				data-original-title = "Eliminar último formulario"
									  				data-placement = "top">

									  				<i class = "fa fa-minus fa-lg"></i> Eliminar
									  			</a>
									  		</div><!-- /col-1-->

									  		<div class = "col-md-10"></div><!-- Vacío-->
										</div><!-- /row: Boton Añadir y Eliminar formulario de Comandos y Operaciones -->

										<!-- Lista de Comandos y Operaciones -->
										<div class = "row"  >
											<div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12" data-fcomandos-oper = "form-comando-oper-1">
												
												<!--Contador de numeros  de filas de comandos y operaciones -->
												<label class = "sr-only" id = "num-filas-comandos-oper-1" data-num-filas = "1"></label>

												<!--Campos Iniciales -->
												<div class="row" data-id = "sec-1-comando-oper-1"><!-- inner de Comandos y Operaciones -->
													<!-- Comando -->
													<div class = "col-md-3">
														<input type="text" name="comando-1-1" data-secuencia = "1"
														class="form-control"  required="required"  placeholder = "Comando"
														data-toggle = "tooltip" data-original-title = "Comando">
													</div><!-- /col-3: Comando -->

													<!-- Operación -->
													<div class = "col-md-3">
														<input type="text" name="operacion-1-1" data-secuencia = "1"
														class="form-control"  required="required"  placeholder = "Operación"
														data-toggle = "tooltip" data-original-title = "Operación a ejecutar">
													</div><!-- /col-3: Operación -->
													
													<div class = "col-md-6"></div><!-- Vacío-->

													<!-- /row: Comandos y Operaciones -->
												</div>

												<!-- A partir de aquí se agregar desde JQUERY -->

											</div><!-- /col-12-->
												
												<!-- /row: Lista de Comandos y Operaciones -->
										</div>

									</div><!-- /panel-body-->
									<!-- /panel-->
								</div>

								';
							}

						?>
							<!-- A partir de aquí se agregan los paneles desde JQUERY-->

						</div><!-- /col-12-->

					</div><!-- /row: Lista de Formularios de Cronograma de Ejecución -->



					<!-- UMBRALES -->
					<h3 class = "text-primary">Umbrales </h3><hr>
							
					<!-- Boton de Añadir y Eliminar formulario de Umbral-->
					<div class = "row">
						<div class="col-md-1">
							<a  class = "btn "
								id = "btn-add-forms-umbrales"
								data-toggle = "tooltip"  
								data-original-title = "Agregar formulario al final"
								data-placement = "top">

								<i class = "fa fa-plus fa-lg"></i> Añadir
							</a>
						</div><!-- /col-1-->

						<div class="col-md-1">
							<a  class = "btn red"
								id = "btn-remove-forms-umbrales"
								data-toggle = "tooltip"  
								data-original-title = "Eliminar último formulario"
								data-placement = "top">

								<i class = "fa fa-minus fa-lg"></i> Eliminar
							</a>
						</div><!-- /col-1-->

						<div class = "col-md-10"></div><!-- Vacío-->
					</div><!-- /row: Boton Añadir y Eliminar formulario -->

				
					<!-- Listas de Formularios de Umbrales -->
					<div class = "row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" data-fumbrales = "forms-umbrales">
							<!-- Lista de Filas donde estarán contenidos los forms de los umbrales -->

							<!-- Formulario inicial -->
							<?php
								if($actualizar){
									$n_umb = count($list_umbral);
								}else{
									$n_umb = 1;
								}
							?>
							<label class = "sr-only"  id = "num-filas-umbrales" data-num-filas = "<?php echo $n_umb;?>"></label>

							<?php
								if($actualizar){
									for ($i_umb=0; $i_umb < $n_umb; $i_umb++) { 
										$idx = $i_umb+1;
										$u = $list_umbral[$i_umb];
										echo '
											<div class = "row" data-id = "form-umbral-'.$idx.'" data-db-id = "'.$u['umbral_id'].'"> <!-- inner-->
												<div class = "col-md-3">
													<input type="text" name="descripcion-umbrales-'.$idx.'" data-secuencia = "'.$idx.'"
													 	class="form-control"  required="required"  placeholder = "Descripción"
													 	data-toggle = "tooltip" data-original-title = "Descripción del Umbral"
													 	value = "'.$u['descripcion'].'">
												</div>

												<div class = "col-md-3">
													<input type="number" name="tiempo-acordado-umbrales-'.$idx.'" min = "1" data-secuencia = "'.$idx.'"
													 	class="form-control"  required="required"  placeholder = "Tiempo"
													 	data-toggle = "tooltip" data-original-title = "Tiempo acordado"
													 	value = "'.$u['tiempo_acordado'].'"
													 	>
												</div>

												<div class = "col-md-3">
													<select name="medida-umbrales-'.$idx.'"  class="form-control" data-secuencia = "'.$idx.'"
														data-toggle = "tooltip" data-original-title = "Medida del Tiempo">';
														$medidas = array('hh'=>'Horas', 'mm'=>'Minutos', 'ss'=>'Segundos');
														foreach ($medidas as $key => $value) {
															if($key == $u['medida']){
																printf('<option value="%s" selected = "selected"> %s</option>',$key,$value);
															}else{
																printf('<option value="%s"> %s</option>',$key,$value);
															}
														}
											echo  '</select>
												</div>

												<div class = "col-md-3">
													<input type="number" name="valor-umbrales-'.$idx.'" min = "1" data-secuencia = "'.$idx.'"
													 	class="form-control"  required="required"  placeholder = "Valor"
													 	data-toggle = "tooltip" data-original-title = "Valor"
													 	value = '.$u['valor'].'
													 	>
												</div>

											</div>
										';
										echo '<br data-id = "form-umbral-'.$idx.'">';
									}

								}else{// Nuevo 
									echo '
										<div class = "row" data-id = "form-umbral-1"> <!-- inner-->
											<div class = "col-md-3">
												<input type="text" name="descripcion-umbrales-1" data-secuencia = "1"
												 class="form-control"  required="required"  placeholder = "Descripción"
												 data-toggle = "tooltip" data-original-title = "Descripción del Umbral">
											</div>

											<div class = "col-md-3">
												<input type="number" name="tiempo-acordado-umbrales-1" min = "1" data-secuencia = "1"
												 class="form-control"  required="required"  placeholder = "Tiempo"
												 data-toggle = "tooltip" data-original-title = "Tiempo acordado">
											</div>

											<div class = "col-md-3">
												<select name="medida-umbrales-1"  class="form-control" data-secuencia = "1"
													data-toggle = "tooltip" data-original-title = "Medida del Tiempo">
													<option value="hh"> Horas</option>
													<option value="mm"> Minutos </option>
													<option value="ss"> Segundos </option>
												</select>
											</div>

											<div class = "col-md-3">
												<input type="number" name="valor-umbrales-1" min = "1" data-secuencia = "1"
												 class="form-control"  required="required"  placeholder = "Valor"
												 data-toggle = "tooltip" data-original-title = "Valor">
											</div>

										</div>

										<br data-id = "form-umbral-1">
									';
								}
							?>
							<!-- De aquí en adelante se comienzan agregar formularios desde jquery -->

						</div><!-- /col-12-->
					</div><!-- /row: Umbrales -->


					<!-- PROCESOS -->
					<h3 class = "text-primary">Procesos </h3>
						<!-- Msjs de Error de nombre duplicado -->
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<!-- Mensaje de Error Inesperado -->
							<div class="alert alert-danger alert-dismissable hidden" id = "msj-nombres-duplicados-db">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								Los siguientes <strong>nombres</strong> de procesos no se encuentran disponibles:
							</div>	

							<div class="alert alert-danger alert-dismissable hidden" id = "msj-nombres-duplicados-local">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								Los <strong>nombres</strong> de procesos no pueden estar repetidos!
							</div>	
						</div>
					</div><!-- /row: Msjs Error de nombre duplicado -->

					<hr>

					<!-- Boton de Añadir y Eliminar formulario de Proceso-->
					<div class = "row">
						<div class="col-md-1">
							<a  class = "btn "
								id = "btn-add-forms-procesos"
								data-toggle = "tooltip"  
								data-original-title = "Agregar formulario al final"
								data-placement = "top">

								<i class = "fa fa-plus fa-lg"></i> Añadir
							</a>
						</div><!-- /col-1-->

						<div class="col-md-1">
							<a  class = "btn red"
								id = "btn-remove-forms-procesos"
								data-toggle = "tooltip"  
								data-original-title = "Eliminar último formulario"
								data-placement = "top">

								<i class = "fa fa-minus fa-lg"></i> Eliminar
							</a>
						</div><!-- /col-1-->

						<div class = "col-md-10"></div><!-- Vacío-->
					</div><!-- /row: Boton Añadir y Eliminar formulario - Proceso -->

					<!-- Listas de Formularios de Procesos -->
					<div class = "row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" data-fprocesos = "forms-procesos">
							<!-- Lista de Filas donde estarán contenidos los forms de los procesos -->

							<!-- Formulario inicial -->
							<?php 
								// Cantidad de elementos del proceso
								if($actualizar){
									$n_proceso = count($list_proceso);
								}else{
									$n_proceso = 1;
								}
							?>
							<label class = "sr-only"  id = "num-filas-procesos" data-num-filas = "<?php echo $n_proceso;?>"></label>

							<?php 
								if($actualizar){
									for ($i=0; $i < $n_proceso; $i++) { 
										$idx = $i+1;
										$pro = $list_proceso[$i];
										echo '
											<div class = "row" data-id = "form-proceso-'.$idx.'" data-db-id = "'.$pro['servicio_proceso_id'].'"> <!-- inner-->
												<!-- Nombre-->
												<div class = "col-md-4">
													<input type="text" name="nombre-procesos-'.$idx.'" data-secuencia = "'.$idx.'"
													 	class="form-control"  required="required"  placeholder = "Nombre"
													 	data-toggle = "tooltip" data-original-title = "Nombre del Proceso"
													 	value = "'.$pro['nombre'].'"
													 	>
												</div>
												<!-- Descripción (opcional) -->
												<div class = "col-md-4">
													<input type="text" name="descripcion-procesos-'.$idx.'"  data-secuencia = "'.$idx.'"
													 	class="form-control"  placeholder = "Descripción"
													 	data-toggle = "tooltip" data-original-title = "Descripción del Proceso (opcional)"
													 	value = "'.$pro['descripcion'].'"	
													 	>
												</div>
												
												<!-- Tipo (opcional) -->
												<div class = "col-md-4">
													<input type="text" name="tipo-procesos-'.$idx.'" data-secuencia = "'.$idx.'"
													 	class="form-control"  placeholder = "Tipo"
													 	data-toggle = "tooltip" data-original-title = "Tipo de Proceso (opcional)"
													 	value = "'.$pro['tipo'].'"
													 	>
												</div>
											</div><!-- /row: inner procesos -->
											<br data-id = "form-proceso-'.$idx.'">
										';

									}

								}else{ //Nuevo
									echo '
									<div class = "row" data-id = "form-proceso-1"> <!-- inner-->
										<!-- Nombre-->
										<div class = "col-md-4">
											<input type="text" name="nombre-procesos-1" data-secuencia = "1"
											 class="form-control"  required="required"  placeholder = "Nombre"
											 data-toggle = "tooltip" data-original-title = "Nombre del Proceso">
										</div>
										<!-- Descripción (opcional) -->
										<div class = "col-md-4">
											<input type="text" name="descripcion-procesos-1"  data-secuencia = "1"
											 class="form-control"  placeholder = "Descripción"
											 data-toggle = "tooltip" data-original-title = "Descripción del Proceso (opcional)">
										</div>
										
										<!-- Tipo (opcional) -->
										<div class = "col-md-4">
											<input type="text" name="tipo-procesos-1" data-secuencia = "1"
											 class="form-control"  placeholder = "Tipo"
											 data-toggle = "tooltip" data-original-title = "Tipo de Proceso (opcional)">
										</div>
									</div><!-- /row: inner procesos -->
									<br data-id = "form-proceso-1">

									<!-- De aquí en adelante se comienzan agregar formularios desde jquery -->


									';
								}


							?>

						</div><!-- /col-12-->
					</div><!-- /row: Procesos -->



					<!-- Boton Guardar-->
					<div class="row">
						<div class="col-xs-2 col-sm-2 col-md-1 col-lg-1">
							<button id = "btn-guardar-servicio" type="submit" class="btn btn-primary">Guardar</button>
						</div>

					</form><!-- /formulario -->

						<!-- Boton Cancelar-->
						<div class="col-xs-2 col-sm-2 col-md-1 col-lg-1">
							<a href = "<?php echo site_url('index.php/cargar_datos/servicios/1'); ?>" class="btn btn-danger">Cancelar</a>
						</div>

						<div class="col-xs-8 col-sm-8 col-md-11 col-lg-11"><!-- Vacío -->
						</div>

					</div>
				</div><!-- /panel-body-->
			</div><!-- /panel-default-->


		</div><!-- /col-12 -->
	</div><!-- /row-->

</div><!-- /page-wrapper-->