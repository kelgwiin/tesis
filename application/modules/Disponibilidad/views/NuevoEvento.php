<br><center><h2>Formulario de Nuevo Evento</h2></center>
<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      Se agregan los eventos proximos que van afectar la disponibilidad de los Servicios, pueden ser eventos de mantenimiento
</div>

<!DOCTYPE html>
<html lang="en">  
  <body>
    <div class="container">
	   <form class="form-inline" id="frmcalendar" method="post" action="./tesis/index.php/Disponibilidad/tocalendar" novalidate="novalidate">
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
            <center><button class="btn btn-default" type="button">Cancelar</button></center>
        </div>

    </form>

    </div> <!-- /container -->

<?php if(isset($footer)):?>
  <?php foreach ($footer as $file):?>
     <script src="<?php echo $file?>"></script>
  <?php endforeach;?>
<?php endif;?>
    <script src="http://localhost/tesis/assets/js/bootstrap-transition.js"></script>
    <script src="http://localhost/tesis/assets/js/bootstrap-alert.js"></script>
    <script src="http://localhost/tesis/assets/js/bootstrap-modal.js"></script>
    <script src="http://localhost/tesis/assets/js/bootstrap-dropdown.js"></script>
    <script src="http://localhost/tesis/assets/js/bootstrap-scrollspy.js"></script>
    <script src="http://localhost/tesis/assets/js/bootstrap-tab.js"></script>
    <script src="http://localhost/tesis/assets/js/bootstrap-tooltip.js"></script>
    <script src="http://localhost/tesis/assets/js/bootstrap-popover.js"></script>
    <script src="http://localhost/tesis/assets/js/bootstrap-button.js"></script>
    <script src="http://localhost/tesis/assets/js/bootstrap-collapse.js"></script>
    <script src="http://localhost/tesis/assets/js/bootstrap-carousel.js"></script>
    <script src="http://localhost/tesis/assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>
