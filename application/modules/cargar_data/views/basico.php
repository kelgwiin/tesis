	
<div id="page-wrapper">
	<div class = "row">
		<div class="col-lg-12">

			<h1>Cargar Datos Básicos</h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
					Carga los datos básicos de la organización
				</ol>
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
							<div class="form-group">
								<label for="nombre" class="col-md-1 control-label">Nombre </label>

								<div class="col-md-10">
									<input type="text" class="form-control" id="nombre" placeholder="Nombre Organización">
								</div>

								<div class = "col-md-1" id = "nombre-moneda-basico">
									<i class = "fa fa-check text-danger">
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
							<div class="form-group">
								<label for="nombre-moneda-basico" class="col-md-5 control-label">Nombre de moneda </label>

								<div class="col-md-6">
									<input type="text" class="form-control" id="nombre_moneda" placeholder="Nombre de la Moneda">
								</div>

								<div class = "col-md-1" id = "nombre-moneda-basico">
									<i class = "fa fa-check text-success">
									</i>
								</div><!-- /col-2: icono -->
							</div><!-- /form-group -->	
						</div><!-- /col-6: Nombre de la Moneda -->		
						
						<!-- Abreviatura de Moneda-->
						<div class = "col-md-6">
							<div class="form-group">
								<label for="abreviatura-moneda-basico" class="col-md-5 control-label">Abreviatura de moneda </label>

								<div class="col-md-6">
									<input  maxlength = "3" type="text" class="form-control" id="abreviatura_moneda" placeholder = "Abreviatura">
								</div>

								<div class = "col-md-1" id = "abreviatura-moneda-basico">
									<i class = "fa fa-check text-success">
									</i>
								</div><!-- /col-2: icono -->
							</div><!-- /form-group -->	
						</div><!-- /col-6: Abreviatura de la Moneda -->		

					</div><!-- /row: Moneda y Abreviatura -->


					<!-- Button-->  
					<br>
					<div class = "row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">
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