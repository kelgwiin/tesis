<?php
	if(isset($riesgo) && !empty($riesgo))
	{
		$h3 = 'Modificar riesgo';
		$button = 'Modificar riesgo';
	}else
	{
		$h3 = 'Agregar un nuevo riesgo';
		$button = 'Crear nuevo riesgo';
	}
?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Gestión de Continuidad del Negocio</h1>
			<?php echo $breadcrumbs ?>
			<h3><?php echo $h3 ?></h3>
		</div>
	</div>
	
	<div class="row" style="margin-top: 25px">
		<div class="col-md-6">
			<div class="row">
				<form class="form-horizontal" method="post" action="<?php echo site_url('index.php/continuidad/gestion_riesgos/riesgos/crear_riesgo') ?>">
					<fieldset>
						<!-- Text input-->
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-6">
								<?php echo form_error('denominacion') ?>
							</div>
						</div>
						<div class="form-group <?php echo (form_error('denominacion')) ? 'has-error' : '' ?>">
							<label class="col-md-4 control-label" for="denominacion">Denominación</label>  
							<div class="col-md-6">
								<input name="denominacion" type="text" placeholder="Denominación del riesgo" class="form-control input-md"
									value="<?php echo set_value('denominacion') ?>" required="" />
							</div>
						</div>
						
						<!-- Select Basic -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="id_categoria">Categoría</label>
							<div class="col-md-6">
								<select id="id_categoria" name="id_categoria" class="form-control">
									<?php foreach($categorias as $key => $categoria) : ?>
										<option value="<?php echo $categoria->id_categoria ?>" <?php echo set_select('id_categoria', @$riesgo->id_categoria); ?>>
											<?php echo $categoria->categoria ?>
										</option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						
						<!-- Select Basic -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="probabilidad">Probabilidad</label>
							<div class="col-md-6">
								<select name="probabilidad" class="form-control">
									<option value="Alta">Alta</option>
									<option value="Media-Alta">Media-Alta</option>
									<option value="Media">Media</option>
									<option value="Media-Baja">Media-Baja</option>
									<option value="Baja">Baja</option>
								</select>
							</div>
						</div>
						
						<!-- Select Basic -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="probabilidad">Impacto</label>
							<div class="col-md-6">
								<select name="impacto" class="form-control">
									<option value="Alto">Alto</option>
									<option value="Medio-Alto">Medio-Alto</option>
									<option value="Medio">Medio</option>
									<option value="Medio-Bajo">Medio-Bajo</option>
									<option value="Bajo">Bajo</option>
								</select>
							</div>
						</div>
						
						<!-- Button -->
						<div class="form-group">
							<label class="col-md-4 control-label"></label>
							<div class="col-md-4">
								<button type="submit" class="btn btn-success"><?php echo $button ?></button>
							</div>
						</div>
					
					</fieldset>
				</form>
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-11">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Leyenda de los niveles de probabilidad de amenazas</h3>
						</div>
						<div class="panel-body">
							<table>
								<tbody>
									<tr>
										<td><span class="label label-danger">Alta:</span></td>
										<td style="font-size: 11px">La amenaza está altamente motivada y es muy capaz de llevarse a cabo</td>
									</tr>
									<tr>
										<td><span class="label label-danger">Media-Alta:</span></td>
										<td style="font-size: 11px">La amenaza está afundamentada y es posible</td>
									</tr>
									<tr>
										<td><span class="label label-warning">Media:</span></td>
										<td style="font-size: 11px">La amenaza es posible</td>
									</tr>
									<tr>
										<td><span class="label label-info">Media-Baja:</span></td>
										<td style="font-size: 11px">La amenaza no posee la suficiente capacidad</td>
									</tr>
									<tr>
										<td><span class="label label-default">Baja:</span></td>
										<td style="font-size: 11px">La amenaza no posee la suficiente motivación y capacidad</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-11">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Valoración de los niveles de impacto de las amenazas</h3>
						</div>
						<div class="panel-body">
							<table>
								<tbody>
									<tr>
										<td><span class="label label-danger">Alto:</span></td>
										<td style="font-size: 11px">El impacto de la amenaza es altamente dañino para la organización</td>
									</tr>
									<tr>
										<td><span class="label label-danger">Medio-Alto:</span></td>
										<td style="font-size: 11px">El impacto es dañino</td>
									</tr>
									<tr>
										<td><span class="label label-warning">Medio:</span></td>
										<td style="font-size: 11px">El impacto puede producir daños importantes</td>
									</tr>
									<tr>
										<td><span class="label label-info">Medio-Bajo:</span></td>
										<td style="font-size: 11px">El impacto puede producir daños secundarios</td>
									</tr>
									<tr>
										<td><span class="label label-default">Bajo:</span></td>
										<td style="font-size: 11px">El impacto es nulo o despresiable</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>