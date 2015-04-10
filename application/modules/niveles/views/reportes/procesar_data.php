<?php


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

?>