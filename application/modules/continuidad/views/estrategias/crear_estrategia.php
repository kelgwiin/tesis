<?php
	if(isset($estrategia) && !empty($estrategia))
	{
		$h3 = 'Modificar estrategia';
		$button = 'Modificar estrategia';
	}else
	{
		$h3 = 'Agregar nueva estrategia';
		$button = 'Crear nueva estrategia';
	}
?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Gestión de Continuidad del Negocio</h1>
			<?php echo $breadcrumbs ?>
			<h3><?php echo $h3 ?></h3>
			<span class="text-muted">Al dejar el ratón sobre los títulos del formulario, obtendrá mayor información</span>
		</div>
	</div>
	
	<div class="row" style="margin-top: 25px">
		<div class="col-md-6">
			<div class="row">
				<form class="form-horizontal" method="post" action="<?php echo site_url('index.php/continuidad/estrategias/crear') ?>">
					<fieldset>
						
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="denominacion" data-toggle="tooltip" title="Nombre o título que lleva la estrategia de recuperación. Ej: Exploración por virus en el sistema">
								Denominación
							</label>  
							<div class="col-md-7">
								<input id="denominacion" name="denominacion" type="text" placeholder="Título de la estrategia" class="form-control input-md"
									value="<?php echo set_value('denominacion',@$estrategia->denominacion) ?>" required="">
							</div>
						</div>
						
						<!-- Select Basic -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="id_tipoestrategia">Tipo de estrategia</label>
							<div class="col-md-7">
								<select name="id_tipoestrategia" class="form-control">
									<?php foreach($tipo_estrategias as $key => $tipo) : ?>
										<option value="<?php echo $tipo->id_tipoestrategia ?>" <?php echo ((isset($estrategia)) && ($estrategia->id_tipoestrategia == $tipo->id_tipoestrategia)) ? 'selected' : '' ?>>
											<?php echo (isset($tipo->parentesis) && !empty($tipo->parentesis)) ? $tipo->denominacion.' ('.$tipo->parentesis.')' : $tipo->denominacion ?>
										</option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						
						<!-- Prepended text-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="costo" data-toggle="tooltip" title="Ingrese sólamente el valor numérico del costo de la estrategia. Si no tiene costo puede colocar 0">
								Costo
							</label>
							<div class="col-md-7">
								<div class="input-group">
									<span class="input-group-addon">Bsf.</span>
									<input name="costo" class="form-control" placeholder="0000" type="text"
										value="<?php echo set_value('costo',@$estrategia->costo) ?>" required="">
								</div>
							</div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="hardware" data-toggle="tooltip" title="Herramientas de hardware necesarias para llevar a cabo la estrategia">
								Hardware
							</label>  
							<div class="col-md-7">
								<input name="hardware" type="text" placeholder="Servidores, monitores, UPS..." class="form-control input-md"
									value="<?php echo set_value('hardware',@$estrategia->hardware) ?>" required="">
							</div>
						</div>
						
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="telecom" data-toggle="tooltip" title="Herramientas de telecomunicaciones necesarias para llevar a cabo la estrategia">
								Telecomunicaciones
							</label>  
							<div class="col-md-7">
								<input name="telecom" type="text" placeholder="Routers, Modems..." class="form-control input-md"
									value="<?php echo set_value('telecom',@$estrategia->telecom) ?>" required="">
							</div>
						</div>
						
						<?php
							$fecha_inicio = (isset($estrategia->fecha_inicio) && !empty($estrategia->fecha_inicio)) ? date('d-m-Y',strtotime($estrategia->fecha_inicio)) : '';
							$fecha_fin = (isset($estrategia->fecha_fin) && !empty($estrategia->fecha_fin)) ? date('d-m-Y',strtotime($estrategia->fecha_fin)) : '';
						?>
						
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="tiempo" data-toggle="tooltip" title="Tiempo de vigencia o de contrato del tipo de estrategia seleccionado del cuadro de leyenda">
								Tiempo
							</label>  
							<div class="col-md-3">
								<input name="fecha_inicio" type="text" placeholder="dd/mm/aaaa" class="form-control input-md" data-date-format="dd-mm-yyyy"
									value="<?php echo set_value('fecha_inicio',$fecha_inicio) ?>" required="" readonly />
							</div>
							<div class="col-md-1">-</div>
							<div class="col-md-3">
								<input name="fecha_fin" type="text" placeholder="dd/mm/aaaa" class="form-control input-md" data-date-format="dd-mm-yyyy"
									value="<?php echo set_value('fecha_fin',$fecha_fin) ?>" required="" readonly />
							</div> 
						</div>
						
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="localizacion" data-toggle="tooltip" title="Dirección del sitio en donde se llevará a cabo la estrategia de recuperación. Ej: Calle Páez Edificio A, oficina 1-12 Valencia Carabobo - Frente al C.C Los Robles">
								Localización
							</label>  
							<div class="col-md-7">
								<input name="localizacion" type="text" placeholder="Localización del sitio" class="form-control input-md"
									value="<?php echo set_value('localizacion',@$estrategia->localizacion) ?>" required="">
							</div>
						</div>
						
						<?php $acotaciones = (isset($estrategia->acotaciones) && !empty($estrategia->acotaciones)) ? $estrategia->acotaciones : ''; ?>
						<!-- Textarea -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="acotaciones">Otras acotaciones</label>
							<div class="col-md-7">                     
								<textarea class="form-control" name="acotaciones"><?php echo $acotaciones ?></textarea>
							</div>
						</div>

						<?php if(isset($estrategia) && !empty($estrategia)) : ?>
							<input type="hidden" name="id_estrategia" value="<?php echo $estrategia->id_estrategia ?>" />
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
							<h5 class="panel-title" style="font-size: 13.5px">Leyenda de las características de las diferentes estrategias de recuperación</h5>
						</div>
						<div class="panel-body">
							<span style="font-size: 11px; color: #A4A4A4">Nota: Al dejar el ratón sobre el título del sitio aparecerá su descripción correspondiente</span>
							<table class="table table-bordered">
								<thead>
									<th>Sitio</th>
									<th>Hardware</th>
									<th>Telecom</th>
									<th>Tiempo</th>
								</thead>
								<tbody>
									<?php foreach($tipo_estrategias as $key => $tipo) : ?>
										<tr>
											<td style="font-size: 11px">
												<span data-toggle="tooltip" data-title="<?php echo $tipo->descripcion ?>">
													<strong><?php echo $tipo->denominacion ?></strong>
												</span>
											</td>
											<td style="font-size: 11px"><?php echo $tipo->hardware ?></td>
											<td style="font-size: 11px"><?php echo $tipo->telecom ?></td>
											<td style="font-size: 11px"><?php echo $tipo->tiempo ?></td>
										</tr>
									<?php endforeach ?>
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
	//--------- DATEPICKER
	// $('input[name=fecha_inicio]').datepicker();
	$(function()
	{
		// $('input[name=fecha_inicio]').datepicker();
		// $('input[name=fecha_fin]').datepicker();
		var nowTemp = new Date();
		var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
		 
		var checkin = $('input[name=fecha_inicio]').datepicker().on('changeDate', function(ev)
		{
			checkin.hide();
			$('input[name=fecha_fin]')[0].focus();
		}).data('datepicker');
		var checkout = $('input[name=fecha_fin]').datepicker().on('changeDate', function(ev)
		{
			checkout.hide();
		}).data('datepicker');
	});
		
</script>