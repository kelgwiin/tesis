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
				
				<!-- Select Basic -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="denominacion_riesgo">Denominación</label>
					<div class="col-md-4">
						<select id="denominacion_riesgo" name="denominacion_riesgo" class="form-control">
							<option value="1">Fallo del sistema</option>
							<option value="2">Fallo del suministro eléctrico</option>
							<option value="3">Incendio</option>
							<option value="4">Robo de material</option>
						</select>
					</div>
				</div>
				
				<!-- Select Basic -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="id_departamento">Departamento</label>
					<div class="col-md-4">
						<select id="id_departamento" name="id_departamento" class="form-control">
							<option value="1">Contabilidad</option>
							<option value="2">Producción</option>
							<option value="3">Sistemas</option>
						</select>
					</div>
				</div>
				
				<!-- Select Basic -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="id_responsable">Responsable</label>
					<div class="col-md-4">
						<select id="id_responsable" name="id_responsable" class="form-control">
							<option value="1">Karl Rhodes</option>
							<option value="2">Karla Mccormick</option>
							<option value="3">Alexandra Rowe</option>
							<option value="4">Calvin Bowers</option>
							<option value="5">Cornelius Henry</option>
							<option value="6">Kathleen Harrington</option>
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
					<label class="col-md-4 control-label" for="prioridad">Prioridad</label>
					<div class="col-md-4">
						<select id="prioridad" name="prioridad" class="form-control">
							<option value="1">Alta</option>
							<option value="2">Media</option>
							<option value="3">Baja</option>
						</select>
					</div>
				</div>
				
				<!-- Select Basic -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="id_estado">Estado del PCN</label>
					<div class="col-md-4">
						<select id="id_estado" name="id_estado" class="form-control">
							<option value="1">Activo</option>
							<option value="2">Inactivo</option>
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