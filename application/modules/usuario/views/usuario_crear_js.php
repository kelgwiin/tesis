<!--<script type="text/javascript" src="assets/front/js/jquery-1.10.1.js"></script>-->
<script>
	$(function()
	{
		$('#permisologia').addClass('hidden');
		var rol = $('input[name=rol]').val();
		if(rol==2) $('#permisologia').removeClass('hidden');
		
		$('select[name=id_rol]').change(function()
		{
			var id_rol = $(this).val();
			if(id_rol != 1)
				$('#permisologia').removeClass('hidden');
			else
				$('#permisologia').addClass('hidden');
		});
	});
</script>