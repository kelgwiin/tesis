<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Gestión de Continuidad del Negocio</h1>
			<?php echo $breadcrumbs ?>
			<h3>Listado de respaldos de la base de datos</h3>
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
	
	<div class="row">
		<div class="col-lg-9"></div>
		<div class="col-lg-2" style="left: 71px">
			<a href="#<?php echo site_url('index.php/continuidad/respaldar_basedatos') ?>" data-toggle="modal" data-target="#respaldar" class="btn btn-success">
				<i class="fa fa-plus"></i> Respaldar BD actual</a>
		</div>
	</div>
	
	<div class="row" style="margin-top: 25px">
		<div class="col-lg-12">
			<?php print_alert('Es altamente recomendable que al respaldar una base de datos, la descargue y la almacene en otro lugar para mayor seguridad','warning') ?>
		</div>
	</div>
	
	<div class="row" style="margin-top: 25px">
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Listado de respaldos de la base de datos</h3>
				</div>
				<div class="panel-body">
					<?php if(!isset($respaldos) OR empty($respaldos)) : ?>
						<?php print_alert('<strong>No se ha realizado ningún respaldo. Debe respaldar la base de datos con urgencia.</strong>','danger') ?>
					<?php else : ?>
						<div class="table-responsive">
				            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
				                <thead>
				                    <tr>
				                        <th>Descripción <i class="fa fa-sort"></i></th>
				                        <th>Fecha de creación <i class="fa fa-sort"></i></th>
				                        <th>Descargar</th>
				                    </tr>
				                </thead>
				                <tbody>
				                	<?php foreach($respaldos as $key => $respaldo) : ?>
				                		<tr>
				                			<td><?php echo character_limiter($respaldo->descripcion,25) ?></td>
				                			<td><?php echo date('d-m-Y h:i A',strtotime($respaldo->fecha_creacion)) ?></td>
				                			<td>
				                				<a href="<?php echo site_url('index.php/continuidad/respaldos/descargar/'.$respaldo->id_respaldo) ?>">Click para descargar</a>
				                			</td>
				                		</tr>
				                	<?php endforeach ?>
				                </tbody>
							</table>
						</div>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="respaldar" tabindex="-1" role="dialog" aria-labelledby="activar" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Respaldar Base de Datos</h4>
				</div>
				<form class="form-horizontal" method="post" action="<?php echo site_url('index.php/continuidad/respaldos/crear') ?>">
					<div class="modal-body">
						<fieldset>
							<div class="form-group">
								<label class="col-md-4 control-label" for="creacion">Descripción</label>  
								<div class="col-md-6">
									<input name="descripcion" type="text" placeholder="Descripción corta de la base de datos" class="form-control input-md" required />
								</div>
							</div>
						</fieldset>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Atras</button>
						<button type="submit" class="btn btn-success">
							Respaldar
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>