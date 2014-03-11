	
<div id="page-wrapper">
	<div class = "row">
		<div class="col-lg-12">

			<h1>Cargar Datos Básicos</h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
					Carga los datos básicos de la organización
				</ol>

				<div class="alert alert-danger alert-dismissable hidden" id = "error-datos-basicos-cargar-datos" >
					<button  type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Error, no ha ingresado valores en alguno de los campos obligatorios.
				</div>
			</div>
		</div>

	<form class = "form" action="" method="POST" role="form">
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
									<input id = "nombre-organizacion-basico" name = "nombre" type="text" class="form-control" placeholder="Nombre Organización" required = "required">
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
									<input type="text" name = "moneda" class="form-control" id="nombre-moneda-basico" placeholder="Nombre de la Moneda" required = "required">
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
									<input  nombre = "abrev_moneda" maxlength = "3" type="text" class="form-control" id="abreviatura-moneda-basico" placeholder = "Abreviatura" required = "required">
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
									<textarea maxlength = "200" name = "descripcion" id = "descripcion-basico" class="form-control" rows="3" ></textarea>
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
							<button id = "btn_guardar_datos_basicos" type="submit" class="btn btn-primary">
								Guardar
							</button>                        

							<a  class="btn btn-primary"
							href = "<?php echo site_url('cargar_datos');?>">
							Cancelar
						</a>        
					</div><!-- /col-12 -->	
				</div><!-- /row-->

				</div><!-- /panel-body-->

			</div><!-- /panel-->
		</div><!-- /cols-->
	</div>	<!-- /row-->

   

	</form>

	<!-- Direccionamiento de formularios-->
		<div class="row">
			<div class="col-lg-12">
			<br><br>
		<!-- Boton de Componentes TI -->
		<a 	class = "btn btn-default" 
			href = "<?php echo site_url('cargar_datos/componentes_ti');?>"
			
			data-toggle="tooltip"
			data-original-title="Cargar Componentes de TI"
			data-placement = "top"
		>
			<i class = "fa fa-chevron-circle-right fa-2x"></i>
			Componentes de TI
		</a>
			</div><!-- end of col 12 -->
		</div><!-- end of: row Direccionamiento de formularios -->

</div><!-- end-of id: page-wrapper -->