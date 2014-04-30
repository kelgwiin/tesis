<!-- Creado el 30-04-2014 por Kelwin Gamez <kelgwiin@gmail.com> -->
<div id="page-wrapper">
	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<h1>Gestión de Costos Indirectos <small>Formación de Personal</small></h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
					Permite la Carga de los Costos Indirectos de la infraestructura de TI</li>
			</ol>

			
		</div><!-- end of col-12-->
	</div><!-- end of row Cabecera-->

	<div class="row">
		<div class = "col-md-12">
			Inicio de Formularios Formación
		</div>
	</div>

	<!-- Direccionamiento de formularios-->
	<div class = "row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<ul class="pager">
			  <!-- Boton de Mantenimiento -->
			  <li class="previous">
			  	<a	href = "<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Mantenimiento');?>"
			  	><i class ="fa fa-long-arrow-left"></i> <strong>Mantenimiento</strong></a>
			  </li>

			<!-- Boton de Honorarios Profesionales -->
			  <li class="next">
			  	<a 	href = "<?php echo site_url('index.php/Costos/CargarCostosIndirectos/HonorariosProf');?>"
			  	><strong>Mantenimiento</strong> <i class ="fa fa-long-arrow-right"></i></a>
			  </li>

			  
			</ul>
		</div>
	</div>
	<!-- Fin de Direccionamiento de formularios -->
</div><!-- /page-wrapper-->