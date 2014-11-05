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
                    <h3><b>Nombre del Acuerdo</b></h3>
                </td>
            </tr>
        </table>
        <br />

        <h4><i><?php echo $acuerdo->nombre_acuerdo; ?></i></h4><br><br>

       <table width="100%">
            <tr style="background-color: #3a87ad;">
                <td style="text-align: center; vertical-align: middle; height: 45px; color: white">
                    <h3><b>Información General</b></h3>
                </td>
            </tr>
        </table>
        <br />

        <tr style="background-color: #3a87ad;">
                <td>
                   <p>
                    Este Documento representa un Acuerdo de Niveles de Servicio ("ANS" o "Acuerdo") entre 
                    el Proveedor y el Cliente(s) para el 
                    aprovisionamiento <br> del Servicio de TI: <b><i><?php echo $servicio->nombre; ?></i></b>. 
                    El ANS contiene las áreas claves de desempeño del Servicios a ser provisto: Definición del Servicio,
                    términos y condiciones relativos a la entrega del servicio, criterios y métricas de
                    desempeño de los factores claves, penalidades a ser aplicadas ante las desviaciones, gestión de cambios actualizaciones del ANS y los criterios de
                    renovación y terminación.<br><br>

                    <b>Proveedor del Servicio:</b> <i><?php echo $proveedor->nombre; ?></i>
                    <table width="100%">
                        <tr>
                            <td width="10%">
                               <b>Cliente(s):</b>
                            </td>
                            <td>
                               <i><?php echo $acuerdo->cliente; ?></i>
                            </td>
                        </tr>
                    </table>

                   </p><br>
                </td>
         </tr>


        <table width="100%">
            <tr style="background-color: #3a87ad;">
                <td style="text-align: center; vertical-align: middle; height: 45px; color: white">
                    <h3><b>Proposito y Objetivos del Acuerdo</b></h3>
                </td>
            </tr>
        </table>
        <br />

        <tr>
            <td><?php echo $acuerdo->objetivos_acuerdo; ?><br><br></td>
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
         <h5> <b>Servicio Cubierto:</b> <i><?php echo $servicio->nombre; ?></i> </h5><br>
          <?php echo $servicio->descripcion; ?><br><br>
         </td>
        </tr>


        


        <table width="100%">
            <tr style="background-color: #3a87ad;">
                <td style="text-align: center; vertical-align: middle; height: 45px; color: white">
                    <h3><b>Revisión Periódica</b></h3>
                </td>
            </tr>
        </table>
        <br />

        <tr>
             <td colspan="2" style="text-align:justify;">
                <p>
                    Este acuerdo es válido a partir desde el 
                            <b><?php 
                                $date = date_create($acuerdo->fecha_inicio);
                                echo date_format($date,'d')." de ".$meses[date_format($date,'n')-1]. " del ".date_format($date,'Y');
                            ?></b>
                            hasta el 
                            <b><?php 
                                $date = date_create($acuerdo->fecha_final);
                                echo date_format($date,'d')." de ".$meses[date_format($date,'n')-1]. " del ".date_format($date,'Y');
                            ?></b>

                    y debe ser revisado como mínimo una vez   

                    <?php if($acuerdo->modo_revision == 'Mensual') : ?>
                           al  <b> Mes</b>.
                        <?php endif ?>
                        
                        <?php if($acuerdo->modo_revision == 'Trimestral') : ?>
                           <b> cada  <b>3 Meses</b>.
                        <?php endif ?>

                        <?php if($acuerdo->modo_revision == 'Semestral') : ?>
                         <b>  cada 6 Meses</b>.
                        <?php endif ?>

                        <?php if($acuerdo->modo_revision == 'Anual') : ?>
                             al  <b> Año</b>.
                        <?php endif ?>

                        Sin embargo, bajo la ausencia o falta de cualquier revisión en cualquier período,
                        este acuerdo deberá permanecer vigente. <br><br>

                    El <b>Gestor de Niveles de Servicio</b> es responsable de facilitar las revisiones periódicas de este documento y de velar porque los 
                    Niveles de Servicio establecidos en este Acuerdo se cumplan. <br><br>



                    <b>Gestor de Niveles de Servicio:</b> <?php echo $gestor->codigo_empleado.' - '.$gestor->nombre; ?><br>

                    <b>Período de Revisión:</b>  <?php echo $acuerdo->modo_revision; ?> <br>

                                               
                    
                    <b>Ultima Fecha de Revisión:</b>  <?php if($acuerdo->ultima_revision == NULL) : ?>
                                                      <i>  No posee </i>
                                                     <?php else : ?>
                                                         <?php 
                                                            $date = date_create($acuerdo->ultima_revision);
                                                            echo date_format($date,'d')." de ".$meses[date_format($date,'n')-1]. " del ".date_format($date,'Y');
                                                            ?> 
                                                     <?php endif ?><br>

                    <b>Siguiente Fecha de Revisión:</b>     <?php 
                                                        $date = date_create($acuerdo->fecha_revision);
                                                        echo date_format($date,'d')." de ".$meses[date_format($date,'n')-1]. " del ".date_format($date,'Y');
                                                        ?> <br>
                </p>

            <br><br></td>
        </tr>

        <table width="100%">
            <tr style="background-color: #3a87ad;">
                <td style="text-align: center; vertical-align: middle; height: 45px; color: white">
                    <h3><b>Alcance y Exclusiones</b></h3>
                </td>
            </tr>
        </table>
        <br />

        <tr>
            <td><?php echo $acuerdo->alcance; ?> <br><br></td>
        </tr>


 
   <?php foreach ($posiciones as $key => $val) : ?>

         <?php if($val == 'terminacion') : ?>
                  <?php if($acuerdo->condiciones_terminacion != NULL) : ?>
                               <table width="100%">
                    <tr style="background-color: #3a87ad;">
                        <td style="text-align: center; vertical-align: middle; height: 45px; color: white">
                            <h3><b>Condiciones para la Terminación del Acuerdo</b></h3>
                        </td>
                    </tr>
                
                </table>
                    <tr>
                                    <td colspan="2" style="text-align:justify;"> <br><?php echo $acuerdo->condiciones_terminacion; ?></td>
                            
                    </tr>
                <br />
                                <?php endif ?>
                <br><br>
        <?php endif ?> 

    

      <?php if($val == 'modificacion') : ?>
            <?php if($acuerdo->procedimiento_actualizacion != NULL) : ?>
                <table width="100%">
                    <tr style="background-color: #3a87ad;">
                        <td style="text-align: center; vertical-align: middle; height: 45px; color: white">
                            <h3><b>Procedimientos para Modificación del Acuerdo</b></h3>
                        </td>
                    </tr>
                 
                </table>
                   <tr>
                     <td colspan="2" style="text-align:justify;"> <br><?php echo $acuerdo->procedimiento_actualizacion; ?></td>
                   </tr>
                <br/>
           <?php endif ?>
           <br><br>
      <?php endif ?>


    <?php if($val == 'niveles') : ?>
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

                                                            <?php if($acuerdo->lunes_disp_ini == '00:00:00' && $acuerdo->lunes_disp_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->lunes_disp_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->lunes_disp_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($acuerdo->lunes_disp_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->lunes_disp_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>

                                                        <td>
                                                          <?php if($acuerdo->martes_disp_ini == '00:00:00' && $acuerdo->martes_disp_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->martes_disp_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->martes_disp_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($acuerdo->martes_disp_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->martes_disp_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>
                                                        
                                                        <td>
                                                            <?php if($acuerdo->miercoles_disp_ini == '00:00:00' && $acuerdo->miercoles_disp_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->miercoles_disp_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->miercoles_disp_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($acuerdo->miercoles_disp_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->miercoles_disp_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>
                                                        
                                                        <td>
                                                            <?php if($acuerdo->jueves_disp_ini == '00:00:00' && $acuerdo->jueves_disp_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->jueves_disp_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->jueves_disp_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($acuerdo->jueves_disp_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->jueves_disp_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>
                                                        
                                                        <td>
                                                            <?php if($acuerdo->viernes_disp_ini == '00:00:00' && $acuerdo->viernes_disp_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->viernes_disp_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->viernes_disp_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($acuerdo->viernes_disp_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->viernes_disp_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>
                                                        
                                                        <td>
                                                            <?php if($acuerdo->sabado_disp_ini == '00:00:00' && $acuerdo->sabado_disp_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->sabado_disp_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->sabado_disp_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($acuerdo->sabado_disp_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->sabado_disp_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>
                                                        <td>
                                                            <?php if($acuerdo->domingo_disp_ini == '00:00:00' && $acuerdo->domingo_disp_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->domingo_disp_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->domingo_disp_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($acuerdo->domingo_disp_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->domingo_disp_fin)); ?> 

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

                                                            $horas_disponibilidad = $acuerdo->minutos_disp_semanal / 60;

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

                                                            $horas_disponibilidad = $acuerdo->minutos_disp_mensual / 60;

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

                                                            $horas_disponibilidad = $acuerdo->minutos_disp_anual / 60;

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
                                             
                                            <?php if($acuerdo->modalidad_mantenimiento == '1') : ?>

                                            <?php echo 'Una Semana al Mes'; ?> 

                                            <?php endif ?>

                                            <?php if($acuerdo->modalidad_mantenimiento == '2') : ?>

                                            <?php echo 'Dos Semanas al Mes'; ?> 

                                            <?php endif ?>

                                            <?php if($acuerdo->modalidad_mantenimiento == '3') : ?>

                                            <?php echo 'Tres Semanas al Mes'; ?> 

                                            <?php endif ?>

                                            <?php if($acuerdo->modalidad_mantenimiento == '4') : ?>

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

                                                            <?php if($acuerdo->lunes_mant_ini == '00:00:00' && $acuerdo->lunes_mant_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->lunes_mant_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->lunes_mant_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($acuerdo->lunes_mant_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->lunes_mant_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>

                                                        <td>
                                                          <?php if($acuerdo->martes_mant_ini == '00:00:00' && $acuerdo->martes_mant_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->martes_mant_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->martes_mant_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($acuerdo->martes_mant_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->martes_mant_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>
                                                        
                                                        <td>
                                                            <?php if($acuerdo->miercoles_mant_ini == '00:00:00' && $acuerdo->miercoles_mant_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->miercoles_mant_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->miercoles_mant_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($acuerdo->miercoles_mant_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->miercoles_mant_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>
                                                        
                                                        <td>
                                                            <?php if($acuerdo->jueves_mant_ini == '00:00:00' && $acuerdo->jueves_mant_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->jueves_mant_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->jueves_mant_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($acuerdo->jueves_mant_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->jueves_mant_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>
                                                        
                                                        <td>
                                                            <?php if($acuerdo->viernes_mant_ini == '00:00:00' && $acuerdo->viernes_mant_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->viernes_mant_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->viernes_mant_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($acuerdo->viernes_mant_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->viernes_mant_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>
                                                        
                                                        <td>
                                                            <?php if($acuerdo->sabado_mant_ini == '00:00:00' && $acuerdo->sabado_mant_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->sabado_mant_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->sabado_mant_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($acuerdo->sabado_mant_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->sabado_mant_fin)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                             </div>
                                                        </td>
                                                        <td>
                                                            <?php if($acuerdo->domingo_mant_ini == '00:00:00' && $acuerdo->domingo_mant_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label"><b>Inicio:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->domingo_mant_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->domingo_mant_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label"><b>Fin:</b></label><br> 
                                                             <div class="input-group text-left">
                                                                    <?php if($acuerdo->domingo_mant_fin != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->domingo_mant_fin)); ?> 

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

                                                            $horas_disponibilidad = $acuerdo->minutos_mant_semanal / 60;

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

                                                            $horas_disponibilidad = $acuerdo->minutos_mant_mensual / 60;

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

                                                            $horas_disponibilidad = $acuerdo->minutos_mant_anual / 60;

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
                        <br><h4><b>Confiabilidad</b></h4><br>
                        

                         


                         <b><i>Numero de Caídas (Por <?php echo $acuerdo->unidad_num_caidas; ?>):</i></b><br><br>

                        
                        
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
                                                        <?php if($acuerdo->minimo_num_caidas > 1) : ?>
                                                        <?php echo  $acuerdo->minimo_num_caidas.' caídas'; ?> 
                                                        <?php else : ?>
                                                        <?php echo  $acuerdo->minimo_num_caidas.' caída'; ?>
                                                         <?php endif ?>
                                                    </td>
                                                     <td class="text-left">
                                                          <?php if($acuerdo->maximo_num_caidas > 1) : ?>
                                                        <?php echo  $acuerdo->maximo_num_caidas.' caídas'; ?> 
                                                        <?php else : ?>
                                                        <?php echo  $acuerdo->maximo_num_caidas.' caída'; ?>
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
                                                        0  <?php echo $acuerdo->unidad_duracion_caidas; ?>
                                                    </td>
                                                      
                                                     <td class="text-left">
                                                       <?php if($acuerdo->minimo_duracion_caidas > 1) : ?>
                                                                                                                <?php echo  $acuerdo->minimo_duracion_caidas.' '.$acuerdo->unidad_duracion_caidas; ?> 
                                                                                                                <?php else : ?>
                                                                                                                <?php 
                                                                                                                $string = $acuerdo->unidad_duracion_caidas;
                                                                                                                $string = substr ($string, 0, - 1);
                                                                                                                echo  $acuerdo->minimo_duracion_caidas.' '.$string; ?>
                                                                                                                <?php endif ?>
                                                    </td>
                                                     <td class="text-left">
                                                       <?php if($acuerdo->maximo_duracion_caidas > 1) : ?>
                                                                                                                <?php echo  $acuerdo->maximo_duracion_caidas.' '.$acuerdo->unidad_duracion_caidas; ?> 
                                                                                                                <?php else : ?>
                                                                                                                <?php 
                                                                                                                $string = $acuerdo->unidad_duracion_caidas;
                                                                                                                $string = substr ($string, 0, - 1);
                                                                                                                echo  $acuerdo->maximo_duracion_caidas.' '.$string; ?>
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
                                                       0  <?php echo $acuerdo->unidad_tiempo_respuesta; ?>
                                                    </td>
                                                      
                                                     <td class="text-left">
                                                     <?php if($acuerdo->minimo_tiempo_respuesta > 1) : ?>
                                                                                                                <?php echo  $acuerdo->minimo_tiempo_respuesta.' '.$acuerdo->unidad_tiempo_respuesta; ?> 
                                                                                                                <?php else : ?>
                                                                                                                <?php 
                                                                                                                $string = $acuerdo->unidad_tiempo_respuesta;
                                                                                                                $string = substr ($string, 0, - 1);
                                                                                                                echo  $acuerdo->minimo_tiempo_respuesta.' '.$string; ?>
                                                                                                                <?php endif ?>
                                                    </td>
                                                     <td class="text-left">
                                                      <?php if($acuerdo->maximo_tiempo_respuesta > 1) : ?>
                                                                                                                <?php echo  $acuerdo->maximo_tiempo_respuesta.' '.$acuerdo->unidad_tiempo_respuesta; ?> 
                                                                                                                <?php else : ?>
                                                                                                                <?php 
                                                                                                                $string = $acuerdo->unidad_tiempo_respuesta;
                                                                                                                $string = substr ($string, 0, - 1);
                                                                                                                echo  $acuerdo->maximo_tiempo_respuesta.' '.$string; ?>
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
                                                       0  <?php echo $acuerdo->unidad_tiempo_restauracion; ?>
                                                    </td>
                                                      
                                                     <td class="text-left">
                                                     <?php if($acuerdo->minimo_tiempo_restauracion > 1) : ?>
                                                                                                                <?php echo  $acuerdo->minimo_tiempo_restauracion.' '.$acuerdo->unidad_tiempo_restauracion; ?> 
                                                                                                                <?php else : ?>
                                                                                                                <?php 
                                                                                                                $string = $acuerdo->unidad_tiempo_restauracion;
                                                                                                                $string = substr ($string, 0, - 1);
                                                                                                                echo  $acuerdo->minimo_tiempo_restauracion.' '.$string; ?>
                                                                                                                <?php endif ?>
                                                    </td>
                                                     <td class="text-left">
                                                        <?php if($acuerdo->maximo_tiempo_restauracion > 1) : ?>
                                                                                                                <?php echo  $acuerdo->maximo_tiempo_restauracion.' '.$acuerdo->unidad_tiempo_restauracion; ?> 
                                                                                                                <?php else : ?>
                                                                                                                <?php 
                                                                                                                $string = $acuerdo->unidad_tiempo_restauracion;
                                                                                                                $string = substr ($string, 0, - 1);
                                                                                                                echo  $acuerdo->maximo_tiempo_restauracion.' '.$string; ?>
                                                                                                                <?php endif ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                        </table>

        </td>
    </tr>
    <br><br><br>
    <?php endif ?>

     <?php if($val == 'soporte') : ?>
      <table width="100%">
            <tr style="background-color: #3a87ad;">
                <td style="text-align: center; vertical-align: middle; height: 45px; color: white">
                    <h3><b>Atención y Soporte al Cliente</b></h3>
                </td>
            </tr>
        </table>
        <br />
      <tr>
            <td><?php echo $acuerdo->soporte_tecnico; ?><br></td>
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
                                                <?php if($acuerdo->tiempo_respuesta_critico > 1) : ?>
                                                <?php echo  $acuerdo->tiempo_respuesta_critico.' '.$acuerdo->unidad_respuesta_critico; ?> 
                                                <?php else : ?>
                                                <?php 
                                                    $string = $acuerdo->unidad_respuesta_critico;
                                                    $string = substr ($string, 0, - 1);
                                                    echo  $acuerdo->tiempo_respuesta_critico.' '.$string; ?>
                                                <?php endif ?>                                                                                      
                                            </td>

                                            <td>
                                                <?php if($acuerdo->tiempo_respuesta_severo > 1) : ?>
                                                <?php echo  $acuerdo->tiempo_respuesta_severo.' '.$acuerdo->unidad_respuesta_severo; ?> 
                                                <?php else : ?>
                                                <?php 
                                                    $string = $acuerdo->unidad_respuesta_severo;
                                                    $string = substr ($string, 0, - 1);
                                                    echo  $acuerdo->tiempo_respuesta_severo.' '.$string; ?>
                                                <?php endif ?>                                          

                                            </td>

                                            <td>
                                                <?php if($acuerdo->tiempo_respuesta_medio > 1) : ?>
                                                <?php echo  $acuerdo->tiempo_respuesta_medio.' '.$acuerdo->unidad_respuesta_medio; ?> 
                                                <?php else : ?>
                                                <?php 
                                                    $string = $acuerdo->unidad_respuesta_medio;
                                                    $string = substr ($string, 0, - 1);
                                                    echo  $acuerdo->tiempo_respuesta_medio.' '.$string; ?>
                                                <?php endif ?>  
                                                
                                            </td>

                                            <td>
                                               <?php if($acuerdo->tiempo_respuesta_menor > 1) : ?>
                                                <?php echo  $acuerdo->tiempo_respuesta_menor.' '.$acuerdo->unidad_respuesta_menor; ?> 
                                                <?php else : ?>
                                                <?php 
                                                    $string = $acuerdo->unidad_respuesta_menor;
                                                    $string = substr ($string, 0, - 1);
                                                    echo  $acuerdo->tiempo_respuesta_menor.' '.$string; ?>
                                                <?php endif ?>  
                                                
                                            </td>
                                        </tr>
                                        <tr >
                                            <td><b>Tiempo de Resolución</b></td>
                                            <td>
                                               <?php if($acuerdo->tiempo_resolucion_critico > 1) : ?>
                                                <?php echo  $acuerdo->tiempo_resolucion_critico.' '.$acuerdo->unidad_resolucion_critico; ?> 
                                                <?php else : ?>
                                                <?php 
                                                    $string = $acuerdo->unidad_resolucion_critico;
                                                    $string = substr ($string, 0, - 1);
                                                    echo  $acuerdo->tiempo_resolucion_critico.' '.$string; ?>
                                                <?php endif ?>  
                                            </td>

                                            <td>
                                               <?php if($acuerdo->tiempo_resolucion_severo > 1) : ?>
                                                <?php echo  $acuerdo->tiempo_resolucion_severo.' '.$acuerdo->unidad_resolucion_severo; ?> 
                                                <?php else : ?>
                                                <?php 
                                                    $string = $acuerdo->unidad_resolucion_severo;
                                                    $string = substr ($string, 0, - 1);
                                                    echo  $acuerdo->tiempo_resolucion_severo.' '.$string; ?>
                                                <?php endif ?>  
                                            </td>

                                            <td>
                                               <?php if($acuerdo->tiempo_resolucion_medio > 1) : ?>
                                                <?php echo  $acuerdo->tiempo_resolucion_medio.' '.$acuerdo->unidad_resolucion_medio; ?> 
                                                <?php else : ?>
                                                <?php 
                                                    $string = $acuerdo->unidad_resolucion_medio;
                                                    $string = substr ($string, 0, - 1);
                                                    echo  $acuerdo->tiempo_resolucion_medio.' '.$string; ?>
                                                <?php endif ?>  
                                            </td>

                                            <td>
                                               <?php if($acuerdo->tiempo_resolucion_menor > 1) : ?>
                                                <?php echo  $acuerdo->tiempo_resolucion_menor.' '.$acuerdo->unidad_resolucion_menor; ?> 
                                                <?php else : ?>
                                                <?php 
                                                    $string = $acuerdo->unidad_resolucion_menor;
                                                    $string = substr ($string, 0, - 1);
                                                    echo  $acuerdo->tiempo_resolucion_menor.' '.$string; ?>
                                                <?php endif ?>  
                                            </td>
                                        </tr>
                                     </tbody>
                                </table>
        <br><br><br><br>
        <?php endif ?>

        <?php if($val == 'responsabilidades') : ?>
         <table width="100%">
            <tr style="background-color: #3a87ad;">
                <td style="text-align: center; vertical-align: middle; height: 45px; color: white">
                    <h3><b>Responsabilidades</b></h3>
                </td>
            </tr>
        </table>
        <br />

        <tr>
            <td><?php echo $acuerdo->responsabilidades; ?><br><br></td>
        </tr>
        <?php endif ?> 

        <?php  if($val == 'contacto') : ?>
         <table width="100%">
            <tr style="background-color: #3a87ad;">
                <td style="text-align: center; vertical-align: middle; height: 45px; color: white">
                    <h3><b>Información de Contacto</b></h3>
                </td>
            </tr>
        </table>
        <br />

        <tr>
            <td><?php echo $acuerdo->contactos; ?><br><br></td>
        </tr>
        <?php endif ?>

        <?php  if($val == 'costos') : ?>
                <?php if($acuerdo->cobros != NULL) : ?>
                               <table width="100%">
                    <tr style="background-color: #3a87ad;">
                        <td style="text-align: center; vertical-align: middle; height: 45px; color: white">
                            <h3><b>Costos y Penalidades</b></h3>
                        </td>
                    </tr>
                
                </table>
                    <tr>
                                    <td colspan="2" style="text-align:justify;"> <br><?php echo $acuerdo->cobros; ?></td>
                            
                    </tr>
                <br />
                <?php endif ?>
                <br><br>
        <?php endif ?>


        <?php  if($val == 'glosario') : ?>
            <?php if($acuerdo->glosario != NULL) : ?>
                           <table width="100%">
                <tr style="background-color: #3a87ad;">
                    <td style="text-align: center; vertical-align: middle; height: 45px; color: white">
                        <h3><b>Glosario</b></h3>
                    </td>
                </tr>
            
            </table>
                <tr>
                                <td colspan="2" style="text-align:justify;"> <br><?php echo $acuerdo->glosario; ?></td>
                        
                </tr>
            <br />
            <?php endif ?>
            <br><br>
         <?php endif ?>

    <?php endforeach ?>

        
        <table width="100%">
            <tr style="background-color: #3a87ad;">
                <td style="text-align: center; vertical-align: middle; height: 45px; color: white">
                    <h3><b>Aprobación de Acuerdo</b></h3>
                </td>
            </tr>
        </table>
        <br />
        

        Los abajo firmantes están de acuerdo con todas las secciones establecidas previamente en este documento. Especialmente con los Niveles de Servicio fijados.<br><br>


        <br><br>
        <div style="margin-left: 50px;">
          <table width="90%" cellpadding="1">
                                                
                                                <tr >
                                                    <td class="text-left" style=" border: 1px; solid; border-bottom-style: solid;" width="60%">
                                                        <br>
                                                    </td>
                                                      
                                                     <td>
                                                        <br>
                                                    </td>
                                                     <td class="text-left" style="border: 1px; solid; border-bottom-style: solid;">
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class='text-center'>
                                                        <b>Representante del Proveedor de Servicio de TI </b><br><br>
                                                    </td>
                                                      
                                                     <td>
                                                        <br><br><br>
                                                    </td>
                                                        
                                                     <td  class='text-center'>
                                                        <b>Fecha</b> <br><br>
                                                        
                                                    </td>
                                                </tr>

                                                <tr >
                                                    <td class="text-left" style=" border: 1px; solid; border-bottom-style: solid; padding-top: 30px;" width="40%" >
                                                        <br>
                                                    </td>
                                                      
                                                     <td style=" padding-top: 30px;">
                                                        <br>
                                                    </td>
                                                     <td class="text-left" style="border: 1px; solid; border-bottom-style: solid; padding-top: 30px;" >
                                                        <br>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td  class='text-center'>
                                                       <b> Representante del Cliente(s) </b>
                                                    </td>
                                                      
                                                     <td>
                                                        <br>
                                                    </td>
                                                     <td  class='text-center'>
                                                        <b> Fecha </b>
                                                    </td>
                                                </tr>


                                                
                                    
                        </table>
       </div>


          


    </div>
    </div>
    </body>
</html>
