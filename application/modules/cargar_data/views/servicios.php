<!-- Scripts para el msj Modal (jquery-ui pluggin )-->
<script src="<?php echo site_url('assets/front/jquery-ui/js/jquery.ui.core.js');?>"></script>
<script src="<?php echo site_url('assets/front/jquery-ui/js/jquery.ui.datepicker.js');?>"></script>
<script src="<?php echo site_url('assets/front/jquery-ui/js/jquery.ui.widget.js');?>"></script>
<script src="<?php echo site_url('assets/front/jquery-ui/js/jquery.ui.mouse.js');?>"></script>
<script src="<?php echo site_url('assets/front/jquery-ui/js/jquery.ui.button.js');?>"></script>
<script src="<?php echo site_url('assets/front/jquery-ui/js/jquery.ui.draggable.js');?>"></script>
<script src="<?php echo site_url('assets/front/jquery-ui/js/jquery.ui.position.js');?>"></script>
<script src="<?php echo site_url('assets/front/jquery-ui/js/jquery.ui.dialog.js');?>"></script>

<!-- Config CSS-->
<link rel="stylesheet" href="<?php echo site_url('assets/front/jquery-ui/css/themes/ui-lightness/jquery.ui.all.css');?>">
<!-- /Fin de Scripts de librerías para Modal -->

<!-- Inicialización del Dialog-Modal -->
<script>
$(function() {
	$( "div#confirm-delete" ).dialog({
		autoOpen: false,
		resizable: false,
		height:200,
		width: 470,
		modal: true,
		buttons: {
			"Eliminar": function() {
				//Eliminando el departamento desde AJAX
				
				$( this ).dialog( "close" );
				//Desarrollar		

				var id  = $(this).attr('data-id');
				alert(id);
			},
			Cancelar: function() {
				$( this ).dialog( "close" );
			}
		}
	});
	

});
</script>

<!-- Inicio del Cuerpo de la Página -->
<div id = "page-wrapper">
	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<h1>Servicios</h1>
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
					Carga de los Servicios.</li>
				</ol>

				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Muestra una lista de todos los <strong>Servicios</strong> que se encuentran hasta el momento cargados. Además
					permite agregar nuevos  <strong>servicios</strong> según las necesidades de la organización. De igual forma podrá
					editar la información asociada a ellos.
				</div>

				<div class="alert alert-success alert-dismissable hidden" id = "main-componentes-ti-guardado">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					El Servicio ha sido <strong>creado</strong> con Éxito!
				</div>

				<!-- Mensaje de Creado con Éxito-->
				<?php 
					if($guardado){
					echo '<div class="alert alert-success alert-dismissable" id = "msj-guardado-dpto">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							El Departamento ha sido <strong>creado</strong> con Éxito!
						</div>
					';
					}
				?>


				<!-- Mensaje de Actualizado con Éxito-->
				<?php 
					if($actualizado){
					echo '<div class="alert alert-success alert-dismissable" id = "msj-actualizado-dpto">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							El Servicio ha sido <strong>actualizado</strong> con éxito!
						</div>
					';
					}
				?>

				<!-- Mensaje Lista Actualizada -->
				<?php 
					if($filtrado){
					echo '<div class="alert alert-success alert-dismissable" id = "msj-filtrado-dpto">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							La lista de Servicios de TI ha sido <strong>Actualizada</strong>!
						</div>
					';
					}
				?>
			</div><!-- /col-12-->
		</div><!-- /row: breadcrumb -->

<!-- Cabecera:  Buscar, filtrar, nuevo-->
	<div class="row">
		<!-- Buscar, filtrar, nuevo-->
		<div class="col-lg-6">
			<!-- Formulario de Filtrar -->
			<form action = "<?php echo site_url('index.php/cargar_datos/servicios/filtrar/pag/1');?>" 
				class="form-inline"  method = "GET">

				<!-- boton nuevo-->
				<div class = " form-group" >
					<a class = "btn btn-primary" 
					href = "<?php echo site_url('index.php/cargar_datos/servicios/nuevo');?>"
					data-toggle="tooltip" 
					data-original-title="Agregar nuevo Servicio"
					data-placement = "top"
					><i class = "fa fa-plus-square fa-lg"></i></a>
				</div>

				<!-- checkbox de Genera Ingresos-->
				<div class = "form-group">
					
					<div class="checkbox">
						<label
						data-toggle = "tooltip"
						data-original-title = "¿El Servicio genera ingresos?">
							<input type="checkbox" name = 'genera_ingresos'>
							Genera Ingresos 
						</label>
					</div><!-- /checkbox-->

				</div><!-- /form-group: Checkbox Genera Ingresos -->

				<!-- lista de filtrado -->
				<div class = "form-group">
					<label class="sr-only" for="filtro_servicio">Filtro</label>
					<select name="filtro_servicio"
						 	id="filtro-servicio"
						 	class="form-control"
						 	data-toggle="tooltip"
							data-original-title="Opción de filtrado"
							data-placement = "top">
						<option value="todos">Todos</option>
						<option value="USR">Serv. Usuario</option>
						<option value="SYS">Serv. Sistema</option>
						<option value="nombre">Nombre</option>
						<option value="ingresos">Por Ingreso</option>
					</select>
				</div>

				<!--campo buscar -->
				<div class="form-group " id = "fg-buscar-servicio">
					<label class="sr-only" for="buscarServicios">Buscar</label>
					<input type="text" class="form-control" id="input-buscar-servicio" 
						name = "buscar_servicio" placeholder="Buscar"
						disabled="disabled" 
					>
				</div>
				

				<!-- boton de buscar-->
				<div class = "form-group">
					<label class="sr-only" for="btnBuscar">btnBuscar</label>
					<button 
							class="btn btn-default"
							data-toggle="tooltip"
							data-original-title="Buscar Servicio(s)"
							data-placement = "top"
							id = "btn-buscar-servicio"
							type = "submit">
						<i class = "fa fa-search" ></i>
					</button>
				</div><!-- /form-group: btn Buscar-->

				<!-- Mensaje de error campo buscar -->
				<div class = "form-group">
					<span id = "label-msj-error-servicio" class="label label-danger hidden">Ingrese datos en el campo buscar!</span>
				</div><!-- /form-group: Mensaje de error de campo buscar-->
			
			</form><!-- /form-inline-->
		</div><!-- /col-6: Buscar, filtrado, nuevo-->
		
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">	
		</div></div>
	</div><!-- /row: Cabecera: buscar, filtrar nuevo-->

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<hr>
		</div>
	</div>

<!-- Lista de Servicios-->
<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?php 
				function show_servicio($is_top,$org,$config_pag,$list_servicio,
									$servicio_id,$cur_page=NULL){
					//$is_top Para verificar que no haya llegado al tope
					
					//Para que solo entre la primera vez
					if(!isset($servicio_id)){
						$cur_page = ($config_pag['cur_page']-1)*$config_pag['per_page'];
						$servicio_id = $list_servicio[$cur_page]['servicio_id'];
					}
					
					$j = 1;
					$mid_per_page = (int)($config_pag['per_page']/2);

					while(!$is_top && $j<= $mid_per_page){
						$s = $list_servicio[$cur_page];//Servicio
						
						//Nombre y botones
						$url_ed = site_url('index.php/cargar_datos/servicios/actualizar/'.$servicio_id);
						echo '
							<!-- Servicio: '.$servicio_id.' -->
							<div class="panel panel-info"><!-- Inner-->
								<div class="panel-heading">
									<div class="row">
										
										<!-- Nombre de Componente & Botones (Izquierda)-->
										<div class = "col-xs-10">
											<!-- Nombre de Componente-->
											<div class = "row">
												<div class = "col-xs-12">
													<p>'.$s['nombre'].'</p>
												</div><!-- col-12 -->	
											</div><!-- /row -->
											
											<!-- Botones: Desplegar, editar, eliminar-->
											<div class="row">
												<div class = "col-xs-6">
													<div class="btn-group">
														<!-- Botón de despliegue-->
														<a  class="btn"
															data-id = "'.$servicio_id.'"
															data-fieldIT = "caracteristicas"
															data-toggle="tooltip" 
															data-original-title="Características"
															data-placement = "bottom">
															<i id = "'.$servicio_id.'" class = "fa fa-caret-right fa-lg"></i>	
														</a>
														<a  class="btn"
															data-id = "'.$servicio_id.'"
															data-fieldIT = "editar"
															data-toggle="tooltip" 
															data-original-title="Editar"
															data-placement = "bottom"
															href = "'.$url_ed.'">
															<i class = "fa fa-pencil fa-lg"></i>	
														</a>
														<a  class="btn"
															data-id = "'.$servicio_id.'"
															data-fieldIT = "eliminar"
															data-toggle="tooltip" 
															data-original-title="Eliminar"
															data-placement = "bottom">
															<i class = "fa fa-times fa-lg"></i>	
														</a>
													</div><!-- /btn-group -->
												</div><!-- /col-xs-6-->

												<!-- Vacío, completar espacio-->
												<div class = "col-xs-6"></div>
											</div><!-- row -->

										</div><!-- /col-xs-10 -->';

						//Logotipo
						$fa_logo = $s['tipo']== 'USR'?'fa-user':'fa-cog';
						$name_serv = $s['tipo']== 'USR'?'Usuario':'Sistema';

						echo '<!-- Logotipo del Servicio (Derecha)-->
										<div class="col-xs-2">
											<i
												data-toggle="tooltip" 
												data-original-title="Servicio de '.$name_serv.'"
												data-placement = "top"
												class = "fa '.$fa_logo.' fa-3x"></i>
										</div>
									</div><!-- /row-->
								</div><!-- /panel-heading-->


								<div class="panel-body hidden" data-id = "'.$servicio_id.'">
									<!-- Etiqueta Característica -->
									<div class = "row">
										<div class = "col-xs-12">
											<h3>Características</h3>
										</div><!--/col-xs-12 -->
									</div><!-- /row-->
								';

						//Datos Básicos
						$cant_ingr = $s['cantidad_ingresos'] == 0?'NA':($s['cantidad_ingresos'].' '.$org['abrev_moneda'].' por transacción') ;
						echo '<!-- ::: Lista de CARACTERÍSTICAS ::: -->

									<!-- DATOS BÁSICOS -->
									<div class="row">
										<div class = "col-xs-12">
											<h4> 
												<a 	class = "btn"
													data-toggle ="tooltip"
													data-original-title = "Mostrar"
													data-fieldIT = "caracteristicas-servicios"
													data-id = "datos-basicos'.$servicio_id.'">

													<i id = "datos-basicos'.$servicio_id.'" class = "fa fa-caret-right fa-lg"></i>
												</a>
												Datos Básicos
											</h4>

											<div class = "hidden" data-id = "datos-basicos'.$servicio_id.'">
												<div class = "row">
													<div class = "col-xs-6"><!-- col izq -->
														<ul>
															<li><p class = "text-muted">Descripción </p> '.$s['descripcion'].'</li><br>
															<li><p class = "text-muted">Fecha de creación</p>'.$s['fecha_creacion'].'</li>
														</ul>
													</div>	

													<div class = "col-xs-6"><!-- col der -->
														<ul>
															<li><p class = "text-muted">Tipo de Servicio</p>'.$name_serv.'</li><br>
															<li><p class = "text-muted">Genera Ingresos</p> '.$cant_ingr.'</li>
														</ul>
													</div>	
												</div><!-- /row: datos básicos -->

												<hr>
											</div><!-- /datos-basicos-->

										</div><!-- /col-12 -->	
									</div><!-- /row: Datos Básicos -->';

						//Cronograma de Ejecución
						echo '
									<!-- CRONOGRAMA ESTIMADO DE EJECUCIÓN  -->
									<div class="row">
										<div class = "col-xs-12">
											<h4> 
												<a 	class = "btn"
													data-toggle ="tooltip"
													data-original-title = "Mostrar"
													data-fieldIT = "caracteristicas-servicios"
													data-id = "cronograma-estimado-ejecucion'.$servicio_id.'">

													<i id = "cronograma-estimado-ejecucion'.$servicio_id.'" class = "fa fa-caret-right fa-lg"></i>
												</a>
												Cronograma estimado de ejecución
											</h4>
											<!-- Tabla con el cronograma -->
											<div class = "hidden" data-id = "cronograma-estimado-ejecucion'.$servicio_id.'" >

												<table class="table table-condensed table-hover">
													<thead>
														<tr>
															<th>Descripción</th>
															<th>Desde</th>
															<th>Hasta</th>
															<th>Operación/Comando</th>
														</tr>
													</thead>

													<tbody>';
						foreach ($s['list_tarea'] as $t) {
							echo 					'<tr>
															<td>'.$t['descripcion'].'</td>
															<td>'.$t['horario_desde'].'</td>
															<td>'.$t['horario_hasta'].'</td>';

							echo '						<!-- Lista de Operaciones/Comandos-->
															<td>
																<a  class="btn"
																data-id = "comandos-operaciones'.$t['tarea_id'].'"
																data-fieldIT = "comandos-operaciones"
																data-toggle="tooltip" 
																data-original-title="Comandos y Operaciones"
																data-placement = "bottom">
																<i id = "comandos-operaciones'.$t['tarea_id'].'" class = "fa fa-ellipsis-h fa-lg"></i>	
																</a>
															<ul data-id = "comandos-operaciones'.$t['tarea_id'].'" class = "hidden">';
							//tarea detalle
							foreach ($t['list_tarea_detalle'] as $td) {
								echo 							'<li>'.$td['comando'].' | '.$td['operacion'].'</li>';
							}

							echo '							</ul>
															</td><!-- /Celda: Operaciones/Comandos-->
														</tr>';
						}
						echo '						</tbody>
												</table>

												<hr>
											</div><!--/tabla: Cronograma de Ejecución -->

										</div><!-- /col-12 -->	

									</div><!-- /row: Cronograma Estimado de Ejecución --><!-- Cronograma Estimado de Ejecución  -->';

														
						//Umbrales
						echo '

									<!-- UMBRALES-->
									<div class="row">
										<div class = "col-xs-12">
											<h4> 
												<a 	class = "btn"
													data-toggle ="tooltip"
													data-original-title = "Mostrar"
													data-fieldIT = "caracteristicas-servicios"
													data-id = "umbrales'.$servicio_id.'">

													<i id = "umbrales'.$servicio_id.'" class = "fa fa-caret-right fa-lg"></i>
												</a>
												Umbrales
											</h4>

											<!-- Tabla de Umbrales -->
											<div class = "hidden" data-id = "umbrales'.$servicio_id.'">
												<table class="table table-condensed table-hover">
													<thead>
														<tr>
															<th>Descripción</th>
															<th>Tiempo A.</th>
															<th>Valor</th>
															<th>Medida</th>
														</tr>
													</thead>

													<tbody>

						';

						foreach ($s['list_umbral'] as $u) {
							echo '
								<tr>
									<td>'.$u['descripcion'].'</td>
									<td>'.$u['tiempo_acordado'].'</td>
									<td>'.$u['valor'].'</td>
									<td>'.$u['medida'].'</td>

								</tr>
							';
						}
						echo '
											</tbody>
										</table>
									</div><!-- /umbrales-->
								</div><!-- /col-12 -->	
							</div><!-- /row: Umbrales -->
						';

						//Procesos
						echo '
								<!-- PROCESOS-->
								<div class="row">
									<div class = "col-xs-12">
										<h4> 
											<a 	class = "btn"
												data-toggle ="tooltip"
												data-original-title = "Mostrar"
												data-fieldIT = "caracteristicas-servicios"
												data-id = "procesos'.$servicio_id.'">

												<i id = "procesos'.$servicio_id.'" class = "fa fa-caret-right fa-lg"></i>
											</a>
											Procesos
										</h4>

										<!-- Tabla de Procesos -->
										<div class = "hidden" data-id = "procesos'.$servicio_id.'">
											<table class="table table-condensed table-hover">
												<thead>
													<tr>
														<th>Nombre</th>
														<th>Tipo</th>
														<th>Descripción</th>
													</tr>
												</thead>

												<tbody>
						';
						foreach ($s['list_proceso'] as $p) {
							echo '
								<tr>
									<td>'.$p['nombre'].'</td>
									<td>'.$p['tipo'].'</td>
									<td>'.$p['descripcion'].'</td>

								</tr>
							';
						}
						echo '
											</tbody>
										</table>
									</div><!-- /umbrales-->
								</div><!-- /col-12 -->	
							</div><!-- /row: Procesos -->
						';

						echo '
								</div><!-- /panel-body -->
							</div> <!-- panel-info -->

							<br>
						';

						$cur_page+=1;
						if(isset($list_servicio[$cur_page])){
							$servicio_id = $list_servicio[$cur_page]['servicio_id'];
						}else{
							$is_top = true;//Es el fin del array
						}
						$j++;

					}
					return array(
						'servicio_id' => $servicio_id,
						'cur_page' => $cur_page,
						'is_top' => $is_top);

				}


			?>


			<div class="panel panel-primary">
				<div class = "panel-heading"><!-- Outter -->
					<h3 class = "panel-title">Lista de Servicios</h3>
				</div><!-- /panel-heading outter-->

				<div class = "panel-body">

					<div  class = "row">
						<!-- Columna IZQUIERDA -->
						<div class="col-xs-6 ">
							<?php
								if($config_pag['total_rows'] > 0){
									$rs = show_servicio(FALSE, $org, $config_pag, $list_servicio, NULL);
								}else{
									echo '<h3 class = "text-muted"> La búsqueda ha generado cero (0) resultados</h3>';
								}
							?>
						</div><!-- Columna IZQUIERDA-->


						<!-- Columna DERECHA-->
						<div class="col-xs-6">
							<?php
								if($config_pag['total_rows'] > 0){
									show_servicio($rs['is_top'],$org, $config_pag, $list_servicio, $rs['servicio_id'],
									 $rs['cur_page']);
								}
							?>
						</div><!-- columna Derecha-->



					</div><!-- inner row-->

				</div><!-- /panel-body-->			
			</div><!-- /panel info-->

		</div><!-- /col 12-->
</div><!-- /row panel principal-->

<!-- Boton Nuevo -->
<div class="row">
	<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
		<a class = "btn btn-primary" 
			href = "<?php echo site_url('index.php/cargar_datos/servicios/nuevo');?>"
			data-toggle="tooltip" 
			data-original-title="Agregar nuevo Servicio"
			data-placement = "top">
			<i class = "fa fa-plus-square fa-lg"></i> Nuevo
		</a>
	</div><!-- /col-1 -->
	<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11"></div><!-- Vacío-->
</div><!-- /row: btn Nuevo-->

<!-- Paginación-->
<div class="row">
	<div class="col-md-12">
		<center>
		<?php 
			if(!$filtrado){
				$config_pag['url'] = site_url('index.php/cargar_datos/servicios');
			}else{
				$config_pag['url'] = site_url('index.php/cargar_datos/servicios/filtrar/pag');
			}
				pagination($config_pag);

		?>
		</center>
	</div><!-- /col-12 -->
</div><!-- /row: Paginación-->


<!-- Direccionamiento de formularios-->
<div class = "row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<ul class="pager">
		  <!-- Boton Departamentos -->
		  <li class="previous">
		  	<a	href = "<?php echo site_url('index.php/cargar_datos/departamentos/1');?>"
				data-toggle="tooltip"
				data-original-title="Cargar Departamentos"
				data-placement = "top"
		  	><i class ="fa fa-long-arrow-left"></i> <strong>Departamentos</strong></a>
		  </li>
		  
		</ul>
	</div>
</div>
<!-- Fin de Direccionamiento de formularios -->

<!-- Modal: Confirmar Eliminación-->
<div id="confirm-delete" data-id = "-1">
	<div class = "row">
		<!-- Ícono -->
		<div class = "col-md-1 col-md-offset-1">
			<i class = "fa fa-question-circle fa-4x"></i>
		</div><!-- /col-md-1 -->
		
		<!-- Cuerpo del msj -->
		<div class = "col-md-10">
			<h4 class= "text-center"> 
			¿Está seguro que desea <strong>eliminar</strong> <br>el servicio?</h4>			
		</div><!-- /col-md-10 -->

	</div><!-- /row-->
</div><!-- /Modal: confirm-delete -->


</div><!-- end of: page-wrapper-->