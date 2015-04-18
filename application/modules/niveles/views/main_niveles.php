<script type="text/javascript" src="<?=base_url()?>application/modules/niveles/views/js/operaciones_ajax.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/niveles/views/ans/css/ans.css">



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


<div class='col-lg-12'>
	<div class="panel panel-primary">
	   <div class="panel-heading text-center">
		   <h3 class="panel-title"> <b> <i class="fa fa-file-excel-o"></i>  ANS Incumplidos </b> </h3>
		  </div>
	  <div class="panel-body">
	    	<div class="table-responsive">
			<table class="table table-bordered" id="dataTables-ans_incumplidos">
                                <thead>
                                    <tr >  
                                        <th width="">Fecha</th>            
                                        <th width="">Acuerdo</th>
                                         <th width="">Estado ANS</th>
                                        <th width="">Servicio</th>                                       
                                        <th width="">% Disp </th>
                                        <th width="">% Disp ANS </th>
                                        <th width=""># de Caídas</th>
                                        <th width="17%"># de Caídas ANS </th>
                                        <th width="">Tiempo Total Caído</th>
                                        <th width="">Tiempo Mayor Caída </th>
                                        <th width="">Tiempo Menor Caída</th>
                                        <th width="20%">Tiempo de Caída ANS </th>
                                    </tr>
                                </thead>
                                <tbody>
                                      <?php
                                          foreach($acuerdos_violados as $acuerdo_violado)
                                                { 

                                                           foreach($acuerdos as $acuerdo){

                                                                    if($acuerdo_violado->acuerdo_nivel_id == $acuerdo->acuerdo_nivel_id){
                                                                                  $acuerdo_actual = $acuerdo;
                                                                    }          

                                                            }
                                       ?>
                                       <tr>

                                              <td class="text-center" style="vertical-align: middle;"><?php 
                                                     $date = date_create($acuerdo_violado->fecha);
                                                     echo date_format($date,"d/m/Y");  ?>
                                              </td>


                                              <td class="text-center" style="vertical-align: middle;"><a href="<?php echo base_url('index.php/niveles_de_servicio/gestion_ANS/ver_ANS/'.$acuerdo_actual->acuerdo_nivel_id);?>" target="_blank"><?php echo $acuerdo_actual->nombre_acuerdo; ?></a></td>



                                              <td class="text-center" style="vertical-align: middle;">                                                                
                                                          <?php if($acuerdo_violado->estado_acuerdo == 'alerta') : ?>
                                                                <span class="label label-warning"><?php echo $acuerdo_violado->estado_acuerdo; ?></span>
                                                          <?php endif ?>

                                                          <?php if($acuerdo_violado->estado_acuerdo == 'violado') : ?>
                                                                <span class="label label-danger"><?php echo $acuerdo_violado->estado_acuerdo; ?></span>
                                                          <?php endif ?>
                                                  </td>

                                                <td class="text-center" style="vertical-align: middle;"> <?php 
                                                    foreach($servicios as $servicio)
                                                {
                                                  if($servicio->servicio_id == $acuerdo_actual->id_servicio)
                                                  {
                                                    $servicio_actual = $servicio->nombre; 
                                                  }
                                                } ?> 
                                                <a href="<?php echo base_url('index.php/cargar_datos/servicios/ver/'.$acuerdo_actual->id_servicio);?>" target="_blank"><?php echo $servicio_actual ; ?></a> 
                                              </td>       

                                                                        

                                                   
                                                  

                                                  <?php if($acuerdo_violado->estado_disp == 'ok') : ?>
                                                                <td  class="text-center" style="background-color:#A4E8A4; vertical-align: middle;"> <b><?php echo $acuerdo_violado->porcentaje_disp; ?> </b> </td>
                                                  <?php endif ?>

                                                  <?php if($acuerdo_violado->estado_disp == 'alerta') : ?>
                                                                <td style="vertical-align: middle;" class="warning text-center"> <b><?php echo $acuerdo_violado->porcentaje_disp; ?></b> </td>
                                                  <?php endif ?>

                                                  <?php if($acuerdo_violado->estado_disp == 'violado') : ?>
                                                                <td style="vertical-align: middle;" class="danger text-center"> <b><?php echo $acuerdo_violado->porcentaje_disp; ?></b> </td>
                                                    <?php endif ?>

                                                  <td style="vertical-align: middle;"  class="active text-center"><b><?php echo $acuerdo_actual->porcentaje_disp; ?> </b>  </td>



                                                   <?php if($acuerdo_violado->estado_numero_caidas == 'ok') : ?>
                                                                <td class="text-center" style="background-color:#A4E8A4; vertical-align: middle"> <b><?php echo $acuerdo_violado->numero_caidas; ?> </b> </td>
                                                  <?php endif ?>

                                                  <?php if($acuerdo_violado->estado_numero_caidas == 'alerta') : ?>
                                                                <td style="vertical-align: middle;" class="warning text-center"> <b><?php echo $acuerdo_violado->numero_caidas; ?> </b> </td>
                                                  <?php endif ?>

                                                  <?php if($acuerdo_violado->estado_numero_caidas == 'violado') : ?>
                                                                <td style="vertical-align: middle;" class="danger text-center"> <b><?php echo $acuerdo_violado->numero_caidas; ?> </b> </td>
                                                    <?php endif ?>


                                                    <td style="vertical-align: middle;" class="active">


                                                   <b><i>Numero de Caídas <br>(Por <?php echo $acuerdo_actual->unidad_num_caidas; ?>):</i></b><br><br>

                                                  
                                                    <div class="progress">
                                                      <div class="progress-bar progress-bar-success" style="width: 33%">
                                                          <div class='text-center'><b>Normal</b></div>
                                                      </div>
                                                      <div class="progress-bar progress-bar-warning" style="width: 33%">
                                                          <div class='text-center'><b> Alerta </b></div>
                                                      </div>
                                                      <div class="progress-bar progress-bar-danger" style="width: 34%">
                                                           <div class='text-center'><b>Fallo</b> </div>
                                                      </div>
                                                    </div>
                                                    <div class="progress-meter">
                                                      <div class="meter meter-left" style="width: 33%;"><span class="meter-text">0 Caídas</span></div>
                                                      <div class="meter meter-left" style="width: 33%;"><span class="meter-text">
                                                                                              <?php if($acuerdo_actual->minimo_num_caidas > 1) : ?>
                                                                                                      <?php echo  $acuerdo_actual->minimo_num_caidas.' caídas'; ?> 
                                                                                                      <?php else : ?>
                                                                                                      <?php echo  $acuerdo_actual->minimo_num_caidas.' caída'; ?>
                                                                                                      <?php endif ?>
                                                                                              </span></div>
                                                        <div class="meter meter-left" style="width: 34%;"><span class="meter-text">
                                                                                                <?php if($acuerdo_actual->maximo_num_caidas > 1) : ?>
                                                                                                      <?php echo  $acuerdo_actual->maximo_num_caidas.' caídas'; ?> 
                                                                                                      <?php else : ?>
                                                                                                      <?php echo  $acuerdo_actual->maximo_num_caidas.' caída'; ?>
                                                                                                      <?php endif ?>
                                                                                                </span></div>

                                                    </div><br>
                                            

                                                         </td>


                                                  <?php if($acuerdo_violado->estado_tiempo_total == 'ok') : ?>
                                                                <td class="text-center" style="background-color:#A4E8A4; vertical-align: middle"> <b><?php echo $acuerdo_violado->tiempo_caido; ?> </b> </td>
                                                  <?php endif ?>

                                                  <?php if($acuerdo_violado->estado_tiempo_total == 'alerta') : ?>
                                                                <td style="vertical-align: middle;" class="warning text-center"> <b><?php echo $acuerdo_violado->tiempo_caido; ?> </b> </td>
                                                  <?php endif ?>

                                                  <?php if($acuerdo_violado->estado_tiempo_total == 'violado') : ?>
                                                                <td style="vertical-align: middle;" class="danger text-center"> <b><?php echo $acuerdo_violado->tiempo_caido; ?> </b> </td>
                                                    <?php endif ?>


                                                    <?php if($acuerdo_violado->estado_tiempo_mayor == 'ok') : ?>
                                                                <td class="text-center" style="background-color:#A4E8A4; vertical-align: middle"> <b><?php echo $acuerdo_violado->mayor_caida; ?> </b> </td>
                                                  <?php endif ?>

                                                  <?php if($acuerdo_violado->estado_tiempo_mayor == 'alerta') : ?>
                                                                <td style="vertical-align: middle;" class="warning text-center"> <b><?php echo $acuerdo_violado->mayor_caida; ?> </b> </td>
                                                  <?php endif ?>

                                                  <?php if($acuerdo_violado->estado_tiempo_mayor == 'violado') : ?>
                                                                <td  style="vertical-align: middle;" class="danger text-center"> <b><?php echo $acuerdo_violado->mayor_caida; ?> </b> </td>
                                                    <?php endif ?>


                                                       <?php if($acuerdo_violado->estado_tiempo_menor == 'ok') : ?>
                                                                <td class="text-center" style="background-color:#A4E8A4; vertical-align: middle"> <b><?php echo $acuerdo_violado->menor_caida; ?> </b> </td>
                                                  <?php endif ?>

                                                  <?php if($acuerdo_violado->estado_tiempo_menor == 'alerta') : ?>
                                                                <td  style="vertical-align: middle;" class="warning text-center"> <b><?php echo $acuerdo_violado->menor_caida; ?> </b> </td>
                                                  <?php endif ?>

                                                  <?php if($acuerdo_violado->estado_tiempo_menor == 'violado') : ?>
                                                                <td style="vertical-align: middle;" class="danger text-center"> <b><?php echo $acuerdo_violado->menor_caida; ?> </b> </td>
                                                    <?php endif ?>


                                                    <td style="vertical-align: middle;" class="active">
                                                      <b><i>Duración de las Caídas:</i></b><br><br>

                                                           <div class="progress">
                                                              <div class="progress-bar progress-bar-success" style="width: 33%">
                                                                  <div class='text-center'><b>Normal</b></div>
                                                              </div>
                                                              <div class="progress-bar progress-bar-warning" style="width: 33%">
                                                                  <div class='text-center'><b> Alerta </b></div>
                                                              </div>
                                                              <div class="progress-bar progress-bar-danger" style="width: 34%">
                                                                   <div class='text-center'><b>Fallo</b> </div>
                                                              </div>
                                                            </div>
                                                            <div class="progress-meter">
                                                              <div class="meter meter-left" style="width: 33%;"><span class="meter-text">0  <?php echo $acuerdo_actual->unidad_duracion_caidas; ?></span></div>
                                                              <div class="meter meter-left" style="width: 33%;"><span class="meter-text">
                                                                                                      <?php if($acuerdo_actual->minimo_duracion_caidas > 1) : ?>
                                                                                                              <?php echo  $acuerdo_actual->minimo_duracion_caidas.' '.$acuerdo_actual->unidad_duracion_caidas; ?> 
                                                                                                              <?php else : ?>
                                                                                                              <?php 
                                                                                                              $string = $acuerdo_actual->unidad_duracion_caidas;
                                                                                                      $string = substr ($string, 0, - 1);
                                                                                                              echo  $acuerdo_actual->minimo_duracion_caidas.' '.$string; ?>
                                                                                                              <?php endif ?>
                                                                                                      </span></div>
                                                                <div class="meter meter-left" style="width: 34%;"><span class="meter-text">
                                                                                                        <?php if($acuerdo_actual->maximo_duracion_caidas > 1) : ?>
                                                                                                              <?php echo  $acuerdo_actual->maximo_duracion_caidas.' '.$acuerdo_actual->unidad_duracion_caidas; ?> 
                                                                                                              <?php else : ?>
                                                                                                              <?php 
                                                                                                              $string = $acuerdo_actual->unidad_duracion_caidas;
                                                                                                      $string = substr ($string, 0, - 1);
                                                                                                              echo  $acuerdo_actual->maximo_duracion_caidas.' '.$string; ?>
                                                                                                              <?php endif ?>
                                                                                                        </span></div>
                                                            </div>
                                                    </td> 


                                               




                                       </tr>
                                      <?php
                                              }
                                       ?>
                     
                                </tbody>

                            </table>
              </div>
			
	  </div>
	</div>
</div>
	   

	</div>
