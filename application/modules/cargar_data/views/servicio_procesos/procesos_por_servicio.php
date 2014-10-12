<script type="text/javascript" src="<?=base_url()?>application/modules/cargar_data/views/servicio_procesos/js/operaciones_ajax.js"></script>

<div id="page-wrapper">


	

<!-- Lista de Componentes para copiar-->

<h1>Gesti&#243;n de Procesos de Servicio</h1>
	<ol class="breadcrumb">
				<li class="active"><i class="fa fa-cogs"></i> 
					Secci&#243;n que brinda la opci&#243;n de Asignar los Procesos Soportan el Servicio Seleccionado.</li>
				</ol><br>

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
		

		<div class="panel panel-primary">

		<div class="panel-heading">
	   		<h3 class="panel-title"> <i class="fa  fa-cogs"></i> Gestion de Infraestructura de Soporte de Servicios</h3>
	  	</div>

	  	<div class="panel-body">


	  				<?php if(count($servicios) < 1) : ?>
	  				<div class="alert alert-info text-center col-md-8 col-md-offset-2" role="alert"><i class="fa fa-exclamation-circle"></i> ¡No existen Servicios Registrados en el Sistema! <u><b><a href="<?php echo base_url('index.php/cargar_datos/servicios');?>">Crear Servicio</a></b></u></div>

	  				<?php else : ?>
					 <?php
						    // Apertura de Formulario
						    $attributes = array('role' => 'form','class'=>'form-horizontal');
							echo form_open(base_url().'index.php/cargar_datos/servicio_procesos/procesos_por_servicio',$attributes); 
					    ?>

	  				<div class="form-group">

	  				<div class="col-md-3 col-md-offset-4 ">

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
						<div class="control-label">
				      	</div>
				      	<div class="col-md-5 col-md-offset-4">
						    <label style="color:red;">
						   	<?php 
						        echo form_error('servicios');
							 ?>
							</label>
						</div>
					</div>

					
					<?php if(isset($servicio_actual) && !empty($servicio_actual)) : ?>

						<?php if(count($procesos_servicio) < 1) : ?>
		  				<div class="alert alert-info col-lg-8 col-lg-offset-2 text-center" role="alert"><b>¡No existen Procesos de Servicios en el Sistema! </b>
						<a href="<?php echo base_url().'index.php/cargar_datos/servicio_procesos/crear'?>" type="button" class="btn btn-primary"> <i class="fa fa-plus"></i> Agregar Nuevo Proceso de Servicio</a></div>

		  				<?php else : ?>

							<div class = "row">
								<div class = "col-md-12 ">
									<div class="panel panel-info">
										
										<div class="panel-body">
											<div class = "row">
												<div class = "col-md-4 col-md-offset-1">
													<span class = "help-block">Procesos disponibles para este Servicio </span>
													<div class = "form-group">
														<select id = "lista_procesos_servicio" name="lista_procesos_servicio[]" size = "15" multiple class="form-control"  >
															<?php foreach ($procesos_servicio as $proceso_servicio) : ?>
																

																		<?php if(count($procesos_soporte) > 0) : ?>
						                										<?php $soportado = false; ?>
								                								<?php foreach ($procesos_soporte as $proceso_soporte) : ?>

								                									<?php if($proceso_soporte->servicio_proceso_id == $proceso_servicio->servicio_proceso_id ) : ?>
								              	
																				  		<?php $soportado = true; ?>
																				  	<?php endif ?>

																				<?php endforeach ?>

																				<?php if(!$soportado) : ?>
																					<option value="<?php echo $proceso_servicio->servicio_proceso_id;?>"><?php echo $proceso_servicio->nombre;?></option>
																					
																				<?php endif ?>
																		<?php else : ?>
																			<option value="<?php echo $proceso_servicio->servicio_proceso_id;?>"><?php echo $proceso_servicio->nombre;?></option>
																		<?php endif ?>
																
															<?php endforeach ?>	
														</select>


														
													</div><!-- /form-group: all-componentes-ti-dpto -->
												</div><!-- /col-4: Todos los Componentes de TI -->

												<div class = "col-md-2">
													<center>
													<div style = "margin-top:70px">
														<button 
															type="button"
															id = "add_proceso_servicio_soportado"
															class="btn btn-primary"
															data-toggle = "tooltip"
															data-original-title = "Agregar Proceso"
															data-placement = "top"
															>
															
															<i class = "fa fa-arrow-right fa-lg"></i>

														</button>
														<br><br>

														<button 
															type="button"
															id = "rm_proceso_servicio_soportado"
															class="btn btn-primary"
															data-toggle = "tooltip"
															data-original-title = "Remover Proceso"
															data-placement = "bottom"
															>
															
															<i class = "fa fa-arrow-left fa-lg"></i>

														</button>
													</div>
													</center>
												</div><!-- col-1: Botones de adicionar los componentes -->

												<!-- Lista de Componentes Copiados -->
												<div class = "col-md-4">
													<span class = "help-block">Procesos que Soportan a este Servicio</span>
													<div class = "form-group" id = "fg-copied-componentes-ti-dpto">
														<select id = "procesos_servicio_soporte" name='procesos_servicio_soporte[]' size = "15" multiple class="form-control"  >
															<!-- Se llena desde jquery cuando es nuevo -->

															<?php if(count($procesos_soporte) > 0) : ?>


																<?php foreach ($procesos_soporte as $proceso_soporte) : ?>
																	
																	<?php foreach ($procesos_servicio as $proceso_servicio) : ?>

																		<?php if($proceso_soporte->servicio_proceso_id == $proceso_servicio->servicio_proceso_id) : ?>
																			<option value="<?php echo $proceso_soporte->servicio_proceso_id;?>"><?php echo $proceso_servicio->nombre;?></option>
																		<?php endif ?>
																	<?php endforeach ?>
																<?php endforeach ?>	
															
															<?php endif ?>


														</select>
														
													</div><!-- /form-group-->
												</div>


											</div><!--/row: inner lista de componentes -->

												<div class="">
													<button type="submit" class="btn btn-success col-md-2 col-md-offset-5">Guardar Cambios</button>
												</div>
										</div>

								<?php echo form_close(); ?>	
									
									</div>		
								</div><!-- /col-->
							</div><!-- /row -->
						<?php endif ?>

					<?php endif ?>

					<?php endif ?>

		</div>
	</div>