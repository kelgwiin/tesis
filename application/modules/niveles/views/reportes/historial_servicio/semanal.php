<br>

<div class="row">
	 <div class="col-md-3 col-md-offset-4">
		  <div class="form-group">
		       <div class="required">
		       <label  class="control-label">Servicio</label>
		     </div> 
		     <?php
		        $options = array(
		        'seleccione' => 'Seleccione un Servicio',		        	  
		         );
		      foreach($servicios as $servicio)	{ 
		      $options[$servicio->servicio_id] = $servicio->nombre;
		       }?>
		        <?php echo form_dropdown('servicios', $options,set_value('servicios',''),'class="form-control" id="dropdown_servicios_semanal" '); ?>
		  </div>
		  <div class="form-group">
			<div>
				<label style="color:red;" id="error_servicio_semanal">
					
				</label>
			</div>
		</div>
	  </div>

</div>

<div class="row">
	<div id='no_acuerdos_semanal' style="display:none">
	<div class="alert alert-warning col-md-8 col-md-offset-2 text-center" role="alert"> <b>No existen ANS establecidos para este Servicio</b>.
			 <br>Para generar un reporte debe existir por lo menos un ANS establecido para el Servicio consultado. <br>Sí desea crea un ANS puede hacer click <a target="_blank" href="<?php echo base_url().'index.php/niveles_de_servicio/gestion_ANS/crear_ANS'?>">aquí</a>.</div>
	</div>
</div>


<div class="row" id="opciones_reporte_semanal" style="display:none">

	 <div class="col-md-4 col-md-offset-2">
		  <div class="form-group">
		       <div class="required">
		       <label  class="control-label">Acuerdo de Niveles de Servicio</label>
		     </div> 
		     <select id="dropdown_acuerdos_semanal" name="acuerdos" class="form-control">
		     	<option value="seleccione">Seleccione un Acuerdo</option>
		     </select>
		  </div>
		  <div class="form-group">
			<div>
				<label style="color:red;" id="error_acuerdos_semanal">
					
				</label>
			</div>
		</div>
	  </div>
	
	   <div class="col-md-2">
		<div class="form-group">
		          <div class="required">
		          <label for="service_name" class="control-label">Inicio de Semana</label>
		          </div> 
		          <div>
			<div class="input-group">
				<input type='text' name="dia_historial" class="form-control" id='dia_historial_semanal' value="03/16/2015"/>
				<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			</div>
		          </div>

		  </div>
		   <div class="form-group">
			<div>
				<label style="color:red;" id="error_semanal">
					
				</label>
			</div>
		</div>
	</div>

	<div class="col-md-2">
	      <div>
	       <label  class="control-label"> <br> </label>
	     </div>

	     <div class="">
		<a class="btn btn-info" id="buscar_historial_semanal" onclick="mostrarHistorialSemanal();"> <i class="fa fa-file-text"></i>  Generar Reporte  </a>
	     </div>
	  </div>

</div>


<div id='informacion_historial_semanal' style="display:none">
<hr>

	<div class="row" style=" padding: 45px;">
		<div class="well well-sm"><h4>Datos de Niveles de Servicio</h4></div>
		<div  class="col-md-7">
		     <div class="panel panel-primary">
		     	<div class="panel-heading"><b>Datos de Disponibilidad y Caídas</b></div>
	  		<div class="panel-body"><br>
			<table class="table table-bordered">
				<tr>
					<td width="40%" style="border-top:  hidden; border-left:  hidden" ></td>
					<td width="20%" class="active text-center"><b>Resultado Obtenido</b></td>
					<td class='text-center active'><b>Objetivos del ANS</b></td>
				</tr>
				<tr>
					<td width="40%" class="active"><b>Disponibilidad (%)</b></td>
					<td width="20%" class='text-center' id="disponibilidad_semanal"></td>
					<td class='text-center' id="disponibilidad_ANS_semanal"></td>
				</tr>	
				<tr>
					<td width="40%" class="active"><b>Tiempo Disponible</b> </td>
					<td class='text-center' id="tiempo_online_semanal"></td>
					<td class='text-center' id="tiempo_online_ANS_semanal"></td>
				</tr>	
				<tr>
					<td width="40%" class="active" ><b>Numero de Caídas</b></td>
					<td class='text-center' id='numero_caidas_semanal'  style="vertical-align:middle;"></td>
					<td  id='numero_caidas_ANS_semanal'></td>
				</tr>	
				<tr>
					<td width="40%" class="active"><b>Tiempo Total Caído</b></td>
					<td class='text-center' id="tiempo_caido_semanal"></td>
					<td rowspan="3" id="tiempo_caido_ANS_semanal"></td>
				</tr>	
				<tr>
					<td width="40%" class="active"><b>Duración de Caída mas Larga</b></td>
					<td class='text-center' id="mayor_caida_semanal"></td>
				</tr>
				<tr>
					<td width="40%" class="active"><b>Duración de Caída mas Corta</b></td>
					<td class='text-center' id="menor_caida_semanal"></td>
				</tr>		
			</table>
			<small><i class='fa fa-clock-o'></i> El formato del tiempo es horas/minutos/segundos (hh:mm:ss) </small>
			</div>
		   </div>
		</div>
		

		<div  class="col-md-5">

		   <div class="panel panel-primary" style="height: 554px;">
		   	<div class="panel-heading"><b> Caídas Registradas por Servicio</b></div>
	  		<div class="panel-body">

	  			<div class="table-responsive" id='tabla_servicio_semanal'>

	                            	</div>

	  		</div>
		   </div>

		</div>

	</div>

	<div class="row" style="padding: 20px; margin-top: -70px; margin-bottom: -40px">
		<div class="panel panel-default">
		  <div class="panel-body">
		   	<!--<div style="width: 600px; height: 400px; margin: 0 auto">-->
				<div id="container-disponibilidad-semanal" style="width: 300px; height: 200px; float: left; vertical-align:middle;"></div>
				<div id="container-caidas-semanal" style="width: 220px; height: 220px; float: left"></div>
				<div id="container-tiempo-caido-semanal" style="width: 220px; height: 220px; float: left"></div>
				<div id="container-mayor-caida-semanal" style="width: 220px; height: 220px; float: left"></div>
				<div id="container-menor-caida-semanal" style="width: 200px; height: 220px; float: left"></div>
			<!--</div>-->
		  </div>
		</div>


	</div>

	<hr>

	<div  class="row" style="padding: 45px;">
	<div class="well well-sm"><h4>Datos de los Procesos que soportan al Servicio</h4></div>	
		<div  class="col-md-6">
		      <div class="panel panel-primary">
		   	<div class="panel-heading"><b> Procesos Críticos que Soportan al Servicio</b></div>
	  		<div class="panel-body">

	  			<div class="table-responsive" id='tabla_info'>

	                            	</div>
	                            	<small><i class='fa fa-clock-o'></i> El formato del tiempo es horas/minutos/segundos (hh:mm:ss) </small>

	  		</div>
		   </div>
		</div>

		<div  class="col-md-6">
		   <div class="panel panel-primary">
		   	<div class="panel-heading"><b> Caídas Registradas por Procesos que Soportan al Servicio</b></div>
	  		<div class="panel-body">

	  			<div class="table-responsive" id='tabla_procesos'>

	                            	</div>
	                            	

	  		</div>
		   </div>
		 </div>

	</div>

	<hr>

<div class="row" style="padding: 45px;">
<div class="well well-sm"><h4>Gráficos de Comportamiento de los Procesos</h4></div>
	<div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1default_procesos" data-toggle="tab">Disponibilidad</a></li>
                            <li><a href="#tab2default_procesos" data-toggle="tab">Numero de Caídas</a></li>
                            <li><a href="#tab3default_procesos" data-toggle="tab">Tiempo Caído</a></li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1default_procesos"><div id='grafica_disponibilidad_procesos' class="col-md-offset-2" style="height: 500px; width: 750px; "></div></div>
                        <div class="tab-pane fade" id="tab2default_procesos"><div id='grafica_caidas_procesos' class="col-md-offset-2" style="height: 500px; width: 750px;"></div></div>
                        <div class="tab-pane fade" id="tab3default_procesos"><div id='grafica_tiempo_procesos' class="col-md-offset-2" style="height: 500px; width: 750px;"></div></div>
                    </div>
                </div>
            </div>
</div>

</div>



	<!--<div  class="col-md-6">

		<div id="container123" style="min-width: 310px; height: 350px; margin: 0 auto"></div>
	</div>

	<div  class="col-md-6">

		<div id="container1234" style="min-width: 310px; height: 350px; margin: 0 auto">  </div>
	</div>-->