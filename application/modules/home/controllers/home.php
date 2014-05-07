<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller
{
	public function __construct(){
		parent::__construct();
				
		//Modules
		//Cargando el módulo ./modules/utilities/utils.php
		$this->load->module('utilities/utils');
	}

	public function index()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$data['main_content'] = $this->load->view('home_view','',TRUE);

		//Cargando la lista de menus del sidebar genérica (se puede puede personalizar, ver ejemplo
		//en el controlador de modules/utilities/utils.php) 
		$l = $this->utils->list_sidebar();
		$this->utils->template($l,'home/home_view','','Tesis Suprema xD',' Title tab',
			'two_level');
	}
	
	
}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/home.php */
