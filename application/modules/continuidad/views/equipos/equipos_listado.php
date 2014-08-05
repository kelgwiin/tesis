<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Gestión de Continuidad del Negocio</h1>
			<?php echo $breadcrumbs ?>
			<h3>Listado de equipos de desarrollo</h3>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-12">
			<?php 
				if($this->session->flashdata('alert_success')) print_alert($this->session->flashdata('alert_success'));
				if($this->session->flashdata('alert_error')) print_alert($this->session->flashdata('alert_error'),'danger');
			?>
		</div>
	</div>
	<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Equipos de desarrollo para las distintas fases del Plan de Continuidad del Negocio</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<!-- COMITES DE CRISIS -->
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-warning fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            	<div>Comités de</div>
                                <div class="mid-huge">Crisis</div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                    	<a href="#">
	                        <span class="pull-left">Ocultar detalles</span>
	                        <span class="pull-right"><i class="fa fa-arrow-circle-up"></i></span>
                        </a>
                        <div class="clearfix" style="margin-top: 25px"></div>
                        <hr />
                        <div>
                        	<div class="row">
	                        	<div class="col-md-4 col-md-push-11">
	                        		<a class="btn btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Agregar un nuevo comité de crisis">
	                        			<i class="fa fa-plus" style="color: white"></i>
	                        		</a>
	                        	</div>
                        	</div>
                        	<ul>
                        		<li>Anthony	Wagner</li>
                        		<li>Dianne Graham</li>
                        		<li>Randal Ramsey</li>
                        		<li>Billie Gonzalez</li>
                        		<li>Marsha Morrison</li>
                        	</ul>
                        </div>
                    </div>
                </div>
			</div>
			<div class="col-md-2"></div>
			
			<!-- EQUIPOS DE RECUPERACION -->
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-arrow-up fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            	<div>Equipos de</div>
                                <div class="mid-huge">Recuperación</div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                    	<a href="#">
                            <span class="pull-left">Mostrar detalles</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-down"></i></span>
                        </a>
                        <div class="clearfix"></div>
                    </div>
                </div>
			</div>
			<div class="col-md-2"></div>
			
			<!-- EQUIPOS DE LOGISTICA -->
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-sort fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            	<div>Equipos de</div>
                                <div class="mid-huge">Logística</div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                    	<a href="#">
                            <span class="pull-left">Mostrar detalles</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-down"></i></span>
                        </a>
                        <div class="clearfix"></div>
                    </div>
                </div>
			</div>
			<div class="col-md-2"></div>
			
			<!-- EQUIPOS DE RRPP -->
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            	<div>Equipos de</div>
                                <div class="mid-huge">RRPP</div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                    	<a href="#">
                            <span class="pull-left">Mostrar detalles</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-down"></i></span>
                        </a>
                        <div class="clearfix"></div>
                    </div>
                </div>
			</div>
			<div class="col-md-2"></div>
			
			<!-- EQUIPOS DE UNIDADES DE NEGOCIO -->
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            	<div>Equipos de</div>
                                <div class="mid-huge">Pruebas</div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                    	<a href="#">
                            <span class="pull-left">Mostrar detalles</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-down"></i></span>
                        </a>
                        <div class="clearfix"></div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
</div>


	