<script type="text/javascript" src="<?=base_url()?>application/modules/niveles/views/ans/js/operaciones.js"></script>



<div id="page-wrapper">

	<div class="panel panel-primary">

		<div class="panel-heading">
	   		<i class="fa fa-plus-circle"></i> Crear Nuevo Acuerdo de Nivel de Servicio
	  	</div>

	  	<div class="panel-body">

	  		<br>
				<div class="row form-group">
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
			                    <p class="list-group-item-text">Third Paso description</p>
			                </a></li>
			                  <li class=""><a href="#step-4">
			                    <h4 class="list-group-item-heading">Paso 4</h4>
			                    <p class="list-group-item-text">Four Paso description</p>
			                </a></li>
			            </ul>
			        </div>
				</div>
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
			


	  	</div>

	</div>
