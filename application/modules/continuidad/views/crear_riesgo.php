<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Gestión de Continuidad del Negocio</h1>
			<?php echo $breadcrumbs ?>
			<h3>Agregar un nuevo riesgo</h3>
		</div>
	</div>
	
	<div class="row" style="margin-top: 25px">
		<form class="form-horizontal">
			<fieldset>
				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="denominacion">Denominación</label>  
					<div class="col-md-4">
						<input id="denominacion" name="denominacion" type="text" placeholder="Denominación del riesgo" class="form-control input-md" required="" />
					</div>
				</div>
				
				<!-- Select Basic -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="id_categoria">Categoría</label>
					<div class="col-md-4">
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
				
				<!-- Appended Input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="probabilidad">Probabilidad</label>
					<div class="col-md-2">
						<div class="input-group">
							<input id="probabilidad" name="probabilidad" class="form-control" placeholder="50" type="text" required="" />
							<span class="input-group-addon">%</span>
						</div>
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