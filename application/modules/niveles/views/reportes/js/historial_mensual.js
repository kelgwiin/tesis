function esEntero(numero){
    if (numero - Math.floor(numero) == 0) {
        return true;
    }
    else{
        return false;
    }
}

function mostrarHistorialMensual() {

            var existe_error = false;

            if($("#dropdown_acuerdos_mensual").val() == 'seleccione'){
                $("#error_acuerdos_mensual").empty();
                $("#error_acuerdos_mensual").append('Seleccione un Acuerdo');
                existe_error = true;
            }
            else{
                $("#error_acuerdos_mensual").empty();
            }

             if($("#dia_historial_mensual").val() == ''){
                $("#error_mensual").empty();
                $("#error_mensual").append('Seleccione un Día');
                existe_error = true;

            }
            else{
                $("#error_mensual").empty();        
            }

            $("#informacion_historial_mensual").hide();

            if (existe_error == false) {

                        var id_servicio = $("#dropdown_servicios_mensual").val();
                        var fecha_mes = $("#dia_historial_mensual").val();
                        var id_acuerdo = $("#dropdown_acuerdos_mensual").val();


                              $("#tabla_servicio_mensual").empty();
                              $("#numero_caidas_mensual").empty();
                              $("#numero_caidas_ANS_mensual").empty();
                              $("#tiempo_caido_mensual").empty();
                              $("#tiempo_online_mensual").empty();
                              $("#tiempo_online_ANS_mensual").empty();
                              $("#mayor_caida_mensual").empty();
                              $("#menor_caida_mensual").empty();
                              $("#disponibilidad_mensual").empty();
                              $("#disponibilidad_ANS_mensual").empty();
                              $("#tiempo_caido_ANS_mensual").empty();


                              $("#tabla_procesos_mensual").empty();
                              $("#tabla_info_mensual").empty();
                              $("#tabla_caida_servicios_mensual").empty();
                               $("#tabla_caida_procesos_mensual").empty();

                              $("#info_servicio_mensual").empty();
                              $("#info_acuerdo_mensual").empty();
                              $("#info_fecha_mensual").empty();

                          waitingDialog.show('Generando Reporte. Por favor espere...');

                          $.ajax({
                 
                            
                            url: config.base+'index.php/niveles/reportes/obtener_historial_servicio_mes',
                            type: 'POST',
                            data: {                         
                                    servicio_id : id_servicio,
                                    mes : fecha_mes,   
                                    acuerdo_id : id_acuerdo,                                              
                                  },
                            dataType: 'json',
                            cache : false,  

                             success: function(data){

                              $("#informacion_historial_mensual").hide();

                              var nombre_servicio = $( "#dropdown_servicios_mensual option:selected" ).text();
                              var nombre_acuerdo = $( "#dropdown_acuerdos_mensual option:selected" ).text();

                              //Información de el Nombre de Servicio, ANS y fecha seleccionados
                              $("#info_servicio_mensual").append('<h4><i class="fa fa-bars"></i> '+nombre_servicio+"</h4>");
                              $("#info_acuerdo_mensual").append('<h4><i class="fa fa-file-text-o"></i> '+nombre_acuerdo+"</h4>");
                              $("#info_fecha_mensual").append('<h4><i class="fa fa-calendar"></i> '+data.mes+"</h4>");

                              
                                // COMIENZO de la Creación de tabla de caídas de servicio
                               var tabla_historial_servicio = '<table class="table table-bordered" id="tabla_caida_servicios_mensual">';
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

                               $("#tabla_servicio_mensual").append(tabla_historial_servicio);
                               // FIN de la Creación de tabla de caídas de servicio

                                // COMIENZO del  LLenado de la tabla de Niveles de Servicio Obtenidos y Niveles de Servicios contenidos en el ANS
                               $('#tabla_caida_servicios_mensual').unbind('appendCache applyWidgetId applyWidgets sorton update updateCell')
                               .removeClass('tablesorter')
                               .find('thead th')
                               .unbind('click mousedown')
                               .removeClass('header headerSortDown headerSortUp');

                                // Declaración del datatable de caídas de servicio
                              $('#tabla_caida_servicios_mensual').dataTable( {
                                "iDisplayLength": 4,
                                "bLengthChange": false,
                                "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"pull-left"i><"pull-right"p>>>'
                                 });


                               $("#disponibilidad_mensual").append(data.disponibilidad+" %");
                                $("#disponibilidad_ANS_mensual").append(data.ans.porcentaje_disp+" %");
                                $("#tiempo_online_mensual").append(" <h5>"+data.tiempo_online2+"</h5>");
                                $("#tiempo_online_ANS_mensual").append(" <h5>"+data.tiempo_disponible2+"</h5>");

                                $("#numero_caidas_mensual").append(data.numero_caidas);

                               var  numero_caidas_mensual = parseInt(data.numero_caidas);

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


                               $("#numero_caidas_ANS_mensual").append(objetivos_caidas);

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

                               $("#tiempo_caido_mensual").append(" <h5>"+data.tiempo_caido+" <i class='fa fa-clock-o'></i></h5>");   
                                $("#tiempo_caido_ANS_mensual").append(objetivos_duracion_caidas);   

                                $("#mayor_caida_mensual").append(" <h5>"+data.mayor_caida+" <i class='fa fa-clock-o'></i></h5>");
                                 $("#menor_caida_mensual").append(" <h5>"+data.menor_caida+" <i class='fa fa-clock-o'></i></h5>");
                                   // FIN del  LLenado de la tabla de Niveles de Servicio Obtenidos y Niveles de Servicios contenidos en el ANS 



                              
                              // COMIENZO GRAFICAS DE NIVELES DE SERVICIO
                              /**************************************************************/
                              
                              var maximo = parseInt(data.ans.maximo_num_caidas)+2;
                             
                              // Gráfica de Numero de Caídas
                              $('#container-caidas-mensual').highcharts({
                                  chart: {
                                      type: 'gauge',
                                      plotBackgroundColor: null,
                                      plotBackgroundImage: null,
                                      plotBorderWidth: 0,
                                      plotShadow: false
                                  },                                  
                                  exporting: { enabled: false },
                                  credits: {enabled: false },

                                  title: { text: 'Número de Caidas'},
                                  pane: {
                                      startAngle: -150,
                                      endAngle: 150,
                                      background: [{
                                          backgroundColor: {
                                              linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                                              stops: [
                                                  [0, '#FFF'],
                                                  [1, '#333']
                                              ]
                                          },
                                          borderWidth: 0,
                                          outerRadius: '109%'
                                      }, {
                                          backgroundColor: {
                                              linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                                              stops: [
                                                  [0, '#333'],
                                                  [1, '#FFF']
                                              ]
                                          },
                                          borderWidth: 1,
                                          outerRadius: '107%'
                                      }, {
                                          // default background
                                      }, {
                                          backgroundColor: '#DDD',
                                          borderWidth: 0,
                                          outerRadius: '105%',
                                          innerRadius: '103%'
                                      }]
                                  },

                                  // the value axis
                                  yAxis: {
                                      min: 0,
                                      max: maximo,

                                      minorTickInterval: 'auto',
                                      minorTickWidth: 1,
                                      minorTickLength: 10,
                                      minorTickPosition: 'inside',
                                      minorTickColor: '#666',

                                      tickPixelInterval: 30,
                                      tickWidth: 2,
                                      tickPosition: 'inside',
                                      tickLength: 10,
                                      tickColor: '#666',
                                      labels: {
                                          step: 2,
                                          rotation: 'auto'
                                      },
                                      title: {
                                          text: '<br><br> Nº Caídas '
                                      },
                                      plotBands: [{
                                          from: 0,
                                          to: data.ans.minimo_num_caidas,
                                          color: '#55BF3B' // green
                                      }, {
                                          from: data.ans.minimo_num_caidas,
                                          to: data.ans.maximo_num_caidas,
                                          color: '#DDDF0D' // yellow
                                      }, {
                                          from: data.ans.maximo_num_caidas,
                                          to: maximo,
                                          color: '#DF5353' // red
                                      }]
                                  },

                                  series: [{
                                      name: 'N de Caidas',
                                      data: [numero_caidas_mensual],
                                      tooltip: {
                                          //valueSuffix: ' km/h'
                                      }
                                  }]

                              },
                                  // Add some life
                                 function (chart) {
                                      if (!chart.renderer.forExport) {
                                          setInterval(function () {
                                              //newVal = 8;                    
                                              point.update(newVal);

                                          });
                                      }
                                  });

                              // Gráfica de disponibilidad 
                              var gaugeOptions = {

                                      chart: {
                                          type: 'solidgauge'
                                      },

                                      title: null,

                                      pane: {
                                          center: ['50%', '85%'],
                                          size: '140%',
                                          startAngle: -90,
                                          endAngle: 90,
                                          background: {
                                              backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
                                              innerRadius: '60%',
                                              outerRadius: '100%',
                                              shape: 'arc'
                                          }
                                      },
                                      exporting: { enabled: false },
                                      credits: {enabled: false },

                                      tooltip: {
                                          enabled: false
                                      },

                                      // the value axis
                                      yAxis: {
                                          stops: [
                                              [0.01, '#DF5353'], // red
                                              [0.85, '#DDDF0D'], // yellow
                                              [0.97, '#55BF3B']// green
                                          ],
                                          lineWidth: 0,
                                          minorTickInterval: null,
                                          tickPixelInterval: 400,
                                          tickWidth: 0,
                                          title: {
                                              y: -70
                                          },
                                          labels: {
                                              y: 16
                                          }
                                      },

                                      plotOptions: {
                                          solidgauge: {
                                              dataLabels: {
                                                  y: 5,
                                                  borderWidth: 0,
                                                  useHTML: true
                                              }
                                          }
                                      }
                                  };

                                  
                                  $('#container-disponibilidad-mensual').highcharts(Highcharts.merge(gaugeOptions, {
                                      yAxis: {
                                          min: 0,
                                          max: 100,
                                          title: {
                                              text: '<b>Disponibilidad</b>'
                                          }
                                      },

                                      credits: {
                                          enabled: false
                                      },

                                      series: [{
                                          //name: 'Speed',
                                          data: [data.disponibilidad],
                                          dataLabels: {
                                              format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                                                  ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}%</span><br/>' +
                                                     '<span style="font-size:12px;color:silver"> </span></div>'
                                          },
                                      }]

                                  }));


                                  var duracion_caida_total = parseInt(data.tiempo_caido_segundos);
                                  var unidad_medida = '';
                                  if(data.ans.unidad_duracion_caidas == "segundos"){
                                        unidad_medida = "segundos";
                                  }

                                  if(data.ans.unidad_duracion_caidas == "minutos"){
                                          duracion_caida_total =   duracion_caida_total / 60;
                                           unidad_medida = "minutos";
                                  }
                                    if(data.ans.unidad_duracion_caidas == "horas"){
                                           duracion_caida_total =   duracion_caida_total / 3600;
                                            unidad_medida = "horas";
                                  }
                                  
                                  
                                  var maximo = 0;
                                  if(data.ans.maximo_duracion_caidas >= duracion_caida_total){
                                          maximo = parseInt(data.ans.maximo_duracion_caidas)+2;
                                  }
                                  else{
                                        maximo = parseInt(duracion_caida_total)+2;
                                  }

                                  if( esEntero(duracion_caida_total) == false){
                                         var numero_nuevo = parseFloat(duracion_caida_total);
                                          duracion_caida_total = parseFloat(numero_nuevo.toFixed(2));
                                  }

                                   // Gráfica de Tiempo Total Caído
                                  $('#container-tiempo-caido-mensual').highcharts({
                                  chart: {
                                      type: 'gauge',
                                      plotBackgroundColor: null,
                                      plotBackgroundImage: null,
                                      plotBorderWidth: 0,
                                      plotShadow: false
                                  },                                  
                                  exporting: { enabled: false },
                                  credits: {enabled: false },

                                  title: { text: 'Total Caído'},
                                  pane: {
                                      startAngle: -150,
                                      endAngle: 150,
                                      background: [{
                                          backgroundColor: {
                                              linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                                              stops: [
                                                  [0, '#FFF'],
                                                  [1, '#333']
                                              ]
                                          },
                                          borderWidth: 0,
                                          outerRadius: '109%'
                                      }, {
                                          backgroundColor: {
                                              linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                                              stops: [
                                                  [0, '#333'],
                                                  [1, '#FFF']
                                              ]
                                          },
                                          borderWidth: 1,
                                          outerRadius: '107%'
                                      }, {
                                          // default background
                                      }, {
                                          backgroundColor: '#DDD',
                                          borderWidth: 0,
                                          outerRadius: '105%',
                                          innerRadius: '103%'
                                      }]
                                  },

                                  // the value axis
                                  yAxis: {
                                      min: 0,
                                      max: maximo,

                                      minorTickInterval: 'auto',
                                      minorTickWidth: 1,
                                      minorTickLength: 10,
                                      minorTickPosition: 'inside',
                                      minorTickColor: '#666',

                                      tickPixelInterval: 30,
                                      tickWidth: 2,
                                      tickPosition: 'inside',
                                      tickLength: 10,
                                      tickColor: '#666',
                                      labels: {
                                          step: 2,
                                          rotation: 'auto'
                                      },
                                      title: {
                                          text: '<br><br>'+unidad_medida
                                      },
                                      plotBands: [{
                                          from: 0,
                                          to: data.ans.minimo_duracion_caidas,
                                          color: '#55BF3B' // green
                                      }, {
                                          from: data.ans.minimo_duracion_caidas,
                                          to: data.ans.maximo_duracion_caidas,
                                          color: '#DDDF0D' // yellow
                                      }, {
                                          from: data.ans.maximo_duracion_caidas,
                                          to: maximo,
                                          color: '#DF5353' // red
                                      }]
                                  },

                                  series: [{
                                      name: 'N de Caidas',
                                      data: [duracion_caida_total],
                                      tooltip: {
                                          valueSuffix: unidad_medida
                                      }
                                  }]

                              },
                                  // Add some life
                                 function (chart) {
                                      if (!chart.renderer.forExport) {
                                          setInterval(function () {
                                              //newVal = 8;                    
                                              point.update(newVal);

                                          });
                                      }
                                  });


                                 var duracion_caida_mayor = parseInt(data.mayor_caida_segundos);

                                  if(data.ans.unidad_duracion_caidas == "minutos"){
                                          duracion_caida_mayor =  duracion_caida_mayor / 60;
                                  }
                                  if(data.ans.unidad_duracion_caidas == "horas"){
                                           duracion_caida_mayor =  duracion_caida_mayor / 3600;
                                  }

                                  var maximo_caida_mayor = 0;
                                  if(data.ans.maximo_duracion_caidas >= duracion_caida_mayor){
                                          maximo_caida_mayor = parseInt(data.ans.maximo_duracion_caidas)+2;
                                  }
                                  else{
                                        maximo_caida_mayor = parseInt(duracion_caida_mayor)+2;
                                  }

                                   if( esEntero(duracion_caida_mayor) == false){
                                         var numero_nuevo = parseFloat(duracion_caida_mayor);
                                          duracion_caida_mayor = parseFloat(numero_nuevo.toFixed(2));
                                  }

                                   // Gráfica de Mayor de Caída
                                  $('#container-mayor-caida-mensual').highcharts({
                                  chart: {
                                      type: 'gauge',
                                      plotBackgroundColor: null,
                                      plotBackgroundImage: null,
                                      plotBorderWidth: 0,
                                      plotShadow: false
                                  },                                  
                                  exporting: { enabled: false },
                                  credits: {enabled: false },

                                  title: { text: 'Caída Mayor'},
                                  pane: {
                                      startAngle: -150,
                                      endAngle: 150,
                                      background: [{
                                          backgroundColor: {
                                              linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                                              stops: [
                                                  [0, '#FFF'],
                                                  [1, '#333']
                                              ]
                                          },
                                          borderWidth: 0,
                                          outerRadius: '109%'
                                      }, {
                                          backgroundColor: {
                                              linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                                              stops: [
                                                  [0, '#333'],
                                                  [1, '#FFF']
                                              ]
                                          },
                                          borderWidth: 1,
                                          outerRadius: '107%'
                                      }, {
                                          // default background
                                      }, {
                                          backgroundColor: '#DDD',
                                          borderWidth: 0,
                                          outerRadius: '105%',
                                          innerRadius: '103%'
                                      }]
                                  },

                                  // the value axis
                                  yAxis: {
                                      min: 0,
                                      max: maximo_caida_mayor,

                                      minorTickInterval: 'auto',
                                      minorTickWidth: 1,
                                      minorTickLength: 10,
                                      minorTickPosition: 'inside',
                                      minorTickColor: '#666',

                                      tickPixelInterval: 30,
                                      tickWidth: 2,
                                      tickPosition: 'inside',
                                      tickLength: 10,
                                      tickColor: '#666',
                                      labels: {
                                          step: 2,
                                          rotation: 'auto'
                                      },
                                      title: {
                                          text: '<br><br>'+unidad_medida
                                      },
                                      plotBands: [{
                                          from: 0,
                                          to: data.ans.minimo_duracion_caidas,
                                          color: '#55BF3B' // green
                                      }, {
                                          from: data.ans.minimo_duracion_caidas,
                                          to: data.ans.maximo_duracion_caidas,
                                          color: '#DDDF0D' // yellow
                                      }, {
                                          from: data.ans.maximo_duracion_caidas,
                                          to: maximo,
                                          color: '#DF5353' // red
                                      }]
                                  },

                                  series: [{
                                      name: 'N de Caidas',
                                      data: [duracion_caida_mayor],
                                      tooltip: {
                                          valueSuffix: unidad_medida
                                      }
                                  }]

                              },
                                  // Add some life
                                 function (chart) {
                                      if (!chart.renderer.forExport) {
                                          setInterval(function () {
                                              //newVal = 8;                    
                                              point.update(newVal);

                                          });
                                      }
                                  });



                              var duracion_caida_menor = parseInt(data.menor_caida_segundos);

                                  if(data.ans.unidad_duracion_caidas == "minutos"){
                                          duracion_caida_menor =  duracion_caida_menor / 60;
                                  }
                                  if(data.ans.unidad_duracion_caidas == "horas"){
                                           duracion_caida_menor =  duracion_caida_menor / 3600;
                                  }

                                  var maximo_caida_menor = 0;
                                  if(data.ans.maximo_duracion_caidas >= duracion_caida_menor){
                                          maximo_caida_menor = parseInt(data.ans.maximo_duracion_caidas)+2;
                                  }
                                  else{
                                        maximo_caida_menor = parseInt(duracion_caida_menor)+2;
                                  }

                                  if( esEntero(duracion_caida_menor) == false){
                                         var numero_nuevo = parseFloat(duracion_caida_menor);
                                          duracion_caida_menor = parseFloat(numero_nuevo.toFixed(2));
                                  }

                                  // Gráfica de Menor de Caída
                                  $('#container-menor-caida-mensual').highcharts({
                                  chart: {
                                      type: 'gauge',
                                      plotBackgroundColor: null,
                                      plotBackgroundImage: null,
                                      plotBorderWidth: 0,
                                      plotShadow: false
                                  },                                  
                                  exporting: { enabled: false },
                                  credits: {enabled: false },

                                  title: { text: 'Caída Menor'},
                                  pane: {
                                      startAngle: -150,
                                      endAngle: 150,
                                      background: [{
                                          backgroundColor: {
                                              linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                                              stops: [
                                                  [0, '#FFF'],
                                                  [1, '#333']
                                              ]
                                          },
                                          borderWidth: 0,
                                          outerRadius: '109%'
                                      }, {
                                          backgroundColor: {
                                              linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                                              stops: [
                                                  [0, '#333'],
                                                  [1, '#FFF']
                                              ]
                                          },
                                          borderWidth: 1,
                                          outerRadius: '107%'
                                      }, {
                                          // default background
                                      }, {
                                          backgroundColor: '#DDD',
                                          borderWidth: 0,
                                          outerRadius: '105%',
                                          innerRadius: '103%'
                                      }]
                                  },

                                  // the value axis
                                  yAxis: {
                                      min: 0,
                                      max: maximo_caida_menor,

                                      minorTickInterval: 'auto',
                                      minorTickWidth: 1,
                                      minorTickLength: 10,
                                      minorTickPosition: 'inside',
                                      minorTickColor: '#666',

                                      tickPixelInterval: 30,
                                      tickWidth: 2,
                                      tickPosition: 'inside',
                                      tickLength: 10,
                                      tickColor: '#666',
                                      labels: {
                                          step: 2,
                                          rotation: 'auto'
                                      },
                                      title: {
                                          text: '<br><br>'+unidad_medida
                                      },
                                      plotBands: [{
                                          from: 0,
                                          to: data.ans.minimo_duracion_caidas,
                                          color: '#55BF3B' // green
                                      }, {
                                          from: data.ans.minimo_duracion_caidas,
                                          to: data.ans.maximo_duracion_caidas,
                                          color: '#DDDF0D' // yellow
                                      }, {
                                          from: data.ans.maximo_duracion_caidas,
                                          to: maximo,
                                          color: '#DF5353' // red
                                      }]
                                  },

                                  series: [{
                                      name: 'N de Caidas',
                                      data: [duracion_caida_menor],
                                      tooltip: {
                                          valueSuffix: unidad_medida
                                      }
                                  }]

                              },
                                  // Add some life
                                 function (chart) {
                                      if (!chart.renderer.forExport) {
                                          setInterval(function () {
                                              //newVal = 8;                    
                                              point.update(newVal);

                                          });
                                      }
                                  });


                                //GRAFICAS DE NIVELES DE SEVICIO SEMANAL

                                //Gráficas de Disponibilidad de Servicios///////////////////////////////////////////////////////

                                 //Preparando los datos
                                 var datos_disponibilidad = new Array ();
                                 var datos_disponibilidad2 = new Array ();
                                 var datos_caidas = new Array ();
                                 var datos_tiempos = new Array ();
                                 var categorias = new Array ();

                                 data.dias.forEach(function(dia) { 
                                          // DATOS PARA SERVICIO
                                          var nombre_dia = data.historial_servicios[dia].nombre_dia+" "+dia;
                                          var disponibilidad_servicio = data.historial_servicios[dia].disponibilidad;
                                          var numero_caidas = data.historial_servicios[dia].numero_caidas;
                                          var tiempo_caido = data.historial_servicios[dia].tiempo_caido_segundos;

                                           datos_disponibilidad.push(new Array (nombre_dia, disponibilidad_servicio)); 

                                           var str = dia.split("/");
                                           categorias.push(str[0]); 

                                           datos_disponibilidad2.push(new Array (nombre_dia, disponibilidad_servicio)); 
                                           datos_caidas.push(new Array (nombre_dia, numero_caidas)); 
                                           datos_tiempos.push(new Array (nombre_dia, tiempo_caido*1000)); 

                                 });

                                 var nombre_servicio = $( "#dropdown_servicios_mensual option:selected" ).text();

                                 // Dibujando la gráfica
                                    $('#grafica_disponibilidad_servicio_mensual').highcharts({
                                            chart: { type: 'column'},
                                            exporting: { enabled: false },
                                            credits: {enabled: false},
                                            title: {text: 'Disponibilidad de Servicio '+data.mes},
                                            subtitle: {text: nombre_servicio},
                                            xAxis: {
                                              categories: categorias,
                                                type: 'category',
                                                labels: {
                                                    //rotation: -45,
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
                                                color: '#6699FF',
                                                data: datos_disponibilidad,
                                            }]
                                        });

                                        // Segunda Gráfica de disponibilidad

                                        $('#grafica_disponibilidad_servicio_mensual2').highcharts({
                                          chart: {
                                              type: 'line'
                                          },
                                          title: {text: 'Disponibilidad de Servicio '+data.mes},
                                          subtitle: {text: nombre_servicio},
                                          legend: {enabled: false},
                                          exporting: { enabled: false },
                                          credits: {enabled: false},
                                          xAxis: {
                                             categories: categorias,
                                              labels: {
                                                    //rotation: -45,
                                                    style: {
                                                        fontSize: '13px',
                                                        fontFamily: 'Verdana, sans-serif'
                                                    }
                                                }
                                          },
                                          yAxis: {
                                              min: 0,                                              
                                              tickInterval: 10,
                                              title: {
                                                   text: 'Disponibilidad (%)'
                                              }
                                          },
                                          tooltip: {pointFormat: 'Disponibilidad: <b>{point.y:.1f} %</b>'},
                                          series: [{
                                             // name: 'Tokyo',
                                              data: datos_disponibilidad2
                                          }]
                                      });

                                     //Gráfica de Caídas de Servicio///////////////////////////////////////////////////////
                                    // Dibujando la gráfica
                                    $('#grafica_caidas_servicio_mensual').highcharts({
                                            chart: {type: 'column' },
                                            exporting: { enabled: false },
                                             credits: {enabled: false },
                                            title: {  text: 'Numero de Caídas de Servicio '+data.mes},
                                            subtitle: { text: nombre_servicio },
                                            xAxis: {
                                              categories: categorias,
                                                type: 'category',
                                                labels: {
                                                    //rotation: -45,
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
                                            }]
                                        });

                                    //Gráfica de Tiempo total Caído de Servicios///////////////////////////////////////////////////////
                                    // Dibujando la gráfica
                                    $('#grafica_tiempo_servicio_mensual').highcharts({

                                            title: {  text: 'Tiempo Total Caído de Servicio '+data.mes},
                                            subtitle: { text: nombre_servicio },
                                                chart: { type: 'column' },
                                                legend: { enabled: false },  
                                                exporting: { enabled: false },
                                                    credits: { enabled: false },          
                                               xAxis: {
                                                categories: categorias,
                                                 type: 'category',
                                                 labels: {
                                                 //rotation: -45,
                                                  style: {
                                                             fontSize: '13px',
                                                               fontFamily: 'Verdana, sans-serif'
                                                             }
                                                         }
                                                },            
                                                yAxis: {
                                                   min: 0,  
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
                                                            }]
                                                });  


                              //FIN DE LAS GRAFICAS NIVELES DE SERVICIO
                              /**************************************************************/


                                 //Comienzo de Creación de la tabla de caídas de procesos
                              var tabla_historial_proceso = '<table class="table table-bordered" id="tabla_caida_procesos_mensual">';
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
                                    tabla_historial_proceso = tabla_historial_proceso+'<td class="text-center">'+caida.duracion_caida+' </td>';
                                    tabla_historial_proceso = tabla_historial_proceso+'</tr>';
                              });

                              tabla_historial_proceso = tabla_historial_proceso+ '</tbody>';
                               tabla_historial_proceso = tabla_historial_proceso+ '</table>';

                               $("#tabla_procesos_mensual").append(tabla_historial_proceso);

                                $('#tabla_caida_procesos_mensual').unbind('appendCache applyWidgetId applyWidgets sorton update updateCell')
                               .removeClass('tablesorter')
                               .find('thead th')
                               .unbind('click mousedown')
                               .removeClass('header headerSortDown headerSortUp');

                              $('#tabla_caida_procesos_mensual').dataTable( {
                                "iDisplayLength": 4,
                                "bLengthChange": false,
                                "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"pull-left"i><"pull-right"p>>>'
                                });
                              //Fin de Creación de tabla de caídas de procesos


                                  //Creación de la tabla con lo datos globales de caídas por proceso
                               var tabla_info_proceso = '<table class="table table-bordered" id="tabla_info_procesos_mensual">';
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
                                    tabla_info_proceso = tabla_info_proceso+'<td>'+data.historial_procesos[nombre_proceso].disponibilidad+' %</td>';
                                    tabla_info_proceso = tabla_info_proceso+'<td>'+data.historial_procesos[nombre_proceso].tiempo_disponible+'</td>';
                                    tabla_info_proceso = tabla_info_proceso+'<td>'+data.historial_procesos[nombre_proceso].caidas+' </td>';
                                    tabla_info_proceso = tabla_info_proceso+'<td>'+data.historial_procesos[nombre_proceso].tiempo_caido+' </td>';
                                    tabla_info_proceso = tabla_info_proceso+'</tr>';
                              });

                              tabla_historial_proceso = tabla_historial_proceso+ '</tbody>';
                               tabla_historial_proceso = tabla_historial_proceso+ '</table>';

                               $("#tabla_info_mensual").append(tabla_info_proceso);


                            //***************************************************************************
                             //GRAFICAS DE NIVELES DE SERVICIO POR PROCESO

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

                                 var nombre_servicio = $( "#dropdown_servicios_mensual option:selected" ).text();

                                 // Dibujando la gráfica
                                    $('#grafica_disponibilidad_procesos_mensual').highcharts({
                                            chart: { type: 'column'},
                                            exporting: { enabled: false },
                                            credits: {enabled: false},
                                            title: {text: 'Disponibilidad por Procesos '+data.mes},
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
                                                color: '#6699FF',
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
                                    $('#grafica_caidas_procesos_mensual').highcharts({
                                            chart: {type: 'column' },
                                            exporting: { enabled: false },
                                             credits: {enabled: false },
                                            title: {  text: 'Caídas por Procesos '+data.mes},
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
                                    $('#grafica_tiempo_procesos_mensual').highcharts({

                                            title: {  text: 'Tiempo Total Caído por Procesos '+data.mes},
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
                                                   min: 0,  
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


                                      
                                           //DATOS PARA PROCESOS
                                           var series_disponibilidad_procesos = new Array();
                                           var series_numero_caidas_procesos = new Array();
                                           var series_tiempos_caidas_procesos = new Array();

                                          data.servicio_procesos.forEach(function(proceso) {

                                                var disponibilidades = new Array ();    
                                                var datos_caidas = new Array ();          
                                                 var datos_tiempos = new Array ();      

                                                var nombre_proceso = data.procesos_info[proceso.servicio_proceso_id].nombre;                                          
                                      
                                                data.dias.forEach(function(dia) {                                                        
                                                        var disponibilidad_proceso = data.historial_servicios[dia].historial_procesos[nombre_proceso].disponibilidad;

                                                        var numero_caidas =  data.historial_servicios[dia].historial_procesos[nombre_proceso].caidas;
                                                        var tiempo_caido =  data.historial_servicios[dia].historial_procesos[nombre_proceso].segundos;

                                                        disponibilidades.push(disponibilidad_proceso);
                                                        datos_caidas.push(numero_caidas); 
                                                        datos_tiempos.push(tiempo_caido*1000); 
                                                        

                                                       // alert(nombre_proceso+" "+disponibilidad_proceso);                                                   
                                                       
                                             });

                                            serie_disponibilidad = {name: nombre_proceso, data : disponibilidades};
                                            serie_numero_caidas = {name: nombre_proceso, data : datos_caidas};
                                            serie_tiempos_caidas = {name: nombre_proceso, data : datos_tiempos};

                                            series_disponibilidad_procesos.push(serie_disponibilidad);
                                            series_numero_caidas_procesos.push(serie_numero_caidas);
                                           series_tiempos_caidas_procesos.push(serie_tiempos_caidas); 

                                              
                                         });

                                          // Gráfica  lineal de disponibilidad de procesos por día
                                          $('#grafica_disponibilidad_procesos_mensual2').highcharts({
                                          chart: {
                                              type: 'line'
                                          },
                                          title: {text: 'Disponibilidad de Procesos '+data.mes},
                                           subtitle: { text: nombre_servicio },
                                          //subtitle: {text: nombre_servicio},
                                          //legend: {enabled: false},
                                          exporting: { enabled: false },
                                          credits: {enabled: false},
                                          xAxis: {
                                             categories: categorias
                                          },
                                          yAxis: {
                                              min: 0,                                              
                                                tickInterval: 10,
                                              title: {
                                                   text: 'Disponibilidad (%)'
                                              }
                                          },
                                         tooltip: {pointFormat: 'Disponibilidad: <b>{point.y:.1f} %</b>'},
                                          series: series_disponibilidad_procesos
                                      });

                                        // Gráfica tipo columna de disponibilidad de procesos por día
                                          $('#grafica_disponibilidad_procesos_mensual3').highcharts({
       
                                              exporting: { enabled: false },
                                             credits: { enabled: false },   
                                              chart: {
                                                  type: 'column'
                                              },
                                             title: {text: 'Disponibilidad de Procesos '+data.mes},
                                              subtitle: { text: nombre_servicio },
                                           
                                              xAxis: {
                                                  categories: categorias,
                                                  crosshair: true
                                              },
                                              yAxis: {
                                                  min: 0,
                                                  title: {
                                                      text: 'Disponibilidad (%)'
                                                  }
                                              },
                                              tooltip: {
                                                  headerFormat: '<span style="font-size:10px"><b><u>{point.key}</u></b></span><table>',
                                                  pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                                      '<td style="padding:0"><b>{point.y:.2f} %</b></td></tr>',
                                                  footerFormat: '</table>',
                                                  shared: true,
                                                  useHTML: true
                                              },
                                              plotOptions: {
                                                  column: {
                                                      pointPadding: 0.2,
                                                      borderWidth: 0
                                                  }
                                              },
                                              series: series_disponibilidad_procesos,
                                          });


                                        // Gráfica de columna del numero de caídas de procesos por día
                                        $('#grafica_caidas_procesos_mensual2').highcharts({
       
                                              exporting: { enabled: false },
                                             credits: { enabled: false },   
                                              chart: {
                                                  type: 'column'
                                              },
                                             title: {text: 'Caídas por Procesos '+data.mes},
                                              subtitle: { text: nombre_servicio },
                                           
                                              xAxis: {
                                                  categories: categorias,
                                                  crosshair: true
                                              },
                                              yAxis: {
                                                  min: 0,
                                                  title: {
                                                      text: 'Nº de Caídas'
                                                  }
                                              },
                                              tooltip: {
                                                  headerFormat: '<span style="font-size:10px"><b><u>{point.key}</u></b></span><table>',
                                                  pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                                      '<td style="padding:0"><b>{point.y:.0f} </b></td></tr>',
                                                  footerFormat: '</table>',
                                                  shared: true,
                                                  useHTML: true
                                              },
                                              plotOptions: {
                                                  column: {
                                                      pointPadding: 0.2,
                                                      borderWidth: 0
                                                  }
                                              },
                                              series: series_numero_caidas_procesos,
                                          });


                                            // Gráfica  lineal del numero de caídas de procesos por día
                                            $('#grafica_caidas_procesos_mensual3').highcharts({
                                          chart: {
                                              type: 'line'
                                          },
                                          title: {text: 'Caídas de Procesos '+data.mes},
                                           subtitle: { text: nombre_servicio },
                                          exporting: { enabled: false },
                                          credits: {enabled: false},
                                          xAxis: {
                                             categories: categorias
                                          },
                                          yAxis: {
                                              min: 0,                 
                                              title: {
                                                   text: 'Nº de Caídas'
                                              }
                                          },
                                          plotOptions: {
                                              line: {
                                                  dataLabels: {
                                                      format: '<b>{point.y:.0f}</b>',
                                                      enabled: true
                                                  },
                                                  enableMouseTracking: false
                                              }
                                          },
                                          series:  series_numero_caidas_procesos,
                                      });

                                        // Gráfica tipo barra de la duración total de caída de procesos por día
                                         $('#grafica_tiempo_procesos_mensual2').highcharts({
       
                                              exporting: { enabled: false },
                                             credits: { enabled: false },   
                                              chart: {
                                                  type: 'column'
                                              },
                                             title: {text: 'Tiempo Total Caído de Procesos '+data.mes},
                                             subtitle: { text: nombre_servicio },
                                                chart: { type: 'column' },
                                                exporting: { enabled: false },
                                                    credits: { enabled: false },          
                                               xAxis: {
                                                  categories: categorias
                                                },            
                                                yAxis: {
                                                   min: 0,  
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
                                                 series: series_tiempos_caidas_procesos,
                                                });  

                                           // Gráfica lineal de la duración total de caída de procesos por día
                                              $('#grafica_tiempo_procesos_mensual3').highcharts({
                                            chart: {
                                                type: 'line'
                                            },
                                            title: {text: 'Tiempo Total Caído de Procesos '+data.mes},
                                             subtitle: { text: nombre_servicio },
                                            exporting: { enabled: false },
                                            credits: {enabled: false},
                                            xAxis: {
                                               categories: categorias
                                            },
                                            yAxis: {
                                               min: 0,  
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
                                                 series: series_tiempos_caidas_procesos,
                                        });

                                    //***************************************************************************
                                    //GRAFICAS DE NIVELES DE SERVICIO POR PROCESO


     
  
                              $("#informacion_historial_mensual").fadeIn();  // Mostrando el Contenido del Reporte

                              waitingDialog.hide('Generando Reporte. Por favor espere...');
                       

                             },
                             error: function(xhr, ajaxOptions, thrownError){
                                   alert(xhr.status+" "+thrownError);
                                   $("#modal_error").modal('show');
                                                
                                 }
                        });

            }

}


$( document ).ready(function() {

        $("#dropdown_servicios_mensual").change(function () {
            if($("#dropdown_servicios_mensual").val() != 'seleccione'){             
                        $("#error_servicio_mensual").empty();
                    }   
            });


     // Llenado del dropdown de ANS.
    $("#dropdown_servicios_mensual").change(function () {

            $("#no_acuerdos_mensual").fadeOut(); 

            $("#error_acuerdos_mensual").empty();
            $("#error_mensual").empty();      
           

           // $('#dia_historial').val("");
           //  $('#dia_historial_mensual').data("DateTimePicker").disable();

        if($("#dropdown_servicios_mensual").val() != 'seleccione'){             
                    //$("#error_servicio").empty();
                  var id_servicio = $("#dropdown_servicios_mensual").val();

                  $.ajax({   
                            url: config.base+'index.php/niveles/reportes/obtener_ans_servicio',
                            type: 'POST',
                            data: {                         
                                    servicio_id : id_servicio,                                       
                                  },
                            dataType: 'json',
                            cache : false,  

                             success: function(data){

                                    $('select#dropdown_acuerdos_mensual').empty();
                                    $('select#dropdown_acuerdos_mensual').append('<option value="seleccione">Seleccione un Acuerdo</option>');

                                    if(data.acuerdos.length > 0){
                                          var option = "";                                    
                                          for (var i = 0; i < data.acuerdos.length; i++) {
                                             option = '<option value="'+data.acuerdos[i].acuerdo_nivel_id+'">'+data.acuerdos[i].nombre_acuerdo+'</option> ';
                                             $('select#dropdown_acuerdos_mensual').append(option);
                                          };
                                           
                                          $("#opciones_reporte_mensual").fadeIn(); 
                                    }  
                                    else{

                                        $("#opciones_reporte_mensual").hide(); 
                                        $("#no_acuerdos_mensual").fadeIn(); 
                                    }
                                  
                             },
                             error: function(xhr, ajaxOptions, thrownError){
                                   alert(xhr.status+" "+thrownError);
                                   $("#modal_error").modal('show');                                                
                                 }
                        });                    
            }
            else{                

                  $("#opciones_reporte_mensual").fadeOut();
                     
            }   
       });

        $("#dropdown_acuerdos_mensual").change(function () {

            if($("#dropdown_acuerdos_mensual").val()  != 'seleccione' ){

                 $('#dia_historial_mensual').data("DateTimePicker").enable();
            }
            else{
                $('#dia_historial_mensual').data("DateTimePicker").disable();
            }
        });


            $("#dia_historial_mensual").change(function () {
                if($("#dia_historial_mensual").val() != ''){            
                            $("#error_mensual").empty();
                        }   
                });


                $('#dia_historial_mensual').datetimepicker({
                     format: "MM/YYYY",
                    viewMode: "months", 
                    minViewMode: "months",
                    pickTime: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    maxDate: new Date(),
                }
                });
                //$('#dia_historial_mensual').data("DateTimePicker").disable();

});