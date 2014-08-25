<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Gestión de Continuidad del Negocio</h1>
			<?php echo $breadcrumbs ?>
			<h3>Agregar un nuevo Plan de Continuidad del Negocio</h3>
			<h4 id="panel-title">Datos generales</h4>
		</div>
	</div>
	
	<div class="row" style="margin-top: 25px">

		<form class="form-horizontal">
			<fieldset>
				<?php //echo_pre($departamentos) ?>
<!-- PANEL DE DATOS GENERALES -->
				<div id="datos-generales">
					<div class="form-group">
						<label class="col-md-4 control-label" for="creacion">Código</label>  
						<div class="col-md-4">
							<input name="codigo" type="text" placeholder="Código del PCN" class="form-control input-md"
								data-toggle="tooltip" data-placement="top" data-original-title="Código del Plan de Continuidad del Negocio" required />
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label" for="creacion">Denominación</label>  
						<div class="col-md-4">
							<input name="denominacion" type="text" placeholder="Denominación del PCN" class="form-control input-md"
								data-toggle="tooltip" data-placement="top" data-original-title="Nombre que lleva el Plan de Continuidad del Negocio" required />
						</div>
					</div>
					
					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="denominacion_riesgo">Riesgo/Amenaza</label>
						<div class="col-md-4">
							<select name="id_riesgo" class="form-control">
								<?php foreach($riesgos as $key => $riesgo) : ?>
									<option value="<?php echo $riesgo->id_riesgo ?>"><?php echo $riesgo->denominacion ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					
					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="id_departamento">Departamento</label>
						<div class="col-md-4">
							<select name="id_departamento" class="form-control">
								<option selected=""> -- </option>
								<?php foreach($departamentos as $key => $departamento) : ?>
									<option value="<?php echo $departamento->departamento_id ?>"><?php echo ucfirst($departamento->nombre) ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					
					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="id_responsable">Responsable</label>
						<div class="col-md-4">
							<select name="id_empleado" class="form-control">
								<option> -- </option>
							</select>
						</div>
					</div>
					
					<!-- Multiple Radios (inline) -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="tipo_pcn">Tipo de PCN</label>
						<div class="col-md-6"> 
							<label class="radio-inline" for="tipo_pcn-0">
								<input type="radio" name="tipo_pcn" id="tipo_pcn-0" value="1" checked="checked">
								Reactivo
							</label> 
							<label class="radio-inline" for="tipo_pcn-1">
								<input type="radio" name="tipo_pcn" id="tipo_pcn-1" value="2">
								Proactivo
							</label>
						</div>
					</div>
					
					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="id_estado">Estado del PCN</label>
						<div class="col-md-4">
							<select id="id_estado" name="id_estado" class="form-control">
								<?php foreach($estados as $key => $estado) : ?>
									<option value="<?php echo $estado->id_estado ?>"><?php echo ucfirst($estado->estado) ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					
					<div class="form-group" style="margin-top: 25px">
						<label class="col-md-4 control-label" ></label>
						<div class="col-md-2 col-md-offset-1">
							<div class="steps">
				                <ul>
				                    <li class="active">1</li>
				                    <li>2</li>
				                </ul>
				            </div>
			            </div>
		            </div>
					
					<!-- Button -->
					<div class="form-group">
						<label class="col-md-4 control-label" for=""></label>
						<div class="col-md-4 col-md-offset-3">
							<a class="btn btn-primary" id="next">Siguiente <i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
<!-- FIN PANEL DE DATOS GENERALES -->
				
<!-- PANEL DE CREACION DE EQUIPOS -->
				<div id="creacion-equipos">
					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="crisis">Comité de crisis</label>
						<div class="col-md-4">
							<select name="crisis" class="form-control" style="font-size: 12px">
								<?php foreach($crisis as $key => $cri) : ?>
									<?php $teamname = '' ?>
									<option value="<?php echo $cri->id_equipo ?>">
										<?php echo ucfirst($cri->nombre_equipo) ?>:&nbsp;&nbsp;
										<?php foreach($cri->equipo as $k => $team) : ?>
											<?php $teamname .= ($k == 0) ? $team->nombre : '- '.$team->nombre ?>
										<?php endforeach ?>
										<?php echo character_limiter($teamname,35) ?>
									</option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="recuperacion">Equipo de recuperación</label>
						<div class="col-md-4">
							<select name="recuperacion" class="form-control" style="font-size: 12px">
								<?php foreach($recuperacion as $key => $rec) : ?>
									<?php $teamname = '' ?>
									<option value="<?php echo $rec->id_equipo ?>">
										<?php echo ucfirst($rec->nombre_equipo) ?>:&nbsp;&nbsp;
										<?php foreach($rec->equipo as $k => $recup) : ?>
											<?php $teamname .= ($k == 0) ? $recup->nombre : '- '.$recup->nombre ?>
										<?php endforeach ?>
										<?php echo character_limiter($teamname,35) ?>
									</option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="logistica">Equipo de logística</label>
						<div class="col-md-4">
							<select name="logistica" class="form-control" style="font-size: 12px">
								<?php foreach($logistica as $key => $log) : ?>
									<?php $teamname = '' ?>
									<option value="<?php echo $log->id_equipo ?>">
										<?php echo ucfirst($log->nombre_equipo) ?>:&nbsp;&nbsp;
										<?php foreach($log->equipo as $k => $logist) : ?>
											<?php $teamname .= ($k == 0) ? $logist->nombre : '- '.$logist->nombre ?>
										<?php endforeach ?>
										<?php echo character_limiter($teamname,35) ?>
									</option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="rrpp">Equipo de RRPP</label>
						<div class="col-md-4">
							<select name="rrpp" class="form-control" style="font-size: 12px">
								<?php foreach($rrpp as $key => $rrp) : ?>
									<?php $teamname = '' ?>
									<option value="<?php echo $rrp->id_equipo ?>">
										<?php echo ucfirst($rrp->nombre_equipo) ?>:&nbsp;&nbsp;
										<?php foreach($rrp->equipo as $k => $rp) : ?>
											<?php $teamname .= ($k == 0) ? $rp->nombre : '- '.$rp->nombre ?>
										<?php endforeach ?>
										<?php echo character_limiter($teamname,35) ?>
									</option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="pruebas">Equipo de pruebas</label>
						<div class="col-md-4">
							<select name="pruebas" class="form-control" style="font-size: 12px">
								<?php foreach($pruebas as $key => $prueba) : ?>
									<?php $teamname = '' ?>
									<option value="<?php echo $prueba->id_equipo ?>">
										<?php echo ucfirst($prueba->nombre_equipo) ?>:&nbsp;&nbsp;
										<?php foreach($prueba->equipo as $k => $try) : ?>
											<?php $teamname .= ($k == 0) ? $try->nombre : '- '.$try->nombre ?>
										<?php endforeach ?>
										<?php echo character_limiter($teamname,35) ?>
									</option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					
					<div class="form-group" style="margin-top: 25px">
						<label class="col-md-4 control-label" ></label>
						<div class="col-md-2 col-md-offset-1">
							<div class="steps">
				                <ul>
				                    <li>1</li>
				                    <li class="active">2</li>
				                </ul>
				            </div>
			            </div>
		            </div>
					<!-- Buttons -->
					<div class="form-group">
						<label class="col-md-3 control-label" for=""></label>
						<div class="col-md-4">
							<a class="btn btn-primary" id="prev"><i class="fa fa-arrow-left"></i> Atras</a>
						</div>
						<div class="col-md-4">
							<button type="submit" class="btn btn-success">Guardar</button>
						</div>
					</div>
				</div>
<!-- FIN PANEL DE CREACION DE EQUIPOS -->
			</fieldset>
		</form>
	</div>
</div>
<?php echo $crearpcn_js ?>