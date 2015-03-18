<link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/niveles/views/ans/css/ans.css">
<script type="text/javascript" src="<?=base_url()?>application/modules/niveles/views/reportes/js/historial_diario.js"></script>
<script type="text/javascript" src="<?=base_url()?>application/modules/niveles/views/reportes/js/historial_semanal.js"></script>

<div id="page-wrapper">

<h1>Reportes de Niveles de Servicios</h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-area-chart"></i> 
					Secci&#243;n que brinda informaci&#243;n sobre los Niveles de Servicio (Disponibilidad, numero de caídas, duraci&#243;n de las caídas, gráficos, entre otros).</li>
				</ol>

<div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li  class="active"><a href="#tab1default" data-toggle="tab">Diario</a></li>
                            <li ><a href="#tab2default" data-toggle="tab">Semanal</a></li>
                            <li><a href="#tab3default" data-toggle="tab">Mensual</a></li>
                             <li><a href="#tab3default" data-toggle="tab">Anual</a></li>
                        </ul>
                </div>


                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1default"><?php $this->load->view('niveles/reportes/historial_servicio/diario'); ?></div>
                        <div class="tab-pane fade " id="tab2default"><?php $this->load->view('niveles/reportes/historial_servicio/semanal'); ?></div>
                        <div class="tab-pane fade" id="tab3default">Default 3</div>
                        <div class="tab-pane fade" id="tab4default">Default 4</div>
                        <div class="tab-pane fade" id="tab5default">Default 5</div>
                    </div>
                </div>
            </div>