<link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/niveles/views/ans/css/estructura.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/niveles/views/ans/css/ans.css">

<?php 
          // Arreglos para mostrar las fechas en español.
         $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
         $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 ?>

  <script> 

  var waitingDialog = (function ($) {

    // Creating modal dialog's DOM
    var $dialog = $(
        '<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:15%; overflow-y:visible;">' +
        '<div class="modal-dialog modal-m">' +
        '<div class="modal-content">' +
            '<div class="modal-header"><h3 style="margin:0;"></h3></div>' +
            '<div class="modal-body">' +
                '<div class="progress progress-striped active" style="margin-bottom:0;"><div class="progress-bar" style="width: 100%"></div></div>' +
            '</div>' +
        '</div></div></div>');

    return {
        /**
         * Opens our dialog
         * @param message Custom message
         * @param options Custom options:
         *                options.dialogSize - bootstrap postfix for dialog size, e.g. "sm", "m";
         *                options.progressType - bootstrap postfix for progress bar type, e.g. "success", "warning".
         */
        show: function (message, options) {
            // Assigning defaults
            var settings = $.extend({
                dialogSize: 'm',
                progressType: ''
            }, options);
            if (typeof message === 'undefined') {
                message = 'Loading';
            }
            if (typeof options === 'undefined') {
                options = {};
            }
            // Configuring dialog
            $dialog.find('.modal-dialog').attr('class', 'modal-dialog').addClass('modal-' + settings.dialogSize);
            $dialog.find('.progress-bar').attr('class', 'progress-bar');
            if (settings.progressType) {
                $dialog.find('.progress-bar').addClass('progress-bar-' + settings.progressType);
            }
            $dialog.find('h3').text(message);
            // Opening dialog
            $dialog.modal();
        },
        /**
         * Closes dialog
         */
        hide: function () {
            $dialog.modal('hide');
        }
    }

})(jQuery);


  $(document).on('click', '.panel-heading span.clickable', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel_estructura').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('fa-minus').addClass('fa-plus');
    } else {
        $this.parents('.panel_estructura').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('fa-plus').addClass('fa-minus');
    }
});
$(document).on('click', '.panel_estructura div.clickable', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel_estructura').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('fa-minus').addClass('fa-plus');
    } else {
        $this.parents('.panel_estructura').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('fa-plus').addClass('fa-minus');
    }
});

$(document).ready(function() {


    setTimeout(function() {
        $("#message").fadeOut(1500);
    },10000);
    
   $('.panel-heading span.clickable').click();
   $('.panel_estructura div.clickable').click();

   $( "#draggablePanelList" ).sortable();


   $("#guardar_estructura").click(function(){ 

        var items = $("#draggablePanelList").sortable('toArray').toString();

        //alert(items);

        var posiciones = items.split(',');
        var acuerdo_id = <?php echo $acuerdo->acuerdo_nivel_id; ?>

        //alert( posiciones[1]);
         waitingDialog.show('Cargando');

          $.ajax({
                url: config.base+'index.php/niveles/acuerdos_ns/modificar_estructura_acuerdo',
                type: 'POST', 
                data: {                         
                                    posiciones_estructura : posiciones,
                                    id_acuerdo : acuerdo_id,

                      },
                cache : false,  
                success: function(data){
           
                  window.location.href = config.base+'index.php/niveles_de_servicio/gestion_ANS/estructura_ANS/'+acuerdo_id;

                },
                error: function(xhr, ajaxOptions, thrownError){
                    
                    alert(xhr.status+" "+thrownError);
                    }
            });

   });

    

   $("#predeterminado").click(function(){ 

        var acuerdo_id = <?php echo $acuerdo->acuerdo_nivel_id; ?>

       // $("#modal_cargando").modal('show');
      waitingDialog.show('Cargando');
    
          $.ajax({
                url: config.base+'index.php/niveles/acuerdos_ns/estructura_predeterminada',
                type: 'POST', 
                data: {                         
                                    id_acuerdo : acuerdo_id,

                      },
                cache : false,  
                success: function(data){
           
                  window.location.href = config.base+'index.php/niveles_de_servicio/gestion_ANS/estructura_ANS/'+acuerdo_id;

                },
                error: function(xhr, ajaxOptions, thrownError){
                    
                    alert(xhr.status+" "+thrownError);
                    }
            });

   });

   $("#mostrar_todos").click(function(){ 

      $('.panel-body').slideDown();

   });

   $("#ocultar_todos").click(function(){ 

       $('.panel_estructura').find('.panel-body').slideUp();
   });




 });

  </script>

<div id="page-wrapper">

<ol class="breadcrumb">
        <li class="active"><i class="fa fa-file-o"></i> 
          Sección que brinda la opción de Estructurar el Orden y el Contenido de las Secciones del Acuerdo de Niveles de Servicio Seleccionado.</li>
        </ol>

    <?php if($this->session->flashdata('Success')) { ?>
    <div class="alert alert-success text-center" role="alert" id="message">
        <i class="fa fa-check"></i> <b><?php echo $this->session->flashdata('Success');?></b>
    </div>

      <?php }
      ?>


    <?php if($this->session->flashdata('Error')) { ?>
    <div class="alert alert-danger text-center" role="alert" id="message">
        <i class="fa fa-exclamation-circle"></i> <b><?php echo $this->session->flashdata('Error');?></b>
    </div>

      <?php }
      ?>

  <div class="col-lg-10 col-lg-offset-1">
    <div class="panel panel-primary">
      <div class="panel-heading"> 

            <h4><i class="fa fa-file-pdf-o"></i> Estructura para el Documento PDF del ANS: <b><i><?php echo $acuerdo->nombre_acuerdo; ?></i></b></h4>

      </div> 
      <div class="panel-body">

        <div class="row">
        <div class="col-lg-12">

        <div class="row">
             <div class='col-lg-12'>
                    <div class='col-lg-2 text-left'>
                        <a href="<?php echo base_url('index.php/niveles_de_servicio/gestion_ANS');?>" type="button" class="btn btn-default btn-xs" id="cancelar"><i class="fa fa-arrow-circle-left"></i> Volver a la Gesti&#243;n de ANS</a>
                    </div>
                    <div class="col-lg-10 text-right">
                         <a type="button" class="btn btn-info btn-xs" id="predeterminado"><i class="fa fa-list-alt"></i> Restablecer Estructura Predeterminada</a>

                        <a type="button" class="btn btn-info btn-xs" id="mostrar_todos"><i class="fa fa-plus"></i> Mostrar TODOS</a>

                         <a type="button" class="btn btn-info btn-xs" id="ocultar_todos"><i class="fa fa-minus"></i> Ocultar TODOS</a>
                    </div>
            </div>
        </div>

        <hr>

        <div class="well" style="background-color:#FDFDFD;">

                <div class="panel panel_estructura panel-default">
                    <div class="panel-heading clickable2" style="background-color:#E4E4E4;">
                        <h2 class="panel-title text-center">
                            <b>Nombre del Acuerdo</b></h2>
                        <span class="pull-right clickable"><i class="fa fa-minus"></i></span>
                    </div>
                    <div class="panel-body">
                        <tr>
                            <td colspan="2">
                                <div class='col-md-12'>
                                    <h4><i><?php echo $acuerdo->nombre_acuerdo; ?></i></h4>
                                </div>
                            </td>
                        
                        </tr>
                    </div>
                </div>


                <div class="panel panel_estructura panel-default">
                    <div class="panel-heading clickable2" style="background-color:#E4E4E4;">
                        <h2 class="panel-title text-center">
                            <b>Alcance</b></h2>
                        <span class="pull-right clickable"><i class="fa fa-minus"></i></span>
                    </div>
                    <div class="panel-body">
                        <table>
                         <tr>
                          <td width="30%"><h5><b><i>Servicio Cubierto:</i></b></h5></td>
                          <td><h5><i><span class="label label-primary"><?php echo $servicio->nombre; ?></span></i></h5></td>
                        </tr>

                        <tr>
                          <td width="30%"><h5><i><b>Gestor de Niveles de Servicio:</b></i></h5></td>
                          <td><h5><i><?php echo $gestor->codigo_empleado.' - '.$gestor->nombre; ?></i></h5></td>
                        </tr>

                        <tr>
                          <td width="30%"><h5><i><b>Cliente(s):</b></i></h5></td>
                          <td><h5><i><?php echo $acuerdo->cliente; ?></i></h5></td>
                        </tr>

                        
                        <tr>
                          <td width="30%"><h5><i><b>Representante del Cliente:</b></i></h5></td>
                          <td><h5><i><?php echo $representante->codigo_empleado.' - '.$representante->nombre;  ?></i></h5></td>
                        </tr>

                        <tr>
                          <td width="30%"><h5><i><b>Duración del Acuerdo:</b></i></h5></td>
                          <td><h5>
                            <i>Desde el </i>
                            <u><b><?php 
                                $date = date_create($acuerdo->fecha_inicio);
                                echo date_format($date,'d')." de ".$meses[date_format($date,'n')-1]. " del ".date_format($date,'Y');
                            ?></b></u>
                            hasta el 
                            <u><b><?php 
                                $date = date_create($acuerdo->fecha_final);
                                echo date_format($date,'d')." de ".$meses[date_format($date,'n')-1]. " del ".date_format($date,'Y');
                            ?></b></u>
                          </h5></td>
                        </tr>

                        <tr>
                          <td width="30%"><h5><i><b>Intervalos de Revisión del Acuerdo:</b></i></h5></td>
                          <td ><h5>
                            <b> <?php echo $acuerdo->modo_revision; ?> </b> (<i>Próxima Revisión - <i class="fa fa-calendar"></i> 
                            <b><?php 
                                $date = date_create($acuerdo->fecha_revision);
                                echo date_format($date,'d')." de ".$meses[date_format($date,'n')-1]. " del ".date_format($date,'Y');
                            ?></b>
                          </i>)
                            
                          </h5> </td>
                        </tr>

                        <tr>
                            <td colspan="2"> <br><h4><b>Alcance y Exclusiones del Acuerdo</b></h4>
                            <br><?php echo $acuerdo->alcance; ?></td>
                    
                        </tr>


                        <tr>
                            <td colspan="2"> <br><h4><b>Objetivos del Acuerdo</b></h4>
                            <br><?php echo $acuerdo->objetivos_acuerdo; ?><br></td>
                    
                        </tr>
                        </table>
                    </div>
                </div>
       </div>

     
        <ul id="draggablePanelList" class="list-unstyled">

        <?php foreach ($posiciones as $key => $val) : ?>

            <li  id="<?php echo $val;?>" >

                <div class="panel panel_estructura panel-default">

                    <?php 
                        if($val == 'terminacion')
                            {
                                $titulo = 'Condiciones para la Terminación del Acuerdo';
                            }
                        if($val == 'modificacion')
                            {
                                $titulo = 'Procedimientos para Modificación del Acuerdo';
                            }
                        if($val == 'niveles')
                            {
                                $titulo = 'Niveles de Servicio';
                            }
                        if($val == 'soporte')
                            {
                                $titulo = 'Atención y Soporte al Cliente';
                            }
                        if($val == 'responsabilidades')
                            {
                                $titulo = 'Responsabilidades';
                            }
                        if($val == 'contacto')
                            {
                                $titulo = 'Información de Contacto';
                            }
                        if($val == 'costos')
                            {
                                $titulo = 'Costos y Penalidades';
                            }
                        if($val == 'glosario')
                            {
                                $titulo = 'Glosario';
                            }

                    ?>


                    <div class="panel-heading clickable2">
                        <h2 class="panel-title text-center">
                            <b><?php echo $titulo; ?></b></h2>
                        <span class="pull-right clickable"><i class="fa fa-minus"></i></span>
                    </div>
                    <div class="panel-body panel-body_estructura">
                    

                     <?php if($val == 'terminacion') : ?>
                            <?php if($acuerdo->condiciones_terminacion != NULL) : ?>
                            <tr>
                                <td colspan="2"><?php echo $acuerdo->condiciones_terminacion; ?><br></td>
                            
                            </tr>
                             <?php else : ?>
                             ¡Esta Sección se encuentra Vacía!<br>
                             Para agregar contenido en esta Sección haga click <a  href="<?php echo base_url().'index.php/niveles_de_servicio/gestion_ANS/modificar_ANS/'.$acuerdo->acuerdo_nivel_id.'/actualizar'?>"><b><u>aquí</u></b></a> y diríjase a la Sección con el nombre correspondiente.    
                            <?php endif ?>  
                     <?php endif ?>   
                    
                    <?php if($val == 'modificacion') : ?>
                        <?php if($acuerdo->procedimiento_actualizacion != NULL) : ?>
                        <tr>
                            <td colspan="2"><?php echo $acuerdo->procedimiento_actualizacion; ?><br></td>
                        </tr> 
                        <?php else : ?>
                        <div class="alert alert-warning text-center">
                             <b>¡Esta Sección se encuentra Vacía!</b><br>
                             Para agregar contenido en esta Sección haga click <a  href="<?php echo base_url().'index.php/niveles_de_servicio/gestion_ANS/modificar_ANS/'.$acuerdo->acuerdo_nivel_id.'/actualizar'?>"><b><u>aquí</u></b></a> y diríjase a la Sección con el nombre correspondiente.    
                        </div>
                        <?php endif ?>  
                     <?php endif ?> 


                    <?php if($val == 'niveles') : ?>
                           <tr>
                            <td colspan="2"> <br><h4><b>Disponibilidad</b></h4>
                            <br>

                            <div class="panel with-nav-tabs panel-default">
                                    <div class="panel-heading">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#horario_disponibilidad" data-toggle="tab">Horario de Disponibilidad</a></li>
                                                <li><a href="#horario_mantenimiento" data-toggle="tab">Horario de Mantenimiento</a></li>
                                               
                                            </ul>
                                        </div>
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            
                                            <div class="tab-pane fade in active" id="horario_disponibilidad">

                                                <table class="table table-bordered" style="background-color:white;" id="tabla_mantenimiento">
                                                <thead class="text-center">
                                                    <tr style="background-color:grey; color:#FFFFFF;">
                                                        <td><b>Lunes</b></td>
                                                        <td><b>Martes</b></td>
                                                        <td><b>Mi&#233;rcoles</b></td>
                                                        <td><b>Jueves</b></td>
                                                        <td><b>Viernes</b></td>
                                                        <td><b>S&#225;bado</b></td>
                                                        <td><b>Domingo</b></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td width="14%">    

                                                            <?php if($acuerdo->lunes_disp_ini == '00:00:00' && $acuerdo->lunes_disp_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label">Inicio:</label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->lunes_disp_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->lunes_disp_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label">Fin:</label><br> 
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
                                                             <label  class="control-label">Inicio:</label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->martes_disp_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->martes_disp_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label">Fin:</label><br> 
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
                                                             <label  class="control-label">Inicio:</label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->miercoles_disp_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->miercoles_disp_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label">Fin:</label><br> 
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
                                                             <label  class="control-label">Inicio:</label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->jueves_disp_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->jueves_disp_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label">Fin:</label><br> 
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
                                                             <label  class="control-label">Inicio:</label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->viernes_disp_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->viernes_disp_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label">Fin:</label><br> 
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
                                                             <label  class="control-label">Inicio:</label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->sabado_disp_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->sabado_disp_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label">Fin:</label><br> 
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
                                                             <label  class="control-label">Inicio:</label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->domingo_disp_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->domingo_disp_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label">Fin:</label><br> 
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

                                            <br>
                                            <div><b><u>Total de Horas de Disponibilidad</u>:</b></div><br> 
                                                <table class="table table-bordered" style="background-color:white;" id="tabla_horas">
                                                <thead class="text-center">
                                                    <tr style="background-color:grey; color:#FFFFFF;">
                                                        <td><b>Horas por Semana</b></td>
                                                        <td><b>Horas por Mes</b></td>
                                                        <td><b>Horas por Año</b></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
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
                                                </tbody>
                                               </table>
                                           



                                            </div>
                                            <div class="tab-pane fade" id="horario_mantenimiento">

                                            <br>
                                            <div> <b><i><u>Intervalo de Mantenimiento</u></i>:</b> 
                                             
                                            <?php if($acuerdo->modalidad_mantenimiento == '1') : ?>

                                            <?php echo 'Una semana al mes'; ?> 

                                            <?php endif ?>

                                            <?php if($acuerdo->modalidad_mantenimiento == '2') : ?>

                                            <?php echo 'Dos semanas al mes'; ?> 

                                            <?php endif ?>

                                            <?php if($acuerdo->modalidad_mantenimiento == '3') : ?>

                                            <?php echo 'Tres semanas al mes'; ?> 

                                            <?php endif ?>

                                            <?php if($acuerdo->modalidad_mantenimiento == '4') : ?>

                                            <?php echo 'Todo el mes (4 Semanas)'; ?> 

                                            <?php endif ?></div><br> 


                                            <table class="table table-bordered" style="background-color:white;" id="tabla_mantenimiento">
                                                <thead class="text-center">
                                                    <tr style="background-color:grey; color:#FFFFFF;">
                                                        <td><b>Lunes</b></td>
                                                        <td><b>Martes</b></td>
                                                        <td><b>Mi&#233;rcoles</b></td>
                                                        <td><b>Jueves</b></td>
                                                        <td><b>Viernes</b></td>
                                                        <td><b>S&#225;bado</b></td>
                                                        <td><b>Domingo</b></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td width="14%">    

                                                            <?php if($acuerdo->lunes_mant_ini == '00:00:00' && $acuerdo->lunes_mant_fin == '00:00:00') : ?>
                                                                    <div class="text-center"><?php echo "Todo el Día"; ?></div>
                                                                
                                                             <?php else : ?>
                                                             <label  class="control-label">Inicio:</label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->lunes_mant_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->lunes_mant_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label">Fin:</label><br> 
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
                                                             <label  class="control-label">Inicio:</label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->martes_mant_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->martes_mant_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label">Fin:</label><br> 
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
                                                             <label  class="control-label">Inicio:</label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->miercoles_mant_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->miercoles_mant_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label">Fin:</label><br> 
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
                                                             <label  class="control-label">Inicio:</label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->jueves_mant_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->jueves_mant_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label">Fin:</label><br> 
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
                                                             <label  class="control-label">Inicio:</label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->viernes_mant_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->viernes_mant_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label">Fin:</label><br> 
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
                                                             <label  class="control-label">Inicio:</label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->sabado_mant_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->sabado_mant_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label">Fin:</label><br> 
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
                                                             <label  class="control-label">Inicio:</label><br> 
                                                             <div class="input-group text-left">
                                                                
                                                                    <?php if($acuerdo->domingo_mant_ini != NULL) : ?>

                                                                    <?php echo date("g:i a",strtotime($acuerdo->domingo_mant_ini)); ?> 

                                                                    <?php else : ?>
                                                                        -
                                                                    <?php endif ?>

                                                                
                                                                
                                                             </div><br>
                                                              <label  class="control-label">Fin:</label><br> 
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

                                             <br>
                                            <div><b><u>Total de Horas de Mantenimiento</u>:</b></div><br> 
                                                <table class="table table-bordered" style="background-color:white;" id="tabla_horas">
                                                <thead class="text-center">
                                                    <tr style="background-color:grey; color:#FFFFFF;">
                                                        <td><b>Horas por Semana</b></td>
                                                        <td><b>Horas por Mes</b></td>
                                                        <td><b>Horas por Año</b></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
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
                                                </tbody>
                                               </table>




                                            </div>
                                        </div>
                                    </div>
                             </div> 


                        <?php if($acuerdo->complemento_disponibilidad != NULL) : ?>

               
                          <br>
                          <h4><b>Complemento de Disponibilidad</b></h4>
                        
                        
                          <?php echo $acuerdo->complemento_disponibilidad; ?><br><br><br>

                          
                          
                          
                          <?php endif ?> 



                         <br><h4><b>Confiabilidad</b></h4><br>
                        

                         <div class='row col-md-5'>


                         <b><i>Numero de Caídas (Por <?php echo $acuerdo->unidad_num_caidas; ?>):</i></b><br><br>

                        
                            <div class="progress">
                              <div class="progress-bar progress-bar-success" style="width: 33%">
                                    <div class='text-center'><b>Normal</b></div>
                              </div>
                              <div class="progress-bar progress-bar-warning" style="width: 33%">
                                  <div class='text-center'><b> Alerta </b></div>
                              </div>
                              <div class="progress-bar progress-bar-danger" style="width: 34%">
                                   <div class='text-center'><b>Incumplimiento</b> </div>
                              </div>
                            </div>
                            <div class="progress-meter">
                                <div class="meter meter-left" style="width: 33%;"><span class="meter-text">0 Caídas</span></div>
                                <div class="meter meter-left" style="width: 33%;"><span class="meter-text">
                                                                                                                <?php if($acuerdo->minimo_num_caidas > 1) : ?>
                                                                                                                <?php echo  $acuerdo->minimo_num_caidas.' caídas'; ?> 
                                                                                                                <?php else : ?>
                                                                                                                <?php echo  $acuerdo->minimo_num_caidas.' caída'; ?>
                                                                                                                <?php endif ?>
                                                                                                                </span></div>
                                <div class="meter meter-left" style="width: 34%;"><span class="meter-text">
                                                                                                                <?php if($acuerdo->maximo_num_caidas > 1) : ?>
                                                                                                                <?php echo  $acuerdo->maximo_num_caidas.' caídas'; ?> 
                                                                                                                <?php else : ?>
                                                                                                                <?php echo  $acuerdo->maximo_num_caidas.' caída'; ?>
                                                                                                                <?php endif ?>
                                                                                                                </span></div>

                            </div>
                        </div>


                         <div class='row col-md-5 col-md-offset-1'>


                         <b><i>Duración de las Caídas:</i></b><br><br>

                        
                            <div class="progress">
                              <div class="progress-bar progress-bar-success" style="width: 33%">
                                    <div class='text-center'><b>Normal</b></div>
                              </div>
                              <div class="progress-bar progress-bar-warning" style="width: 33%">
                                  <div class='text-center'><b> Alerta </b></div>
                              </div>
                              <div class="progress-bar progress-bar-danger" style="width: 34%">
                                   <div class='text-center'><b>Incumplimiento</b> </div>
                              </div>
                            </div>
                            <div class="progress-meter">
                                <div class="meter meter-left" style="width: 33%;"><span class="meter-text">0  <?php echo $acuerdo->unidad_duracion_caidas; ?></span></div>
                                <div class="meter meter-left" style="width: 33%;"><span class="meter-text">
                                                                                                                <?php if($acuerdo->minimo_duracion_caidas > 1) : ?>
                                                                                                                <?php echo  $acuerdo->minimo_duracion_caidas.' '.$acuerdo->unidad_duracion_caidas; ?> 
                                                                                                                <?php else : ?>
                                                                                                                <?php 
                                                                                                                $string = $acuerdo->unidad_duracion_caidas;
                                                                                                                $string = substr ($string, 0, - 1);
                                                                                                                echo  $acuerdo->minimo_duracion_caidas.' '.$string; ?>
                                                                                                                <?php endif ?>
                                                                                                                </span></div>
                                <div class="meter meter-left" style="width: 34%;"><span class="meter-text">
                                                                                                                <?php if($acuerdo->maximo_duracion_caidas > 1) : ?>
                                                                                                                <?php echo  $acuerdo->maximo_duracion_caidas.' '.$acuerdo->unidad_duracion_caidas; ?> 
                                                                                                                <?php else : ?>
                                                                                                                <?php 
                                                                                                                $string = $acuerdo->unidad_duracion_caidas;
                                                                                                                $string = substr ($string, 0, - 1);
                                                                                                                echo  $acuerdo->maximo_duracion_caidas.' '.$string; ?>
                                                                                                                <?php endif ?>
                                                                                                                </span></div>

                            </div>
                        </div>
                        <br><br><br><br><br><br><br><br>

                        <div class='row col-md-5'>

                         <b><i>Tiempo de Respuesta del Servicio:</i></b><br><br>

                        
                            <div class="progress">
                              <div class="progress-bar progress-bar-success" style="width: 33%">
                                    <div class='text-center'><b>Normal</b></div>
                              </div>
                              <div class="progress-bar progress-bar-warning" style="width: 33%">
                                  <div class='text-center'><b> Alerta </b></div>
                              </div>
                              <div class="progress-bar progress-bar-danger" style="width: 34%">
                                   <div class='text-center'><b>Incumplimiento</b> </div>
                              </div>
                            </div>
                            <div class="progress-meter">
                                <div class="meter meter-left" style="width: 33%;"><span class="meter-text">0  <?php echo $acuerdo->unidad_tiempo_respuesta; ?></span></div>
                                <div class="meter meter-left" style="width: 33%;"><span class="meter-text">
                                                                                                                <?php if($acuerdo->minimo_tiempo_respuesta > 1) : ?>
                                                                                                                <?php echo  $acuerdo->minimo_tiempo_respuesta.' '.$acuerdo->unidad_tiempo_respuesta; ?> 
                                                                                                                <?php else : ?>
                                                                                                                <?php 
                                                                                                                $string = $acuerdo->unidad_tiempo_respuesta;
                                                                                                                $string = substr ($string, 0, - 1);
                                                                                                                echo  $acuerdo->minimo_tiempo_respuesta.' '.$string; ?>
                                                                                                                <?php endif ?>
                                                                                                                </span></div>
                                <div class="meter meter-left" style="width: 34%;"><span class="meter-text">
                                                                                                                <?php if($acuerdo->maximo_tiempo_respuesta > 1) : ?>
                                                                                                                <?php echo  $acuerdo->maximo_tiempo_respuesta.' '.$acuerdo->unidad_tiempo_respuesta; ?> 
                                                                                                                <?php else : ?>
                                                                                                                <?php 
                                                                                                                $string = $acuerdo->unidad_tiempo_respuesta;
                                                                                                                $string = substr ($string, 0, - 1);
                                                                                                                echo  $acuerdo->maximo_tiempo_respuesta.' '.$string; ?>
                                                                                                                <?php endif ?>
                                                                                                                </span></div>

                            </div>
                        </div>
                        <br><br><br><br><br><br><br><br>

                        <br><h4><b>Sustentabilidad</b></h4><br>
                        

                         <div class='row col-md-5'>


                         <b><i>Tiempo para la Restauración del Servicio:</i></b><br><br>

                        
                            <div class="progress">
                              <div class="progress-bar progress-bar-success" style="width: 33%">
                                    <div class='text-center'><b>Normal</b></div>
                              </div>
                              <div class="progress-bar progress-bar-warning" style="width: 33%">
                                  <div class='text-center'><b> Alerta </b></div>
                              </div>
                              <div class="progress-bar progress-bar-danger" style="width: 34%">
                                   <div class='text-center'><b>Incumplimiento</b> </div>
                              </div>
                            </div>
                            <div class="progress-meter">
                                <div class="meter meter-left" style="width: 33%;"><span class="meter-text">0  <?php echo $acuerdo->unidad_tiempo_restauracion; ?></span></div>
                                <div class="meter meter-left" style="width: 33%;"><span class="meter-text">
                                                                                                                <?php if($acuerdo->minimo_tiempo_restauracion > 1) : ?>
                                                                                                                <?php echo  $acuerdo->minimo_tiempo_restauracion.' '.$acuerdo->unidad_tiempo_restauracion; ?> 
                                                                                                                <?php else : ?>
                                                                                                                <?php 
                                                                                                                $string = $acuerdo->unidad_tiempo_restauracion;
                                                                                                                $string = substr ($string, 0, - 1);
                                                                                                                echo  $acuerdo->minimo_tiempo_restauracion.' '.$string; ?>
                                                                                                                <?php endif ?>
                                                                                                                </span></div>
                                <div class="meter meter-left" style="width: 34%;"><span class="meter-text">
                                                                                                                <?php if($acuerdo->maximo_tiempo_restauracion > 1) : ?>
                                                                                                                <?php echo  $acuerdo->maximo_tiempo_restauracion.' '.$acuerdo->unidad_tiempo_restauracion; ?> 
                                                                                                                <?php else : ?>
                                                                                                                <?php 
                                                                                                                $string = $acuerdo->unidad_tiempo_restauracion;
                                                                                                                $string = substr ($string, 0, - 1);
                                                                                                                echo  $acuerdo->maximo_tiempo_restauracion.' '.$string; ?>
                                                                                                                <?php endif ?>
                                                                                                                </span></div>

                            </div>
                            <br><br><br><br>
                        </div>
                        </td>
                    </tr>
                    <?php endif ?> 

                    <?php if($val == 'soporte') : ?>

                            <tr>
                            <td colspan="2"><?php echo $acuerdo->soporte_tecnico; ?><br><br>

                                <h4><b>Tiempos de Respuesta y de Resolución de Problemas</b></h4>
                                <br>

                                <div class="col-md-8">
                                    <table class="table table-bordered" style="background-color:white;">
                                    <thead class="text-center">
                                        <tr style="background-color:grey; color:#FFFFFF;">
                                            <td><b>Nivel de Prioridad</b></td>
                                            <td><b>Definición</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr >
                                            <td class="text-center"><span class="label label-danger"><b>Cr&#237;tico</b></span></td>
                                            <td>Degradación completa - Todos los usuarios y funciones críticas afectadas. Servicio completamente sin disponibilidad.</td>
                                        </tr>
                                        <tr >
                                            <td class="text-center"><span class="label" style="background-color:#FF6600;" ><b>Severo</b> </span></td>
                                            <td>Degradación significativa - Gran número de usuarios o funciones críticas afectadas.</td>
                                        </tr>
                                        <tr >
                                            <td class="text-center"><span class="label" style="background-color:#FFCC66;"><b>Medio</b> </span></td>
                                            <td>Degradación limitada - Un limitado número de usuarios o funciones afectadas. Los Procesos de Negocio pueden continuar. </td>
                                        </tr>
                                        <tr >
                                            <td class="text-center"><span class="label label-default"><b>Menor</b> </span></td>
                                            <td>Degradación Pequeña  - Pocos usuarios o un usuario afectado. Los Procesos de Negocio pueden continuar.</td>
                                        </tr>
                                    </tbody>
                                   </table>

                                </div><br>



                              <div class="col-md-8">
                                <table class="table table-bordered" style="background-color:white;">
                                    <thead class="text-center" width="10%">
                                        <tr style="background-color:grey; color:#FFFFFF;">

                                            <td><b>Medida</b></td>
                                            <td><b>Cr&#237;tico</b></td>
                                            <td><b>Severo</b></td>
                                            <td><b>Medio</b></td>
                                            <td><b>Menor</b></td>
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
                                <br><br>
                            </div>


                            </td>
                        
                        </tr>

                    <?php endif ?> 
                          
                     <?php if($val == 'responsabilidades') : ?>
                          <tr>
                            <td colspan="2"><?php echo $acuerdo->responsabilidades; ?><br></td>
                        
                        </tr>
                     <?php endif ?> 

                    <?php  if($val == 'contacto') : ?>
                        <tr>
                            <td colspan="2"><?php echo $acuerdo->contactos; ?><br></td>
                        
                        </tr>
                    <?php endif ?> 

                    <?php  if($val == 'costos') : ?>
                        <?php if($acuerdo->cobros != NULL) : ?>
                        <tr>
                            <td colspan="2"><?php echo $acuerdo->cobros; ?><br></td>
                        
                        </tr>
                        <?php else : ?>
                        <div class="alert alert-warning text-center">
                             <b>¡Esta Sección se encuentra Vacía!</b><br>
                             Para agregar contenido en esta Sección haga click <a  href="<?php echo base_url().'index.php/niveles_de_servicio/gestion_ANS/modificar_ANS/'.$acuerdo->acuerdo_nivel_id.'/actualizar'?>"><b><u>aquí</u></b></a> y diríjase a la Sección con el nombre correspondiente.    
                        </div>
                        <?php endif ?>  
                    <?php endif ?> 

                    <?php  if($val == 'glosario') : ?>
                        <?php if($acuerdo->glosario != NULL) : ?>
                        <tr>
                            <td colspan="2"><?php echo $acuerdo->glosario; ?><br></td>
                        
                        </tr>
                         <?php else : ?>
                        <div class="alert alert-warning text-center">
                             <b>¡Esta Sección se encuentra Vacía!</b><br>
                             Para agregar contenido en esta Sección haga click <a  href="<?php echo base_url().'index.php/niveles_de_servicio/gestion_ANS/modificar_ANS/'.$acuerdo->acuerdo_nivel_id.'/actualizar'?>"><b><u>aquí</u></b></a> y diríjase a la Sección con el nombre correspondiente.    
                        </div>
                        <?php endif ?>   
                    <?php endif ?> 

                    </div>
                </div>

            </li>

         <?php endforeach ?>


        </ul>
    </div>
</div>


<hr>
<div class='row text-center'>
<a class="btn btn-success" id="guardar_estructura" <i class="fa fa-plus"></i> Guardar Estructura de ANS</a>
</div>
      </div>
    </div>
</div>
