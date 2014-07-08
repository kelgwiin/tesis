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

// IMPRIME UN MENSAJE EN MODO ALERT
function print_alert($message='',$alert_type='success')
{
	$header = '<div class="alert alert-'.$alert_type.' alert-dismissable" style="text-align: center">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
	$footer = '</div>';
	echo $header.$message.$footer;
}

// RETORNA LOS BREADCRUMBS NADA MAS DE IMPRIMIRLOS CON echo
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