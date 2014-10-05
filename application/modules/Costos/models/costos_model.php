<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Creado: 24-06-2014
 * @author Kelwin Gamez <kelgwiin@gmail.com>
 */
class Costos_model extends CI_Model{
	public function __construct(){
	    parent::__construct();
	    $this->load->database();
	    $this->load->model('utilities/utilities_model');
	}

	/**
	 * Permite calcular la estructura de costos por categoría, a partir de una 
	 * fecha (mes y año) dada. Por ejemplo, si queremos los costos de febrero de 2010,
	 * se contabilizarían los costos existentes de febrero hasta la presente fecha.
	 * El cálculo se realiza por mes, en donde todos los elementos de costes involucrados
	 * vigentes hasta la fecha serán tomados en cuenta.
	 * 
	 * Para el estudio sólo se tomarán en cuenta las siguientes categorias que son las involucradas en
	 * rendimiento el resto serán prorrateadas:
	 * - Redes
	 * - Memoria 
	 * - Almacenamiento
	 * - Procesador
	 * 
	 * @param string $year Año numérico, cuatro dígitos.
	 * @param string $month Mes numérico, dos dígitos.
	 * @return boolean Indica si fueron o no realizados con éxito
	 * los calculos.
	 */
	public function estructura_costos($year, $month){
		//Ver qué mantenimiento se le ha hecho a un item
		//Contabilizar los Componentes de TI
		//Guardar en Estructura de Costos
		//Ver afección de costos indirectos por rango de fechas en correlacion con fecha de creacion

		$debug = false;
		$fecha = " STR_TO_DATE('".$year.",".$month.",01','%Y,%m,%d') ";
		
		$orig_month = $month;
		$orig_year = $year;
		//Para saber cuando llega a diciembre
		//$fecha & $fecha_fin_mes indican el intervalo del mes completo donde se 
		if($month == 12){
			$year += 1;
			$month = 1;
		}else{
			$month += 1;
		}
		$fecha_fin_mes = " (STR_TO_DATE('".$year.",".$month.",01 23:59:59','%Y,%m,%d %H:%i:%s') - INTERVAL 1 DAY) ";

		//Componentes de TI
		$this->add_fecha_hasta_comp();// Actualizando la fecha de caducidad de los componentes de TI
		
		//Consultando los componentes de ti filtrandolo por fecha y por activo o inactivo 
		//según las fecha de vigencia de cada ítem.
		
		//La primera es cuando es grande tal forma que abarca todo el  o una fraccion de el pero de forma externa
		//La segunda condicion es cuando el intervalo es pequeño y cabe dentro del mes, está incluido
		$sql_cti = "SELECT ma_unidad_medida_id,nombre, precio,cantidad, capacidad, fecha_creacion
				FROM componente_ti
				WHERE activa = 'ON' AND borrado = false AND  
				(
				 
					(".$fecha." BETWEEN fecha_creacion AND fecha_hasta ) OR 
					(".$fecha_fin_mes." BETWEEN fecha_creacion AND fecha_hasta)
				 
				 OR
					(fecha_creacion BETWEEN ".$fecha." AND ".$fecha_fin_mes." ) OR 
					(fecha_hasta BETWEEN ".$fecha." AND ".$fecha_fin_mes.")
		
				);";
		$q_cti = $this->db->query($sql_cti);
		$r_cti = $q_cti->result_array();

		if($q_cti->num_rows() <= 0 ) {return false;}

		if($debug){
			echo "Componentes de ti <br>";
			echo_pre($r_cti);
		}
		//ma_categoria
		$sql_categ = "SELECT ma_categoria_id, valor_base, nombre
					  FROM ma_categoria;";
		$q_categ = $this->db->query($sql_categ);
		
		$r_categ = array();
		foreach ($q_categ->result_array() as $row) {
			$r_categ[$row['ma_categoria_id']]['valor_base'] = $row['valor_base'];
			$r_categ[$row['ma_categoria_id']]['nombre'] = $row['nombre'];
		}

		//ma_unidad_medida
		$sql_uni = "SELECT ma_unidad_medida_id, ma_categoria_id, valor_nivel
					FROM ma_unidad_medida;";
		$q_uni = $this->db->query($sql_uni);
		$r_uni = array();
		foreach ($q_uni->result_array() as $row) {
			$r_uni[$row['ma_unidad_medida_id']] = array('ma_categoria_id'=>$row['ma_categoria_id'],
				'valor_nivel'=>$row['valor_nivel']);
		}


		//::: COSTOS INDIRECTOS ::::
		//
		//arrendamiento
		$sql_arren = "SELECT arrendamiento_id, costo, fecha_inicial_vigencia, esquema_tiempo
					FROM arrendamiento
					WHERE borrado = false and 
					(
						fecha_inicial_vigencia <=  ".$fecha." OR
						
						(fecha_inicial_vigencia BETWEEN ".$fecha." AND ".$fecha_fin_mes.")
					);";
					
		$q = $this->db->query($sql_arren);
		$r_arren = $q->result_array();


		//mantenimiento 
		$sql_mant = "SELECT mantenimiento_id, costo, fecha, departamento_id, ma_categoria_id
					FROM mantenimiento
					WHERE borrado = false AND 
						fecha BETWEEN ".$fecha." AND ".$fecha_fin_mes.";";

		$q = $this->db->query($sql_mant);
		$r_mant = $q->result_array();

		//formacion
		$sql_for = "SELECT formacion_id, costo, fecha
					FROM formacion
					WHERE borrado = false AND 
						fecha BETWEEN ".$fecha." AND ".$fecha_fin_mes.";";
		
		$q = $this->db->query($sql_for);
		$r_for = $q->result_array();

		//honoraios profesionales
		$sql_hon = "SELECT honorario_id, costo, numero_profesionales, fecha_desde, fecha_hasta
					FROM honorario
					WHERE borrado = false AND
						(
						 
							(".$fecha." BETWEEN fecha_desde AND fecha_hasta ) OR 
							(".$fecha_fin_mes." BETWEEN fecha_desde AND fecha_hasta)
						 
						 OR
							(fecha_desde BETWEEN ".$fecha." AND ".$fecha_fin_mes." ) OR 
							(fecha_hasta BETWEEN ".$fecha." AND ".$fecha_fin_mes.")
						);";
		$q = $this->db->query($sql_hon);
		$r_hon = $q->result_array();

		//utileria
		$sql_util = "SELECT utileria_id, costo, fecha
					FROM utileria
					WHERE borrado = false AND 
						fecha BETWEEN ".$fecha." AND ".$fecha_fin_mes.";";

		$q = $this->db->query($sql_util);
		$r_util = $q->result_array();


		//Totalizar Capacidad y Costo de los Componentes de TI. Asignarlos a la categoría que corresponda
		/**
		 * Cada entrada contiene la siguiente estructura:
		 * 		(key) integer ma_categoria_id
		 *   	integer cantidad_items
		 *   	integer total_capacidad
		 *    	double  total_monetario
		 *     	double  total_monetario_cost_ind //dinero de costos indirectos
		 * @var array
		 */
		$costos_categoria = array();

		$otros_costos = 0;// Orientadas a las categorías fuera 4 principales de estudio
		// $r_uni, $r_categ
		$total_cti_items = count($r_cti);
		$total_otros_ci_items = 0;//items no principales
		foreach ($r_cti as $row) {
			$uni_id = $row['ma_unidad_medida_id'];
			$categ_id = $r_uni[$uni_id]['ma_categoria_id'];
			$valor_nivel = $r_uni[$uni_id]['valor_nivel'];
			$valor_base = $r_categ[$categ_id]['valor_base'];
			$categ_nom = $r_categ[$categ_id]['nombre'];

			$precio_total = $row['cantidad']*$row['precio'];


			if($valor_base > 0){//No pertenece a la categoría de otros o licencia
				//nombre
				if(!isset($costos_categoria[$categ_id]['nombre'])){
					$costos_categoria[$categ_id]['nombre'] = $categ_nom;
				}

				//la unidades más bajas de cada categoria son: KB, Kb, KH. Esto es configurable desde la BD
				$tmp_unidad = $valor_nivel == 1? $valor_base: pow($valor_base, $valor_nivel);
				$tocal_capacidad = $row['capacidad']*$tmp_unidad*$row['cantidad'];

				if(isset($costos_categoria[$categ_id]['total_capacidad'])){
					$costos_categoria[$categ_id]['total_capacidad'] += $tocal_capacidad;
					$costos_categoria[$categ_id]['total_monetario'] += $precio_total;
					$costos_categoria[$categ_id]['cantidad_items'] += 1;
				}else{
					$costos_categoria[$categ_id]['total_capacidad'] = $tocal_capacidad;
					$costos_categoria[$categ_id]['total_monetario'] = $precio_total;
					$costos_categoria[$categ_id]['cantidad_items'] = 1;
					$costos_categoria[$categ_id]['total_monetario_cost_ind'] = 0;
				}
			}else{
				$otros_costos += $precio_total;
				$total_otros_ci_items += 1;
				/*
				//Si se desea incluir las otras categorías dentro del prorrateo, de lo contrario estas son prorrateadas
				if(isset($costos_categoria[$categ_id]['total_monetario'])){
					$costos_categoria[$categ_id]['total_monetario'] += $precio_total;
					$costos_categoria[$categ_id]['cantidad_items'] += 1;
				}else{
					$costos_categoria[$categ_id]['total_capacidad'] = -1;//para indicar que no aplica
					$costos_categoria[$categ_id]['total_monetario'] = $precio_total;
					$costos_categoria[$categ_id]['cantidad_items'] = 1;
					$costos_categoria[$categ_id]['total_monetario_cost_ind'] = 0;
				}*/
			}
		}
		$total_cti_items -= $total_otros_ci_items;
		if($debug){
			echo "Costos - Componentes de TI <br>";
			echo_pre($costos_categoria);
		}

		//Totalizar y asignar los Costos Indirectos.
		$totales_ci = array();//totales de costos indirectos
		//:: Arrendamiento ::
		$totales_ci[0] = 0;
		foreach ($r_arren as $row) {
			switch ($row['esquema_tiempo']) {
				case 'mensual':
					$esquema_tiempo = 1;
					break;
				case 'trimestral':
					$esquema_tiempo = 3;
					break;
				case 'semestral':
					$esquema_tiempo = 6;
					break;
				case 'anual':
					$esquema_tiempo = 12;
					break;
			}
			$totales_ci[0] += $row['costo']/$esquema_tiempo;
		}

		//:: Mantenimiento :: (Afecta directo a una categoría)
		foreach ($r_mant as $row) {
			$categ_id = $row['ma_categoria_id'];
			//Condición necesario para el caso de que NO existan
			//componentes de ti de los grupos principales y existan costos
			//indirectos previamente cargados
			if(isset($costos_categoria[$categ_id])){
				$costos_categoria[$categ_id]['total_monetario_cost_ind'] += $row['costo'];
			}
		}
		if($debug){
			echo "Agregándole Mantenimiento<br>";
			echo_pre($costos_categoria);	
		}

		//:: Formación ::
		$totales_ci[1] = 0;
		foreach ($r_for as $row) {
			$totales_ci[1] += $row['costo'];
		}

		//:: Honorarios ::
		$totales_ci[2] = 0;
		foreach ($r_hon as $row) {
			$totales_ci[2] += $row['costo'];
		}

		//:: Utilería ::
		$totales_ci[3] = 0;
		foreach ($r_util as $row) {
			$totales_ci[3] += $row['costo'];
		}

		//asignando los totales de ci restantes
		if($debug){
			echo_pre($totales_ci);
			echo "total items " . $total_cti_items . "<br>";	
		}
		$totales_ci[4] = $otros_costos;
		foreach ($totales_ci as $t) {
			if($t > 0 ){
				$costo_prorrateado = $t/$total_cti_items;//por unidad
				foreach ($costos_categoria as &$cat) {
					$monto = $costo_prorrateado*$cat['cantidad_items'];
					$cat['total_monetario_cost_ind'] += $monto;
				}
			}
		}

		if($debug){
			//Con costos indirectos
			echo "Con costos indirectos <br>";
			echo_pre($costos_categoria);	
		}
		
		//Eliminando de la BD si ya existía un registro para la misma fecha
		$this->utilities_model->del_ar('estructura_costo', 
			array('mes'=>$orig_month,'anio'=>$orig_year));

		//Guardando la info en la BD
		$f = $date = date('Y-m-d H:i:s',now());
		$this->utilities_model->add_ar(
			array('fecha_creacion'=>$f,
				"mes"=>$orig_month,
				"anio"=>$orig_year),"estructura_costo");
		$last_id = $this->db->insert_id();
		foreach ($costos_categoria as $categ_id => $c) {
			$info = array(
				"estructura_costo_id"=>$last_id,
				"ma_categoria_id" => $categ_id,
				"total_capacidad"=>$c['total_capacidad'],
				"total_monetario" => $c['total_monetario'],
				"total_monetario_cost_ind" => $c["total_monetario_cost_ind"],
				"cantidad_items" => $c["cantidad_items"]
			);
			$status = $this->utilities_model->add_ar($info,"estructura_costo_item");
		}
		return $status;
		//Opciones para hacer el prorrateo de los Costos Indirectos
		//1.- Tomar en cuenta sólo los componentes que se encuentren >= a la fecha del costo ind
		//2.- Tomar todos los componentes, se incluyen los viejos.
		//
		//Conclusión: Se deben tomar en cuenta todos los componentes de ti, ya que un costo
		//indirecto pudiese afectar tanto a componentes viejos como a los que se integren en el futuro.
		//Lo que si se debe monitorear es la VIDA ÚTIL, la cual al llegar a su fin pasará a estar
		//inactivo, para ello se debe correr cada cierto tiempo un proceso que actualice los estados.
		//

	}
	/**
	 * Agrega la fecha de caducidad de un componente de ti, a partir de
	 * la vida útil o el el tiempo de vida que este especifique dentro de su descripción
	 */
	public function add_fecha_hasta_comp(){
		$sql = "SELECT componente_ti_id, unidad_tiempo_vida 
				FROM componente_ti 
				WHERE fecha_hasta IS NULL and unidad_tiempo_vida != 'NA'; ";
		$q = $this->db->query($sql);

		if($q->num_rows() > 0 ){
			foreach ($q->result_array() as $row) {
				//Obteniendo la unidad de tiempo de vida
				$unidad = "";
				switch ($row['unidad_tiempo_vida']) {
					case 'AA':
						$unidad = "YEAR";
						break;
					case 'MM':
						$unidad = "MONTH";
						break;
					case 'DD':
						$unidad = "DAY";
						break;
				}

				$sql_upd = "UPDATE componente_ti
							SET fecha_hasta = fecha_creacion + INTERVAL tiempo_vida ".$unidad."
							WHERE componente_ti_id = '".$row['componente_ti_id']."'; ";
				$this->db->query($sql_upd);
			}
		}
	}//end of function: add_fecha_hasta_comp

	 /**
	  * Actualizada tadas las fechas de caducidad de los componentes de ti sin importar si estos ya han
	  * sido previamente calculado.
	  *
	  * Debería ser llamdado como un dentro del sistema
	  */
	public function add_fecha_hasta_comp_all(){
		$sql = "SELECT componente_ti_id, unidad_tiempo_vida 
				FROM componente_ti 
				WHERE unidad_tiempo_vida != 'NA'; ";
		$q = $this->db->query($sql);

		if($q->num_rows() > 0 ){
			foreach ($q->result_array() as $row) {
				//Obteniendo la unidad de tiempo de vida
				$unidad = "";
				switch ($row['unidad_tiempo_vida']) {
					case 'AA':
						$unidad = "YEAR";
						break;
					case 'MM':
						$unidad = "MONTH";
						break;
					case 'DD':
						$unidad = "DAY";
						break;
				}

				$sql_upd = "UPDATE componente_ti
							SET fecha_hasta = fecha_creacion + INTERVAL tiempo_vida ".$unidad."
							WHERE componente_ti_id = '".$row['componente_ti_id']."'; ";
				$this->db->query($sql_upd);
			}
		}
	}

	/**
	 * Dado un año hace el llamado de la función estructura_costos para todo el año dado.
	 * @param  integer $year Año
	 */
	public function estructura_costos_by_year($year){
		//Filtra los que ya fueron calculados para no sacar de nuevo la estructura de costos
		$sql = "SELECT mes
				FROM estructura_costo
				WHERE anio = '".$year."';";
		$q  = $this->db->query($sql);

		if($q->num_rows() > 0 ){
			$meses = array();
			$r = $q->result_array();
			foreach ($r as $m) {
				$meses[] = $m['mes'];
			}
		}

		for ($i=1; $i <= 12 ; $i++) { 
			if(!isset($meses)){
				$this->estructura_costos($year,$i);
			}elseif (!in_array($i, $meses)) {
				$this->estructura_costos($year,$i);
			}
		}
	}
	/**
	 * Tiene la misma función que la anterior pero no evalua si ya está calculado.
	 * @param  integer $year Año
	 */
	public function estructura_costos_by_year_all($year){
		for ($i=1; $i <= 12 ; $i++) { 
			$this->estructura_costos($year,$i);
		}
	}
	/**
	 * Permite hacer el cálculo del Modelo de Costos por Servicio. Tomando 
	 * la información que fue previamente caracterizada.
	 * 
	 * Nota: Por servicio en conjunto con el mes debe existir una única caracterización asociada.
	 * De manera que ésta debería de correrse mensualmente.
	 * 
	 * Creado: 14-Sep-2014
	 * @param  Integer $year  Año
	 * @param  Integer $month Mes, Por defecto está configurada la opción NA la cual
	 * indica que se calculará el modelo para el año completo si existe data de
	 * caracterización, de lo contrario 
	 * será un número que indica el mes al cual se le va a calcular el Modelo.
	 * @return 
	 */
	public function modelo_costos($year, $month="NA"){
		$debug = false;
		//Calculando la estructura de costos para el año seleccionado
		//Internamente se agregan las fechas de caducidad a cada uno de los componentes de TI.
		$this->costos_model->estructura_costos_by_year_all($year);

		$sql = "SELECT servicio_id, total_uso_redes, total_uso_cpu,
				total_uso_almacenamiento, total_uso_memoria,
				YEAR(fecha) anio , MONTH(fecha) mes, ec.estructura_costo_id, ec.fecha_creacion as fecha_ec
				FROM caracterizacion AS c
				JOIN estructura_costo ec ON year(c.fecha) = ec.anio and month(c.fecha) = ec.mes
				WHERE YEAR(c.fecha) = $year
		";
		//Condición agregada el 04-Oct-2014
		if($month != "NA"){//se agrega la condición para un mes en específico
			$sql .= " AND MONTH(c.fecha) = $month ";
		}
		
		$query = $this->db->query($sql);

		if($query->num_rows() > 0 ){
			$rs = $query->result_array();
			//Buscando los costos asociados a cada categoría y si ya fueron obtenidos
			//no se buscan de nuevo
			$ec = array();// estructura de costos
			$sql_eci = "SELECT  eci.*, c.nombre AS nom_categ
						FROM estructura_costo_item eci
						JOIN ma_categoria c ON c.ma_categoria_id = eci.ma_categoria_id
						WHERE estructura_costo_id = ? ";

			/**
			 * Permite guardar los costos por servicio
			 * que posteriormente serán almacenados en la tabla de
			 * 'servicio_costo'.
			 * 
			 * @var array
			 */
			$costos_by_servicio = array();

			//info de caracterización
			foreach ($rs as $row) {
				$ec_id = $row['estructura_costo_id'];
				if($debug){
					echo " ec_id $ec_id <br>";
				}
				if( !isset($ec[$ec_id]) ){
					$q_eci = $this->db->query($sql_eci, array($ec_id) );
					
					//info de la estructura de costos
					$tmp_costos  = array();
					$rs_eci = $q_eci->result_array();
					foreach ($rs_eci as $row_ci) {
						$total_dinero = $row_ci['total_monetario'] + $row_ci['total_monetario_cost_ind'];
						$dinero_por_unidad = $total_dinero/$row_ci['total_capacidad'];//Monto de dinero por unidad
						$tmp_costos[$row_ci['nom_categ']] = $dinero_por_unidad;
					}//end of: foreach inner
					$ec[$ec_id] = $tmp_costos;
				}

				$rs_eci = $ec[$ec_id];//info de costos por unidad
				$alm = $row['total_uso_almacenamiento'] * $rs_eci['Almacenamiento'];
				$mem = $row['total_uso_memoria'] * $rs_eci['Memoria'];
				$red = $row['total_uso_redes'] * $rs_eci['Redes'];
				$proc = $row['total_uso_cpu'] * $rs_eci['Procesador'];
				
				$costos_by_servicio[$row['servicio_id']] = array(
					'almacenamiento'=>$alm,
					'memoria'=>$mem,
					'redes'=>$red,
					'procesador'=>$proc,
					'mes' =>$row['mes'],
					'anio'=>$row['anio']
				);
				
			}//end of: foreach outter
			if($debug){
				echo_pre($costos_by_servicio);	//prueba
			}

			//Inserción en la BD.
			foreach ($costos_by_servicio as $servicio_id => $row) {
				//Si ya existe un costo calculado para un mes y año se marca como
				//borrado y se calcula de nuevo
				$this->utilities_model->update_ar(
					"servicio_costo",
					array('borrado'=>TRUE),
					array('mes'=>$row['mes'], 'anio'=>$row['anio'], 'servicio_id'=>$servicio_id)
				);

				//insertando fila en "servicio_costo"
				$f = date('Y-m-d H:i:s',now());//fecha formato datetime
				$total_costo = $row["almacenamiento"]+$row["memoria"]+$row["redes"]
				+$row["procesador"];

				$this->utilities_model->add_ar(
					array(
						"servicio_id"=>$servicio_id,
						"costo"=>$total_costo,
						"fecha_creacion"=>$f,
						"mes"=>$row["mes"],
						"anio"=>$row["anio"]
					),
					"servicio_costo"
				);

				$last_id_serv_cos = $this->utilities_model->last_insert_id();

				//insertando servicio costo detalle
				$f = date('Y-m-d H:i:s',now());//fecha formato datetime
				$this->utilities_model->add_ar(
					array(
						"servicio_costo_id"=>$last_id_serv_cos,
						"c_almacenamiento"=>$row["almacenamiento"],
						"c_memoria"=>$row["memoria"],
						"c_redes"=>$row["redes"],
						"c_procesador"=>$row["procesador"]
					),
					"servicio_costo_detalle"

				);
			}

		}// end of: if
	}

}