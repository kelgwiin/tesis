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

//------------------------------------------------------------
// Configuraciones de mod_rewrite para que funciones htacess
//------------------------------------------------------------
	Este Módulo es el encargado de traducir las reglas 
	que se encuentran en el ".htaccess". Si el servidor no
	tiene activado este módulo no funciona.

	Aparte hay que modificar el archivo que está
	en ./sites-enabled/000-default cambiando donde 
	aparezca :

	AllowOverride None

	por 

	AllowOverride all

	NOTA: De igual forma en httpd.config deben cambiarse esas 
	opciones.


	Este es el link de las configuraciones para linux: 	
http://www.cristiantala.cl/como-instalar-mod_rewrite-de-apache-en-ubuntu-11-10/


//Configuraciones de los ciclos para generar la lista de componente de ti
$num_pages = ceil($config_pag['total_rows']/$config_pag['per_page']);
							$mid_per_page = (int)($config_pag['per_page']/2);
							
							//Columna Izquierda
							$cur_page = ($config_pag['cur_page']-1)*$config_pag['per_page'];
							$comp_id = $list_comp_ti[$cur_page]['componente_ti_id'];
							$j = 1;
							$is_top = false;//para verificar que no haya llegado al tope
							while(!$is_top && $j<= $mid_per_page){
								printf('Comp id:  %d <br>',$comp_id);
								$cur_page+=1;
								if(isset($list_comp_ti[$cur_page])){
									$comp_id = $list_comp_ti[$cur_page]['componente_ti_id'];
								}else{
									$is_top = true;
								}
								$j++;
							}



							//Columna Derecha
							$j = 1;
							while(!$is_top && $j<= $mid_per_page){
								printf('[Comp] id:  %d <br>',$comp_id);
								$cur_page+=1;
								if(isset($list_comp_ti[$cur_page])){
									$comp_id = $list_comp_ti[$cur_page]['componente_ti_id'];
								}else{
									$is_top = true;
								}
								$j++;
							}
							

?>