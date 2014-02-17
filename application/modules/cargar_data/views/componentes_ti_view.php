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
		</div><!-- end of col-12-->
	</div><!-- end of row breadcrumb - Cabecera-->

	<div class="row">
		<div class = "col-lg-12"> <!-- main col-->
			<div class="table-responsive">
				<table id = "componentesTI"
				class="table table-striped table-hover tablesorter">
				<thead>
					<tr>
						<th><i class = "fa fa-square-o"></i></th>
						<th>Nombre <i class="fa fa-sort"></i></th>
						<th>Categoría <i class="fa fa-sort"></i></th>
						<th>Detalles <i class="fa fa-sort"></i></th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td><i id = "1" data-ischeck = "yes" class = "fa fa-square-o"></i></td>
						<td>dato1</td>
						<td>dato2</td>
						<td>

							<a class = "fieldsIT" id = "1">
								<i id = "i1" class = "fa fa-chevron-right">
									<small>Campos</small>
								</i>
							</a>	
							<!-- Detail Panel of the TI Components -->				
							<div class="row">
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
									<div class="panel panel-success">
										<div id="fields1" class="panel-collapse collapse off">
											<div class="panel-body">
												<ul>
													<li>item 1</li>
													<li>item 2</li>
													<li>item 3</li>
													<li>item 4</li>
												</ul>
											</div>
										</div>
									</div><!-- end of: fields Panel-->
								</div>	<!-- end of: columns-->
							</div> <!-- end of: row-->


						</td><!-- end of: Detail-->

					</tr>

					<tr>
						<td><i id = "2" data-ischeck = "yes" class = "fa fa-square-o"></i></td>
						<td>sssdsd</td>
						<td>dsads2</td>
						<td>
							<a class = "fieldsIT" id = "2">
								<i id = "i2" class = "fa fa-chevron-right">
									<small>Campos</small>
								</i>
							</a>	
							<!-- Detail Panel of the TI Components -->				
							<div class="row">
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
									<div class="panel panel-success">
										<div id="fields2" class="panel-collapse collapse off">
											<div class="panel-body">
												<ul>
													<li>item 1</li>
													<li>item 2</li>
													<li>item 3</li>
													<li>item 4</li>
												</ul>
											</div>
										</div>
									</div><!-- end of: fields Panel-->
								</div>	<!-- end of: columns-->
							</div> <!-- end of: row-->
						</td>
					</tr>

					<tr>
						<td><i id = "3" data-ischeck = "yes" class = "fa fa-square-o"></i></td>
						<td>daaaaa1</td>
						<td>daaaaaa2</td>
						<td><a >... </a></td>
					</tr>

					<tr><td> <i id = "4" data-ischeck = "yes" class = "fa fa-square-o"></i></td><td>222</td> <td>222</td> <td>222</td></tr>
					<tr><td> <i id = "5" data-ischeck = "yes" class = "fa fa-square-o"></i></td> <td>222</td> <td>222</td> <td>222</td></tr>
					<tr><td> <i id = "6" data-ischeck = "yes" class = "fa fa-square-o"></i></td> <td>222</td> <td>222</td> <td>222</td></tr>


				</tbody>
			</table>



		</div>	<!-- end of: table-responsive -->

	</div> <!-- end of: main col-lg-12 -->
</div> <!-- end of: main row -->

<!-- Buttons-->
<div class="row">
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<a 
			id = "addComponentIT" 
			type="button" 
			class="btn btn-default"
			href = "cargar_data/componentes_ti/nuevo"
		>
		<i 
			class = "fa fa-plus-square fa-lg"
			data-toggle="tooltip" 
			data-original-title="Agregar"
			data-placement = "top"
		></i>
		</a> 

		<button 
			id = "editComponentIT" 
			type="button" 
			class="btn btn-default"
		>
		<i 
			class = "fa fa-pencil-square fa-lg"
			data-toggle="tooltip"
			data-original-title="Editar"
			data-placement = "top"
		></i>
		</button> 

		<button 
			id = "deleteComponentIT" 
			type="button" 
			class="btn btn-default"
		>
		<i 
			class = "fa fa-minus-square fa-lg"
			data-toggle="tooltip"
			data-original-title="Eliminar"
			data-placement = "top"
		></i>
		</button> 
</div><!-- end of: col-3 buttons-->
</div><!--end of: row buttons -->



<!-- Pagination-->
<div class="row">
	<div class="col-xs-4 col-sm-12 col-md-4 col-lg-4 col-md-offset-4">
		<ul class="pagination">
		<li class = "disabled"><a href="#"><i class = "fa fa-backward"></i></a></li>
			<li class = "active"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
		<li><a href="#"><i class = "fa fa-forward"></i></a></li>
		</ul>
	</div><!-- end of: col pagination -->
</div><!-- end of: row pagination-->


<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<br><br>
	</div>
</div>

<!-- Direccionamiento de formularios-->
<div class="row">
	<div class="col-lg-4">
		<!-- Boton de Cargar Datos Básicos-->
		<a 	class = "btn btn-default" 
			href = "<?php echo site_url('cargar_datos/basico');?>"
			
			data-toggle="tooltip"
			data-original-title="Cargar Datos Básicos"
			data-placement = "top"
		>
			Básico 
			<i class = "fa fa-chevron-circle-left fa-2x"></i>
		</a>

		<!-- Boton de Departamentos -->
		<a 	class = "btn btn-default" 
			href = "<?php echo site_url('cargar_datos/departamentos');?>"
			
			data-toggle="tooltip"
			data-original-title="Cargar Departamentos"
			data-placement = "top"
		>
			<i class = "fa fa-chevron-circle-right fa-2x"></i>
			Departamentos
		</a>
		
	</div><!-- end of col 12 -->
</div><!-- end of: row Direccionamiento de formularios -->

</div><!-- end of: page wrapper -->




