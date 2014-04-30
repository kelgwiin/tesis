<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// IMPRIME DE FORMA ORDENADA EL CONTENIDO DE UN ARRAY Y MATA LA EJECUCION DEL PROGRAMA
function die_pre($array = array())
{
    die("<pre>die_pre:<br />".print_r($array, TRUE)."<br />/die_pre</pre>");
}

// IMPRIME DE FORMA ORDENADA EL CONTENIDO DE UN ARRAY SIN MATAR LA EJECUCION DEL PROGRAMA
function echo_pre($array = array())
{
    echo "<pre>echo_pre:<br />".print_r($array, TRUE)."<br />/echo_pre</pre>";
}

// IMPRIME ALGUNA CONDICION CON UN OPERADOR TERNARIO
function echo_conditional($var='', $cond1='', $cond2='')
{
	echo (isset($var) && !empty($var)) ? $cond1 : $cond2; 
}