<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * IMPRIME DE FORMA ORDENADA EL CONTENIDO DE UN ARRAY Y MATA LA EJECUCION DEL PROGRAMA
 * @param $array Arreglo de elementos a imprimir para el debug
 * @author Fernando Pinto
 */
function die_pre($array = array())
{
    die("<pre>die_pre:<br />".print_r($array, TRUE)."<br />/die_pre</pre>");
}

/* 
 * IMPRIME DE FORMA ORDENADA EL CONTENIDO DE UN ARRAY SIN MATAR LA EJECUCION DEL PROGRAMA
 * @param $array Arreglo de elementos a imprimir para el debug 
 * @author Fernando Pinto
 */
function echo_pre($array = array())
{
    echo "<pre>echo_pre:<br />".print_r($array, TRUE)."<br />/echo_pre</pre>";
}

/* 
 * IMPRIME UN MENSAJE EN MODO ALERT
 * @param $message Mensaje a imprimir como alerta
 * @param $alert_type tipo de alerta a imprimir (info, success, danger, warning)
 * @author Fernando Pinto
 */
function print_alert($message='',$alert_type='success')
{
	$header = '<div class="alert alert-'.$alert_type.' alert-dismissable" style="text-align: center">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
	$footer = '</div>';
	echo $header.$message.$footer;
}

// IMPRIME ALGUNA CONDICION CON UN OPERADOR TERNARIO

function echo_conditional($var='', $cond1='', $cond2='')
{
	echo (isset($var) && !empty($var)) ? $cond1 : $cond2;
}

/* 
 * RETORNA LOS BREADCRUMBS NADA MAS DE IMPRIMIRLOS CON echo
 * @param $breadcrumbs Arreglo asociativo que contiene un URL como key y una denominacion a mostrar como value
 * @return $breadcrumb Retorna una lista con los links de cada estacion del breadcrumb
 * @author Fernando Pinto
 */
function breadcrumbs($breadcrums = array())
{
    $li = '';
    foreach($breadcrums as $key => $bread)
    {
        if($key != '#')
            $li .= '<li><a href="'.$key.'" style="color:#A4A4A4">'.$bread.'</a></li>';
        else
            $li .= '<li class="active"><a>'.$bread.'</a></li>';
    }

    $breadcrumb =
    '<ul class="breadcrumb">
   		<i style="color:#A4A4A4" class="fa fa-flag"></i> '.
        $li.
    '</ul>';
	
    return $breadcrumb;
}

/* 
 * RETORNA LA CADENA SIN ACENTOS, MAYUSCULAS Y ESPACIOS EN BLANCOS
 * @param $cadena String en lenguaje natural
 * @return $cadena Retorna la cadena sin acentos, mayusculas o espacios en blancos
 * @author Fernando Pinto
 */
function reset_string($cadena)
{
    // Sepadador de palabras que queremos utilizar
    $separador = "-";
    // Eliminamos el separador si ya existe en la cadan actual
    $cadena = str_replace($separador, "", $cadena);
    // Remplazo tildes y eñes
    $cadena = strtr($cadena, array('á'=>'a', 'é'=>'e', 'í'=>'i', 'ó'=>'o', 'ú'=>'u'));
    $cadena = strtr($cadena, array('Á'=>'a', 'É'=>'e', 'Í'=>'i', 'Ó'=>'o', 'Ú'=>'u'));
    $cadena = strtr($cadena, array('ñ'=>'n', 'Ñ'=>'n', '.'=>'-'));
    // Convertimos la cadena a minusculas
    $cadena = strtolower($cadena);
    // Remplazo cuarquier caracter que no este entre A-Za-z0-9 por un espacio vacio
    $cadena = trim(preg_replace("[^ A-Za-z0-9]", "", $cadena));
    // Inserto el separador antes definido
    // $cadena = preg_replace("[ \s\s+\t\t+\n\n+\r\r+]", "-", $cadena);
    $cadena = str_replace(' ', '_', $cadena);

    return $cadena;
}
