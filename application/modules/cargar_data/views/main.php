<div id="page-wrapper">
	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<h1>Cargar Infraestructura</h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
					Carga de los componentes de tecnología de información (TI) de la organización.</li>
				</ol>

				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					En esta sección usted podrá cargar la arquitectura de la organización necesaria
					para poder realizar cada uno de las evaluaciones en materia de "Rendimiento de Sistemas Computacionales"
				</div>
			</div><!-- end of col-12-->
		</div><!-- end of row Cabecera-->

		<!-- Menu de carga de datos-->
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<!-- Carga de datos básicos-->
					<div class="col-lg-3">
						<div class="panel panel-info">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-6">
										<i class="fa fa-cog fa-5x"></i>
									</div>
									<div class="col-xs-6 text-center">
										<p class="announcement-text">Cargar Datos Básicos</p>
									</div>
								</div>
							</div>
							<a href="<?php echo site_url('index.php/cargar_datos/basico');?>/">
								<div class="panel-footer announcement-bottom">
									<div class="row">
										<div class="col-xs-6">
											Examinar
										</div>
										<div class="col-xs-6 text-right">
											<i class="fa fa-arrow-circle-right"></i>
										</div>
									</div>
								</div>
							</a>
						</div>
					</div>

					<!-- Cargar Componentes de TI-->
					<div class="col-lg-3">
						<div class="panel panel-info">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-6">
										<i class="fa fa-cogs fa-5x"></i>
									</div>
									<div class="col-xs-6 text-center">
										<p class="announcement-text">Cargar Componentes de TI</p>
									</div>
								</div>
							</div>
							<a href="<?php echo site_url('index.php/cargar_datos/componentes_ti/1');?>/">
								<div class="panel-footer announcement-bottom">
									<div class="row">
										<div class="col-xs-6">
											Examinar
										</div>
										<div class="col-xs-6 text-right">
											<i class="fa fa-arrow-circle-right"></i>
										</div>
									</div>
								</div>
							</a>
						</div>
					</div>

					<!-- Carga Departamentos -->
					<div class="col-lg-3">
						<div class="panel panel-info">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-6">
										<i class="fa fa-sitemap fa-5x"></i>
									</div>
									<div class="col-xs-6 text-center">
										<p class="announcement-text">Cargar Departamentos</p>
									</div>
								</div>
							</div>
							<a href="<?php echo site_url('index.php/cargar_datos/departamentos/1');?>/">
								<div class="panel-footer announcement-bottom">
									<div class="row">
										<div class="col-xs-6">
											Examinar
										</div>
										<div class="col-xs-6 text-right">
											<i class="fa fa-arrow-circle-right"></i>
										</div>
									</div>
								</div>
							</a>
						</div>
					</div>

					<!-- Cargar Servicios-->
					<div class="col-lg-3">
						<div class="panel panel-info">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-6">
										<i class="fa fa-list fa-5x"></i>
									</div>
									<div class="col-xs-6 text-center">
										<p class="announcement-text">Cargar Servicios</p>
									</div>
								</div>
							</div>
							<a href="<?php echo site_url('index.php/cargar_datos/servicios');?>/">
								<div class="panel-footer announcement-bottom">
									<div class="row">
										<div class="col-xs-6">
											Examinar
										</div>
										<div class="col-xs-6 text-right">
											<i class="fa fa-arrow-circle-right"></i>
										</div>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div><!-- end of row: inner-->


				<!-- Segunda fila para colocar la documentación-->
				<div class="row">

					<!-- Documentación-->
					<div class="col-lg-3 col-lg-offset-3"> <!-- avanza 9 columnas hacia la derecha con el offset-->
						<div class="panel panel-info">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-6">
										<i class="fa fa-book fa-5x"></i>
									</div>
									<div class="col-xs-6 text-center">
										<p class="announcement-text">Documentación</p>
									</div>
								</div>
							</div>
							<a href="<?php echo site_url('index.php/cargar_datos/documentacion');?>/">
								<div class="panel-footer announcement-bottom">
									<div class="row">
										<div class="col-xs-6">
											Revisar
										</div>
										<div class="col-xs-6 text-right">
											<i class="fa fa-arrow-circle-right"></i>
										</div>
									</div>
								</div>
							</a>
						</div>
					</div>
					
					<!-- Módulos-->
					<div class="col-lg-3">
						<div class="panel panel-info">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-6">
										<i class="fa fa-flag fa-5x"></i>
									</div>
									<div class="col-xs-6 text-center">
										<p class="announcement-text">Módulos de Sistema</p>
									</div>
								</div>
							</div>
							<a href="<?php echo base_url();?>">
								<div class="panel-footer announcement-bottom">
									<div class="row">
										<div class="col-xs-6">
											Examinar
										</div>
										<div class="col-xs-6 text-right">
											<i class="fa fa-arrow-circle-right"></i>
										</div>
									</div>
								</div>
							</a>
						</div>
					</div>

					<!-- Vacío-->
					<div class = "col-lg-3"></div>
				</div><!-- end of row 2: inner-->



				

			</div><!-- end of: col-12-->
		</div><!-- end of: row outter-->

		
</div><!-- end of page-wrapper-->