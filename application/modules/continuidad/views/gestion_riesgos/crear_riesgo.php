<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Gestión de Continuidad del Negocio</h1>
			<?php echo $breadcrumbs ?>
			<h3>Agregar un nuevo riesgo</h3>
		</div>
	</div>
	
	<div class="row" style="margin-top: 25px">
		<div class="col-md-6">
			<div class="row">
				<form class="form-horizontal">
					<fieldset>
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="denominacion">Denominación</label>  
							<div class="col-md-6">
								<input id="denominacion" name="denominacion" type="text" placeholder="Denominación del riesgo" class="form-control input-md" required="" />
							</div>
						</div>
						
						<!-- Select Basic -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="id_categoria">Categoría</label>
							<div class="col-md-6">
								<select id="id_categoria" name="id_categoria" class="form-control">
									<option value="1">Ataques intencionados internos</option>
									<option value="2">Ataques intencionados externos</option>
									<option value="3">Ataques no intencionados internos</option>
									<option value="4">Ataques no intencionados externos</option>
									<option value="5">Daños accidentales</option>
									<option value="6">Desastres naturales</option>
								</select>
							</div>
						</div>
						
						<!-- Select Basic -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="probabilidad">Probabilidad</label>
							<div class="col-md-6">
								<select id="id_categoria" name="probabilidad" class="form-control">
									<option value="5">Alta</option>
									<option value="4">Media-Alta</option>
									<option value="3">Media</option>
									<option value="2">Media-Baja</option>
									<option value="1">Baja</option>
								</select>
							</div>
						</div>
						
						<!-- Select Basic -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="probabilidad">Impacto</label>
							<div class="col-md-6">
								<select id="id_categoria" name="probabilidad" class="form-control">
									<option value="5">Alto</option>
									<option value="4">Medio-Alto</option>
									<option value="3">Medio</option>
									<option value="2">Medio-Bajo</option>
									<option value="1">Bajo</option>
								</select>
							</div>
						</div>
						
						<!-- Button -->
						<div class="form-group">
							<label class="col-md-4 control-label" for=""></label>
							<div class="col-md-4">
								<button id="" name="" class="btn btn-success">Crear nuevo riesgo</button>
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