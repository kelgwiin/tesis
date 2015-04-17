<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catalogo extends MX_Controller
{
	function __construct()
	{
        parent::__construct();

		$this->load->model('general/general_model','general');
		$this->load->model('catalogo_model','catalogo');
		$this->load->model('utilities/utilities_model');

		//Helpers
		$this->load->helper('date');
		$this->load->helper('bs3');

		$this->load->helper('url');

		//Modules
		//Cargando el módulo ./modules/utilities/utils.php
		$this->load->module('utilities/utils');
    }
	
	private $title = 'Cat&#225;logo de Servicios';

	private function list_sidebar_catalogo($index_active){
		$l =  array();

		$l[] = array(
			"chain" => "Inicio",
			"href" => site_url(''),
			"icon" => "fa fa-th"
		);

		$l[] = array(
			"chain" => "Catalogo de Servicio",
			"href" => site_url('index.php/catalogo'),
			"icon" => "fa fa-book"
		);

		$l[] = array(
			"chain" => "Catalogo por Categorias",
			"href" => site_url('index.php/catalogo/por_categorias'),
			"icon" => "fa fa-folder-open-o"
		);

		$sublista = array(
			array(
				'chain' => 'Gesti&#243;n de Servicios',
				'href'=> site_url('index.php/cargar_datos/servicios')
			),

			array(
				'chain' => 'Gesti&#243;n de Categor&#237;as',
				'href'=> site_url('index.php/cargar_datos/servicio_categorias')
			),

			array(
				'chain' => 'Gesti&#243;n de Proveedores',
				'href'=> site_url('index.php/cargar_datos/servicio_proveedores')
			),

			array(
				'chain' => 'Gesti&#243;n de Tipos',
				'href'=> site_url('index.php/cargar_datos/servicio_tipos')
			),
			array(
				'chain' => 'Gesti&#243;n de Procesos de Negocio',
				'href'=> site_url('index.php/cargar_datos/procesos_de_negocio')
			),
			array(
				'chain' => 'Asignar Procesos Negocios a Servicios',
				'href'=> site_url('index.php/cargar_datos/procesos_de_negocio_soportados')
			),
			array(
				'chain' => 'Gesti&#243;n de Servicios de Apoyo',
				'href'=> site_url('index.php/cargar_datos/servicio_soportados')
			),
			array(
				'chain' => 'Infraestructura de Servicios',
				'href'=> site_url('index.php/cargar_datos/servicio_infraestructura')
			),
		);
		$l[] = array(
			"chain" => "Gesti&#243;n del Cat&#225;logo",
			"icon" => "fa fa-pencil-square-o",
			"href" => site_url('index.php/catalogo'),
			"list" => $sublista
		);


		return $l;
	}

	

	
	public function index()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		 $this->load->library('form_validation');
		$data_view['servicios'] = $this->general->get_table('servicio');
		$data_view['servicio_categorias'] = $this->general->get_table('servicio_categoria');
		$data_view['servicio_tipos'] = $this->general->get_table('servicio_tipo');
		$data_view['proveedores'] = $this->general->get_table('servicio_proveedor');

		$this->form_validation->set_rules('categoria_servicio', 'Categorias', '');
        $this->form_validation->set_rules('tipo_servicio', 'Tipos', '');
        $this->form_validation->set_rules('proveedor_servicio', 'Proveedor', '');

        if($this->input->post('proveedor_servicio'))
        {
        	$data_view['proveedorr'] = $this->input->post('proveedor_servicio');
        }
        else
        {
        	$data_view['proveedorr'] = 'seleccione';
        }
        if($this->input->post('tipo_servicio'))
        {
        	$data_view['tipo'] = $this->input->post('tipo_servicio');
        }
          else
        {
        	$data_view['tipo'] = 'seleccione';
        }
        if($this->input->post('categoria_servicio'))
        {
        	$data_view['categoria'] = $this->input->post('categoria_servicio');
        }
          else
        {
        	$data_view['categoria'] = 'seleccione';
        }


		if($this->input->post())
			{
				if($this->input->post('proveedor_servicio') != 'seleccione' && $this->input->post('tipo_servicio') != 'seleccione'  && $this->input->post('categoria_servicio') != 'seleccione'  )
					{
						$data_view['servicios'] = $this->general->get_result('servicio',array('categoria_servicio'=> $this->input->post('categoria_servicio'),'tipo_servicio'=> $this->input->post('tipo_servicio'), 'proveedor_servicio'=> $this->input->post('proveedor_servicio'))); 
					}

				if($this->input->post('proveedor_servicio') == 'seleccione' && $this->input->post('tipo_servicio') == 'seleccione'  && $this->input->post('categoria_servicio') == 'seleccione'  )
					{
						$data_view['servicios'] = $this->general->get_table('servicio');
					}



				if($this->input->post('proveedor_servicio') != 'seleccione' && $this->input->post('tipo_servicio') == 'seleccione'  && $this->input->post('categoria_servicio') == 'seleccione'  )
					{
						$data_view['servicios'] = $this->general->get_result('servicio',array('proveedor_servicio'=> $this->input->post('proveedor_servicio'))); 
					}

				if($this->input->post('proveedor_servicio') == 'seleccione' && $this->input->post('tipo_servicio') != 'seleccione'  && $this->input->post('categoria_servicio') == 'seleccione'  )
					{
						$data_view['servicios'] = $this->general->get_result('servicio',array('tipo_servicio'=> $this->input->post('tipo_servicio'))); 
					}

				if($this->input->post('proveedor_servicio') == 'seleccione' && $this->input->post('tipo_servicio') == 'seleccione'  && $this->input->post('categoria_servicio') != 'seleccione'  )
					{
						$data_view['servicios'] = $this->general->get_result('servicio',array('categoria_servicio'=> $this->input->post('categoria_servicio'))); 
					}


				if($this->input->post('proveedor_servicio') != 'seleccione' && $this->input->post('tipo_servicio') != 'seleccione'  && $this->input->post('categoria_servicio') == 'seleccione'  )
					{
						$data_view['servicios'] = $this->general->get_result('servicio',array('proveedor_servicio'=> $this->input->post('proveedor_servicio'),'tipo_servicio'=> $this->input->post('tipo_servicio'))); 
					}

				if($this->input->post('proveedor_servicio') == 'seleccione' && $this->input->post('tipo_servicio') != 'seleccione'  && $this->input->post('categoria_servicio') != 'seleccione'  )
					{
						$data_view['servicios'] = $this->general->get_result('servicio',array('categoria_servicio'=> $this->input->post('categoria_servicio'),'tipo_servicio'=> $this->input->post('tipo_servicio'))); 
					}

				if($this->input->post('proveedor_servicio') != 'seleccione' && $this->input->post('tipo_servicio') == 'seleccione'  && $this->input->post('categoria_servicio') != 'seleccione'  )
					{
						$data_view['servicios'] = $this->general->get_result('servicio',array('categoria_servicio'=> $this->input->post('categoria_servicio'),'proveedor_servicio'=> $this->input->post('proveedor_servicio'))); 
					}
			}
		else
			{
				$data_view['servicios'] = $this->general->get_table('servicio');
			}


		
		

		$this->utils->template($this->list_sidebar_catalogo(1),'catalogo/main_catalogo',$data_view,'Catalogo de Servicios','','two_level');
	}

	public function catalogo_categorias()
	{
		$data_view['servicios'] = $this->general->get_table('servicio');
		$categorias = $this->general->get_table('servicio_categoria');
		$data_view['categorias'] = $categorias;

		foreach($categorias as $categoria)
			{
				$resultado = $this->general->get_result('servicio',array('categoria_servicio'=> $categoria->nombre));
			    $num_categorias[$categoria->nombre] = count($resultado);
			}

		$data_view['num_categorias'] = $num_categorias;

		
		$this->utils->template($this->list_sidebar_catalogo(2),'catalogo/catalogo_categorias',$data_view,'Catalogo de Servicios','','two_level');
	}

	public function lista_servicios() 
	{
		$data_view['servicios'] = $this->general->get_table('servicio');
		$data_view['proveedores'] = $this->general->get_table('servicio_proveedor');
		
		$this->utils->template($this->list_sidebar_catalogo(2),'catalogo/vista_servicios_lista',$data_view,'Catalogo de Servicios','','two_level');
	}


	public function listado_servicios($categoria = '') 
	{
		$categoria = urldecode($categoria);
		$data_view['servicios'] = $this->general->get_result('servicio',array('categoria_servicio'=> $categoria));
		$data_view['categoria'] = $categoria;
		$data_view['proveedores'] = $this->general->get_table('servicio_proveedor');
		
		$this->utils->template($this->list_sidebar_catalogo(2),'catalogo/lista_servicios',$data_view,'Catalogo de Servicios','','two_level');
	}


	public function vista_negocio($servicio_id = '')
	{
		$servicio =  $this->general->get_row('servicio',array('servicio_id'=>$servicio_id));
		$data_view['servicio'] = $servicio;
		$data_view['servicios'] = $this->general->get_table('servicio');
		$data_view['procesos_negocio'] = $this->general->get_table('proceso_negocio');
		$data_view['procesos_negocio_soportados'] = $this->general->get_result('proceso_negocio_soporte',array('servicio_id'=> $servicio_id)); 

		$data_view['servicios_soportados'] = $this->general->get_result('soporta_a',array('servicio_soporte'=> $servicio_id)); 
		$data_view['servicios_soporte'] = $this->general->get_result('soporta_a',array('servicio_soportado'=> $servicio_id)); 

		$data_view['propietario'] = $this->general->get_row('personal',array('id_personal'=> $servicio->propietario_servicio));
		$data_view['proveedor'] =$this->general->get_row('servicio_proveedor',array('proveedor_id'=>$servicio->proveedor_servicio));
		
		$this->utils->template($this->list_sidebar_catalogo(2),'catalogo/vista_negocio',$data_view,'Catalogo de Servicios','','two_level');
	}


		public function vista_tecnica($servicio_id = '')
	{
		$servicio =  $this->general->get_row('servicio',array('servicio_id'=>$servicio_id));
		$data_view['servicio_actual'] = $servicio;
		$data_view['servicios'] = $this->general->get_table('servicio');
		$data_view['procesos_negocio'] = $this->general->get_table('proceso_negocio');
		$data_view['procesos_negocio_soportados'] = $this->general->get_result('proceso_negocio_soporte',array('servicio_id'=> $servicio_id)); 

		$data_view['servicios_soportados'] = $this->general->get_result('soporta_a',array('servicio_soporte'=> $servicio_id)); 
		$data_view['servicios_soporte'] = $this->general->get_result('soporta_a',array('servicio_soportado'=> $servicio_id)); 

		$data_view['propietario'] = $this->general->get_row('personal',array('id_personal'=> $servicio->propietario_servicio));
		$data_view['proveedor'] =$this->general->get_row('servicio_proveedor',array('proveedor_id'=>$servicio->proveedor_servicio));

		$data_view['componentes_ti'] = $this->general->get_table('componente_ti'); 
		$data_view['servicio_componentes'] = $this->general->get_result('servicio_infraestructura',array('servicio_id'=> $servicio_id)); 
		
		$this->utils->template($this->list_sidebar_catalogo(2),'catalogo/vista_tecnica',$data_view,'Catalogo de Servicios','','two_level');
	}


			public function vista_completa($servicio_id = '')
	{
		$servicio =  $this->general->get_row('servicio',array('servicio_id'=>$servicio_id));
		$data_view['servicio_actual'] = $servicio;
		$data_view['servicios'] = $this->general->get_table('servicio');
		$data_view['procesos_negocio'] = $this->general->get_table('proceso_negocio');
		$data_view['procesos_negocio_soportados'] = $this->general->get_result('proceso_negocio_soporte',array('servicio_id'=> $servicio_id)); 

		$data_view['servicios_soportados'] = $this->general->get_result('soporta_a',array('servicio_soporte'=> $servicio_id)); 
		$data_view['servicios_soporte'] = $this->general->get_result('soporta_a',array('servicio_soportado'=> $servicio_id)); 

		$data_view['propietario'] = $this->general->get_row('personal',array('id_personal'=> $servicio->propietario_servicio));
		$data_view['proveedor'] =$this->general->get_row('servicio_proveedor',array('proveedor_id'=>$servicio->proveedor_servicio));
		
		$this->utils->template($this->list_sidebar_catalogo(2),'catalogo/vista_completa',$data_view,'Catalogo de Servicios','','two_level');
	}
	



}


?>
	