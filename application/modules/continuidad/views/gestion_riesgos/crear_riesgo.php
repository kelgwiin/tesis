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
									value="<?php echo set_value('denominacion',@$riesgo->denominacion) ?>" required="" />
							</div>
						</div>
						
						<!-- Select Basic -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="id_categoria">Categoría</label>
							<div class="col-md-6">
								<select id="id_categoria" name="id_categoria" class="form-control">
									<?php foreach($categorias as $key => $categoria) : ?>
										<option value="<?php echo $categoria->id_categoria ?>"
											<?php echo (isset($riesgo->id_categoria) && ($categoria->id_categoria == $riesgo->id_categoria)) ? 'selected' : '' ?>>
											<?php echo $categoria->categoria ?>
										</option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						
						<?php if(isset($procesos) && !empty($procesos)) : ?>
							<div class="form-group" id="procesos">
								<label class="col-md-4 control-label" for="id_servicioproceso">Proceso</label>
								<div class="col-md-6">
									<select name="id_servicioproceso" class="form-control">
										<?php foreach($procesos as $key => $proceso) : ?>
											<option value="<?php echo $proceso->servicio_proceso_id ?>"
												<?php echo (isset($riesgo->id_servicioproceso) && ($proceso->servicio_proceso_id == $riesgo->id_servicioproceso)) ? 'selected' : '' ?>>
												<?php echo $proceso->nombre.' ('.$proceso->tipo.')' ?>
											</option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
						<?php endif ?>
						
						<!-- Select Basic -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="probabilidad">Probabilidad</label>
							<div class="col-md-6">
								<select name="probabilidad" class="form-control">
									<option value="Alta" <?php echo (isset($riesgo->probabilidad) && ($riesgo->probabilidad == 'Alta')) ? 'selected' : '' ?>>Alta</option>
									<option value="Media-Alta" <?php echo (isset($riesgo->probabilidad) && ($riesgo->probabilidad == 'Media-Alta')) ? 'selected' : '' ?>>Media-Alta</option>
									<option value="Media" <?php echo (isset($riesgo->probabilidad) && ($riesgo->probabilidad == 'Media')) ? 'selected' : '' ?>>Media</option>
									<option value="Media-Baja" <?php echo (isset($riesgo->probabilidad) && ($riesgo->probabilidad == 'Media-Baja')) ? 'selected' : '' ?>>Media-Baja</option>
									<option value="Baja" <?php echo (isset($riesgo->probabilidad) && ($riesgo->probabilidad == 'Baja')) ? 'selected' : '' ?>>Baja</option>
								</select>
							</div>
						</div>
						
						<!-- Select Basic -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="probabilidad">Impacto</label>
							<div class="col-md-6">
								<select name="impacto" class="form-control">
									<option value="Alto" <?php echo (isset($riesgo->impacto) && ($riesgo->impacto == 'Alto')) ? 'selected' : '' ?>>Alto</option>
									<option value="Medio-Alto" <?php echo (isset($riesgo->impacto) && ($riesgo->impacto == 'Medio-Alto')) ? 'selected' : '' ?>>Medio-Alto</option>
									<option value="Medio" <?php echo (isset($riesgo->impacto) && ($riesgo->impacto == 'Medio')) ? 'selected' : '' ?>>Medio</option>
									<option value="Medio-Bajo" <?php echo (isset($riesgo->impacto) && ($riesgo->impacto == 'Medio-Bajo')) ? 'selected' : '' ?>>Medio-Bajo</option>
									<option value="Bajo" <?php echo (isset($riesgo->impacto) && ($riesgo->impacto == 'Bajo')) ? 'selected' : '' ?>>Bajo</option>
								</select>
							</div>
						</div>
						
						<?php if(isset($riesgo) && !empty($riesgo)) : ?>
							<input type="hidden" name="id_riesgo" value="<?php echo $riesgo->id_riesgo ?>" />
						<?php endif ?>
						
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
<script>
	$(function()
	{
		$('#procesos').hide();
		$('select[name=id_categoria]').change(function()
		{
			var val = $(this).val();
			if(val == 7)
				$('#procesos').fadeIn();
			else
				$('#procesos').fadeOut();
		});
		<?php if(isset($riesgo) && ($riesgo->id_categoria == 7)) : ?>
			$('#procesos').show();
		<?php endif ?>
	});
</script>