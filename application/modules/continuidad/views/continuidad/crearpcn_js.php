<script>
	$(function()
	{
		$('#creacion-equipos').hide();
		$('select[name=id_departamento]').change(function()
		{
			var dpto = $(this).val();
			$('select[name=id_empleado]').empty();
			$.post
			(
				'<?php echo site_url('index.php/general/general/get_result') ?>',
				{table:'personal', key:'id_departamento', value:dpto},
				function(personal)
				{
					$.each(personal,function(key,person)
					{
						$('select[name=id_empleado]').append
						(
							'<option value="'+person.id_personal+'">'+person.nombre+'</option>'
						);
						// console.log(person);
					});
				},
				'json'
			);
		});
		
		$('#next').click(function()
		{
			$('#datos-generales').hide();
			$('#creacion-equipos').show('slide',{direction: 'right'}, 800);
		});
		
		$('#prev').click(function()
		{
			$('#creacion-equipos').hide();
			$('#datos-generales').show('slide',{direction: 'left'}, 800);
		});
	});
</script>