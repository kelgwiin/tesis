<?php  defined('BASEPATH') or exit('No se permite el acceso directo.');

	include("includes/header.php");
	
	if (isset($main_content) && !empty($main_content))
		echo $main_content;
	else
		show_404();
	
	include("includes/footer.php"); 

/*Location: ./application/modules/cargar_data/views/template.php*/