<script>
	$(function()
	{
		$('#add').click(function()
		{
			var id_personal = $('select[name=personal]').val();
			var personal = $('select[name=personal] option:selected').data('nombre');
			var dpto = $('select[name=personal] option:selected').data('dpto');
			// alert('id_personal: '+id_personal+' - personal: '+personal+' - dpto: '+dpto);
			if(id_personal != null && id_personal != '')
			{
				$('select[name=personal] option:selected').remove();
				$('select[name=equipo\\[\\]]').append('<option value="'+id_personal+'" data-nombre="'+personal+'" data-dpto="'+dpto+'">'+personal+'</option>');
				// $('#hidden').append('<input type="hidden" name="equipo[]" value="'+id_personal+'" />');
			}else
			{
				alert('Debe seleccionar personal para agregarlo al campo de Equipo de desarrollo');
			}
		});
		
		$('#remove').click(function()
		{
			var id_personal = $('select[name=equipo\\[\\]]').val();
			var personal = $('select[name=equipo\\[\\]] option:selected').data('nombre');
			var dpto = $('select[name=equipo\\[\\]] option:selected').data('dpto');
			// alert('id_personal: '+id_personal+' - personal: '+personal+' - dpto: '+dpto);
			if(id_personal != null && id_personal != '')
			{
				$('select[name=equipo\\[\\]] option:selected').remove();
				$('select[name=personal] optgroup[label="'+dpto+'"]').append('<option value="'+id_personal+'" data-nombre="'+personal+'" data-dpto="'+dpto+'">'+personal+'</option>');
				// $('#hidden').append('<input type="hidden" name="noequipo[]" value="'+id_personal+'" />');
			}else
			{
				alert('Debe seleccionar personal para removerlo del campo de Equipo de desarrollo');
			}
		});
		
		$('#crear_btn').click(function()
		{
			$('select[name=equipo\\[\\]]').attr('multiple',true);
			$('select[name=equipo\\[\\]]').each(function()
			{
				$('select[name=equipo\\[\\]] option').attr('selected',true);
			});
			$('#form').submit();
		});
	});
</script>