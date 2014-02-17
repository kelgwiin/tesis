<div id = "page-wrapper">
	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<h1>Departamentos de la Organización</h1>
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
					Carga de los Departamentos de la Organización.</li>
				</ol>

				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Muestra una lista de todos los <strong>departamentos</strong> que se encuentran hasta el momento cargados. Además
					permite agregar nuevos  <strong>departamentos</strong> según las necesidades de la organización. De igual forma podrá
					editar la información asociada a ellos.
				</div>
			</div><!-- end of col-12-->
		</div><!-- end of row breadcrumb - Cabecera-->

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>		
	</div>
</div>


<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<br><br>
	</div>
</div>

<!-- Direccionamiento de formularios-->
<div class="row">
	<div class="col-lg-4">
		<!-- Boton de Componentes de TI-->
		<a 	class = "btn btn-default" 
			href = "<?php echo site_url('cargar_datos/componentes_ti');?>"
			
			data-toggle="tooltip"
			data-original-title="Cargar Componentes de TI"
			data-placement = "top"
		>
			Componentes de TI
			<i class = "fa fa-chevron-circle-left fa-2x"></i>
		</a>

		<!-- Boton de Servicios -->
		<a 	class = "btn btn-default" 
			href = "<?php echo site_url('cargar_datos/servicios');?>"
			
			data-toggle="tooltip"
			data-original-title="Cargar Servicios"
			data-placement = "top"
		>
			<i class = "fa fa-chevron-circle-right fa-2x"></i>
			Servicios
		</a>
		
	</div><!-- end of col 12 -->
</div><!-- end of: row Direccionamiento de formularios -->
</div><!-- end of: page-wrapper-->