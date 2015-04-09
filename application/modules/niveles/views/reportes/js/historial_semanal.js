function mostrarHistorialSemanal() {

    var existe_error = false;

    if($("#dropdown_acuerdos_semanal").val() == 'seleccione'){
                $("#error_acuerdos_semanal").empty();
                $("#error_acuerdos_semanal").append('Seleccione un Acuerdo');
                existe_error = true;
            }
            else{
                $("#error_acuerdos_semanal").empty();
            }

             if($("#dia_historial_semanal").val() == ''){
                $("#error_semanal").empty();
                $("#error_semanal").append('Seleccione un Día');
                existe_error = true;

            }
            else{
                $("#error_semanal").empty();        
            }

            if (existe_error == false) {

                        var id_servicio = $("#dropdown_servicios_semanal").val();
                        var fecha_dia = $("#dia_historial_semanal").val();
                        var id_acuerdo = $("#dropdown_acuerdos_semanal").val();


                              $("#tabla_servicio_semanal").empty();
                              $("#numero_caidas_semanal").empty();
                              $("#numero_caidas_ANS_semanal").empty();
                              $("#tiempo_caido_semanal").empty();
                              $("#tiempo_online_semanal").empty();
                              $("#tiempo_online_ANS_semanal").empty();
                              $("#mayor_caida_semanal").empty();
                              $("#menor_caida_semanal").empty();
                              $("#disponibilidad_semanal").empty();
                              $("#disponibilidad_ANS_semanal").empty();
                              $("#tiempo_caido_ANS_semanal").empty();


                              $("#tabla_procesos_semanal").empty();
                              $("#tabla_info_semanal").empty();

                          $.ajax({
                 
                            
                            url: config.base+'index.php/niveles/reportes/obtener_historial_servicio_semana',
                            type: 'POST',
                            data: {                         
                                    servicio_id : id_servicio,
                                    dia : fecha_dia,   
                                    acuerdo_id : id_acuerdo,                                              
                                  },
                            dataType: 'json',
                            cache : false,  

                             success: function(data){
                                 //alert('hola');
                                //alert(data.caidas_servicio_semanal.length);

                                //alert(data.dias.length);

                               // alert(data.dias);


                               data.dias.forEach(function(dia) {

                                  alert(dia);

                                });

                          

                              $("#informacion_historial_semanal").hide();
                              
                               // Creación de tabla de caídas de servicio
                               var tabla_historial_servicio = '<table class="table table-bordered" id="tabla_caida_servicios_semanal">';
                               tabla_historial_servicio = tabla_historial_servicio+'<thead >';
                               tabla_historial_servicio = tabla_historial_servicio+'<tr class="active">';
                               tabla_historial_servicio = tabla_historial_servicio+'<th>Inicio de Caída <i class="fa fa-sort"></i></th>';
                               tabla_historial_servicio = tabla_historial_servicio+'<th>Fin de Caída <i class="fa fa-sort"></i></th>';
                               tabla_historial_servicio = tabla_historial_servicio+'<th>Duración de Caída <i class="fa fa-sort"></i> <br><small>(hh:mm:ss)<small></th>';
                               tabla_historial_servicio = tabla_historial_servicio+'</tr>';
                               tabla_historial_servicio = tabla_historial_servicio+'</thead>';

                              tabla_historial_servicio = tabla_historial_servicio+'<tbody">';

                                       

                              data.caidas_servicio.forEach(function(caida) {
                                    tabla_historial_servicio = tabla_historial_servicio+'<tr>';
                                    tabla_historial_servicio = tabla_historial_servicio+'<td>'+caida.inicio_caida+'</td>';
                                    tabla_historial_servicio = tabla_historial_servicio+'<td>'+caida.fin_caida+'</td>';
                                    tabla_historial_servicio = tabla_historial_servicio+'<td class="text-center">'+caida.duracion_caida+' </td>';
                                    tabla_historial_servicio = tabla_historial_servicio+'</tr>';
                              });

                              tabla_historial_servicio = tabla_historial_servicio+ '</tbody>';
                               tabla_historial_servicio = tabla_historial_servicio+ '</table>';

                               $("#tabla_servicio_semanal").append(tabla_historial_servicio);


                               $('#tabla_caida_servicios_semanal').unbind('appendCache applyWidgetId applyWidgets sorton update updateCell')
                               .removeClass('tablesorter')
                               .find('thead th')
                               .unbind('click mousedown')
                               .removeClass('header headerSortDown headerSortUp');

                              $('#tabla_caida_servicios_semanal').dataTable( {
                                "iDisplayLength": 6,
                                "bLengthChange": false,
                                "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"pull-left"i><"pull-right"p>>>'
                                });


                               $("#disponibilidad_semanal").append(data.disponibilidad+" %");
                                $("#disponibilidad_ANS_semanal").append(data.ans.porcentaje_disp+" %");
                                $("#tiempo_online_semanal").append(" <h5>"+data.tiempo_online+" <i class='fa fa-clock-o'></i></h5>");
                                $("#tiempo_online_ANS_semanal").append(" <h5>"+data.tiempo_disponible+" <i class='fa fa-clock-o'></i></h5>");

                               $("#numero_caidas_semanal").append(data.numero_caidas);

                                var objetivos_caidas = '<b><i>Numero de Caídas (Por '+data.ans.unidad_num_caidas+')</i></b><br><br>';
                                     objetivos_caidas =  objetivos_caidas+'<div class="progress">';  
                                      objetivos_caidas =  objetivos_caidas+'<div class="progress-bar progress-bar-success" style="width: 33%">';
                                      objetivos_caidas =  objetivos_caidas+'<div class="text-center"><b>Normal</b></div>';
                                       objetivos_caidas =  objetivos_caidas+'</div>';
                                       objetivos_caidas =  objetivos_caidas+'<div class="progress-bar progress-bar-warning" style="width: 33%">';
                                       objetivos_caidas =  objetivos_caidas+'<div class="text-center"><b> Alerta </b></div>';
                                       objetivos_caidas =  objetivos_caidas+'</div>';
                                       objetivos_caidas =  objetivos_caidas+'<div class="progress-bar progress-bar-danger" style="width: 34%">';
                                       objetivos_caidas =  objetivos_caidas+'<div class="text-center"><b>Fallo</b></div>';
                                       objetivos_caidas =  objetivos_caidas+'</div>';
                                       objetivos_caidas =  objetivos_caidas+'</div>';
                                      objetivos_caidas =  objetivos_caidas+'<div class="progress-meter">';
                                       objetivos_caidas =  objetivos_caidas+'<div class="meter meter-left" style="width: 33%;"><span class="meter-text">0 Caídas</span></div>';
                                     objetivos_caidas =  objetivos_caidas+'<div class="meter meter-left" style="width: 33%;"><span class="meter-text">';
                                     if (data.ans.minimo_num_caidas > 1) {
                                              objetivos_caidas =  objetivos_caidas+data.ans.minimo_num_caidas+" caídas";
                                     }
                                     else{
                                            objetivos_caidas =  objetivos_caidas+data.ans.minimo_num_caidas+" caída";
                                     }
                                     objetivos_caidas =  objetivos_caidas+'</span></div>';
                                     objetivos_caidas =  objetivos_caidas+'<div class="meter meter-left" style="width: 34%;"><span class="meter-text">';
                                       if (data.ans.maximo_num_caidas > 1) {
                                              objetivos_caidas =  objetivos_caidas+data.ans.maximo_num_caidas+" caídas";
                                     }
                                     else{
                                            objetivos_caidas =  objetivos_caidas+data.ans.maximo_num_caidas+" caída";
                                     }
                                     objetivos_caidas =  objetivos_caidas+'</span></div>';
                                     objetivos_caidas =  objetivos_caidas+'</div><br>';


                               $("#numero_caidas_ANS_semanal").append(objetivos_caidas);

                               var objetivos_duracion_caidas = '<b><i>Duración de Caídas</i></b><br><br>';
                                     objetivos_duracion_caidas =  objetivos_duracion_caidas+'<div class="progress">';  
                                      objetivos_duracion_caidas =  objetivos_duracion_caidas+'<div class="progress-bar progress-bar-success" style="width: 33%">';
                                      objetivos_duracion_caidas =  objetivos_duracion_caidas+'<div class="text-center"><b>Normal</b></div>';
                                       objetivos_duracion_caidas =  objetivos_duracion_caidas+'</div>';
                                       objetivos_duracion_caidas =  objetivos_duracion_caidas+'<div class="progress-bar progress-bar-warning" style="width: 33%">';
                                       objetivos_duracion_caidas =  objetivos_duracion_caidas+'<div class="text-center"><b> Alerta </b></div>';
                                       objetivos_duracion_caidas =  objetivos_duracion_caidas+'</div>';
                                       objetivos_duracion_caidas =  objetivos_duracion_caidas+'<div class="progress-bar progress-bar-danger" style="width: 34%">';
                                       objetivos_duracion_caidas =  objetivos_duracion_caidas+'<div class="text-center"><b>Fallo</b></div>';
                                       objetivos_duracion_caidas =  objetivos_duracion_caidas+'</div>';
                                       objetivos_duracion_caidas =  objetivos_duracion_caidas+'</div>';
                                      objetivos_duracion_caidas =  objetivos_duracion_caidas+'<div class="progress-meter">';
                                       objetivos_duracion_caidas =  objetivos_duracion_caidas+'<div class="meter meter-left" style="width: 33%;"><span class="meter-text">0 '+data.ans.unidad_duracion_caidas+'</span></div>';
                                     objetivos_duracion_caidas =  objetivos_duracion_caidas+'<div class="meter meter-left" style="width: 33%;"><span class="meter-text">';
                                     if (data.ans.minimo_duracion_caidas > 1) {
                                              objetivos_duracion_caidas =  objetivos_duracion_caidas+data.ans.minimo_duracion_caidas+" "+data.ans.unidad_duracion_caidas;
                                     }
                                     else{
                                            var str = data.ans.unidad_duracion_caidas;
                                            var newStr = str.substring(0, str.length-1);
                                            objetivos_duracion_caidas =  objetivos_duracion_caidas+data.ans.minimo_duracion_caidas+" "+newStr;
                                     }
                                     objetivos_duracion_caidas =  objetivos_duracion_caidas+'</span></div>';
                                     objetivos_duracion_caidas =  objetivos_duracion_caidas+'<div class="meter meter-left" style="width: 34%;"><span class="meter-text">';
                                       if (data.ans.maximo_duracion_caidas > 1) {
                                              objetivos_duracion_caidas =  objetivos_duracion_caidas+data.ans.maximo_duracion_caidas+" "+data.ans.unidad_duracion_caidas;
                                     }
                                     else{
                                            var str = data.ans.unidad_duracion_caidas;
                                            var newStr = str.substring(0, str.length-1);
                                            objetivos_duracion_caidas =  objetivos_duracion_caidas+data.ans.maximo_duracion_caidas+" "+newStr;
                                     }
                                     objetivos_duracion_caidas =  objetivos_duracion_caidas+'</span></div>';
                                     objetivos_duracion_caidas =  objetivos_duracion_caidas+'</div><br>';

                               $("#tiempo_caido_semanal").append(" <h5>"+data.tiempo_caido+" <i class='fa fa-clock-o'></i></h5>");   
                                $("#tiempo_caido_ANS_semanal").append(objetivos_duracion_caidas);   

                                $("#mayor_caida_semanal").append(" <h5>"+data.mayor_caida+" <i class='fa fa-clock-o'></i></h5>");
                                 $("#menor_caida_semanal").append(" <h5>"+data.menor_caida+" <i class='fa fa-clock-o'></i></h5>");




                              $("#informacion_historial_semanal").fadeIn();

                             },
                             error: function(xhr, ajaxOptions, thrownError){
                                   alert(xhr.status+" "+thrownError);
                                   $("#modal_error").modal('show');
                                                
                                 }
                        });

            }

}



$( document ).ready(function() {

        $("#dropdown_servicios_semanal").change(function () {
            if($("#dropdown_servicios_semanal").val() != 'seleccione'){             
                        $("#error_servicio_semanal").empty();
                    }   
            });


             // Llenado del dropdown de ANS.
    $("#dropdown_servicios_semanal").change(function () {

            $("#no_acuerdos_semanal").fadeOut(); 

            $("#error_acuerdos_semanal").empty();
            $("#error_semanal").empty();      
           

           // $('#dia_historial').val("");
           //  $('#dia_historial_semanal').data("DateTimePicker").disable();

        if($("#dropdown_servicios_semanal").val() != 'seleccione'){             
                    //$("#error_servicio").empty();
                  var id_servicio = $("#dropdown_servicios_semanal").val();

                  $.ajax({   
                            url: config.base+'index.php/niveles/reportes/obtener_ans_servicio',
                            type: 'POST',
                            data: {                         
                                    servicio_id : id_servicio,                                       
                                  },
                            dataType: 'json',
                            cache : false,  

                             success: function(data){

                                    $('select#dropdown_acuerdos_semanal').empty();
                                    $('select#dropdown_acuerdos_semanal').append('<option value="seleccione">Seleccione un Acuerdo</option>');

                                    if(data.acuerdos.length > 0){
                                          var option = "";                                    
                                          for (var i = 0; i < data.acuerdos.length; i++) {
                                             option = '<option value="'+data.acuerdos[i].acuerdo_nivel_id+'">'+data.acuerdos[i].nombre_acuerdo+'</option> ';
                                             $('select#dropdown_acuerdos_semanal').append(option);
                                          };
                                           
                                          $("#opciones_reporte_semanal").fadeIn(); 
                                    }  
                                    else{

                                        $("#opciones_reporte_semanal").hide(); 
                                        $("#no_acuerdos_semanal").fadeIn(); 
                                    }
                                  
                             },
                             error: function(xhr, ajaxOptions, thrownError){
                                   alert(xhr.status+" "+thrownError);
                                   $("#modal_error").modal('show');                                                
                                 }
                        });                    
            }
            else{                

                  $("#opciones_reporte_semanal").fadeOut();
                     
            }   
       });

        $("#dropdown_acuerdos_semanal").change(function () {

            if($("#dropdown_acuerdos_semanal").val()  != 'seleccione' ){

                 $('#dia_historial_semanal').data("DateTimePicker").enable();
            }
            else{
                $('#dia_historial_semanal').data("DateTimePicker").disable();
            }
        });


            $("#dia_historial_semanal").change(function () {
                if($("#dia_historial_semanal").val() != ''){            
                            $("#error_semanal").empty();
                        }   
                });


                $('#dia_historial_semanal').datetimepicker({
                    daysOfWeekDisabled: [0,2,3,4,5,6],
                    pickTime: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });
                $('#dia_historial_semanal').data("DateTimePicker").disable();

});