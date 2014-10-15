<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Gestión de Continuidad del Negocio</h1>
			<?php echo $breadcrumbs ?>
			<h3>Validar Planes de Conitnuidad del Negocio</h3>
		</div>
	</div>
	
	<div class="row" style="margin-top: 15px">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Validar planes de conitnuidad del negocio para riesgos con valoración <?php echo $valoracion ?></h3>
			</div>
			<div class="panel-body">
				<div class="col-md-12" style="margin-top: 25px">
					<div class="row">
						<form class="form-horizontal" action="<?php echo site_url('index.php/continuidad/validar_pcn/'.$valoracion) ?>" method="post">
							<fieldset>
								<!-- Select Basic -->
								<div class="form-group">
									<label class="col-md-4 control-label" for="id_continuidad">PCN a validar</label>
									<div class="col-md-4">
										<select name="id_continuidad" class="form-control">
											<option selected=""> -- </option>
											<?php foreach($plan_continuidad as $key => $pcn) : ?>
												<option value="<?php echo $pcn->id_continuidad ?>"><?php echo character_limiter($pcn->denominacion,50) ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-4 control-label" for="id_continuidad">Departamento</label>
									<div class="col-md-4">
										<select name="departamento_id" class="form-control" disabled="">
											<option selected=""> -- </option>
											<?php foreach($dptos as $key => $dpto) : ?>
												<option value="<?php echo $dpto->departamento_id ?>"><?php echo ucwords($dpto->nombre) ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								
								<div class="form-group" id="personal">
									<label class="col-md-4 control-label" for="id_continuidad">Personal</label>
									<div class="col-md-4">
										<select name="id_personal" class="form-control" disabled="">
											<option selected=""> -- </option>
										</select>
									</div>
								</div>
								
								<!-- Button -->
								<div class="form-group">
									<label class="col-md-4 control-label" for=""></label>
									<div class="col-md-4">
										<button id="button_validar" name="" class="btn btn-success">Validar</button>
									</div>
								</div>
							
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(function()
	{
		$('#button_validar').attr('disabled',true);
		$('select[name=id_continuidad]').change(function()
		{
			var id_continuidad = $(this).val();
			if($.isNumeric(id_continuidad))
			{
				$('select[name=departamento_id]').removeAttr('disabled');
				$('select[name=id_personal]').removeAttr('disabled');
			}else
			{
				$('select[name=departamento_id]').attr('disabled',true);
				$('select[name=id_personal]').attr('disabled',true);
			}
		});
		$('select[name=departamento_id]').change(function()
		{
			var dpto = $(this).val();
			$('select[name=id_personal]').empty();
			$.post
			(
				'<?php echo site_url('index.php/general/general/get_result') ?>',
				{table:'personal', key:'id_departamento', value:dpto},
				function(personal)
				{
					$('select[name=id_personal]').append
					(
						'<option value=""> -- </option>'
					);
					$.each(personal,function(key,person)
					{
						$('select[name=id_personal]').append
						(
							'<option value="'+person.id_personal+'">'+person.cargo+': '+person.nombre+'</option>'
						);
						// console.log(person);
					});
				},
				'json'
			);
		});
		
		$('select[name=id_personal]').change(function()
		{
			var id_personal = $(this).val();
			$('#button_validar').removeAttr('disabled');
			$('textarea[name=texto_validacion]').html('aksjdbckajsbdca');
		});
	});
</script>