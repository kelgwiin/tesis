<?php echo $usuario_crear_js ?>
<?php if(isset($user)) : ?>
	<input type="hidden" name="rol" value="<?php echo $user->id_rol ?>" />
<?php endif ?>
<div class="row">
	<!-- TITULO DE GESTION DE USUARIOS -->
	<div style="margin-top: 15px" class="col-md-10 col-md-offset-1">
		<h1><strong><?php echo lang('user.gestion') ?></strong></h1><br />
		<h2 style="color: #424242"><?php echo (isset($nivel) && ($nivel == 5)) ? lang('user.edit') : lang('user.create') ?></h2>
		<?php if(isset($nivel) && ($nivel == 5)) : ?>
				<div class="alert alert-info" style="text-align: center">
					Para mantener la misma contraseña debe dejar el campo correspondiente vacío. De lo contrario se modificará la contraseña.
				</div>
		<?php endif ?>
		<span style="color: #A4A4A4">El rol de Administrador tiene todos los permisos concedidos</span>
	</div>
	<!-- TABLA DE USUARIOS REGISTRADOS -->
	<div class="col-md-10 col-md-offset-1" style="margin-top: 15px">
		
		<form method="post" action="<?php echo site_url('index.php/usuarios/crear') ?>">
			<!-- EMAIL -->
			<div class="row">
				<div class="col-md-2">
					<label>Email: </label>
				</div>
				<div class="col-md-10 <?php echo (strlen(form_error('email'))) ? 'has-error' : '' ?>">
					<input type="email" class="col-md-5" name="email" value="<?php echo set_value('email',@$user->email) ?>" required />
					<?php echo form_error('email') ?>
				</div>
			</div>
			
			<!-- CONTRASEÑA -->
			<div class="row">
				<div class="col-md-2">
					<label>Contraseña: </label>
				</div>
				<div class="col-md-10 <?php echo (strlen(form_error('password'))) ? 'has-error' : '' ?>">
					<input type="password" class="col-md-5" name="password" <?php echo (isset($nivel) && ($nivel==2)) ? 'required' : '' ?> />
					<?php echo form_error('password') ?>
				</div>
			</div>
			
			<!-- NOMBRE -->
			<div class="row">
				<div class="col-md-2">
					<label>Nombre: </label>
				</div>
				<div class="col-md-10 <?php echo (strlen(form_error('nombre'))) ? 'has-error' : '' ?>">
					<input type="text" class="col-md-5" name="nombre" value="<?php echo set_value('nombre',@$user->nombre) ?>" required />
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
							<option value="<?php echo $rol->id_rol ?>" <?php echo (isset($user->id_rol) && ($user->id_rol==$rol->id_rol)) ? 'selected' : ''; ?>>
								<?php echo lang('rol_'.$rol->id_rol) ?>
							</option>
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
							<option value="<?php echo $estado->id_estado ?>" <?php echo (isset($user->id_estado) && ($user->id_estado==$estado->id_estado)) ? 'selected' : ''; ?>>
								<?php echo lang('estado_'.$estado->id_estado) ?>
							</option>
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
								<?php
									if(isset($user->permisologia))
									{
										$find = FALSE;
										$perm = explode(',', $user->permisologia);
										$find = in_array($modulo->id_modulo_hijo, $perm);
									}
								?>
								<input type="checkbox" name="permisologia[]" <?php echo (isset($find) && ($find)) ? 'checked' : '' ?>
									value="<?php echo $modulo->id_modulo_hijo ?>" />
								<?php echo lang('perm.hijo_'.$modulo->id_modulo_hijo) ?>
							</label>
						<?php endforeach; ?>
						<br /><br />
					<?php endforeach; ?>
				</div>
			</div>
			
			<input type="hidden" name="form_type" value="<?php echo (isset($nivel) && ($nivel == 5)) ? 'edit' : 'create' ?>" />
			
			<!-- BOTON ENVIAR -->
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-10 col-md-offset-2" style="margin-top: 10px">
					<input type="submit" class="btn btn-success col-md-5"
						value="<?php echo (isset($nivel) && ($nivel == 5)) ? lang('user.edit') : lang('user.create') ?>" />
				</div>
			</div>
		</form>
	</div>
</div>
