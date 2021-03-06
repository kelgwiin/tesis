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
<link rel="stylesheet" href="<?php echo site_url('assets/front/jquery-ui/css/themes/custom-theme/jquery-ui-1.10.4.custom.css');?>">
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
				//Eliminando el componente de TI desde AJAX
				
				$( this ).dialog( "close" );
				
				var id  = $(this).attr('data-id');
				var params = {componente_ti_id:id};
				var url = "index.php/cargar_datos/componentes_ti/eliminar";
				var dataType = "json";
				var fo = function(data){
				    if(data.estatus == 'ok'){
				        //Mostrando msj de item eliminado lógicamente
				        $('div#msj-eliminado-comp-ti').attr('class','alert alert-success alert-dismissable show');
				        //Escondiendo msj de error inesperado
				        $('div#msj-error-inesperado-basico').attr('class','alert alert-danger alert-dismissable hidden');
				    }else{
				        $('div#msj-error-inesperado-basico').attr('class','alert alert-danger alert-dismissable show');
				    }
				}
				//Haciendo llamada al controlador desde ajax
				$.post(url,params,fo,dataType);
				//Eliminando gráficamente
				$('div[data-id=panel-item-comp'+id+']').remove();
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
					if(isset($is_filtered) && $is_filtered){
						echo 'class="alert alert-success alert-dismissable"';
					}else{
						echo 'class="alert alert-success alert-dismissable" hidden';
					}
				?>
			>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					La lista de componentes de TI ha sido <strong>Actualizada</strong>!
			</div>

			<!-- Mensaje de guardado exitoso-->
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

			<!-- Mensaje de actualizado exitoso -->
			<div
				<?php
					if(isset($actualizado_exitoso) && $actualizado_exitoso){
						echo 'class="alert alert-success alert-dismissable show"';
					}else{
						echo 'class="alert alert-success alert-dismissable hidden"';
					}
				?> 
				id = "msj-componente-ti-actualizado">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				El Componente de TI ha sido <strong>actualizado</strong> con Éxito!
			</div>



			<!-- Mensaje de Error Inesperado -->
			<div class="alert alert-danger alert-dismissable hidden" id = "msj-error-inesperado-basico">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Ha ocurrido un error <strong>inesperado</strong>.
			</div>

			<!-- Mensaje de Aviso de Componente de TI eliminado -->
			<div class="alert alert-success alert-dismissable hidden" id = "msj-eliminado-comp-ti">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Ha sido <strong>eliminado</strong> el componente de ti con éxito!
			</div>

		</div><!-- /col-12-->
	</div><!-- /row: breadcrumb - Cabecera-->


	<!-- Cabecera:  Buscar, filtrar, nuevo-->
	<div class="row">
		<!-- Buscar, filtrar, nuevo-->
		<div class="col-lg-8">
			<!-- Formulario -->
			<form method = "GET" action = "<?php echo site_url('index.php/cargar_datos/componentes_ti/filtrar/pag/1');?>" 
			 class="form-inline" role = "form">
				<!-- boton nuevo-->
				<div class = " form-group" >
					<a class = "btn btn-primary" 
					href = "<?php echo site_url('index.php/cargar_datos/componentes_ti/nuevo');?>"
					data-toggle="tooltip" 
					data-original-title="Agregar nuevo componente de TI"
					data-placement = "top"
					><i class = "fa fa-plus-square fa-lg"></i></a>
				</div>

				<!-- lista de filtrado -->
				<div class = "form-group">
					<label class="sr-only" for="filtro-componente-ti">Filtro</label>
					<select name="filtro-componente-ti"
						 	id="filtro-componente-ti"
						 	class="form-control"
						 	data-toggle="tooltip"
							data-original-title="Opción de filtrado"
							data-placement = "top">
						<option value="todos">Todos</option>
						<option value="nombre">Nombre</option>
						<option value="categoria">Categoría</option>
					</select>
				</div>
				
				<!--campo buscar -->
				<div class="form-group " data-id = "fg-buscar-componente-ti">
					<label class="sr-only" for="buscarComponentesTI">Buscar</label>
					<input type="text" class="form-control" id="input-buscar-componente-ti" 
					name = "buscar-componente-ti" placeholder="Buscar" disabled="disabled">
				</div>
				

				<!-- boton de buscar-->
				<div class = "form-group" >
					<label class="sr-only" for="btnBuscar">btnBuscar</label>
					<button 
							type = "submit"
							class="btn btn-default"
							data-toggle="tooltip"
							data-original-title="Buscar Componente(s) de TI"
							data-placement = "top"
							id = "btn-buscar-componente-ti">
						<i class = "fa fa-search" ></i>
					</button>
				</div>

				<div class = "form-group">
					<span id = "label-msj-error-componente-ti" class="label label-danger hidden">Ingrese datos en el campo buscar!</span>
				</div><!-- /form-group: Mensaje de error de campo buscar-->
			</form><!-- /form-inline-->
		</div><!-- /col-6: Buscar, filtrado, nuevo-->
		
		<div class="col-lg-4"><!-- Vacío-->
		</div>
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
						<div class="col-xs-6 " >		
						<?php 

							function showCompTI($is_top,$config_pag,$list_comp_ti,
													$org,$comp_id,$cur_page=NULL){
								
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
								
								echo '<!-- Componente: comp'.$comp_id.' -->
									<div class="panel panel-info" data-id = "panel-item-comp'.$comp_id.'"><!-- Inner-->

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
								 $url_ed = site_url('index.php/cargar_datos/componentes_ti/actualizar/'.$comp_id);
								 echo '
														<!-- Botón de despliegue-->
														<a  class="btn"
															data-id = "'.$comp_id.'"
															data-fieldIT = "caracteristicas"
															data-toggle="tooltip" 
															data-original-title="Características"
															data-placement = "bottom">
															<i id = "'.$comp_id.'" class = "fa fa-caret-right fa-lg"></i>	
														</a>
														<a  class="btn"
															data-id = "'.$comp_id.'"
															data-fieldIT = "editar"
															data-toggle="tooltip" 
															data-original-title="Editar"
															data-placement = "bottom"
															href = "'.$url_ed.'">
															<i class = "fa fa-pencil fa-lg"></i>	
														</a>
														<a  class="btn"
															data-id = "'.$comp_id.'"
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
												data-original-title="Categ. '.$item_comp['nomcateg'].'"
												data-placement = "top"
												class = "fa '.$item_comp['icono_fa'].' fa-3x"></i>
										</div>
									</div><!-- /row-->
								</div><!-- /panel-heading-->';
								echo '
									<div class="panel-body hidden" data-id = "'.$comp_id.'">
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
												<li> <p class = "text-muted">Tipo de asignación </p>'
												.($item_comp['tipo_asignacion']=='UNI'?'Única':'Múltiple').' </li>
											</ul>
										</div>
										
										<div class = "col-xs-6">
											<ul>
												<li><p class = "text-muted">Precio</p> '.$item_comp['precio'].' '.$org['abrev_moneda'].'<br><br></li>
												<li><p class = "text-muted">Capacidad</p> '.$item_comp['capacidad'].' '.
												($item_comp['abrev_nombre']=='NA'?"":$item_comp['abrev_nombre']).' (c/u)<br><br></li>
												<li><p class = "text-muted">Cantidad</p> '.$item_comp['cantidad'].'<br><br></li>
												<li><p class = "text-muted">Cantidad disponible</p> '.$item_comp['cantidad_disponible'].'<br><br></li>
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
									$is_top = true;//Es el fin del array
								}
								$j++;
								}
								return array('comp_id' => $comp_id,
									'cur_page' => $cur_page,
									'is_top' => $is_top);
							}//end-of function: showCompTI


							//Se despliegan los componentes de ti y
							//se obtienen: cur_page, comp_id, is_top
							if($config_pag['total_rows'] > 0){
								$rs = showCompTI(false,$config_pag,$list_comp_ti,
											$org,NULL);	
							}else{
								echo '<h3 class = "text-muted"> La búsqueda ha generado cero (0) resultados</h3>';
							}
							
						?>
						</div><!-- columna Izquierda-->

						<!-- Columna DERECHA-->
						<div class="col-xs-6">
							<?php
								if($config_pag['total_rows'] > 0){
									showCompTI($rs['is_top'],$config_pag,$list_comp_ti,
										$org,$rs['comp_id'],$rs['cur_page']);
								}

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
			if(isset($is_filtered) && $is_filtered){
				$config_pag['url'] = site_url('index.php/cargar_datos/componentes_ti/filtrar/pag');
			}else{
				$config_pag['url'] = site_url('index.php/cargar_datos/componentes_ti');
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
		  	<a	href = "<?php echo site_url('index.php/cargar_datos/departamentos/1');?>"		  			 	
				data-toggle="tooltip"
				data-original-title="Cargar Departamentos"
				data-placement = "top"
		  	><strong>Departamentos</strong> <i class ="fa fa-long-arrow-right"></i></a>
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
				¿Está seguro que desea <strong>eliminar</strong> <br>el componente de TI?</h4>			
			</div><!-- /col-md-10 -->

		</div><!-- /row-->
	</div><!-- /Modal: confirm-delete -->

</div><!-- end of: page wrapper -->




