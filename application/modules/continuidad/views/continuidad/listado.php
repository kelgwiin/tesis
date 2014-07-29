<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Gestión de Continuidad del Negocio</h1>
			<?php echo $breadcrumbs ?>
			<h3>Listado de Planes de Continuidad del Negocio</h3>
		</div>
	</div>
	
	<?php
		$val = str_replace('-', ' ', $valoracion);
		$val = strtolower($val);
		$val = str_replace(' ', '-', $val);
	?>
	
	<div class="row">
		<div class="col-lg-9"></div>
		<div class="col-lg-2" style="left: 71px">
			<a href="<?php echo site_url('index.php/continuidad/crear_pcn/'.$val) ?>" class="btn btn-success">
				<i class="fa fa-plus"></i> Agregar nuevo PCN</a>
		</div>
	</div>
	
	<div class="row" style="margin-top: 25px">
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Planes de continuidad del negocio</h3>
				</div>
				<div class="panel-body">
					<?php if(!isset($planes_continuidad) OR empty($planes_continuidad)) : ?>
						<?php print_alert('<strong>No existe ningún Plan de Continuidad del Negocio para riesgos con valoración '.$valoracion.'. Puede crear uno dando click al botón de arriba.</strong>','danger') ?>
					<?php else : ?>
					<?php endif ?>
				</div>
			</div>
			<!-- <div class="table-responsive">
	            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                <thead>
	                    <tr>
	                        <th>Denominación <i class="fa fa-sort"></i></th>
	                        <th>Departamento <i class="fa fa-sort"></i></th>
	                        <th>Responsable <i class="fa fa-sort"></i></th>
	                        <th>Tipo de PCN <i class="fa fa-sort"></i></th>
	                        <th>Prioridad <i class="fa fa-sort"></i></th>
	                        <th>Estado del PCN <i class="fa fa-sort"></i></th>
	                        <th>Fecha de creación <i class="fa fa-sort"></i></th>
                        	<th>Eliminar <i class="fa fa-sort"></i></th>
	                    </tr>
	                </thead>
	                <tbody>
	                	<tr>
	                		<td><a>Fallo de sistema</a></td>
	                		<td>Contabilidad</td>
	                		<td>Karl Rhodes</td>
	                		<td>Reactivo</td>
	                		<td>Alta</td>
	                		<td>Activo</td>
	                		<td>21/02/2014</td>
	                		<td><a><span class="label label-danger">X</span></a></td>
	                	</tr>
	                	<tr>
	                		<td><a>Fallo de suministro eléctrico</a></td>
	                		<td>Producción</td>
	                		<td>Karla Mccormick</td>
	                		<td>Preventivo</td>
	                		<td>Alta</td>
	                		<td>Activo</td>
	                		<td>31/08/2013</td>
	                		<td><a><span class="label label-danger">X</span></a></td>
	                	</tr>
	                	<tr>
	                		<td><a>Incendio</a></td>
	                		<td>Producción</td>
	                		<td>Alexandra Rowe</td>
	                		<td>Reactivo</td>
	                		<td>Alta</td>
	                		<td>Inactivo</td>
	                		<td>18/04/2014</td>
	                		<td><a><span class="label label-danger">X</span></a></td>
	                	</tr>
	                	<tr>
	                		<td><a>Robo de material</a></td>
	                		<td>Sistemas</td>
	                		<td>Calvin Bowers</td>
	                		<td>Reactivo</td>
	                		<td>Media</td>
	                		<td>Inactivo</td>
	                		<td>15/02/2013</td>
	                		<td><a><span class="label label-danger">X</span></a></td>
	                	</tr>
	                	<tr>
	                		<td><a>Sofware malicioso</a></td>
	                		<td>Sistemas</td>
	                		<td>Cornelius Henry</td>
	                		<td>Preventivo</td>
	                		<td>Media</td>
	                		<td>Activo</td>
	                		<td>01/06/2014</td>
	                		<td><a><span class="label label-danger">X</span></a></td>
	                	</tr>
	                	<tr>
	                		<td><a>Fallo de UPS</a></td>
	                		<td>Producción</td>
	                		<td>Kathleen Harrington</td>
	                		<td>Reactivo</td>
	                		<td>Alta</td>
	                		<td>Activo</td>
	                		<td>15/02/2014</td>
	                		<td><a><span class="label label-danger">X</span></a></td>
	                	</tr>
	                </tbody>
				</table>
			</div> -->
		</div>
	</div>
</div>
