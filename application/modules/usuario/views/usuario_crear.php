<?php echo $usuario_crear_js ?>
<div class="row">
	<!-- TITULO DE GESTION DE USUARIOS -->
	<div style="margin-top: 15px" class="col-md-10 col-md-offset-1">
		<h1><strong><?php echo lang('user.gestion') ?></strong></h1><br />
		<h2 style="color: #424242"><?php echo lang('user.create') ?></h2>
		<span style="color: #A4A4A4">El rol de Administrador tiene todos los permisos concedidos</span>
	</div>
	<!-- TABLA DE USUARIOS REGISTRADOS -->
	<div class="col-md-10 col-md-offset-1" style="margin-top: 15px">
		<form method="post" action="usuarios/crear">
			<!-- EMAIL -->
			<div class="row">
				<div class="col-md-2">
					<label>Email: </label>
				</div>
				<div class="col-md-10 <?php echo (strlen(form_error('email'))) ? 'has-error' : '' ?>">
					<input type="email" class="col-md-5" name="email" value="<?php echo set_value('email') ?>" required />
					<?php echo form_error('email') ?>
				</div>
			</div>
			
			<!-- CONTRASEÑA -->
			<div class="row">
				<div class="col-md-2">
					<label>Contraseña: </label>
				</div>
				<div class="col-md-10 <?php echo (strlen(form_error('password'))) ? 'has-error' : '' ?>">
					<input type="password" class="col-md-5" name="password" required />
					<?php echo form_error('password') ?>
				</div>
			</div>
			
			<!-- NOMBRE -->
			<div class="row">
				<div class="col-md-2">
					<label>Nombre: </label>
				</div>
				<div class="col-md-10 <?php echo (strlen(form_error('nombre'))) ? 'has-error' : '' ?>">
					<input type="text" class="col-md-5" name="nombre" value="<?php echo set_value('nombre') ?>" required />
					<?php echo form_error('nombre') ?>
				</div>
			</div>
			
			<!-- ROL -->
			<div class="row">
				<div class="col-md-2">
					<label>Rol: </label>
				</div>
				<div class="col-md-10">
					<select name="id_rol" class="col-md-5" style="text-align: center" title="El rol Administrador tiene todos los privilegios">
						<?php foreach($roles as $key => $rol) : ?>
							<option value="<?php echo $rol->id_rol ?>"><?php echo lang('rol_'.$rol->id_rol) ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			
			<!-- ESTADO -->
			<div class="row">
				<div class="col-md-2">
					<label>Estado: </label>
				</div>
				<div class="col-md-10">
					<select name="id_estado" class="col-md-5" style="text-align: center">
						<?php foreach($estados as $key => $estado) : ?>
							<option value="<?php echo $estado->id_estado ?>"><?php echo lang('estado_'.$estado->id_estado) ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			
			<!-- PERMISOLOGIA DE MODULOS -->
			<div id="permisologia" class="row hidden">
				<div class="col-md-2">
					<label>Permisología: </label>
				</div>
				<div class="col-md-10">
					<?php foreach($mod_padre as $key => $mod) : ?>
						<strong><?php echo lang('perm.padre_'.$mod->id_modulo_padre) ?></strong><br />
						<?php foreach($modulos[$mod->id_modulo_padre] as $k => $modulo) : ?>
							<label class="checkbox-inline">
								<input type="checkbox" name="permisologia[]" value="<?php echo $modulo->id_modulo_hijo ?>" />
								<?php echo lang('perm.hijo_'.$modulo->id_modulo_hijo) ?>
							</label>
						<?php endforeach; ?>
						<br /><br />
					<?php endforeach; ?>
				</div>
			</div>
			
			<!-- BOTON ENVIAR -->
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-10 col-md-offset-2" style="margin-top: 10px">
					<input type="submit" class="btn btn-success col-md-5" value="<?php echo lang('user.create') ?>" />
				</div>
			</div>
		</form>
	</div>
</div>
