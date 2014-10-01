<div id="page-wrapper">
	<div class="col-lg-12">
		<h1>Gestión de Continuidad del Negocio</h1>
		<?php
			echo $breadcrumbs;
			$message = "Permite la gestión y elaboración de planes de acción, prevención y recuperación de los servicios del negocio en caso de desastres.";
			print_alert($message);
		?>
	</div>
	<div class="row">
		<!-- <a href="<?php echo site_url('index.php/continuidad/backup') ?>">Respaldar Base de Datos</a> -->
		<div class="col-lg-4 col-lg-offset-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-6">
							<i class="fa fa-save fa-5x"></i>
						</div>
						<div class="col-xs-6 text-center">
							<p class="announcement-text">Respaldar la Base de Datos del Sistema</p>
						</div>
					</div>
				</div>
				<a href="<?php echo site_url('index.php/continuidad/respaldos') ?>">
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
		<div class="col-lg-4 col-lg-offset-2">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-6">
							<i class="fa fa-fire-extinguisher fa-5x"></i>
						</div>
						<div class="col-xs-6 text-center">
							<p class="announcement-text">Gestión de Riesgos y Amenazas</p>
						</div>
					</div>
				</div>
				<a href="<?php echo site_url('index.php/continuidad/gestion_riesgos') ?>">
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
		<div class="col-lg-4">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-6">
							<i class="fa fa-user fa-5x"></i>
						</div>
						<div class="col-xs-6 text-center">
							<p class="announcement-text">Creación de equipos para el desarrollo de los PCN</p>
						</div>
					</div>
				</div>
				<a href="<?php echo site_url('index.php/continuidad/equipos') ?>">
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
		<div class="col-lg-4 col-lg-offset-2">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-6">
							<i class="fa fa-cloud-upload fa-5x"></i>
						</div>
						<div class="col-xs-6 text-center">
							<p class="announcement-text">Creación de estrategias de recuperación</p>
						</div>
					</div>
				</div>
				<a href="<?php echo site_url('index.php/continuidad/estrategias') ?>">
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
		<div class="col-lg-4">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-6">
							<i class="fa fa-th-list fa-5x"></i>
						</div>
						<div class="col-xs-6 text-center">
							<p class="announcement-text">Listado de Planes de Continuidad del Negocio</p>
						</div>
					</div>
				</div>
				<a href="<?php echo site_url('index.php/continuidad/seleccionar_listado') ?>">
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
	</div>
</div>