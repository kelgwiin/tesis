<?php echo $ayer."<br>"; ?>

<?php //echo $cantidad_ans."<br>"; ?>

<?php echo count($acuerdos_nivel)."<br>"; ?>

<?php 

	//$hola = false;

	//echo $hola.'<br>';

	foreach ($acuerdos_nivel as $acuerdo) {
		echo $acuerdo['comprometido']."<br>";
		//echo $acuerdo['violado']."<br>";

	}


?>