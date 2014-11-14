<script type="text/javascript" src="<?=base_url()?>application/modules/niveles/views/ans/js/operaciones.js"></script>
<script type="text/javascript" src="<?=base_url()?>application/modules/niveles/views/ans/js/cargar_requisitos.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/niveles/views/ans/css/estructura.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/niveles/views/ans/css/ans.css">

<?php include('ayudas.php'); ?>

<div id="page-wrapper">

	<div class="panel panel-primary" id='menu_pasos_ans'>

		<div class="panel-heading">
	   		<i class="fa fa-plus-circle"></i> Crear Nuevo Acuerdo de Nivel de Servicio
	  	</div>

	  	<div class="panel-body">
	  	<?php
		    // Apertura de Formulario
		    $attributes = array('role' => 'form', 'id'=> 'new_service_form','class'=>'form-horizontal');
			echo form_open_multipart(base_url().'index.php/niveles_de_servicio/gestion_ANS/crear_ANS',$attributes); 
	      ?>
	  		<br>
				<div class="row form-group" >
			        <div class="col-md-12">
			            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
			                <li class="active"><a href="#step-1">
			                    <h4 class="list-group-item-heading">Paso 1</h4>
			                    <p class="list-group-item-text">Servicio y Partes Interesadas</p>
			                </a></li>
			                <!--<li class="disabled"><a href="#step-2">-->
			                <li class=""><a href="#step-2">
			                    <h4 class="list-group-item-heading">Paso 2</h4>
			                    <p class="list-group-item-text">Detalles del Acuerdo</p>
			                </a></li>
			                <li class=""><a href="#step-3">
			                    <h4 class="list-group-item-heading">Paso 3</h4>
			                    <p class="list-group-item-text">Niveles de Servicio</p>
			                </a></li>
			                  <li class=""><a href="#step-4">
			                    <h4 class="list-group-item-heading">Paso 4</h4>
			                    <p class="list-group-item-text">Tiempos de Respuesta y de Resolución de Problemas</p>
			                </a></li>
			                 <li class=""><a href="#step-5">
			                    <h4 class="list-group-item-heading">Paso 5</h4>
			                    <p class="list-group-item-text">Disposiciones Finales</p>
			                </a></li>
			            </ul>
			        </div>
				</div>

				<?php $errores = validation_errors(); 
					  if(strlen($errores) > 0)
					  { ?>
					  	
						<div class="alert alert-danger text-center" role="alert"> ¡Se han encontrado <b>errores</b> en el formulario! Por favor revise desde el Paso 1 al Paso 5 y corrija las secciones con mensajes de error <b>indicados con letras rojas</b>.</div>

					 <?php }
				?>

			    <div class="row setup-content" id="step-1">
			        <div class="col-md-12">
			            <div class="col-md-12 well">
			               
			                <?php $this->load->view('niveles/ans/paso1'); ?>
			            </div>
			        </div>
			    </div>
			    <div class="row setup-content" id="step-2">
			        <div class="col-md-12">
			            <div class="col-md-12 well">
			                <?php $this->load->view('niveles/ans/paso2'); ?>
			            </div>
			        </div>
			    </div>
			    <div class="row setup-content" id="step-3">
			        <div class="col-md-12">

					    <div class="panel panel_estructura panel-primary">
		                    <div class="panel-heading clickable2" >
		                        <h2 class="panel-title text-center" style="color:#FFFFFF;">
		                            <b>Selección de Requisito de Niveles de Servicio</b></h2>
		                        <span class="pull-right clickable"><i class="fa fa-minus"></i></span>
		                    </div>
		                    <div class="panel-body">
		                       
									<ol class="breadcrumb">
									<li class="active"><i class="fa fa-list-alt"></i> 
										Esta Secci&#243;n brinda las opción de Cargar el contenido de un Requisito de Niveles de Servicio en los campos de Niveles de Servicio,
										Tiempos de Respuesta y de Resolución de Problemas del ANS que se esta creando.</li>
									</ol>

									<div class="form-group">
			
											<div class="required text-right">
												<label for="service_name" class="col-md-4  control-label">Requisito de Niveles de Servicio</label> 
											</div>

										    <div class="col-md-5">

										         <?php
										        	$options = array(
										        		'seleccione' => 'Seleccione un Requisito',		        	  
									                );

													foreach($requisitos as $requisito)
										            { 
										              $options[$requisito->requisito_id] = $requisito->nombre;
										            }


										        ?>

										      	 <?php echo form_dropdown('requisitos', $options,set_value('requisitos'),'class="form-control" id="dropdown_requisitos" '); ?>	
										    </div>

										    <a id="cargar_requisito" class="btn btn-primary col-lg-1">Cargar</a>	 
										</div>


										<div class="form-group">
										     <div class="control-label col-md-4">
										      </div>
										      	<div class="col-md-7">
												    <label style="color:red;" id="error_requisitos">
												   	
											        </label>
										</div>
									    </div>

									    <div class="alert alert-success text-center col-lg-5 col-lg-offset-4" style="display:none;" role="alert" id="exito_requisitos">
											
										</div>
		                       
		                    </div>
		                </div>

			            <div class="col-md-12 well">
			 
			                <?php $this->load->view('niveles/ans/paso3'); ?>
			            </div>
			        </div>
			    </div>
			     <div class="row setup-content" id="step-4">
			        <div class="col-md-12">
			            <div class="col-md-12 well">
			                <?php $this->load->view('niveles/ans/paso4'); ?>
			            </div>
			        </div>
			    </div>

			      <div class="row setup-content" id="step-5">
			        <div class="col-md-12">
			            <div class="col-md-12 well">
			                <?php $this->load->view('niveles/ans/paso5'); ?>
			            </div>
			        </div>
			    </div>
			
	    <?php echo form_close(); ?>

	  	</div>

	</div>


	<div class="modal fade" id="salir_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		      
		      </div>
		      <div class="modal-body text-center">
		        <p><div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> ¿Est&#225; seguro que desea <b>Salir de la Sección de Creación de ANS</b>?<br>
		        Sera redirigido a la Sección Principal de Gestión de Acuerdos de Niveles de Servicio y <b>Todos</b> los datos ingresados en este formulario se perderán
		        </div></p>
		      </div>
		      <div class="modal-footer">
		      	<a href="<?php echo base_url('index.php/niveles_de_servicio/gestion_ANS');?>" class="btn btn-danger">Salir</a>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>      
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
