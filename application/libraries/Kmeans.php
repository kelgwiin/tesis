<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author Kelwin Gamez 
 * Fecha de creación: 02-06-2014
 *
 * Algoritmo de Kmeans
 */
class Kmeans{
	public function __construct(){

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

		// Lets normalise the input data
		foreach($data as $key => $d) {
			$data[$key] = $this->normaliseValue($d, sqrt($d[0]*$d[0] + $d[1] * $d[1]));
		}
		echo 'Normalised Data<br>';
		echo_pre($data);

		$result = $this->kMeans($data, 3);

		echo_pre($result);
	}


	function initialiseCentroids(array $data, $k) {
		$dimensions = count($data[0]);
		$centroids = array();
		$dimmax = array();
		$dimmin = array(); 
		foreach($data as $document) {
			foreach($document as $dim => $val) {
				if(!isset($dimmax[$dim]) || $val > $dimmax[$dim]) {
					$dimmax[$dim] = $val;
				}
				if(!isset($dimmin[$dim]) || $val < $dimmin[$dim]) {
					$dimmin[$dim] = $val;
				}
			}
		}
		for($i = 0; $i < $k; $i++) {
			$centroids[$i] = $this->initialiseCentroid($dimensions, $dimmax, $dimmin);
		}
		return $centroids;
	}

	function initialiseCentroid($dimensions, $dimmax, $dimmin) {
		$total = 0;
		$centroid = array();
		for($j = 0; $j < $dimensions; $j++) {
			$centroid[$j] = (rand($dimmin[$j] * 1000, $dimmax[$j] * 1000));
			$total += $centroid[$j] * $centroid[$j];
		}
		$centroid = $this->normaliseValue($centroid, sqrt($total));
		return $centroid;
	}

	function kMeans($data, $k) {
		$centroids = $this->initialiseCentroids($data, $k);
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
			$centroids = array_merge($centroids, $this->initialiseCentroids($data, $k - count($centroids)));
		}

		return $centroids;
	}

	function normaliseValue(array $vector, $total) {
		foreach($vector as &$value) {
			$value = $value/$total;
		}
		return $vector;
	}

}// location: ./application/libraries/Kmeans.php
