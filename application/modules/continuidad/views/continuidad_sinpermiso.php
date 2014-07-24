<div class="row">
	<!-- TITULO DE GESTION DE USUARIOS -->
	<div style="margin-top: 15px" class="col-md-10 col-md-offset-1">
		<h1><strong>Gestión de Continuidad del Negocio</strong></h1><br />
		<h2 style="color: #424242"><?php echo lang('perm.hijo_'.$nivel) ?></h2>
	</div>
</div>
<div class="row">
	<div class="col-md-10 col-md-offset-1 alert alert-danger" style="text-align: center">
		<?php echo $this->session->userdata('user')->nombre ?>, ud no tiene permiso para realizar esta acción. Por favor contacte a su administrador.
	</div>
</div>