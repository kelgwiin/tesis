<!DOCTYPE html>
<html>
    <head>
        <title>PDF TEMPLATE</title>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    </head>
    <body>
    	<table width="100%">
    		<tr style="background-color: #3a87ad;">
    			<td style="text-align: center; vertical-align: middle; height: 60px; color: white">
    				<h2>Informe de Plan de Continuidad del Negocio</h2>
    			</td>
    		</tr>
    	</table>
    	<br />
    	
    	<h3>Datos generales</h3>
    	<p>
    		El siguiente es el Plan de Continuidad del Negocio "<?php echo $pcn['codigo'] ?>" de tipo <?php echo $pcn['tipo_plan'] ?>,
    		denominado "<?php echo $pcn['denominacion'] ?>" para tratar la amenaza de <?php echo $amenaza->denominacion ?>.
    	</p>
    	<p>
    		El responsable del presente PCN es el <?php echo $encargado->cargo ?> <strong><?php echo $encargado->nombre ?></strong>
    		del departamento <?php echo ucfirst($encargado->nombre_dpto) ?>, a continuación se presentan sus datos.</p>
    	
    	<table width="100%">
    		<tr>
    			<td width="35%"><strong>Departamento: </strong></td>
    			<td width="65%"><?php echo ucfirst($encargado->nombre_dpto) ?></td>
    		</tr>
    		<tr>
    			<td><strong>Cargo: </strong></td>
    			<td><?php echo $encargado->cargo ?></td>
    		</tr>
    		<tr>
    			<td><strong>Código de empleado: </strong></td>
    			<td><?php echo $encargado->codigo_empleado ?></td>
    		</tr>
    		<tr>
    			<td><strong>C.I: </strong></td>
    			<td><?php echo $encargado->cedula ?></td>
    		</tr>
    		<tr>
    			<td><strong>Emails: </strong></td>
    			<td><?php echo $encargado->email_corporativo.' | '.$encargado->email_personal ?></td>
    		</tr>
    		<tr>
    			<td><strong>Teléfonos: </strong></td>
    			<td><?php echo $encargado->tlfn_corporativo.' | '.$encargado->tlfn_personal ?></td>
    		</tr>
    	</table>
    	<hr />
    	
    	<h3>Equipos de trabajo</h3>
    	
    	<?php foreach($equipos as $key => $team) : ?>
    		<h4><?php echo $team->denominacion ?></h4>
    		<p style="text-align: justify"><?php echo $pcn['desc_'.$team->tipo_equipo] ?></p>
    		<p>
    			<span><strong>Equipo:</strong> <?php echo ucfirst($team->nombre_equipo) ?></span>
    			<ul>
    				<?php foreach($team->equipo as $key => $personal) : ?>
    					<li><?php echo $personal->nombre ?></li>
    				<?php endforeach ?>
	    		</ul>
    		</p><br />
    	<?php endforeach ?>
    	<hr />
    	<h3>Otras consideraciones</h3>
    	<p style="text-align: justify"><?php echo $pcn['consideraciones'] ?></p>
    	<hr />
    	<h3>Información de contacto</h3>
    	<?php foreach($involucrados as $key => $personal) : ?>
    		<strong style="font-size: 11px"><?php echo $personal->nombre ?></strong>
    		<ul>
    			<li style="font-size: 11px"><strong>Código de empleado: </strong><?php echo $personal->codigo_empleado ?></li>
	    		<li style="font-size: 11px"><strong>Cargo: </strong><?php echo $personal->cargo ?></li>
	    		<li style="font-size: 11px"><strong>Departamento: </strong><?php echo ucfirst($personal->nombre_dpto) ?></li>
	    		<li style="font-size: 11px"><strong>Cédula: </strong><?php echo $personal->cedula ?></li>
	    		<li style="font-size: 11px"><strong>Emails: </strong><?php echo $personal->email_corporativo.' | '.$personal->email_personal ?></li>
	    		<li style="font-size: 11px"><strong>Teléfonos: </strong><?php echo $personal->tlfn_corporativo.' | '.$personal->tlfn_personal ?></li>
    		</ul>
    	<?php endforeach ?>
    	<br />
    </body>
</html>
