<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Creado: 20-04-2014
 * @author Kelwin Gamez <kelgwiin@gmail.com>
 */
class Costos extends MX_Controller
{		
	/**
	 * Constructor principal. 
	 * @author Kelwin Gamez <kelgwiin@gmail.com>
	 */
	public function __construct(){
		parent::__construct();
		//Models
		$this->load->model('utilities/utilities_model');
		$this->load->model('costos_model');
		$this->load->model('historicos_model');
		$this->load->model('recomendaciones_model');
		$this->load->model('caracterizacion_model','carac_model');

		//Helpers
		$this->load->helper('date');
		$this->load->helper('bs3');
		$this->load->helper('url');

		//Modules
		//Cargando el módulo ./modules/utilities/utils.php
		$this->load->module('utilities/utils');

		//Sidebar
		$this->list_sidebar = $this->utils->list_sidebar_costos();

		//Cargando la información de la organización
		$this->org = $this->utilities_model->first_row('organizacion','organizacion_id');

		//Daemons
		/**
		 * 1.- El que calcule la estructura de costos de cada año 
		 * o por lo menos del año en curso. Esta data se usa para la gestión de los
		 * históricos. MODELO: "$this->costos_model->estructura_costos_by_year_all($year)""
		 * 
		 * 2.- Cálculo de las fechas de caducidad: "$this->costos_model->add_fecha_hasta_comp_all()"
		 */
	}
	

	public function index(){
		$this->utils->is_logged();
		$this->utils->template($this->list_sidebar,'Costos/main','','Módulo de Gestión de Costos','',
			'two_level');
	}

	public function testCostos($action = "default",$anio="null"){
		$this->load->helper('file');
		switch ($action) {
			case 'default':
				echo "Inicio de la prueba de Costos<br>";
				$this->costos_model->estructura_costos('2014','5');
				echo "Fin de la prueba de Costos<br>";	
				break;
			
			case 'costos-by-year':
				echo "Calculando la estructura de costos  para el año " . $anio  . "<br>";
				$this->costos_model->estructura_costos_by_year_all($anio);
				echo "fin del costeo";
				break;
			case 'add-fecha-caducidad':
				$this->costos_model->add_fecha_hasta_comp_all();
				echo "Fecha de caducidad agregada<br>";
				break;
			case 'modelo-costos-by-year':
				echo "Calculando el modelo de Costos para el año de: <code>$anio</code> <br>";
				$this->costos_model->modelo_costos($anio,6);
				break;
			//----------------
			//Casos de Prueba
			//----------------
			case 'caso':
				$dsc = array(
					"1"=>"Data de la DIUC",
					"2"=>"Servidor Virtual",
					"3"=>"Data Generada Aleatoria",
					"4"=>" De 7 procesos "
				);
				$d = $dsc[$anio];
				echo "<strong>Caso de prueba $anio - $d</strong><br>";
				$this->carac_model->reset_proc_hist();
				echo "1.-Tabla <code>proceso_historial</code> vaciada <br>";

				$caso1 = read_file("./databases/Costos-Queries/casos-prueba/$action-$anio.in");
				$this->utilities_model->run_query($caso1);
				echo "2.-Inserción de nuevos registros<br>";

				//Es el caso 4
				if($anio == 4){
					$this->carac_model->config_servicio_proc_c4();
				}
				
				break;
			//end of: Casos de Prueba 
		}
		
	}

	public function ModeloCostos(){
		$this->utils->is_logged();
		$this->utils->template($this->list_sidebar,'Costos/ModeloCostos','','Módulo de Gestión de Costos','Modelo de Costos',
			'two_level');
	}	

	public function Historicos($action = "index"){
		switch ($action) {
			case 'index':
				$this->utils->is_logged();
				$params['org'] = $this->org;//Datos de la organización
				$this->utils->template($this->list_sidebar,'Costos/Historicos',$params,'Módulo de Gestión de Costos','Históricos',
					'two_level');
				break;

			//Ajax: Evolución de los Componentes de TI
			case 'evol_comp_ti':
				$year = $this->input->post('anio_comp_ti');
				$recalcular = $this->input->post('recalcular');// Indica si se recalcula la estructura de costos para el año dado

				if(isset($recalcular) && $recalcular){
					//Se calculan los costos de un año, si estos fueron previamente
					//calculados no se vuelven a realizar los cálculos.
					$info = $this->historicos_model->evol_comp_ti($year);	
				}else{
					//Se recalculan
					$info = $this->historicos_model->evol_comp_ti($year,true);
				}

				if($info){
					$data = array('data'=>$info, 'estatus'=>"ok");
				}else{
					$data = array('estatus'=>"fail");
				}
				echo json_encode($data);

				break;

			//Ajax: Evolución del Modelo de Costo asociado a los servicios de TI
			case 'evol_modelo_costo':
				$year = $this->input->post('anio_modelo_c');
				$info = $this->historicos_model->evol_modelo_c($year);
				
				if($info){
					$data = array('data'=>$info, 'estatus'=>"ok");
				}else{
					$data = array('estatus'=>"fail");
				}
				echo json_encode($data);
				break;
		}
	}	
	
	public function Recomendaciones(){
		$this->utils->is_logged();
		//Calculando y agregando la fecha de caducidad de los componentes de ti
		$this->costos_model->add_fecha_hasta_comp();
		$tmp = $this->recomendaciones_model->get();
		if($tmp){
			$params['recomendaciones'] = $tmp;
		}else{
			$params = null;
		}
		$this->utils->template($this->list_sidebar,'Costos/Recomendaciones',$params,'Módulo de Gestión de Costos','Recomendaciones',
			'two_level');
	}

	public function procesar_costeo(){
		// Indica si se recalcula la caracterización, método de alto costo
		// computacional
		$recalcular = $this->input->post('recalcular');
		if(isset($recalcular) && $recalcular){
			$this->carac_model->caracterizar();
		}
		
		$params = $this->input->post();
		$this->load->model('modelo_costos_model','mcm');
		
		//Modelo de Costos
		if($params['esquema_tiempo'] == "AA"){//¿Procesar Modelo de Costo por mes o por año?
			$this->costos_model->modelo_costos($params['anio']);//todo el año
		}else{
			$this->costos_model->modelo_costos($params['anio'],$params['mes']);
		}
		
		$result = $this->mcm->costos_by_servicio($params);
		
		if($result !== null){
			$r = array ('estatus' => "ok", 'info' => $result);
		}else{
			$r = array('estatus'=>'empty');
		}
		echo(json_encode($r));
	}
}
/* End of file Costos.php */
/* Location: ./application/modules/Costos/controllers/Costos.php */