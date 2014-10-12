<!-- Creado el 20-04-2014 por Kelwin Gamez <kelgwiin@gmail.com> -->

<div id="page-wrapper">
	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<h1>Gestión de Costos</h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
					Permite Gestionar los Costos de los Servicios de TI que posee la Organización</li>
				</ol>

				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Este módulo permite la Gestión de los <strong>Costos Indirectos</strong>, la generación del <strong>Modelo de Costos</strong> asociado a los servicios y despliega unas gráficas que permiten ver el comportamiento tanto del Modelo de Costos como de las Inversiones en Componentes de TI.
				</div>
			</div><!-- end of col-12-->
		</div><!-- end of row Cabecera-->

		<!-- Menú del Módulo de Costos-->
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<!-- Cargar Costos Indirectos -->
					<div class="col-lg-3">
						<div class="panel panel-info">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-6">
										<i class="fa fa-cog fa-5x"></i>
									</div>
									<div class="col-xs-6 text-center">
										<p class="announcement-text">Cargar Costos Indirectos</p>
									</div>
								</div>
							</div>
							<a href="<?php echo site_url('index.php/Costos/CargarCostosIndirectos');?>">
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

					<!-- Modelo de Costos -->
					<div class="col-lg-3">
						<div class="panel panel-info">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-6">
										<i class="fa fa-list fa-5x"></i>
									</div>
									<div class="col-xs-6 text-center">
										<p class="announcement-text">Modelo de Costos</p>
									</div>
								</div>
							</div>
							<a href="<?php echo site_url('index.php/Costos/ModeloCostos');?>">
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

					<!-- Históricos  -->
					<div class="col-lg-3">
						<div class="panel panel-info">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-6">
										<i class="fa fa-signal fa-5x"></i>
									</div>
									<div class="col-xs-6 text-center">
										<p class="announcement-text">Históricos</p>
									</div>
								</div>
							</div>
							<a href="<?php echo site_url('index.php/Costos/Historicos');?>">
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

					<!-- Recomendaciones -->
					<div class="col-lg-3">
						<div class="panel panel-info">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-file-text fa-5x"></i>
									</div>
									<div class="col-xs-9 text-center">
										<p class="announcement-text">Recomendaciones</p>
									</div>
								</div>
							</div>
							<a href="<?php echo site_url('index.php/Costos/Recomendaciones');?>">
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
									<div class="col-xs-5">
										<i class="fa fa-book fa-5x"></i>
									</div>
									<div class="col-xs-7 text-center">
										<p class="announcement-text">Documentación</p>
									</div>
								</div>
							</div>
							<a href="<?php echo site_url('index.php/Costos/documentacion');?>/">
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