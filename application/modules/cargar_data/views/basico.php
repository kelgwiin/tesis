	
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

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="panel panel-default">
				<div class="panel-body">
					<form class = "form-horizontal" action="" method="POST" role="form">
						<!--<legend>Form title</legend> -->
						
						<div class="form-group">
							<label for="nombre" class="col-sm-2 control-label">Nombre: </label>

							<div class="col-sm-10">
								<input type="text" class="form-control" id="nombre" placeholder="Nombre Organización">
							</div>

						</div>
						

						<!-- Button-->                                  
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">
								Guardar
							</button>                        
						</div>
						
					</form>
				</div>
			</div><!-- end-of: panel-->
		</div><!-- end-of cols-->
	</div>	<!-- end-of: row-->


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