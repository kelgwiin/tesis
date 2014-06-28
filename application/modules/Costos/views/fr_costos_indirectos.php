<!-- Creado el 27-04-2014 por Kelwin Gamez <kelgwiin@gmail.com> -->
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


<script>
	//Funciones de Utilidades
	function capitalizeFirstLetter(string){
	    return string.charAt(0).toUpperCase() + string.slice(1);
	}

	//Conjunto de Eventos
	$(function() {
		//Muestra el detalle de los items de costos indirectos
		$('span.info').on('click',function(){
			id_ = $(this).attr('data-id');
			table_target = $(this).attr('data-target');

			if($('i[data-id='+id_+'][data-target='+table_target+']').attr('class') == 'fa fa-caret-right'){
				
				//Cambiando la orientación del caret
				$('i[data-id='+id_+'][data-target='+table_target+']').attr('class','fa fa-caret-down');
				
				//Buscando detalles al server con ajax- Panel Body
				if($('div[data-id=panel-body-'+id_+'][data-target='+table_target+']').attr('data-status') != 'loaded'){//Si no ha sido ya cargada
					url = "index.php/Costos/CargarCostosIndirectos/Detalles";
					dataToSend = {id:id_,table_name:table_target};
					fo_proccess = function(data){
						detalles = '';
						
						for (var i = 0; i < data.length; i++) {
							nom = data[i]['nombre'];
							info = data[i]['info'];
							detalles += '<strong>'+nom+'</strong>: '+info+'<br>';
						};
						$('div[data-id=panel-body-'+id_+'][data-target='+table_target+']').append(detalles);
					};

					$.post( url, dataToSend, fo_proccess,'json');
					
					//Indicando que ya fue cargada
					$('div[data-id=panel-body-'+id_+'][data-target='+table_target+']').attr('data-status','loaded');
				}

				//Mostrando la data
				$('div[data-id='+id_+'][data-target='+table_target+'][data-aim=main]').attr('class','row show');
			}else{
				$('i[data-id='+id_+'][data-target='+table_target+']').attr('class','fa fa-caret-right');
				//Ocultando la data
				$('div[data-id='+id_+'][data-target='+table_target+'][data-aim=main]').attr('class','row hidden');
			}
		});

		//Botón Eliminar Costos indirectos 
		$('a.delete-ci').on('click',function(){
			table_name = $(this).attr('data-target');
			id = $(this).attr('data-id');

			//Se muestra el diálogo de confirmación
			$('div#confirm-delete-ci').dialog('open');

			//Se coloca el valor del id 
			$('div#confirm-delete-ci').attr('data-id',id).attr('data-target',table_name);
			
			$('span#nombre-costos-ind').remove();//quitando el nombre viejo
			$('strong#marco-nombre-costos-ind').append('<span id = "nombre-costos-ind">'+capitalizeFirstLetter(table_name)+'</span>');//Agregando el nombre nuevo
		});

				//Confirmación de eliminación	
		$( "div#confirm-delete-ci" ).dialog({
			autoOpen: false,
			resizable: false,
			height:200,
			width: 470,
			modal: true,
			buttons: {
				"Eliminar": function() {
					//Eliminando el departamento desde AJAX
					
					$( this ).dialog( "close" );
					
					var id_  = $(this).attr('data-id');
					var table_name_ = $(this).attr('data-target');
					var target = table_name_;

					var params = {id:id_, table_name:table_name_};

					var url = "index.php/Costos/CargarCostosIndirectos/Eliminar/"+capitalizeFirstLetter(table_name_)+"/"+id_;
					
					var dataType = "json";
					
					var fo = function(data){
					    if(data.estatus == 'ok'){
					        //Mostrando mensajes de eliminación
					        $('span#elim-nombre-costos-ind').remove();
					        $('strong#elim-marco-costos-ind').append('<span id = "elim-nombre-costos-ind">'+table_name_+'</span>');
					        $('div#msj-eliminado').attr('class','alert alert-success alert-dismissable show');
							$('tbody tr[data-id='+id_+'][data-target='+target+']').remove();

					        //Escondiendo msj de error inesperado
					        $('div#msj-error-inesperado-basico').attr('class','alert alert-danger alert-dismissable hidden');
					    }else{
					        $('div#msj-error-inesperado-basico').attr('class','alert alert-danger alert-dismissable show');
					    }
					}
					//Haciendo llamada al controlador desde ajax
					$.post(url,params,fo,dataType);



					//Removiendo la fila visualmente
				},
				Cancelar: function() {
					$( this ).dialog( "close" );
				}
			}
		});



	});
</script>

<div id="page-wrapper">
	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<h1>Gestión de Costos Indirectos</h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
					Permite la Carga de los Costos Indirectos de la infraestructura de TI</li>
				</ol>

				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					En el siguiente apartado se muestran las distintas categorías que se encuentran asociadas
					a los <strong>Costos Indirectos</strong> de la Organización. Usted deberá seleccionar la que desee
					cargar.
				</div>

				<!-- Mensaje de eliminación de item de costos indirectos -->
				<div class="alert alert-success alert-dismissable hidden" id = "msj-eliminado">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					El ítem de <strong id = "elim-marco-costos-ind"></strong> ha sido <strong>eliminado</strong> con éxito.
				</div>


				<!-- Mensaje de Error Inesperado -->
				<div class="alert alert-danger alert-dismissable hidden" id = "msj-error-inesperado-basico">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Ha ocurrido un error <strong>inesperado</strong>.
				</div>
				
				<?php
				if(isset($guardado_exitoso) && $guardado_exitoso){
					echo '
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						El registro ha sido guardado con éxito.
					</div>
					';
				}

				if(isset($actualizado_exitoso) && $actualizado_exitoso){
					echo '
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						El registro ha sido <strong>actualizado</strong> con éxito.
					</div>
					';
				}


				?>

			</div><!-- end of col-12-->
		</div><!-- end of row Cabecera-->

		<div class="row">
			<div class = "col-md-12">

				<ul class = "list-unstyled">
					<li><i class = "fa fa-angle-double-right"> </i> <a href="<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Arrendamiento');?>">
						Arrendamiento de Servicios o Activos.</a>

					</li>

					<li><i class = "fa fa-angle-double-right"> </i> <a href="<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Mantenimiento');?>">
						Mantenimiento e Instalación.
					</a></li>

					<li><i class = "fa fa-angle-double-right"></i>  <a href="<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Formacion');?>">
						Formación de Personal.</a></li>

						<li><i class = "fa fa-angle-double-right"></i>  <a href= "<?php echo site_url('index.php/Costos/CargarCostosIndirectos/HonorariosProf');?>">
							Honorarios de Profesionales en el área de TI.</a></li>

							<li><i class = "fa fa-angle-double-right"></i>  <a href="<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Utileria');?>">
								Utilería.</a></li>
							</ul>

							<!-- Panel para Table - Listar Costos Indirectos -->
							<div class="panel panel-primary">
								<!-- Default panel contents -->
								<div class="panel-heading"><strong>Lista de Costos Indirectos</strong></div>

								<!-- Table -->
								<!-- Listado de Costos Indirectos -->
								<div class="table-responsive">
									<table id  = "list-costos-ind" class="table table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th><i class = "fa fa-sort"></i> Nombre/Descripción</th>
												<th><i class = "fa fa-sort"></i> Grupo</th>
												<th><i class = "fa fa-sort"></i> Costo</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>

											<?php 
											if($costos_indirectos['num_rows'] > 0 ){
												for($i = 0; $i < $costos_indirectos['num_rows']; $i++) {
													$c = $costos_indirectos['list'][$i];

													echo '<tr data-id = "'.$c['id'].'" data-target= "'.$c['target'].'">';
													printf('<td>%s</td>',$i+1);
													
													echo '<td>

													<a class="btn btn-link">
														<span data-id = "'.$c['id'].'" class = "info" data-target= "'.$c['target'].'"><i class = "fa fa-caret-right" data-id = "'.$c['id'].'" data-target = "'.$c['target'].'"></i> '.$c['nombre'].'</span>
													</a>
														<div class = "row hidden" data-id ="'.$c['id'].'" data-target = "'.$c['target'].'" data-aim = "main">
															<div class = "col-sm-12 ficha-ci">
																<div class="panel panel-info">
																	<div class = "panel-heading">
																		<strong>Detalles</strong>
																	</div>

																	<div class="panel-body" data-status = "no-load" data-id = "panel-body-'.$c['id'].'" data-target = "'.$c['target'].'">
																		<!-- Se llena desde ajax-->
																	</div>
																</div>
															</div>
														</div>
													</td>';
													
													//printf('<td>%s</td>',);

													printf('<td>%s</td>',$c['grupo']);
													printf('<td>%s</td>',$c['costo']);

													echo '
													<!-- acciones-->
													<td >
													<div class = "row">
														<div class = "col-md-1">
															<a href="'.site_url('index.php/Costos/CargarCostosIndirectos/Editar/'.ucfirst($c['target']).'/'.$c['id']).'"
																class = "btn"
																data-toggle = "tooltip"
																data-original-title = "Editar"
																><i class = "fa fa-pencil negro"></i>
															</a>
														</div>

														<div class = "col-md-1 col-md-offset-1">
															<a 	data-id = "'.$c['id'].'" data-target= "'.$c['target'].'"
																class = "btn delete-ci"
																data-toggle = "tooltip"
																data-original-title = "Eliminar"
															><i class = "fa fa-times rojo"></i>
															</a>
														</div>

														<div class = "col-md-9">
														</div>

														</div>
													</td>

										';
										echo '</tr>';
									}
								}else{
									echo '<h3 class = "text-muted"> La búsqueda ha generado cero (0) resultados</h3>';
								}


								?>

								</tbody>
							</table>
						</div><!-- /table-responsive-->

					</div><!-- /panel-primary-->


				</div><!-- /col-md-12-->
			</div><!-- /row -->

			<!-- Conjunto de MODALES-->
			<!-- Modal: Confirmar Eliminación-->
			<div  id="confirm-delete-ci" data-id = "-1" data-target="">
				<div class = "row">
					<!-- Ícono -->
					<div class = "col-md-1 col-md-offset-1">
						<i class = "fa fa-question-circle fa-4x"></i>
					</div><!-- /col-md-1 -->
					
					<!-- Cuerpo del msj -->
					<div class = "col-md-10">
						<h4 class= "text-center"> 
							¿Está seguro que desea <strong>eliminar</strong> <br>el ítem de <strong id = "marco-nombre-costos-ind"></strong> </h4>			
						</div><!-- /col-md-10 -->

					</div><!-- /row-->
			</div><!-- /Modal: confirm-delete-ci -->
</div><!-- /page-wrapper -->