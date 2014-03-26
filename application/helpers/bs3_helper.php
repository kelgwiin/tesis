<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CodeIgniter File Helpers
 * 
 * [19-03-2014]
 * 
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Kelwin Gamez
 * @since 		Version 1 - 19/03/2014
 */
// ------------------------------------------------------------------------

/**
 * Pagination Boostrap-3
 * [19-03-2014]
 * 
 * Crea la paginación de forma dinámica con el estilo de bs3
 * @access	public
 * @param	Array $config Es un array de la siguiente forma
 * array(
 * 	'total_rows' => ... //número de filas
 *  'per_page' => ... //número de páginas por fila
 *  'cur_page' => ... //página actual tomada del uri
 *  'url' => ...  //url que activa la paginación
 * );
 *        
 * @return	void
 */
if ( ! function_exists('pagination'))
{
	function pagination($config){
		$num_pages = ceil($config['total_rows']/$config['per_page']);
		$url_ = $config['url'].'/';

		echo '<ul class="pagination">';
			//Boton de anterior pág.
		if($config['cur_page'] == 1){
			printf('<li class = "disabled"><a><i class = "fa fa-chevron-left"></i> Ant.</a></li>');
		}else{
			printf('<li><a href = "%s"><i class = "fa fa-chevron-left"></i>  Ant.</a></li>',
				$url_.($config['cur_page']-1));
		}
			//Listado de números de páginas
		for ($i=1; $i <= $num_pages ;$i++) { 
			if($config['cur_page'] == $i){
				printf('<li class = "active"><a href="%s">%d</a></li>',$url_.$i,$i);
			}else{
				printf('<li><a href="%s">%d</a></li>',$url_.$i,$i);
			}
		}

			//Boton de siguiente pág.
		if($config['cur_page'] == $num_pages){
			printf('<li class = "disabled"><a>Sig. <i class = "fa fa-chevron-right"></i></a></li>');
		}else{
			printf('<li><a href = "%s">Sig. <i class = "fa fa-chevron-right"></i></a></li>',
				$url_.($config['cur_page']+1));
		}
		echo '</ul>';
	}
}

	
/**
 * Retorna el nombre completo a partir de una abreviatura
 * [22-03-2014]
 * @param String $abrev_time Nombre de la abreviación del tiempo
 * @return String Cadena especificando el nombre completo asociado al tiempo.
 */
if ( ! function_exists('nomtime'))
{
	function nomtime($abrev_time){
		$complete_name_time = "";
		switch ($abrev_time) {
			case 'DD':
				$complete_name_time = "Día(s)";
				break;

			case 'MM':
				$complete_name_time = "Mes(es)";
				break;
			
			case 'AA':
				$complete_name_time = "Año(s)";
				break;
		}
		return $complete_name_time;
	}
}
/**
 * Retorna el nombre completo a partir de una abreviatura
 * pero en este caso diseñado para el selected
 * [25-03-2014]
 */
if ( ! function_exists('nomtimeS'))
{
	function nomtimeS($abrev_time){
		$complete_name_time = "";
		switch ($abrev_time) {
			case 'DD':
				$complete_name_time = "Día";
				break;

			case 'MM':
				$complete_name_time = "Mes";
				break;
			
			case 'AA':
				$complete_name_time = "Año";
				break;
		}
		return $complete_name_time;
	}
}