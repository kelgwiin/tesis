<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Gestión de Continuidad del Negocio</h1>
			<?php
				echo $breadcrumbs;
				$message = "Gestión de amenazas, vulnerabilidades y riesgos que se pueden presentar en la organización";
				print_alert($message,'info');
			?>
			<h3>Gestión de riesgos y amenazas</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-6">
							<i class="fa fa-fire fa-5x"></i>
						</div>
						<div class="col-xs-6 text-center">
							<p class="announcement-text">Categorías de riesgos y amenazas</p>
						</div>
					</div>
				</div>
				<a href="<?php echo site_url('index.php/continuidad/gestion_riesgos/categorias');?>">
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
							<p class="announcement-text">Listado de riesgos y amenazas</p>
						</div>
					</div>
				</div>
				<a href="<?php echo site_url('index.php/continuidad/gestion_riesgos/listado');?>">
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
							<i class="fa fa-flash fa-5x"></i>
						</div>
						<div class="col-xs-6 text-center">
							<p class="announcement-text">Listado de vulnerabilidades</p>
						</div>
					</div>
				</div>
				<a href="<?php echo site_url('index.php/continuidad/gestion_riesgos/vulnerabilidades');?>">
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