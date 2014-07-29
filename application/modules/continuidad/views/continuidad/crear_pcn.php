<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Gestión de Continuidad del Negocio</h1>
			<?php echo $breadcrumbs ?>
			<h3>Agregar un nuevo Plan de Continuidad del Negocio</h3>
		</div>
	</div>
	
	<div class="row" style="margin-top: 25px">

		<form class="form-horizontal">
			<fieldset>
				<?php //echo_pre($departamentos) ?>
				<!-- Select Basic -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="denominacion_riesgo">Denominación</label>
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
				
				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="creacion">Fecha de creación</label>  
					<div class="col-md-4">
						<input id="creacion" name="creacion" type="text" placeholder="15/03/2014" class="form-control input-md" required="">
					</div>
				</div>
				
				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="modificacion">Fecha de modificación</label>  
					<div class="col-md-4">
						<input id="modificacion" name="modificacion" type="text" placeholder="02/07/2014" class="form-control input-md" required="">
					</div>
				</div>
				
				<!-- Button -->
				<div class="form-group">
					<label class="col-md-4 control-label" for=""></label>
					<div class="col-md-4">
						<button id="" name="" class="btn btn-success">Crear nuevo PCN</button>
					</div>
				</div>
			
			</fieldset>
		</form>
	</div>
</div>
<?php echo $crearpcn_js ?>