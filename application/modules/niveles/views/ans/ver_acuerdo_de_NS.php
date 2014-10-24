<script type="text/javascript" src="<?=base_url()?>application/modules/niveles/views/js/operaciones_ajax.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/niveles/views/ans/css/ans.css">

<?php 
          // Arreglos para mostrar las fechas en español.
         $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
         $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 ?>

<div id="page-wrapper">

	<ol class="breadcrumb">
				<li class="active"><i class="fa fa-file-o"></i> 
					Vista de Completa del Acuerdo de Niveles de Servicio Seleccionado.</li>
				</ol>


	<div class="col-lg-10 col-lg-offset-1">
		<div class="panel panel-primary">
			<div class="panel-heading"> <i class="fa fa-file-o"></i> Acuerdo de Niveles de Servicio - Vista Completa</div>
			<div class="panel-body">
				<div class="table-responsive">
				<table class="table">	
					<thead>
						<tr style="background-color:#E0E0D1;">
							<td colspan="2"> <h4><b>Nombre del Acuerdo</b></h4></td>
						</tr>
						<tr>
							<td colspan="2">
								<div class="col-md-10">
								<h4><i><?php echo $acuerdo->nombre_acuerdo; ?></i></h4>
								</div>

								<div class="col-md-2">
								<h5><i><u><b>Estatus</b></u>: </i>
								<i><?php if($acuerdo->fecha_final > date('Y-m-d')) : ?>
									<span class="label label-success"><?php echo 'Activo'; ?></span>

									<?php else : ?>
									<span class="label label-danger"><?php echo 'Vencido'; ?></span>
								<?php endif ?> </i> </h5> <br>
								</div>

							</td>
						
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="background-color:#E0E0D1;" colspan="2"> <h4><b> Alcance </b></h4> </td>
						</tr>
						 <tr>
						  <td width="30%"><h5><b><i>Servicio Cubierto:</i></b></h5></td>
						  <td><h5><i><span class="label label-primary"><?php echo $servicio->nombre; ?></span></i></h5></td>
						</tr>

						<tr>
						  <td width="30%"><h5><i><b>Gestor de Niveles de Servicio:</b></i></h5></td>
						  <td><h5><i><?php echo $gestor->codigo_empleado.' - '.$gestor->nombre; ?></i></h5></td>
						</tr>

						<tr>
						  <td width="30%"><h5><i><b>Cliente(s):</b></i></h5></td>
						  <td><h5><i><?php echo $acuerdo->cliente; ?></i></h5></td>
						</tr>

						<tr>
						  <td width="30%"><h5><i><b>Duración del Acuerdo:</b></i></h5></td>
						  <td><h5>
						  	<i>Desde el </i>
						  	<u><b><?php 
						  		$date = date_create($acuerdo->fecha_inicio);
                                echo date_format($date,'d')." de ".$meses[date_format($date,'n')-1]. " del ".date_format($date,'Y');
						  	?></b></u>
						  	hasta el 
						  	<u><b><?php 
						  		$date = date_create($acuerdo->fecha_final);
                                echo date_format($date,'d')." de ".$meses[date_format($date,'n')-1]. " del ".date_format($date,'Y');
						  	?></b></u>
						  </h5></td>
						</tr>

						<tr>
						  <td width="30%"><h5><i><b>Intervalos de Revisión del Acuerdo:</b></i></h5></td>
						  <td ><h5>
						  	<b> <?php echo $acuerdo->modo_revision; ?> </b> (<i>Próxima Revisión - <i class="fa fa-calendar"></i> 
						  	<b><?php 
						  		$date = date_create($acuerdo->fecha_revision);
                                echo date_format($date,'d')." de ".$meses[date_format($date,'n')-1]. " del ".date_format($date,'Y');
						  	?></b>
						  </i>)
						  	
						  </h5> </td>
						</tr>

						<tr>
							<td colspan="2"> <br><h4><b>Alcance y Exclusiones del Acuerdo</b></h4>
							<br><?php echo $acuerdo->alcance; ?></td>
					
						</tr>


						<tr>
							<td colspan="2"> <br><h4><b>Objetivos del Acuerdo</b></h4>
							<br><?php echo $acuerdo->objetivos_acuerdo; ?><br></td>
					
						</tr>

						<?php if($acuerdo->condiciones_terminacion != NULL) : ?>
						<tr style="background-color:#E0E0D1;">
							<td colspan="2"> <h4><b>Condiciones para la Terminación del Acuerdo</b></h4></td>
						</tr>
						<tr>
							<td colspan="2"><?php echo $acuerdo->condiciones_terminacion; ?><br><br><br></td>
						
						</tr>
						<?php endif ?>


						<?php if($acuerdo->procedimiento_actualizacion != NULL) : ?>
						<tr style="background-color:#E0E0D1;">
							<td colspan="2"> <h4><b>Procedimientos para Modificación del Acuerdo</b></h4></td>
						</tr>
						<tr>
							<td colspan="2"><?php echo $acuerdo->procedimiento_actualizacion; ?><br><br><br></td>
						
						</tr>
						<?php endif ?>

						<tr style="background-color:#E0E0D1;">
							<td colspan="2"> <h4><b>Niveles de Servicio</b></h4></td>
						</tr>

						<tr>
							<td colspan="2"> <br><h4><b>Disponibilidad</b></h4>
							<br>

							<div class="panel with-nav-tabs panel-default">
					                <div class="panel-heading">
					                        <ul class="nav nav-tabs">
					                            <li class="active"><a href="#horario_disponibilidad" data-toggle="tab">Horario de Disponibilidad</a></li>
					                            <li><a href="#horario_mantenimiento" data-toggle="tab">Horario de Mantenimiento</a></li>
					                           
					                        </ul>
						                </div>
					                <div class="panel-body">
					                    <div class="tab-content">
					                        
					                        <div class="tab-pane fade in active" id="horario_disponibilidad">

					                        	<table class="table table-bordered" style="background-color:white;" id="tabla_mantenimiento">
											    <thead class="text-center">
											    	<tr style="background-color:grey; color:#FFFFFF;">
											    		<td><b>Lunes</b></td>
											    		<td><b>Martes</b></td>
											    		<td><b>Mi&#233;rcoles</b></td>
											    		<td><b>Jueves</b></td>
											    		<td><b>Viernes</b></td>
											    		<td><b>S&#225;bado</b></td>
											    		<td><b>Domingo</b></td>
											    	</tr>
											    </thead>
											    <tbody>
											    	<tr>
											    		<td width="14%">	

											    			<?php if($acuerdo->lunes_disp_ini == '00:00:00' && $acuerdo->lunes_disp_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($acuerdo->lunes_disp_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->lunes_disp_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($acuerdo->lunes_disp_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->lunes_disp_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
													    </td>

											    		<td>
											    		  <?php if($acuerdo->martes_disp_ini == '00:00:00' && $acuerdo->martes_disp_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($acuerdo->martes_disp_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->martes_disp_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($acuerdo->martes_disp_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->martes_disp_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
											    		</td>
											    		
											    		<td>
											    		 	<?php if($acuerdo->miercoles_disp_ini == '00:00:00' && $acuerdo->miercoles_disp_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($acuerdo->miercoles_disp_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->miercoles_disp_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($acuerdo->miercoles_disp_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->miercoles_disp_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
											    		</td>
											    		
											    		<td>
											    		 	<?php if($acuerdo->jueves_disp_ini == '00:00:00' && $acuerdo->jueves_disp_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($acuerdo->jueves_disp_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->jueves_disp_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($acuerdo->jueves_disp_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->jueves_disp_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
											    		</td>
											    		
											    		<td>
											    		 	<?php if($acuerdo->viernes_disp_ini == '00:00:00' && $acuerdo->viernes_disp_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($acuerdo->viernes_disp_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->viernes_disp_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($acuerdo->viernes_disp_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->viernes_disp_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
											    		</td>
											    		
											    		<td>
											    		 	<?php if($acuerdo->sabado_disp_ini == '00:00:00' && $acuerdo->sabado_disp_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($acuerdo->sabado_disp_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->sabado_disp_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($acuerdo->sabado_disp_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->sabado_disp_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
											    		</td>
											    		<td>
											    		 	<?php if($acuerdo->domingo_disp_ini == '00:00:00' && $acuerdo->domingo_disp_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($acuerdo->domingo_disp_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->domingo_disp_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($acuerdo->domingo_disp_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->domingo_disp_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
											    		</td>
											    	</tr>
											    </tbody>
										    </table>

										    <br>
										    <div><b>Total de Horas de Disponibilidad:</b></div><br> 
										    	<table class="table table-bordered" style="background-color:white;" id="tabla_horas">
											    <thead class="text-center">
											    	<tr style="background-color:grey; color:#FFFFFF;">
											    		<td><b>Horas por Semana</b></td>
											    		<td><b>Horas por Mes</b></td>
											    		<td><b>Horas por Año</b></td>
											    	</tr>
											    </thead>
											    <tbody>
											    	<td class="text-center">
											    		 <?php 

													    	$horas_disponibilidad = $acuerdo->minutos_disp_semanal / 60;

													    	if(is_int($horas_disponibilidad))
													    	{
													    		echo $horas_disponibilidad.' Horas';
													    	}
													    	else
													    	{
													    	    $numero = $horas_disponibilidad; 
													    	    $separa = explode(".",$numero); 
													    	    $separa[1];
													    	    $horas = floor($horas_disponibilidad);
													    	    $str = '0.'.$separa[1];
													    	    $decimal = (float) $str;
													    	    $segundos = $decimal*60;

													    		echo $horas.' Horas y '.floor($segundos).' Minutos';
													    		
												    		}

													    ?>
											    	</td>
											    		<td class="text-center">
											    			<?php 

													    	$horas_disponibilidad = $acuerdo->minutos_disp_mensual / 60;

													    	if(is_int($horas_disponibilidad))
													    	{
													    		echo $horas_disponibilidad.' Horas';
													    	}
													    	else
													    	{
													    	    $numero = $horas_disponibilidad; 
													    	    $separa = explode(".",$numero); 
													    	    $separa[1];
													    	    $horas = floor($horas_disponibilidad);
													    	    $str = '0.'.$separa[1];
													    	    $decimal = (float) $str;
													    	    $segundos = $decimal*60;
													    		echo $horas.' Horas y '.floor($segundos).' Minutos';
													    		
												    		}

													    ?>
											    		</td>
											    		<td class="text-center">
											    			<?php 

													    	$horas_disponibilidad = $acuerdo->minutos_disp_anual / 60;

													    	if(is_int($horas_disponibilidad))
													    	{
													    		echo $horas_disponibilidad.' Horas';
													    	}
													    	else
													    	{
													    	    $numero = $horas_disponibilidad; 
													    	    $separa = explode(".",$numero); 
													    	    $separa[1];
													    	    $horas = floor($horas_disponibilidad);
													    	    $str = '0.'.$separa[1];
													    	    $decimal = (float) $str;
													    	    $segundos = $decimal*60;
													    		echo $horas.' Horas y '.floor($segundos).' Minutos';
													    		
												    		}

													    ?>
											    		</td>
											    </tbody>
											   </table>
										   



					                        </div>
					                        <div class="tab-pane fade" id="horario_mantenimiento">

											<table class="table table-bordered" style="background-color:white;" id="tabla_mantenimiento">
											    <thead class="text-center">
											    	<tr style="background-color:grey; color:#FFFFFF;">
											    		<td><b>Lunes</b></td>
											    		<td><b>Martes</b></td>
											    		<td><b>Mi&#233;rcoles</b></td>
											    		<td><b>Jueves</b></td>
											    		<td><b>Viernes</b></td>
											    		<td><b>S&#225;bado</b></td>
											    		<td><b>Domingo</b></td>
											    	</tr>
											    </thead>
											    <tbody>
											    	<tr>
											    		<td width="14%">	

											    			<?php if($acuerdo->lunes_mant_ini == '00:00:00' && $acuerdo->lunes_mant_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($acuerdo->lunes_mant_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->lunes_mant_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($acuerdo->lunes_mant_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->lunes_mant_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
													    </td>

											    		<td>
											    		  <?php if($acuerdo->martes_mant_ini == '00:00:00' && $acuerdo->martes_mant_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($acuerdo->martes_mant_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->martes_mant_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($acuerdo->martes_mant_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->martes_mant_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
											    		</td>
											    		
											    		<td>
											    		 	<?php if($acuerdo->miercoles_mant_ini == '00:00:00' && $acuerdo->miercoles_mant_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($acuerdo->miercoles_mant_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->miercoles_mant_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($acuerdo->miercoles_mant_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->miercoles_mant_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
											    		</td>
											    		
											    		<td>
											    		 	<?php if($acuerdo->jueves_mant_ini == '00:00:00' && $acuerdo->jueves_mant_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($acuerdo->jueves_mant_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->jueves_mant_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($acuerdo->jueves_mant_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->jueves_mant_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
											    		</td>
											    		
											    		<td>
											    		 	<?php if($acuerdo->viernes_mant_ini == '00:00:00' && $acuerdo->viernes_mant_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($acuerdo->viernes_mant_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->viernes_mant_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($acuerdo->viernes_mant_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->viernes_mant_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
											    		</td>
											    		
											    		<td>
											    		 	<?php if($acuerdo->sabado_mant_ini == '00:00:00' && $acuerdo->sabado_mant_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($acuerdo->sabado_mant_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->sabado_mant_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($acuerdo->sabado_mant_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->sabado_mant_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
											    		</td>
											    		<td>
											    		 	<?php if($acuerdo->domingo_mant_ini == '00:00:00' && $acuerdo->domingo_mant_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($acuerdo->domingo_mant_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->domingo_mant_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($acuerdo->domingo_mant_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($acuerdo->domingo_mant_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
											    		</td>
											    	</tr>
											    </tbody>
										    </table>

										     <br>
										    <div><b>Total de Horas de Mantenimiento:</b></div><br> 
										    	<table class="table table-bordered" style="background-color:white;" id="tabla_horas">
											    <thead class="text-center">
											    	<tr style="background-color:grey; color:#FFFFFF;">
											    		<td><b>Horas por Semana</b></td>
											    		<td><b>Horas por Mes</b></td>
											    		<td><b>Horas por Año</b></td>
											    	</tr>
											    </thead>
											    <tbody>
											    	<td class="text-center">
											    		 <?php 

													    	$horas_disponibilidad = $acuerdo->minutos_mant_semanal / 60;

													    	if(is_int($horas_disponibilidad))
													    	{
													    		echo $horas_disponibilidad.' Horas';
													    	}
													    	else
													    	{
													    	    $numero = $horas_disponibilidad; 
													    	    $separa = explode(".",$numero); 
													    	    $separa[1];
													    	    $horas = floor($horas_disponibilidad);
													    	    $str = '0.'.$separa[1];
													    	    $decimal = (float) $str;
													    	    $segundos = $decimal*60;
													    		echo $horas.' Horas y '.floor($segundos).' Minutos';
													    		
												    		}

													    ?>
											    	</td>
											    		<td class="text-center">
											    			<?php 

													    	$horas_disponibilidad = $acuerdo->minutos_mant_mensual / 60;

													    	if(is_int($horas_disponibilidad))
													    	{
													    		echo $horas_disponibilidad.' Horas';
													    	}
													    	else
													    	{
													    	    $numero = $horas_disponibilidad; 
													    	    $separa = explode(".",$numero); 
													    	    $separa[1];
													    	    $horas = floor($horas_disponibilidad);
													    	    $str = '0.'.$separa[1];
													    	    $decimal = (float) $str;
													    	    $segundos = $decimal*60;
													    		echo $horas.' Horas y '.floor($segundos).' Minutos';
													    		
												    		}

													    ?>
											    		</td>
											    		<td class="text-center">
											    			<?php 

													    	$horas_disponibilidad = $acuerdo->minutos_mant_anual / 60;

													    	if(is_int($horas_disponibilidad))
													    	{
													    		echo $horas_disponibilidad.' Horas';
													    	}
													    	else
													    	{
													    	    $numero = $horas_disponibilidad; 
													    	    $separa = explode(".",$numero); 
													    	    $separa[1];
													    	    $horas = floor($horas_disponibilidad);
													    	    $str = '0.'.$separa[1];
													    	    $decimal = (float) $str;
													    	    $segundos = $decimal*60;
													    		echo $horas.' Horas y '.floor($segundos).' Minutos';
													    		
												    		}

													    ?>
											    		</td>
											    </tbody>
											   </table>




					                        </div>
					                    </div>
					                </div>
					         </div>	

							</td>
					
					
					</tbody>
					
				</table>
			</div>
			</div>

			 <?php
				 // Apertura de Formulario
				$attributes = array('role' => 'form', 'id'=> 'form_process','class'=>'form-horizontal');
				echo form_open(base_url().'index.php/cargar_datos/servicios/eliminar',$attributes); 
				?>

				<div style="display: none;">				
				<?php echo form_input('servicio_id', $servicio->servicio_id);
				      echo form_input('delete_ver', true);
			
				?>
				</div>
			

			<div class="panel-footer text-right">
		
       		 </div>
		</div>

		<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		      
		      </div>
		      <div class="modal-body text-center">
		        <p><div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> ¿Est&#225; seguro que desea <b>Eliminar</b> este Servicio?</div></p>
		      </div>
		      <div class="modal-footer">
		      	<button type="submit" id="eliminar_confirm" class="btn btn-danger">Eliminar</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>      
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

			<?php echo form_close(); ?>

	</div>