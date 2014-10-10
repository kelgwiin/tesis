<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Gestión de Continuidad del Negocio</h1>
			<?php echo $breadcrumbs ?>
			<h3>Listado de Vulnerabilidades</h3>
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
	
	<?php
		print_alert('Muchas vulnerabilidades pasan por acciones y costumbres del día a día, generando desatención, lo que puede volverse en un riesgo potencial para la organización.
			A continuación se presenta un listado de Vulnerabilidades genéricas que pueden ayudar a identificar las propias vulnerabilidades de la organización, para prevenir riesgos potenciales','info');
	?>
	
	<div class="row" style="margin-top: 25px">
		<div class="col-lg-12">
			<div class="table-responsive">
	            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                <thead>
	                    <tr>
	                        <th>Descripción</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	<?php foreach($vulnerabilidades as $key => $vuln) : ?>
	                		<tr>
		                		<td>
		                			<?php echo $vuln->vulnerabilidad ?>
		                		</td>
		                	</tr>
	                	<?php endforeach; ?>
	                </tbody>
				</table>
			</div>
		</div>
	</div>
</div>