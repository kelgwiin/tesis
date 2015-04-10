<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Creado: 20-01-2014
 * @author Kelwin Gamez <kelgwiin@gmail.com>
 */
class Cargar_Data extends MX_Controller
{		
	/**
	 * Constructor principal. 
	 * @author Kelwin Gamez <kelgwiin@gmail.com>
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('datos_basicos_model','basico_model');
		$this->load->model('utilities/utilities_model');

		//Helpers
		$this->load->helper('date');
		$this->load->helper('bs3');
		$this->load->helper('url');

		//Modules
		//Cargando el módulo ./modules/utilities/utils.php
		$this->load->module('utilities/utils');

		//Variables de la clase
		/**
		 * Número de items (componentes, dpto. o servicio) por página 
		 * @var integer
		 */
		$this->per_page = 6;
	}

	public function index(){
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$this->utils->template($this->_list(1),'cargar_data/main','','Cargar Infraestructura','');
	}

	/**
	 * Carga el formulario básico de la carga de la infraestructura
	 * @param  string $action Es una cadena que representa si se creará el form,
	 * si es la acción de guardar o si entra por la opción es actualizar y el valor 
	 * será el ID asociado al la tabla organización.
	 * @return N/A
	 */
	public function basico($action="form"){
		switch ($action) {
			//Formulario de datos básicos
			case 'form':
				$this->utils->is_logged();
				//Obteniendo los datos básicos que ya fueron cargados (si los hay)
				$row = $this->utilities_model->first_row('organizacion','organizacion_id');
				$info['org'] = NULL;
				if($row !== NULL){
					$info['org'] = $row;
				}
				//Cargando los datos básicos
				$this->utils->template($this->_list(2),'cargar_data/basico',$info,'Cargar Infraestructura','Básico');
				break;

			case 'guardar':
				$p = $this->input->post();

				if($this->utilities_model->add($p,'organizacion')){
					printf('{"estatus":"ok","organizacion_id":%d}',
						$this->utilities_model->last_insert_id());
				}else{
					echo '{"estatus":"fail"}';
				}
				break;
			
			default:
				//Actualizar y Recibe el id 
				$p = $this->input->post();
				$id_org = $action;
				//actualizando en la base de datos.
				if($this->utilities_model->update('organizacion',array('organizacion_id'=>$id_org),$p)){
					echo '{"estatus":"ok"}';
				}else{
					echo '{"estatus":"fail"}';
				}
				break;
		}
	}

	/**
	 * Dependiendo del parámetro que se le pase va a ser las siguientes acciones:
	 * 1.- Puede contener numeración de páginas por lo cual se redirigirá hacia
	 * "list" y se desplegará la info en función de la página obtenida de la URI.
	 * 2.- Si es "nuevo" Despliega el formulario para agregar un nuevo componente.
	 * 3.- Si es "guardar" guarda la data desde ajax y redirige a "guardado" para el 
	 * despliegue del mensaje y la respectiva actualización.
	 * 4.- Si es "guardado" se activa el mensaje de guardado.
	 * 5.- Si es "filtrar " despliega la lista de los componentes de ti aplicando
	 * el filtro respectivo.
	 * @param  string $action Dominio {number, nuevo, guardar,guardado,
	 * filtrar,eliminar}. 
	 */
	public function componentes_ti($action){
		$cur_page = $this->uri->segment(3);
		
		//Verificando el segmento 3 del uri corresponde a la pag o a alguna acción
		if (is_numeric($cur_page)) {
			$action = 'list';
		}else{
			$action = $cur_page;//En este caso no es un número sino 
								//que es la acción: guardado|nuevo|filtrar|guardar
		}

		switch ($action) {
			//Listando los componentes de ti
			case 'list':
				$this->utils->is_logged();
				$params_main_content = $this->_config_comp_ti($this->per_page,
					false,$cur_page,array('accion' => 'all' ),NULL);
				$this->utils->template($this->_list(3),'cargar_data/componentes_ti_view',
					$params_main_content,'Cargar Infraestructura','Componentes TI');
				break;

			//Muestra el mensaje de guardado exitoso
			case 'guardado': 
				$this->utils->is_logged();
				$params_main_content = $this->_config_comp_ti($this->per_page,
					true,1,array('accion' => 'all' ),NULL);
				$this->utils->template($this->_list(3),'cargar_data/componentes_ti_view',
					$params_main_content,'Cargar Infraestructura','Componentes TI');
				break;

			//Formulario de nuevo componente de ti
			case 'nuevo':
				$this->utils->is_logged();
				//Consultando el maestro de Categoria
				$info['categorias'] = $this->utilities_model->all('ma_categoria');

				//Indicando que es nuevo
				$info['accion'] = "nuevo";

				$first_id_cat = $info['categorias'][0]['ma_categoria_id'];
				$info['unidades'] = $this->utilities_model->rows_by_id('ma_unidad_medida',
					'ma_categoria_id', $first_id_cat);
				$info['accion'] = "nuevo";
				//Cargando la plantilla
				$this->utils->template($this->_list(3),'cargar_data/nuevo_componente_ti_view',$info,
				'Cargar Infraestructura','Nuevo Comp. TI');

				break;

			//Guardando el nuevo componente de ti a través de ajax
			case 'guardar':
				$p = $this->input->post();
				//Procesar la data del post para no tomar los campos vacíos
				$p_procesado = array();
				foreach ($p as $key => $value) {//Quitando los campos que estén vacíos
					if(strlen($value) > 0 && $key != 'categoria'){
						$p_procesado[$key] = $value;
					}
				}
				//Procesando la fecha actual
    			$p_procesado['fecha_creacion'] = date('Y-m-d H:i:s',now());

    			//Verificando la cantidad
    			if(!isset($p_procesado['cantidad'])){
    				//Se hace esta validación ya que cuando se encuentra
    				//no editable "disable" él parámetro no se envía al servidor.
    				$p_procesado['cantidad'] = 1;
    			}
    			//Cantidad Disponible
    			$p_procesado['cantidad_disponible'] = $p_procesado['cantidad'];

    			//guardando el componente de ti propiamente
				if($this->utilities_model->add($p_procesado,'componente_ti')){
					echo '{"estatus":"ok"}';
				}else{
					echo '{"estatus":"fail"}';
				}
				break;

			//Filtrando el contenido de los componentes de ti
			case 'filtrar':
				$this->utils->is_logged();
				$op = $this->input->get('filtro-componente-ti');
				
				$p_get = get_encode($this->input->get());
				$cur_page = $this->uri->segment(5);
				//Para desplegar el mensade de filtrado
				$params_main_content['is_filtered'] = true;

				switch ($op) {
					case 'todos':
						$params_main_content = $this->_config_comp_ti($this->per_page,
							false,$cur_page, array('accion' => 'all' ),NULL);
						
						//Como son todos se configura como si fuese un listar normal 
						//de todos los componentes
						$params_main_content['is_filtered'] = false;
						break;
					
					case 'nombre':
						$busq = $this->input->get('buscar-componente-ti');
						$params_main_content = $this->_config_comp_ti($this->per_page,
							false,$cur_page, array('accion' => 'nombre','campo_buscar' => $busq ),$p_get);
						break;

					case 'categoria':
						$busq = $this->input->get('buscar-componente-ti');
						$params_main_content = $this->_config_comp_ti($this->per_page,
							false,$cur_page, array('accion' => 'categoria','campo_buscar' => $busq ),$p_get);
						break;
				}
				
				
				$this->utils->template($this->_list(3),'cargar_data/componentes_ti_view',
					$params_main_content,'Cargar Infraestructura','Componentes TI');
				
				break;

			//Eliminando lógicamente desde ajax
			case 'eliminar':
					$id_comp_ti = $this->input->post('componente_ti_id');
					//Eliminando lógicamente
					if($this->utilities_model->update('componente_ti',
						array('componente_ti_id'=>$id_comp_ti),array('borrado'=>true)) ){
						echo '{"estatus":"ok"}';
					}else{
						echo '{"estatus":"fail"}';
					}
					break;
			//Actualizando el componente de TI muestra el formulario con la data actual
			case 'actualizar':
				$this->utils->is_logged();
				$id_comp_ti = $this->uri->segment(4);

				//consultando componente de ti actual
				$info['comp_ti'] = $this->utilities_model->row_by_id('componente_ti',
				'componente_ti_id',$id_comp_ti);

				//categoria asociada
				$info['categ'] = $this->basico_model->
				info_categoria($info['comp_ti']['ma_unidad_medida_id']);

				//Consultando el maestro de Categoria
				$info['categorias'] = $this->utilities_model->all('ma_categoria');

				//Obteniendo unidades de la categoría asociada
				$id_cat = $info['categ']['id'];
				$info['unidades'] = $this->utilities_model->rows_by_id('ma_unidad_medida',
				'ma_categoria_id', $id_cat);

				//Indicando que se va a actualizar
				$info['accion'] = "actualizar";
					//Cargando la plantilla
				$this->utils->template($this->_list(3),'cargar_data/nuevo_componente_ti_view',$info,
				'Cargar Infraestructura','Actualizar Comp. TI');
				break;
			//Actualiza la información desde ajax
			case "actualizar_guardar":
				$id_comp_ti = $this->uri->segment(4);

				$p = $this->input->post();
				//Procesar la data del post para no tomar los campos vacíos
				$p_procesado = array();
				foreach ($p as $key => $value) {//Colocando en null los campos que estén vacíos
					if(strlen($value) > 0 && $key != 'categoria'){
						$p_procesado[$key] = $value;
					}elseif ($value == "") {
						$p_procesado[$key] = NULL;
					}
				}

				//Verificando la cantidad
				if(!isset($p_procesado['cantidad'])){
					//Se hace esta validación ya que cuando se encuentra
					//no editable "disable" él parámetro no se envía al servidor.
					$p_procesado['cantidad'] = 1;
				}
				//Cantidad Disponible
				$p_procesado['cantidad_disponible'] = $p_procesado['cantidad'];


				if($this->utilities_model->update('componente_ti',
						array('componente_ti_id'=>$id_comp_ti),$p_procesado ) ){
					echo '{"estatus":"ok"}';
				}else{
					echo '{"estatus":"fail"}';
				}
				break;
			case 'actualizado':
				$this->utils->is_logged();
				$params_main_content = $this->_config_comp_ti($this->per_page,
					false,1,array('accion' => 'all' ),NULL,true);
				$this->utils->template($this->_list(3),'cargar_data/componentes_ti_view',
					$params_main_content,'Cargar Infraestructura','Componentes TI');
				break;
			
		}//end-of: switch outter
	}//end-of: function componentes_ti

	public function departamentos($action){
		$cur_page = $this->uri->segment(3);

		//Verificando el segmento 3 del uri corresponde a la pag o a alguna acción
		if (is_numeric($cur_page)) {
			$action = 'list';
		}else{
			$action = $cur_page;//En este caso no es un número sino 
								//que es la acción: guardado|nuevo|filtrar|guardar...
		}

		switch ($action) {
			//Listando todos los departamentos
			case 'list':
				$this->utils->is_logged();
				$params_main_content = $this->_config_dpto(false,false,false,$cur_page,
					$this->per_page, array('accion' => 'todos'));
				$this->utils->template($this->_list(4),'cargar_data/departamentos',
					$params_main_content,'Cargar Infraestructura','Departamentos');
				break;
			
			//Formulario de nuevo Departamento de ti
			case 'filtrar':
				$this->utils->is_logged();
				$op = $this->input->get('filtro-dpto');
				$p_get = get_encode($this->input->get());
				$cur_page = $this->uri->segment(5);

				switch ($op) {
					case 'todos':
						$params_main_content = $this->_config_dpto(false,false,false,$cur_page,
							$this->per_page, array('accion' => 'todos'));
						break;
					case 'nombre':
						$campo_buscar = $this->input->get('buscar');
						$params_main_content = $this->_config_dpto(false,false,true,$cur_page,
							$this->per_page, array('accion' => 'nombre','info' =>$campo_buscar),$p_get);
						break;
				}
			
				$this->utils->template($this->_list(4),'cargar_data/departamentos',
					$params_main_content,'Cargar Infraestructura','Departamentos');

				break;
			case 'nuevo':
				$this->utils->is_logged();
				//Info de los Departamentos en el sistema
				$params_main_content['list_comp_ti'] = $this->basico_model->ids_nombres_comp_ti();
				$params_main_content['actualizar'] = false;
				$this->utils->template($this->_list(4),'cargar_data/nuevo_departamento_view',
					$params_main_content,'Cargar Infraestructura','Nuevo dpto');
				break;
			//Guardando departamento desde ajax
			case 'guardar':
				$p = $this->input->post();
				if($this->basico_model->add_dpto_comp_ti($p)){
					echo '{"estatus":"ok"}';
				}else{
					echo '{"estatus":"fail"}';
				}

				break;
			//Desplegando msj de guardado
			case 'guardado':
				$this->utils->is_logged();
				$params_main_content = $this->_config_dpto(false,true,false,1,
					$this->per_page,array('accion'=>'todos'));
				$this->utils->template($this->_list(4),'cargar_data/departamentos',
					$params_main_content,'Cargar Infraestructura','Departamentos');
				break;
			//Desplegando formulario lleno para su edición
			case 'actualizar':
				$this->utils->is_logged();
				$dpto_id = $this->uri->segment(4);
				
				//Obteniendo la información del dpto
				$params_main_content['dpto'] = $this->utilities_model->row_by_id('departamento',
					'departamento_id',$dpto_id);
				
				//Componentes en el sistema que no estén ya previamente seleccionados
				$params_main_content['list_comp_ti'] = $this->basico_model->ids_nombres_comp_ti($dpto_id);

				//Componentes que están asociados al dpto
				$params_main_content['list_comp_ti_asig']  = $this->basico_model->comp_ti_asig_dpto($dpto_id);

				$params_main_content['actualizar'] = true;
				$this->utils->template($this->_list(4),'cargar_data/nuevo_departamento_view',
					$params_main_content,'Cargar Infraestructura','Actualizar dpto');

				break;
			//Guardar desde actualizado, desde ajax
			case 'actualizar_guardar':
				$dpto_id = $this->uri->segment(4);
				$p = $this->input->post();
				$p['dpto_id'] = $dpto_id;
				
				if($this->basico_model->update_dpto($p)){
					echo '{"estatus":"ok"}';	
				}else{
					echo '{"estatus":"fail"}';
				}
				break;
			//Desplegando msj de actualizado
			case 'actualizado':
				$this->utils->is_logged();
				$params_main_content = $this->_config_dpto(true,false,false,1,
					$this->per_page,array('accion'=>'todos'));
				$this->utils->template($this->_list(4),'cargar_data/departamentos',
					$params_main_content,'Cargar Infraestructura','Departamentos');
				break;
			case 'eliminar':
				$dpto_id = $this->input->post('dpto_id');
				//Eliminando lógicamente
				if($this->utilities_model->update('departamento',
					array('departamento_id'=>$dpto_id),array('borrado'=>true)) ){
					
					echo '{"estatus":"ok"}';
				}else{
					echo '{"estatus":"fail"}';
				}
				break;
		}
	}

	/**
	 * Configuraciones para el maint_content  de dpto
	 * @param  Boolean $actualizado Índica si despliega o no el msj de actualizado
	 * @param  Boolean $guardado    Índica si despliega o no el msj de guardado
	 * @param  Boolean $filtradp    Índica si despliega o no el msj de filtrado
	 * @param  Integer $cur_page    Página actual
	 * @param  Integer $per_page 	Número de item por página
	 * @param  Array   $data_filtro Informacion de filtro y el tipo de accion
	 *         array('accion' => String,
	 *         		'info' => String //valor del filtro
	 *         )
	 * @param $p_get Parámetros en formato GET, sólo usado para el caso de filtrado.
	 * @return Array              	Config. del main_content
	 */
	private function  _config_dpto($actualizado, $guardado,$filtrado, $cur_page,$per_page,
		$data_filtro,$p_get=NULL){
		/**
		 * Contiene las configuraciones de main_content
		 * @var $mc
		 */
		$mc['actualizado'] = $actualizado;
		$mc['guardado'] = $guardado;
		$mc['cur_page'] = $cur_page;
		$mc['filtrado'] = $filtrado;

		switch ($data_filtro['accion']) {
			case 'todos':
				$l = $this->basico_model->all_dpto();
				break;

			case 'nombre':
				$name = $data_filtro['info'];
				$l = $this->basico_model->all_dpto($name);
				break;
		}
		$config_pag = array(
			'total_rows' => $l['total_rows'],
			'per_page' => $per_page,
			'cur_page' => $cur_page,
			'p_get' => $p_get
			);
		$mc['config_pag'] = $config_pag;
		$mc['list_dpto'] = $l['data'];

		return $mc;
	}




	/*
	 * Funciones para Servicios
	 *
	 */
	public function servicios(){

		$this->load->model('general/general_model','general');
		$data_view['servicios'] = $this->general->get_table('servicio');
		$data_view['proveedores'] = $this->general->get_table('servicio_proveedor');
		$data_view['propietarios'] = $this->general->get_table('personal');

		$this->utils->template($this->_list(6),'cargar_data/servicio/main_servicio',$data_view,'Cargar Infraestructura','Servicios');
	}


	function servicio_check()
	{
		if (($this->general->exist('servicio',array('nombre' => $this->input->post('service_name')))))
		{
			$this->form_validation->set_message('servicio_check', 'Este Servicio ya existe en el Sistema');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	function dropdown_categoria()
	{
		if ($this->input->post('categoria_servicio') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_categoria', 'Por favor seleccione una Categor&#237;a');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

	function dropdown_tipo()
	{
		if ($this->input->post('tipo_servicio') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_tipo', 'Por favor seleccione un Tipo');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

	function dropdown_propietario()
	{
		if ($this->input->post('propietario_servicio') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_propietario', 'Por favor seleccione una Persona');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

	function dropdown_prioridad()
	{
		if ($this->input->post('prioridad_servicio') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_prioridad', 'Por favor seleccione la Prioridad del Servicio');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

	function dropdown_proveedor()
	{
		if ($this->input->post('proveedor_servicio') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_proveedor', 'Por favor seleccione al Proveedor del Servicio');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}


	function dropdown_estatus()
	{
		if ($this->input->post('estatus_servicio') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_estatus', 'Por favor seleccione el Estatus del Servicio');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}



	public function nuevo_servicio(){


		$this->load->model('general/general_model','general');

		$data_view['servicio_categorias'] = $this->general->get_table('servicio_categoria');
		$data_view['servicio_tipos'] = $this->general->get_table('servicio_tipo');
		$data_view['personal'] = $this->general->get_table('personal');
		$data_view['proveedores'] = $this->general->get_table('servicio_proveedor');


	     $this->load->library('form_validation');
		 $this->load->helper(array('form', 'url'));
         
         
         $this->form_validation->set_rules('service_name', 'Nombre del Servicio', 'required|min_length[3]|max_length[150]|trim|callback_servicio_check');
         $this->form_validation->set_rules('descripcion', 'Descripción', 'required|trim');
         $this->form_validation->set_rules('caracteristicas_servicio', 'Caracter&#237;sticas', 'required|trim');
         $this->form_validation->set_rules('categoria_servicio', 'Categorias', 'callback_dropdown_categoria');
         $this->form_validation->set_rules('tipo_servicio', 'Tipos', 'callback_dropdown_tipo');
         $this->form_validation->set_rules('propietario_servicio', 'Propietario', 'callback_dropdown_propietario');
         $this->form_validation->set_rules('proveedor_servicio', 'Proveedor', 'callback_dropdown_proveedor');
         $this->form_validation->set_rules('prioridad_servicio', 'Prioridad', 'callback_dropdown_prioridad');
         $this->form_validation->set_rules('impacto', 'impacto', '');
         $this->form_validation->set_rules('procedimiento_solicitud', 'Procedimientos de Solicitud', '');
         $this->form_validation->set_rules('contacto', 'Informacion de Contactos', '');


          $data_view['mensaje'] = '';

        $this->form_validation->set_message('required','El campo %s es obligatorio');


           if ($this->form_validation->run($this) == FALSE)
            {

                $this->utils->template($this->_list(6),'cargar_data/servicio/nuevo_servicio',$data_view,'Cargar Infraestructura','Servicios');
            }
            else
            {


            	/*if( $this->input->post('prioridad_servicio'))
		            	{
		            		$prioridad = $this->input->post('prioridad_servicio');
		            	}
		            	else
		            	{
		            		$prioridad = NULL;
		            	}*/
		        if( $this->input->post('impacto'))
		            	{
		            		$impacto = $this->input->post('impacto');
		            	}
		            	else
		            	{
		            		$impacto = NULL;
		            	}
		        if( $this->input->post('procedimiento_solicitud'))
		            	{
		            		$procedimiento = $this->input->post('procedimiento_solicitud');
		            	}
		            	else
		            	{
		            		$procedimiento = NULL;
		            	}
		         if( $this->input->post('contacto'))
		            	{
		            		$contacto = $this->input->post('contacto');
		            	}
		            	else
		            	{
		            		$contacto = NULL;
		            	}

            	
                $servicio = array(
                                'nombre' => $this->input->post('service_name'),
                                'descripcion' => $this->input->post('descripcion'),
                                'caracteristicas' => $this->input->post('caracteristicas_servicio'),
                                'categoria_servicio' => $this->input->post('categoria_servicio'),
                                'tipo_servicio' => $this->input->post('tipo_servicio'),
                                'propietario_servicio' => $this->input->post('propietario_servicio'),                               
                                'proveedor_servicio' => $this->input->post('proveedor_servicio'), 
                                'fecha_creacion' => date('Y-m-d H:i:s'),  
                                'prioridad_servicio' => $this->input->post('prioridad_servicio'),
                                'impacto' => $impacto,
                                'procedimiento_solicitud' => $procedimiento,
                                'contacto' => $contacto,
                                'estatus' => 'Activo',
                                'ruta_imagen' => 'assets/imagenes/servicio/default.jpg',

                                );

            	if ( $_FILES AND $_FILES['userfile']['name'] ) 
				{
	            	$config['upload_path'] = './assets/imagenes/servicio';
			        $config['allowed_types'] = 'jpg|png';
			        $config['max_size'] = '50';
			        $config['max_width']  = '140';
			        $config['max_height']  = '140';

			        $this->load->library('upload', $config);
			        
			        //verificamos si existen errores
			        if (!$this->upload->do_upload())
			        {
			            $data_view['mensaje'] = $this->upload->display_errors();
			            $this->utils->template($this->_list(6),'cargar_data/servicio/nuevo_servicio',$data_view,'Cargar Infraestructura','Servicios');
			        }  
			        else
			        {
			        	$file_info = $this->upload->data();
			        	//$ruta_imagen = $file_info['file_name'];
			        	$ruta_imagen = 'assets/imagenes/servicio/'.$file_info['file_name'];
			        	 $servicio = array(
                                'nombre' => $this->input->post('service_name'),
                                'descripcion' => $this->input->post('descripcion'),
                                'caracteristicas' => $this->input->post('caracteristicas_servicio'),
                                'categoria_servicio' => $this->input->post('categoria_servicio'),
                                'tipo_servicio' => $this->input->post('tipo_servicio'),
                                'propietario_servicio' => $this->input->post('propietario_servicio'),                               
                                'proveedor_servicio' => $this->input->post('proveedor_servicio'), 
                                'fecha_creacion' => date('Y-m-d H:i:s'),  
                                'prioridad_servicio' => $this->input->post('prioridad_servicio'),
                                'impacto' => $impacto,
                                'procedimiento_solicitud' => $procedimiento,
                                'contacto' => $contacto,
                                'estatus' => 'Activo',
                                'ruta_imagen' => $ruta_imagen

                                );
			        	

			        	$id_servicio = $this->general->insert('servicio',$servicio,'');

		            	if($id_servicio)
			            	{
			            		$this->session->set_flashdata('Success', 'El Nuevo Servicio ha sido Creado con Éxito');
			            		redirect(site_url('index.php/cargar_datos/servicios'));
			            	}
			            else
			            	{
			            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Crear el Nuevo Servicio');
			            		redirect(site_url('index.php/cargar_datos/servicios'));
			            	}
			        }
		       }
		       else
		       {
			       	$id_servicio = $this->general->insert('servicio',$servicio,'');

	            	if($id_servicio)
		            	{
		            		$this->session->set_flashdata('Success', 'El Nuevo Servicio ha sido Creado con Éxito');
		            		redirect(site_url('index.php/cargar_datos/servicios'));
		            	}
		            else
		            	{
		            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Crear el Nuevo Servicio');
		            		redirect(site_url('index.php/cargar_datos/servicios'));
		            	}

		       }

            }
		
		
	}

	public function ver_servicio($id_servicio = ''){

		$this->load->model('general/general_model','general');	
		
		$servicio =  $this->general->get_row('servicio',array('servicio_id'=>$id_servicio));
		$data_view['servicio'] = $servicio;
		$data_view['servicios'] = $this->general->get_table('servicio');
		$data_view['procesos_negocio'] = $this->general->get_table('proceso_negocio');
		$data_view['procesos_negocio_soportados'] = $this->general->get_result('proceso_negocio_soporte',array('servicio_id'=> $id_servicio)); 

		$data_view['servicios_soportados'] = $this->general->get_result('soporta_a',array('servicio_soporte'=> $id_servicio)); 
		$data_view['servicios_soporte'] = $this->general->get_result('soporta_a',array('servicio_soportado'=> $id_servicio));

		$data_view['componentes_ti'] = $this->general->get_table('componente_ti'); 
		$data_view['servicio_componentes'] = $this->general->get_result('servicio_infraestructura',array('servicio_id'=> $id_servicio)); 

		$data_view['propietario'] = $this->general->get_row('personal',array('id_personal'=> $servicio->propietario_servicio));
		$data_view['proveedor'] =$this->general->get_row('servicio_proveedor',array('proveedor_id'=>$servicio->proveedor_servicio));
		
		$this->utils->template($this->_list(6),'cargar_data/servicio/ver_servicio',$data_view,'Cargar Infraestructura','Servicio');

	}


	public function modificar_servicio($id_servicio = ''){
		 

		$this->load->model('general/general_model','general');
		 
		$data_view['servicio'] = $this->general->get_row('servicio',array('servicio_id'=>$id_servicio));
		$data_view['servicio_categorias'] = $this->general->get_table('servicio_categoria');
		$data_view['servicio_tipos'] = $this->general->get_table('servicio_tipo');
		$data_view['personal'] = $this->general->get_table('personal');
		$data_view['proveedores'] = $this->general->get_table('servicio_proveedor');

		 $this->load->library('form_validation');
		 $this->load->helper(array('form', 'url'));

		 $this->form_validation->set_rules('service_name', 'Nombre del Servicio', 'required|min_length[3]|max_length[150]|trim|callback_servicio_check');
         $this->form_validation->set_rules('descripcion', 'Descripción', 'required|trim');
         $this->form_validation->set_rules('caracteristicas_servicio', 'Caracter&#237;sticas', 'required|trim');
         $this->form_validation->set_rules('categoria_servicio', 'Categorias', 'callback_dropdown_categoria');
         $this->form_validation->set_rules('tipo_servicio', 'Tipos', 'callback_dropdown_tipo');
         $this->form_validation->set_rules('propietario_servicio', 'Propietario', 'callback_dropdown_propietario');
         $this->form_validation->set_rules('proveedor_servicio', 'Proveedor', 'callback_dropdown_proveedor');
         $this->form_validation->set_rules('prioridad_servicio', 'Prioridad', 'callback_dropdown_prioridad');
         $this->form_validation->set_rules('impacto', 'impacto', '');
         $this->form_validation->set_rules('procedimiento_solicitud', 'Procedimientos de Solicitud', '');
         $this->form_validation->set_rules('contacto', 'Informacion de Contactos', '');        
          $this->form_validation->set_rules('estatus_servicio', 'Estatus', 'callback_dropdown_estatus');
         
         $data_view['mensaje'] = '';


		 $servicio = $this->general->get_row('servicio',array('servicio_id' => $id_servicio));

		  if( ($this->input->post('service_name')) != ($servicio->nombre))
		 	{
         		$this->form_validation->set_rules('service_name', 'Nombre del Servicio', 'required|min_length[3]|max_length[150]|trim|callback_servicio_check');
		 	}
		 else
		 	{
		 		$this->form_validation->set_rules('service_name', 'Nombre del Servicio', 'required|min_length[3]|max_length[150]|trim');
		 	}

         $this->form_validation->set_message('required','El campo %s es obligatorio');

         
         if ($this->form_validation->run($this) == FALSE)
            {
            	$this->utils->template($this->_list(6),'cargar_data/servicio/modificar_servicio',$data_view,'Cargar Infraestructura','Servicio');                
            }
            else
            {


	            	/*if( $this->input->post('prioridad_servicio') != 'seleccione')
		            	{
		            		$prioridad = $this->input->post('prioridad_servicio');
		            	}
		            	else
		            	{
		            		$prioridad = NULL;
		            	}*/
		        if( $this->input->post('impacto'))
		            	{
		            		$impacto = $this->input->post('impacto');
		            	}
		            	else
		            	{
		            		$impacto = NULL;
		            	}
		        if( $this->input->post('procedimiento_solicitud'))
		            	{
		            		$procedimiento = $this->input->post('procedimiento_solicitud');
		            	}
		            	else
		            	{
		            		$procedimiento = NULL;
		            	}
		         if( $this->input->post('contacto'))
		            	{
		            		$contacto = $this->input->post('contacto');
		            	}
		            	else
		            	{
		            		$contacto = NULL;
		            	}

            	
                $servicio = array(
                                'nombre' => $this->input->post('service_name'),
                                'descripcion' => $this->input->post('descripcion'),
                                'caracteristicas' => $this->input->post('caracteristicas_servicio'),
                                'categoria_servicio' => $this->input->post('categoria_servicio'),
                                'tipo_servicio' => $this->input->post('tipo_servicio'),
                                'propietario_servicio' => $this->input->post('propietario_servicio'),                               
                                'proveedor_servicio' => $this->input->post('proveedor_servicio'), 
                                'fecha_modificado' => date('Y-m-d H:i:s'),  
                                'prioridad_servicio' => $this->input->post('prioridad_servicio'),
                                'impacto' => $impacto,
                                'procedimiento_solicitud' => $procedimiento,
                                'contacto' => $contacto,
                                'estatus' => $this->input->post('estatus_servicio'),
                                'ruta_imagen' => $servicio->ruta_imagen,

                                );

            	if ( $_FILES AND $_FILES['userfile']['name'] ) 
				{
	            	$config['upload_path'] = './assets/imagenes/servicio';
			        $config['allowed_types'] = 'jpg|png';
			        $config['max_size'] = '50';
			        $config['max_width']  = '140';
			        $config['max_height']  = '140';

			        $this->load->library('upload', $config);
			        
			        //verificamos si existen errores
			        if (!$this->upload->do_upload())
			        {
			            $data_view['mensaje'] = $this->upload->display_errors();
			            $this->utils->template($this->_list(6),'cargar_data/servicio/modificar_servicio',$data_view,'Cargar Infraestructura','Servicios');
			        }  
			        else
			        {
			        	$file_info = $this->upload->data();
			        	//$ruta_imagen = $file_info['file_name'];
			        	$ruta_imagen = 'assets/imagenes/servicio/'.$file_info['file_name'];
			        	$servicio = array(
                                'nombre' => $this->input->post('service_name'),
                                'descripcion' => $this->input->post('descripcion'),
                                'caracteristicas' => $this->input->post('caracteristicas_servicio'),
                                'categoria_servicio' => $this->input->post('categoria_servicio'),
                                'tipo_servicio' => $this->input->post('tipo_servicio'),
                                'propietario_servicio' => $this->input->post('propietario_servicio'),                               
                                'proveedor_servicio' => $this->input->post('proveedor_servicio'), 
                                'fecha_modificado' => date('Y-m-d H:i:s'),  
                                'prioridad_servicio' => $this->input->post('prioridad_servicio'),
                                'impacto' => $impacto,
                                'procedimiento_solicitud' => $procedimiento,
                                'contacto' => $contacto,
                                'estatus' => 'Activo',
                                'ruta_imagen' => $ruta_imagen

                                );
			        	

			        	$servicio_id = $this->general->update2('servicio',$servicio,array('servicio_id'=>$id_servicio));

		            	if($servicio_id)
			            	{
			            		$this->session->set_flashdata('Success', 'El Servicio ha sido Actualizado con Éxito');
			            		redirect(site_url('index.php/cargar_datos/servicios'));
			            	}
			               else
			            	{
			            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Actualizar el Servicio');
			            		redirect(site_url('index.php/cargar_datos/servicios'));
			            	}
			        }
		       }
		       else
		       {
			       $servicio_id = $this->general->update2('servicio',$servicio,array('servicio_id'=>$id_servicio));

	            	if($servicio_id)
		            	{
		            		$this->session->set_flashdata('Success', 'El Servicio ha sido Actualizado con Éxito');
		            		redirect(site_url('index.php/cargar_datos/servicios'));
		            	}
		               else
		            	{
		            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Actualizar el Servicio');
		            		redirect(site_url('index.php/cargar_datos/servicios'));
		            	}

		       }
	            	
                
            }


	}

	public function eliminar_servicio(){

		$this->load->model('general/general_model','general');
		$id_servicio = $this->input->post('servicio_id');
		$delete = $this->general->delete('servicio',array('servicio_id'=>$id_servicio));
		if($delete)
	        {
				$this->session->set_flashdata('Success', 'El Servicio ha sido Eliminado con Éxito');
			}
		else
			{
				$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Eliminar el Servicio');
			}
		if($this->input->post('delete_ver'))
			{
				redirect(site_url('index.php/cargar_datos/servicios'));
			}	
	}


	public function eliminar_servicios(){

		$this->load->model('general/general_model','general');
		$servicios_id = $this->input->post('servicio_id');
		foreach ($servicios_id as $servicio) {		    
			    
			   $delete = $this->general->delete('servicio',array('servicio_id'=>$servicio));
			}
		if($delete)
	        {
				$this->session->set_flashdata('Success', 'Los Servicios han sido Eliminados con Éxito');
			}
		else
			{
				$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Eliminar los Servicio Seleccionados');
			}

			
	}

	/*
	 * FIN deFunciones para Servicios
	 *
	 */



	/*
	 * Funciones para Servicio Soportados
	 *
	 */


		public function servicio_soportados($servicio_proceso_id = ''){

		$this->load->model('general/general_model','general');
		$data_view['servicios'] = $this->general->get_table('servicio');
		 $this->load->library('form_validation');
		 $this->load->helper(array('form', 'url'));

		if(!empty($servicio_proceso_id)) { 
		 $data_view['servicio_proceso_id'] = $servicio_proceso_id;
		 $data_view['servicio_actual'] = $servicio_proceso_id;

				$data_view['servicios_soportados'] = array();

				if($this->general->exist('soporta_a',array('servicio_soporte'=> $servicio_proceso_id)))
		            {
		            	$data_view['servicios_soportados'] = $this->general->get_result('soporta_a',array('servicio_soporte'=> $servicio_proceso_id)); 
		            }
		}


		if($this->input->post('servicios'))
			{
				$data_view['servicio_actual'] = $this->input->post('servicios');

				$data_view['servicios_soportados'] = array();

				if($this->general->exist('soporta_a',array('servicio_soporte'=> $this->input->post('servicios') )))
		            {
		            	$data_view['servicios_soportados'] = $this->general->get_result('soporta_a',array('servicio_soporte'=> $this->input->post('servicios'))); 
		            }
			}

   		if($this->input->post('servicios') == 'seleccione')
            {
            	unset($data_view['servicio_actual']);
            }


        $this->form_validation->set_rules('servicios', 'Servicios', 'callback_dropdown_servicio');

	    if ($this->form_validation->run($this) == FALSE)
          {
             	$this->utils->template($this->_list(6),'cargar_data/servicio_soportados/main_servicio_soportados',$data_view,'Cargar Infraestructura','Servicio');             
          }
        else
          {
            	$this->utils->template($this->_list(6),'cargar_data/servicio_soportados/main_servicio_soportados',$data_view,'Cargar Infraestructura','Servicio');
          } 



       if ($this->input->post('servicios_soportados'))
        {
	       	foreach ($this->input->post('servicios_soportados') as $key => $servicio_soportado)
	       	{
	       		//$servicios_soportados[$key] = $servicio_soportado;
	       		$soporte = false;
	       		if( !($this->general->exist('soporta_a',array('servicio_soportado'=> $servicio_soportado,'servicio_soporte'=> $this->input->post('servicios')))) )
	       		{
	       		  $servicios = array(
	                                'servicio_soporte' => $this->input->post('servicios'),
	                                'servicio_soportado' => $servicio_soportado,  
	                                );

	            	$this->general->insert('soporta_a',$servicios,'');
	            }
	             if(($this->general->exist('soporta_a',array('servicio_soportado'=> $servicio_soportado,'servicio_soporte'=> $this->input->post('servicios')))) )
	       		{
	       			$soporte = true;
	       		}
	       	}

	       	//$data_view['servicios_agregados'] = $servicios_soportados;

	       		if($soporte)
		        {
					$this->session->set_flashdata('Success', 'Los Servicios Seleccionados han sido Agregados con Éxito');
					redirect(site_url('index.php/cargar_datos/servicio_soportados/'.$this->input->post('servicios')));
				}
				else
				{
					$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Agregar los Servicios Seleccionados');
					redirect(site_url('index.php/cargar_datos/servicio_soportados/'.$this->input->post('servicios')));
				}
       }

         if ($this->input->post('lista_servicios'))
        {
	       	foreach ($this->input->post('lista_servicios') as $key => $lista_servicio)
	       	{
	       		//$lista_servicios[$key] = $lista_servicio;
	       		$soporte = false;
	       		if(($this->general->exist('soporta_a',array('servicio_soportado'=> $lista_servicio,'servicio_soporte'=> $this->input->post('servicios')))) )
	       		{

	            	$this->general->delete('soporta_a',array('servicio_soportado'=> $lista_servicio,'servicio_soporte'=> $this->input->post('servicios')));
	            }
	             if(!($this->general->exist('soporta_a',array('servicio_soportado'=> $lista_servicio,'servicio_soporte'=> $this->input->post('servicios')))) )
	       		{
	       			$soporte = true;
	       		}
	       	}

	       	//$data_view['servicios_agregados'] = $servicios_soportados;

	       		if($soporte)
		        {
					$this->session->set_flashdata('Success', 'Los Servicios Seleccionados han sido Removidos con Éxito');
					redirect(site_url('index.php/cargar_datos/servicio_soportados/'.$this->input->post('servicios')));
				}
				else
				{
					$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Remover los Servicios Seleccionados');
					redirect(site_url('index.php/cargar_datos/servicio_soportados/'.$this->input->post('servicios')));
				}
       }
		  
	}


	/*
	 * FIN deFunciones para Servicio Soportados
	 *
	 *
	 */



	/*
	 * Funciones para Infraestructura de Soporte para los Servicios
	 *
	 *
	 */
	public function servicio_infraestructura($servicio_id = ''){

		$this->load->model('general/general_model','general');
		 $this->load->library('form_validation');
		 $this->load->helper(array('form', 'url'));
		$data_view['servicios'] = $this->general->get_table('servicio');
		$data_view['componentes_ti'] = $this->general->get_table('componente_ti');

		if(!empty($servicio_id)) { 
		 $data_view['servicio_id'] = $servicio_id;
		 $data_view['servicio_actual'] = $servicio_id;

				$data_view['componentes_soporte'] = array();

				if($this->general->exist('servicio_infraestructura',array('servicio_id'=> $servicio_id)))
		            {
		            	$data_view['componentes_soporte'] = $this->general->get_result('servicio_infraestructura',array('servicio_id'=> $servicio_id)); 
		            }
		}


		if($this->input->post('servicios'))
			{
				$data_view['servicio_actual'] = $this->input->post('servicios');

				$data_view['componentes_soporte'] = array();

				if($this->general->exist('servicio_infraestructura',array('servicio_id'=> $this->input->post('servicios'))))
		            {
		            	$data_view['componentes_soporte'] = $this->general->get_result('servicio_infraestructura',array('servicio_id'=> $this->input->post('servicios'))); 
		            }
			}

   		if($this->input->post('servicios') == 'seleccione')
            {
            	unset($data_view['servicio_actual']);
            }


        $this->form_validation->set_rules('servicios', 'Servicios', 'callback_dropdown_servicio');

	    if ($this->form_validation->run($this) == FALSE)
          {
             	$this->utils->template($this->_list(6),'cargar_data/servicio_infraestructura/servicio_infraestructura',$data_view,'Cargar Infraestructura','Servicio');             
          }
        else
          {
            	$this->utils->template($this->_list(6),'cargar_data/servicio_infraestructura/servicio_infraestructura',$data_view,'Cargar Infraestructura','Servicio');
          } 



       if ($this->input->post('infraestructura_soporte'))
        {
	       	foreach ($this->input->post('infraestructura_soporte') as $key => $componente_soporte)
	       	{
	       		
	       		$soporte = false;
	       		if( !($this->general->exist('servicio_infraestructura',array('componente_id'=> $componente_soporte,'servicio_id'=> $this->input->post('servicios')))) )
	       		{
	       		  $servicio_componente = array(
	                                'servicio_id' => $this->input->post('servicios'),
	                                'componente_id' => $componente_soporte,  
	                                );

	            	$this->general->insert('servicio_infraestructura',$servicio_componente,'');
	            }
	             if(($this->general->exist('servicio_infraestructura',array('componente_id'=> $componente_soporte,'servicio_id'=> $this->input->post('servicios')))) )
	       		{
	       			$soporte = true;
	       		}
	       	}

	       		if($soporte)
		        {
					$this->session->set_flashdata('Success', 'Los Componentes de TI Seleccionados han sido Agregados con Éxito');
					redirect(site_url('index.php/cargar_datos/servicio_infraestructura/'.$this->input->post('servicios')));
				}
				else
				{
					$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Agregar los Componentes de TI Seleccionados');
					redirect(site_url('index.php/cargar_datos/servicio_infraestructura/'.$this->input->post('servicios')));
				}
       }

        if ($this->input->post('lista_componentes'))
        {
	       	foreach ($this->input->post('lista_componentes') as $key => $lista_componente)
	       	{
	       		
	       		$soporte = false;
	       		if(($this->general->exist('servicio_infraestructura',array('componente_id'=> $lista_componente,'servicio_id'=> $this->input->post('servicios')))) )
	       		{

	            	$this->general->delete('servicio_infraestructura',array('componente_id'=> $lista_componente,'servicio_id'=> $this->input->post('servicios')));
	            }
	             if(!($this->general->exist('servicio_infraestructura',array('componente_id'=> $lista_componente,'servicio_id'=> $this->input->post('servicios')))) )
	       		{
	       			$soporte = true;
	       		}
	       	}

	       

	       		if($soporte)
		        {
					$this->session->set_flashdata('Success', 'Los Componentes de TI Seleccionados han sido Removidos con Éxito');
					redirect(site_url('index.php/cargar_datos/servicio_infraestructura/'.$this->input->post('servicios')));
				}
				else
				{
					$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Remover los Componentes de TI Seleccionados');
					redirect(site_url('index.php/cargar_datos/servicio_infraestructura/'.$this->input->post('servicios')));
				}
       }
		  
	}


	/*
	 * FIN deFunciones para Infraestructura de Soporte para los Servicios
	 *
	 *
	 */


	/*
	 * Funciones para Umbrales
	 *
	 */

	public function servicio_umbral($servicio_id = ''){

		$this->load->model('general/general_model','general');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));

		$data_view['servicios'] = $this->general->get_table('servicio');

		if(!empty($servicio_id)) { 
		 $data_view['servicio_id'] = $servicio_id;
		 $data_view['servicio_actual'] = $servicio_id;
		 $data_view['servicio_seleccionado'] = $this->general->get_row('servicio',array('servicio_id'=> $servicio_id));
		}


		if($this->input->post('servicios'))
			{
				$data_view['servicio_actual'] = $this->input->post('servicios');
				$data_view['servicio_seleccionado'] = $this->general->get_row('servicio',array('servicio_id'=> $this->input->post('servicios')));
			}

   		if($this->input->post('servicios') == 'seleccione')
            {
            	unset($data_view['servicio_actual']);
            }

         $this->form_validation->set_rules('servicios', 'Servicios', 'callback_dropdown_servicio');

	    if ($this->form_validation->run($this) == FALSE)
          {
             	$this->utils->template($this->_list(9),'cargar_data/umbral/main_servicio_umbrales',$data_view,'Cargar Infraestructura','Servicio');           
          }
        else
          {
            	$this->utils->template($this->_list(9),'cargar_data/umbral/main_servicio_umbrales',$data_view,'Cargar Infraestructura','Servicio');
          } 
	}


	public function servicio_umbral_crear($servicio_id = ''){

         $data_view['servicio_actual'] = $this->general->get_row('servicio',array('servicio_id'=> $servicio_id));

         $this->form_validation->set_rules('degradacion_disco', 'Umbral de Degradación de Disco', 'required|trim|integer|greater_than[0]|less_than[101]');
         $this->form_validation->set_rules('fallo_disco', 'Umbral de Fallo de Disco', 'required|trim|integer|greater_than[0]|less_than[101]');

         $this->form_validation->set_rules('degradacion_cpu', 'Umbral de Degradación de CPU', 'required|trim|integer|greater_than[0]|less_than[101]');
         $this->form_validation->set_rules('fallo_cpu', 'Umbral de Fallo de CPU', 'required|trim|integer|greater_than[0]|less_than[101]');

         $this->form_validation->set_rules('degradacion_memoria', 'Umbral de Degradación de Memoria', 'required|trim|integer|greater_than[0]|less_than[101]');
         $this->form_validation->set_rules('fallo_memoria', 'Umbral de Fallo de Memoria', 'required|trim|integer|greater_than[0]|less_than[101]');

         $this->form_validation->set_rules('degradacion_red', 'Umbral de Degradación de Red', 'required|trim|integer|greater_than[0]|less_than[101]');
         $this->form_validation->set_rules('fallo_red', 'Umbral de Fallo de Red', 'required|trim|integer|greater_than[0]|less_than[101]');

         $this->form_validation->set_message('less_than', 'El porcentaje debe ser Menor o Igual a Cien');
         $this->form_validation->set_message('greater_than', 'El porcentaje debe ser Mayor a Cero');

	    if ($this->form_validation->run($this) == FALSE)
          {
             	$this->utils->template($this->_list(9),'cargar_data/umbral/servicio_umbrales',$data_view,'Cargar Infraestructura','Servicio');           
          }
        else
          {
            	$servicio = array(
            					'degradacion_disco' => $this->input->post('degradacion_disco'),
            					 'fallo_disco' => $this->input->post('fallo_disco'), 

                                'degradacion_cpu' => $this->input->post('degradacion_cpu'),
                                'fallo_cpu' => $this->input->post('fallo_cpu'),

                                'degradacion_red' => $this->input->post('degradacion_red'),
                                'fallo_red' => $this->input->post('fallo_red'),

                                'degradacion_memoria' => $this->input->post('degradacion_memoria'),
                                 'fallo_memoria' => $this->input->post('fallo_memoria'), 
                               );
			        	

			     $id_servicio = $this->general->update2('servicio',$servicio,array('servicio_id'=>$servicio_id));

		            	if($id_servicio)
			            	{
			            		$this->session->set_flashdata('Success', 'Los Umbrales han sido Actualizados con Éxito');
			            		redirect(site_url('index.php/cargar_datos/umbrales/'.$servicio_id));
			            	}
			               else
			            	{
			            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Actualizar Los Umbrales');
			            		redirect(site_url('index.php/cargar_datos/umbrales/'.$servicio_id));
			            	}
          } 

	}


	/*
	 *FIN de Funciones para Umbrales
	 *
	 */


    /*	
	 * Funciones para Procesos de Servicio
	 *
	 */

    function dropdown_servicio()
	{
		if ($this->input->post('servicios') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_servicio', 'Por favor seleccione un Servicio');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}
	

	public function servicio_proceso($servicio_proceso_id = ''){
		
		$this->load->model('general/general_model','general');

		$data_view['procesos_servicio'] = $this->general->get_table('servicio_proceso');
      	$this->utils->template($this->_list(7),'cargar_data/servicio_procesos/main_servicio_procesos',$data_view,'Cargar Infraestructura','Procesos de Servicio');
                
	}

	function servicio_proceso_check()
	{
		if (($this->general->exist('servicio_proceso',array('nombre' => $this->input->post('servicio_proceso_name')))))
		{
			$this->form_validation->set_message('servicio_proceso_check', 'Este Proceso de Servicio ya existe en el Sistema');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	function dropdown_tipo_proceso()
	{
		if ($this->input->post('tipo_proceso_servicio') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_tipo_proceso', 'Por favor seleccione una Categor&#237;a');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}


	public function nuevo_servicio_proceso(){
		 
    	
		$this->load->model('general/general_model','general');

				 $this->load->library('form_validation');
				 $this->load->helper(array('form', 'url'));
		         $this->form_validation->set_rules('servicio_proceso_name', 'Nombre del Proceso', 'required|min_length[3]|max_length[150]|trim|callback_servicio_proceso_check');
		         $this->form_validation->set_rules('descripcion', 'Descripción', '');
		         $this->form_validation->set_rules('tipo_proceso_servicio', 'Tipo de Proceso', 'callback_dropdown_tipo_proceso');

		         $this->form_validation->set_message('required','El campo %s es obligatorio');
		         
		         if ($this->form_validation->run($this) == FALSE)
		            {

		                $this->utils->template($this->_list(7),'cargar_data/servicio_procesos/nuevo_servicio_procesos','','Cargar Infraestructura','Procesos de Servicio');
		            }
		            else
		            {
		            	if( $this->input->post('descripcion'))
		            	{
		            		$descripcion = $this->input->post('descripcion');
		            	}
		            	else
		            	{
		            		$descripcion = NULL;
		            	}
		            	
		                $proceso_servicio = array(
		                                'nombre' => $this->input->post('servicio_proceso_name'),
		                                'descripcion' => $descripcion,
		                                'tipo' => $this->input->post('tipo_proceso_servicio'),
		                                );

		            	$proceso_servicio = $this->general->insert('servicio_proceso',$proceso_servicio,'');

		            	if($proceso_servicio)
			            	{
			            		$this->session->set_flashdata('Success', 'El Nuevo Proceso de Servicio ha sido Creado con Éxito');
			            		redirect(site_url('index.php/cargar_datos/servicio_procesos/'.$servicio_id));
			            	}
			            else
			            	{
			            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Crear el Nuevo Proceso de Servicio');
			            		redirect(site_url('index.php/cargar_datos/servicio_procesos/'.$servicio_id));
			            	}
		               
		            }	    
        
	}

	public function ver_servicio_proceso($servicio_proceso_id = ''){

		$this->load->model('general/general_model','general');	
		
		$data_view['servicio_proceso'] =$this->general->get_row('servicio_proceso',array('servicio_proceso_id'=>$servicio_proceso_id));
		$data_view['procesos_servicio_soporte'] =$this->general->get_result('proceso_soporta_servicio',array('servicio_proceso_id'=>$servicio_proceso_id));
		$data_view['servicios'] = $this->general->get_table('servicio');
		
		$this->utils->template($this->_list(7),'cargar_data/servicio_procesos/ver_servicio_procesos',$data_view,'Cargar Infraestructura','Procesos de Servicio');

	}



	public function modificar_servicio_proceso($servicio_proceso_id = ''){
		 

		$this->load->model('general/general_model','general');
		 
		$data_view['servicio_proceso'] =$this->general->get_row('servicio_proceso',array('servicio_proceso_id'=>$servicio_proceso_id));
		
		 $this->load->library('form_validation');
		 $this->load->helper(array('form', 'url'));

		 $this->form_validation->set_rules('servicio_proceso_name', 'Nombre del Proceso', 'required|min_length[3]|max_length[150]|trim|callback_servicio_proceso_check');
		 $this->form_validation->set_rules('descripcion', 'Descripción', '');
		 $this->form_validation->set_rules('tipo_proceso_servicio', 'Tipo de Proceso', 'callback_dropdown_tipo_proceso');
		

		 $servicio_proceso = $this->general->get_row('servicio_proceso',array('servicio_proceso_id' => $servicio_proceso_id));

		  if( ($this->input->post('servicio_proceso_name')) != ($servicio_proceso->nombre))
		 	{
         		$this->form_validation->set_rules('servicio_proceso_name', 'Nombre del Servicio', 'required|min_length[3]|max_length[150]|trim|callback_servicio_proceso_check');
		 	}
		 else
		 	{
		 		$this->form_validation->set_rules('servicio_proceso_name', 'Nombre del Servicio', 'required|min_length[3]|max_length[150]|trim');
		 	}

         $this->form_validation->set_message('required','El campo %s es obligatorio');

         
         if ($this->form_validation->run($this) == FALSE)
            {
            	$this->utils->template($this->_list(7),'cargar_data/servicio_procesos/modificar_servicio_procesos',$data_view,'Cargar Infraestructura','Procesos de Servicio');                
            }
            else
            {
            	if( $this->input->post('descripcion'))
		            	{
		            		$descripcion = $this->input->post('descripcion');
		            	}
		            	else
		            	{
		            		$descripcion = NULL;
		            	}
		            	
		                $proceso_servicio = array(
		                                'nombre' => $this->input->post('servicio_proceso_name'),
		                                'descripcion' => $descripcion,
		                                'tipo' => $this->input->post('tipo_proceso_servicio'),        
		                                );

            	$proceso_id = $this->general->update2('servicio_proceso',$proceso_servicio,array('servicio_proceso_id'=>$servicio_proceso_id));

            	if($proceso_id)
	            	{
	            		$this->session->set_flashdata('Success', 'El Proceso de Servicio ha sido Actualizado con Éxito');
	            		redirect(site_url('index.php/cargar_datos/servicio_procesos/'.$servicio_proceso->servicio_id));
	            	}
	               else
	            	{
	            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Actualizar el Proceso de Servicio');
	            		redirect(site_url('index.php/cargar_datos/servicio_procesos/'.$servicio_proceso->servicio_id));
	            	}
	            	
                
            }


	}


	public function eliminar_servicio_proceso(){

		$this->load->model('general/general_model','general');
		$id_proceso = $this->input->post('proceso_id');
		$delete = $this->general->delete('servicio_proceso',array('servicio_proceso_id'=>$id_proceso));
		if($delete)
	        {
				$this->session->set_flashdata('Success', 'El Proceso de Servicio ha sido Eliminado con Éxito');
			}
		else
			{
				$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Eliminar el Proceso de Servicio');
			}
		if($this->input->post('delete_ver'))
			{
				redirect(site_url('index.php/cargar_datos/servicio_procesos'));
			}	
	}


	public function eliminar_servicio_procesos(){

		$this->load->model('general/general_model','general');
		$procesos_id = $this->input->post('proceso_id');
		foreach ($procesos_id as $proceso) {		    
			    
			   $delete = $this->general->delete('servicio_proceso',array('servicio_proceso_id'=>$proceso));
			}
		if($delete)
	        {
				$this->session->set_flashdata('Success', 'Los Procesos de Servicio han sido Eliminados con Éxito');
			}
		else
			{
				$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Eliminar los Procesos de Servicio Seleccionados');
			}

			
	}

	public function procesos_por_servicio($servicio_id = ''){

		$this->load->model('general/general_model','general');
		$data_view['servicios'] = $this->general->get_table('servicio');
		$data_view['procesos_servicio'] = $this->general->get_table('servicio_proceso');

		if(!empty($servicio_id)) { 
		 $data_view['servicio_id'] = $servicio_id;
		 $data_view['servicio_actual'] = $servicio_id;

				$data_view['procesos_soporte'] = array();

				if($this->general->exist('proceso_soporta_servicio',array('servicio_id'=> $servicio_id)))
		            {
		            	$data_view['procesos_soporte'] = $this->general->get_result('proceso_soporta_servicio',array('servicio_id'=> $servicio_id)); 
		            }
		}


		if($this->input->post('servicios'))
			{
				$data_view['servicio_actual'] = $this->input->post('servicios');

				$data_view['procesos_soporte'] = array();

				if($this->general->exist('proceso_soporta_servicio',array('servicio_id'=> $this->input->post('servicios'))))
		            {
		            	$data_view['procesos_soporte'] = $this->general->get_result('proceso_soporta_servicio',array('servicio_id'=> $this->input->post('servicios'))); 
		            }
			}

   		if($this->input->post('servicios') == 'seleccione')
            {
            	unset($data_view['servicio_actual']);
            }


        $this->form_validation->set_rules('servicios', 'Servicios', 'callback_dropdown_servicio');

	    if ($this->form_validation->run($this) == FALSE)
          {
             	$this->utils->template($this->_list(7),'cargar_data/servicio_procesos/procesos_por_servicio',$data_view,'Cargar Infraestructura','Servicio');             
          }
        else
          {
            	$this->utils->template($this->_list(7),'cargar_data/servicio_procesos/procesos_por_servicio',$data_view,'Cargar Infraestructura','Servicio');
          } 



       if ($this->input->post('procesos_servicio_soporte'))
        {
	       	foreach ($this->input->post('procesos_servicio_soporte') as $key => $proceso_servicio_soporte)
	       	{
	       		
	       		$soporte = false;
	       		if( !($this->general->exist('proceso_soporta_servicio',array('servicio_proceso_id'=> $proceso_servicio_soporte,'servicio_id'=> $this->input->post('servicios')))) )
	       		{
	       		  $proceso_servicio = array(
	                                'servicio_id' => $this->input->post('servicios'),
	                                'servicio_proceso_id' => $proceso_servicio_soporte,  
	                                );

	            	$this->general->insert('proceso_soporta_servicio',$proceso_servicio,'');
	            }
	             if(($this->general->exist('proceso_soporta_servicio',array('servicio_proceso_id'=> $proceso_servicio_soporte,'servicio_id'=> $this->input->post('servicios')))) )
	       		{
	       			$soporte = true;
	       		}
	       	}

	       		if($soporte)
		        {
					$this->session->set_flashdata('Success', 'Los Procesos de Servicio Seleccionados han sido Agregados con Éxito');
					redirect(site_url('index.php/cargar_datos/servicio_procesos/procesos_por_servicio/'.$this->input->post('servicios')));
				}
				else
				{
					$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Agregar los Procesos de Servicio Seleccionados');
					redirect(site_url('index.php/cargar_datos/servicio_procesos/procesos_por_servicio/'.$this->input->post('servicios')));
				}
       }

        if ($this->input->post('lista_procesos_servicio'))
        {
	       	foreach ($this->input->post('lista_procesos_servicio') as $key => $lista_proceso)
	       	{
	       		
	       		$soporte = false;
	       		if(($this->general->exist('proceso_soporta_servicio',array('servicio_proceso_id'=> $lista_proceso,'servicio_id'=> $this->input->post('servicios')))) )
	       		{

	            	$this->general->delete('proceso_soporta_servicio',array('servicio_proceso_id'=> $lista_proceso,'servicio_id'=> $this->input->post('servicios')));
	            }
	             if(!($this->general->exist('proceso_soporta_servicio',array('servicio_proceso_id'=> $lista_proceso,'servicio_id'=> $this->input->post('servicios')))) )
	       		{
	       			$soporte = true;
	       		}
	       	}

	       

	       		if($soporte)
		        {
					$this->session->set_flashdata('Success', 'Los Procesos de Servicio Seleccionados han sido Removidos con Éxito');
					redirect(site_url('index.php/cargar_datos/servicio_procesos/procesos_por_servicio/'.$this->input->post('servicios')));
				}
				else
				{
					$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Remover los Procesos de Servicio Seleccionados');
					redirect(site_url('index.php/cargar_datos/servicio_procesos/procesos_por_servicio/'.$this->input->post('servicios')));
				}
       }
		  
	}



	/*
	 *FIN de Funciones para Procesos de Servicio

	 */




	/*
	 * Funciones para Categoria de Servicio
	 *
	 */

	public function servicio_categorias(){
		$this->load->model('general/general_model','general');
		$data_view['servicio_categorias'] = $this->general->get_table('servicio_categoria');
		$this->utils->template($this->_list(6),'cargar_data/servicio_categorias/main_servicio_categorias',$data_view,'Cargar Infraestructura','Servicio');
	}


	function categoria_name_check()
	{
		if (($this->general->exist('servicio_categoria',array('nombre' => $this->input->post('categoria_name')))))
		{
			$this->form_validation->set_message('categoria_name_check', 'Este Nombre de Categor&#237;a ya existe en el Sistema');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}


	public function nuevo_servicio_categoria(){
		 

		$this->load->model('general/general_model','general');


		 $this->load->library('form_validation');
		 $this->load->helper(array('form', 'url'));
         $this->form_validation->set_rules('categoria_name', 'Nombre de la Categor&#237;a', 'required|min_length[3]|max_length[150]|trim|callback_categoria_name_check');
         $this->form_validation->set_rules('descripcion', 'Descripción', 'required|trim');

         $this->form_validation->set_message('required','El campo %s es obligatorio');

         $data_view['mensaje'] = '';
         
         if ($this->form_validation->run($this) == FALSE)
            {

                $this->utils->template($this->_list(6),'cargar_data/servicio_categorias/nuevo_servicio_categorias',$data_view,'Cargar Infraestructura','Servicio');
            }
            else
            {
            	
	            $categoria = array(
                                'nombre' => $this->input->post('categoria_name'),
                                'descripcion' => $this->input->post('descripcion'), 
                                'ruta_imagen' => 'assets/imagenes/servicio/default.jpg',      
                                );


	            if ( $_FILES AND $_FILES['userfile']['name'] ) 
				{
	            	$config['upload_path'] = './assets/imagenes/servicio';
			        $config['allowed_types'] = 'jpg|png';
			        $config['max_size'] = '50';
			        $config['max_width']  = '140';
			        $config['max_height']  = '140';

			        $this->load->library('upload', $config);
			        
			        //verificamos si existen errores
			        if (!$this->upload->do_upload())
			        {
			            $data_view['mensaje'] = $this->upload->display_errors();
			            $this->utils->template($this->_list(6),'cargar_data/servicio_categorias/nuevo_servicio_categorias',$data_view,'Cargar Infraestructura','Servicios');
			        }  
			        else
			        {
			        	$file_info = $this->upload->data();
			        	$ruta_imagen = 'assets/imagenes/servicio/'.$file_info['file_name'];
			        
						$categoria = array(
                                'nombre' => $this->input->post('categoria_name'),
                                'descripcion' => $this->input->post('descripcion'), 
                                'ruta_imagen' => $ruta_imagen,     
                                );
			        	

			        	$id_categoria = $this->general->insert('servicio_categoria',$categoria,'');

		            	if($id_categoria)
			            	{
			            		$this->session->set_flashdata('Success', 'La Nueva Categor&#237;a de Servicio ha sido Creada con Éxito');
			            		redirect(site_url('index.php/cargar_datos/servicio_categorias'));
			            	}
			            else
			            	{
			            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Crear la Nueva Categor&#237;a de Servicio');
			            		redirect(site_url('index.php/cargar_datos/servicio_categorias'));
			            	}
			        }
		       }
		       else
		       {
			       $id_categoria = $this->general->insert('servicio_categoria',$categoria,'');

	            	if($id_categoria)
		            	{
		            		$this->session->set_flashdata('Success', 'La Nueva Categor&#237;a de Servicio ha sido Creada con Éxito');
		            		redirect(site_url('index.php/cargar_datos/servicio_categorias'));
		            	}
		            else
		            	{
		            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Crear la Nueva Categor&#237;a de Servicio');
		            		redirect(site_url('index.php/cargar_datos/servicio_categorias'));
		            	}

		       }
                
            }


	}

	public function ver_servicio_categoria($id_categoria = ''){

		$this->load->model('general/general_model','general');	
		$data_view['servicio_categoria'] = $this->general->get_row('servicio_categoria',array('categoria_id'=>$id_categoria));
		$this->utils->template($this->_list(6),'cargar_data/servicio_categorias/ver_servicio_categorias',$data_view,'Cargar Infraestructura','Servicio');

	}


	public function modificar_servicio_categoria($id_categoria = ''){
		 

		$this->load->model('general/general_model','general');
		 
		$data_view['servicio_categoria'] = $this->general->get_row('servicio_categoria',array('categoria_id'=>$id_categoria));


		 $this->load->library('form_validation');
		 $this->load->helper(array('form', 'url'));
		 $categoria = $this->general->get_row('servicio_categoria',array('categoria_id' => $id_categoria));

		 $data_view['mensaje'] = '';

		  if( ($this->input->post('categoria_name')) != ($categoria->nombre))
		 	{
         		$this->form_validation->set_rules('categoria_name', 'Nombre de la Categor&#237;a', 'required|min_length[3]|max_length[150]|trim|callback_categoria_name_check');
		 	}
		 else
		 	{
		 		$this->form_validation->set_rules('categoria_name', 'Nombre de la Categor&#237;a', 'required|min_length[3]|max_length[150]|trim');
		 	}

         $this->form_validation->set_rules('descripcion', 'Descripción', 'required|trim');

         $this->form_validation->set_message('required','El campo %s es obligatorio');

         
         if ($this->form_validation->run($this) == FALSE)
            {
            	$this->utils->template($this->_list(6),'cargar_data/servicio_categorias/modificar_servicio_categorias',$data_view,'Cargar Infraestructura','Servicio');                
            }
            else
            {
            	
                /*$categoria = array(
                                'nombre' => $this->input->post('categoria_name'),
                                'descripcion' => $this->input->post('descripcion'),      
                                );

            	$categoria_id = $this->general->update2('servicio_categoria',$categoria,array('categoria_id'=>$id_categoria));

            	if($categoria_id)
	            	{
	            		$this->session->set_flashdata('Success', 'La Categor&#237;a de Servicio ha sido Actualizada con Éxito');
	            		redirect(site_url('index.php/cargar_datos/servicio_categorias'));
	            	}
	               else
	            	{
	            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Actualizar la Categor&#237;a de Servicio');
	            		redirect(site_url('index.php/cargar_datos/servicio_categorias'));
	            	}*/

	            $categoria = array(
                                'nombre' => $this->input->post('categoria_name'),
                                'descripcion' => $this->input->post('descripcion'), 
                                'ruta_imagen' =>  $categoria->ruta_imagen,      
                                );


	            if ( $_FILES AND $_FILES['userfile']['name'] ) 
				{
	            	$config['upload_path'] = './assets/imagenes/servicio';
			        $config['allowed_types'] = 'jpg|png';
			        $config['max_size'] = '50';
			        $config['max_width']  = '140';
			        $config['max_height']  = '140';

			        $this->load->library('upload', $config);
			        
			        //verificamos si existen errores
			        if (!$this->upload->do_upload())
			        {
			            $data_view['mensaje'] = $this->upload->display_errors();
			            $this->utils->template($this->_list(6),'cargar_data/servicio_categorias/modificar_servicio_categorias',$data_view,'Cargar Infraestructura','Servicios');
			        }  
			        else
			        {
			        	$file_info = $this->upload->data();
			        	$ruta_imagen = 'assets/imagenes/servicio/'.$file_info['file_name'];
			        
						$categoria = array(
                                'nombre' => $this->input->post('categoria_name'),
                                'descripcion' => $this->input->post('descripcion'), 
                                'ruta_imagen' => $ruta_imagen,     
                                );
			        	

			        	$categoria_id = $this->general->update2('servicio_categoria',$categoria,array('categoria_id'=>$id_categoria));

		            	if($categoria_id)
			            	{
			            		$this->session->set_flashdata('Success', 'La Categor&#237;a de Servicio ha sido Actualizada con Éxito');
			            		redirect(site_url('index.php/cargar_datos/servicio_categorias'));
			            	}
			               else
			            	{
			            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Actualizar la Categor&#237;a de Servicio');
			            		redirect(site_url('index.php/cargar_datos/servicio_categorias'));
			            	}
			        }
		       }
		       else
		       {
			       $categoria_id = $this->general->update2('servicio_categoria',$categoria,array('categoria_id'=>$id_categoria));

		            	if($categoria_id)
			            	{
			            		$this->session->set_flashdata('Success', 'La Categor&#237;a de Servicio ha sido Actualizada con Éxito');
			            		redirect(site_url('index.php/cargar_datos/servicio_categorias'));
			            	}
			               else
			            	{
			            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Actualizar la Categor&#237;a de Servicio');
			            		redirect(site_url('index.php/cargar_datos/servicio_categorias'));
			            	}

		       }
	            	
                
            }


	}

	public function eliminar_servicio_categoria(){

		$this->load->model('general/general_model','general');
		$id_categoria = $this->input->post('categoria_id');
		$delete = $this->general->delete('servicio_categoria',array('categoria_id'=>$id_categoria));
		if($delete)
	        {
				$this->session->set_flashdata('Success', 'La Categor&#237;a de Servicio ha sido Eliminada con Éxito');
			}
		else
			{
				$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Eliminar la Categor&#237;a de Servicio');
			}
		if($this->input->post('delete_ver'))
			{
				redirect(site_url('index.php/cargar_datos/servicio_categorias'));
			}	
	}


	public function eliminar_servicio_categorias(){

		$this->load->model('general/general_model','general');
		$categorias_id = $this->input->post('categoria_id');
		foreach ($categorias_id as $categoria) {		    
			    
			   $delete = $this->general->delete('servicio_categoria',array('categoria_id'=>$categoria));
			}
		if($delete)
	        {
				$this->session->set_flashdata('Success', 'Las Categor&#237;as de Servicio han sido Eliminadas con Éxito');
			}
		else
			{
				$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Eliminar las Categor&#237;as de Servicio Seleccionadas');
			}

			
	}


	/*
	 * FIN de Funciones para Categoria de Servicio
	 *
	 */




	/*
	 * Funciones para Tipos de Servicio
	 *
	 */


	public function servicio_tipos(){
		$this->load->model('general/general_model','general');
		$data_view['servicio_tipos'] = $this->general->get_table('servicio_tipo');
		$this->utils->template($this->_list(6),'cargar_data/servicio_tipos/main_servicio_tipos',$data_view,'Cargar Infraestructura','Servicio');
	}

	function tipo_name_check()
	{
		if (($this->general->exist('servicio_tipo',array('nombre' => $this->input->post('tipo_name')))))
		{
			$this->form_validation->set_message('tipo_name_check', 'Este Tipo de Servicio ya existe en el Sistema');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}


	public function nuevo_servicio_tipo(){
		 

		$this->load->model('general/general_model','general');


		 $this->load->library('form_validation');
		 $this->load->helper(array('form', 'url'));
         $this->form_validation->set_rules('tipo_name', 'Nombre de Tipo de Servicio', 'required|min_length[3]|max_length[150]|trim|callback_tipo_name_check');
         $this->form_validation->set_rules('descripcion', 'Descripción', 'required|trim');

         $this->form_validation->set_message('required','El campo %s es obligatorio');
         
         if ($this->form_validation->run($this) == FALSE)
            {

                $this->utils->template($this->_list(6),'cargar_data/servicio_tipos/nuevo_servicio_tipos','','Cargar Infraestructura','Servicio');
            }
            else
            {
            	
                $tipo = array(
                                'nombre' => $this->input->post('tipo_name'),
                                'descripcion' => $this->input->post('descripcion'),       
                                );

            	$id_tipo = $this->general->insert('servicio_tipo',$tipo,'');

            	if($id_tipo)
	            	{
	            		$this->session->set_flashdata('Success', 'El Nuevo Tipo de Servicio ha sido Creado con Éxito');
	            		redirect(site_url('index.php/cargar_datos/servicio_tipos'));
	            	}
	            else
	            	{
	            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Crear el Nuevo Tipo de Servicio');
	            		redirect(site_url('index.php/cargar_datos/servicio_tipos'));
	            	}
                
            }


	}

	public function ver_servicio_tipo($id_tipo = ''){

		$this->load->model('general/general_model','general');	
		$data_view['servicio_tipo'] = $this->general->get_row('servicio_tipo',array('tipo_id'=>$id_tipo));
		$this->utils->template($this->_list(6),'cargar_data/servicio_tipos/ver_servicio_tipos',$data_view,'Cargar Infraestructura','Servicio');

	}


	public function modificar_servicio_tipo($id_tipo = ''){
		 

		$this->load->model('general/general_model','general');
		 
		$data_view['servicio_tipo'] = $this->general->get_row('servicio_tipo',array('tipo_id'=>$id_tipo));


		 $this->load->library('form_validation');
		 $this->load->helper(array('form', 'url'));
		 $tipo = $this->general->get_row('servicio_tipo',array('tipo_id' => $id_tipo));

		  if( ($this->input->post('tipo_name')) != ($tipo->nombre))
		 	{
         		$this->form_validation->set_rules('tipo_name', 'Nombre del Tipo de Servicio', 'required|min_length[3]|max_length[150]|trim|callback_tipo_name_check');
		 	}
		 else
		 	{
		 		$this->form_validation->set_rules('tipo_name', 'Nombre del Tipo de Servicio', 'required|min_length[3]|max_length[150]|trim');
		 	}

         $this->form_validation->set_rules('descripcion', 'Descripción', 'required|trim');

         $this->form_validation->set_message('required','El campo %s es obligatorio');

         
         if ($this->form_validation->run($this) == FALSE)
            {
            	$this->utils->template($this->_list(6),'cargar_data/servicio_tipos/modificar_servicio_tipos',$data_view,'Cargar Infraestructura','Servicio');                
            }
            else
            {
            	
                $tipo = array(
                                'nombre' => $this->input->post('tipo_name'),
                                'descripcion' => $this->input->post('descripcion'),      
                                );

            	$tipo_id = $this->general->update2('servicio_tipo',$tipo,array('tipo_id'=>$id_tipo));

            	if($tipo_id)
	            	{
	            		$this->session->set_flashdata('Success', 'El Tipo de Servicio ha sido Actualizado con Éxito');
	            		redirect(site_url('index.php/cargar_datos/servicio_tipos'));
	            	}
	               else
	            	{
	            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Actualizar el Tipo de Servicio');
	            		redirect(site_url('index.php/cargar_datos/servicio_tipos'));
	            	}
	            	
                
            }


	}

		public function eliminar_servicio_tipo(){

		$this->load->model('general/general_model','general');
		$id_tipo = $this->input->post('tipo_id');
		$delete = $this->general->delete('servicio_tipo',array('tipo_id'=>$id_tipo));
		if($delete)
	        {
				$this->session->set_flashdata('Success', 'El Tipo de Servicio ha sido Eliminado con Éxito');
			}
		else
			{
				$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Eliminar el Tipo de Servicio');
			}
		if($this->input->post('delete_ver'))
			{
				redirect(site_url('index.php/cargar_datos/servicio_tipos'));
			}	
	}


	public function eliminar_servicio_tipos(){

		$this->load->model('general/general_model','general');
		$tipos_id = $this->input->post('tipo_id');
		foreach ($tipos_id as $tipo) {		    
			    
			  $delete = $this->general->delete('servicio_tipo',array('tipo_id'=>$tipo));
			}
		if($delete)
	        {
				$this->session->set_flashdata('Success', 'Los Tipos de Servicio han sido Eliminados con Éxito');
			}
		else
			{
				$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Eliminar los Tipos de Servicio Seleccionados');
			}

			
	}



	/*
	 * FIN de Funciones para Tipos de Servicio
	 *
	 */





	/*
	 * Funciones para Proveedores
	 *
	 */



	public function servicio_proveedores(){
		$this->load->model('general/general_model','general');
		$data_view['servicio_proveedores'] = $this->general->get_table('servicio_proveedor');
		$this->utils->template($this->_list(6),'cargar_data/servicio_proveedores/main_servicio_proveedores',$data_view,'Cargar Infraestructura','Servicio');
	}

	function proveedor_name_check()
	{
		if (($this->general->exist('servicio_proveedor',array('nombre' => $this->input->post('proveedor_name')))))
		{
			$this->form_validation->set_message('proveedor_name_check', 'Este Proveedor de Servicio ya existe en el Sistema');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	function dropdown_tipo_proveedor()
	{
		if ($this->input->post('tipo_proveedor') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_tipo_proveedor', 'Por favor seleccione un Tipo de Proveedor');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

	function dropdown_proveedor_interno()
	{
		if ($this->input->post('proveedor_interno') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_proveedor_interno', 'Por favor seleccione un Proveedor Interno');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

	public function nuevo_servicio_proveedor(){
		 

		$this->load->model('general/general_model','general');


		$departamentos =  $this->general->get_table('departamento');
		foreach($departamentos as $key => $departamento)
			{ 
			    
			    if($this->general->exist('servicio_proveedor',array('nombre' => $departamento->nombre)))
			    {
			    	unset($departamentos[$key]);
			    }
			}

		$data_view['departamentos'] = $departamentos;

		 $this->load->library('form_validation');
		 $this->load->helper(array('form', 'url'));

         $this->form_validation->set_rules('tipo_proveedor', 'Tipo de Proveedor', 'required|trim|callback_dropdown_tipo_proveedor');
         $this->form_validation->set_rules('descripcion', 'Descripción', 'required|trim');
         
         if($this->input->post('tipo_proveedor') == 'Proveedor Externo')
         	{
         		$this->form_validation->set_rules('proveedor_name', 'Nombre del Proveedor', 'required|min_length[3]|max_length[150]|trim|callback_proveedor_name_check');
         	}
         if($this->input->post('tipo_proveedor') == 'Proveedor Interno')
         	{	
         		$this->form_validation->set_rules('proveedor_interno', 'Proveedor Interno', 'required|trim|callback_dropdown_proveedor_interno');
         	}
         
         $this->form_validation->set_message('required','El campo %s es obligatorio');
         
         if ($this->form_validation->run($this) == FALSE)
            {

                $this->utils->template($this->_list(6),'cargar_data/servicio_proveedores/nuevo_servicio_proveedores',$data_view,'Cargar Infraestructura','Servicio');
            }
            else
            {
            	 if($this->input->post('tipo_proveedor') == 'Proveedor Externo')
		         	{
		         		$nombre = $this->input->post('proveedor_name');
		         	}
		         if($this->input->post('tipo_proveedor') == 'Proveedor Interno')
		         	{	
		         		$nombre = $this->input->post('proveedor_interno');
		         	}
                $proveedor = array(
                				'nombre' => $nombre,
                                'descripcion' => $this->input->post('descripcion'),
                                'tipo' => $this->input->post('tipo_proveedor'),       
                                );

            	$id_proveedor = $this->general->insert('servicio_proveedor',$proveedor,'');

            	if($id_proveedor)
	            	{
	            		$this->session->set_flashdata('Success', 'La Nueva Categor&#237;a de Servicio ha sido Creada con Éxito');
	            		redirect(site_url('index.php/cargar_datos/servicio_proveedores'));
	            	}
	            else
	            	{
	            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Crear la Nueva Categor&#237;a de Servicio');
	            		redirect(site_url('index.php/cargar_datos/servicio_proveedores'));
	            	}
                
            }


	}

	public function ver_servicio_proveedor($id_proveedor = ''){

		$this->load->model('general/general_model','general');	
		$data_view['servicio_proveedor'] = $this->general->get_row('servicio_proveedor',array('proveedor_id'=>$id_proveedor));
		$this->utils->template($this->_list(6),'cargar_data/servicio_proveedores/ver_servicio_proveedores',$data_view,'Cargar Infraestructura','Servicio');

	}

	public function modificar_servicio_proveedor($id_proveedor = ''){
		 

		$this->load->model('general/general_model','general');
		 
		$data_view['servicio_proveedor'] = $this->general->get_row('servicio_proveedor',array('proveedor_id'=>$id_proveedor));


		 $this->load->library('form_validation');
		 $this->load->helper(array('form', 'url'));
		 $proveedor = $this->general->get_row('servicio_proveedor',array('proveedor_id' => $id_proveedor));

		  if( ($this->input->post('proveedor_name')) != ($proveedor->nombre))
		 	{
         		$this->form_validation->set_rules('proveedor_name', 'Nombre del Proveedor de Servicio', 'required|min_length[3]|max_length[150]|trim|callback_proveedor_name_check');
		 	}
		 else
		 	{
		 		$this->form_validation->set_rules('proveedor_name', 'Nombre del Proveedor de Servicio', 'required|min_length[3]|max_length[150]|trim');
		 	}

         $this->form_validation->set_rules('descripcion', 'Descripción', 'required|trim');

         $this->form_validation->set_message('required','El campo %s es obligatorio');

         
         if ($this->form_validation->run($this) == FALSE)
            {
            	$this->utils->template($this->_list(6),'cargar_data/servicio_proveedores/modificar_servicio_proveedores',$data_view,'Cargar Infraestructura','Servicio');                
            }
            else
            {
            	
                $proveedor = array(
                                'nombre' => $this->input->post('proveedor_name'),
                                'descripcion' => $this->input->post('descripcion'),      
                                );

            	$proveedor_id = $this->general->update2('servicio_proveedor',$proveedor,array('proveedor_id'=>$id_proveedor));

            	if($proveedor_id)
	            	{
	            		$this->session->set_flashdata('Success', 'El Proveedor de Servicio ha sido Actualizado con Éxito');
	            		redirect(site_url('index.php/cargar_datos/servicio_proveedores'));
	            	}
	               else
	            	{
	            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Actualizar el Proveedor de Servicio');
	            		redirect(site_url('index.php/cargar_datos/servicio_proveedores'));
	            	}
	            	
                
            }


	}


	public function eliminar_servicio_proveedor(){

		$this->load->model('general/general_model','general');
		$id_proveedor = $this->input->post('proveedor_id');
		$delete = $this->general->delete('servicio_proveedor',array('proveedor_id'=>$id_proveedor));
		if($delete)
	        {
				$this->session->set_flashdata('Success', 'El proveedor de Servicio ha sido Eliminado con Éxito');
			}
		else
			{
				$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Eliminar el Proveedor de Servicio');
			}
		if($this->input->post('delete_ver'))
			{
				redirect(site_url('index.php/cargar_datos/servicio_proveedores'));
			}	
	}


	public function eliminar_servicio_proveedores(){

		$this->load->model('general/general_model','general');
		$proveedors_id = $this->input->post('proveedor_id');
		foreach ($proveedors_id as $proveedor) {		    
			    
			 $delete = $this->general->delete('servicio_proveedor',array('proveedor_id'=>$proveedor));
			}
		if($delete)
	        {
				$this->session->set_flashdata('Success', 'Los Proveedores de Servicio han sido Eliminados con Éxito');
			}
		else
			{
				$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Eliminar los Proveedores de Servicio Seleccionados');
			}

			
	}



	/*
	 * FIN de Funciones para Proveedores
	 *
	 */



	/*
	 * Funciones para Procesos de Negocio
	 *
	 */


	public function procesoNegocio(){
		$this->load->model('general/general_model','general');
		$data_view['proceso_negocio'] = $this->general->get_table('proceso_negocio');
		$data_view['departamentos'] = $this->general->get_table('departamento');
		$this->utils->template($this->_list(5),'cargar_data/procesos_negocio/main_procesos_negocio',$data_view,'Cargar Infraestructura','Procesos de Negocio');
	}

	function name_check()
	{
		if (($this->general->exist('proceso_negocio',array('nombre' => $this->input->post('process_name')))))
		{
			$this->form_validation->set_message('name_check', 'Este Proceso de Negocio ya existe en el Sistema');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}


	public function nuevoProcesoNegocio(){
		 

		$this->load->model('general/general_model','general');
		 

		$data_view['departamentos'] = $this->general->get_table('departamento');


		 $this->load->library('form_validation');
		 $this->load->helper(array('form', 'url'));
         $this->form_validation->set_rules('process_name', 'Nombre', 'required|min_length[3]|max_length[150]|trim|callback_name_check');
         $this->form_validation->set_rules('descripcion', 'Descripción', 'required|trim');
         $this->form_validation->set_rules('departamentos', 'Departamento', 'alpha_numeric');

         $this->form_validation->set_message('required','El campo %s es obligatorio');
         $this->form_validation->set_message('alpha_numeric','Por favor Seleccione un Departamento');

         
         if ($this->form_validation->run($this) == FALSE)
            {

                $this->utils->template($this->_list(5),'cargar_data/procesos_negocio/nuevo_proceso_negocio',$data_view,'Cargar Infraestructura','Procesos de Negocio');
            }
            else
            {
            	
                $proceso = array(
                                'nombre' => $this->input->post('process_name'),
                                'descripcion' => $this->input->post('descripcion'),                             
                                'id_departamento' => $this->input->post('departamentos'),
                                );

            	$id_proceso = $this->general->insert('proceso_negocio',$proceso,'');

            	if($id_proceso)
	            	{
	            		$this->session->set_flashdata('Success', 'El Nuevo Proceso de Negocio ha sido Creado con Éxito');
	            		redirect(site_url('index.php/cargar_datos/procesos_de_negocio'));
	            	}
	            else
	            	{
	            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Crear el Nuevo Proceso de Negocio');
	            		redirect(site_url('index.php/cargar_datos/procesos_de_negocio'));
	            	}
                
            }


	}

	public function modificarProcesoNegocio($id_proceso = ''){
		 

		$this->load->model('general/general_model','general');
		 
		$data_view['proceso'] = $this->general->get_row('proceso_negocio',array('procesoneg_id'=>$id_proceso));	
		$data_view['departamentos'] = $this->general->get_table('departamento');


		 $this->load->library('form_validation');
		 $this->load->helper(array('form', 'url'));
		 $proceso = $this->general->get_row('proceso_negocio',array('procesoneg_id' => $id_proceso));

		  if( ($this->input->post('process_name')) != ($proceso->nombre))
		 	{
         		$this->form_validation->set_rules('process_name', 'Nombre', 'required|min_length[3]|max_length[150]|trim|callback_name_check');
		 	}
		 else
		 	{
		 		$this->form_validation->set_rules('process_name', 'Nombre', 'required|min_length[3]|max_length[150]|trim');
		 	}
         $this->form_validation->set_rules('descripcion', 'Descripción', 'required|trim');
         $this->form_validation->set_rules('departamentos', 'Departamento', 'alpha_numeric');

         $this->form_validation->set_message('required','El campo %s es obligatorio');
         $this->form_validation->set_message('alpha_numeric','Por favor Seleccione un Departamento');

         
         if ($this->form_validation->run($this) == FALSE)
            {
            	$this->utils->template($this->_list(5),'cargar_data/procesos_negocio/modificar_proceso_negocio',$data_view,'Cargar Infraestructura','Procesos de Negocio');                
            }
            else
            {
            	
                $proceso = array(
                                'nombre' => $this->input->post('process_name'),
                                'descripcion' => $this->input->post('descripcion'),                             
                                'id_departamento' => $this->input->post('departamentos'),
                                );

            	$proceso_id = $this->general->update2('proceso_negocio',$proceso,array('procesoneg_id'=>$id_proceso));

            	if($proceso_id)
	            	{
	            		$this->session->set_flashdata('Success', 'El Proceso de Negocio ha sido Actualizado con Éxito');
	            		redirect(site_url('index.php/cargar_datos/procesos_de_negocio'));
	            	}
	            else
	            	{
	            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Actualizar el Proceso de Negocio');
	            		redirect(site_url('index.php/cargar_datos/procesos_de_negocio'));
	            	}
	            	
                
            }


	}

	public function verProcesoNegocio($id_proceso = ''){

		//$data_view['id_proceso'] = $id_proceso;
		$this->load->model('general/general_model','general');
		$data_view['proceso'] = $this->general->get_row('proceso_negocio',array('procesoneg_id'=>$id_proceso));		
		$data_view['departamentos'] = $this->general->get_table('departamento');
		$this->utils->template($this->_list(5),'cargar_data/procesos_negocio/ver_proceso_negocio',$data_view,'Cargar Infraestructura','Procesos de Negocio');

	}


	public function eliminarProcesoNegocio(){

		$this->load->model('general/general_model','general');
		$id_proceso = $this->input->post('proceso_id');
		$delete = $this->general->delete('proceso_negocio',array('procesoneg_id'=>$id_proceso));
	
		if($delete)
	        {
				$this->session->set_flashdata('Success', 'El Proceso de Negocio ha sido Eliminado con Éxito');
			}
		else
			{
				$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Eliminar el Proceso de Negocio');
			}
		if($this->input->post('delete_ver'))
			{
				redirect(site_url('index.php/cargar_datos/procesos_de_negocio'));
			}	
		
	}

	public function eliminarProcesosNegocio(){

		$this->load->model('general/general_model','general');
		$procesos_id = $this->input->post('proceso_id');
		foreach ($procesos_id as $proceso) {		    
			    
			   $delete = $this->general->delete('proceso_negocio',array('procesoneg_id'=>$proceso));
		}

		if($delete)
	        {
				$this->session->set_flashdata('Success', 'Los Procesos de Negocio han sido Eliminados con Éxito');
			}
		else
			{
				$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Eliminar los Procesos de Negocio Seleccionados');
			}
		
	}


		public function procesos_negocio_soporte($servicio_id = ''){

		$this->load->model('general/general_model','general');
		$data_view['servicios'] = $this->general->get_table('servicio');
		$data_view['procesos_negocio'] = $this->general->get_table('proceso_negocio');

		if(!empty($servicio_id)) { 
		 $data_view['servicio_id'] = $servicio_id;
		 $data_view['servicio_actual'] = $servicio_id;

				$data_view['procesos_soportados'] = array();

				if($this->general->exist('proceso_negocio_soporte',array('servicio_id'=> $servicio_id)))
		            {
		            	$data_view['procesos_soportados'] = $this->general->get_result('proceso_negocio_soporte',array('servicio_id'=> $servicio_id)); 
		            }
		}


		if($this->input->post('servicios'))
			{
				$data_view['servicio_actual'] = $this->input->post('servicios');

				$data_view['procesos_soportados'] = array();

				if($this->general->exist('proceso_negocio_soporte',array('servicio_id'=> $this->input->post('servicios'))))
		            {
		            	$data_view['procesos_soportados'] = $this->general->get_result('proceso_negocio_soporte',array('servicio_id'=> $this->input->post('servicios'))); 
		            }
			}

   		if($this->input->post('servicios') == 'seleccione')
            {
            	unset($data_view['servicio_actual']);
            }


        $this->form_validation->set_rules('servicios', 'Servicios', 'callback_dropdown_servicio');

	    if ($this->form_validation->run($this) == FALSE)
          {
             	$this->utils->template($this->_list(6),'cargar_data/procesos_negocio/procesos_negocio_soportados',$data_view,'Cargar Infraestructura','Servicio');             
          }
        else
          {
            	$this->utils->template($this->_list(6),'cargar_data/procesos_negocio/procesos_negocio_soportados',$data_view,'Cargar Infraestructura','Servicio');
          } 



       if ($this->input->post('procesos_soportados'))
        {
	       	foreach ($this->input->post('procesos_soportados') as $key => $proceso_soportado)
	       	{
	       		
	       		$soporte = false;
	       		if( !($this->general->exist('proceso_negocio_soporte',array('proceso_id'=> $proceso_soportado,'servicio_id'=> $this->input->post('servicios')))) )
	       		{
	       		  $proceso_soporte = array(
	                                'servicio_id' => $this->input->post('servicios'),
	                                'proceso_id' => $proceso_soportado,  
	                                );

	            	$this->general->insert('proceso_negocio_soporte',$proceso_soporte,'');
	            }
	             if(($this->general->exist('proceso_negocio_soporte',array('proceso_id'=> $proceso_soportado,'servicio_id'=> $this->input->post('servicios')))) )
	       		{
	       			$soporte = true;
	       		}
	       	}

	       		if($soporte)
		        {
					$this->session->set_flashdata('Success', 'Los Procesos de Negocio Seleccionados han sido Agregados con Éxito');
					redirect(site_url('index.php/cargar_datos/procesos_de_negocio_soportados/'.$this->input->post('servicios')));
				}
				else
				{
					$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Agregar los Procesos de Negocio Seleccionados');
					redirect(site_url('index.php/cargar_datos/procesos_de_negocio_soportados/'.$this->input->post('servicios')));
				}
       }

        if ($this->input->post('lista_procesos'))
        {
	       	foreach ($this->input->post('lista_procesos') as $key => $lista_proceso)
	       	{
	       		
	       		$soporte = false;
	       		if(($this->general->exist('proceso_negocio_soporte',array('proceso_id'=> $lista_proceso,'servicio_id'=> $this->input->post('servicios')))) )
	       		{

	            	$this->general->delete('proceso_negocio_soporte',array('proceso_id'=> $lista_proceso,'servicio_id'=> $this->input->post('servicios')));
	            }
	             if(!($this->general->exist('proceso_negocio_soporte',array('proceso_id'=> $lista_proceso,'servicio_id'=> $this->input->post('servicios')))) )
	       		{
	       			$soporte = true;
	       		}
	       	}

	       

	       		if($soporte)
		        {
					$this->session->set_flashdata('Success', 'Los Procesos de Negocio Seleccionados han sido Removidos con Éxito');
					redirect(site_url('index.php/cargar_datos/procesos_de_negocio_soportados/'.$this->input->post('servicios')));
				}
				else
				{
					$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Remover los Procesos de Negocio Seleccionados');
					redirect(site_url('index.php/cargar_datos/procesos_de_negocio_soportados/'.$this->input->post('servicios')));
				}
       }
		  
	}


	/*
	 * FIN de Funciones para Servicios
	 *
	 */





	/**
	 * Configuraciones para el maint_content  del servicio
	 * @param  Boolean $actualizado Índica si despliega o no el msj de actualizado
	 * @param  Boolean $guardado    Índica si despliega o no el msj de guardado
	 * @param  Boolean $filtrado    Índica si despliega o no el msj de filtrado
	 * @param  Integer $cur_page    Página actual
	 * @param  Integer $per_page 	Número de item por página
	 * @param  Array   $data_filtro Posee la siguiente forma
	 *      Array(
	 *         	'accion' => todos|filtrar,
	 *          'operacion'=>todos|nombre|USR|SYS,
	 *          'genera_ingresos'=> 0|1,
	 *         	'info' => String		
	 *      )
	 * @param $p_get Parámetros en formato GET, sólo usado para el caso de filtrado.
	 * @return Array   Config. del main_content
	 */


	private function  _config_service($actualizado, $guardado,$filtrado, $cur_page,
		$per_page,$data_filtro,$p_get=NULL){
		/**
		 * Contiene las configuraciones de main_content
		 * @var $mc
		 */
		$mc['actualizado'] = $actualizado;
		$mc['guardado'] = $guardado;
		$mc['cur_page'] = $cur_page;
		$mc['filtrado'] = $filtrado;

		switch ($data_filtro['accion']) {
			case 'todos':
				$l = $this->basico_model->all_servicio();
				break;
			//Filtrar 
			case 'filtrar':
				$l = $this->basico_model->all_servicio($data_filtro);
				break;

		}
		$config_pag = array(
			'total_rows' => $l['total_rows'],
			'per_page' => $per_page,
			'cur_page' => $cur_page,
			'p_get'=>$p_get
			);

		$mc['config_pag'] = $config_pag;
		$mc['list_servicio'] = $l['data'];

		return $mc;
	}
	

	/**
	 * Dada la categoría se obtiene una lista de las unidades de medida correspondientes
	 * @param  Integer $id_categoria ID del maestro de categoría
	 * @return 
	 */
	public function medidas_capacidad_ajax($id_categoria){
		$unidades = $this->basico_model->unidades_medida_capacidad($id_categoria);
		$cad_options = "";
		foreach ($unidades as $uni) {
			$cad_options .= '<option value = "'. $uni['ma_unidad_medida_id'] .'" data-nivel = "'. 
			$uni['valor_nivel'].'" >' . $uni['abrev_nombre'].'</option> ';
		}
		echo $cad_options;//Se envía a la función App
	}

	/**
	 * Genera las configuraciones para listar los Componentes de TI.
	 * Es usada en componentes_ti[list,guardado].
	 * 
	 * @param Integer $per_page Cantidad de items por página. Debe ser un número par
	 * @param Boolean $guardado_exitoso Si es usado en 'list' deber ser false y
	 * si es 'guardado' debe ser true.
	 * @param Integer $cur_page Número de página actual. Es obtenido a través de la URI. En 
	 * el caso de guardado se debe pasar el valor de 1.
	 * @param Array $data_origin Identifica la acción a ejecutar en la consulta de los
	 * componentes de ti y las opciones de filtrado que tendrá. Posee la siguiente forma:
	 *
	 * array ('accion' => 'all|categoria|nombre',
	 * 		 'campo_buscar' => 'algun dato como filtro'
	 * )
	 * @param $p_get Parámetros en formato GET, sólo usado para el caso de filtrado.
	 * @param  Boolean $actualizado_exitoso Indica si viene de actualizar o no.
	 * @return Array Una array asociativo con las configuraciones. 
	 */
	private function _config_comp_ti($per_page, $guardado_exitoso,
		$cur_page,$data_origin,$p_get,$actualizado_exitoso=false){

		$params_main_content['guardado_exitoso'] = $guardado_exitoso;
		$params_main_content['actualizado_exitoso'] = $actualizado_exitoso;
		
		//listando los componente de ti
		switch ($data_origin['accion']) {
			case 'all':
				$l = $this->basico_model->all_componentes_ti('all');
				break;
			case 'categoria':
				$l = $this->basico_model->all_componentes_ti('categoria',$data_origin['campo_buscar']);
				break;
			case 'nombre':
				$l = $this->basico_model->all_componentes_ti('nombre',$data_origin['campo_buscar']);
				break;
			
		}
		$params_main_content['list_comp_ti'] = $l['list_comp_ti'];
		
		//Configuraciones de paginación
		$total_rows =  $l['num_rows_comp_ti'];//total componentes de ti
		$first_row_id = $this->utilities_model->first_row('componente_ti','componente_ti_id');

		//per_page: Número de componentes de ti por página (debe ser par)
		$componente_ti = array( 
			'total_rows' => $total_rows,
			'per_page' => $per_page,
			'cur_page' => $cur_page,
			'p_get' => $p_get
			);
		
		$params_main_content['config_pag'] = $componente_ti;
		
		//Organización
		$params_main_content['org'] = $this->utilities_model->first_row('organizacion','organizacion_id');
		return $params_main_content;
	}

	/**
	 * Genera la lista de ítems para colocarlos en el menú izquierdo
	 * @param $index_active Índice del ítem activo.
	 * @return array
	 */
	private function _list(){
		$l =  array();

			$l[] = array(
			"chain" => "Inicio",
			"href" => site_url(''),
			"active" => false,
			"icon" => "fa fa-flag"
		);

		/*$l[] = array(
			"chain" => "Descripción",
			"active" => false,
			"href" => site_url("index.php/cargar_datos"),
			"icon" => "fa fa-bar-chart-o"
		
		);*/
		$l[] = array(
			"chain" => "Básico",
			"active" => false,
			"href" => site_url("index.php/cargar_datos/basico"),
			"icon" => "fa fa-cog"
		
		);

		$l[] = array(
			"chain" => "Componentes de TI",
			"active" => false,
			"href" => site_url("index.php/cargar_datos/componentes_ti/1"),
			"icon" => "fa fa-desktop"
		
		);

		$l[] = array(
			"chain" => "Departamentos",
			"active" => false,
			"href" => site_url("index.php/cargar_datos/departamentos/1"),
			"icon" => "fa fa-sitemap"
		
		);

		$l[] = array(
			"chain" => "Procesos de Negocio",
			"active" => false,
			"href" => site_url("index.php/cargar_datos/procesos_de_negocio"),
			"icon" => "fa fa-building-o"
		);


		$sublista = array
		(
			array
			(
				'chain' => 'Principal',
				'href' => site_url('index.php/continuidad')
			),
			array
			(
				'chain' => 'Plan de continuidad del negocio',
				'href' => site_url('index.php/continuidad/listado_pcn')
			),
			array
			(
				'chain' => 'Gestión de riesgos y amenazas',
				'href' => site_url('index.php/continuidad/gestion_riesgos')
			)
		);
		$l[] = array(
			"chain" => "Servicios",
			"active" => false,
			"href" => site_url("index.php/cargar_datos/servicios"),
			"icon" => "fa fa-list",
			"list"=> $sublista
		);

		


		$l[] = array(
			"chain" => "Procesos de Servicio",
			"active" => false,
			"href" => site_url("index.php/cargar_datos/servicio_procesos"),
			"icon" => "fa fa-cogs"
		);
		
		$l[] = array(
			"chain" => "Personal",
			"active" => false,
			"href" => site_url("index.php/cargar_datos/personal"),
			"icon" => "fa fa-user"
		);


		$l[] = array(
			"chain" => "Umbrales de Servicio",
			"active" => false,
			"href" => site_url("index.php/cargar_datos/umbrales"),
			"icon" => "fa fa-arrows-v"
		);



		//$l[$index_active]["active"] = true; //Colocar el ítem activo
		return $l;
	}//end of function: _list
	
	public function cargar_personal($id_departamento = '')
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 6);
		$view['nivel'] = 6;
		$vista = ($permiso) ? 'personal' : 'personal_sinpermiso';
		
		$this->load->model('general/general_model','general');
		$id = '';
		if(!empty($id_departamento)) $id = $id_departamento;
		if(isset($_POST['id_departamento'])) $id = $_POST['id_departamento'];
		if(!empty($id))
		{
			$view['id_departamento'] = $id;
			$view['dpto_actual'] = $this->general->get_row('departamento',array('departamento_id'=>$id));
			$view['personal'] = $this->basico_model->get_personal_bydepto($id);
		}
		$view['departamentos'] = $this->general->get_table('departamento');
		$this->utils->template($this->_list(8),'cargar_data/'.$vista,$view,'Cargar personal','Personal de la organización');
	}
	
	public function agregar_personal($id_departamento = '')
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 7);
		$view['nivel'] = 7;
		$vista = ($permiso) ? 'personal_add' : 'personal_sinpermiso';
		
		if(!empty($id_departamento))
		{
			$this->load->model('general/general_model','general');
			if($_POST)
			{
				$post = $_POST;
				// DELIMITADOR DE ERROR DEL FORM VALIDATION
				$this->form_validation->set_error_delimiters('<div class="alert alert-danger">',
				'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
				
				// REGLAS DEL FORM VALIDATION
				if($post['id_personal'])
				{
					$this->form_validation->set_rules('codigo_empleado','<strong>Código</strong>','required|xss_clean');
					$this->form_validation->set_rules('cedula','<strong>Cédula/Pasaporte</strong>','required|xss_clean');
					$this->form_validation->set_rules('email_personal','<strong>Email personal</strong>','required|valid_email|xss_clean');
					$this->form_validation->set_rules('tlfn_personal','<strong>Teléfono personal</strong>','required|xss_clean');
				}else
				{
					$this->form_validation->set_rules('codigo_empleado','<strong>Código</strong>','required|xss_clean|is_unique[personal.codigo_empleado]');
					$this->form_validation->set_rules('cedula','<strong>Cédula/Pasaporte</strong>','required|xss_clean|is_unique[personal.cedula]');
					$this->form_validation->set_rules('email_personal','<strong>Email personal</strong>','required|valid_email|xss_clean|is_unique[personal.email_personal]');
					$this->form_validation->set_rules('tlfn_personal','<strong>Teléfono personal</strong>','required|xss_clean|is_unique[personal.tlfn_personal]');
					$this->form_validation->set_message('is_unique', 'No es posible crear un duplicado para el campo %s');
				}
				$this->form_validation->set_rules('nombre','<strong>Nombre</strong>','required|xss_clean');
				$this->form_validation->set_rules('apellido','<strong>Apellido</strong>','required|xss_clean');
				$this->form_validation->set_rules('cargo','<strong>Cargo</strong>','required|xss_clean');
				$this->form_validation->set_rules('email_corporativo','<strong>Email corporativo</strong>','valid_email|xss_clean');
				$this->form_validation->set_rules('tlfn_corporativo','<strong>Teléfono corporativo</strong>','xss_clean');
				$this->form_validation->set_rules('fechaingreso_empresa','<strong>Fecha Ingreso</strong>','required|xss_clean');
				
				if($this->form_validation->run($this))
				{
					$post['nombre'] = ucwords($post['nombre'].' '.$post['apellido']);
					unset($post['apellido']);
					$post['fechaingreso_empresa'] = date('Y-m-d H:i:s',strtotime($post['fechaingreso_empresa']));
					
					if($post['id_personal'])
					{
						if($this->general->update('personal',$post,array('id_personal'=>$post['id_personal'])))
							$this->session->set_flashdata('alert_success','Los datos del empleado han sido actualizado exitosamente');
						else $this->session->set_flashdata('alert_success','Ocurrió un problema actualizando los datos del empleado. Por favor intente más tarde o contacte a su administrador');
					}else
					{
						$post['fecha_creacion'] = date('Y-m-d H:i:s');
						$id_empleado = $this->general->insert('personal',$post);
						if($id_empleado) $this->session->set_flashdata('alert_success','El empleado ha sido ingresado exitosamente en este departamento');
						else $this->session->set_flashdata('alert_success','Ocurrió un problema ingresando el empleado en este departamento. Por favor intente más tarde o contacte a su administrador');
					}
					
					redirect(site_url('index.php/cargar_datos/personal/'.$post['id_departamento']));
				}
			}
			$view['departamento'] = $this->general->get_row('departamento',array('departamento_id'=>$id_departamento));
			$this->utils->template($this->_list(8),'cargar_data/'.$vista,$view,'Cargar personal','Agregar personal');
		}else
		{
			$this->session->set_flashdata('alert_error','Parece que existe un problema con el departamento al que intenta acceder. Por favor contacte a su administrador');
			redirect(site_url('index.php/cargar_datos/personal'));
		}
	}
	
	// public function guardar_empleado()
	// {
		// $this->load->module('general/general_model','general');
		// if($_POST)
		// {
			// $post = $_POST;
			// die_pre($post);
			// // DELIMITADOR DE ERROR DEL FORM VALIDATION
			// $this->form_validation->set_error_delimiters('<div class="alert alert-danger">',
			// '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
// 			
			// // REGLAS DEL FORM VALIDATION
			// if($post['id_personal'])
			// {
				// $this->form_validation->set_rules('codigo_empleado','<strong>Código</strong>','required|xss_clean');
				// $this->form_validation->set_rules('cedula','<strong>Cédula/Pasaporte</strong>','required|xss_clean');
				// $this->form_validation->set_rules('email_personal','<strong>Email personal</strong>','required|valid_email|xss_clean');
				// $this->form_validation->set_rules('tlfn_personal','<strong>Teléfono personal</strong>','required|xss_clean');
			// }else
			// {
				// $this->form_validation->set_rules('codigo_empleado','<strong>Código</strong>','required|xss_clean|is_unique[personal.codigo_empleado]');
				// $this->form_validation->set_rules('cedula','<strong>Cédula/Pasaporte</strong>','required|xss_clean|is_unique[personal.cedula]');
				// $this->form_validation->set_rules('email_personal','<strong>Email personal</strong>','required|valid_email|xss_clean|is_unique[personal.email_personal]');
				// $this->form_validation->set_rules('tlfn_personal','<strong>Teléfono personal</strong>','required|xss_clean|is_unique[personal.tlfn_personal]');
				// $this->form_validation->set_message('is_unique', 'No es posible crear un duplicado para el campo %s');
			// }
			// $this->form_validation->set_rules('nombre','<strong>Nombre</strong>','required|xss_clean');
			// $this->form_validation->set_rules('apellido','<strong>Apellido</strong>','required|xss_clean');
			// $this->form_validation->set_rules('cargo','<strong>Cargo</strong>','required|xss_clean');
			// $this->form_validation->set_rules('email_corporativo','<strong>Email corporativo</strong>','valid_email|xss_clean');
			// $this->form_validation->set_rules('tlfn_corporativo','<strong>Teléfono corporativo</strong>','xss_clean');
			// $this->form_validation->set_rules('fechaingreso_empresa','<strong>Fecha Ingreso</strong>','required|xss_clean');
// 			
// 			
			// if($this->form_validation->run($this))
			// {
// 				
				// $post['nombre'] = ucwords($post['nombre'].' '.$post['apellido']);
				// unset($post['apellido']);
				// $post['fechaingreso_empresa'] = date('Y-m-d H:i:s',strtotime($post['fechaingreso_empresa']));
// 				
				// if($post['id_personal'])
				// {
					// if($this->general->update('personal',$post,array('id_personal'=>$post['id_personal'])))
						// $this->session->set_flashdata('alert_success','Los datos del empleado han sido actualizado exitosamente');
					// else $this->session->set_flashdata('alert_success','Ocurrió un problema actualizando los datos del empleado. Por favor intente más tarde o contacte a su administrador');
				// }else
				// {
					// $post['fecha_creacion'] = date('Y-m-d H:i:s');
					// $id_empleado = $this->general->insert('personal',$post);
					// if($id_empleado) $this->session->set_flashdata('alert_success','El empleado ha sido ingresado exitosamente en este departamento');
					// else $this->session->set_flashdata('alert_success','Ocurrió un problema ingresando el empleado en este departamento. Por favor intente más tarde o contacte a su administrador');
				// }
// 
				// redirect(site_url('index.php/cargar_datos/personal/'.$post['id_departamento']));
			// }
			// // die_pre('antes de vista personal_add');
			// $view['departamento'] = $this->general->get_row('departamento',array('departamento_id'=>$post['id_departamento']));
			// $this->utils->template($this->_list(5),'cargar_data/personal_add',$view,'Cargar personal','Agregar personal');
		// }
		// // die_pre('no hay post');
		// redirect(site_url('index.php/cargar_datos/personal'));
	// }

	public function editar_personal($id_empleado = '')
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 8);
		$view['nivel'] = 8;
		$vista = ($permiso) ? 'personal_add' : 'personal_sinpermiso';
		$where['id_personal'] = $id_empleado;
		modules::run('general/exist_index','personal',$where,'cargar_datos/personal');
		
		$view['empleado'] = $this->general->get_row('personal',array('id_personal'=>$id_empleado));
		if(!empty($view['empleado']))
		{
			$nombre = explode(' ', $view['empleado']->nombre);
			$view['empleado']->nombre = current($nombre);
			$view['empleado']->apellido = end($nombre);
		}
		$view['departamento'] = $this->general->get_row('departamento',array('departamento_id'=>$view['empleado']->id_departamento));
		$this->utils->template($this->_list(8),'cargar_data/'.$vista,$view,'Cargar personal','Modificar personal');
	}
	
	public function eliminar_personal($id_empleado='')
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 9);
		$view['nivel'] = 9;
		$vista = ($permiso) ? 'personal_add' : 'personal_sinpermiso';
		$where['id_personal'] = $id_empleado;
		modules::run('general/exist_index','personal',$where,'cargar_datos/personal');
		
		if($vista != 'personal_sinpermiso')
		{
			if($this->general->delete('personal',$where)) $this->session->set_flashdata('alert_success','El empleado ha sido eliminado exitosamente');
			else $this->session->set_flashdata('alert_success','Ocurrió un problema al intentar eliminar al empleado. Por favor intente más tarde o contacte a su administrador');
		}
		if($vista == 'personal_sinpermiso') $this->utils->template($this->_list(8),'cargar_data/'.$vista,$view,'Cargar personal','Modificar personal');
		else redirect(site_url('index.php/cargar_datos/personal'));
	}

	public function get_empleado()
	{
		$this->load->module('general/general_model','general');
		$value = $this->input->post('value');
		$key = $this->input->post('key');
		$empleado = $this->general->get_row('personal',array($key=>$value));
		echo ($empleado) ? json_encode($empleado) : 'false';
	}

}//end of class: Cargar_Data

/* End of file cargar_data.php */
/* Location: ./application/modules/cargar_data/controllers/cargar_data.php */
