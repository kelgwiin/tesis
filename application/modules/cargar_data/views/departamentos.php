<div id = "page-wrapper">
	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<h1>Departamentos de la Organización</h1>
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
					Carga de los Departamentos de la Organización.</li>
				</ol>

				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Muestra una lista de todos los <strong>departamentos</strong> que se encuentran hasta el momento cargados. Además
					permite agregar nuevos  <strong>departamentos</strong> según las necesidades de la organización. De igual forma podrá
					editar la información asociada a ellos.
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
				
				<!-- Mensaje de Error Inesperado -->
				<div class="alert alert-danger alert-dismissable hidden" id = "msj-error-inesperado-basico">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Ha ocurrido un error <strong>inesperado</strong>.
				</div>

				

				<!-- Mensaje Lista Actualizada -->
				<?php 
					if($filtrado){
					echo '<div class="alert alert-success alert-dismissable" id = "msj-filtrado-dpto">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							La lista de Departamentos de TI ha sido <strong>Actualizada</strong>!
						</div>
					';
					}
				?>
		</div><!-- /col-12-->
	</div><!-- /row: breadcrumb - Cabecera-->


<!-- Cabecera:  Buscar, filtrar, nuevo-->
	<div class="row">
		<!-- Buscar, filtrar, nuevo-->
		<div class="col-lg-8">
			<!-- Formulario -->
			<form  class="form-inline" method = "post" 
				action = "<?php echo site_url('index.php/cargar_datos/departamentos/filtrar');?>" 
			>

				<!-- boton nuevo-->
				<div class = " form-group" >
					<a class = "btn btn-primary" 
					href = "<?php echo site_url('index.php/cargar_datos/departamentos/nuevo');?>"
					data-toggle="tooltip" 
					data-original-title="Agregar nuevo Departamento"
					data-placement = "top"
					><i class = "fa fa-plus-square fa-lg"></i></a>
				</div>
				
				<!-- lista de filtrado -->
				<div class = "form-group">
					<label class="sr-only" for="filtro-dpto">Filtro</label>
					<select name="filtro-dpto"
						 	id="filtro-dpto"
						 	class="form-control"
						 	data-toggle="tooltip"
							data-original-title="Opción de filtrado"
							data-placement = "top">
						<option value="todos">Todos</option>
						<option value="nombre">Nombre</option>
					</select>
				</div>

				<!--campo buscar -->
				<div class="form-group " id = "fg-buscar-dpto">
					<label class="sr-only" for="buscar">Buscar</label>
					<input type="text" class="form-control" id="buscar-dpto" name = "buscar" 
						placeholder="Buscar" required = "required" disabled="disabled">
				</div>

				<!-- boton de buscar-->
				<div class = "form-group">
					<label class="sr-only" for="btn-buscar-dpto">Botón Buscar</label>
					<button 
							class="btn btn-default"
							data-toggle="tooltip"
							data-original-title="Buscar Departamento(s)"
							data-placement = "top"
							id = "btn-buscar-dpto"
							type = "submit">

						<i class = "fa fa-search" ></i>
					</button>
				</div><!-- /form-group: btn buscar -->

				<!-- Mensaje de error campo buscar -->
				<div class = "form-group">
					<span id = "label-msj-error-dpto" class="label label-danger hidden">Ingrese datos en el campo buscar!</span>
				</div><!-- /form-group: Mensaje de error de campo buscar-->

			</form><!-- /form-inline: filtro de búsqueda -->
		</div><!-- /col-6: Buscar, filtrado, nuevo-->
		
		<div class="col-lg-4">	<!-- Vacío -->
		</div>
	</div><!-- /row: Cabecera: buscar, filtrar nuevo-->

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<hr>
		</div>
	</div>


<!-- Lista de Departamentos-->
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			
			<div class="panel panel-primary">
				<div class = "panel-heading"><!-- Outter -->
					<h3 class = "panel-title">Lista de Departamentos</h3>
				</div><!-- /panel-heading outter-->

				<div class = "panel-body">

					<div  class = "row">

						<!-- Columna IZQUIERDA -->
						<div class="col-xs-6 ">
							<?php
								function show_dpto($is_top,$config_pag,$list_dpto,
													$dpto_id,$cur_page=NULL){
								
								//$is_top Para verificar que no haya llegado al tope
								
								//Para que solo entre la primera vez
								if(!isset($dpto_id)){
									$cur_page = ($config_pag['cur_page']-1)*$config_pag['per_page'];
									$dpto_id = $list_dpto[$cur_page]['dpto']['departamento_id'];
								}
								
								$j = 1;
								$mid_per_page = (int)($config_pag['per_page']/2);
								
								while(!$is_top && $j<= $mid_per_page){
									$dpto = $list_dpto[$cur_page]['dpto'];//Departamento
									$l_ci = $list_dpto[$cur_page]['list_comp_ti'];//lista de componente de TI
									
									//Nombre
									echo '
									<!-- Departamento: dpto'.$dpto_id.' -->
									<div class="panel panel-info" data-id = "panel-item-dpto'.$dpto_id.'"><!-- Inner-->

										<div class="panel-heading">
											<div class="row">
												
												<!-- Nombre de Componente & Botones (Izquierda)-->
												<div class = "col-xs-10">
													<!-- Nombre de Componente-->
													<div class = "row">
														<div class = "col-xs-12">
															<p>'.$dpto['nombre'].'</p>
														</div><!-- col-12 -->	
													</div><!-- /row -->
									';
									//Botones
									$url_ed = site_url('index.php/cargar_datos/departamentos/actualizar/'.$dpto_id);
									echo '
										<!-- Botones: Desplegar, editar, eliminar-->
										<div class="row">
											<div class = "col-xs-6">
												<div class="btn-group">
													<!-- Botón de despliegue-->
													<a  class="btn"
														data-id = "'.$dpto_id.'"
														data-fieldIT = "caracteristicas"
														data-toggle="tooltip" 
														data-original-title="Características"
														data-placement = "bottom">
														<i id = "dpto1" class = "fa fa-caret-right fa-lg"></i>	
													</a>
													<a  class="btn"
														href = "'.$url_ed.'"
														data-id = "'.$dpto_id.'"
														data-fieldIT = "editar"
														data-toggle="tooltip" 
														data-original-title="Editar"
														data-placement = "bottom">
														<i class = "fa fa-pencil fa-lg"></i>	
													</a>
													<a  class="btn"
														data-id = "dpto1"
														data-fieldIT = "eliminar-dpto"
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

									</div><!-- /col-xs-10 -->
									';

									//Logotipo
									echo '
												<!-- Logotipo de Categoría (Derecha)-->
												<div class="col-xs-2">
													<i
														class = "fa '.$dpto['icono_fa'].' fa-3x"></i>
												</div>
											</div><!-- /row-->
										</div><!-- /panel-heading-->
									';

									//Características & Descripción 
									echo '
										<div class="panel-body hidden" data-id = "'.$dpto_id.'">
											<!-- Etiqueta Característica -->
											<div class = "row">
												<div class = "col-xs-12">
													<h3>Características</h3>
												</div><!--/col-xs-12 -->
											</div><!-- /row-->

											<!-- Lista de características-->
											<div class="row">
												<div class = "col-xs-12">
													<ul>
														<li><p class = "text-muted">Descripción</p> '.$dpto['descripcion'].'</li>
													</ul>
												</div>	
											</div>
									';

									//Lista de componentes de ti
									echo '
													<div class = "row">
														<div class = "col-xs-12">
															<ul>
																<li>
																	<p class = "text-muted">Fecha de Creación</p>
																	 <span
																	 	data-toggle = "tooltip"
																	 	data-original-title = "Fecha de creación del último inventario"
																	 	data-placement = "right"
																	 > '.$dpto['fecha_creacion'].'</span></li><br>
																<li>
																	<p class = "text-muted"><strong>Componentes de TI</strong></p> 
																		<ul>';
									//Lista de componentes de TI
									foreach ($l_ci as $v) {
										printf('<li>%s <code>ref#%d</code></li>',$v['nombre'],$v['id']);
									}
									echo '
																		</ul>
																</li>
															</ul>
														</div>
													</div><!-- /row-->	
												</div><!-- /panel-body -->
											</div> <!-- panel-info -->
											<br>
									';

									$cur_page+=1;
									if(isset($list_dpto[$cur_page])){
										$dpto_id = $list_dpto[$cur_page]['dpto']['departamento_id'];
									}else{
										$is_top = true;//Es el fin del array
									}
									$j++;
									
								}
								
									return array(
										'dpto_id' => $dpto_id,
										'cur_page' => $cur_page,
										'is_top' => $is_top);
								}//end-of function: show_dpto

								//Se despliegan los componentes de ti y
								//se obtienen: cur_page, comp_id, is_top
								if($config_pag['total_rows'] > 0){
									$rs = show_dpto(FALSE, $config_pag, $list_dpto, NULL);
								}else{
									echo '<h3 class = "text-muted"> La búsqueda ha generado cero (0) resultados</h3>';
								}
								

							?>
						</div><!-- columna izquierda-->

						<!-- Columna DERECHA-->
						<div class="col-xs-6">
							<?php
								if($config_pag['total_rows'] > 0){
									show_dpto($rs['is_top'], $config_pag, $list_dpto, $rs['dpto_id'],
									 $rs['cur_page']);
								}else{
									echo '<h3 class = "text-muted"> La búsqueda ha generado cero (0) resultados</h3>';
								}
							?>
						</div><!-- inner row-->

					</div><!-- /row: outter-->
				</div><!-- /panel-body-->			
			</div><!-- /panel info-->

		</div><!-- /col 12-->
	</div><!-- /row panel principal-->

	<!-- Boton Nuevo -->
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
			<a class = "btn btn-primary" 
			href = "<?php echo site_url('index.php/cargar_datos/departamentos/nuevo');?>"
			data-toggle="tooltip" 
			data-original-title="Agregar nuevo Departamento"
			data-placement = "top">
			<i class = "fa fa-plus-square fa-lg"></i> Nuevo
		</a>
	</div>
	<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11"></div><!-- Vacío-->
</div><!-- /row: btn Nuevo-->

<!-- Paginación-->
<div class="row">
	<div class="col-md-12">
		<center>
		<?php 
			$config_pag['url'] = site_url('index.php/cargar_datos/departamentos');
			pagination($config_pag);
		?>
		</center>
	</div><!-- /col-12 -->
</div><!-- /row: Paginación-->

<!-- Direccionamiento de formularios-->
<div class = "row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<ul class="pager">
		  <!-- Boton de Componentes de TI -->
		  <li class="previous">
		  	<a	href = "<?php echo site_url('index.php/cargar_datos/componentes_ti/1');?>"
				data-toggle="tooltip"
				data-original-title="Cargar Componentes de TI"
				data-placement = "top"
		  	><i class ="fa fa-long-arrow-left"></i> <strong>Componentes de TI</strong></a>
		  </li>

		<!-- Boton de Servicios-->
		  <li class="next">
		  	<a 	href = "<?php echo site_url('index.php/cargar_datos/servicios');?>"
				data-toggle="tooltip"
				data-original-title="Cargar Servicios"
				data-placement = "top"
		  	><strong>Servicios</strong> <i class ="fa fa-long-arrow-right"></i></a>
		  </li>

		  
		</ul>
	</div>
</div>
<!-- Fin de Direccionamiento de formularios -->



</div><!-- end of: page-wrapper-->