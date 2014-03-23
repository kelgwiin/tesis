<div id="page-wrapper">
	<div class = "row">
		<div class="col-lg-12">

			<h1>Cargar Datos Básicos</h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
					Carga o edita los datos básicos de la organización.
				</ol>

				<div class="alert alert-danger alert-dismissable hidden" id = "error-datos-basicos-cargar-datos" >
					<button  type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Error, no ha ingresado valores en alguno de los campos obligatorios.
				</div>

				<!-- Mensaje de Guardado Exitoso -->
				<div class="alert alert-success alert-dismissable hidden" id = "msj-datos-basicos-guardado">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Los <strong>datos básicos</strong> han sido <em>guardados</em> con Éxito!
				</div>

				<!-- Mensaje de Actualizado Exitoso -->
				<div class="alert alert-success alert-dismissable hidden" id = "msj-datos-basicos-actualizado">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Los <strong>datos básicos</strong> han sido <em>actualizados</em> con Éxito!
				</div>

				<!-- Mensaje de Error Inesperado -->
				<div class="alert alert-danger alert-dismissable hidden" id = "msj-error-inesperado-basico">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Ha ocurrido un error <strong>inesperado</strong>.
				</div>
		</div><!-- /col-12-->
	</div><!--/row -->

	<!-- Botón de Editar -->
	<div class = "row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<a  class="btn"
				id = "btn-editar-datos-basicos-basico"
				data-status-edicion = "off"
				<?php 
					if(isset($org)){
						printf('data-organizacion-id="%d" ',$org['organizacion_id']);
					}else{
						echo 'disabled = "disabled" ';
						echo 'data-organizacion-id = "-1" ';
					}
				?>
				data-toggle="tooltip" 
				data-original-title="Editar datos básicos"
				data-placement = "top"
				>
			<i class = "fa fa-pencil fa-lg"></i>	
		</a>
		</div>
	</div>

	<!-- Inicio del Formulario -->
	<form id = "fr-datos-basicos" action="<?php echo site_url('index.php/cargar_datos/basico/guardar');?>"  method="POST" role="form">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="panel panel-default">
				<div class="panel-body">
					
					<!-- Nombre-->
					<div class = "row"> 
						<div class = "col-md-12">
							<div class="form-group" data-id  = "fg-nombre-organizacion-basico">
								<label for="nombre" class="col-md-1 control-label">Nombre </label>

								<div class="col-md-10">
									<input  id = "nombre-organizacion-basico" name = "nombre"
									 type="text" class="form-control" placeholder="Nombre de la Organización" required = "required"
									 <?php 
									 	if(isset($org)){
									 		printf('value="%s" ',$org['nombre']);
									 		printf('disabled="disabled" ');
									 	}
									 ?>
									 >
								</div>

								<div class = "col-md-1 hidden " data-id = "icon-nombre-organizacion-basico">
									<i class = "fa fa-times text-danger">
									</i>
								</div><!-- /col-2: icono -->
								


							</div><!-- /form-group: Nombre Organización -->		
						</div><!-- col-12-->
					</div><!-- /row -->

					<br>
					<!-- Moneda y abreviatura-->
					<div class  = "row">

						<!-- Nombre de Moneda-->
						<div class = "col-md-6">
							<div class="form-group" data-id="fg-nombre-moneda-basico">
								<label for="nombre-moneda-basico" class="col-md-5 control-label">Nombre de moneda </label>

								<div class="col-md-6">
									<input type="text" name = "moneda" class="form-control" 
									id="nombre-moneda-basico" placeholder="Nombre de la Moneda" required = "required"
									<?php 
									 	if(isset($org)){
									 		printf('value="%s" ',$org['moneda']);
									 		printf('disabled="disabled" ');
									 	}
									 ?>
									>
								</div>

								<div class = "col-md-1 hidden" data-id = "icon-nombre-moneda-basico">
									<i class = "fa fa-times text-danger">
									</i>
								</div><!-- /col-2: icono -->
							</div><!-- /form-group -->	
						</div><!-- /col-6: Nombre de la Moneda -->		
						
						<!-- Abreviatura de Moneda-->
						<div class = "col-md-6">
							<div class="form-group" data-id = "fg-abreviatura-moneda-basico">
								<label for="abreviatura-moneda-basico" class="col-md-5 control-label">Abreviatura de moneda </label>

								<div class="col-md-5">
									<input  name = "abrev_moneda" maxlength = "3" type="text"
									 class="form-control" id="abreviatura-moneda-basico" placeholder = "Abreviatura" required = "required"
									 <?php 
									 	if(isset($org)){
									 		printf('value="%s" ',$org['abrev_moneda']);
									 		printf('disabled="disabled" ');
									 	}
									 ?>
									 >
								</div>

								<div class = "col-md-1 hidden" data-id = "icon-abreviatura-moneda-basico">
									<i class = "fa fa-times text-danger">
									</i>
								</div><!-- /col-2: icono -->

								<div class = "col-md-1"></div><!-- Vacío -->
							</div><!-- /form-group -->	
						</div><!-- /col-6: Abreviatura de la Moneda -->		

					</div><!-- /row: Moneda y Abreviatura -->
					
					<!-- Descripción-->
					<br>
					<div class="row">
						<div class = "col-md-12">
							<div class="form-group" data-id = "fg-descripcion-basico">
								<label for="descripcion" class="col-md-2 control-label">Descripción</label>

								<div class = "col-md-9">
									<textarea maxlength = "200" name = "descripcion" id = "descripcion-basico" 
									class="form-control text-left" rows="3" style = "text-align: left; padding:0"
										<?php 
									 	if(isset($org)){
									 		printf(' disabled="disabled" ');
									 	}
									 ?>
									 placeholder = "Descripción de la Organización"
									><?php
											if(isset($org)){
												printf('%s', $org['descripcion']);
											}
									?></textarea>
								</div>

								<div class = "col-md-1 hidden" data-id = "icon-descripcion-basico">
									<i class = "fa fa-times text-danger">
									</i>
								</div><!-- /col-2: Icono-->
							</div>
						</div><!-- /col-12 -->
					</div><!-- /row -->

					<!-- Button-->  
					<br>
					<div class = "row">
						<div class="col-md-12">
							<button id = "btn_guardar_datos_basicos" type="submit" class="btn btn-primary"
								<?php 
									 if(isset($org)){
									 	printf('disabled="disabled" ');
									}
								?>
							>
								Guardar
							</button>                        
						</form>
							<a  class="btn btn-primary"
							href = "<?php echo site_url('index.php/cargar_datos');?>">
							Cancelar
						</a>        
					</div><!-- /col-12 -->	
				</div><!-- /row-->

				</div><!-- /panel-body-->

			</div><!-- /panel-->
		</div><!-- /cols-->
	</div>	<!-- /row-->

<!-- Direccionamiento de formularios-->
<div class = "row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<ul class="pager">
		<!-- Boton de Descripción-->
		  <li class="previous">
		  	<a 	href = "<?php echo site_url('index.php/cargar_datos/');?>"
				data-toggle="tooltip"
				data-original-title="Descripción"
				data-placement = "top"
		  	><i class ="fa fa-long-arrow-left"></i> <strong>Descripción</strong></a>
		  </li>

		  <!-- Boton de Componentes de TI -->
		  <li class="next">
		  	<a	href = "<?php echo site_url('index.php/cargar_datos/componentes_ti/1');?>"
				data-toggle="tooltip"
				data-original-title="Cargar Componentesde TI"
				data-placement = "top"
		  	><strong>Componentes de TI</strong> <i class ="fa fa-long-arrow-right"></i></a>
		  </li>
		  
		</ul>
	</div>
</div>
<!-- Fin de Direccionamiento de formularios -->


</div><!-- end-of id: page-wrapper -->