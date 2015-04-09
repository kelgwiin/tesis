

  <h3 > <b> Disponibilidad</b><small><a type="button" class="btn btn-xs" data-toggle="modal" data-target="#ayuda_disponibilidad_acuerdo">
 	(<i class="fa fa-info-circle"></i> <u>Ayuda</u>)</a></small></h3> <hr>


 	 <br>
 	 <div class="required"><h4 > 
 	 		<label class="control-label"><b> Horas de Disponibilidad del Servicio</b></h4></label>
	</div>
	<div>
     En esta secci&#243;n deber&#225; especificar y acordar la disponibilidad de los Servicios
     requeridos. Elabore un horario en el cual el Servicio debe funcionar continuamente sin presentar ca&#237;das.
	</div><br><br>

 	<div class="panel panel-default col-md-3 col-md-offset-1">
 		<div class="panel-body">
 		<h4><u>Selecci&#243;n R&#225;pida - <i>D&#237;as</i></u></h4>
 		<div class="radio">
			  <label>
			    <input type="radio" name="options_dias" id="options_dias_1" value="1" <?php echo set_value('options_dias') == 1 ? "checked" : ""; ?> />
			    24 x 7 (Todos los d&#237;as, a toda hora)
			  </label>
			</div>
		 	<div class="radio">
			  <label>
			    <input type="radio" name="options_dias"   id="options_dias_2" value="2" <?php echo set_value('options_dias') == 2 ? "checked" : ""; ?> />
			    Toda la Semana
			  </label>
			</div>
			<div class="radio">
			  <label>
			    <input type="radio" name="options_dias"  id="options_dias_3" value="3" <?php echo set_value('options_dias') == 3 ? "checked" : ""; ?> />
			    De Lunes a Viernes
			  </label>
			</div>
			<div class="radio">
			  <label>
			    <input type="radio" name="options_dias"  id="options_dias_4" value="4" <?php echo set_value('options_dias') == 4 ? "checked" : ""; ?> />
			    Ninguno (<b>Reseteo de Tabla</b>)
			  </label>
			</div>
			<div class="radio">
			  <label> 
			  </label>
			</div>
		</div>
	</div>

	 <div class="panel panel-default col-md-3">
 		<div class="panel-body">
 		<h4><u>Selecci&#243;n R&#225;pida - <i>Horas</i></u></h4>

 			<div class="radio">
			  <label>
			    <input type="radio" name="options_horas" id="options_horas_1" value="1" <?php echo set_value('options_horas') == 1 ? "checked" : ""; ?> />
			    Todo el D&#237;a (24 horas)
			  </label>
			</div>
		 	<div class="radio">
			  <label>
			    <input type="radio" name="options_horas" id="options_horas_2" value="2" <?php echo set_value('options_horas') == 2 ? "checked" : ""; ?> />
			    Mediod&#237;a (12:00 am - 12:00 pm) 
			  </label>
			</div>
			<div class="radio">
			  <label>
			    <input type="radio" name="options_horas" id="options_horas_3" value="3" <?php echo set_value('options_horas') == 3 ? "checked" : ""; ?> />
			    Mediod&#237;a (12:00 pm - 12:00 am) 
			  </label>
			</div>
			<div class="radio">
			  <label>
			    <input type="radio" name="options_horas" id="options_horas_4" value="4" <?php echo set_value('options_horas') == 4 ? "checked" : ""; ?> />
			    Horario de Trabajo
			  </label>
			</div>
			<div class="radio">
			  <label>
			    <input type="radio" name="options_horas" id="options_horas_5" value="5" <?php echo set_value('options_horas') == 5 ? "checked" : ""; ?> />
			    Ninguno
			  </label>
			</div>
		</div>
	</div>
	<div class="panel panel-default col-md-3 col-md-offset-1">
 		<div class="panel-body">
 			<h4><u>Establecer Horario de Trabajo</i></u></h4>
			<label  class="control-label">Inicio</label><br> 
					 <div class="input-group text-left">
		 				 <span  class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control" id='inicio_trabajo' name='inicio_trabajo' value="<?php echo set_value('inicio_trabajo');?>" />
					 </div><br>
					  <label  class="control-label">Fin</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control" id='fin_trabajo' name='fin_trabajo' value="<?php echo set_value('fin_trabajo');?>" />
					 </div><br>
					 <button type="button" class="btn btn-success btn-xs col-md-offset-3" id="boton_asignar_horario">Asignar Horario de Trabajo</button>
		</div>
	</div>

	<?php if($acuerdo->lunes_disp_ini != NULL) : ?>
		<?php $check_lunes = 1;
			  $lunes_inicio = date("g:i A",strtotime($acuerdo->lunes_disp_ini));
			  $lunes_final = date("g:i A",strtotime($acuerdo->lunes_disp_fin));
		?> 
	<?php else : ?>
	  <?php $check_lunes = 0; ?>  
	<?php endif ?>

	<?php if($acuerdo->martes_disp_ini != NULL) : ?>
		<?php $check_martes = 2;
			  $martes_inicio = date("g:i A",strtotime($acuerdo->lunes_disp_ini));
			  $martes_final = date("g:i A",strtotime($acuerdo->lunes_disp_fin));
		?> 
	<?php else : ?>
	  <?php $check_martes = 0;?>  
	<?php endif ?>

	<?php if($acuerdo->miercoles_disp_ini != NULL) : ?>
		<?php $check_miercoles = 3;
              $miercoles_inicio = date("g:i A",strtotime($acuerdo->lunes_disp_ini));
			  $miercoles_final = date("g:i A",strtotime($acuerdo->lunes_disp_fin));
		?> 
	<?php else : ?>
	  <?php $check_miercoles = 0;?>  
	<?php endif ?>

	<?php if($acuerdo->jueves_disp_ini != NULL) : ?>
		<?php $check_jueves = 4;
			  $jueves_inicio = date("g:i A",strtotime($acuerdo->lunes_disp_ini));
			  $jueves_final = date("g:i A",strtotime($acuerdo->lunes_disp_fin));
		?> 
	<?php else : ?>
	  <?php $check_jueves = 0;?>  
	<?php endif ?>

	<?php if($acuerdo->viernes_disp_ini != NULL) : ?>
		<?php $check_viernes = 5;
			  $viernes_inicio = date("g:i A",strtotime($acuerdo->lunes_disp_ini));
			  $viernes_final = date("g:i A",strtotime($acuerdo->lunes_disp_fin));
		?> 
	<?php else : ?>
	  <?php $check_viernes = 0;?>  
	<?php endif ?>

	<?php if($acuerdo->sabado_disp_ini != NULL) : ?>
		<?php $check_sabado = 6;
			  $sabado_inicio = date("g:i A",strtotime($acuerdo->lunes_disp_ini));
			  $sabado_final = date("g:i A",strtotime($acuerdo->lunes_disp_fin));
		?> 
	<?php else : ?>
	  <?php $check_sabado = 0;?>  
	<?php endif ?>

	<?php if($acuerdo->domingo_disp_ini != NULL) : ?>
		<?php $check_domingo = 7;
		      $domingo_inicio = date("g:i A",strtotime($acuerdo->lunes_disp_ini));
			  $domingo_final = date("g:i A",strtotime($acuerdo->lunes_disp_fin));
		?> 
	<?php else : ?>
	  <?php $check_domingo = 0;?>  
	<?php endif ?>

 	<table class="table table-bordered" style="background-color:white;" id='tabla_disponibilidad'>
	    <thead class="text-center">
	    	<tr style="background-color:grey; color:#FFFFFF;">
	    		<td><input type="checkbox" class="checkbox_dias" id='checkbox_lunes' name='checkbox_lunes' value="1" <?php echo set_value('checkbox_lunes',@ $check_lunes) == 1 ? "checked" : ""; ?>> <b>Lunes</b></td>
	    		<td><input type="checkbox" class="checkbox_dias" id='checkbox_martes' name='checkbox_martes'value="2" <?php echo set_value('checkbox_martes',@ $check_martes) == 2 ? "checked" : ""; ?>> <b>Martes</b></td>
	    		<td><input type="checkbox" class="checkbox_dias" id='checkbox_miercoles' name='checkbox_miercoles'value="3" <?php echo set_value('checkbox_miercoles',$check_miercoles) == 3 ? "checked" : ""; ?>> <b>Mi&#233;rcoles</b></td>
	    		<td><input type="checkbox" class="checkbox_dias" id='checkbox_jueves' name='checkbox_jueves'value="4" <?php echo set_value('checkbox_jueves',@ $check_jueves) == 4 ? "checked" : ""; ?>> <b>Jueves</b></td>
	    		<td><input type="checkbox" class="checkbox_dias" id='checkbox_viernes' name='checkbox_viernes'value="5" <?php echo set_value('checkbox_viernes',@ $check_viernes) == 5 ? "checked" : ""; ?>> <b>Viernes</b></td>
	    		<td><input type="checkbox" class="checkbox_dias" id='checkbox_sabado' name='checkbox_sabado'value="6" <?php echo set_value('checkbox_sabado',@ $check_sabado) == 6 ? "checked" : ""; ?>> <b>S&#225;bado</b></td>
	    		<td><input type="checkbox" class="checkbox_dias" id='checkbox_domingo' name='checkbox_domingo'value="7" <?php echo set_value('checkbox_domingo',@ $check_domingo) == 7 ? "checked" : ""; ?>> <b>Domingo</b></td>
	    	</tr>
	    </thead>
	    <tbody>
	    	<tr>
	    		<td width="14%">	
			    	 <label  class="control-label">Inicio</label><br> 
					 <div class="input-group text-left">
		 				 <span  class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_disponibilidad hora_inicio" id='inicio_lunes' name="inicio_lunes" value="<?php echo set_value('inicio_lunes',@$lunes_inicio);?>"/>
					 </div><br>
					  <label  class="control-label">Fin</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_disponibilidad hora_fin" id='fin_lunes' name="fin_lunes" value="<?php echo set_value('fin_lunes',@$lunes_final);?>" />
					 </div>
			    </td>

	    		<td>
	    		     <label  class="control-label">Inicio</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_disponibilidad hora_inicio" id='inicio_martes'  name="inicio_martes" value="<?php echo set_value('inicio_martes',@$martes_inicio);?>"/>
					 </div><br>
					  <label  class="control-label">Fin</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_disponibilidad hora_fin" id='fin_martes' name="fin_martes" value="<?php echo set_value('fin_martes',@$martes_final);?>"/>
					 </div>
	    		</td>
	    		
	    		<td>
	    		 	<label  class="control-label">Inicio</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_disponibilidad hora_inicio" id='inicio_miercoles' name="inicio_miercoles" value="<?php echo set_value('inicio_miercoles',@$miercoles_inicio);?>"/>
					 </div><br>
					  <label  class="control-label">Fin</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_disponibilidad hora_fin" id='fin_miercoles' name="fin_miercoles" value="<?php echo set_value('fin_miercoles',@$miercoles_final);?>"/>
					 </div>
	    		</td>
	    		
	    		<td>
	    		 	<label  class="control-label">Inicio</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_disponibilidad hora_inicio" id='inicio_jueves' name="inicio_jueves" value="<?php echo set_value('inicio_jueves',@$jueves_inicio);?>"/>
					 </div><br>
					  <label  class="control-label">Fin</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_disponibilidad hora_fin" id='fin_jueves' name="fin_jueves" value="<?php echo set_value('fin_jueves',@$jueves_final);?>"/>
					 </div>
	    		</td>
	    		
	    		<td>
	    		 	<label  class="control-label">Inicio</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_disponibilidad hora_inicio" id='inicio_viernes' name="inicio_viernes" value="<?php echo set_value('inicio_viernes',@$viernes_inicio);?>"/>
					 </div><br>
					  <label  class="control-label">Fin</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_disponibilidad hora_fin" id='fin_viernes' name="fin_viernes" value="<?php echo set_value('fin_viernes',@$viernes_final);?>"/>
					 </div>
	    		</td>
	    		
	    		<td>
	    		 	<label  class="control-label">Inicio</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_disponibilidad hora_inicio" id='inicio_sabado' name="inicio_sabado" value="<?php echo set_value('inicio_sabado',@$sabado_inicio);?>"/>
					 </div><br>
					  <label  class="control-label">Fin</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_disponibilidad hora_fin" id='fin_sabado' name="fin_sabado" value="<?php echo set_value('fin_sabado',@$sabado_final);?>"/>
					 </div>
	    		</td>
	    		<td>
	    		 	<label  class="control-label">Inicio</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_disponibilidad hora_inicio" id='inicio_domingo' name="inicio_domingo" value="<?php echo set_value('inicio_domingo',@$domingo_inicio);?>"/>
					 </div><br>
					  <label  class="control-label">Fin</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_disponibilidad hora_fin" id='fin_domingo' name="fin_domingo" value="<?php echo set_value('fin_domingo',@$domingo_final);?>"/>
					 </div>
	    		</td>
	    	</tr>
	    </tbody>
    </table>

    <div class="form-group" id="error1">
	     <div class="control-label">
	      </div>
	      	<div class="col-md-12">
			    <label style="color:red;" id="error_disponibilidad">
			   	
				</label>
			</div>
	</div>

	<br><br>

    <div class="row">
  		<div class="col-md-5">
	    	<div class="form-group">
				
				<div class="required">
					<label for="service_name" class="col-md-3 control-label">Porcentaje de Disponibilidad</label> 
				</div>

			    <div class="col-md-4">
			       <div class="input-group">
			       <input type='text' class="form-control" id='' name="porcentaje_disponibilidad" value="<?php echo set_value('porcentaje_disponibilidad',@$acuerdo->porcentaje_disp);?>"  data-toggle="tooltip" data-placement="top" title="Valores permitidos de 0 a 100 % (Solo numeros)"/>
			       <span class="input-group-addon"><b>%</b></i></span>
			   	   </div>

			    </div>
			</div>
			
			<div class="form-group">
		     <div class="control-label col-md-3">
		      </div>
		      	<div class="col-md-6">
				    <label style="color:red;">
				   	<?php 
				        echo form_error('porcentaje_disponibilidad');
					 ?>
					</label>
				</div>
			</div>

		</div>
	</div>
		
    <br>
     <div class="row col-md-10 col-md-offset-1">
    	<hr>
    </div><br><br><br>

 	 <div class="required"><h4 > 
 	 		<label class="control-label"><b> Horas de Mantenimiento</b></h4></label>
	</div>

	<div>
		Esta sección especificará los tiempos en que el Proveedor de Servicios requiere de
		restricciones de Servicio. Estas restricciones incluyen mantenimiento rutinario
		del sistema y tiempos fuera de línea no calendarizados.
	</div><br><br>

	<div class="panel panel-default col-md-4 col-md-offset-1">
 		<div class="panel-body">
 		<h4><u>Selecci&#243;n R&#225;pida - <i>D&#237;as</i></u></h4>
 		
		 	<div class="radio">
			  <label>
			    <input type="radio" name="options_dias_mantenimiento" id="options_dias_mantenimiento_1" value="1" <?php echo set_value('options_dias_mantenimiento') == 1 ? "checked" : ""; ?>>
			    Toda la Semana
			  </label>
			</div>
			<div class="radio">
			  <label>
			    <input type="radio" name="options_dias_mantenimiento" id="options_dias_mantenimiento_2" value="2" <?php echo set_value('options_dias_mantenimiento') == 2 ? "checked" : ""; ?>value="1" <?php echo set_value('options_dias') == 1 ? "checked" : ""; ?>>
			    De Lunes a Viernes
			  </label>
			</div>
			<div class="radio">
			  <label>
			    <input type="radio" name="options_dias_mantenimiento" id="options_dias_mantenimiento_3"  value="3" <?php echo set_value('options_dias_mantenimiento') == 3 ? "checked" : ""; ?>>
			    Fines de Semana (De Viernes a Domingo)
			  </label>
			</div>
			<div class="radio">
			  <label>
			    <input type="radio" name="options_dias_mantenimiento" id="options_dias_mantenimiento_4" value="4" <?php echo set_value('options_dias_mantenimiento') == 4 ? "checked" : ""; ?>>
			    Ninguno (<b>Reseteo de Tabla</b>)
			  </label>
			</div>
			<div class="radio">
			  <label> 
			  </label>
			</div>
		</div>
	</div>

	<div class="panel panel-default col-md-3 col-md-offset-1">
 		<div class="panel-body">
 			<h4><u>Horario de Mantenimiento</i></u></h4>
			<label  class="control-label">Inicio</label><br> 
					 <div class="input-group text-left">
		 				 <span  class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control" id='inicio_mantenimiento' name='inicio_mantenimiento' value="<?php echo set_value('inicio_mantenimiento');?>" />
					 </div><br>
					  <label  class="control-label">Fin</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control" id='fin_mantenimiento' name='fin_mantenimiento' value="<?php echo set_value('fin_mantenimiento');?>" />
					 </div><br>
					 <button type="button" class="btn btn-success btn-xs col-md-offset-2" id="boton_asignar_horario_mantenimiento">Asignar Horario de Mantenimiento</button>
		</div>
	</div>


		<?php if($acuerdo->lunes_mant_ini != NULL) : ?>
		<?php $check_lunes_mantenimiento = 1;
			  $lunes_inicio_mantenimiento = date("g:i A",strtotime($acuerdo->lunes_mant_ini));
			  $lunes_final_mantenimiento = date("g:i A",strtotime($acuerdo->lunes_mant_fin));
		?> 
	<?php else : ?>
	  <?php $check_lunes = 0; ?>  
	<?php endif ?>

	<?php if($acuerdo->martes_mant_ini != NULL) : ?>
		<?php $check_martes_mantenimiento = 2;
			  $martes_inicio_mantenimiento = date("g:i A",strtotime($acuerdo->martes_mant_ini));
			  $martes_final_mantenimiento = date("g:i A",strtotime($acuerdo->martes_mant_fin));
		?> 
	<?php else : ?>
	  <?php $check_martes = 0;?>  
	<?php endif ?>

	<?php if($acuerdo->miercoles_mant_ini != NULL) : ?>
		<?php $check_miercoles_mantenimiento = 3;
              $miercoles_inicio_mantenimiento = date("g:i A",strtotime($acuerdo->miercoles_mant_ini));
			  $miercoles_final_mantenimiento = date("g:i A",strtotime($acuerdo->miercoles_mant_fin));
		?> 
	<?php else : ?>
	  <?php $check_miercoles = 0;?>  
	<?php endif ?>

	<?php if($acuerdo->jueves_mant_ini != NULL) : ?>
		<?php $check_jueves_mantenimiento = 4;
			  $jueves_inicio_mantenimiento = date("g:i A",strtotime($acuerdo->jueves_mant_ini));
			  $jueves_final_mantenimiento = date("g:i A",strtotime($acuerdo->jueves_mant_fin));
		?> 
	<?php else : ?>
	  <?php $check_jueves = 0;?>  
	<?php endif ?>

	<?php if($acuerdo->viernes_mant_ini != NULL) : ?>
		<?php $check_viernes_mantenimiento = 5;
			  $viernes_inicio_mantenimiento = date("g:i A",strtotime($acuerdo->viernes_mant_ini));
			  $viernes_final_mantenimiento = date("g:i A",strtotime($acuerdo->viernes_mant_fin));
		?> 
	<?php else : ?>
	  <?php $check_viernes = 0;?>  
	<?php endif ?>

	<?php if($acuerdo->sabado_mant_ini != NULL) : ?>
		<?php $check_sabado_mantenimiento = 6;
			  $sabado_inicio_mantenimiento = date("g:i A",strtotime($acuerdo->sabado_mant_ini));
			  $sabado_final_mantenimiento = date("g:i A",strtotime($acuerdo->sabado_mant_fin));
		?> 
	<?php else : ?>
	  <?php $check_sabado = 0;?>  
	<?php endif ?>

	<?php if($acuerdo->domingo_mant_ini != NULL) : ?>
		<?php $check_domingo_mantenimiento = 7;
		      $domingo_inicio_mantenimiento = date("g:i A",strtotime($acuerdo->domingo_mant_ini));
			  $domingo_final_mantenimiento = date("g:i A",strtotime($acuerdo->domingo_mant_fin));
		?> 
	<?php else : ?>
	  <?php $check_domingo = 0;?>  
	<?php endif ?>

     	<table class="table table-bordered" style="background-color:white;" id="tabla_mantenimiento">
	    <thead class="text-center">
	    	<tr style="background-color:grey; color:#FFFFFF;">
	    		<td><input type="checkbox" class="checkbox_dias_mantenimiento" id='checkbox_lunes_mantenimiento' name='checkbox_lunes_mantenimiento' value="1" <?php echo set_value('checkbox_lunes_mantenimiento',@ $check_lunes_mantenimiento) == 1 ? "checked" : ""; ?> > <b>Lunes</b></td>
	    		<td><input type="checkbox" class="checkbox_dias_mantenimiento" id='checkbox_martes_mantenimiento' name='checkbox_martes_mantenimiento' value="2" <?php echo set_value('checkbox_martes_mantenimiento',@ $check_martes_mantenimiento) == 2 ? "checked" : ""; ?> > <b>Martes</b></td>
	    		<td><input type="checkbox" class="checkbox_dias_mantenimiento" id='checkbox_miercoles_mantenimiento' name='checkbox_miercoles_mantenimiento' value="3" <?php echo set_value('checkbox_miercoles_mantenimiento',@ $check_miercoles_mantenimiento) == 3 ? "checked" : ""; ?>> <b>Mi&#233;rcoles</b></td>
	    		<td><input type="checkbox" class="checkbox_dias_mantenimiento" id='checkbox_jueves_mantenimiento' name='checkbox_jueves_mantenimiento' value="4" <?php echo set_value('checkbox_jueves_mantenimiento',@ $check_jueves_mantenimiento) == 4 ? "checked" : ""; ?>> <b>Jueves</b></td>
	    		<td><input type="checkbox" class="checkbox_dias_mantenimiento" id='checkbox_viernes_mantenimiento' name='checkbox_viernes_mantenimiento' value="5" <?php echo set_value('checkbox_viernes_mantenimiento',@ $check_viernes_mantenimiento) == 5 ? "checked" : ""; ?>> <b>Viernes</b></td>
	    		<td><input type="checkbox" class="checkbox_dias_mantenimiento" id='checkbox_sabado_mantenimiento' name='checkbox_sabado_mantenimiento' value="6" <?php echo set_value('checkbox_sabado_mantenimiento',@ $check_sabado_mantenimiento) == 6 ? "checked" : ""; ?>> <b>S&#225;bado</b></td>
	    		<td><input type="checkbox" class="checkbox_dias_mantenimiento" id='checkbox_domingo_mantenimiento' name='checkbox_domingo_mantenimiento' value="7" <?php echo set_value('checkbox_domingo_mantenimiento',@ $check_domingo_mantenimiento) == 7 ? "checked" : ""; ?>> <b>Domingo</b></td>
	    	</tr>
	    </thead>
	    <tbody>
	    	<tr>
	    		<td width="14%">	
			    	 <label  class="control-label">Inicio</label><br> 
					 <div class="input-group text-left">
		 				 <span  class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_mantenimiento hora_inicio_mantenimiento" id='inicio_lunes_mantenimiento' name='inicio_lunes_mantenimiento' value="<?php echo set_value('inicio_lunes_mantenimiento',@$lunes_inicio_mantenimiento);?>"/>
					 </div><br>
					  <label  class="control-label">Fin</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_mantenimiento hora_fin_mantenimiento" id='fin_lunes_mantenimiento'  name='fin_lunes_mantenimiento' value="<?php echo set_value('fin_lunes_mantenimiento',@$lunes_final_mantenimiento);?>"/>
					 </div>
			    </td>

	    		<td>
	    		     <label  class="control-label">Inicio</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_mantenimiento hora_inicio_mantenimiento" id='inicio_martes_mantenimiento' name='inicio_martes_mantenimiento'  value="<?php echo set_value('inicio_martes_mantenimiento',@$martes_inicio_mantenimiento);?>"/>
					 </div><br>
					  <label  class="control-label">Fin</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_mantenimiento hora_fin_mantenimiento" id='fin_martes_mantenimiento' name='fin_martes_mantenimiento' value="<?php echo set_value('fin_martes_mantenimiento',@$martes_final_mantenimiento);?>"/>
					 </div>
	    		</td>
	    		
	    		<td>
	    		 	<label  class="control-label">Inicio</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_mantenimiento hora_inicio_mantenimiento" id='inicio_miercoles_mantenimiento' name='inicio_miercoles_mantenimiento' value="<?php echo set_value('inicio_miercoles_mantenimiento',@$miercoles_inicio_mantenimiento);?>"/>
					 </div><br>
					  <label  class="control-label">Fin</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_mantenimiento hora_fin_mantenimiento" id='fin_miercoles_mantenimiento' name='fin_miercoles_mantenimiento' value="<?php echo set_value('fin_miercoles_mantenimiento',@$miercoles_final_mantenimiento);?>"/>
					 </div>
	    		</td>
	    		
	    		<td>
	    		 	<label  class="control-label">Inicio</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_mantenimiento hora_inicio_mantenimiento" id='inicio_jueves_mantenimiento' name='inicio_jueves_mantenimiento' value="<?php echo set_value('inicio_jueves_mantenimiento',@$jueves_inicio_mantenimiento);?>"/>
					 </div><br>
					  <label  class="control-label">Fin</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_mantenimiento hora_fin_mantenimiento" id='fin_jueves_mantenimiento' name='fin_jueves_mantenimiento' value="<?php echo set_value('fin_jueves_mantenimiento',@$jueves_final_mantenimiento);?>"/>
					 </div>
	    		</td>
	    		
	    		<td>
	    		 	<label  class="control-label">Inicio</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_mantenimiento hora_inicio_mantenimiento" id='inicio_viernes_mantenimiento' name='inicio_viernes_mantenimiento' value="<?php echo set_value('inicio_viernes_mantenimiento',@$viernes_inicio_mantenimiento);?>"/>
					 </div><br>
					  <label  class="control-label">Fin</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_mantenimiento hora_fin_mantenimiento" id='fin_viernes_mantenimiento' name='fin_viernes_mantenimiento' value="<?php echo set_value('fin_viernes_mantenimiento',@$viernes_final_mantenimiento);?>"/>
					 </div>
	    		</td>
	    		
	    		<td>
	    		 	<label  class="control-label">Inicio</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_mantenimiento hora_inicio_mantenimiento" id='inicio_sabado_mantenimiento' name='inicio_sabado_mantenimiento' value="<?php echo set_value('inicio_sabado_mantenimiento',@$sabado_inicio_mantenimiento);?>"/>
					 </div><br>
					  <label  class="control-label">Fin</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_mantenimiento hora_fin_mantenimiento" id='fin_sabado_mantenimiento' name='fin_sabado_mantenimiento' value="<?php echo set_value('fin_sabado_mantenimiento',@$sabado_final_mantenimiento);?>"/>
					 </div>
	    		</td>
	    		<td>
	    		 	<label  class="control-label">Inicio</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_mantenimiento hora_inicio_mantenimiento" id='inicio_domingo_mantenimiento' name='inicio_domingo_mantenimiento' value="<?php echo set_value('inicio_domingo_mantenimiento',@$domingo_inicio_mantenimiento);?>"/>
					 </div><br>
					  <label  class="control-label">Fin</label><br> 
					 <div class="input-group text-left">
		 				 <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						 <input type='text' class="form-control hora_mantenimiento hora_fin_mantenimiento" id='fin_domingo_mantenimiento' name='fin_domingo_mantenimiento' value="<?php echo set_value('fin_domingo_mantenimiento',@$domingo_final_mantenimiento);?>"/>
					 </div>
	    		</td>
	    	</tr>
	    </tbody>
    </table>

     <div class="form-group">
	     <div class="control-label">
	      </div>
	      	<div class="col-md-12">
			    <label style="color:red;" id="error_mantenimiento">
			   	
				</label>
			</div>
	</div> 

    <br><br>

  <div class="row">
  		<div class="col-md-5">
		    <div class="form-group">
					<div class="required">
						<label for="prioridad_servicio" class="col-md-4 control-label text-right">Intervalos de Mantenimiento</label>		    
					</div>

					<div class="col-md-7">
					       <?php
					       	$options = array(
					       	  'seleccione' => 'Seleccione una Modalidad',
					       	  '1' => 'Una semana al mes',
					       	  '2' => 'Dos semanas al mes',
					       	  '3' => 'Tres semanas al mes',
					       	  '4' => 'Todo el mes',
			                );
					        ?>
				            <?php echo form_dropdown('intervalo_mantenimiento', $options,set_value('intervalo_mantenimiento',@$acuerdo->modalidad_mantenimiento),'class="form-control" id="dropdown_intervalo_mantenimiento"'); ?>
			        </div>
				</div>

					<div class="form-group">
				     <div class="control-label col-md-4">
				      </div>
				      	<div class="col-md-7">
						    <label style="color:red;">
						   	<?php 
						        echo form_error('intervalo_mantenimiento');
							 ?>
							</label>
						</div>
					</div>
   		</div>
	</div><br><br>

	<div class="row">
		<div class="col-md-5">

			
				    <div class="form-group">
						<div class="required">
							<label for="prioridad_servicio" class="col-md-4 control-label text-right">Pregunta sobre el Mantenimiento</label>		    
						</div>
						<div class="panel panel-default col-md-offset-4">
	 					<div class="panel-body">
						<div class="">
							¿El mantenimiento del Servicio es realizado durante las horas de Funcionamiento del mismo?
								<div class="radio">
						  <label>
						    <input value="si" <?php echo set_value('options_pregunta',@ $acuerdo->pregunta_mant) == 'si' ? "checked" : ""; ?> type="radio" name="options_pregunta" id="options_pregunta_1">
						   	 Si
							  </label>
						</div>
					 	<div class="radio">
						  <label>
						    <input value="no" <?php echo set_value('options_pregunta',@ $acuerdo->pregunta_mant) == 'no' ? "checked" : ""; ?> type="radio" name="options_pregunta" id="options_pregunta_2" >
						    No
						  </label>
						</div>
					    </div>
					    </div>
					     </div>
		    		</div>

		    		<div class="form-group">
					     <div class="control-label col-md-4">
					      </div>
					      	<div class="col-md-offset-4">
							    <label style="color:red;" id="error_pregunta">
							   	
								</label>
							</div>
					</div> 
	
		</div>
	</div>



	<hr><br>

	<div class=""><h4 > 
 	 		<label class="control-label"><b> Complemento de Disponibilidad</b></h4></label>
	</div>

	<div>
		Esta sección esta destinada para especificar: Procedimientos para anunciar interrupciones del Servicio (Planeadas / No planeadas), margen
		para los periodos de Notificación, Restricciones y Exclusiones de Disponibilidad (Si las Hay) y cualquier punto referente a la Disponibilidad del Servicio
		que no este cubierto por las métricas establecidas para este Acuerdo. 
	</div><br><br>

	<div class="row">
	  <div class="form-group">

			        <div class="col-md-offset-1">
						<label for="tipo_servicio" class="col-md-2 control-label text-right">Complemento</label>		    
					</div>

			        <div class="col-md-8">
			            <?php $data = array(
			            		'value' => set_value('complemento_disponibilidad',@$acuerdo->complemento_disponibilidad),
		                        'name'        => 'complemento_disponibilidad',
		                        'id'          => 'complemento_disponibilidad', 
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
			        echo form_error('complemento_disponibilidad');
				 ?>
				</label>
			</div>
		</div>
   </div><br>

   

  <h3 > <b> Confiabilidad</b><small><a type="button" class="btn btn-xs" data-toggle="modal" data-target="#ayuda_confiabilidad_acuerdo">
 	(<i class="fa fa-info-circle"></i> <u>Ayuda</u>)</a></small></h3> <hr><br>

 	<div class="row">
		<div class="col-md-7">
		   	<div class="form-group">
			<div class="">
					<label for="service_name" class="col-md-4 control-label"><h4><b><i><u>Numero de Caídas</u></i>: </b></h4></label> 
				</div>
			</div>
		</div>
	</div><br>

	<div class="row">

		<div class="col-md-7">
		   	<div class="form-group">
				

			    	<div class="required">
						<label  class="col-md-3 control-label">Unidad de Medida</label> 
					</div>
			    	 
			       <div class="input-group">
			       		<?php
					       	$options = array(
					       	  'seleccione' => 'Seleccione',
					       	  'dia' => 'Día',
					       	  'semana' => 'Semana',
					       	  'mes' => 'Mes',
					       	  'año' => 'Año',
			                );
					        ?>
				            <?php echo form_dropdown('unidad_medida', $options,set_value('unidad_medida',@$acuerdo->unidad_num_caidas),'class="form-control" id="dropdown_unidad_medida"'); ?>
			       
			   	   </div>

			</div>

			<div class="form-group">
		     <div class="control-label col-md-3">
		      </div>
		      	<div class="col-md-7">
				    <label style="color:red;">
				   	<?php 
				        echo form_error('unidad_medida');
					 ?>
					</label>
				</div>
			</div>

		</div>

	</div><br>

	<div class="row">

		<div class="col-md-7">
		   	<div class="form-group">
				

			    <div class="required">
					<label  class="col-md-3 control-label">Numero MINIMO de Caídas</label> 
				</div>

			    <div class="col-md-2">
			       <div class="input-group">
			       		<input type='text' class="form-control" id='minimo_caida' name='minimo_caida' value="<?php echo set_value('minimo_caida',@$acuerdo->minimo_num_caidas);?>" data-toggle="tooltip" data-placement="bottom" title="Solo numeros enteros"/>
			       
			   	   </div>

			    </div>


			    <div class="required">
					<label  class="col-md-3 control-label">Numero MAXIMO de Caídas</label> 
				</div>

			    <div class="col-md-2">
			       <div class="input-group">
			       		<input type='text' class="form-control" id='maximo_caida' name='maximo_caida' value="<?php echo set_value('maximo_caida',@$acuerdo->maximo_num_caidas);?>" data-toggle="tooltip" data-placement="bottom" title="Solo numeros enteros"/>
			       
			   	   </div>

			    </div>


			</div>

			<div class="form-group">
		     <div class="control-label col-md-3">
		      </div>
		      	<div class="col-md-2">
				    <label style="color:red;">
				   	<?php 
				        echo form_error('minimo_caida');
					 ?>
					</label>
				</div>

			<div class="control-label col-md-3">
		      </div>
		      	<div class="col-md-2">
				    <label style="color:red;">
				   	<?php 
				        echo form_error('maximo_caida');
					 ?>
					</label>
				</div>
			</div>
		</div>

	</div><br>


    <div class="row">
		<div class="col-md-7">
		   	<div class="form-group">
				
				<div class="">
					<label for="service_name" class="col-md-4 control-label"><h4><b><i><u>Duración de las Caídas</u></i>: </b></h4></label> 
				</div>
			</div>
		</div>
	</div><br>


	<div class="row">

		<div class="col-md-7">
		   	<div class="form-group">
				

			    	<div class="required">
						<label  class="col-md-3 control-label">Unidad de Tiempo</label> 
					</div>
			    	 
			       <div class="input-group">
			       		<?php
					       	$options = array(
					       	  'seleccione' => 'Seleccione',
					       	  'segundos' => 'Segundos',
					       	  'minutos' => 'Minutos',
					       	  'horas' => 'Horas',
			                );
					        ?>
				            <?php echo form_dropdown('unidad_tiempo1', $options,set_value('unidad_tiempo1',@$acuerdo->unidad_duracion_caidas),'class="form-control" id="dropdown_unidad_tiempo"'); ?>
			       
			   	   </div>

			</div>

			<div class="form-group">
		     <div class="control-label col-md-3">
		      </div>
		      	<div class="col-md-7">
				    <label style="color:red;">
				   	<?php 
				        echo form_error('unidad_tiempo1');
					 ?>
					</label>
				</div>
			</div>

		</div>

	</div><br>

	<div class="row">

		<div class="col-md-7">
		   	<div class="form-group">
				

			    <div class="required">
					<label  class="col-md-3 control-label">Tiempo MINIMO de Duración</label> 
				</div>

			    <div class="col-md-2">
			       <div class="input-group">
			       		<input type='text' class="form-control" id='minimo_duracion_caida' name='minimo_duracion_caida' value="<?php echo set_value('minimo_duracion_caida',@$acuerdo->minimo_duracion_caidas);?>"  data-toggle="tooltip" data-placement="bottom" title="Solo numeros enteros"/>
			       
			   	   </div>

			    </div>


			    <div class="required">
					<label  class="col-md-3 control-label">Tiempo MAXIMO de Duración</label> 
				</div>

			    <div class="col-md-2">
			       <div class="input-group">
			       		<input type='text' class="form-control" id='maximo_duracion_caida' name='maximo_duracion_caida' value="<?php echo set_value('maximo_duracion_caida',@$acuerdo->maximo_duracion_caidas);?>" data-toggle="tooltip" data-placement="bottom" title="Solo numeros enteros"/>
			       
			   	   </div>

			    </div>


			</div>

				<div class="form-group">
		     <div class="control-label col-md-3">
		      </div>
		      	<div class="col-md-2">
				    <label style="color:red;">
				   	<?php 
				        echo form_error('minimo_duracion_caida');
					 ?>
					</label>
				</div>

			<div class="control-label col-md-3">
		      </div>
		      	<div class="col-md-2">
				    <label style="color:red;">
				   	<?php 
				        echo form_error('maximo_duracion_caida');
					 ?>
					</label>
				</div>
			</div>

		</div>

	</div><br>

	 <div class="row">
		<div class="col-md-7">
		   	<div class="form-group">
				
				<div class="">
					<label for="service_name" class="col-md-4 control-label"><h4><b><i><u>Tiempo de Respuesta</u></i>: </b></h4></label> 
				</div>
			</div>
		</div>
	</div><br>

	<div class="row">

		<div class="col-md-7">
		   	<div class="form-group">
				

			    	<div class="required">
						<label  class="col-md-3 control-label">Unidad de Tiempo</label> 
					</div>
			    	 
			       <div class="input-group">
			       		<?php
					       	$options = array(
					       	  'seleccione' => 'Seleccione',
					       	  'segundos' => 'Segundos',
					       	  'minutos' => 'Minutos',
			                );
					        ?>
				            <?php echo form_dropdown('unidad_tiempo2', $options,set_value('unidad_tiempo2',@$acuerdo->unidad_tiempo_respuesta),'class="form-control" id="dropdown_tiempo_respuesta"'); ?>
			       
			   	   </div>

			</div>

		<div class="form-group">
		     <div class="control-label col-md-3">
		      </div>
		      	<div class="col-md-7">
				    <label style="color:red;">
				   	<?php 
				        echo form_error('unidad_tiempo2');
					 ?>
					</label>
				</div>
			</div>

		</div>

	</div><br>

	<div class="row">

		<div class="col-md-7">
		   	<div class="form-group">
				

			    <div class="required">
					<label  class="col-md-3 control-label">Tiempo MINIMO de Respuesta</label> 
				</div>

			    <div class="col-md-2">
			       <div class="input-group">
			       		<input type='text' class="form-control" id='minimo_duracion_respuesta' name='minimo_duracion_respuesta' value="<?php echo set_value('minimo_duracion_respuesta',@$acuerdo->minimo_tiempo_respuesta);?>" data-toggle="tooltip" data-placement="bottom" title="Solo numeros enteros"/>
			       
			   	   </div>

			    </div>


			    <div class="required">
					<label  class="col-md-3 control-label">Tiempo MAXIMO de Respuesta</label> 
				</div>

			    <div class="col-md-2">
			       <div class="input-group">
			       		<input type='text' class="form-control" id='maximo_duracion_respuesta' name='maximo_duracion_respuesta' value="<?php echo set_value('maximo_duracion_respuesta',@$acuerdo->maximo_tiempo_respuesta);?>" data-toggle="tooltip" data-placement="bottom" title="Solo numeros enteros"/>
			       
			   	   </div>

			    </div>


			</div>

			<div class="form-group">
		     <div class="control-label col-md-3">
		      </div>
		      	<div class="col-md-2">
				    <label style="color:red;">
				   	<?php 
				        echo form_error('minimo_duracion_respuesta');
					 ?>
					</label>
				</div>

			<div class="control-label col-md-3">
		      </div>
		      	<div class="col-md-2">
				    <label style="color:red;">
				   	<?php 
				        echo form_error('maximo_duracion_respuesta');
					 ?>
					</label>
				</div>
			</div>
		</div>

	</div><br>


	  <h3 > <b> Sustentabilidad</b></h3> <hr><br><br>


 	 <div class="row">
		<div class="col-md-12">
		   	<div class="form-group">
				
				<div class="">
					<label for="service_name" class="col-md-4 control-label"><h4><b><i><u>Tiempo para la Restauración del Servicio</u></i>: </b></h4></label> 
				</div>
			</div>
		</div>
	</div><br>


	<div class="row">

		<div class="col-md-7">
		   	<div class="form-group">
				

			    	<div class="required">
						<label  class="col-md-3 control-label">Unidad de Tiempo</label> 
					</div>
			    	 
			       <div class="input-group">
			       		<?php
					       	$options = array(
					       	  'seleccione' => 'Seleccione',
					       	  'segundos' => 'Segundos',
					       	  'minutos' => 'Minutos',
					       	  'horas' => 'Horas',
			                );
					        ?>
				            <?php echo form_dropdown('tiempo_restauracion1', $options,set_value('tiempo_restauracion1',@$acuerdo->unidad_tiempo_restauracion),'class="form-control" id="dropdown_unidad_tiempo_restauracion"'); ?>
			       
			   	   </div>

			</div>
			<div class="form-group">
		     <div class="control-label col-md-3">
		      </div>
		      	<div class="col-md-7">
				    <label style="color:red;">
				   	<?php 
				        echo form_error('tiempo_restauracion1');
					 ?>
					</label>
				</div>
			</div>
		</div>

	</div><br>

	<div class="row">

		<div class="col-md-7">
		   	<div class="form-group">
				

			    <div class="required">
					<label  class="col-md-3 control-label">Tiempo MINIMO de Restauración</label> 
				</div>

			    <div class="col-md-2">
			       <div class="input-group">
			       		<input type='text' class="form-control" id='minimo_duracion_restauracion' name='minimo_duracion_restauracion' value="<?php echo set_value('minimo_duracion_restauracion',@$acuerdo->minimo_tiempo_restauracion);?>" data-toggle="tooltip" data-placement="bottom" title="Solo numeros enteros"/>
			       
			   	   </div>

			    </div>


			    <div class="required">
					<label  class="col-md-3 control-label">Tiempo MAXIMO de Restauración</label> 
				</div>

			    <div class="col-md-2">
			       <div class="input-group">
			       		<input type='text' class="form-control" id='maximo_duracion_restauracion' name='maximo_duracion_restauracion' value="<?php echo set_value('maximo_duracion_restauracion',@$acuerdo->maximo_tiempo_restauracion);?>" data-toggle="tooltip" data-placement="bottom" title="Solo numeros enteros"/>
			       
			   	   </div>

			    </div>


			</div>

			<div class="form-group">
		     <div class="control-label col-md-3">
		      </div>
		      	<div class="col-md-2">
				    <label style="color:red;">
				   	<?php 
				        echo form_error('minimo_duracion_restauracion');
					 ?>
					</label>
				</div>

			<div class="control-label col-md-3">
		      </div>
		      	<div class="col-md-2">
				    <label style="color:red;">
				   	<?php 
				        echo form_error('maximo_duracion_restauracion');
					 ?>
					</label>
				</div>
			</div>
		</div>

	</div>

  
  <br><br><hr>

  <div class='row tex'>
	 <div class="col-md-1 col-md-offset-2">
	 <a id="back-step-2" class="btn btn-default">Volver</a>
	 </div>
	<div class="col-md-1">
	 <a id="activate-step-4" class="btn btn-primary">Siguiente</a>
	 </div>

	 <div class="col-md-1 col-md-offset-4">
	 <a class="btn btn-danger" data-toggle="modal" data-target="#salir_modal">Cancelar</a>
	 </div>
 </div><br>




<!-- Modal -->
<div class="modal fade" id="modal_seleccione_dia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      
      </div>
      <div class="modal-body text-center">
        <i class="fa fa-exclamation-circle"></i>  Primero debe seleccionar uno o m&#225;s d&#237;as.
      </div>
    </div>
  </div>
</div>