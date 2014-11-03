<!DOCTYPE html>
<html>
    <head>
        <title>PDF TEMPLATE</title>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8">

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
        <br />
        
                        <?php endif ?>


          


    </div>
    </div>
    </body>
</html>
