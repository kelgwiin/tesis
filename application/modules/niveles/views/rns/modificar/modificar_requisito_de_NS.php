<script type="text/javascript" src="<?=base_url()?>application/modules/niveles/views/rns/js/operaciones.js"></script>

<?php include('ayudas.php'); ?>

<div id="page-wrapper">

	<div class="panel panel-primary" id='menu_pasos_ans'>

		<div class="panel-heading">
		<i class="fa fa-pencil"></i> Modificar Requisito de Niveles de Servicio	   		
	  	</div>

	  	<div class="panel-body">
	  	<?php
		    // Apertura de Formulario
		    $attributes = array('role' => 'form', 'id'=> 'new_service_form','class'=>'form-horizontal');
			echo form_open_multipart(base_url().'index.php/requisito_niveles_servicio/gestion_RNS/modificar_RNS/'.$requisito->requisito_id,$attributes); 
	      ?>
	  		<br>
				<div class="row form-group" >
			        <div class="col-md-12">
			            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
			                 <li class="active"><a href="#step-1">
			                    <h4 class="list-group-item-heading">Paso 1</h4>
			                    <p class="list-group-item-text">Servicio y Cliente</p>
			                </a></li>
			                <!--<li class="disabled"><a href="#step-2">-->
			                <li class=""><a href="#step-3">
			                    <h4 class="list-group-item-heading">Paso 2</h4>
			                    <p class="list-group-item-text">Niveles de Servicio</p>
			                </a></li>
			                  <li class=""><a href="#step-4">
			                    <h4 class="list-group-item-heading">Paso 3</h4>
			                    <p class="list-group-item-text">Tiempos de Respuesta y de Resolución de Problemas</p>
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
			               
			                <?php $this->load->view('niveles/rns/modificar/paso1'); ?>
			            </div>
			        </div>
			    </div>
			    <div class="row setup-content" id="step-3">
			        <div class="col-md-12">
			            <div class="col-md-12 well">
			                <?php $this->load->view('niveles/rns/modificar/paso2'); ?>
			            </div>
			        </div>
			    </div>
			     <div class="row setup-content" id="step-4">
			        <div class="col-md-12">
			            <div class="col-md-12 well">
			                <?php $this->load->view('niveles/rns/modificar/paso3'); ?>
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
		        <p><div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> ¿Est&#225; seguro que desea <b>Salir de la Sección de Actualización de RNS</b>?<br>
		        Sera redirigido a la Sección Principal de Gestión de Requisitos de Niveles de Servicio y <b>Todos</b> los datos ingresados en este formulario se perderán
		        </div></p>
		      </div>
		      <div class="modal-footer">
		      	<a href="<?php echo base_url('index.php/requisito_niveles_servicio/gestion_RNS');?>" class="btn btn-danger">Salir</a>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>      
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
