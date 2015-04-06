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



	<div  class="col-md-6">

		<div id="container123" style="min-width: 310px; height: 350px; margin: 0 auto"></div>
	</div>

	<div  class="col-md-6">

		<div id="container1234" style="min-width: 310px; height: 350px; margin: 0 auto">  </div>
	</div>