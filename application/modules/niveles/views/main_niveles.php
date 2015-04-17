<script type="text/javascript" src="<?=base_url()?>application/modules/catalogo/views/js/operaciones_ajax.js"></script>



<div id="page-wrapper">

<div class="row" >

	<div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-check-square-o fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-center">
                    <p class="announcement-text">Gestión de RNS</p>
                  </div>
                </div>
              </div>
              <a href="<?php echo site_url('index.php/requisito_niveles_servicio/gestion_RNS');?>/">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Examinar
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        	
          <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-file-text fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-center">
                    <p class="announcement-text">Gestión de ANS</p>
                  </div>
                </div>
              </div>
              <a href="<?php echo site_url('index.php/niveles_de_servicio/gestion_ANS');?>/">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Examinar
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          
          <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-calendar fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-center">
                    <p class="announcement-text">Gestión de Revisiones</p>
                  </div>
                </div>
              </div>
              <a href="<?php echo base_url(); ?>index.php/niveles_de_servicio/gestion_Revisiones">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Examinar
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          
          <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-bar-chart fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-center">
                    <p class="announcement-text">Gestión de Reportes</p>
                  </div>
                </div>
              </div>
              <a href="<?php echo base_url() ?>index.php/niveles_de_servicio/gestion_Reportes">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Examinar
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>


</div>


<div class='col-lg-8'>
	<div class="panel panel-primary">
	   <div class="panel-heading text-center">
		   <h3 class="panel-title"> <b> <i class="fa fa-calendar"></i>  ANS Incumplidos </b> </h3>
		  </div>
	  <div class="panel-body">
	    	
			<div id='calendar'></div>
			
	  </div>
	</div>
</div>


	<div class='col-lg-4'>	

		<div class="panel panel-primary">
		  <div class="panel-heading text-center">
		    <h3 class="panel-title"><b><i class="fa fa-calendar-o"></i> Próximos Eventos</b></h3>
		  </div>
		  <div class="panel-body" style="height:380px; max-height:380px; overflow-y: scroll;">



		    <table class="table" >

		      <thead>

		     <?php if(count($eventos_recientes) > 0) : ?>
			
				  <?php foreach ($eventos_recientes as $evento_reciente) :?>
				  	
				  	<tr>
				  		<td> 							<?php if($evento_reciente->tipo_evento == 'revision_ANS') : ?>
										  				<span class="label" style="background-color:#42A321;"> </span>
													  	<?php endif ?>
								                 		<?php if($evento_reciente->tipo_evento == 'renovacion_ANS') : ?>
										  				<span class="label" style="background-color:#FF7519;" > </span>
													  	<?php endif ?>
													  	<?php if($evento_reciente->tipo_evento == 'vencimiento_ANS') : ?>
													  				<span class="label" style="background-color:#E64545;"> </span>
													  	<?php endif ?>
													  	<?php if($evento_reciente->tipo_evento == 'reunion') : ?>
													  				<span class="label" style="background-color:#3366FF;"> </span>
													  	<?php endif ?> 
													  	<?php if($evento_reciente->tipo_evento == 'otro') : ?>
													  				<span class="label" style="background-color:#8E8E86;"> </span>
													  	<?php endif ?> 
						</td>
				  		<td  width="30%"> <?php echo $evento_reciente->nombre_evento; ?></td>

				  		<td  width="30%" class="text-right"> <?php 
				  					$inicio = date_create($evento_reciente->inicio);
				  					echo '<b>Inicio:</b> '.date_format($inicio,'d/m') ?> <br><?php
				  					if($evento_reciente->tipo_evento == 'vencimiento_ANS')
				  					{echo "Todo el Día";}
				  					else
				  					{echo date_format($inicio,'h:i a');}	
				  					 ?></td>

				  		<td  width="30%" class="text-right"> <?php $fin = date_create($evento_reciente->fin);
				  					echo '<b>Fin:</b> '.date_format($fin,'d/m');  ?> <br><?php
				  					if($evento_reciente->tipo_evento == 'vencimiento_ANS')
				  					{echo "Todo el Día";}
				  					else
				  					{echo date_format($fin,'h:i a');}	
				  					 ?></td>

				  	</tr>

				  <?php endforeach ?>

			  <?php else : ?>

			  	<tr>
				  		<td><div class="alert alert-info text-center" role="alert"> <b> <i class="fa fa-exclamation-circle"></i> No existen Eventos dentro de los próximos 8 días. </b></div> </td>

				</tr>




			  <?php endif ?>



			   </thead>
			   <TBODY></TBODY>

			</table>

		  </div>
		</div>


		<div class="panel panel-default">
		    
		  	<table class="table borderless">
		  		<tr>
		  			<td><div class='col-lg-1'> <span class="label" style="background-color:#42A321;"> </span></div> <div class='col-lg-offset-2'><b>Revisión de ANS</b></div> </td>
		  			<td><div class='col-lg-1'><span class="label" style="background-color:#7A5C99;" > </span></div> <div class='col-lg-offset-2'><b> Renovación de ANS</b></div> </td>
		  		</tr>

		  		<tr>
		  			<td><div class='col-lg-1'><span class="label" style="background-color:#FF7519;"> </span></div> <div class='col-lg-offset-2'><b> Recordatorio ANS</b></div></td>
		  			<td><div class='col-lg-1'><span class="label" style="background-color:#E64545;"> </span></div> <div class='col-lg-offset-2'><b> Vencimiento de ANS</b></div></td>
		  			
		  		</tr>
 
		  		<tr>
		  			<td><div class='col-lg-1'><span class="label" style="background-color:#3366FF;" > </span></div> <div class='col-lg-offset-2'><b> Reunión </b></div></td>
		  			<td><div class='col-lg-1'><span class="label" style="background-color:#8E8E86;" > </span></div> <div class='col-lg-offset-2'><b> Otro </b></div></td>
		  		</tr>
		  	</table>

		</div>

	   

	</div>
