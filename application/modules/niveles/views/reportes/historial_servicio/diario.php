
<br>

<div class="row">
	 <div class="col-md-3 col-md-offset-3">
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
		        <?php echo form_dropdown('servicios', $options,set_value('servicios','1'),'class="form-control" id="dropdown_servicios" '); ?>
		  </div>
		  <div class="form-group">
			<div>
				<label style="color:red;" id="error_servicio">
					
				</label>
			</div>
		</div>
	  </div>
	   <div class="col-md-2">
		<div class="form-group">
		          <div class="required">
		          <label for="service_name" class="control-label">Día</label>
		          </div> 
		          <div>
			<div class="input-group">
				<input type='text' name="dia_historial" class="form-control" id='dia_historial' value="02/28/2015"/>
				<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			</div>
		          </div>

		  </div>
		   <div class="form-group">
			<div>
				<label style="color:red;" id="error_dia">
					
				</label>
			</div>
		</div>
	</div>

	<div class="col-md-2">
	      <div>
	       <label  class="control-label"> <br> </label>
	     </div>

	     <div class="">
		<a class="btn btn-info" id="buscar_historial" onclick="mostrarHistorial();"> <i class="fa fa-search"></i> Buscar </a>
	     </div>
	 </div>

</div>



<div id='informacion_historial' style="display:none">
<hr>

	<div class="row" style=" padding: 45px;">
		<div class="well well-sm"><h4>Datos de los Procesos que soportan al Servicio</h4></div>
		<div  class="col-md-5">
		     <div class="panel panel-primary">
		     	<div class="panel-heading"><b>Datos de Disponibilidad y Caídas</b></div>
	  		<div class="panel-body"><br>
			<table class="table table-bordered">
				<tr>
					<td width="40%" class="active"><b>Disponibilidad (%)</b></td>
					<td class='text-center' id="disponibilidad"></td>
				</tr>	
				<tr>
					<td width="40%" class="active"><b>Tiempo Disponible</b> </td>
					<td class='text-center' id="tiempo_online"></td>
				</tr>	
				<tr>
					<td width="40%" class="active" ><b>Numero de Caídas</b></td>
					<td class='text-center' id='numero_caidas'></td>
				</tr>	
				<tr>
					<td width="40%" class="active"><b>Tiempo Total Caído</b></td>
					<td class='text-center' id="tiempo_caido"></td>
				</tr>	
				<tr>
					<td width="40%" class="active"><b>Duración de Caída mas Larga</b></td>
					<td class='text-center' id="mayor_caida"></td>
				</tr>
				<tr>
					<td width="40%" class="active"><b>Duración de Caída mas Corta</b></td>
					<td class='text-center' id="menor_caida"></td>
				</tr>		
			</table>
			<small>* Los tiempos son mostrados en base a 24hrs (hh:mm:ss) </small>
			</div>
		   </div>
		</div>
		

		<div  class="col-md-7">

		   <div class="panel panel-primary" style="height: 405px;">
		   	<div class="panel-heading"><b> Caídas Registradas por Servicio</b></div>
	  		<div class="panel-body">

	  			<div class="table-responsive" id='tabla_servicio'>

	                            	</div>

	  		</div>
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
	                            	<small>* Los tiempos son mostrados en base a 24hrs (hh:mm:ss) </small>

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


