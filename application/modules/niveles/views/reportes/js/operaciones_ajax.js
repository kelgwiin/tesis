function mostrarHistorial() {

	var existe_error = false;

	if($("#dropdown_servicios").val() == 'seleccione'){         	
         		$("#error_dia").empty();
         		$("#error_servicio").append('Seleccione un Servicio');
         		existe_error = true;
         	}
         	else{
         		$("#error_servicio").empty();
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
                                  },
                            dataType: 'json',
                            cache : false,  

                             success: function(data){


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
                                                                                      
                             },
                             error: function(xhr, ajaxOptions, thrownError){
                                   alert(xhr.status+" "+thrownError);
                                   $("#modal_error").modal('show');
                                                
                                 }
                        });
         	};


    }


$( document ).ready(function() {

	$("#dropdown_servicios").change(function () {
		if($("#dropdown_servicios").val() != 'seleccione'){         	
         			$("#error_servicio").empty();
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
                    down: "fa fa-chevron-down"
                }
                });


            //Gráfica
            $('#container123').highcharts({
                exporting: { enabled: false },
                credits: {
                      enabled: false
                  },
                title: {
                    text: 'Monthly Average Temperature',
                    x: -20 //center
                },
                subtitle: {
                    text: 'Source: WorldClimate.com',
                    x: -20
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                yAxis: {
                    min: 0,
                    minRange: 0.1,
                    title: {
                        text: 'Temperature (°C)'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    valueSuffix: '°C'
                },
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom',
                    borderWidth: 0
                },
                series: [{
                    name: 'Tokyo',
                    data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                }, {
                    name: 'New York',
                    data: [ 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
                }, {
                    name: 'Berlin',
                    data: [0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
                }, {
                    name: 'London',
                    data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                }]
            });

//Gráfica
            $('#container1234').highcharts({
                title: {
                    text: 'Monthly Average Temperature',
                    x: -20 //center
                },
                exporting: { enabled: false },
                credits: {
                  enabled: false
              },
                subtitle: {
                    text: 'Source: WorldClimate.com',
                    x: -20
                },

                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                yAxis: {
                    min: 0,
                    minRange: 0.1,
                    title: {
                        text: 'Temperature (°C)'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    valueSuffix: '°C'
                },
                legend: {
                    /*layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',*/
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom',
                    borderWidth: 0
                },
                series: [{
                    name: 'Tokyo',
                    data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                }, {
                    name: 'New York',
                    data: [ 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
                }, {
                    name: 'Berlin',
                    data: [0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
                }, {
                    name: 'London',
                    data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                }]
            });


});