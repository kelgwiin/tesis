<script>
	$(function()
	{
		$('input[name=email]').focusout(function()
		{
			var email = $(this).val();
			
			// LIMPIA LOS DIVS DE CUALQUIER INFORMACION INCORRECTA O QUE NO DEBA ESTAR AHI
			$('#jquery_formerror').removeClass();
			$('#jquery_formerror').html('');
			$('#div_email').removeClass('has-error');
			
			// CONSULTA AL CONTROLADOR PHP SI EL EMAIL EXISTE O NO
			$.post
			(
				'<?php echo site_url('index.php/usuario/usuario/existemail') ?>',
				{email:email, ajax:true},
				function(response)
				{
					// SI NO EXISTE EL EMAIL EN BASE DE DATOS MUESTRA LOS ERRORES
					if(response == 0)
					{
						$('#jquery_formerror').addClass('alert');
						$('#jquery_formerror').addClass('alert-danger');
						$('#jquery_formerror').html('El Email ingresado es incorrecto o no se encuentra registrado');
						$('#div_email').addClass('has-error');
						$('input[name=email]').select();
					}
				}
			);
		});
	});
</script>