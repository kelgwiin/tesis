<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Creado: 27-04-2014
 * Permite cargar los Costos Indirectos del Sistema de Costos.
 * @author Kelwin Gamez <kelgwiin@gmail.com>
 */
class Cargar extends MX_Controller
{		
	/**
	 * Constructor principal. 
	 * @author Kelwin Gamez <kelgwiin@gmail.com>
	 */
	public function __construct(){
		parent::__construct();
		//Models
		$this->load->model('utilities/utilities_model');
		$this->load->model('cargar_costos_indirectos_model','cargar_ci_model');

		//Helpers
		$this->load->helper('date');
		$this->load->helper('bs3');
		$this->load->helper('url');

		//Modules
		//Cargando el módulo ./modules/utilities/utils.php
		$this->load->module('utilities/utils');

		//Libraries 
		$this->load->library('Kmeans');

		//Cargando la información de la organización
		$this->org = $this->utilities_model->first_row('organizacion','organizacion_id');

		//Conjuto de menues que se encuentra en el lateral izquierdo.
		$this->list_sidebar = $this->utils->list_sidebar_costos();
	}
	/**
	 * Despliega lalista de todos los costos indirectos y además contiene
	 * también las links para la creación de ellos.
	 */
	public function CostosIndirectos(){
		$params['costos_indirectos'] = $this->cargar_ci_model->all_costos_indirectos(); 
		$this->utils->template($this->list_sidebar,'Costos/fr_costos_indirectos',$params,'Módulo de Gestión de Costos','Costos Indirectos',
			'two_level');
	}

	//Conjunto de Formularios de Costos Indirectos
	public function Arrendamiento($id_actualizar=NULL){
		if(isset($id_actualizar) && $id_actualizar != NULL){
			$params['id_actualizar'] = $id_actualizar;
		}
		$params['org'] = $this->org;
		$params['motivos'] =  $this->cargar_ci_model->motivos_by_seccion('arrendamiento');
		$this->utils->template($this->list_sidebar,'Costos/forms/Arrendamiento',$params,'Módulo de Gestión de Costos','Costos Indirectos',
			'two_level');
	}

	public function Mantenimiento($id_actualizar=NULL){
		if(isset($id_actualizar) && $id_actualizar != NULL){
			$params['id_actualizar'] = $id_actualizar;
		}
		$params['org'] = $this->org;
		$params['motivos'] =  $this->cargar_ci_model->motivos_by_seccion('mantenimiento');
		$params['dptos'] = $this->cargar_ci_model->nombres_ids_dpto();
		$params['categorias'] = $this->cargar_ci_model->nombres_ids_ma_categoria();
		$this->utils->template($this->list_sidebar,'Costos/forms/Mantenimiento',$params,'Módulo de Gestión de Costos','Costos Indirectos',
			'two_level');
	}

	public function Formacion($id_actualizar=NULL){
		if(isset($id_actualizar) && $id_actualizar != NULL){
			$params['id_actualizar'] = $id_actualizar;
		}
		$params['org'] = $this->org;
		$params['tipos'] = $this->cargar_ci_model->nombres_ids_formacion_tipo();
		$this->utils->template($this->list_sidebar,'Costos/forms/Formacion',$params,'Módulo de Gestión de Costos','Costos Indirectos',
			'two_level');
	}

	public function HonorariosProf($id_actualizar=NULL){
		if(isset($id_actualizar) && $id_actualizar != NULL){
			$params['id_actualizar'] = $id_actualizar;
		}
		$params['org'] = $this->org;
		$this->utils->template($this->list_sidebar,'Costos/forms/HonorariosProf',$params,'Módulo de Gestión de Costos','Costos Indirectos',
			'two_level');
	}
	
	public function Utileria($id_actualizar=NULL){
		if(isset($id_actualizar) && $id_actualizar != NULL){
			$params['id_actualizar'] = $id_actualizar;
		}
		$params['org'] = $this->org;
		$this->utils->template($this->list_sidebar,'Costos/forms/Utileria',$params,'Módulo de Gestión de Costos','Costos Indirectos',
			'two_level');
	}

	public function Guardar($table_name){
		$p = $this->input->post();
		
		$table_name = strtolower($table_name);

		//Guardando en la BD
		if($this->utilities_model->add_ar($p, $table_name)){
			$params['guardado_exitoso'] = true;
			$params['costos_indirectos'] = $this->cargar_ci_model->all_costos_indirectos(); 
			$this->utils->template($this->list_sidebar,'Costos/fr_costos_indirectos',$params,'Módulo de Gestión de Costos','Costos Indirectos',
			'two_level');
			
		}
	}

	/**
	 * Edita la información del costo indirecto dado el nombre de la tabla y el id.
	 * Se indica el "id" para que luego se haga la petición json para el llenado de los datos
	 * y la configuración pertinente para indicar que el form corresponde a actualización.
	 * @param String $table_name Nombre de la tabla
	 * @param Integer $id        Id de tabla
	 *
	 * - arrendamiento
     * - mantenimiento
     * - formacion
     * - honorario
     * - utileria
	 */
	public function Editar($table_name, $id){
		switch (strtolower($table_name)) {
			case 'arrendamiento':
				$this->Arrendamiento($id);
				break;
			case 'mantenimiento':
				$this->Mantenimiento($id);
				break;

			case 'formacion':
				$this->Formacion($id);
				break;
			case 'honorario':
				$this->HonorariosProf($id);
				break;
			case 'utileria':
				$this->Utileria($id);
				break;
		}
	}

	/**
	 * Buscar los detalles originales para actualizarlos y llenar los Formularios
	 */
	public function DetallesAct(){
		$p = $this->input->post();
		$name = $p['table_name'];
		$resp = $this->utilities_model->row_by_id($name, $name."_id",$p['id']);
		echo json_encode($resp);
	}
	/**
	 * Guarda desde actualizar la datas
	 * @param String $table_name
	 * @param Integer $id
	 */
	public function GuardarAct($table_name, $id){
		$table_name = strtolower($table_name);
		$p = $this->input->post();

		if( $this->utilities_model->update_ar($table_name,$p,array($table_name."_id"=>$id)) ){
			$params['actualizado_exitoso'] = true;
			$params['costos_indirectos'] = $this->cargar_ci_model->all_costos_indirectos(); 
			$this->utils->template($this->list_sidebar,'Costos/fr_costos_indirectos',$params,'Módulo de Gestión de Costos','Costos Indirectos',
			'two_level');
		}
	}

	/**
	 * Elimina lógicamente el registo de  costo indirecto dado el nombre de la tabla y el id.
	 * LLamado desde ajax inicialmente.
	 * @param String $table_name Nombre de la tabla
	 * @param Integer $id        Id de tabla
	 */
	public function Eliminar($table_name, $id){
		if($this->cargar_ci_model->eliminar_costos_ind_item(strtolower($table_name),$id)){
			echo '{"estatus":"ok"}';
		}else{
			echo '{"estatus":"fail"}';
		}
	}
	/**
	 * Busca los detalles de los Costos Indirectos (from ajax)
	 * Con un formateo especial para los nombres de cada uno de los campos.
	 */
	public function Detalles(){
		$p = $this->input->post();
		$resp = $this->cargar_ci_model->detalles_ci($p['table_name'], $p['id']);
		echo json_encode($resp);
	}

	//Métodos para caracterización
	public function caracterizar(){
		//Recopilando la información
		$nom_procesos = $this->utilities_model->nom_proc_historial();
		$data = array();
		
		foreach ($nom_procesos as $nom) {
			$data[$nom] = $this->utilities_model->proceso_historial($nom);
		}
		
		//resultados
		$resultados = array();
		foreach ($data as $key => $d) {
			$resultados[$key] = $this->procesar_caso($d,6,3);
		}
		//$resultados['nautilus'] = $this->procesar_caso($data['nautilus'],6,3);
		
		$servicios_proc = $this->utilities_model->procesos_servicio();
		$sum_por_serv = array();
		foreach ($servicios_proc as $row) {
			if(isset($sum_por_serv[$row['servicio_id']]) ){
				for ($i=0; $i < 3; $i++) { 
					$sum_por_serv[$row['servicio_id']][$i] += $resultados[$row['p']][$i];
				}
			}else{
				for ($i=0; $i < 3; $i++) { 
					$sum_por_serv[$row['servicio_id']][$i] = $resultados[$row['p']][$i];
				}
			}
			
		}

		echo_pre($sum_por_serv);

		echo_pre($resultados);

	}

	public function procesar_caso($data,$num_clusters, $num_params){
		$debug = false;
		$resultado = $this->kmeans->kmeans($data,$num_clusters);

		if($debug){
			echo_pre($resultado);
		}

		$rep = array();
		$prom = array();//para guardar los promedios de cada uno de los grupos generados
		for ($i=0; $i < $num_params; $i++) { 
			$prom[$i] = 0;
		}
		$counter = 0;
		foreach ($resultado['clusters'] as $cluster) {
			$temp = $cluster[0]['coordenadas'];
			$rep[] = $temp;

			//sumando cada ítem de la categoría
			for ($i=0; $i < $num_params; $i++) { 
				$prom[$i] += $temp[$i];
			}
			$counter+=1;
		}
		if($debug){
			echo_pre($rep);
		}
		//promedio
		for ($i=0; $i < $num_params; $i++) { 
			$prom[$i] /= $counter;
		}
		return $prom;
	}

	public function testKmeans(){
		$this->caracterizar();
	}

	public function bk_test_kmeans(){

		//echo 'Inicio de kmeans<br>';
		//$this->kmeans->test();
		//echo 'Fin de kmeans<br>';

		echo 'Inicio de kmeans<br>';
		
		//1.- Obtencion de la data
		$data = $this->utilities_model->proceso_historial();
		//echo_pre($data);
		$num_clusters = 6;
		
		//2.- Correr el kmeans
		$resultado = $this->kmeans->kmeans($data,$num_clusters);
		//echo_pre($resultado);// muestra todos los grupos y sus centroides
		//pero se puede escoger un representadnte de cada grupo

		//3.- Mostrando los resultados definitivos escogiendo un representante de cada grupo
		$rep = array();
		$num_params = 3;
		$prom = array();//para guardar los promedios de cada uno de los grupos generados
		for ($i=0; $i < $num_params; $i++) { 
			$prom[$i] = 0;
		}
		$counter = 0;
		foreach ($resultado['clusters'] as $cluster) {
			$temp = $cluster[0]['coordenadas'];
			$rep[] = $temp;

			//sumando cada ítem de la categoría
			for ($i=0; $i < $num_params; $i++) { 
				$prom[$i] += $temp[$i];
			}
			$counter+=1;
		}

		//promedio
		for ($i=0; $i < $num_params; $i++) { 
			$prom[$i] /= $counter;
		}

		echo_pre($rep);
		echo_pre($prom);

		//4.- Con estos resultados se puede promediar.
		echo 'Fin de kmeans<br>';

		return $rep;
	}

	
}
/* End of file Cargar.php */
/* Location: ./application/modules/Costos/controllers/Cargar.php */