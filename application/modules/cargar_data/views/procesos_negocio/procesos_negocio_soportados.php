<script type="text/javascript" src="<?=base_url()?>application/modules/cargar_data/views/procesos_negocio/js/operaciones_ajax.js"></script>

<div id="page-wrapper">


	

<!-- Lista de Componentes para copiar-->

<h1>Gesti&#243;n de Soporte de Procesos de Negocio</h1>
	<ol class="breadcrumb">
				<li class="active"><i class="fa fa-retweet"></i> 
					Secci&#243;n que brinda las opci&#243;n de Asignar cuales Procesos de Negocio son Soportados por el Servicio Seleccionado.</li>
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
	   		<h3 class="panel-title"> <i class="fa fa-retweet"></i> Gestion de Soporte de Servicios</h3>
	  	</div>

	  	<div class="panel-body">


	  				<?php if(count($servicios) < 1) : ?>
	  				<div class="alert alert-info text-center col-md-8 col-md-offset-2" role="alert"><i class="fa fa-exclamation-circle"></i> ¡No existen Servicios Registrados en el Sistema! <u><b><a href="<?php echo base_url('index.php/cargar_datos/servicios');?>">Crear Servicio</a></b></u></div>

	  				<?php else : ?>
					 <?php
						    // Apertura de Formulario
						    $attributes = array('role' => 'form','class'=>'form-horizontal');
							echo form_open(base_url().'index.php/cargar_datos/procesos_de_negocio_soportados',$attributes); 
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

						<?php if(count($procesos_negocio) < 1) : ?>
		  				<div class="alert alert-info text-center col-md-8 col-md-offset-2" role="alert"><i class="fa fa-exclamation-circle"></i> ¡No existen Procesos de Negocio Registrados en el Sistema! <u><b><a href="<?php echo base_url('index.php/cargar_datos/procesos_de_negocio');?>">Crear Proceso de Negocio</a></b></u></div>

		  				<?php else : ?>

							<div class = "row">
								<div class = "col-md-12 ">
									<div class="panel panel-info">
										
										<div class="panel-body">
											<div class = "row">
												<div class = "col-md-4 col-md-offset-1">
													<span class = "help-block">Procesos de Negocio SIN Soporte de Servicio </span>
													<div class = "form-group">
														<select id = "lista_procesos" name="lista_procesos[]" size = "15" multiple class="form-control"  >
															<?php foreach ($procesos_negocio as $proceso_negocio) : ?>
																

																		<?php if(count($procesos_soportados) > 0) : ?>
						                										<?php $soportado = false; ?>
								                								<?php foreach ($procesos_soportados as $proceso_soportado) : ?>

								                									<?php if($proceso_soportado->proceso_id == $proceso_negocio->procesoneg_id) : ?>
								              	
																				  		<?php $soportado = true; ?>
																				  	<?php endif ?>

																				<?php endforeach ?>

																				<?php if(!$soportado) : ?>
																					<option value="<?php echo $proceso_negocio->procesoneg_id;?>"><?php echo $proceso_negocio->nombre;?></option>
																					
																				<?php endif ?>
																		<?php else : ?>
																			<option value="<?php echo $proceso_negocio->procesoneg_id;?>"><?php echo $proceso_negocio->nombre;?></option>
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
															id = "add_proceso_soportado"
															class="btn btn-primary"
															data-toggle = "tooltip"
															data-original-title = "Agregar Proceso Soportado"
															data-placement = "top"
															>
															
															<i class = "fa fa-arrow-right fa-lg"></i>

														</button>
														<br><br>

														<button 
															type="button"
															id = "rm_proceso_soportado"
															class="btn btn-primary"
															data-toggle = "tooltip"
															data-original-title = "Remover Proceso Soportado."
															data-placement = "bottom"
															>
															
															<i class = "fa fa-arrow-left fa-lg"></i>

														</button>
													</div>
													</center>
												</div><!-- col-1: Botones de adicionar los componentes -->

												<!-- Lista de Componentes Copiados -->
												<div class = "col-md-4">
													<span class = "help-block">Procesos de Negocio Soportados</span>
													<div class = "form-group" id = "fg-copied-componentes-ti-dpto">
														<select id = "procesos_soportados" name='procesos_soportados[]' size = "15" multiple class="form-control"  >
															<!-- Se llena desde jquery cuando es nuevo -->

															<?php if(count($procesos_soportados) > 0) : ?>


																<?php foreach ($procesos_soportados as $proceso_soportado) : ?>
																	
																	<?php foreach ($procesos_negocio as $proceso_negocio) : ?>

																		<?php if($proceso_soportado->proceso_id == $proceso_negocio->procesoneg_id) : ?>
																			<option value="<?php echo $proceso_soportado->proceso_id;?>"><?php echo $proceso_negocio->nombre;?></option>
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