<script src="<?php echo site_url('assets/js/datepicker/bootstrap-datepicker.js') ?>"></script>
<script>
	$(function()
	{
		$('input[name=fechaingreso_empresa]').datepicker();
	});
</script>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Personal de la Organización</h1>
			<ol class="breadcrumb">
				<li class="active">
					<i class="fa fa-dashboard"></i> Carga del personal los departamentos de la organización.
				</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class = "panel-heading">
					<h3 class="panel-title">Creación de personal para el departamento <strong><?php echo ucfirst($departamento->nombre) ?></strong></h3>
				</div>
				<div class = "panel-body">
					<form class="form-horizontal" method="post" action="<?php echo site_url('index.php/cargar_datos/personal/crear_empleado') ?>">
						<fieldset>
							<!-- CODIGO DEL EMPLEADO-->
							<div class="row">
								<div class="col-md-5"></div>
								<div class="col-md-4">
									<?php echo form_error('codigo_empleado') ?>
								</div>
							</div>
							<div class="form-group <?php echo (form_error('codigo_empleado')) ? 'has-error' : '' ?>">
								<label class="col-md-5 control-label" for="codigo_empleado">Código</label>  
								<div class="col-md-4">
									<input name="codigo_empleado" type="text" placeholder="Código de empleado" class="form-control input-md"
										data-toggle="tooltip" data-original-title="Código o identificador único del empleado con respecto a la organización"
										value="<?php echo set_value('codigo_empleado',@$empleado->codigo_empleado) ?>" required />
								</div>
							</div>
							
							<!-- NOMBRE Y APELLIDO-->
							<div class="row">
								<div class="col-md-5"></div>
								<div class="col-md-4">
									<?php echo form_error('nombre') ?>
									<?php echo form_error('apellido') ?>
								</div>
							</div>
							<div class="form-group <?php echo (form_error('nombre') OR form_error('apellido')) ? 'has-error' : '' ?>">
								<label class="col-md-5 control-label" for="nombre">Nombre del empleado</label>  
								<div class="col-md-2">
									<input name="nombre" type="text" placeholder="Nombre" class="form-control input-md"
										value="<?php echo set_value('nombre',@$empleado->nombre) ?>" required />
								</div>
								<div class="col-md-2">
									<input name="apellido" type="text" placeholder="Apellido" class="form-control input-md"
										value="<?php echo set_value('apellido',@$empleado->apellido) ?>" required />
								</div>
							</div>
							
							<!-- CARGO EN LA EMPRESA-->
							<div class="row">
								<div class="col-md-5"></div>
								<div class="col-md-4">
									<?php echo form_error('cargo') ?>
								</div>
							</div>
							<div class="form-group <?php echo (form_error('cargo')) ? 'has-error' : '' ?>">
								<label class="col-md-5 control-label" for="cargo">Cargo</label>  
								<div class="col-md-4">
									<input name="cargo" type="text" placeholder="Cargo del empleado" class="form-control input-md"
										value="<?php echo set_value('cargo',@$empleado->cargo) ?>" required />
								</div>
							</div>
							
							<!-- CEDULA-->
							<div class="row">
								<div class="col-md-5"></div>
								<div class="col-md-4">
									<?php echo form_error('cedula') ?>
								</div>
							</div>
							<div class="form-group <?php echo (form_error('cedula')) ? 'has-error' : '' ?>">
								<label class="col-md-5 control-label" for="cedula">Cédula/Pasaporte</label>  
								<div class="col-md-4">
									<input name="cedula" type="text" placeholder="V-00000000" class="form-control input-md"
										value="<?php echo set_value('cedula',@$empleado->cedula) ?>" required />
								</div>
							</div>
							
							<!-- EMAIL CORPORATIVO-->
							<div class="row">
								<div class="col-md-5"></div>
								<div class="col-md-4">
									<?php echo form_error('email_corporativo') ?>
								</div>
							</div>
							<div class="form-group <?php echo (form_error('email_corporativo')) ? 'has-error' : '' ?>">
								<label class="col-md-5 control-label" for="email_corporativo">Email corporativo</label>  
								<div class="col-md-4">
									<input name="email_corporativo" type="email" placeholder="Email corporativo" class="form-control input-md"
										value="<?php echo set_value('email_corporativo',@$empleado->email_corporativo) ?>" required />
								</div>
							</div>
							
							<!-- EMAIL PERSONAL-->
							<div class="row">
								<div class="col-md-5"></div>
								<div class="col-md-4">
									<?php echo form_error('email_personal') ?>
								</div>
							</div>
							<div class="form-group <?php echo (form_error('email_personal')) ? 'has-error' : '' ?>">
								<label class="col-md-5 control-label" for="email_personal">Email personal</label>  
								<div class="col-md-4">
									<input name="email_personal" type="email" placeholder="Email personal" class="form-control input-md"
										value="<?php echo set_value('email_personal',@$empleado->email_personal) ?>" required />
								</div>
							</div>
							
							<!-- TELEFONO CORPORATIVO-->
							<div class="row">
								<div class="col-md-5"></div>
								<div class="col-md-4">
									<?php echo form_error('tlfn_corporativo') ?>
								</div>
							</div>
							<div class="form-group <?php echo (form_error('tlfn_corporativo')) ? 'has-error' : '' ?>">
								<label class="col-md-5 control-label" for="tlfn_corporativo">Teléfono corporativo</label>  
								<div class="col-md-4">
									<input name="tlfn_corporativo" type="text" placeholder="0000-0000000" class="form-control input-md"
										value="<?php echo set_value('tlfn_corporativo',@$empleado->tlfn_corporativo) ?>" required />
								</div>
							</div>
							
							<!-- TELEFONO PERSONAL-->
							<div class="row">
								<div class="col-md-5"></div>
								<div class="col-md-4">
									<?php echo form_error('tlfn_personal') ?>
								</div>
							</div>
							<div class="form-group <?php echo (form_error('tlfn_personal')) ? 'has-error' : '' ?>">
								<label class="col-md-5 control-label" for="tlfn_personal">Teléfono personal</label>  
								<div class="col-md-4">
									<input name="tlfn_personal" type="text" placeholder="0000-0000000" class="form-control input-md"
										value="<?php echo set_value('tlfn_personal',@$empleado->tlfn_personal) ?>" required />
								</div>
							</div>
							
							<!-- FECHA DE INGRESO -->
							<div class="row">
								<div class="col-md-5"></div>
								<div class="col-md-4">
									<?php echo form_error('fechaingreso_empresa') ?>
								</div>
							</div>
							<div class="form-group <?php echo (form_error('fechaingreso_empresa')) ? 'has-error' : '' ?>">
								<label class="col-md-5 control-label" for="fechaingreso_empresa">Fecha de ingreso</label>  
								<div class="col-md-4">
									<input name="fechaingreso_empresa" type="text" placeholder="12/05/2013" class="form-control input-md"
										data-date-format="dd/mm/yyyy" value="<?php echo set_value('fechaingreso_empresa',@$empleado->fechaingreso_empresa) ?>" required readonly />
								</div>
							</div>
							
							<input type="hidden" name="id_departamento" value="<?php echo $departamento->departamento_id ?>" />
							
							<!-- Button -->
							<div class="form-group">
								<label class="col-md-5 control-label" for=""></label>
								<div class="col-md-4">
									<button name="" class="btn btn-success">Crear empleado</button>
								</div>
							</div>
							
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>