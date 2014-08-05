<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Gestión de Continuidad del Negocio</h1>
			<?php echo $breadcrumbs ?>
			<h3>Crear nuevo de equipo de desarrollo</h3>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-12">
			<?php 
				if($this->session->flashdata('alert_success')) print_alert($this->session->flashdata('alert_success'));
				if($this->session->flashdata('alert_error')) print_alert($this->session->flashdata('alert_error'),'danger');
			?>
		</div>
	</div>
	
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Nuevo equipo para <?php echo strtoupper($tipo_equipo) ?></h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<form class="form-horizontal">
					<fieldset>
						<!-- Select Multiple -->
						<div class="form-group">
							<div class="col-md-4 col-md-offset-1">
								<label>Personal de la organización</label>
								<select name="personal" class="form-control" size="10" style="margin-top: 25px">
									<?php foreach($personal as $key => $person) : ?>
										<div id="dpto<?php echo $key ?>">
										<optgroup label="<?php echo strtoupper($key) ?>">
											<?php foreach($person as $k => $per) : ?>
												<option value="<?php echo $per->id_personal ?>" data-nombre="<?php echo $per->nombre ?>"
													data-dpto="<?php echo strtoupper($key) ?>">
													<?php echo $per->nombre ?>
												</option>
											<?php endforeach ?>
										</optgroup>
										</div>
									<?php endforeach ?>
								</select>
							</div>
							<div class="col-md-2" style="margin-top: 90px">
								<center>
									<div>
										<a class="btn btn-primary" data-toggle="tooltip" id="add" 
											data-original-title="Agregar personal al equipo de desarrollo" data-placement="top">
											<i class = "fa fa-arrow-right fa-lg"></i>
										</a>
										<br /><br />
										<a class="btn btn-primary" data-toggle="tooltip" id="remove"
											data-original-title="Remover personal del equipo de desarrollo" data-placement="bottom">
											<i class="fa fa-arrow-left fa-lg"></i>
										</a>
									</div>
								</center>
							</div>
							<div class="col-md-4">
								<label>Equipo de desarrollo del PCN</label>
								<select name="equipo" class="form-control" size="10" style="margin-top: 25px">
								</select>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
<?php echo $equipocrear_js ?>