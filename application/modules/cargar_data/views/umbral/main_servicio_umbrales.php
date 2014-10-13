<script type="text/javascript" src="<?=base_url()?>application/modules/cargar_data/views/servicio_procesos/js/operaciones_ajax.js"></script>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Gesti&#243;n de Umbrales de Servicio</h1>
			<ol class="breadcrumb">
				<li class="active">
					<i class="fa fa-arrows-v"></i>  Secci&#243;n que brinda las opciones para Crear y Actualizar Los Umbrales de Uso de Infraestructura para el Servicio Seleccionado.
				</li>
			</ol>
		</div>
	</div>




		<?php if($this->session->flashdata('Success')) { ?>
	<div class="alert alert-success text-center" role="alert" id="message">
		<i class="fa fa-check"></i> <b><?php echo $this->session->flashdata('Success');?></b>
	</div>

      <?php }
      ?>

    <?php if($this->session->flashdata('Error')) { ?>
	<div class="alert alert-danger text-center" role="alert" id="message">
		<i class="fa fa-exclamation-circle"></i> <b><?php echo $this->session->flashdata('Error');?></b>
	</div>

      <?php }
      ?>
      
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class = "panel-heading">
					<h3 class="panel-title"><i class="fa fa-arrows-v"></i> Umbrales de Servicio</h3>
				</div>
				<div class="panel-body">

					 <?php
						    // Apertura de Formulario
						    $attributes = array('role' => 'form','class'=>'form-horizontal');
							echo form_open(base_url().'index.php/cargar_datos/umbrales',$attributes); 
					    ?>
					<br>
					<div class="form-group">
	 		

						<div class="col-lg-3 col-lg-offset-4 ">

							 <?php
					        	$options = array(
					        		'seleccione' => 'Seleccione un Servicio',		        	  
				               );
								foreach($servicios as $servicio)
					            { 
					              $options[$servicio->servicio_id] = $servicio->nombre;
					            }


					        ?>

					      	 <?php echo form_dropdown('servicios', $options,set_value('servicios',@$servicio_id),'class="form-control" id="dropdown_servicio_procesos" '); ?>	
				        </div>


				 		<div class="required">
							<button type="submit" class="btn btn-primary col-lg-1">Cargar</button>	    
						</div>

					</div>
					<div class="form-group">
				      	<div class="control-label col-lg-4">
				      	</div>
				      	<div class="col-lg-5">
						    <label style="color:red;">
						   	<?php 
						        echo form_error('servicios');
							 ?>
							</label>
						</div>
					</div>	
					
					<?php echo form_close(); ?>

					<?php if(isset($servicio_actual) && !empty($servicio_actual)) : ?>
					<hr><br>
					
					<div class="row">
							<div class="col-lg-3 col-lg-offset-3">
								<table class="table table-bordered">
									<thead class="text-center">
										<tr style="background-color:grey; color:#FFFFFF;">
											<td colspan="2"><b>CPU</b></td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><b>Umbral de Degradación</b></td>
											<td class="text-center">
											<?php if($servicio_seleccionado->degradacion_cpu != NULL) : ?>

							                 	<?php echo $servicio_seleccionado->degradacion_cpu;?>% 

							                 	<?php else : ?>
							                 		<em>No posee</em>
							                 	<?php endif ?>
							                 </td>
										</tr>
										<tr>
											<td><b>Umbral de Fallo</b></td>
											<td class="text-center">
												<?php if($servicio_seleccionado->fallo_cpu != NULL) : ?>

							                 	<?php echo $servicio_seleccionado->fallo_cpu;?>%

							                 	<?php else : ?>
							                 		<em>No posee</em>
							                 	<?php endif ?>
											</td>
										</tr>
									</tbody>
								</table>
							</div>

							<div class="col-lg-3">
								<table class="table table-bordered">
									<thead class="text-center">
										<tr style="background-color:grey; color:#FFFFFF;">
											<td colspan="2"><b>DISCO</b></td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><b>Umbral de Degradación</b></td>
											<td class="text-center">
												<?php if($servicio_seleccionado->degradacion_disco != NULL) : ?>

							                 	<?php echo $servicio_seleccionado->degradacion_disco;?>% 

							                 	<?php else : ?>
							                 		<em>No posee</em>
							                 	<?php endif ?>

											</td>
										</tr>
										<tr>
											<td><b>Umbral de Fallo</b></td>
											<td class="text-center">
												<?php if($servicio_seleccionado->fallo_disco != NULL) : ?>

							                 	<?php echo $servicio_seleccionado->fallo_disco;?>% 

							                 	<?php else : ?>
							                 		<em>No posee</em>
							                 	<?php endif ?>
											</td>
										</tr>
									</tbody>
								</table>
							</div>

						
					</div>


				   <div class="row">
							<div class="col-lg-3 col-lg-offset-3">
								<table class="table table-bordered">
									<thead class="text-center">
										<tr style="background-color:grey; color:#FFFFFF;">
											<td colspan="2"><b>MEMORIA</b></td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><b>Umbral de Degradación</b></td>
											<td class="text-center">
												<?php if($servicio_seleccionado->degradacion_memoria != NULL) : ?>

							                 	<?php echo $servicio_seleccionado->degradacion_memoria;?>%

							                 	<?php else : ?>
							                 		<em>No posee</em>
							                 	<?php endif ?>
											</td>
										</tr>
										<tr>
											<td><b>Umbral de Fallo</b></td>
											<td class="text-center">
												<?php if($servicio_seleccionado->fallo_memoria != NULL) : ?>

							                 	<?php echo $servicio_seleccionado->fallo_memoria;?>%

							                 	<?php else : ?>
							                 		<em>No posee</em>
							                 	<?php endif ?>
												</td>
										</tr>
									</tbody>
								</table>
							</div>

							<div class="col-lg-3">
								<table class="table table-bordered">
									<thead class="text-center">
										<tr style="background-color:grey; color:#FFFFFF;">
											<td colspan="2"><b>RED</b></td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><b>Umbral de Degradación</b></td>
											<td class="text-center">
											<?php if($servicio_seleccionado->degradacion_red != NULL) : ?>

							                 	<?php echo $servicio_seleccionado->degradacion_red;?>%

							                 	<?php else : ?>
							                 		<em>No posee</em>
							                 	<?php endif ?>
											</td>
										</tr>
										<tr>
											<td><b>Umbral de Fallo</b></td>
											<td class="text-center">
												<?php if($servicio_seleccionado->fallo_red != NULL) : ?>

							                 	<?php echo $servicio_seleccionado->fallo_red;?>%

							                 	<?php else : ?>
							                 		<em>No posee</em>
							                 	<?php endif ?>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
					</div>
					
					<br><br>
						<div class="">
							<a href="<?php echo base_url('index.php/cargar_datos/umbrales/crear/'.$servicio_actual);?>" class="btn btn-success col-md-2 col-md-offset-5">Modificar Umbrales</a>
						</div>	<br><br>		



					<?php endif ?>

				</div>
			</div>
		</div>
	</div>

	