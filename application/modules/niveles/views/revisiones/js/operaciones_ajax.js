

$(document).ready(function() {

    //var errores = <?php echo $errores; ?>;
    //$('#myModal').modal('show'); 


     if($('#errores').val() != '0')
      {
          $('#myModal').modal('show');
      }


    // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({
        lang: 'es',
        weekMode: 'variable',
        prevYear: 'left-double-arrow',
        nextYear: 'right-double-arrow',
        header: {
          left: 'prevYear,prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay,nextYear',
                
          
        },

      eventLimit: true,
      timeFormat: 'h(:mm)t',
      axisFormat: 'h a',
      events: './tesis/index.php/niveles_de_servicio/gestion_Revisiones/obtener_eventos',

    /*  events: [
      {
        title: 'All Day Event',
        start: '2014-11-01'
      },
      {
        title: 'Long Event',
        start: '2014-11-07',
        end: '2014-11-10'
      },
      {
        id: 999,
        title: 'Repeating Event',
        start: '2014-11-11T16:00:00'
      },
      {
        id: 999,
        title: 'Repeating Event',
        start: '2014-11-16T16:00:00'
      },
      {
        title: 'Conference',
        start: '2014-11-11',
        end: '2014-11-13'
      },
      {
        title: 'Meeting',
        start: '2014-11-12T10:30:00',
        end: '2014-11-12T12:30:00'
      },
      {
        title: 'Lunch',
        start: '2014-11-12T12:00:00'
      },
      {
        title: 'Meeting',
        start: '2014-11-12T14:30:00'
      },
      {
        title: 'Happy Hour',
        start: '2014-11-12T17:30:00'
      },
      {
        title: 'Dinner',
        start: '2014-11-12T20:00:00'
      },
      {
        title: 'Birthday Party',
        start: '2014-11-13T07:00:00'
      },
      {
        title: 'Click for Google',
        url: 'http://google.com/',
        start: '2014-11-28'
      }
    ],*/



    dayClick: function() { 
 
        //var moment = $('#calendar').fullCalendar('getDate');
        //alert("The current date of the calendar is " + moment.format());
        //alert(moment);
        alert('hola');
    },


     eventClick: function(calEvent, jsEvent, view) {

        //alert('Event: ' + calEvent.title);
        //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
        //alert('View: ' + calEvent.id);

        // change the border color just for fun
        //$(this).css('border-color', 'red');

    },


    });


 $('#inicio_evento').datetimepicker({
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });
 $('#fin_evento').datetimepicker({                     
              icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });
 $("#inicio_evento").on("dp.change",function (e) {
  $('#fin_evento').data("DateTimePicker").setMinDate(e.date);
 });
 $("#fin_evento").on("dp.change",function (e) {
 $('#inicio_evento').data("DateTimePicker").setMaxDate(e.date);
  });


 $('#cancelar_creacion').click(function(){ 

         $("#formulario_evento").fadeOut();
      
   });

 $('#ver_formulario_evento').click(function(){ 


         $("#formulario_evento").fadeIn();
         $("html, body").scrollTop($('#formulario_evento').offset().top);      
   });

 setTimeout(function() {
        $("#message").fadeOut(1500);
    },10000);



});






/*var Script = function () {

//    calender

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    $('#calendar').fullCalendar({      
       height: 500,
        aspectRatio: 0.2,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        timeFormat: {
            agenda: 'h(:mm)t{ - h(:mm)t}',
            '': 'h(:mm)t{-h(:mm)t }'
        },
        monthNames: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ], 
        monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
        dayNames: [ 'Domingo', 'Lunes', 'Martes', 'MiÃƒÂ©rcoles', 'Jueves', 'Viernes', 'SÃ¡bado'],
        dayNamesShort: ['Dom','Lun','Mar','MiÃ©','Jue','Vie','SÃ¡b'],
        firstDay: 1,
        weekends: true,
        buttonText: {
            today: 'hoy',
            month: 'mes',
            week: 'semana',
            day: 'dÃ­a'
           },
        editable: true,
        events: './tesis/index.php/Disponibilidad/json',
        
        eventResize: function(event, dayDelta, minuteDelta, revertFunc, jsEvent)
        {
            $params = {
                'event'         : event.eventos_id,
                'daystart'      : $.fullCalendar.formatDate( event.start, 'yyyy-MM-dd HH:mm:ss'),
                'dayend'        : $.fullCalendar.formatDate( event.end, 'yyyy-MM-dd HH:mm:ss'),
            };
            
            $.ajax({
                url     : './tesis/index.php/Disponibilidad/resize',
                cache   : true,
                type    : 'POST',
                data    : $params,

                beforeSend: function()
                {
                    alert('se va a activar el evento Resize');
                },
                complete: function(response)
                {
                    alert(response.responseText);
                }

            });
        },
        
        eventDrop: function(event, dayDelta, minuteDelta, revertFunc, jsEvent)
        {
            $params = {
                'event'         : event.eventos_id,
                'daystart'      : $.fullCalendar.formatDate( event.start, 'yyyy-MM-dd HH:mm:ss'),
                'dayend'        : $.fullCalendar.formatDate( event.end, 'yyyy-MM-dd HH:mm:ss'),
            };
            
            $.ajax({
                url     : './tesis/index.php/Disponibilidad/drop_event/',
                type    : 'POST',
                data    : $params,
                
                beforeSend: function()
                {
                    alert('se va a activar el evento EventDrop');
                },
                complete: function(response)
                {
                    alert(response.responseText);
                }
            });
        },
        
        eventClick: function(event, dayDelta, minuteDelta, revertFunc, jsEvent) {
            var decision = confirm("Â¿Deseas Borrar eliminar este evento? "+event.title); 
            if (decision) { 
                $params = {
                    'event'         : event.id,
                };
            
                $.ajax({
                    url     : './tesis/index.php/Disponibilidad/delete_event',
                    type    : 'POST',
                    data    : $params,
                    complete: function(response)
                    {
                        alert(response.responseText);
                    }
                });
                $('#calendar').fullCalendar('removeEvents', event.id);

            } else {
                alert('has decidido no borrar '+event.title+' perfecto');
            }
        }
        
    }); // end $calendar
}();*/