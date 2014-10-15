<script>
	$(function()
	{
		$('#loading').hide();
	});
	// $(document).on
	// ({
		// ajaxStart: function() { $('#loading').show(); },
		// ajaxStop: function() { $('#loading').hide(); }    
	// });
	function activate_pcn(id_continuidad,level,state)
	{
		// alert('level: '+level+' - state: '+state);
		$(function()
		{
			$.post
			(
				'<?php echo site_url('index.php/continuidad/continuidad/activate_pcn') ?>',
				{id_continuidad:id_continuidad,state:state,level:level},
				function(response)
				{
					if(response)
					{
						if(state == 2)
							alert('Plan de Continuidad del Negocio desactivado con éxito');
						else
							alert('Plan de Continuidad del Negocio activado con éxito. Las Instrucciones se han enviado a los correos del personal involucrado');
						
						$('#loading').show();
						var url = "<?php echo site_url('index.php/continuidad/listado_pcn') ?>/"+level;
						$(location).attr('href',url);
					}
					else
					{
						alert('Ocurrió un error activando el Plan de Continuidad del Negocio. No se pudo activar.');
					}
				}
			);
		});
	}
	
</script>