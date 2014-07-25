<!-- Creado el 27-06-2014 por Kelwin Gamez <kelgwiin@gmail.com> -->

<div id="page-wrapper">
	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<h1>Recomendaciones</h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
					Despliega un conjunto de recomendaciones de inversión.
				</ol>

				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Como cada componente de TI posee una vida útil estipulada se debe monitorear
					cuándo está cercana la fecha de caducidad del mismo. En función de ello se
					emite un listado de todos esos componentes que deben ser reemplazados.
				</div>
			</div><!-- end of col-12-->
		</div><!-- end of row Cabecera-->

	<!-- Lista de Componentes de TI a punto de Vencerse -->
	<div class = "row">
		<div class = "col-md-12">
			<div class="panel panel-danger">
				<!-- Default panel contents -->
				<div class="panel-heading"><strong>Componentes de TI con fecha de caducidad cercana o ya vencidos</strong></div>
				
				<div class = "panel-body">
					Los componentes de TI de información que aparezcan este apartado deben ser adquiridos 
					para su reemplazo lo más pronto posible para garantizar la estabilidad del sistema de la organización.
				</div>

					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped tablesorter ">
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre <i class = "fa fa-sort"></i></th>
									<th>Fecha de creción <i class = "fa fa-sort"></i></th>
									<th>Fecha de caducidad <i class = "fa fa-sort"></i></th>
									<th>Categoría <i class = "fa fa-sort"></i></th>
									<th>Cantidad <i class = "fa fa-sort"></i></th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$i = 1;
									if(isset($recomendaciones)){
										foreach ($recomendaciones as $row) {
											echo "<tr>";
											printf('<td>%s</td>',$i);
											printf('<td>%s</td>',$row['nombre']);
											printf('<td>%s</td>',$row['fecha_creacion']);
											printf('<td>%s</td>',$row['fecha_hasta']);
											printf('<td>%s</td>',$row['categoria']);
											printf('<td>%s</td>',$row['cantidad']);
											echo "</tr>";

											$i+= 1;
										}	
									}
									
								?>
							</tbody>
						</table>
					</div>
			
					
			</div>
		</div>
	</div>

</div><!-- /wrapper -->