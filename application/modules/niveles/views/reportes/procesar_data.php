<?php

/*echo count($procesos);

$i = 1; 
echo "<br>";

$servicios['chrome'][1] = "Servicio 1";
$servicios['chrome'][2] = "Servicio 2";
$servicios['chrome'][3] = "Servicio 3";
$servicios['vlc'][1] = "Servicio 3";
$servicios['smart'][1] = "Servicio 1";
$servicios['smart'][2] = "Servicio 3";
$servicios['mysql'][1] = "Servicio 1";
$servicios['firefox'][1] = "Servicio 1";
$servicios['firefox'][2] = "Servicio 1";
$servicios['firefox'][3] = "Servicio 1";
$servicios['firefox'][4] = "Servicio 1";

echo count($servicios);
echo '<br>';

echo count($servicios['firefox']);

echo '<br>';*/



/*$i = 1;

foreach($procesos as $proceso)
 { 

 	echo $i;
 	$i++;
 	echo " ".$proceso->comando_ejecutable.": ";

 	
 	for ($j=1; $j <= count($procesos_servicios[$proceso->comando_ejecutable]) ; $j++) { 
 		echo $procesos_servicios[$proceso->comando_ejecutable][$j]->nombre." ";
 		//echo $j;
 	}

 	echo "<br>";
 	
 }*/

 //echo count($historial);
 //echo '<br>';

/*  echo $tiempos[1]->timestamp;
  echo $tiempos[2]->timestamp;

$tiempo_inicio =$tiempos[1]->timestamp;
$inicio = date_create($tiempo_inicio);
$tiempo_inicio = date_format($inicio,"H:i:s");

$tiempo_culminacion = $tiempos[2]->timestamp;
$fin = date_create($tiempo_culminacion);
$tiempo_culminacion = date_format($fin,"H:i:s"); 


$tiempo1 = new DateTime($tiempo_inicio);
$tiempo2 = new DateTime($tiempo_culminacion);
$resta = $tiempo1->diff($tiempo2);
$duracion = $resta->h.":".$resta->i.":".$resta->s;

echo 'horas '.$resta->h." " ;
echo 'minutos '.$resta->i." " ;
echo 'segundos '.$resta->s." " ;

  echo "<br>";*/

foreach($servicios as $servicio)
 { 

 	echo " ".$servicio->nombre."  [".count($servicios_procesos[$servicio->nombre])."] :";


	 for ($j=1; $j <= count($servicios_procesos[$servicio->nombre]) ; $j++) { 
	 		echo $servicios_procesos[$servicio->nombre][$j]->nombre." ";
	 		//echo $j;
	 	}
	 echo "<br>";
	 echo "<br>";
}

 echo "<br>";




/*$cantidad_procesos = count($procesos);
 $i=1;

 foreach($historial as $registro)
 { 

 	if ($i <=  $cantidad_procesos) {
 		echo $registro->timestamp." ";
 	}

 	if ($i == $cantidad_procesos) {
 		echo "revisar estado de los servicios"; 
 		echo "<br>";echo "<br>";
 		$i=1;
 	}
 	else{
 		$i++;
 	}

 }*/

/*  echo "<br>";

 $servicios_caida['chrome'][1] = (object) array('inicio_caida' => '0', 'fin_caida' => '0', 'estado'=>'activo');  

echo $servicios_caida['chrome'][1]->estado;*/

/*$tiempo_inicio ='2015-02-28 2:10:02'; 
					     	$inicio = date_create($tiempo_inicio);
					     	$tiempo_inicio = date_format($inicio,"H:i:s");

					     	$tiempo_culminacion = '2015-02-28 22:11:02'; 
					     	$fin = date_create($tiempo_culminacion);
					     	$tiempo_culminacion = date_format($fin,"H:i:s"); 


					     	$tiempo1 = new DateTime($tiempo_inicio);
						$tiempo2 = new DateTime($tiempo_culminacion);
						$duracion = $tiempo1->diff($tiempo2);
						echo 'horas '.$duracion->h." " ;
						echo 'minutos '.$duracion->i." " ;
						echo 'segundos '.$duracion->s." " ;

if ($tiempo_inicio < $tiempo_culminacion) {
	echo 'el tiempo de inicio es menor';
}*/ 

?>