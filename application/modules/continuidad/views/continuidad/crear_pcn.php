<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Gestión de Continuidad del Negocio</h1>
			<?php echo $breadcrumbs ?>
			<h3><?php echo (isset($plan_continuidad)) ? 'Modificar' : 'Agregar un nuevo' ?> Plan de Continuidad del Negocio</h3>
			<h4 id="panel-title">Datos generales</h4>
		</div>
	</div>
	
	<!-- <a class="btn btn-primary" target="blank" href="<?php echo site_url('index.php/continuidad/crear_maqueta') ?>">PDF</a> -->
	
	<div class="row" style="margin-top: 25px">

		<form class="form-horizontal" method="post" action="<?php echo site_url('index.php/continuidad/crear_pcn/'.$valoracion) ?>">
			<fieldset>
				<?php //echo_pre($plan_continuidad) ?>
<!-- PANEL DE DATOS GENERALES -->
				<div id="datos-generales">
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<?php echo form_error('codigo') ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="creacion">Código</label>  
						<div class="col-md-4">
							<input name="codigo" type="text" placeholder="Código del PCN" class="form-control input-md"
								data-toggle="tooltip" data-placement="top" data-original-title="Código del Plan de Continuidad del Negocio"
								value="<?php echo set_value('codigo',@$plan_continuidad->codigo) ?>" required />
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<?php echo form_error('denominacion') ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="creacion">Denominación</label>  
						<div class="col-md-4">
							<input name="denominacion" type="text" placeholder="Denominación del PCN" class="form-control input-md"
								data-toggle="tooltip" data-placement="top" data-original-title="Nombre que lleva el Plan de Continuidad del Negocio"
								value="<?php echo set_value('denominacion',@$plan_continuidad->denominacion) ?>" required />
						</div>
					</div>
					
					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="denominacion_riesgo">Riesgo/Amenaza</label>
						<div class="col-md-4">
							<select name="id_riesgo" class="form-control">
								<?php foreach($riesgos as $key => $riesgo) : ?>
									<option value="<?php echo $riesgo->id_riesgo ?>" <?php echo ((isset($plan_continuidad)) && ($riesgo->id_riesgo == $plan_continuidad->id_riesgo)) ? 'selected' : '' ?>>
										<?php echo $riesgo->denominacion ?>
									</option>
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
									<option value="<?php echo $departamento->departamento_id ?>" <?php echo ((isset($plan_continuidad)) && ($departamento->departamento_id == $plan_continuidad->id_departamento)) ? 'selected' : '' ?>>
										<?php echo ucfirst($departamento->nombre) ?>
									</option>
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
								<?php if(isset($plan_continuidad)) : ?>
									<option value="<?php echo $plan_continuidad->id_empleado ?>" selected><?php echo $plan_continuidad->nombre_empleado ?></option>
								<?php endif ?>
							</select>
						</div>
					</div>
					
					<!-- Multiple Radios (inline) -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="tipo_plan">Tipo de PCN</label>
						<div class="col-md-6"> 
							<label class="radio-inline" for="tipo_pcn-1">
								<input type="radio" name="tipo_plan" id="tipo_plan-1" value="proactivo" <?php echo (isset($plan_continuidad) && ($plan_continuidad->tipo_plan == 'proactivo')) ? 'checked' : '' ?>>
								Proactivo
							</label>
							<label class="radio-inline" for="tipo_pcn-0">
								<input type="radio" name="tipo_plan" id="tipo_plan-0" value="reactivo" <?php echo (isset($plan_continuidad) && ($plan_continuidad->tipo_plan == 'reactivo')) ? 'checked' : '' ?>>
								Reactivo
							</label>
						</div>
					</div>
					
					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="id_estado">Estado del PCN</label>
						<div class="col-md-4">
							<select id="id_estado" name="id_estado" class="form-control">
								<?php foreach($estados as $key => $estado) : ?>
									<option value="<?php echo $estado->id_estado ?>" <?php echo ((isset($plan_continuidad)) && ($estado->id_estado == $plan_continuidad->id_estado)) ? 'selected' : '' ?>>
										<?php echo ucfirst($estado->estado) ?>
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
				                    <li class="active">1</li>
				                    <li>2</li>
				                    <li>3</li>
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
				<?php //echo_pre($crisis) ?>
<!-- PANEL DE CREACION DE EQUIPOS -->
				<div id="creacion-equipos">
					<?php
						$desc_crisis = (isset($plan_continuidad->desc_crisis) && !empty($plan_continuidad->desc_crisis)) ? $plan_continuidad->desc_crisis : '';
						$desc_recuperacion = (isset($plan_continuidad->desc_recuperacion) && !empty($plan_continuidad->desc_recuperacion)) ? $plan_continuidad->desc_recuperacion : '';
						$desc_logistica = (isset($plan_continuidad->desc_logistica) && !empty($plan_continuidad->desc_logistica)) ? $plan_continuidad->desc_logistica : '';
						$desc_rrpp = (isset($plan_continuidad->desc_rrpp ) && !empty($plan_continuidad->desc_rrpp )) ? $plan_continuidad->desc_rrpp  : '';
						$desc_pruebas = (isset($plan_continuidad->desc_pruebas) && !empty($plan_continuidad->desc_pruebas)) ? $plan_continuidad->desc_pruebas : '';
						$consideraciones = (isset($plan_continuidad->consideraciones) && !empty($plan_continuidad->consideraciones)) ? $plan_continuidad->consideraciones : '';
					?>
					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="crisis">Comité de crisis</label>
						<div class="col-md-4">
							<select name="id_crisis" class="form-control" style="font-size: 12px">
								<?php foreach($crisis as $key => $cri) : ?>
									<?php $teamname = '' ?>
									<option value="<?php echo $cri->id_equipo ?>" <?php echo ((isset($plan_continuidad)) && ($cri->id_equipo == $plan_continuidad->id_crisis)) ? 'selected' : '' ?>>
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
					<!-- Textarea -->
					<div class="form-group">
						<label class="col-md-4 control-label">Plan de acción Crisis</label>
						<div class="col-md-4">                     
							<textarea class="form-control" name="desc_crisis" rows="4"
								placeholder="Plan de acción que debe seguir el Comité de Crisis una vez activado el PCN"><?php echo $desc_crisis ?></textarea>
						</div>
					</div>
					<br />
					
					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="recuperacion">Equipo de recuperación</label>
						<div class="col-md-4">
							<select name="id_recuperacion" class="form-control" style="font-size: 12px">
								<?php foreach($recuperacion as $key => $rec) : ?>
									<?php $teamname = '' ?>
									<option value="<?php echo $rec->id_equipo ?>" <?php echo ((isset($plan_continuidad)) && ($rec->id_equipo == $plan_continuidad->id_recuperacion)) ? 'selected' : '' ?>>
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
					<!-- Textarea -->
					<div class="form-group">
						<label class="col-md-4 control-label">Plan de acción Recuperación</label>
						<div class="col-md-4">                     
							<textarea class="form-control" name="desc_recuperacion" rows="4"
								placeholder="Plan de acción que debe seguir el Equipo de Recuperación una vez activado el PCN"><?php echo $desc_recuperacion ?></textarea>
						</div>
					</div>
					<br />
					
					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="logistica">Equipo de logística</label>
						<div class="col-md-4">
							<select name="id_logistica" class="form-control" style="font-size: 12px">
								<?php foreach($logistica as $key => $log) : ?>
									<?php $teamname = '' ?>
									<option value="<?php echo $log->id_equipo ?>" <?php echo ((isset($plan_continuidad)) && ($log->id_equipo == $plan_continuidad->id_logistica)) ? 'selected' : '' ?>>
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
					<!-- Textarea -->
					<div class="form-group">
						<label class="col-md-4 control-label">Plan de acción Logística</label>
						<div class="col-md-4">                     
							<textarea class="form-control" name="desc_logistica" rows="4"
								placeholder="Plan de acción que debe seguir el Equipo de Logística una vez activado el PCN"><?php echo $desc_logistica ?></textarea>
						</div>
					</div>
					<br />
					
					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="rrpp">Equipo de RRPP</label>
						<div class="col-md-4">
							<select name="id_rrpp" class="form-control" style="font-size: 12px">
								<?php foreach($rrpp as $key => $rrp) : ?>
									<?php $teamname = '' ?>
									<option value="<?php echo $rrp->id_equipo ?>" <?php echo ((isset($plan_continuidad)) && ($rrp->id_equipo == $plan_continuidad->id_rrpp)) ? 'selected' : '' ?>>
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
					<!-- Textarea -->
					<div class="form-group">
						<label class="col-md-4 control-label">Plan de acción RRPP</label>
						<div class="col-md-4">                     
							<textarea class="form-control" name="desc_rrpp" rows="4"
								placeholder="Plan de acción que debe seguir el Equipo de RRPP una vez activado el PCN"><?php echo $desc_rrpp ?></textarea>
						</div>
					</div>
					<br />
					
					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="pruebas">Equipo de pruebas</label>
						<div class="col-md-4">
							<select name="id_pruebas" class="form-control" style="font-size: 12px">
								<?php foreach($pruebas as $key => $prueba) : ?>
									<?php $teamname = '' ?>
									<option value="<?php echo $prueba->id_equipo ?>" <?php echo ((isset($plan_continuidad)) && ($prueba->id_equipo == $plan_continuidad->id_pruebas)) ? 'selected' : '' ?>>
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
					<!-- Textarea -->
					<div class="form-group">
						<label class="col-md-4 control-label">Plan de acción Pruebas</label>
						<div class="col-md-4">                     
							<textarea class="form-control" name="desc_pruebas" rows="4"
								placeholder="Plan de acción que debe seguir el Equipo de Pruebas una vez activado el PCN"><?php echo $desc_pruebas ?></textarea>
						</div>
					</div>
					
					<div class="form-group" style="margin-top: 25px">
						<label class="col-md-4 control-label" ></label>
						<div class="col-md-2 col-md-offset-1">
							<div class="steps">
				                <ul>
				                    <li>1</li>
				                    <li class="active">2</li>
				                    <li>3</li>
				                </ul>
				            </div>
			            </div>
		            </div>
		            
		            <?php if(isset($plan_continuidad) && !empty($plan_continuidad)) : ?>
		            	<input type="hidden" name="id_continuidad" value="<?php echo $plan_continuidad->id_continuidad ?>" />
		            <?php endif ?>
		            
					<!-- Buttons -->
					<div class="form-group">
						<label class="col-md-3 control-label" for=""></label>
						<div class="col-md-4">
							<a class="btn btn-primary" id="prev"><i class="fa fa-arrow-left"></i> Atras</a>
						</div>
						<div class="col-md-4">
							<a class="btn btn-primary" id="next2">Siguiente <i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
<!-- FIN PANEL DE CREACION DE EQUIPOS -->

<!-- PANEL DE OTRAS CONSIDERACIONES-->
				<div id="consideraciones">
					<!-- Textarea -->
					<div class="form-group">
						<label class="col-md-4 control-label">Otras consideraciones</label>
						<div class="col-md-4">                     
							<textarea class="form-control" rows="8" name="consideraciones"
								placeholder="Otras consideraciones u observaciones importantes y necesarias para la correcta ejecución del presente PCN"><?php echo $consideraciones ?></textarea>
						</div>
					</div>
					
					<div class="form-group" style="margin-top: 25px">
						<label class="col-md-4 control-label" ></label>
						<div class="col-md-2 col-md-offset-1">
							<div class="steps">
				                <ul>
				                    <li>1</li>
				                    <li>2</li>
				                    <li class="active">3</li>
				                </ul>
				            </div>
			            </div>
		            </div>
		            
		            
		            
					<!-- Buttons -->
					<div class="form-group">
						<label class="col-md-3 control-label" for=""></label>
						<div class="col-md-4">
							<a class="btn btn-primary" id="prev2"><i class="fa fa-arrow-left"></i> Atras</a>
						</div>
						<div class="col-md-4">
							<button type="submit" class="btn btn-success">Guardar</button>
						</div>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>
<?php echo $crearpcn_js ?>