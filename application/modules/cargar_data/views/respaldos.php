<!-- Tabla de Componenentes de TI (old)-->

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

<?php

//-----------------------
//	NOTAS DE HMVC
//	---------------------


//Retornar la data de una Función en un Módulo
	$retorno = modules::run('modulo/controlador/funcion/', $parametro1, $parametro2, $parametro...);

//Cargar Controladores
	$this->load->module('modulo/controlador', $parametro1, $parametro2, $parametro...);
	$retorno = $this->controlador->funcion();

//Cargar Modelos Vistas y Librerías: Se hace igual sólo que se antepone el nombre del Módulo
$this->load->model('modulo/modelo_model');
?>