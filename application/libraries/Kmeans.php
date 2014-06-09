<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author Kelwin Gamez 
 * Fecha de creación: 02-06-2014
 *
 * Algoritmo de Kmeans
 */
class Kmeans{
	public function __construct(){
		$this->debug = false;
	}

	/**
	 * Aplica la normalización vectorial a la data para tener una mayor consistencia 
	 * de los datos con los que se está trabajando.
	 * @param  array $data 
	 * @return array La $data normalizada
	 */
	public function preprocesar_data($data){
		/**
		 * Número de dimensiones que posee la data en estudio.
		 * @var integer
		 */
		$dimensiones = count($data[0]);
		foreach ($data as $key => $coord) {
			$sum = 0;
			for ($i=0; $i < $dimensiones; $i++) { 
				$sum += $coord[$i]*$coord[$i];
			}
			$data[$key] = $this->normalizar_data($coord, sqrt($sum));
		}
		return $data;
	}


	public function test(){
		$data = array( 
			array(0.05, 0.95),
			array(0.1, 0.9),
			array(0.2, 0.8),
			array(0.25, 0.75),
			array(0.45, 0.55),
			array(0.5, 0.5),
			array(0.55, 0.45), 
			array(0.85, 0.15),
			array(0.9, 0.1),
			"alto" => array(500, 250)
		);
		
		$result = $this->kmeans($data, 3);

		echo "Resultado<br>";
		echo_pre($result);
	}

	/**
	 * Permite la inicialización de los centroides.
	 * @param  array  $data Data para agrupar
	 * @param  integer $k    Número de clusters/centroides iniciales
	 * @return array       Lista de centyroides.
	 */
	function inicializar_centroides(array $data, $k) {
		/**
		 * $dimensiones Guarda la longitud de cada entrada de la variable 
		 * 'data'. Que para efectos de estudio del sistema de TI se trabajaría
		 * en R^2.
		 * @var array
		 */
		$dimensiones = count($data[0]);

		$centroides = array();
		$dimmax = array();
		$dimmin = array(); 
		foreach($data as $coord) {
			/**
			 * Buscando el máximo y el mínimo en cada entrada (x_i,y_i) de la data que será
			 * usado posteriormente para la inicialización propia de los
			 * centroides.
			 *
			 * Min (x_i, y_i)
			 * Max (x_j, y_j)
			 * 
			 */
			foreach($coord as $idx => $val) {
				if(!isset($dimmax[$idx]) || $val > $dimmax[$idx]) {//máximo
					$dimmax[$idx] = $val;
				}
				if(!isset($dimmin[$idx]) || $val < $dimmin[$idx]) {//mínimo
					$dimmin[$idx] = $val;
				}
			}
		}
		if($this->debug){
			echo "min ";
			echo_pre($dimmin);
			echo "max ";
			echo_pre($dimmax);
		}

		for($i = 0; $i < $k; $i++) {
			$centroides[$i] = $this->inicializar_centroide($dimensiones, $dimmax, $dimmin);
		}
		return $centroides;
	}

	/**
	 * Inicializa el centroide de forma aleatoria según los parámetros que se encuentran entre el intervalo (x,y)
	 * definido dentro del sistema por las coordenadas mínimas y máximas.
	 * @param  integer $dimensiones Longitud de la coordenada, define si es R^2 o R^n.
	 * Por lo general y para efectos de análisis del sistema de TI será R^2
	 * @param  array $dimmax	Coordenadas de mayor dimensión
	 * @param  array $dimmin	Coordenadas de menor dimensión
	 * @return array Coordenadas del centroide
	 */
	function inicializar_centroide($dimensiones, $dimmax, $dimmin) {
		$total = 0;
		$centroide = array();
		for($j = 0; $j < $dimensiones; $j++) {
			$centroide[$j] = (rand($dimmin[$j] * 1000, $dimmax[$j] * 1000));
			$total += $centroide[$j] * $centroide[$j];
		}
		//Normalizando el centroide
		$centroide = $this->normalizar_data($centroide, sqrt($total));

		return $centroide;
	}

	/**
	 * Aplica el algoritmo kmeans a una data y genera los clusters.
	 *
	 * Condiciones de parada:
	 * 1.- Los elementos en estudio no se mueven de cluster/centroide.
	 * 2.- Llegue al máximo de iteraciones permitidas.
	 * @param  array  $data     Es un array de array, cada entrada del array posee 
	 * @param  integer  $k      Número de centroides iniciales
	 * @param  integer $max_iter Número máximo de iteraciones que poseerá el algoritmo.
	 * Por defecto son 1000000 iteraciones.
	 * @return array            Un array  con las coordenas de los centroides
	 * y los clusters generados.
	 */
	function kmeans($data, $k, $max_iter = 1000000) {
		//Normalizando la data de entrada para que sea 
		//más consistente
		$data_original = $data;//Haciendo el respaldo de la data
		$data = $this->preprocesar_data($data);

		$centroides = $this->inicializar_centroides($data, $k);
		$mapeo = array();
		$fin = false;
		$iter = 0;
		
		while(!$fin && $iter <= $max_iter) {
			$nuevo_mapeo = $this->asignar_centroides($data, $centroides);
			$cambio_centroides = false;
			/**
			 * Verificar si la data ha cambiado de centroides.
			 * Esta es una de las condiciones de paradas en conjunción con la
			 * cantidad máxima de iteraciones determinada por "$max_iter".
			 */
			foreach($nuevo_mapeo as $coord_key => $centroide_key) {
				if(!isset($mapeo[$coord_key]) || $centroide_key != $mapeo[$coord_key]) {
					$mapeo = $nuevo_mapeo;
					$cambio_centroides = true;
					break;
				}
			}//end of - for each

			//Verifica si los elementos se han movido de centroides/clusters.
			if($cambio_centroides){
				$centroides  = $this->actualizar_centroides($mapeo, $data, $k); 
			}else{
				$fin = true;
			}
			$iter += 1;
		}//end of - while
		
		if($this->debug){
			printf("Cantidad de iteraciones: %d <br>",$iter);
		}
		return $this->formatear_resultado($mapeo, $data, $data_original, $centroides); 

	}

	/**
	 * Asigna los datos a los centroides que conformarán los clusters, tomando
	 * en cuenta la distancia más cercana de los  datos de estudio hacia los centroides.
	 * @param  array $data Data
	 * @param  array $centroides Centroides
	 * @return array La data asociada a los centroides
	 *  array(coord_key => centroide_key ).
	 *  Como se encuentran mapeados mediante la clave de los item de estudios 
	 *  la cantidad de centroides podrías disminuirse.
	 */
	function asignar_centroides($data, $centroides) {
		/**
		 *  Cada entrada es de la siguiente (key => value)
		 *  key: clave de la coordenada del item en estudio
		 *  value: clave del centroide
		 * @var array
		 */
		$mapeo = array();

		foreach($data as $coord_key => $coord) {// Recorrido de cada ítem, obteniendo un array 
												//donde están sus coordenadas
			$min_dist = 2014;//Se inicializa en un valor alto para que al comparar no de como mínimo
			$min_centroide = null;
			foreach($centroides as $centroide_key => $centroide) {
				$dist = 0;
				//Calculando la distancia Euclidiana entre la data de estudio y los centroides
				foreach($centroide as $centroide_idx => $value) {//sacando la sumatoria al cuadrado
					$temp = $coord[$centroide_idx] - $value ;
					$dist += $temp*$temp;
				}
				$dist = sqrt($dist);

				if($dist < $min_dist) {
					$min_dist = $dist;
					$min_centroide = $centroide_key;
				}
			}
			$mapeo[$coord_key] = $min_centroide;
		}

		return $mapeo;
	}

	/**
	 * Actualizando los centroides.
	 *  Ui = Centroides
	 *  C_k = Elementos de cada cluster, que en realidad son coordenadas.
	 * 	Ui(C_k) = (1 / cardinalidad(C_k)) * (Sumtaria(coordenas de cada vector de C_k),
	 * @param  array $mapeo Mapeo de centroides con la data
	 * @param  array $data  
	 * @param  integer $k Numero de clusters o centroides iniciales
	 * @return array Nuevos centroides.
	 */
	function actualizar_centroides($mapeo, $data, $k) {
		$centroides = array();
		$contador_items_clusters = array_count_values($mapeo);// (clave = item centroide , valor = veces asignacion a item centroide)

		foreach($mapeo as $coord_key => $centroide_key) {
			foreach($data[$coord_key] as $idx => $value) {
				if(!isset($centroides[$centroide_key][$idx])) {
					$centroides[$centroide_key][$idx] = 0;
				}
				$centroides[$centroide_key][$idx] += ($value/$contador_items_clusters[$centroide_key]); 
			}
		}

		if(count($centroides) < $k) {
			//Entra cuando algun centroide en el método asignar_centroides ha sido eliminado
			//porque no ha sido asignado a ninguna coordenada
			$centroides = array_merge($centroides, $this->inicializar_centroides($data, $k - count($centroides)));
		}

		return $centroides;
	}

	/**
	 * Normaliza la data de entrada utilizando la normalización de vectores.
	 * Posteriormente cuando se tengan todos los clusters formados se debe anular la normalización
	 * para obtener los valores reales 
	 * @param  array  $vector
	 * @param  [type] $total sqrt(ai + ... + a_i+1 + ... + a_n)
	 * @return array $vector El vector de la data normalizado.
	 */
	function normalizar_data(array $vector, $total) {
		foreach($vector as &$value) {
			$value = $value/$total;
		}
		return $vector;
	}

	function formatear_resultado($mapeo, $data, $data_original, $centroides) {
		$resp  = array();
		$resp['centroides'] = $centroides;
		$clusters = array();
		$dimensiones = count($data_original[0]);
		foreach($mapeo as $coord_key => $centroide_key) {
			$coord_original = $data_original[$coord_key];// Coordenada original sin normalización
		
			$tmp = array('coord_key' => $coord_key, 'coordenadas' =>$coord_original);
			$clusters[$centroide_key][] = $tmp;
		}
		$resp['clusters'] = $clusters;
		return $resp;
	}

}// location: ./application/libraries/Kmeans.php
