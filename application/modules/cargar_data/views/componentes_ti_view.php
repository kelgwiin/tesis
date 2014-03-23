<div id = "page-wrapper">
<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<h1>Componentes de TI </h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
					Carga de los componentes de tecnología de información (TI) de la organización.</li>
			</ol>

			<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Muestra una lista de todos los <strong>Componentes de TI</strong> que se encuentran hasta el momento cargados. Además
					permite agregar nuevos componentes según las necesidades de la organización. De igual forma podrá
					editar la información asociada a ellos.
			</div>

			<div
				<?php
					if(isset($guardado_exitoso) && $guardado_exitoso){
						echo 'class="alert alert-success alert-dismissable show"';
					}else{
						echo 'class="alert alert-success alert-dismissable hidden"';
					}
				?> 
				id = "msj-componente-ti-guardado">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				El Componente de TI ha sido <strong>creado</strong> con Éxito!
			</div>

			<!-- Mensaje de Error Inesperado -->
			<div class="alert alert-danger alert-dismissable hidden" id = "msj-error-inesperado-basico">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Ha ocurrido un error <strong>inesperado</strong>.
			</div>

		</div><!-- /col-12-->
	</div><!-- /row: breadcrumb - Cabecera-->


	<!-- Cabecera:  Buscar, filtrar, nuevo-->
	<div class="row">
		<!-- Buscar, filtrar, nuevo-->
		<div class="col-lg-6">

			<div  class="form-inline">
				<!-- Nota: Esto por lo general debería usarse con la etiqueta "form"
				pero para efectos de formtateo de la página (línea) funciona, lo uso con la
				etiqueta "div" porque me interesa tener dos botones que hagan distintas
				acciones, lo cual no podría hacer si usara la etiqueta "form"-->

				<!-- boton nuevo-->
				<div class = " form-group" >
					<a class = "btn btn-primary" 
					href = "<?php echo site_url('index.php/cargar_datos/componentes_ti/nuevo');?>"
					data-toggle="tooltip" 
					data-original-title="Agregar nuevo componente de TI"
					data-placement = "top"
					><i class = "fa fa-plus-square fa-lg"></i></a>
				</div>

				<!--campo buscar -->
				<div class="form-group ">
					<label class="sr-only" for="buscarComponentesTI">Buscar</label>
					<input type="text" class="form-control" id="buscar" name = "buscarComponentesTI" placeholder="Buscar">
				</div>
				
				<!-- lista de filtrado -->
				<div class = "form-group">
					<label class="sr-only" for="filtroComponentesTI">Filtro</label>
					<select name="filtroComponentesTI"
						 	id="filtroComponentesTI"
						 	class="form-control"
						 	data-toggle="tooltip"
							data-original-title="Opción de filtrado"
							data-placement = "top">
						<option>Todos</option>
						<option value="nombre">Nombre</option>
						<option value="categoria">Categoría</option>
					</select>
				</div>

				<!-- boton de buscar-->
				<div class = "form-group">
					<label class="sr-only" for="btnBuscar">btnBuscar</label>
					<button 
							class="btn btn-default"
							data-toggle="tooltip"
							data-original-title="Buscar Componente(s) de TI"
							data-placement = "top"
							id = "btn-buscar-componente-ti">
						<i class = "fa fa-search" ></i>
					</button>
				</div>
			</div>
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

	<!-- Lista de Componentes de TI-->
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			
			<div class="panel panel-primary">
				<div class = "panel-heading"><!-- Outter -->
					<h3 class = "panel-title">Lista de Componentes de TI</h3>
				</div><!-- /panel-heading outter-->

				<div class = "panel-body">
					<div  class = "row">

					<!-- Columna IZQUIERDA -->
						<div class="col-xs-6 ">		
						<?php 
							
							function showCompTI($is_top,$config_pag,$list_comp_ti,
								$list_categ,$list_unidad_medida,$org,$comp_id,$cur_page=NULL){
								
								//$is_top Para verificar que no haya llegado al tope
								
								//Para que solo entre la primera vez
								if(!isset($comp_id)){
									$cur_page = ($config_pag['cur_page']-1)*$config_pag['per_page'];
									$comp_id = $list_comp_ti[$cur_page]['componente_ti_id'];
								}
								$j = 1;
								$mid_per_page = (int)($config_pag['per_page']/2);

							while(!$is_top && $j<= $mid_per_page){
								$item_comp = $list_comp_ti[$cur_page];
								$item_uni = $list_unidad_medida[$item_comp['ma_unidad_medida_id']];
								$item_categ = $list_categ[$item_uni['ma_categoria_id']];

								echo '<!-- Componente: comp'.$comp_id.' -->
									<div class="panel panel-info"><!-- Inner-->

									<div class="panel-heading">
									<div class="row">

									<!-- Nombre de Componente & Botones (Izquierda)-->
										<div class = "col-xs-10">
											<!-- Nombre de Componente-->
											<div class = "row">
												<div class = "col-xs-12">

									';
								//nombre del componente
								printf('<p>%s</p>',$item_comp['nombre']);

								echo '			</div><!-- col-12 -->	
											</div><!-- /row -->
											
											<!-- Botones: Desplegar, editar, eliminar-->
											<div class="row">
												<div class = "col-xs-6">
													<div class="btn-group">';
								 echo '
														<!-- Botón de despliegue-->
														<a  class="btn"
															data-id = "comp'.$comp_id.'"
															data-fieldIT = "caracteristicas"
															data-toggle="tooltip" 
															data-original-title="Características"
															data-placement = "bottom">
															<i id = "comp'.$comp_id.'" class = "fa fa-caret-right fa-lg"></i>	
														</a>
														<a  class="btn"
															data-id = "comp'.$comp_id.'"
															data-fieldIT = "editar"
															data-toggle="tooltip" 
															data-original-title="Editar"
															data-placement = "bottom">
															<i class = "fa fa-pencil fa-lg"></i>	
														</a>
														<a  class="btn"
															data-id = "comp'.$comp_id.'"
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
								//categoría
								echo '<!-- Logotipo de Categoría (Derecha)-->
										<div class="col-xs-2">
											<i
												data-toggle="tooltip" 
												data-original-title="Categ. '.$item_categ['nombre'].'"
												data-placement = "top"
												class = "fa '.$item_categ['icono_fa'].' fa-3x"></i>
										</div>
									</div><!-- /row-->
								</div><!-- /panel-heading-->';
								echo '
									<div class="panel-body hidden" data-id = "comp'.$comp_id.'">
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
												<li><p class = "text-muted">Descripción</p> '.$item_comp['descripcion'].'</li>
											</ul>
										</div>	
									</div>

									<div class = "row">
										<div class = "col-xs-6">
											<ul>
												<li><p class = "text-muted">Fecha de Compra</p>'.$item_comp['fecha_compra'].'<br><br></li>
												<li><p class = "text-muted">Fecha de Creación</p> '.$item_comp['fecha_creacion'].'<br><br></li>
												<li><p class = "text-muted">Fecha de Elaboración</p> '.$item_comp['fecha_elaboracion'].'<br><br></li>
												<li><p class = "text-muted">Tiempo de Vida</p> '.$item_comp['tiempo_vida'].' '.
												nomtime($item_comp['unidad_tiempo_vida']).' <br><br></li>
											</ul>
										</div>
										
										<div class = "col-xs-6">
											<ul>
												<li><p class = "text-muted">Precio</p> '.$item_comp['precio'].' '.$org['abrev_moneda'].'<br><br></li>
												<li><p class = "text-muted">Capacidad</p> '.$item_comp['capacidad'].' '.
												($item_uni['abrev_nombre']=='NA'?"":$item_uni['abrev_nombre']).' (c/u)<br><br></li>
												<li><p class = "text-muted">Cantidad</p> '.$item_comp['cantidad'].'<br><br></li>
											</ul>
										</div>
										

									</div><!-- /row-->	


									</div><!-- /panel-body -->
									</div> <!-- panel-info -->
									<br>

								';


								printf('<label class ="sr-only">%s</label>',$comp_id);
								$cur_page+=1;
								if(isset($list_comp_ti[$cur_page])){
									$comp_id = $list_comp_ti[$cur_page]['componente_ti_id'];
								}else{
									$is_top = true;
								}
								$j++;
								}
								return array('comp_id' => $comp_id,
									'cur_page' => $cur_page,
									'is_top' => $is_top);
							}//endo-of function: showCompTI


							//Se despliegan los componentes de ti y
							//se obtienen: cur_page, comp_id, is_top
							$rs = showCompTI(false,$config_pag,$list_comp_ti,
								$list_categ,$list_unidad_medida,$org,NULL);
						?>
						</div><!-- columna Izquierda-->

						<!-- Columna DERECHA-->
						<div class="col-xs-6">
							<?php
								showCompTI($rs['is_top'],$config_pag,$list_comp_ti,
								$list_categ,$list_unidad_medida,$org,$rs['comp_id'],$rs['cur_page']);

							?>
						</div><!-- columna Derecha-->

					</div><!-- inner row (Dos Columnas)-->

				</div><!-- /panel-body-->			
			</div><!-- /panel info-->

		</div><!-- /col 12-->
	</div><!-- /row panel principal-->

	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
			<a class = "btn btn-primary" 
					href = "<?php echo site_url('index.php/cargar_datos/componentes_ti/nuevo');?>"
					data-toggle="tooltip" 
					data-original-title="Agregar nuevo componente de TI"
					data-placement = "top">
			<i class = "fa fa-plus-square fa-lg"></i> Nuevo
			</a>
		</div>
		<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
		</div>
	</div><!-- /row: btn Nuevo-->

<!-- Paginación-->
<div class="row">
	<div class="col-md-12">
		<center>
		<?php 
			$config_pag['url'] = site_url('index.php/cargar_datos/componentes_ti');
			pagination($config_pag);
		?>
		</center>
	</div><!-- /col-12 -->
</div><!-- /row: Paginación-->


<!-- Direccionamiento de formularios-->
<div class = "row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<ul class="pager">
		<!-- Boton de Cargar Datos Básicos-->
		  <li class="previous">
		  	<a 	href = "<?php echo site_url('index.php/cargar_datos/basico');?>"
				data-toggle="tooltip"
				data-original-title="Cargar Datos Básicos"
				data-placement = "top"
		  	><i class ="fa fa-long-arrow-left"></i> <strong>Básico</strong></a>
		  </li>

		  <!-- Boton de Departamentos -->
		  <li class="next">
		  	<a	href = "<?php echo site_url('index.php/cargar_datos/departamentos');?>"		  			 	
				data-toggle="tooltip"
				data-original-title="Cargar Departamentos"
				data-placement = "top"
		  	><strong>Departamentos</strong> <i class ="fa fa-long-arrow-right"></i></a>
		  </li>
		  
		</ul>
	</div>
</div>
<!-- Fin de Direccionamiento de formularios -->

</div><!-- end of: page wrapper -->




