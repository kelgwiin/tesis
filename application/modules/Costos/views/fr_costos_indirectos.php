<!-- Creado el 27-04-2014 por Kelwin Gamez <kelgwiin@gmail.com> -->
<script >
	//Conjunto de Eventos

	//Muestra el detalle de los items
	$(function() {
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

				<?php
				if(isset($guardado_exitoso) && $guardado_exitoso){
					echo '
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						El registro ha sido guardado con éxito.
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
												<th>Nombre</th>
												<th>Grupo</th>
												<th>Costo</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>

											<?php 
											if($costos_indirectos['num_rows'] > 0 ){
												for($i = 0; $i < $costos_indirectos['num_rows']; $i++) {
													$c = $costos_indirectos['list'][$i];

													echo '<tr>';
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
															<a href="#" class = "btn"
															data-toggle = "tooltip"
															data-original-title = "Editar"
															>
															<i class = "fa fa-pencil negro"></i>
															</a>
														</div>

														<div class = "col-md-1">
															<a href="#" class = "btn"
															data-toggle = "tooltip"
															data-original-title = "Eliminar"
																>
															<i class = "fa fa-times rojo"></i>
															</a>
														</div>

														<div class = "col-md-10">
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

</div><!-- /page-wrapper -->