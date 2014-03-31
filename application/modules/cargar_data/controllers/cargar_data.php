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
		 * Número de items de componentes de ti por página 
		 * @var integer
		 */
		$this->per_page = 6;
	}

	public function index(){
		$this->utils->template($this->_list(0),'cargar_data/main','','Cargar Infraestructura','');
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
				//Obteniendo los datos básicos que ya fueron cargados (si los hay)
				$row = $this->utilities_model->first_row('organizacion','organizacion_id');
				$info['org'] = NULL;
				if($row !== NULL){
					$info['org'] = $row;
				}
				//Cargando los datos básicos
				$this->utils->template($this->_list(1),'cargar_data/basico',$info,'Cargar Infraestructura','Básico');
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
				$params_main_content = $this->_config_comp_ti($this->per_page,
					false,$cur_page,array('accion' => 'all' ));
				$this->utils->template($this->_list(2),'cargar_data/componentes_ti_view',
					$params_main_content,'Cargar Infraestructura','Componentes TI');
				break;

			//Muestra el mensaje de guardado exitoso
			case 'guardado': 
				$params_main_content = $this->_config_comp_ti($this->per_page,
					true,1,array('accion' => 'all' ));
				$this->utils->template($this->_list(2),'cargar_data/componentes_ti_view',
					$params_main_content,'Cargar Infraestructura','Componentes TI');
				break;

			//Formulario de nuevo componente de ti
			case 'nuevo':
				//Consultando el maestro de Categoria
				$info['categorias'] = $this->utilities_model->all('ma_categoria');

				//Indicando que es nuevo
				$info['accion'] = "nuevo";

				$first_id_cat = $info['categorias'][0]['ma_categoria_id'];
				$info['unidades'] = $this->utilities_model->rows_by_id('ma_unidad_medida',
					'ma_categoria_id', $first_id_cat);
				$info['accion'] = "nuevo";
				//Cargando la plantilla
				$this->utils->template($this->_list(2),'cargar_data/nuevo_componente_ti_view',$info,
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
				$op = $this->input->post('filtro-componente-ti');
				switch ($op) {
					case 'todos':
						$params_main_content = $this->_config_comp_ti($this->per_page,
							false,1, array('accion' => 'all' ));
						break;
					
					case 'nombre':
						$busq = $this->input->post('buscar-componente-ti');
						$params_main_content = $this->_config_comp_ti($this->per_page,
							false,1, array('accion' => 'nombre','campo_buscar' => $busq ));
						break;

					case 'categoria':
						$busq = $this->input->post('buscar-componente-ti');
						$params_main_content = $this->_config_comp_ti($this->per_page,
							false,1, array('accion' => 'categoria','campo_buscar' => $busq ));
						break;
				}
				//Para desplegar el mensade de filtrado
				$params_main_content['is_filtered'] = true;
				
				$this->utils->template($this->_list(2),'cargar_data/componentes_ti_view',
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
				$this->utils->template($this->_list(2),'cargar_data/nuevo_componente_ti_view',$info,
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

				if($this->utilities_model->update('componente_ti',
						array('componente_ti_id'=>$id_comp_ti),$p_procesado ) ){
					echo '{"estatus":"ok"}';
				}else{
					echo '{"estatus":"fail"}';
				}
				break;
			case 'actualizado':
				$params_main_content = $this->_config_comp_ti($this->per_page,
					false,1,array('accion' => 'all' ),true);
				$this->utils->template($this->_list(2),'cargar_data/componentes_ti_view',
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
				$params_main_content = $this->_config_dpto(false,false,false,$cur_page,
					$this->per_page, array('accion' => 'todos'));
				$this->utils->template($this->_list(3),'cargar_data/departamentos',
					$params_main_content,'Cargar Infraestructura','Departamentos');
				break;
			
			//Formulario de nuevo componente de ti
			case 'filtrar':
				$op = $this->input->post('filtro-dpto');
				switch ($op) {
					case 'todos':
						$params_main_content = $this->_config_dpto(false,false,true,1,
							$this->per_page, array('accion' => 'todos'));
						break;
					case 'nombre':
						$campo_buscar = $this->input->post('buscar');
						$params_main_content = $this->_config_dpto(false,false,true,1,
							$this->per_page, array('accion' => 'nombre','info' =>$campo_buscar));
						break;
				}
				
				$this->utils->template($this->_list(3),'cargar_data/departamentos',
					$params_main_content,'Cargar Infraestructura','Departamentos');

				break;
			case 'nuevo':
				//Info de los Componentes en el sistema
				$params_main_content['list_comp_ti'] = $this->basico_model->ids_nombres_comp_ti();
				$params_main_content['actualizar'] = false;
				$this->utils->template($this->_list(3),'cargar_data/nuevo_departamento_view',
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
				$params_main_content = $this->_config_dpto(false,true,false,1,
					$this->per_page,array('accion'=>'todos'));
				$this->utils->template($this->_list(3),'cargar_data/departamentos',
					$params_main_content,'Cargar Infraestructura','Departamentos');
				break;
			//Desplegando formulario lleno para su edición
			case 'actualizar':
				$dpto_id = $this->uri->segment(4);
				
				//Obteniendo la información del dpto
				$params_main_content['dpto'] = $this->utilities_model->row_by_id('departamento',
					'departamento_id',$dpto_id);
				
				//Componentes en el sistema que no estén ya previamente seleccionados
				$params_main_content['list_comp_ti'] = $this->basico_model->ids_nombres_comp_ti($dpto_id);

				//Componentes que están asociados al dpto
				$params_main_content['list_comp_ti_asig']  = $this->basico_model->comp_ti_asig_dpto($dpto_id);

				$params_main_content['actualizar'] = true;
				$this->utils->template($this->_list(3),'cargar_data/nuevo_departamento_view',
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
				$params_main_content = $this->_config_dpto(true,false,false,1,
					$this->per_page,array('accion'=>'todos'));
				$this->utils->template($this->_list(3),'cargar_data/departamentos',
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
	 * @return Array              	Config. del main_content
	 */
	private function  _config_dpto($actualizado, $guardado,$filtrado, $cur_page,$per_page,
		$data_filtro){
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
			'cur_page' => $cur_page
			);
		$mc['config_pag'] = $config_pag;
		$mc['list_dpto'] = $l['data'];

		return $mc;
	}
	public function servicios($action = "list"){
		switch ($action) {
			case 'list':
				$this->utils->template($this->_list(4),'cargar_data/servicios','',
				'Cargar Infraestructura','Servicios');
				break;
			
			case 'nuevo':
				$this->utils->template($this->_list(4),'cargar_data/nuevo_servicio_view','',
				'Cargar Infraestructura','Nuevo serv.');
				break;
			
			case 'guardar':
				echo "Guardando y redireccionando a la lista de Servicios";
				break;
		}
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
	 * @param  Boolean $actualizado_exitoso Indica si viene de actualizar o no.
	 * @return Array Una array asociativo con las configuraciones. 
	 */
	private function _config_comp_ti($per_page, $guardado_exitoso,
		$cur_page,$data_origin,$actualizado_exitoso=false){

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
			'cur_page' => $cur_page
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
	private function _list($index_active){
		$l =  array();

		$l[] = array(
			"chain" => "Descripción",
			"active" => false,
			"href" => "index.php/cargar_datos",
			"icon" => "fa fa-bar-chart-o"
		
		);
		$l[] = array(
			"chain" => "Básico",
			"active" => false,
			"href" => "index.php/cargar_datos/basico",
			"icon" => "fa fa-cog"
		
		);

		$l[] = array(
			"chain" => "Componentes de TI",
			"active" => false,
			"href" => "index.php/cargar_datos/componentes_ti/1",
			"icon" => "fa fa-cogs"
		
		);

		$l[] = array(
			"chain" => "Departamentos",
			"active" => false,
			"href" => "index.php/cargar_datos/departamentos/1",
			"icon" => "fa fa-sitemap"
		
		);

		$l[] = array(
			"chain" => "Servicios",
			"active" => false,
			"href" => "index.php/cargar_datos/servicios",
			"icon" => "fa fa-list"
		
		);

		$l[$index_active]["active"] = true; //Colocar el ítem activo
		return $l;
	}//end of function: _list

}//end of class: Cargar_Data

/* End of file cargar_data.php */
/* Location: ./application/modules/controllers/cargar_data.php */
