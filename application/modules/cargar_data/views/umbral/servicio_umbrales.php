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
							echo form_open(base_url().'index.php/cargar_datos/umbrales/crear/'.$servicio_actual->servicio_id,$attributes); 
					    ?>
					<div class="text-center" >
					<h3>Servicio Seleccionado: <span class="label label-primary"><?php echo $servicio_actual->nombre; ?></span></h3>
				    </div>
					<hr><br>
						<div class="row col-md-offset-2">
							<div class="col-md-3">
							   	<div class="form-group">
									
									<div class="">
										<label for="service_name" class="col-md-4 col-md-offset-1 control-label"><h4><b><i><u>Disco</u></i>: </b></h4></label> 
									</div>
								</div>
							</div>
						</div><br>


						<div class="row col-md-offset-2">

							<div class="col-md-10">
							   	<div class="form-group">
									

								    <div class="required">
										<label  class="col-md-3 control-label">Umbral de Degradación</label> 
									</div>

								    <div class="col-md-2">
								       <div class="input-group">
								       		<input type='text' class="form-control" id='degradacion_disco' name='degradacion_disco' value="<?php echo set_value('degradacion_disco',@$servicio_actual->degradacion_disco);?>"  data-toggle="tooltip" data-placement="bottom" title="Solo numeros enteros"/>
								       		<span class="input-group-addon"><b>%</b></i></span>
								   	   </div>

								    </div>


								    <div class="required">
										<label  class="col-md-3 control-label">Umbral de Fallo</label> 
									</div>

								    <div class="col-md-2">
								       <div class="input-group">
								       		<input type='text' class="form-control" id='fallo_disco' name='fallo_disco' value="<?php echo set_value('fallo_disco',@$servicio_actual->fallo_disco);?>" data-toggle="tooltip" data-placement="bottom" title="Solo numeros enteros"/>
								       		<span class="input-group-addon"><b>%</b></i></span>
								   	   </div>

								    </div>


								</div>

									<div class="form-group">
							     <div class="control-label col-md-3">
							      </div>
							      	<div class="col-md-3">
									    <label style="color:red;">
									   	<?php 
									        echo form_error('degradacion_disco');
										 ?>
										</label>
									</div>

								<div class="control-label col-md-2">
							      </div>
							      	<div class="col-md-3">
									    <label style="color:red;">
									   	<?php 
									        echo form_error('fallo_disco');
										 ?>
										</label>
									</div>
								</div>

							</div>

						</div><br>	


						<div class="row col-md-offset-2">
							<div class="col-md-3">
							   	<div class="form-group">
									
									<div class="">
										<label for="service_name" class="col-md-4 control-label"><h4><b><i><u>CPU</u></i>: </b></h4></label> 
									</div>
								</div>
							</div>
						</div><br>


						<div class="row col-md-offset-2">

							<div class="col-md-10">
							   	<div class="form-group">
									

								    <div class="required">
										<label  class="col-md-3 control-label">Umbral de Degradación</label> 
									</div>

								    <div class="col-md-2">
								       <div class="input-group">
								       		<input type='text' class="form-control" id='degradacion_cpu' name='degradacion_cpu' value="<?php echo set_value('degradacion_cpu',@$servicio_actual->degradacion_cpu);?>"  data-toggle="tooltip" data-placement="bottom" title="Solo numeros enteros"/>
								       		<span class="input-group-addon"><b>%</b></i></span>
								   	   </div>

								    </div>


								    <div class="required">
										<label  class="col-md-3 control-label">Umbral de Fallo</label> 
									</div>

								    <div class="col-md-2">
								       <div class="input-group">
								       		<input type='text' class="form-control" id='fallo_cpu' name='fallo_cpu' value="<?php echo set_value('fallo_cpu',@$servicio_actual->fallo_cpu);?>" data-toggle="tooltip" data-placement="bottom" title="Solo numeros enteros"/>
								       		<span class="input-group-addon"><b>%</b></i></span>
								   	   </div>

								    </div>


								</div>

									<div class="form-group">
							     <div class="control-label col-md-3">
							      </div>
							      	<div class="col-md-3">
									    <label style="color:red;">
									   	<?php 
									        echo form_error('degradacion_cpu');
										 ?>
										</label>
									</div>

								<div class="control-label col-md-2">
							      </div>
							      	<div class="col-md-3">
									    <label style="color:red;">
									   	<?php 
									        echo form_error('fallo_cpu');
										 ?>
										</label>
									</div>
								</div>

							</div>

						</div><br>	


						<div class="row col-md-offset-2">
							<div class="col-md-3">
							   	<div class="form-group">
									
									<div class="">
										<label for="service_name" class="col-md-4 col-md-offset-1 control-label"><h4><b><i><u>Memoria</u></i>: </b></h4></label> 
									</div>
								</div>
							</div>
						</div><br>


						<div class="row col-md-offset-2">

							<div class="col-md-10">
							   	<div class="form-group">
									

								    <div class="required">
										<label  class="col-md-3 control-label">Umbral de Degradación</label> 
									</div>

								    <div class="col-md-2">
								       <div class="input-group">
								       		<input type='text' class="form-control" id='degradacion_memoria' name='degradacion_memoria' value="<?php echo set_value('degradacion_memoria',@$servicio_actual->degradacion_memoria);?>"  data-toggle="tooltip" data-placement="bottom" title="Solo numeros enteros"/>
								       		<span class="input-group-addon"><b>%</b></i></span>
								   	   </div>

								    </div>


								    <div class="required">
										<label  class="col-md-3 control-label">Umbral de Fallo</label> 
									</div>

								    <div class="col-md-2">
								       <div class="input-group">
								       		<input type='text' class="form-control" id='fallo_memoria' name='fallo_memoria' value="<?php echo set_value('fallo_memoria',@$servicio_actual->fallo_memoria);?>" data-toggle="tooltip" data-placement="bottom" title="Solo numeros enteros"/>
								       		<span class="input-group-addon"><b>%</b></i></span>
								   	   </div>

								    </div>


								</div>

									<div class="form-group">
							     <div class="control-label col-md-3">
							      </div>
							      	<div class="col-md-3">
									    <label style="color:red;">
									   	<?php 
									        echo form_error('degradacion_memoria');
										 ?>
										</label>
									</div>

								<div class="control-label col-md-2">
							      </div>
							      	<div class="col-md-3">
									    <label style="color:red;">
									   	<?php 
									        echo form_error('fallo_memoria');
										 ?>
										</label>
									</div>
								</div>

							</div>

						</div><br>	



						<div class="row col-md-offset-2">
							<div class="col-md-3">
							   	<div class="form-group">
									
									<div class="">
										<label for="service_name" class="col-md-4 control-label"><h4><b><i><u>Red</u></i>: </b></h4></label> 
									</div>
								</div>
							</div>
						</div><br>


						<div class="row col-md-offset-2">

							<div class="col-md-10">
							   	<div class="form-group">
									

								    <div class="required">
										<label  class="col-md-3 control-label">Umbral de Degradación</label> 
									</div>

								    <div class="col-md-2">
								       <div class="input-group">
								       		<input type='text' class="form-control" id='degradacion_red' name='degradacion_red' value="<?php echo set_value('degradacion_red',@$servicio_actual->degradacion_red);?>"  data-toggle="tooltip" data-placement="bottom" title="Solo numeros enteros"/>
								       		<span class="input-group-addon"><b>%</b></i></span>
								   	   </div>

								    </div>


								    <div class="required">
										<label  class="col-md-3 control-label">Umbral de Fallo</label> 
									</div>

								    <div class="col-md-2">
								       <div class="input-group">
								       		<input type='text' class="form-control" id='fallo_red' name='fallo_red' value="<?php echo set_value('fallo_red',@$servicio_actual->fallo_red);?>" data-toggle="tooltip" data-placement="bottom" title="Solo numeros enteros"/>
								       		<span class="input-group-addon"><b>%</b></i></span>
								   	   </div>

								    </div>


								</div>

									<div class="form-group">
							     <div class="control-label col-md-3">
							      </div>
							      	<div class="col-md-3">
									    <label style="color:red;">
									   	<?php 
									        echo form_error('degradacion_red');
										 ?>
										</label>
									</div>

								<div class="control-label col-md-2">
							      </div> 
							      	<div class="col-md-3">
									    <label style="color:red;">
									   	<?php 
									        echo form_error('fallo_red');
										 ?>
										</label>
									</div>
								</div>

							</div>

						</div><br>

						<div class="row">
							<a href="<?php echo site_url('index.php/cargar_datos/umbrales/'.$servicio_actual->servicio_id);?>" class="btn btn-danger col-md-1 col-md-offset-4">Cancelar</a>
							<button type="submit" class="btn btn-success col-md-2 col-md-offset-1" >Guardar Cambios</button>
						</div>	<br><br>		


					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		      
		      </div>
		      <div class="modal-body text-center">
		        <p><div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> ¿Est&#225; seguro que desea <b>Eliminar</b> este Proceso de Servicio?</div></p>
		      </div>
		      <div class="modal-footer">
		      	<button type="submit" id="eliminar_confirm" class="btn btn-danger">Eliminar</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>      
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

