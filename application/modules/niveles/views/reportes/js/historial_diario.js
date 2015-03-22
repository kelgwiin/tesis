function mostrarHistorialDiario() {

	var existe_error = false;

	if($("#dropdown_acuerdos").val() == 'seleccione'){ 
                  $("#error_acuerdos").empty();
         		$("#error_acuerdos").append('Seleccione un Acuerdo');
         		existe_error = true;
         	}
         	else{
         		$("#error_acuerdos").empty();
         	}

         	 if($("#dia_historial").val() == ''){
         		$("#error_dia").empty();
         		$("#error_dia").append('Seleccione un Día');
         		existe_error = true;

         	}
         	else{
         		$("#error_dia").empty();		
         	}

         	if (existe_error == false) {

                        var id_servicio = $("#dropdown_servicios").val();
                        var fecha_dia = $("#dia_historial").val();
                        var id_acuerdo = $("#dropdown_acuerdos").val();
                        var tabla_historial_servicio;

                        $("#tabla_servicio").empty();
                        $("#numero_caidas").empty();
                        $("#tiempo_caido").empty();
                        $("#tiempo_online").empty();
                        $("#mayor_caida").empty();
                        $("#menor_caida").empty();
                        $("#disponibilidad").empty();


                        $("#tabla_procesos").empty();
                        $("#tabla_info").empty();

                       $.ajax({
                 
                            
                            url: config.base+'index.php/niveles/reportes/obtener_historial_servicio_dia',
                            type: 'POST',
                            data: {                         
                                    servicio_id : id_servicio,
                                    dia : fecha_dia,   
                                    acuerdo_id : id_acuerdo,                                          
                                  },
                             dataType: 'json',
                            cache : false,  

                             success: function(data){

                             /* for (var i = 1; i <= 7; i++) {
                                 alert(data.dia[i].horario_inicio+" "+data.dia[i].horario_fin+" "+data.dia[i].disponibilidad_segundos+" "+data.dia[i].disponibilidad_tiempo);
                              };*/

                              alert(data.prueba.length);

                              for (var i = 0; i < data.prueba.length; i++) {
                                alert(data.prueba[i].inicio_caida+" "+data.prueba[i].fin_caida+" "+data.prueba[i].duracion_caida);
                              };

                               alert(data.prueba2);
                                      
                              
                             

                             $("#informacion_historial").hide();
                             $("#no_info").hide();

                            /*  if(data.caidas_servicio.length == 0){
                                        $("#no_info").fadeIn();
                            }
                            else{*/

                                // Creación de tabla de caídas de servicio
                               var tabla_historial_servicio = '<table class="table table-bordered" id="tabla_caida_servicios">';
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
                                    tabla_historial_servicio = tabla_historial_servicio+'<td>'+caida.duracion_caida+' </td>';
                                    tabla_historial_servicio = tabla_historial_servicio+'</tr>';
                              });

                              tabla_historial_servicio = tabla_historial_servicio+ '</tbody>';
                               tabla_historial_servicio = tabla_historial_servicio+ '</table>';

                               $("#tabla_servicio").append(tabla_historial_servicio);

                               $("#numero_caidas").append(data.numero_caidas);
                               $("#tiempo_caido").append(" <h5>"+data.tiempo_caido+"</h5>");
                               $("#tiempo_online").append(" <h5>"+data.tiempo_online+"</h5>");
                                $("#mayor_caida").append(" <h5>"+data.mayor_caida+"</h5>");
                                 $("#menor_caida").append(" <h5>"+data.menor_caida+"</h5>");
                                 $("#disponibilidad").append(data.disponibilidad+" %");

                               $('#tabla_caida_servicios').unbind('appendCache applyWidgetId applyWidgets sorton update updateCell')
                               .removeClass('tablesorter')
                               .find('thead th')
                               .unbind('click mousedown')
                               .removeClass('header headerSortDown headerSortUp');

                              $('#tabla_caida_servicios').dataTable( {
                                "iDisplayLength": 4,
                                "bLengthChange": false,
                                "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"pull-left"i><"pull-right"p>>>'
                                });
                              //Fin de creación de tabla de caídas de servicio


                              //Creación de la tabla de caídas de procesos
                              var tabla_historial_proceso = '<table class="table table-bordered" id="tabla_caida_procesos">';
                               tabla_historial_proceso = tabla_historial_proceso+'<thead >';
                               tabla_historial_proceso = tabla_historial_proceso+'<tr class="active">';
                               tabla_historial_proceso = tabla_historial_proceso+'<th>Proceso <i class="fa fa-sort"></i></th>';
                               tabla_historial_proceso = tabla_historial_proceso+'<th>Inicio de Caída <i class="fa fa-sort"></i></th>';
                               tabla_historial_proceso = tabla_historial_proceso+'<th>Fin de Caída <i class="fa fa-sort"></i></th>';
                               tabla_historial_proceso = tabla_historial_proceso+'<th>Duración de Caída <i class="fa fa-sort"></i> <br><small>(hh:mm:ss)<small></th>';
                               tabla_historial_proceso = tabla_historial_proceso+'</tr>';
                               tabla_historial_proceso = tabla_historial_proceso+'</thead>';

                              tabla_historial_proceso = tabla_historial_proceso+'<tbody>';

                                       

                              data.caidas_procesos.forEach(function(caida) {
                                    tabla_historial_proceso = tabla_historial_proceso+'<tr>';
                                    tabla_historial_proceso = tabla_historial_proceso+'<td>'+data.procesos_info[caida.proceso_id].nombre+'</td>';
                                    tabla_historial_proceso = tabla_historial_proceso+'<td>'+caida.inicio_caida+'</td>';
                                    tabla_historial_proceso = tabla_historial_proceso+'<td>'+caida.fin_caida+'</td>';
                                    tabla_historial_proceso = tabla_historial_proceso+'<td>'+caida.duracion_caida+' </td>';
                                    tabla_historial_proceso = tabla_historial_proceso+'</tr>';
                              });

                              tabla_historial_proceso = tabla_historial_proceso+ '</tbody>';
                               tabla_historial_proceso = tabla_historial_proceso+ '</table>';

                               $("#tabla_procesos").append(tabla_historial_proceso);

                                $('#tabla_caida_procesos').unbind('appendCache applyWidgetId applyWidgets sorton update updateCell')
                               .removeClass('tablesorter')
                               .find('thead th')
                               .unbind('click mousedown')
                               .removeClass('header headerSortDown headerSortUp');

                              $('#tabla_caida_procesos').dataTable( {
                                "iDisplayLength": 4,
                                "bLengthChange": false,
                                "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"pull-left"i><"pull-right"p>>>'
                                });
                              //Fin de Creación de tabla de caídas de procesos


                              //Creación de la tabla con lo datos globales de caídas por proceso
                               var tabla_info_proceso = '<table class="table table-bordered" id="tabla_info_procesos">';
                               tabla_info_proceso = tabla_info_proceso+'<thead >';
                               tabla_info_proceso = tabla_info_proceso+'<tr class="active">';
                               tabla_info_proceso = tabla_info_proceso+'<th>Proceso</th>';
                               tabla_info_proceso = tabla_info_proceso+'<th>Disponibilidad</th>';
                               tabla_info_proceso = tabla_info_proceso+'<th>Tiempo Disponible</th>';
                               tabla_info_proceso = tabla_info_proceso+'<th>Numero de Caídas</th>';
                                tabla_info_proceso = tabla_info_proceso+'<th>Tiempo Total Caído</th>';
                               tabla_info_proceso = tabla_info_proceso+'</tr>';
                               tabla_info_proceso = tabla_info_proceso+'</thead>';

                              tabla_info_proceso = tabla_info_proceso+'<tbody class="text-center">';

                              data.servicio_procesos.forEach(function(proceso) {
                                    var nombre_proceso = data.procesos_info[proceso.servicio_proceso_id].nombre;
                                    //alert(nombre_proceso);
                                    tabla_info_proceso = tabla_info_proceso+'<tr>';
                                    tabla_info_proceso = tabla_info_proceso+'<td class="active"><b><i>'+nombre_proceso+'</i></b></td>';
                                    tabla_info_proceso = tabla_info_proceso+'<td>'+data.historial_procesos[nombre_proceso].disponibilidad+'</td>';
                                    tabla_info_proceso = tabla_info_proceso+'<td>'+data.historial_procesos[nombre_proceso].tiempo_disponible+'</td>';
                                    tabla_info_proceso = tabla_info_proceso+'<td>'+data.historial_procesos[nombre_proceso].caidas+' </td>';
                                    tabla_info_proceso = tabla_info_proceso+'<td>'+data.historial_procesos[nombre_proceso].tiempo_caido+' </td>';
                                    tabla_info_proceso = tabla_info_proceso+'</tr>';
                              });

                              tabla_historial_proceso = tabla_historial_proceso+ '</tbody>';
                               tabla_historial_proceso = tabla_historial_proceso+ '</table>';

                               $("#tabla_info").append(tabla_info_proceso);

                               $('#tabla_info_procesos').unbind('appendCache applyWidgetId applyWidgets sorton update updateCell')
                               .removeClass('tablesorter')
                               .find('thead th')
                               .unbind('click mousedown')
                               .removeClass('header headerSortDown headerSortUp');

                              $('#tabla_info_procesos').dataTable( {
                                "iDisplayLength": 4,
                                "bLengthChange": false,
                                "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"pull-left"i><"pull-right"p>>>'
                                });       
                             //Fin de la creación de la tabla con lo datos globales de caídas por proceso


                             //***************************************************************************
                             //GRAFICAS

                             //Gráfica de Disponibilidad de procesos///////////////////////////////////////////////////////

                                 //Preparando los datos
                                 var datos_disponibilidad = new Array ();
                                 var datos_caidas = new Array ();
                                  var datos_tiempos = new Array ();

                                 data.servicio_procesos.forEach(function(proceso) {
                                    var nombre_proceso = data.procesos_info[proceso.servicio_proceso_id].nombre;
                                    var disponibilidad_proceso = data.historial_procesos[nombre_proceso].disponibilidad;

                                    var numero_caidas = data.historial_procesos[nombre_proceso].caidas;
                                    //var tiempo_caido = data.historial_procesos[nombre_proceso].tiempo_caido;
                                    var tiempo_caido = data.historial_procesos[nombre_proceso].segundos;

                                    datos_disponibilidad.push(new Array (nombre_proceso, disponibilidad_proceso)); 
                                    datos_caidas.push(new Array (nombre_proceso, numero_caidas)); 
                                    datos_tiempos.push(new Array (nombre_proceso, tiempo_caido*1000)); 
                                 });

                                 var nombre_servicio = $( "#dropdown_servicios option:selected" ).text();

                                 // Dibujando la gráfica
                                    $('#grafica_disponibilidad_procesos').highcharts({
                                            chart: { type: 'column'},
                                            exporting: { enabled: false },
                                            credits: {enabled: false},
                                            title: {text: 'Disponibilidad por Procesos'},
                                            subtitle: {text: nombre_servicio},
                                            xAxis: {
                                                type: 'category',
                                                labels: {
                                                    rotation: -45,
                                                    style: {
                                                        fontSize: '13px',
                                                        fontFamily: 'Verdana, sans-serif'
                                                    }
                                                }
                                            },
                                            yAxis: {
                                                min: 0,
                                                tickInterval: 20,
                                                title: {
                                                    text: 'Disponibilidad (%)'
                                                }
                                            },
                                            legend: {enabled: false},
                                            tooltip: {pointFormat: 'Disponibilidad: <b>{point.y:.1f} %</b>'},
                                            series: [{
                                                color: '#52CC7A',
                                                data: datos_disponibilidad,
                                                dataLabels: {
                                                    enabled: true,
                                                    //rotation: -90,
                                                    color: '#000000',
                                                    align: 'center',
                                                    format: '<b>{point.y:.2f} %</b>', // two decimal
                                                    y: 25, // 25 pixels down from the top
                                                    style: {
                                                        fontSize: '13px',
                                                        fontFamily: 'Verdana, sans-serif'
                                                    }
                                                }
                                            }]
                                        });

                                    //Gráfica de Caídas de procesos///////////////////////////////////////////////////////
                                    // Dibujando la gráfica
                                    $('#grafica_caidas_procesos').highcharts({
                                            chart: {type: 'column' },
                                            exporting: { enabled: false },
                                             credits: {enabled: false },
                                            title: {  text: 'Caídas por Procesos'},
                                            subtitle: { text: nombre_servicio },
                                            xAxis: {
                                                type: 'category',
                                                labels: {
                                                    rotation: -45,
                                                    style: {
                                                        fontSize: '13px',
                                                        fontFamily: 'Verdana, sans-serif'
                                                    }
                                                }
                                            },
                                            yAxis: {
                                                min: 0,
                                                title: {
                                                    text: 'Nº de Caídas'
                                                }
                                            },
                                            legend: { enabled: false },
                                            tooltip: {
                                                pointFormat: 'Nº de Caídas: <b>{point.y:.0f}</b>'
                                            },
                                            series: [{
                                                color: '#FF8533',
                                                data: datos_caidas,
                                                dataLabels: {
                                                    enabled: true,
                                                    color: '#000000',
                                                    align: 'center',
                                                    format: '<b>{point.y:.0f}</b>', // two decimal
                                                    y: 25, // 25 pixels down from the top
                                                    style: {
                                                        fontSize: '13px',
                                                        fontFamily: 'Verdana, sans-serif'
                                                    }
                                                }
                                            }]
                                        });

                                
                                    //Gráfica de Tiempo total Caído de procesos///////////////////////////////////////////////////////
                                    // Dibujando la gráfica
                                    $('#grafica_tiempo_procesos').highcharts({

                                            title: {  text: 'Tiempo Total Caído por Procesos'},
                                            subtitle: { text: nombre_servicio },
                                                chart: { type: 'column' },
                                                legend: { enabled: false },  
                                                exporting: { enabled: false },
                                                    credits: { enabled: false },          
                                               xAxis: {
                                                 type: 'category',
                                                 labels: {
                                                 rotation: -45,
                                                  style: {
                                                             fontSize: '13px',
                                                               fontFamily: 'Verdana, sans-serif'
                                                             }
                                                         }
                                                },            
                                                yAxis: {
                                                    type: 'datetime', 
                                                     //tickInterval: 0.5 * 60 * 1000,
                                                      dateTimeLabelFormats: { 
                                                            second: '%H:%M:%S',
                                                            minute: '%H:%M:%S',
                                                            hour: '%H:%M:%S',
                                                            day: '%H:%M:%S',
                                                             week: '%H:%M:%S',
                                                             month: '%H:%M:%S',
                                                             year: '%H:%M:%S'
                                                  },
                                                 title: {  text: 'Tiempo (hh:mm:ss)'}
                                                },
                                                tooltip: { pointFormat: 'Tiempo Total Caído: <b>{point.y:%H:%M:%S} (hh:mm:ss)</b>' },
                                                 series: [{
                                                               color: '#669999',
                                                               data: datos_tiempos,
                                                                 dataLabels: {
                                                                                        enabled: true,
                                                                                        //rotation: -90,
                                                                                        color: '#000000',
                                                                                        align: 'center',
                                                                                        format: '<b>{point.y:%H:%M:%S}</b>', // two decimal
                                                                                        y: 25, // 25 pixels down from the top
                                                                                        style: {
                                                                                            fontSize: '13px',
                                                                                            fontFamily: 'Verdana, sans-serif'
                                                                        }
                                                               }
                                                            }]
                                                });  

                                            $("#informacion_historial").fadeIn();
                             
                                //    }// Fin del else

                             },
                             error: function(xhr, ajaxOptions, thrownError){
                                   alert(xhr.status+" "+thrownError);
                                   $("#modal_error").modal('show');
                                                
                                 }
                        });
         	};


    }


$( document ).ready(function() {

      // Llenado del dropdown de ANS.
	$("#dropdown_servicios").change(function () {

            $("#no_acuerdos").fadeOut(); 

            $("#error_acuerdos").empty();
            $("#error_dia").empty();      
           

           // $('#dia_historial').val("");
           //  $('#dia_historial').data("DateTimePicker").disable();

		if($("#dropdown_servicios").val() != 'seleccione'){         	
         			//$("#error_servicio").empty();
                  var id_servicio = $("#dropdown_servicios").val();

                  $.ajax({   
                            url: config.base+'index.php/niveles/reportes/obtener_ans_servicio',
                            type: 'POST',
                            data: {                         
                                    servicio_id : id_servicio,                                       
                                  },
                            dataType: 'json',
                            cache : false,  

                             success: function(data){

                                    $('select#dropdown_acuerdos').empty();
                                    $('select#dropdown_acuerdos').append('<option value="seleccione">Seleccione un Acuerdo</option>');

                                    if(data.acuerdos.length > 0){
                                          var option = "";                                    
                                          for (var i = 0; i < data.acuerdos.length; i++) {
                                             option = '<option value="'+data.acuerdos[i].acuerdo_nivel_id+'">'+data.acuerdos[i].nombre_acuerdo+'</option> ';
                                             $('select#dropdown_acuerdos').append(option);
                                          };
                                           
                                          $("#opciones_reporte").fadeIn(); 
                                    }  
                                    else{

                                        $("#opciones_reporte").hide(); 
                                        $("#no_acuerdos").fadeIn(); 
                                    }
                                  
                             },
                             error: function(xhr, ajaxOptions, thrownError){
                                   alert(xhr.status+" "+thrownError);
                                   $("#modal_error").modal('show');                                                
                                 }
                        });                    
         	}
            else{                

                  $("#opciones_reporte").fadeOut();
                     
            }	
       });


        
        $("#dropdown_acuerdos").change(function () {                

                if($("#dropdown_acuerdos").val()  != 'seleccione' ){
                var id_acuerdo = $("#dropdown_acuerdos").val();

                  $.ajax({   
                            url: config.base+'index.php/niveles/reportes/obtener_dias_disponibles',
                            type: 'POST',
                            data: {                         
                                     acuerdo_id : id_acuerdo,                                        
                                  },
                            dataType: 'json',
                            cache : false,  

                             success: function(data){

                                    //alert(data.dias);

                                    //$('#dia_historial').empty();

                                   $('#dia_historial').data("DateTimePicker").destroy();

                                   $('#dia_historial').datetimepicker({

                                        pickTime: false,
                                         icons: {
                                        time: "fa fa-clock-o",
                                        date: "fa fa-calendar",
                                        up: "fa fa-chevron-up",
                                        down: "fa fa-chevron-down",
                                        },
                                        maxDate: new Date(),
                                        daysOfWeekDisabled: data.dias,
                                    });

                                    $('#dia_historial').data("DateTimePicker").enable();
                                                                      
                             },
                             error: function(xhr, ajaxOptions, thrownError){
                                   alert(xhr.status+" "+thrownError);
                                   $("#modal_error").modal('show');                                                
                                 }
                        });             
                }
                else{
                  $('#dia_historial').data("DateTimePicker").disable()
                }
        });

	$("#dia_historial").change(function () {
		if($("#dia_historial").val() != ''){         	
         			$("#error_dia").empty();
         		}	
       	});


	$('#dia_historial').datetimepicker({

                    pickTime: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    },
                    maxDate: new Date(),
                    //daysOfWeekDisabled: cars,
                });

        $('#dia_historial').data("DateTimePicker").disable();


});