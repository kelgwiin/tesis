

<br><div class="col-lg-12"> <h1>Formulario de Nuevo Evento</h1> </div>

<ol class="breadcrumb">
	<li class="active"><i class="fa fa-dashboard"></i> 
	Se agregan los eventos proximos que van afectar la disponibilidad de los Servicios, pueden ser eventos de mantenimiento</li>
</ol>

<!DOCTYPE html>
<html lang="en">
	
<link rel="stylesheet" href="<?php echo site_url('assets/front/jquery-ui/css/themes/custom-theme/jquery-ui-1.10.4.custom.css');?>">
<!-- Traducción Español -->
<script src="<?php echo site_url('assets/front/jquery-ui/js/i18n/jquery.ui.datepicker-es.js');?>"></script>

<!-- Scripts de DATEPICKER-->
<script src="<?php echo site_url('assets/front/jquery-ui/js/jquery.ui.core.js');?>"></script>
<script src="<?php echo site_url('assets/front/jquery-ui/js/jquery.ui.datepicker.js');?>"></script>
<script src="<?php echo site_url('assets/front/jquery-ui/js/jquery.ui.widget.js');?>"></script>

<script>
$(function () {
$("#datepicker").datepicker();
});
</script>
	
	
	
	  
  <body>
    <div class="container">
	   <form class="form-inline" id="frmcalendar" method="post" action="<?php echo base_url(); ?>index.php/Disponibilidad/tocalendar" novalidate="novalidate">
       		
       		<div id="page-wrapper">
			<div class = "row">
			<div class="row">
			<div class = "col-md-12">
			<div class="panel panel-default">
			<div class="panel-body">
			<div class = "col-md-10">
				<fieldset>
					<legend>Evento</legend>
					
					<div class="form-group">
						
						<label class="col-md-4 control-label" for="startdate">Fecha inicio:</label> 
						<div class = "col-md-6">
    						<input type="text" id="startdate" name="startdate" value="<?php echo date('d/m/Y')?>" class="form-control input-md" required="required">			 		
						</div>
							
						<!-- Text input - Fecha Inicial Vigencia  -->
										
						<label class="col-md-4 control-label" for="datepicker">Fecha inicial de vigencia</label>  
							<div class="col-md-3">
								<input id="datepicker" name="datepicker" placeholder="fecha de inicio" type="text" class="form-control input-md" required="required">
							</div>
					</div>
					
								
						<div class="form-group">
							<label class="col-md-5 control-label" for="impacto_mejoras">Fecha final:</label>  
    						<input type="text" class="form-control" id="enddate" name="enddate" >
						</div>
				</fieldset>
				
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>	
			
			
			
			
			
       		
       		<form class="form-inline" role="form">
  			<div class="offset1 span5 well">
    			<label for="impacto_mejoras">Fecha inicio:</label>
    			<input type="text" class="form-control" id="startdate" name="startdate" value="<?php echo date('d/m/Y')?>" >
  			</div> 
        	<form class="form-inline" role="form">
        	<div class="offset1 span5 well">
    			<label for="impacto_mejoras">Fecha final:</label>
    			<input type="text" class="form-control" id="enddate" name="enddate" >
  			</div> 
       	      	
        	<form class="form-inline" role="form">
        	<div class="offset1 span5 well">
        		<label for="impacto_mejoras">Todo el día:</label><br>
        	<div class="radio">
 			 <label>
    			<input type="radio" name="allday" id="allday" value="1" >
    				Si
  			</label>
			</div>
			<div class="radio">
  			<label>
    			<input type="radio" name="allday" id="allday" value="0" checked>
    				No
  				</label>
        	</div>
        	</div> 
         
		      	        
        <form class="form-inline" role="form">
        <div class="offset1 span5 well">
    			<label for="impacto_mejoras">Hora Inicio:</label>
    			<input type="text" class="form-control" id="starthour" name="starthour" >
  		</div> 
        <form class="form-inline" role="form">
        <div class="offset1 span5 well">
    			<label for="impacto_mejoras">Hora Fin:</label>
    			<input type="text" class="form-control" id="endhour" name="endhour" >
  		</div> 
  		
  		<form class="form-inline" role="form">
  		 <div class="offset1 span5 well">
    			<label for="impacto_mejoras">Evento:</label>
    			 <textarea class="form-control" rows="4" name="event" id="event" ></textarea>
  		</div> 
           
        <div class="form-actions">
            <br><br>
            <center><button type="submit" class="btn btn-success">Crear evento</button></center>
            <br><br>
            <center><button class="btn btn-default" onclick="location.href='<?php echo base_url(); ?>index.php/Disponibilidad/'" type="button">Cancelar</button></center>
		
        </div>

    </form>

    </div> <!-- /container -->

<?php if(isset($footer)):?>
  <?php foreach ($footer as $file):?>
     <script src="<?php echo $file?>"></script>
  <?php endforeach;?>
<?php endif;?>
 

  </body>
</html>
