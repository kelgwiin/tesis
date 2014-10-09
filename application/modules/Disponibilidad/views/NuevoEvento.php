<!-- Creado el 30-04-2014 por Kelwin Gamez <kelgwiin@gmail.com> -->

<!-- Scripts de DATEPICKER-->
<script src="<?php echo site_url('assets/front/jquery-ui/js/jquery.ui.core.js');?>"></script>
<script src="<?php echo site_url('assets/front/jquery-ui/js/jquery.ui.datepicker.js');?>"></script>
<script src="<?php echo site_url('assets/front/jquery-ui/js/jquery.ui.widget.js');?>"></script>

<!-- Traducción Español -->
<script src="<?php echo site_url('assets/front/jquery-ui/js/i18n/jquery.ui.datepicker-es.js');?>"></script>

<!-- Config CSS-->
<link rel="stylesheet" href="<?php echo site_url('assets/front/jquery-ui/css/themes/custom-theme/jquery-ui-1.10.4.custom.css');?>">

<!-- Inicialización de los datepicker-->
<script>
	$(function() {
		$( "input#startdate" ).datepicker();
	});
</script>
<script>
	$(function() {
		$( "input#enddate" ).datepicker();
	});
</script>

<!-- /DATEPICKER: Fin de scripts-->

<div id="page-wrapper">
	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<div class="col-lg-12"> <h1>Formulario de Nuevo Evento</h1> </div>

		<ol class="breadcrumb">
			<li class="active"><i class="fa fa-dashboard"></i> 
				Se agregan los eventos proximos que van afectar la disponibilidad de los Servicios, pueden ser eventos de mantenimiento</li>
		</ol>


		</div><!-- end of col-12-->
	</div><!-- end of row Cabecera-->

		<div class="row">
			<div class = "col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class = "row">
							<div class = "col-md-10">
								<form id = "fr_arrendamiento" class="form-horizontal"
								method= "post" action="<?php echo base_url(); ?>index.php/Disponibilidad/tocalendar" >
									<fieldset>

										<!-- Form Name -->
										<legend>Evento</legend>
										
										<!-- Text input - Fecha Inicial Vigencia  -->
										<div class="form-group">
											<label class="col-md-3 control-label" for="startdate">Fecha Inicio</label>  
											<div class="col-md-3">
												<input id="startdate" name="startdate" type="text" class="form-control input-md" required="required">
											</div>
											
											<label class="col-md-2 control-label" for="enddate">Fecha Fin</label>  
											<div class="col-md-3">
												<input id="enddate" name="enddate" type="text" class="form-control input-md" required="required">
											</div>
											
										</div>
										
										    	      	
							        	<form role="form">
							        		<label class="col-md-3 control-label" for="impacto_mejoras">Todo el día:</label><br>
									        <div class="form-group">	
									        	<div class="col-md-2">
										 			 <label>
										    			<input type="radio" name="allday" id="allday" value="1" >
										    				Si
										  			</label>
												</div>
												<div class="col-md-2">
									  				<label>
									    			<input type="radio" name="allday" id="allday" value="0" checked>
									    				No
									  				</label>
									        	</div>
											</div>
											
										<div class="form-group"> 
		    								<label class="col-md-3 control-label" for="impacto_mejoras">Hora Inicio:</label>		    								
		       									 <div class="col-md-3">
		    										<input type="text" class="form-control input-md" id="starthour" name="starthour" >
		  										 </div> 
		    								<label class="col-md-2 control-label" for="impacto_mejoras">Hora Fin:</label>
		    									 <div class="col-md-3">
		    										<input type="text" class="form-control input-md" id="endhour" name="endhour" >
		  										</div> 
  										</div>
  										  <br>
  										  <div class="form-group"> 										
  											<label class="col-md-3 control-label" for="impacto_mejoras">Descripcion:</label>
  											 <div class="col-md-8">
    											 <textarea class="form-control input-md" required="required" rows="4" name="event" id="event" ></textarea>
  											</div> 
  										</div>
  										
  										<div class="form-group">
											<label class="col-md-4 control-label" for=""></label>
											<div class="col-md-6 col-xs-12">
											<div class="row">
												<div class = "col-md-3 col-xs-6">
													<button id="" type = "submit" class="btn btn-primary">Guardar</button>
												</div>
								
												<div class ="col-md-3 col-xs-6">
													<a 	
														href="<?php echo base_url(); ?>index.php/Disponibilidad/Calendario" 
														class="btn btn-danger">Cancelar
													</a>	
												</div>
									
											</div>
											</div><!-- /col-md-6-->
										</div><!-- /form-group -->
  										
           								
									</fieldset>
									<br>
									</form>
							</div><!-- /col-md-10-->

							<div class = "col-md-2"></div>
						</div><!-- /row inner-->
					</div>
				</div><!-- /panel panel-deafult-->

			</div><!-- /col-md-12 -->
		</div><!-- /row: Cuerpo de los formularios -->
</div><!-- /page-wrapper -->