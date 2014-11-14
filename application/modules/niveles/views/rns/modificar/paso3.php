
	
 
    <h3 > <b>Atención al Cliente</b><small><a type="button" class="btn btn-xs" data-toggle="modal" data-target="#ayuda_atencion_acuerdo">
 	(<i class="fa fa-info-circle"></i> <u>Ayuda</u>)</a></small></h3> <hr><br>
   <div class="row">
	  <div class="form-group">

			        <div class="col-md-offset-1 required">
						<label for="tipo_servicio" class="col-md-2 control-label text-right">Soporte del Servicio</label>		    
					</div>

			        <div class="col-md-8">
			            <?php $data = array(
			            		'value' => set_value('soporte',@$requisito->soporte_tecnico),
		                        'name'        => 'soporte',
		                        'id'          => 'soporte', 
		                        'class'          => 'form-control boxsizingBorder',
		                        'placeholder' => '',
		                        //'rows' => '6',                           
		                                  );
		                echo form_textarea($data)?>
			        </div>
	 </div>
	 	<div class="form-group">
	     <div class="control-label col-md-3">
	      </div>
	      	<div class="col-md-8">
			    <label style="color:red;">
			   	<?php 
			        echo form_error('soporte');
				 ?>
				</label>
			</div>
		</div>
   </div><br>


  <h3 > <b> Tiempos de Respuesta y de Resolución de Problemas</b><small><a type="button" class="btn btn-xs" data-toggle="modal" data-target="#ayuda_resolucion_acuerdo">
 	(<i class="fa fa-info-circle"></i> <u>Ayuda</u>)</a></small></h3> <hr><br>


 	En esta sección se describen los niveles de prioridad y se definen los tiempos de respuesta y tiempos de resolución.<br><br>

 	<div class=""><h4 > 
 	 		<label class="control-label"><b><u> Niveles de Prioridad</u>: </b></h4></label>
	</div>

 	<div class="row">

		<div class="col-md-7">
			<table class="table table-bordered" style="background-color:white;">
		    <thead class="text-center">
		    	<tr style="background-color:grey; color:#FFFFFF;">
		    		<td><b>Nivel de Prioridad</b></td>
		    		<td><b>Definición</b></td>
		    	</tr>
		    </thead>
		    <tbody>
		    	<tr >
		    		<td class="text-center"><span class="label label-danger"><b>Cr&#237;tico</b></span></td>
		    		<td>Degradación completa - Todos los usuarios y funciones críticas afectadas. Servicio completamente sin disponibilidad.</td>
		    	</tr>
		    	<tr >
		    		<td class="text-center"><span class="label" style="background-color:#FF6600;" ><b>Severo</b> </span></td>
		    		<td>Degradación significativa - Gran número de usuarios o funciones críticas afectadas.</td>
		    	</tr>
		    	<tr >
		    		<td class="text-center"><span class="label" style="background-color:#FFCC66;"><b>Medio</b> </span></td>
		    		<td>Degradación limitada - Un limitado número de usuarios o funciones afectadas. Los Procesos de Negocio pueden continuar. </td>
		    	</tr>
		    	<tr >
		    		<td class="text-center"><span class="label label-default"><b>Menor</b> </span></td>
		    		<td>Degradación Pequeña  - Pocos usuarios o un usuario afectado. Los Procesos de Negocio pueden continuar.</td>
		    	</tr>
		    </tbody>
		</table>

		</div>
	</div><br><br>


	
	<div class="required"><h4 > 
 	 		<label class="control-label"><b> Tiempos de Respuesta y de Resolución</b></h4></label>
	</div><br>

	<div class="row">

		<div class="col-md-12">
			<table class="table table-bordered" style="background-color:white;">
		    <thead class="text-center" width="10%">
		    	<tr style="background-color:grey; color:#FFFFFF;">

		    		<td><b>Medida</b></td>
		    		<td><b>Cr&#237;tico</b></td>
		    		<td><b>Severo</b></td>
		    		<td><b>Medio</b></td>
		    		<td><b>Menor</b></td>
		    	</tr>
		    </thead>
		    <tbody>
		    	<tr >
		    		<td><b>Tiempo de Respuesta</b></td>
		    		<td>
		    		    <div class="col-md-4">
		    			 <input type='text' class="form-control" id='tiempo_respuesta_critico' name='tiempo_respuesta_critico' value="<?php echo set_value('tiempo_respuesta_critico',@$requisito->tiempo_respuesta_critico);?>" data-toggle="tooltip" data-placement="bottom" title="Solo numeros enteros"/>
		    			</div>
		    			<div class="col-md-7">
		    			<?php
					       	$options = array(
					       	  'seleccione' => 'Seleccione',
					       	  'segundos' => 'Segundos',
					       	  'minutos' => 'Minutos',
					       	  'horas' => 'Horas',
					       	  'dias' => 'Días'
			                );
					        ?>
				            <?php echo form_dropdown('unidad_respuesta_critico', $options,set_value('unidad_respuesta_critico',@$requisito->unidad_respuesta_critico),'class="form-control" id="dropdown_unidad_respuesta_critico"'); ?>
			      		 </div>
			      		 <div class="form-group">
						     <div class="col-md-4 text-right">
						     	<label style="color:red;">
								   	<?php 
								        echo form_error('tiempo_respuesta_critico');
									 ?>
									</label>
						      </div>
						      	<div class="col-md-7">
								    <label style="color:red;">
								   	<?php 
								        echo form_error('unidad_respuesta_critico');
									 ?>
									</label>
								</div>
							</div>

		    		</td>

		    		<td>
		    		    <div class="col-md-4">
		    			 <input type='text' class="form-control" id='tiempo_respuesta_severo' name='tiempo_respuesta_severo' value="<?php echo set_value('tiempo_respuesta_severo',@$requisito->tiempo_respuesta_severo);?>" data-toggle="tooltip" data-placement="bottom" title="Solo numeros enteros"/>
		    			</div>
		    			<div class="col-md-7">
		    			<?php
					       	$options = array(
					       	  'seleccione' => 'Seleccione',
					       	  'segundos' => 'Segundos',
					       	  'minutos' => 'Minutos',
					       	  'horas' => 'Horas',
					       	  'dias' => 'Días'
			                );
					        ?>
				            <?php echo form_dropdown('unidad_respuesta_severo', $options,set_value('unidad_respuesta_severo',@$requisito->unidad_respuesta_severo),'class="form-control" id="dropdown_unidad_respuesta_severo"'); ?>
			      		 </div>

			      		 <div class="form-group">
						     <div class="col-md-4 text-right">
						     	<label style="color:red;">
								   	<?php 
								        echo form_error('tiempo_respuesta_severo');
									 ?>
									</label>
						      </div>
						      	<div class="col-md-7">
								    <label style="color:red;">
								   	<?php 
								        echo form_error('unidad_respuesta_severo');
									 ?>
									</label>
								</div>
							</div>

		    		</td>

		    		<td>
		    		    <div class="col-md-4">
		    			 <input type='text' class="form-control" id='tiempo_respuesta_medio' name='tiempo_respuesta_medio' value="<?php echo set_value('tiempo_respuesta_medio',@$requisito->tiempo_respuesta_medio);?>" data-toggle="tooltip" data-placement="bottom" title="Solo numeros enteros"/>
		    			</div>
		    			<div class="col-md-7">
		    			<?php
					       	$options = array(
					       	  'seleccione' => 'Seleccione',
					       	  'segundos' => 'Segundos',
					       	  'minutos' => 'Minutos',
					       	  'horas' => 'Horas',
					       	  'dias' => 'Días'
			                );
					        ?>
				            <?php echo form_dropdown('unidad_respuesta_medio', $options,set_value('unidad_respuesta_medio',@$requisito->unidad_respuesta_medio),'class="form-control" id="dropdown_unidad_respuesta_medio"'); ?>
			      		 </div>
			      		 <div class="form-group">
						     <div class="col-md-4 text-right">
						     	<label style="color:red;">
								   	<?php 
								        echo form_error('tiempo_respuesta_medio');
									 ?>
									</label>
						      </div>
						      	<div class="col-md-7">
								    <label style="color:red;">
								   	<?php 
								        echo form_error('unidad_respuesta_medio');
									 ?>
									</label>
								</div>
							</div>

		    		</td>

		    		<td>
		    		    <div class="col-md-4">
		    			 <input type='text' class="form-control" id='tiempo_respuesta_menor' name='tiempo_respuesta_menor' value="<?php echo set_value('tiempo_respuesta_menor',@$requisito->tiempo_respuesta_menor);?>" data-toggle="tooltip" data-placement="bottom" title="Solo numeros enteros"/>
		    			</div>
		    			<div class="col-md-7">
		    			<?php
					       	$options = array(
					       	  'seleccione' => 'Seleccione',
					       	  'segundos' => 'Segundos',
					       	  'minutos' => 'Minutos',
					       	  'horas' => 'Horas',
					       	  'dias' => 'Días'
			                );
					        ?>
				            <?php echo form_dropdown('unidad_respuesta_menor', $options,set_value('unidad_respuesta_menor',@$requisito->unidad_respuesta_menor),'class="form-control" id="dropdown_unidad_respuesta_menor"'); ?>
			      		 </div>
			      		 <div class="form-group">
						     <div class="col-md-4 text-right">
						     	<label style="color:red;">
								   	<?php 
								        echo form_error('tiempo_respuesta_menor');
									 ?>
									</label>
						      </div>
						      	<div class="col-md-7">
								    <label style="color:red;">
								   	<?php 
								        echo form_error('unidad_respuesta_menor');
									 ?>
									</label>
								</div>
							</div>

		    		</td>
		    	</tr>
		    	<tr >
		    		<td><b>Tiempo de Resolución</b></td>
		    		<td>
		    		    <div class="col-md-4">
		    			 <input type='text' class="form-control" id='tiempo_resolucion_critico' name='tiempo_resolucion_critico' value="<?php echo set_value('tiempo_resolucion_critico',@$requisito->tiempo_resolucion_critico);?>"  data-toggle="tooltip" data-placement="bottom" title="Solo numeros enteros"/>
		    			</div>
		    			<div class="col-md-7">
		    			<?php
					       	$options = array(
					       	  'seleccione' => 'Seleccione',
					       	  'segundos' => 'Segundos',
					       	  'minutos' => 'Minutos',
					       	  'horas' => 'Horas',
					       	  'dias' => 'Días'
			                );
					        ?>
				            <?php echo form_dropdown('unidad_resolucion_critico', $options,set_value('unidad_resolucion_critico',@$requisito->unidad_resolucion_critico),'class="form-control" id="dropdown_unidad_resolucion_critico"'); ?>
			      		 </div>
			      		 <div class="form-group">
						     <div class="col-md-4 text-right">
						     	<label style="color:red;">
								   	<?php 
								        echo form_error('tiempo_resolucion_critico');
									 ?>
									</label>
						      </div>
						      	<div class="col-md-7">
								    <label style="color:red;">
								   	<?php 
								        echo form_error('unidad_resolucion_critico');
									 ?>
									</label>
								</div>
							</div>

		    		</td>

		    		<td>
		    		    <div class="col-md-4">
		    			 <input type='text' class="form-control" id='tiempo_resolucion_severo' name='tiempo_resolucion_severo' value="<?php echo set_value('tiempo_resolucion_severo',@$requisito->tiempo_resolucion_severo);?>" data-toggle="tooltip" data-placement="bottom" title="Solo numeros enteros"/>
		    			</div>
		    			<div class="col-md-7">
		    			<?php
					       	$options = array(
					       	  'seleccione' => 'Seleccione',
					       	  'segundos' => 'Segundos',
					       	  'minutos' => 'Minutos',
					       	  'horas' => 'Horas',
					       	  'dias' => 'Días'
			                );
					        ?>
				            <?php echo form_dropdown('unidad_resolucion_severo', $options,set_value('unidad_resolucion_severo',@$requisito->unidad_resolucion_severo),'class="form-control" id="dropdown_unidad_resolucion_severo"'); ?>
			      		 </div>
			      		  <div class="form-group">
						     <div class="col-md-4 text-right">
						     	<label style="color:red;">
								   	<?php 
								        echo form_error('tiempo_resolucion_severo');
									 ?>
									</label>
						      </div>
						      	<div class="col-md-7">
								    <label style="color:red;">
								   	<?php 
								        echo form_error('unidad_resolucion_severo');
									 ?>
									</label>
								</div>
							</div>

		    		</td>

		    		<td>
		    		    <div class="col-md-4">
		    			 <input type='text' class="form-control" id='tiempo_resolucion_medio' name='tiempo_resolucion_medio' value="<?php echo set_value('tiempo_resolucion_medio',@$requisito->tiempo_resolucion_medio);?>" data-toggle="tooltip" data-placement="bottom" title="Solo numeros enteros"/>
		    			</div>
		    			<div class="col-md-7">
		    			<?php
					       	$options = array(
					       	  'seleccione' => 'Seleccione',
					       	  'segundos' => 'Segundos',
					       	  'minutos' => 'Minutos',
					       	  'horas' => 'Horas',
					       	  'dias' => 'Días'
			                );
					        ?>
				            <?php echo form_dropdown('unidad_resolucion_medio', $options,set_value('unidad_resolucion_medio',@$requisito->unidad_resolucion_medio),'class="form-control" id="dropdown_unidad_resolucion_medio"'); ?>
			      		 </div>
			      		  <div class="form-group">
						     <div class="col-md-4 text-right">
						     	<label style="color:red;">
								   	<?php 
								        echo form_error('tiempo_resolucion_medio');
									 ?>
									</label>
						      </div>
						      	<div class="col-md-7">
								    <label style="color:red;">
								   	<?php 
								        echo form_error('unidad_resolucion_medio');
									 ?>
									</label>
								</div>
							</div>

		    		</td>

		    		<td>
		    		    <div class="col-md-4">
		    			 <input type='text' class="form-control" id='tiempo_resolucion_menor' name='tiempo_resolucion_menor' value="<?php echo set_value('tiempo_resolucion_menor',@$requisito->tiempo_resolucion_menor);?>" data-toggle="tooltip" data-placement="bottom" title="Solo numeros enteros"/>
		    			</div>
		    			<div class="col-md-7">
		    			<?php
					       	$options = array(
					       	  'seleccione' => 'Seleccione',
					       	  'segundos' => 'Segundos',
					       	  'minutos' => 'Minutos',
					       	  'horas' => 'Horas',
					       	  'dias' => 'Días'
			                );
					        ?>
				            <?php echo form_dropdown('unidad_resolucion_menor', $options,set_value('unidad_resolucion_menor',@$requisito->unidad_resolucion_menor),'class="form-control" id="dropdown_unidad_resolucion_menor"'); ?>
			      		 </div>
			      		  <div class="form-group">
						     <div class="col-md-4 text-right">
						     	<label style="color:red;">
								   	<?php 
								        echo form_error('tiempo_resolucion_menor');
									 ?>
									</label>
						      </div>
						      	<div class="col-md-7">
								    <label style="color:red;">
								   	<?php 
								        echo form_error('unidad_resolucion_menor');
									 ?>
									</label>
								</div>
							</div>

		    		</td>
		    	</tr>
		     </tbody>
		</table>

		
		</div>
	</div>

 		


   <br><br><br><hr>

  <div class='row tex'>
	 <div class="col-md-1 col-md-offset-2">
	 <a id="back-step-3" class="btn btn-default">Volver</a>
	 </div>
	<div class="col-md-1">
	<button data-toggle="modal" data-target="#modificar" class="btn btn-warning"> Actualizar Requisto de Niveles de Servicio</button>
	 </div>

	 <div class="col-md-1 col-md-offset-4">
	 <a class="btn btn-danger" data-toggle="modal" data-target="#salir_modal">Cancelar</a>
	 </div>
 </div><br>



  <div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		      
		      </div>
		      <div class="modal-body text-center">
		        <p><div class="alert alert-warning" role="alert"><i class="fa fa-exclamation-triangle"></i> ¿Est&#225; seguro que desea <b>Actualizar</b> este Requisito de Niveles de Servicio?</div></p>
		      </div>
		      <div class="modal-footer">
		      	<button type="submit" id="actualizar_confirm" class="btn btn-warning">Actualizar</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>      
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->


			                