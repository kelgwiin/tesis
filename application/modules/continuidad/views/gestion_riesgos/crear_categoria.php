<?php
	if(isset($categoria) && !empty($categoria))
	{
		$h3 = 'Modificar una categoría de riesgos y amenazas';
		$button = 'Modificar categoría';
	}else
	{
		$h3 = 'Agregar una nueva categoría de riesgos y amenazas';
		$button = 'Crear nueva categoría';
	}
?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Gestión de Continuidad del Negocio</h1>
			<?php echo $breadcrumbs ?>
			<h3><?php echo $h3 ?></h3>
		</div>
	</div>
	
	<div class="row" style="margin-top: 25px">
		<div class="col-md-12">
			<div class="row">
				<form class="form-horizontal" action="<?php echo site_url('index.php/continuidad/gestion_riesgos/categorias/crear_categoria') ?>" method="post">
					<fieldset>
						<!-- Text input-->
						
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-4">
								<?php echo form_error('categoria') ?>
							</div>
						</div>
						<div class="form-group <?php echo (form_error('categoria')) ? 'has-error' : '' ?>">
							<label class="col-md-4 control-label" for="categoria">Tipo de amenaza</label>  
							<div class="col-md-4">
								<input name="categoria" type="text" placeholder="Denominación del tipo de amenaza" class="form-control input-md"
									value="<?php echo set_value('categoria',@$categoria->categoria) ?>" required="" />
							</div>
						</div>
						
						<!-- Textarea -->
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-4">
								<?php echo form_error('descripcion') ?>
							</div>
						</div>
						<div class="form-group <?php echo (form_error('descripcion')) ? 'has-error' : '' ?>">
							<label class="col-md-4 control-label" for="descripcion">Descripción</label>
							<div class="col-md-4">                     
								<textarea class="form-control" name="descripcion" placeholder="La descripción debe llevar mínimo 50 caracteres" rows="5" style="resize: none"><?php echo set_value('descripcion',@$categoria->descripcion) ?></textarea>
							</div>
						</div>
						
						<?php if(isset($categoria) && !empty($categoria)) : ?>
							<input type="hidden" name="id_categoria" value="<?php echo $categoria->id_categoria ?>" />
						<?php endif ?>
						
						<!-- Button -->
						<div class="form-group">
							<label class="col-md-4 control-label"></label>
							<div class="col-md-4">
								<button type="submit" class="btn btn-success"><?php echo $button ?></button>
							</div>
						</div>
					
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>