<div class="row">
	<!-- TITULO DE GESTION DE USUARIOS -->
	<div style="margin-top: 15px" class="col-md-10 col-md-offset-1">
		<h1><strong><?php echo lang('user.gestion') ?></strong></h1><br />
		<h2 style="color: #424242"><?php echo lang('user.watch') ?></h2>
		<?php if($this->session->flashdata('success_delete')) : ?>
			<?php print_alert('Usuario eliminado con éxito','success') ?>
		<?php endif ?>
		<?php if($this->session->flashdata('success_edit')) : ?>
			<?php print_alert('Datos de usuario editados con éxito','success') ?>
		<?php endif ?>
	</div>
	
	<!-- TABLA DE USUARIOS REGISTRADOS -->
	<div class="col-md-10 col-md-offset-1 table-responsive" style="margin-top: 15px">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th><a href=""><?php echo lang('id') ?></a></th>
					<th><a href=""><?php echo lang('nombre') ?></a></th>
					<th><a href=""><?php echo lang('rol') ?></a></th>
					<th><a href=""><?php echo lang('status') ?></a></th>
					<th><a href=""><?php echo lang('fecha_creacion') ?></a></th>
					<th style="text-align: center"><a href=""><?php echo lang('eliminar') ?></a></th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($usuarios) && !empty($usuarios)) : ?>
					<?php foreach($usuarios as $key => $user) : ?>
						<?php
							if($user->id_estado == 1) $color = '088A08';
							if($user->id_estado == 2) $color = 'B40404';
							if($user->id_estado == 3) $color = '424242';
						?>
						<tr>
							<td>
								<a href="<?php echo base_url().'index.php/usuarios/ficha/'.$user->id_usuario ?>" title="<?php echo lang('user.edit') ?>">
									<?php echo $user->email ?>
								</a>
							</td>
							<td><?php echo $user->nombre ?></td>
							<td><?php echo lang('rol_'.$user->id_rol) ?></td>
							<td style="color: #<?php echo $color ?>"><?php echo lang('estado_'.$user->id_estado) ?></td>
							<td><?php echo date('d-m-Y h:i:s A',strtotime($user->creacion)) ?></td>
							<td style="text-align: center">
								<a href="<?php echo base_url().'index.php/usuarios/eliminar/'.$user->id_usuario ?>"><span class="badge" style="background-color: #B40404">x</span></a>
							</td>
						</tr>
					<?php endforeach ?>
				<?php endif ?>
			</tbody>
		</table>
	</div>
</div>