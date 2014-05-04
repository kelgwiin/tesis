<!-- Creado el 27-04-2014 por Kelwin Gamez <kelgwiin@gmail.com> -->

<div id="page-wrapper">
	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<h1>Gestión de Costos Indirectos</h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
					Permite la Carga de los Costos Indirectos de la infraestructura de TI</li>
			</ol>

			<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				En el siguiente apartado se muestran las distintas categorías que se encuentran asociadas
				a los <strong>Costos Indirectos</strong> de la Organización. Usted deberá seleccionar la que desee
				cargar.
			</div>
		</div><!-- end of col-12-->
	</div><!-- end of row Cabecera-->

	<div class="row">
		<div class = "col-md-12">
			<big>
			<ul>
			    <li> <a href="<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Arrendamiento');?>">
			   		Arrendamiento de Servicios o Activos.</a>
			   	</li>
			    
			    <li> <a href="<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Mantenimiento');?>">
			    	Mantenimiento de Hardware e Instalación de Sistemas.
			    </a></li>

			    <li> <a href="<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Formacion');?>">
			    	Formación de Personal.</a></li>
			    
			    <li> <a href= "<?php echo site_url('index.php/Costos/CargarCostosIndirectos/HonorariosProf');?>">
			    Honorarios de Profesionales en el área de TI.</a></li>
			    
			    <li> <a href="<?php echo site_url('index.php/Costos/CargarCostosIndirectos/Utileria');?>">
			    Utilería.</a></li>
			</ul>
			</big>
		</div>
	</div>

</div>