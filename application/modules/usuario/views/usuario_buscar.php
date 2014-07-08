<div class="row">
	<!-- TITULO DE GESTION DE USUARIOS -->
	<div style="margin-top: 15px" class="col-md-10 col-md-offset-1">
		<h1><strong><?php echo lang('user.gestion') ?></strong></h1><br />
		<h2 style="color: #424242"><?php echo lang('user.search') ?></h2>
	</div>
	
	<!-- TABLA DE USUARIOS REGISTRADOS -->
	<div class="col-md-10 col-md-pull-2" style="margin-top: 15px">
		<form class="form-horizontal" method="post" action="<?php echo base_url() ?>index.php/usuarios/ver">
			<fieldset>
				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="email">
						<?php echo lang('id') ?>
					</label>  
					<div class="col-md-5">
						<input id="email" name="email" type="email" placeholder="Email de usuario" class="form-control input-md">
					</div>
				</div>
				
				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="nombre">
						<?php echo lang('nombre') ?>
					</label>  
					<div class="col-md-5">
						<input id="nombre" name="nombre" type="text" placeholder="Nombre de usuario" class="form-control input-md">
					</div>
				</div>
				
				<!-- Select Basic -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="id_rol">
						<?php echo lang('rol') ?>
					</label>
					<div class="col-md-5">
						<select id="id_rol" name="id_rol" class="form-control">
							<option value="0" disabled selected></option>
							<?php foreach($roles as $key => $rol) : ?>
								<option value="<?php echo $rol->id_rol ?>" <?php echo set_select('id_rol',$rol->id_rol) ?>>
									<?php echo lang('rol_'.$rol->id_rol) ?>
								</option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				
				<!-- Select Basic -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="id_estado">
						<?php echo lang('status') ?>
					</label>
					<div class="col-md-5">
					<select id="id_estado" name="id_estado" class="form-control">
						<option value="0" disabled selected></option>
						<?php foreach($estados as $key => $estado) : ?>
								<option value="<?php echo $estado->id_estado ?>" <?php echo set_select('id_rol',$estado->id_estado) ?>>
									<?php echo lang('estado_'.$estado->id_estado) ?>
								</option>
							<?php endforeach ?>
					</select>
					</div>
				</div>
				
				<!-- Button -->
				<div class="form-group">
					<div class="col-md-4 col-md-offset-4">
						<input type="submit" class="btn btn-primary" value="<?php echo lang('buscar') ?>">
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>