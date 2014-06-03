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
			array(0.95, 0.05)
		);

		//Normalizando la data de entrada para que sea 
		//más consistente
		foreach($data as $key => $d) {
			$data[$key] = $this->normalizar_data($d, sqrt($d[0]*$d[0] + $d[1] * $d[1]));
		}
		if($this->debug){
			echo 'Normalised Data<br>';
			echo_pre($data);
		}

		$result = $this->kMeans($data, 3);

		echo "Resultado<br>";
		echo_pre($result);
	}

	/**
	 * Permite la inicialización de los centroides.
	 * @param  array  $data Data para agrupar
	 * @param  [type] $k    Número de clusters/centroides iniciales
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
		foreach($data as $row) {
			/**
			 * Buscando el máximo y el mínimo en cada entrada (x_i,y_i) de la data que será
			 * usado posteriormente para la inicialización propia de los
			 * centroides.
			 *
			 * Min (x_i, y_i)
			 * Max (x_j, y_j)
			 * 
			 */
			foreach($row as $idx => $val) {
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

	function kMeans($data, $k) {
		$centroids = $this->inicializar_centroides($data, $k);
		$mapping = array();

		while(true) {
			$new_mapping = $this->assignCentroids($data, $centroids);
			$changed = false;
			foreach($new_mapping as $documentID => $centroidID) {
				if(!isset($mapping[$documentID]) || $centroidID != $mapping[$documentID]) {
					$mapping = $new_mapping;
					$changed = true;
					break;
				}
			}
			if(!$changed){
				return $this->formatResults($mapping, $data, $centroids); 
			}
			$centroids  = $this->updateCentroids($mapping, $data, $k); 
		}
	}

	function formatResults($mapping, $data, $centroids) {
		$result  = array();
		$result['centroids'] = $centroids;
		foreach($mapping as $documentID => $centroidID) {
			$result[$centroidID][] = implode(',', $data[$documentID]);
		}
		return $result;
	}

	function assignCentroids($data, $centroids) {
		$mapping = array();

		foreach($data as $documentID => $document) {
			$minDist = 100;
			$minCentroid = null;
			foreach($centroids as $centroidID => $centroid) {
				$dist = 0;
				foreach($centroid as $dim => $value) {
					$dist += abs($value - $document[$dim]);
				}
				if($dist < $minDist) {
					$minDist = $dist;
					$minCentroid = $centroidID;
				}
			}
			$mapping[$documentID] = $minCentroid;
		}

		return $mapping;
	}

	function updateCentroids($mapping, $data, $k) {
		$centroids = array();
		$counts = array_count_values($mapping);

		foreach($mapping as $documentID => $centroidID) {
			foreach($data[$documentID] as $dim => $value) {
				if(!isset($cenntroids[$centroidID][$dim])) {
					$centroids[$centroidID][$dim] = 0;
				}
				$centroids[$centroidID][$dim] += ($value/$counts[$centroidID]); 
			}
		}

		if(count($centroids) < $k) {
			$centroids = array_merge($centroids, $this->inicializar_centroides($data, $k - count($centroids)));
		}

		return $centroids;
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

}// location: ./application/libraries/Kmeans.php
