<!DOCTYPE html>
<html>
    <head>
        <title>Documento ANS</title>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
        <link rel="icon" href="<?php echo base_url(); ?>assets/back/img/favicon.ico" >

        <style type="text/css">
        p {
        text-align : justify;
        }
        </style>


<?php 
          // Arreglos para mostrar las fechas en español.
         $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
         $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/sb-admin/css/bootstrap.css" >
    <!-- Add custom CSS here -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/sb-admin/css/sb-admin.css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/sb-admin/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/niveles/views/ans/css/ans.css">


    </head>
    <body>

    <div id="page-wrapper">
        <div class="col-md-10 col-md-offset-1">




        <table width="100%">
            <tr style="background-color: #3a87ad;">
                <td style="text-align: center; vertical-align: middle; height: 45px; color: white">
                    <h3><b>Nombre del Documento de RNS</b></h3>
                </td>
            </tr>
        </table>
        <br />

        <h4><i><?php echo $requisito->nombre; ?></i></h4><br><br>


        <table width="100%">
            <tr style="background-color: #3a87ad;">
                <td style="text-align: center; vertical-align: middle; height: 45px; color: white">
                    <h3><b>Cliente(s)</b></h3>
                </td>
            </tr>
        </table>
        <br />

        <tr>
            <td><?php echo $requisito->cliente; ?><br><br></td>
        </tr>



        <table width="100%">
            <tr style="background-color: #3a87ad;">
                <td style="text-align: center; vertical-align: middle; height: 45px; color: white">
                    <h3><b>Descripción del Servicio</b></h3>
                </td>
            </tr>
        </table>
        <br />

        <tr>
         <td>
         <h5> <b>Servicio:</b> <i><?php echo $servicio->nombre; ?></i> </h5><br>
          <?php echo $servicio->descripcion; ?><br><br>
         </td>
        </tr>


   <?php echo "<pagebreak />";  ?>

     <table width="100%">
            <tr style="background-color: #3a87ad;">
                <td style="text-align: center; vertical-align: middle; height: 45px; color: white">
                    <h3><b>Niveles de Servicio</b></h3>
                </td>
            </tr>
        </table>
        <br />

  
    <tr>
         <td colspan="2"> <br><h4><b>Disponibilidad</b></h4>
         <br>

         <div><b><i>Horario de Disponibilidad</i>:</b></div> <br>
         <table width="100%" border="1" cellpadding="10" style="border: 1px solid;">
                                                <thead class="text-center">
                                                    <tr>
                                                        <td style="background-color:grey; color: white"><b>Lunes</b></td>
                                                        <td style="background-color:grey; color: white"><b>Martes</b></td>
                                                        <td style="background-color:grey; color: white"><b>Mi&#233;rcoles</b></td>
                                                        <td style="background-color:grey; color: white"><b>Jueves</b></td>
                                                        <td style="background-color:grey; color: white"><b>Viernes</b></td>
                                                        <td style="background-color:grey; color: white"><b>S&#225;bado</b></td>
                                                        <td style="background-color:grey; color: white"><b>Domingo</b></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr style="border: 1px solid; padding: 2px;">
                                                        <td width="14%">    

                                                            <?php if($requisito->lunes_disp_ini == '00:00:00' && $requisito->lunes_disp_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($requisito->lunes_disp_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->lunes_disp_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($requisito->lunes_disp_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->lunes_disp_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>

                                                        <td>
                                                          <?php if($requisito->martes_disp_ini == '00:00:00' && $requisito->martes_disp_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($requisito->martes_disp_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->martes_disp_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($requisito->martes_disp_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->martes_disp_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>
                                                        
                                                        <td>
                                                            <?php if($requisito->miercoles_disp_ini == '00:00:00' && $requisito->miercoles_disp_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($requisito->miercoles_disp_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->miercoles_disp_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($requisito->miercoles_disp_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->miercoles_disp_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>
                                                        
                                                        <td>
                                                            <?php if($requisito->jueves_disp_ini == '00:00:00' && $requisito->jueves_disp_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($requisito->jueves_disp_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->jueves_disp_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($requisito->jueves_disp_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->jueves_disp_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>
                                                        
                                                        <td>
                                                            <?php if($requisito->viernes_disp_ini == '00:00:00' && $requisito->viernes_disp_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($requisito->viernes_disp_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->viernes_disp_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($requisito->viernes_disp_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->viernes_disp_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>
                                                        
                                                        <td>
                                                            <?php if($requisito->sabado_disp_ini == '00:00:00' && $requisito->sabado_disp_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($requisito->sabado_disp_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->sabado_disp_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($requisito->sabado_disp_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->sabado_disp_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>
                                                        <td>
                                                            <?php if($requisito->domingo_disp_ini == '00:00:00' && $requisito->domingo_disp_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($requisito->domingo_disp_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->domingo_disp_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($requisito->domingo_disp_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->domingo_disp_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <br><br><br>

                                            
                                            <div><b><i>Total de Horas de Disponibilidad</i>:</b></div> <br>
                                                <table width="70%" border="1" cellpadding="10" style="border: 1px solid;">
                                                <thead class="text-center">
                                                    <tr>
                                                        <td style="background-color:grey; color:#FFFFFF;"><b>Horas por Semana</b></td>
                                                        <td style="background-color:grey; color:#FFFFFF;"><b>Horas por Mes</b></td>
                                                        <td style="background-color:grey; color:#FFFFFF;"><b>Horas por Año</b></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                    <td class="text-center">
                                                         <?php 

                                                            $horas_disponibilidad = $requisito->minutos_disp_semanal / 60;

                                                            if(is_int($horas_disponibilidad))
                                                            {
                                                                echo $horas_disponibilidad.' Horas';
                                                            }
                                                            else
                                                            {
                                                                $numero = $horas_disponibilidad; 
                                                                $separa = explode(".",$numero); 
                                                                $separa[1];
                                                                $horas = floor($horas_disponibilidad);
                                                                $str = '0.'.$separa[1];
                                                                $decimal = (float) $str;
                                                                $segundos = $decimal*60;

                                                                echo $horas.' Horas y '.floor($segundos).' Minutos';
                                                                
                                                            }

                                                        ?>
                                                    </td>
                                                        <td class="text-center">
                                                            <?php 

                                                            $horas_disponibilidad = $requisito->minutos_disp_mensual / 60;

                                                            if(is_int($horas_disponibilidad))
                                                            {
                                                                echo $horas_disponibilidad.' Horas';
                                                            }
                                                            else
                                                            {
                                                                $numero = $horas_disponibilidad; 
                                                                $separa = explode(".",$numero); 
                                                                $separa[1];
                                                                $horas = floor($horas_disponibilidad);
                                                                $str = '0.'.$separa[1];
                                                                $decimal = (float) $str;
                                                                $segundos = $decimal*60;
                                                                echo $horas.' Horas y '.floor($segundos).' Minutos';
                                                                
                                                            }

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php 

                                                            $horas_disponibilidad = $requisito->minutos_disp_anual / 60;

                                                            if(is_int($horas_disponibilidad))
                                                            {
                                                                echo $horas_disponibilidad.' Horas';
                                                            }
                                                            else
                                                            {
                                                                $numero = $horas_disponibilidad; 
                                                                $separa = explode(".",$numero); 
                                                                $separa[1];
                                                                $horas = floor($horas_disponibilidad);
                                                                $str = '0.'.$separa[1];
                                                                $decimal = (float) $str;
                                                                $segundos = $decimal*60;
                                                                echo $horas.' Horas y '.floor($segundos).' Minutos';
                                                                
                                                            }

                                                        ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                               </table><br><hr><br>

       


                                            <div> <b><i><b>Intervalo de Mantenimiento</b></i>:</b> 
                                             
                                            <?php if($requisito->modalidad_mantenimiento == '1') : ?>

                                            <?php echo 'Una Semana al Mes'; ?> 

                                            <?php endif ?>

                                            <?php if($requisito->modalidad_mantenimiento == '2') : ?>

                                            <?php echo 'Dos Semanas al Mes'; ?> 

                                            <?php endif ?>

                                            <?php if($requisito->modalidad_mantenimiento == '3') : ?>

                                            <?php echo 'Tres Semanas al Mes'; ?> 

                                            <?php endif ?>

                                            <?php if($requisito->modalidad_mantenimiento == '4') : ?>

                                            <?php echo 'Todo el Mes (4 Semanas)'; ?> 

                                            <?php endif ?></div><br> 


                                             <div><b><i>Horario de Mantenimiento</i>:</b></div> <br>
                                            <table  width="100%" border="1" cellpadding="10" style="border: 1px solid;">
                                                <thead class="text-center">
                                                    <tr>
                                                        <td style="background-color:grey; color:#FFFFFF;"><b>Lunes</b></td>
                                                        <td style="background-color:grey; color:#FFFFFF;"><b>Martes</b></td>
                                                        <td style="background-color:grey; color:#FFFFFF;"><b>Mi&#233;rcoles</b></td>
                                                        <td style="background-color:grey; color:#FFFFFF;"><b>Jueves</b></td>
                                                        <td style="background-color:grey; color:#FFFFFF;"><b>Viernes</b></td>
                                                        <td style="background-color:grey; color:#FFFFFF;"><b>S&#225;bado</b></td>
                                                        <td style="background-color:grey; color:#FFFFFF;"><b>Domingo</b></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td width="14%">    

                                                            <?php if($requisito->lunes_mant_ini == '00:00:00' && $requisito->lunes_mant_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($requisito->lunes_mant_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->lunes_mant_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($requisito->lunes_mant_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->lunes_mant_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>

                                                        <td>
                                                          <?php if($requisito->martes_mant_ini == '00:00:00' && $requisito->martes_mant_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($requisito->martes_mant_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->martes_mant_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($requisito->martes_mant_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->martes_mant_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>
                                                        
                                                        <td>
                                                            <?php if($requisito->miercoles_mant_ini == '00:00:00' && $requisito->miercoles_mant_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($requisito->miercoles_mant_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->miercoles_mant_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($requisito->miercoles_mant_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->miercoles_mant_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>
                                                        
                                                        <td>
                                                            <?php if($requisito->jueves_mant_ini == '00:00:00' && $requisito->jueves_mant_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($requisito->jueves_mant_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->jueves_mant_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($requisito->jueves_mant_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->jueves_mant_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>
                                                        
                                                        <td>
                                                            <?php if($requisito->viernes_mant_ini == '00:00:00' && $requisito->viernes_mant_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($requisito->viernes_mant_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->viernes_mant_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($requisito->viernes_mant_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->viernes_mant_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>
                                                        
                                                        <td>
                                                            <?php if($requisito->sabado_mant_ini == '00:00:00' && $requisito->sabado_mant_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($requisito->sabado_mant_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->sabado_mant_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($requisito->sabado_mant_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->sabado_mant_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>
                                                        <td>
                                                            <?php if($requisito->domingo_mant_ini == '00:00:00' && $requisito->domingo_mant_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($requisito->domingo_mant_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->domingo_mant_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($requisito->domingo_mant_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($requisito->domingo_mant_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                             <br><br>
                                            <div><b><i>Total de Horas de Mantenimiento</i>:</b></div><br> 
                                                <table width="70%" border="1" cellpadding="10" style="border: 1px solid;">
                                                <thead class="text-center">
                                                    <tr>
                                                        <td style="background-color:grey; color:#FFFFFF;"><b>Horas por Semana</b></td>
                                                        <td style="background-color:grey; color:#FFFFFF;"><b>Horas por Mes</b></td>
                                                        <td style="background-color:grey; color:#FFFFFF;"><b>Horas por Año</b></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                    <td class="text-center">
                                                         <?php 

                                                            $horas_disponibilidad = $requisito->minutos_mant_semanal / 60;

                                                            if(is_int($horas_disponibilidad))
                                                            {
                                                                echo $horas_disponibilidad.' Horas';
                                                            }
                                                            else
                                                            {
                                                                $numero = $horas_disponibilidad; 
                                                                $separa = explode(".",$numero); 
                                                                $separa[1];
                                                                $horas = floor($horas_disponibilidad);
                                                                $str = '0.'.$separa[1];
                                                                $decimal = (float) $str;
                                                                $segundos = $decimal*60;
                                                                echo $horas.' Horas y '.floor($segundos).' Minutos';
                                                                
                                                            }

                                                        ?>
                                                    </td>
                                                        <td class="text-center">
                                                            <?php 

                                                            $horas_disponibilidad = $requisito->minutos_mant_mensual / 60;

                                                            if(is_int($horas_disponibilidad))
                                                            {
                                                                echo $horas_disponibilidad.' Horas';
                                                            }
                                                            else
                                                            {
                                                                $numero = $horas_disponibilidad; 
                                                                $separa = explode(".",$numero); 
                                                                $separa[1];
                                                                $horas = floor($horas_disponibilidad);
                                                                $str = '0.'.$separa[1];
                                                                $decimal = (float) $str;
                                                                $segundos = $decimal*60;
                                                                echo $horas.' Horas y '.floor($segundos).' Minutos';
                                                                
                                                            }

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php 

                                                            $horas_disponibilidad = $requisito->minutos_mant_anual / 60;

                                                            if(is_int($horas_disponibilidad))
                                                            {
                                                                echo $horas_disponibilidad.' Horas';
                                                            }
                                                            else
                                                            {
                                                                $numero = $horas_disponibilidad; 
                                                                $separa = explode(".",$numero); 
                                                                $separa[1];
                                                                $horas = floor($horas_disponibilidad);
                                                                $str = '0.'.$separa[1];
                                                                $decimal = (float) $str;
                                                                $segundos = $decimal*60;
                                                                echo $horas.' Horas y '.floor($segundos).' Minutos';
                                                                
                                                            }

                                                        ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                               </table>

                                               <br><br>


                        <?php if($requisito->complemento_disponibilidad != NULL) : ?>

                             
                          <br>
                          <h4><b>Complemento de Disponibilidad</b></h4>
                        
                        
                          <?php echo $requisito->complemento_disponibilidad; ?><br>

                          
                          
                          
                          <?php endif ?> 

                        
                        <br><h4><b>Confiabilidad</b></h4><br>
                        

                         


                         <b><i>Numero de Caídas (Por <?php echo $requisito->unidad_num_caidas; ?>):</i></b><br><br>

                        
                        
                           <table width="55%" cellpadding="1">
                                                <thead class="text-center">
                                                    <tr>
                                                        <td  style="background-color:#5BAB5B; color:#FFFFFF; height: 4px; width: 33%;"><b>Normal</b></td>
                                                        <td style="background-color:#FFAD5C; color:#FFFFFF; height: 4px; width: 33%;"><b>Alerta</b></td>
                                                        <td style="background-color:#E64848; color:#FFFFFF; height: 4px; width: 33%;"><b>Incumplimiento</b></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="text-left">

                                                    </td>
                                                      
                                                     <td class="text-left">

                                                    </td>
                                                     <td class="text-left">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left" style=" border: 2px grey; border-left-style: solid; border-bottom-style: solid;" >
                                                        <br>
                                                    </td>
                                                      
                                                     <td class="text-left" style="border: 2px grey; border-left-style: solid; border-bottom-style: solid;">
                                                        <br>
                                                    </td>
                                                     <td class="text-left" style="border: 2px grey; border-left-style: solid; border-bottom-style: solid;">
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                        0 Caídas
                                                    </td>
                                                      
                                                     <td class="text-left">
                                                        <?php if($requisito->minimo_num_caidas > 1) : ?>
                                                        <?php echo  $requisito->minimo_num_caidas.' caídas'; ?> 
                                                        <?php else : ?>
                                                        <?php echo  $requisito->minimo_num_caidas.' caída'; ?>
                                                         <?php endif ?>
                                                    </td>
                                                     <td class="text-left">
                                                          <?php if($requisito->maximo_num_caidas > 1) : ?>
                                                        <?php echo  $requisito->maximo_num_caidas.' caídas'; ?> 
                                                        <?php else : ?>
                                                        <?php echo  $requisito->maximo_num_caidas.' caída'; ?>
                                                         <?php endif ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                        </table>
                        <br><br>


                         <b><i>Duración de las Caídas:</i></b><br><br>

                         <table width="55%" cellpadding="1">
                                                <thead class="text-center">
                                                    <tr>
                                                        <td  style="background-color:#5BAB5B; color:#FFFFFF; height: 4px; width: 33%;"><b>Normal</b></td>
                                                        <td style="background-color:#FFAD5C; color:#FFFFFF; height: 4px; width: 33%;"><b>Alerta</b></td>
                                                        <td style="background-color:#E64848; color:#FFFFFF; height: 4px; width: 33%;"><b>Incumplimiento</b></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="text-left">

                                                    </td>
                                                      
                                                     <td class="text-left">

                                                    </td>
                                                     <td class="text-left">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left" style=" border: 2px grey; border-left-style: solid; border-bottom-style: solid;" >
                                                        <br>
                                                    </td>
                                                      
                                                     <td class="text-left" style="border: 2px grey; border-left-style: solid; border-bottom-style: solid;">
                                                        <br>
                                                    </td>
                                                     <td class="text-left" style="border: 2px grey; border-left-style: solid; border-bottom-style: solid;">
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                        0  <?php echo $requisito->unidad_duracion_caidas; ?>
                                                    </td>
                                                      
                                                     <td class="text-left">
                                                       <?php if($requisito->minimo_duracion_caidas > 1) : ?>
                                                                                                                <?php echo  $requisito->minimo_duracion_caidas.' '.$requisito->unidad_duracion_caidas; ?> 
                                                                                                                <?php else : ?>
                                                                                                                <?php 
                                                                                                                $string = $requisito->unidad_duracion_caidas;
                                                                                                                $string = substr ($string, 0, - 1);
                                                                                                                echo  $requisito->minimo_duracion_caidas.' '.$string; ?>
                                                                                                                <?php endif ?>
                                                    </td>
                                                     <td class="text-left">
                                                       <?php if($requisito->maximo_duracion_caidas > 1) : ?>
                                                                                                                <?php echo  $requisito->maximo_duracion_caidas.' '.$requisito->unidad_duracion_caidas; ?> 
                                                                                                                <?php else : ?>
                                                                                                                <?php 
                                                                                                                $string = $requisito->unidad_duracion_caidas;
                                                                                                                $string = substr ($string, 0, - 1);
                                                                                                                echo  $requisito->maximo_duracion_caidas.' '.$string; ?>
                                                                                                                <?php endif ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                        </table>
                        <br><br>


                 <b><i>Tiempo de Respuesta del Servicio:</i></b><br><br>

                  <table width="55%" cellpadding="1">
                                                <thead class="text-center">
                                                    <tr>
                                                        <td  style="background-color:#5BAB5B; color:#FFFFFF; height: 4px; width: 33%;"><b>Normal</b></td>
                                                        <td style="background-color:#FFAD5C; color:#FFFFFF; height: 4px; width: 33%;"><b>Alerta</b></td>
                                                        <td style="background-color:#E64848; color:#FFFFFF; height: 4px; width: 33%;"><b>Incumplimiento</b></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="text-left">

                                                    </td>
                                                      
                                                     <td class="text-left">

                                                    </td>
                                                     <td class="text-left">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left" style=" border: 2px grey; border-left-style: solid; border-bottom-style: solid;" >
                                                        <br>
                                                    </td>
                                                      
                                                     <td class="text-left" style="border: 2px grey; border-left-style: solid; border-bottom-style: solid;">
                                                        <br>
                                                    </td>
                                                     <td class="text-left" style="border: 2px grey; border-left-style: solid; border-bottom-style: solid;">
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                       0  <?php echo $requisito->unidad_tiempo_respuesta; ?>
                                                    </td>
                                                      
                                                     <td class="text-left">
                                                     <?php if($requisito->minimo_tiempo_respuesta > 1) : ?>
                                                                                                                <?php echo  $requisito->minimo_tiempo_respuesta.' '.$requisito->unidad_tiempo_respuesta; ?> 
                                                                                                                <?php else : ?>
                                                                                                                <?php 
                                                                                                                $string = $requisito->unidad_tiempo_respuesta;
                                                                                                                $string = substr ($string, 0, - 1);
                                                                                                                echo  $requisito->minimo_tiempo_respuesta.' '.$string; ?>
                                                                                                                <?php endif ?>
                                                    </td>
                                                     <td class="text-left">
                                                      <?php if($requisito->maximo_tiempo_respuesta > 1) : ?>
                                                                                                                <?php echo  $requisito->maximo_tiempo_respuesta.' '.$requisito->unidad_tiempo_respuesta; ?> 
                                                                                                                <?php else : ?>
                                                                                                                <?php 
                                                                                                                $string = $requisito->unidad_tiempo_respuesta;
                                                                                                                $string = substr ($string, 0, - 1);
                                                                                                                echo  $requisito->maximo_tiempo_respuesta.' '.$string; ?>
                                                                                                                <?php endif ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                        </table>
                        <br><br>



                    <br><h4><b>Sustentabilidad</b></h4><br>


                     <b><i>Tiempo para la Restauración del Servicio:</i></b><br><br>
                      

                       <table width="55%" cellpadding="1">
                                                <thead class="text-center">
                                                    <tr>
                                                        <td  style="background-color:#5BAB5B; color:#FFFFFF; height: 4px; width: 33%;"><b>Normal</b></td>
                                                        <td style="background-color:#FFAD5C; color:#FFFFFF; height: 4px; width: 33%;"><b>Alerta</b></td>
                                                        <td style="background-color:#E64848; color:#FFFFFF; height: 4px; width: 33%;"><b>Incumplimiento</b></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="text-left">

                                                    </td>
                                                      
                                                     <td class="text-left">

                                                    </td>
                                                     <td class="text-left">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left" style=" border: 2px grey; border-left-style: solid; border-bottom-style: solid;" >
                                                        <br>
                                                    </td>
                                                      
                                                     <td class="text-left" style="border: 2px grey; border-left-style: solid; border-bottom-style: solid;">
                                                        <br>
                                                    </td>
                                                     <td class="text-left" style="border: 2px grey; border-left-style: solid; border-bottom-style: solid;">
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                       0  <?php echo $requisito->unidad_tiempo_restauracion; ?>
                                                    </td>
                                                      
                                                     <td class="text-left">
                                                     <?php if($requisito->minimo_tiempo_restauracion > 1) : ?>
                                                                                                                <?php echo  $requisito->minimo_tiempo_restauracion.' '.$requisito->unidad_tiempo_restauracion; ?> 
                                                                                                                <?php else : ?>
                                                                                                                <?php 
                                                                                                                $string = $requisito->unidad_tiempo_restauracion;
                                                                                                                $string = substr ($string, 0, - 1);
                                                                                                                echo  $requisito->minimo_tiempo_restauracion.' '.$string; ?>
                                                                                                                <?php endif ?>
                                                    </td>
                                                     <td class="text-left">
                                                        <?php if($requisito->maximo_tiempo_restauracion > 1) : ?>
                                                                                                                <?php echo  $requisito->maximo_tiempo_restauracion.' '.$requisito->unidad_tiempo_restauracion; ?> 
                                                                                                                <?php else : ?>
                                                                                                                <?php 
                                                                                                                $string = $requisito->unidad_tiempo_restauracion;
                                                                                                                $string = substr ($string, 0, - 1);
                                                                                                                echo  $requisito->maximo_tiempo_restauracion.' '.$string; ?>
                                                                                                                <?php endif ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                        </table>

        </td>
    </tr>
    <br><br><br>


    <?php echo "<pagebreak />";  ?>
      <table width="100%">
            <tr style="background-color: #3a87ad;">
                <td style="text-align: center; vertical-align: middle; height: 45px; color: white">
                    <h3><b>Atención y Soporte al Cliente</b></h3>
                </td>
            </tr>
        </table>
        <br />
      <tr>
            <td><?php echo $requisito->soporte_tecnico; ?><br></td>
        </tr>

        <tr>
            <td><h4><b>Tiempos de Respuesta y de Resolución de Problemas</b></h4><br></td>
        </tr>

                                <br>
      <table width="100%" border="1" cellpadding="10" style="border: 1px grey;">
                                    <thead class="text-center">
                                        <tr>
                                            <td style="background-color:grey; color: white"><b>Nivel de Prioridad</b></td>
                                            <td style="background-color:grey; color: white"><b>Definición</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr >
                                            <td class="text-center"><span class="label-danger" style="color: white; font-size:11px; padding:6px;"><b>Cr&#237;tico</b></span></td>
                                            <td>Degradación completa - Todos los usuarios y funciones críticas afectadas. Servicio completamente sin disponibilidad.</td>
                                        </tr>
                                        <tr >
                                            <td class="text-center"><span  style="color: white; font-size:11px; padding:6px; background-color:#FF6600;" ><b>Severo</b> </span></td>
                                            <td>Degradación significativa - Gran número de usuarios o funciones críticas afectadas.</td>
                                        </tr>
                                        <tr >
                                            <td class="text-center"><span  style="color: white; font-size:11px; padding:6px; background-color:#FFCC66;"><b>Medio</b> </span></td>
                                            <td>Degradación limitada - Un limitado número de usuarios o funciones afectadas. Los Procesos de Negocio pueden continuar. </td>
                                        </tr>
                                        <tr >
                                            <td class="text-center"><span class="label-default" style="color: white; font-size:11px; padding:6px;"><b>Menor</b> </span></td>
                                            <td>Degradación Pequeña  - Pocos usuarios o un usuario afectado. Los Procesos de Negocio pueden continuar.</td>
                                        </tr>
                                    </tbody>
    </table>

    <br><br>



    <table width="100%" border="1" cellpadding="10" style="border: 1px grey;">
                                    <thead class="text-center" width="10%">
                                        <tr>

                                            <td style="background-color:grey; color: white"><b>Medida</b></td>
                                            <td style="background-color:grey; color: white"><b>Cr&#237;tico</b></td>
                                            <td style="background-color:grey; color: white"><b>Severo</b></td>
                                            <td style="background-color:grey; color: white"><b>Medio</b></td>
                                            <td style="background-color:grey; color: white"><b>Menor</b></td>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr >
                                            <td><b>Tiempo de Respuesta</b></td>
                                            <td>
                                                <?php if($requisito->tiempo_respuesta_critico > 1) : ?>
                                                <?php echo  $requisito->tiempo_respuesta_critico.' '.$requisito->unidad_respuesta_critico; ?> 
                                                <?php else : ?>
                                                <?php 
                                                    $string = $requisito->unidad_respuesta_critico;
                                                    $string = substr ($string, 0, - 1);
                                                    echo  $requisito->tiempo_respuesta_critico.' '.$string; ?>
                                                <?php endif ?>                                                                                      
                                            </td>

                                            <td>
                                                <?php if($requisito->tiempo_respuesta_severo > 1) : ?>
                                                <?php echo  $requisito->tiempo_respuesta_severo.' '.$requisito->unidad_respuesta_severo; ?> 
                                                <?php else : ?>
                                                <?php 
                                                    $string = $requisito->unidad_respuesta_severo;
                                                    $string = substr ($string, 0, - 1);
                                                    echo  $requisito->tiempo_respuesta_severo.' '.$string; ?>
                                                <?php endif ?>                                          

                                            </td>

                                            <td>
                                                <?php if($requisito->tiempo_respuesta_medio > 1) : ?>
                                                <?php echo  $requisito->tiempo_respuesta_medio.' '.$requisito->unidad_respuesta_medio; ?> 
                                                <?php else : ?>
                                                <?php 
                                                    $string = $requisito->unidad_respuesta_medio;
                                                    $string = substr ($string, 0, - 1);
                                                    echo  $requisito->tiempo_respuesta_medio.' '.$string; ?>
                                                <?php endif ?>  
                                                
                                            </td>

                                            <td>
                                               <?php if($requisito->tiempo_respuesta_menor > 1) : ?>
                                                <?php echo  $requisito->tiempo_respuesta_menor.' '.$requisito->unidad_respuesta_menor; ?> 
                                                <?php else : ?>
                                                <?php 
                                                    $string = $requisito->unidad_respuesta_menor;
                                                    $string = substr ($string, 0, - 1);
                                                    echo  $requisito->tiempo_respuesta_menor.' '.$string; ?>
                                                <?php endif ?>  
                                                
                                            </td>
                                        </tr>
                                        <tr >
                                            <td><b>Tiempo de Resolución</b></td>
                                            <td>
                                               <?php if($requisito->tiempo_resolucion_critico > 1) : ?>
                                                <?php echo  $requisito->tiempo_resolucion_critico.' '.$requisito->unidad_resolucion_critico; ?> 
                                                <?php else : ?>
                                                <?php 
                                                    $string = $requisito->unidad_resolucion_critico;
                                                    $string = substr ($string, 0, - 1);
                                                    echo  $requisito->tiempo_resolucion_critico.' '.$string; ?>
                                                <?php endif ?>  
                                            </td>

                                            <td>
                                               <?php if($requisito->tiempo_resolucion_severo > 1) : ?>
                                                <?php echo  $requisito->tiempo_resolucion_severo.' '.$requisito->unidad_resolucion_severo; ?> 
                                                <?php else : ?>
                                                <?php 
                                                    $string = $requisito->unidad_resolucion_severo;
                                                    $string = substr ($string, 0, - 1);
                                                    echo  $requisito->tiempo_resolucion_severo.' '.$string; ?>
                                                <?php endif ?>  
                                            </td>

                                            <td>
                                               <?php if($requisito->tiempo_resolucion_medio > 1) : ?>
                                                <?php echo  $requisito->tiempo_resolucion_medio.' '.$requisito->unidad_resolucion_medio; ?> 
                                                <?php else : ?>
                                                <?php 
                                                    $string = $requisito->unidad_resolucion_medio;
                                                    $string = substr ($string, 0, - 1);
                                                    echo  $requisito->tiempo_resolucion_medio.' '.$string; ?>
                                                <?php endif ?>  
                                            </td>

                                            <td>
                                               <?php if($requisito->tiempo_resolucion_menor > 1) : ?>
                                                <?php echo  $requisito->tiempo_resolucion_menor.' '.$requisito->unidad_resolucion_menor; ?> 
                                                <?php else : ?>
                                                <?php 
                                                    $string = $requisito->unidad_resolucion_menor;
                                                    $string = substr ($string, 0, - 1);
                                                    echo  $requisito->tiempo_resolucion_menor.' '.$string; ?>
                                                <?php endif ?>  
                                            </td>
                                        </tr>
                                     </tbody>
                                </table>
        <br><br><br><br>    


    </div>
    </div>
    </body>
</html>
