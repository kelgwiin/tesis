<script type="text/javascript" src="<?=base_url()?>application/modules/niveles/views/js/operaciones_ajax.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/niveles/views/rns/css/ans.css">

 <style type="text/css">
        p {
        text-align : justify;
        }
 </style>

<?php 
          // Arreglos para mostrar las fechas en español.
         $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
         $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 ?>

<div id="page-wrapper">

	<ol class="breadcrumb">
				<li class="active"><i class="fa fa-file-o"></i> 
					Vista de Completa del Requisito de Niveles de Servicio Seleccionado.</li>
				</ol>


	<div class="col-lg-10 col-lg-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading"> 

				<div class='col-md-2 text-left'>
				<a href="<?php echo base_url('index.php/requisito_niveles_servicio/gestion_RNS');?>" type="button" class="btn btn-default" id="cancelar"><i class="fa fa-arrow-circle-left"></i> Volver a la Gesti&#243;n de RNS</a>
				</div>

				<div class='col-md-10 text-right'>
	

                <a href="<?php echo base_url().'index.php/requisito_niveles_servicio/gestion_RNS/modificar_RNS/'.$requisito->requisito_id?>"  data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Actualizar</a>
               
                <a  data-original-title="Eliminar" data-target="#eliminar" data-toggle="modal" type="button" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Eliminar</a>
				</div>
				<br><br>

			</div> 
			<div class="panel-body">
				<div class="table-responsive">
				<table class="table">	
					<thead>
						<tr style="background-color:#678DA0; color:#FFFFFF;">
							<td colspan="2"> <h4><b>Nombre del Requisito de Niveles de Servicio</b></h4></td>
						</tr>
						<tr>
							<td colspan="2">
								<div class='col-md-12'>
									<h4><i><?php echo $requisito->nombre; ?></i></h4><br>
							    </div>
							</td>
						
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="background-color:#678DA0; color:#FFFFFF;" colspan="2"> <h4><b> Alcance </b></h4> </td>
						</tr>
						

						 <tr>
						  <td width="5%"><h5><b><i>Servicio:</i></b></h5></td>
						  <td width="40%"><h5><i><span class="label label-primary"><?php echo $servicio->nombre; ?></span></i></h5></td>
						</tr>

						<tr>
						  <td width="5%"><h5><i><b>Cliente(s):</b></i></h5></td>
						  <td><h5><i><?php echo $requisito->cliente; ?></i></h5></td>
						</tr><br>

		

						<tr style="background-color:#678DA0; color:#FFFFFF;">
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

											    			<?php if($requisito->lunes_disp_ini == '00:00:00' && $requisito->lunes_disp_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($requisito->lunes_disp_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->lunes_disp_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($requisito->lunes_disp_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->lunes_disp_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
													    </td>

											    		<td>
											    		  <?php if($requisito->martes_disp_ini == '00:00:00' && $requisito->martes_disp_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($requisito->martes_disp_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->martes_disp_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($requisito->martes_disp_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->martes_disp_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
											    		</td>
											    		
											    		<td>
											    		 	<?php if($requisito->miercoles_disp_ini == '00:00:00' && $requisito->miercoles_disp_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($requisito->miercoles_disp_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->miercoles_disp_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($requisito->miercoles_disp_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->miercoles_disp_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
											    		</td>
											    		
											    		<td>
											    		 	<?php if($requisito->jueves_disp_ini == '00:00:00' && $requisito->jueves_disp_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($requisito->jueves_disp_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->jueves_disp_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($requisito->jueves_disp_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->jueves_disp_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
											    		</td>
											    		
											    		<td>
											    		 	<?php if($requisito->viernes_disp_ini == '00:00:00' && $requisito->viernes_disp_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($requisito->viernes_disp_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->viernes_disp_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($requisito->viernes_disp_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->viernes_disp_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
											    		</td>
											    		
											    		<td>
											    		 	<?php if($requisito->sabado_disp_ini == '00:00:00' && $requisito->sabado_disp_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($requisito->sabado_disp_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->sabado_disp_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($requisito->sabado_disp_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->sabado_disp_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
											    		</td>
											    		<td>
											    		 	<?php if($requisito->domingo_disp_ini == '00:00:00' && $requisito->domingo_disp_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($requisito->domingo_disp_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->domingo_disp_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($requisito->domingo_disp_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->domingo_disp_fin)); ?> 

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
										    <div><b><u>Total de Horas de Disponibilidad</u>:</b></div><br> 
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

													    	$horas_disponibilidad = $requisito->minutos_disp_semanal / 60;

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

													    	$horas_disponibilidad = $requisito->minutos_disp_mensual / 60;

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

													    	$horas_disponibilidad = $requisito->minutos_disp_anual / 60;

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

					                        <br>
										    <div> <b><i><u>Intervalo de Mantenimiento</u></i>:</b> 
										     
										    <?php if($requisito->modalidad_mantenimiento == '1') : ?>

									        <?php echo 'Una semana al mes'; ?> 

											<?php endif ?>

											<?php if($requisito->modalidad_mantenimiento == '2') : ?>

									        <?php echo 'Dos semanas al mes'; ?> 

											<?php endif ?>

											<?php if($requisito->modalidad_mantenimiento == '3') : ?>

									        <?php echo 'Tres semanas al mes'; ?> 

											<?php endif ?>

											<?php if($requisito->modalidad_mantenimiento == '4') : ?>

									        <?php echo 'Todo el mes (4 Semanas)'; ?> 

											<?php endif ?></div><br> 


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

											    			<?php if($requisito->lunes_mant_ini == '00:00:00' && $requisito->lunes_mant_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($requisito->lunes_mant_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->lunes_mant_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($requisito->lunes_mant_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->lunes_mant_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
													    </td>

											    		<td>
											    		  <?php if($requisito->martes_mant_ini == '00:00:00' && $requisito->martes_mant_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($requisito->martes_mant_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->martes_mant_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($requisito->martes_mant_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->martes_mant_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
											    		</td>
											    		
											    		<td>
											    		 	<?php if($requisito->miercoles_mant_ini == '00:00:00' && $requisito->miercoles_mant_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($requisito->miercoles_mant_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->miercoles_mant_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($requisito->miercoles_mant_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->miercoles_mant_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
											    		</td>
											    		
											    		<td>
											    		 	<?php if($requisito->jueves_mant_ini == '00:00:00' && $requisito->jueves_mant_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($requisito->jueves_mant_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->jueves_mant_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($requisito->jueves_mant_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->jueves_mant_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
											    		</td>
											    		
											    		<td>
											    		 	<?php if($requisito->viernes_mant_ini == '00:00:00' && $requisito->viernes_mant_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($requisito->viernes_mant_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->viernes_mant_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($requisito->viernes_mant_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->viernes_mant_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
											    		</td>
											    		
											    		<td>
											    		 	<?php if($requisito->sabado_mant_ini == '00:00:00' && $requisito->sabado_mant_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($requisito->sabado_mant_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->sabado_mant_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($requisito->sabado_mant_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->sabado_mant_fin)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>
											                 	<?php endif ?>
															 </div>
											    		</td>
											    		<td>
											    		 	<?php if($requisito->domingo_mant_ini == '00:00:00' && $requisito->domingo_mant_fin == '00:00:00') : ?>
															 		<div class="text-center"><?php echo "Todo el Día"; ?></div>
															 	
															 <?php else : ?>
													    	 <label  class="control-label">Inicio:</label><br> 
															 <div class="input-group text-left">
															 	
															 		<?php if($requisito->domingo_mant_ini != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->domingo_mant_ini)); ?> 

												                 	<?php else : ?>
												                 		-
												                 	<?php endif ?>

															 	
															 	
															 </div><br>
															  <label  class="control-label">Fin:</label><br> 
															 <div class="input-group text-left">
													 				<?php if($requisito->domingo_mant_fin != NULL) : ?>

												                 	<?php echo date("g:i a",strtotime($requisito->domingo_mant_fin)); ?> 

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
										    <div><b><u>Total de Horas de Mantenimiento</u>:</b></div><br> 
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

													    	$horas_disponibilidad = $requisito->minutos_mant_semanal / 60;

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

													    	$horas_disponibilidad = $requisito->minutos_mant_mensual / 60;

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

													    	$horas_disponibilidad = $requisito->minutos_mant_anual / 60;

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



						 <br><h4><b>Confiabilidad</b></h4><br>
						

						 <div class='row col-md-5'>


						 <b><i>Numero de Caídas (Por <?php echo $requisito->unidad_num_caidas; ?>):</i></b><br><br>

						
							<div class="progress">
							  <div class="progress-bar progress-bar-success" style="width: 33%">
							    	<div class='text-center'><b>Normal</b></div>
							  </div>
							  <div class="progress-bar progress-bar-warning" style="width: 33%">
							      <div class='text-center'><b> Alerta </b></div>
							  </div>
							  <div class="progress-bar progress-bar-danger" style="width: 34%">
							       <div class='text-center'><b>Incumplimiento</b> </div>
							  </div>
							</div>
							<div class="progress-meter">
								<div class="meter meter-left" style="width: 33%;"><span class="meter-text">0 Caídas</span></div>
								<div class="meter meter-left" style="width: 33%;"><span class="meter-text">
																												<?php if($requisito->minimo_num_caidas > 1) : ?>
																							                 	<?php echo  $requisito->minimo_num_caidas.' caídas'; ?> 
																							                 	<?php else : ?>
																							                 	<?php echo  $requisito->minimo_num_caidas.' caída'; ?>
																							                 	<?php endif ?>
																												</span></div>
				    			<div class="meter meter-left" style="width: 34%;"><span class="meter-text">
				    																							<?php if($requisito->maximo_num_caidas > 1) : ?>
																							                 	<?php echo  $requisito->maximo_num_caidas.' caídas'; ?> 
																							                 	<?php else : ?>
																							                 	<?php echo  $requisito->maximo_num_caidas.' caída'; ?>
																							                 	<?php endif ?>
				    																							</span></div>

							</div>
					    </div>


						 <div class='row col-md-5 col-md-offset-1'>


						 <b><i>Duración de las Caídas:</i></b><br><br>

						
							<div class="progress">
							  <div class="progress-bar progress-bar-success" style="width: 33%">
							    	<div class='text-center'><b>Normal</b></div>
							  </div>
							  <div class="progress-bar progress-bar-warning" style="width: 33%">
							      <div class='text-center'><b> Alerta </b></div>
							  </div>
							  <div class="progress-bar progress-bar-danger" style="width: 34%">
							       <div class='text-center'><b>Incumplimiento</b> </div>
							  </div>
							</div>
							<div class="progress-meter">
								<div class="meter meter-left" style="width: 33%;"><span class="meter-text">0  <?php echo $requisito->unidad_duracion_caidas; ?></span></div>
								<div class="meter meter-left" style="width: 33%;"><span class="meter-text">
																												<?php if($requisito->minimo_duracion_caidas > 1) : ?>
																							                 	<?php echo  $requisito->minimo_duracion_caidas.' '.$requisito->unidad_duracion_caidas; ?> 
																							                 	<?php else : ?>
																							                 	<?php 
																							                 	$string = $requisito->unidad_duracion_caidas;
																												$string = substr ($string, 0, - 1);
																							                 	echo  $requisito->minimo_duracion_caidas.' '.$string; ?>
																							                 	<?php endif ?>
																												</span></div>
				    			<div class="meter meter-left" style="width: 34%;"><span class="meter-text">
				    																							<?php if($requisito->maximo_duracion_caidas > 1) : ?>
																							                 	<?php echo  $requisito->maximo_duracion_caidas.' '.$requisito->unidad_duracion_caidas; ?> 
																							                 	<?php else : ?>
																							                 	<?php 
																							                 	$string = $requisito->unidad_duracion_caidas;
																												$string = substr ($string, 0, - 1);
																							                 	echo  $requisito->maximo_duracion_caidas.' '.$string; ?>
																							                 	<?php endif ?>
				    																							</span></div>

							</div>
					    </div>
					    <br><br><br><br><br><br><br><br>

					    <div class='row col-md-5'>

					     <b><i>Tiempo de Respuesta del Servicio:</i></b><br><br>

						
							<div class="progress">
							  <div class="progress-bar progress-bar-success" style="width: 33%">
							    	<div class='text-center'><b>Normal</b></div>
							  </div>
							  <div class="progress-bar progress-bar-warning" style="width: 33%">
							      <div class='text-center'><b> Alerta </b></div>
							  </div>
							  <div class="progress-bar progress-bar-danger" style="width: 34%">
							       <div class='text-center'><b>Incumplimiento</b> </div>
							  </div>
							</div>
							<div class="progress-meter">
								<div class="meter meter-left" style="width: 33%;"><span class="meter-text">0  <?php echo $requisito->unidad_tiempo_respuesta; ?></span></div>
								<div class="meter meter-left" style="width: 33%;"><span class="meter-text">
																												<?php if($requisito->minimo_tiempo_respuesta > 1) : ?>
																							                 	<?php echo  $requisito->minimo_tiempo_respuesta.' '.$requisito->unidad_tiempo_respuesta; ?> 
																							                 	<?php else : ?>
																							                 	<?php 
																							                 	$string = $requisito->unidad_tiempo_respuesta;
																												$string = substr ($string, 0, - 1);
																							                 	echo  $requisito->minimo_tiempo_respuesta.' '.$string; ?>
																							                 	<?php endif ?>
																												</span></div>
				    			<div class="meter meter-left" style="width: 34%;"><span class="meter-text">
				    																							<?php if($requisito->maximo_tiempo_respuesta > 1) : ?>
																							                 	<?php echo  $requisito->maximo_tiempo_respuesta.' '.$requisito->unidad_tiempo_respuesta; ?> 
																							                 	<?php else : ?>
																							                 	<?php 
																							                 	$string = $requisito->unidad_tiempo_respuesta;
																												$string = substr ($string, 0, - 1);
																							                 	echo  $requisito->maximo_tiempo_respuesta.' '.$string; ?>
																							                 	<?php endif ?>
				    																							</span></div>

							</div>
						</div>
						<br><br><br><br><br><br><br><br>

						<br><h4><b>Sustentabilidad</b></h4><br>
						

						 <div class='row col-md-5'>


						 <b><i>Tiempo para la Restauración del Servicio:</i></b><br><br>

						
							<div class="progress">
							  <div class="progress-bar progress-bar-success" style="width: 33%">
							    	<div class='text-center'><b>Normal</b></div>
							  </div>
							  <div class="progress-bar progress-bar-warning" style="width: 33%">
							      <div class='text-center'><b> Alerta </b></div>
							  </div>
							  <div class="progress-bar progress-bar-danger" style="width: 34%">
							       <div class='text-center'><b>Incumplimiento</b> </div>
							  </div>
							</div>
							<div class="progress-meter">
								<div class="meter meter-left" style="width: 33%;"><span class="meter-text">0  <?php echo $requisito->unidad_tiempo_restauracion; ?></span></div>
								<div class="meter meter-left" style="width: 33%;"><span class="meter-text">
																												<?php if($requisito->minimo_tiempo_restauracion > 1) : ?>
																							                 	<?php echo  $requisito->minimo_tiempo_restauracion.' '.$requisito->unidad_tiempo_restauracion; ?> 
																							                 	<?php else : ?>
																							                 	<?php 
																							                 	$string = $requisito->unidad_tiempo_restauracion;
																												$string = substr ($string, 0, - 1);
																							                 	echo  $requisito->minimo_tiempo_restauracion.' '.$string; ?>
																							                 	<?php endif ?>
																												</span></div>
				    			<div class="meter meter-left" style="width: 34%;"><span class="meter-text">
				    																							<?php if($requisito->maximo_tiempo_restauracion > 1) : ?>
																							                 	<?php echo  $requisito->maximo_tiempo_restauracion.' '.$requisito->unidad_tiempo_restauracion; ?> 
																							                 	<?php else : ?>
																							                 	<?php 
																							                 	$string = $requisito->unidad_tiempo_restauracion;
																												$string = substr ($string, 0, - 1);
																							                 	echo  $requisito->maximo_tiempo_restauracion.' '.$string; ?>
																							                 	<?php endif ?>
				    																							</span></div>

							</div>
							<br><br><br><br>
					    </div>
						</td>
					</tr>


					<tr style="background-color:#678DA0; color:#FFFFFF;">
							<td colspan="2"> <h4><b>Atención y Soporte al Cliente</b></h4></td>
						</tr>
						<tr>
							<td colspan="2"><?php echo $requisito->soporte_tecnico; ?><br><br>

								<h4><b>Tiempos de Respuesta y de Resolución de Problemas</b></h4>
							    <br>

							    <div class="col-md-8">
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

							    </div><br>



							  <div class="col-md-8">
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
								    <tbody class="text-center">
								    	<tr >
								    		<td><b>Tiempo de Respuesta</b></td>
								    		<td>
												<?php if($requisito->tiempo_respuesta_critico > 1) : ?>
												<?php echo  $requisito->tiempo_respuesta_critico.' '.$requisito->unidad_respuesta_critico; ?> 
												<?php else : ?>
												<?php 
													$string = $requisito->unidad_respuesta_critico;
													$string = substr ($string, 0, - 1);
													echo  $requisito->tiempo_respuesta_critico.' '.$string; ?>
												<?php endif ?>							    		   									      		
								    		</td>

								    		<td>
								    		    <?php if($requisito->tiempo_respuesta_severo > 1) : ?>
												<?php echo  $requisito->tiempo_respuesta_severo.' '.$requisito->unidad_respuesta_severo; ?> 
												<?php else : ?>
												<?php 
													$string = $requisito->unidad_respuesta_severo;
													$string = substr ($string, 0, - 1);
													echo  $requisito->tiempo_respuesta_severo.' '.$string; ?>
												<?php endif ?>								      		

								    		</td>

								    		<td>
								    		    <?php if($requisito->tiempo_respuesta_medio > 1) : ?>
												<?php echo  $requisito->tiempo_respuesta_medio.' '.$requisito->unidad_respuesta_medio; ?> 
												<?php else : ?>
												<?php 
													$string = $requisito->unidad_respuesta_medio;
													$string = substr ($string, 0, - 1);
													echo  $requisito->tiempo_respuesta_medio.' '.$string; ?>
												<?php endif ?>	
									      		
								    		</td>

								    		<td>
								    		   <?php if($requisito->tiempo_respuesta_menor > 1) : ?>
												<?php echo  $requisito->tiempo_respuesta_menor.' '.$requisito->unidad_respuesta_menor; ?> 
												<?php else : ?>
												<?php 
													$string = $requisito->unidad_respuesta_menor;
													$string = substr ($string, 0, - 1);
													echo  $requisito->tiempo_respuesta_menor.' '.$string; ?>
												<?php endif ?>	
									      		
								    		</td>
								    	</tr>
								    	<tr >
								    		<td><b>Tiempo de Resolución</b></td>
								    		<td>
								    		   <?php if($requisito->tiempo_resolucion_critico > 1) : ?>
												<?php echo  $requisito->tiempo_resolucion_critico.' '.$requisito->unidad_resolucion_critico; ?> 
												<?php else : ?>
												<?php 
													$string = $requisito->unidad_resolucion_critico;
													$string = substr ($string, 0, - 1);
													echo  $requisito->tiempo_resolucion_critico.' '.$string; ?>
												<?php endif ?>	
								    		</td>

								    		<td>
								    		   <?php if($requisito->tiempo_resolucion_severo > 1) : ?>
												<?php echo  $requisito->tiempo_resolucion_severo.' '.$requisito->unidad_resolucion_severo; ?> 
												<?php else : ?>
												<?php 
													$string = $requisito->unidad_resolucion_severo;
													$string = substr ($string, 0, - 1);
													echo  $requisito->tiempo_resolucion_severo.' '.$string; ?>
												<?php endif ?>	
								    		</td>

								    		<td>
								    		   <?php if($requisito->tiempo_resolucion_medio > 1) : ?>
												<?php echo  $requisito->tiempo_resolucion_medio.' '.$requisito->unidad_resolucion_medio; ?> 
												<?php else : ?>
												<?php 
													$string = $requisito->unidad_resolucion_medio;
													$string = substr ($string, 0, - 1);
													echo  $requisito->tiempo_resolucion_medio.' '.$string; ?>
												<?php endif ?>	
								    		</td>

								    		<td>
								    		   <?php if($requisito->tiempo_resolucion_menor > 1) : ?>
												<?php echo  $requisito->tiempo_resolucion_menor.' '.$requisito->unidad_resolucion_menor; ?> 
												<?php else : ?>
												<?php 
													$string = $requisito->unidad_resolucion_menor;
													$string = substr ($string, 0, - 1);
													echo  $requisito->tiempo_resolucion_menor.' '.$string; ?>
												<?php endif ?>	
								    		</td>
								    	</tr>
								     </tbody>
								</table>
							</div>


							</td>
						
					    </tr>

		
					
					</tbody>
					
				</table>
			</div>
			</div>

			 <?php
				 // Apertura de Formulario
				$attributes = array('role' => 'form', 'id'=> 'form_process','class'=>'form-horizontal');
				echo form_open(base_url().'index.php/requisito_niveles_servicio/gestion_RNS/eliminar_RNS',$attributes); 
				?>

				<div style="display: none;">				
				<?php echo form_input('requisito_id', $requisito->requisito_id);
				      echo form_input('delete_ver', true);
			
				?>
				</div>
			

			<div class="panel-footer text-right">

				<div class='col-md-2 text-left'>
				<a href="<?php echo base_url('index.php/requisito_niveles_servicio/gestion_RNS');?>" type="button" class="btn btn-default" id="cancelar"><i class="fa fa-arrow-circle-left"></i> Volver a la Gesti&#243;n de RNS</a>
				</div>

				<div class='col-md-10 text-right'>
                <a href="<?php echo base_url().'index.php/requisito_niveles_servicio/gestion_RNS/modificar_RNS/'.$requisito->requisito_id?>"  data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Actualizar</a>
               
                <a  data-original-title="Eliminar" data-target="#eliminar" data-toggle="modal" type="button" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Eliminar</a>
				</div>
				<br><br>
       		</div>

		</div>

		<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		      
		      </div>
		      <div class="modal-body text-center">
		        <p><div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> ¿Est&#225; seguro que desea <b>Eliminar</b> este Requisito de Niveles de Servicio?</div></p>
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