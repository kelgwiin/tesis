
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
		        <?php echo form_dropdown('servicios', $options,set_value('servicios',@$servicio_proceso_id),'class="form-control" id="dropdown_servicios" '); ?>
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
				<input type='text' name="dia_historial" class="form-control" id='dia_historial' value=""/>
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

<br>

<div >

</div>


