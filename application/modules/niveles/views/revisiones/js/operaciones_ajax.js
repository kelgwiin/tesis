function modificarEvento(id_evento) {

          //$("#eliminar").modal('show');
       $('#modal_evento').modal('hide');


       $.ajax({
                 
                            
                            url: config.base+'index.php/niveles/revisiones/obtener_evento',
                            type: 'POST',
                            data: {                         
                                    evento_id : id_evento,                                             
                                  },
                            dataType: 'json',
                            cache : false,  

                             success: function(data_evento){
                                               

                                 $("#nombre_evento_modificar").val(data_evento.title);
                                 $("#dropdown_tipo_evento_modificar").val(data_evento.tipo);
                                 $("#dropdown_tipo_evento_modificar").val(data_evento.tipo);
                                 $("#lugar_evento_modificar").val(data_evento.lugar);

                                 $('#inicio_evento_modificar').val(data_evento.inicio);
                                 $('#fin_evento_modificar').val(data_evento.fin);

                                 $("#descripcion_evento_modificar").val(data_evento.descripcion);

                                 $("#id_evento_modificar").val(data_evento.id);
                                       
                             },
                             error: function(xhr, ajaxOptions, thrownError){
                                   //alert(xhr.status+" "+thrownError);
                                   //$("#modal_error").modal('show');
                                                
                                 }
                        });


       


         $('#modificar_evento').modal('show');
       
       //alert('id evento: '+id_evento);


    }


function deleteEvento(id_evento) {


          $("#modal_evento").modal('hide');

          $("#eliminar").modal('show');
          

          $("#eliminar_confirm").click(function(){

            

                 $.ajax({
                 
                            
                            url: config.base+'index.php/niveles/revisiones/eliminar_evento',
                            type: 'POST',
                            data: {                         
                                    evento_id : id_evento,                                             
                                  },
                            //dataType: 'json',
                            cache : false,  

                             success: function(data){
                                               
                              $("#eliminar").modal('hide');
                              window.location.href = config.base+'index.php/niveles/revisiones/revisiones';
                                       
                             },
                             error: function(xhr, ajaxOptions, thrownError){
                                   //alert(xhr.status+" "+thrownError);
                                   //$("#modal_error").modal('show');
                                                
                                 }
                        });

            });


    }

$(document).ready(function() {



     if($('#errores').val() != '0' && $('#nuevo_bandera').val() == 'nuevo_bandera')
      {
         $('#nuevo_evento').modal('show');
      }


    if($('#errores_modificar').val() != '0' && $('#modificar_bandera').val() == 'modificar_bandera')
      {
          $('#modificar_evento').modal('show');
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


    dayClick: function(date, jsEvent, view) { 
 
        //$('#nuevo_evento').modal('show');

        //alert('Clicked on: ' + date.format('MM/DD/YYYY h:mm A'));

        var fecha_actual = date.format('MM/DD/YYYY h:mm a');

        //alert(fecha_actual);

        $('#inicio_evento').data("DateTimePicker").setDate(fecha_actual);
        $('#fin_evento').data("DateTimePicker").setDate(fecha_actual);

        $('#nuevo_evento').modal('show');
    },


     eventClick: function(calEvent, jsEvent, view) {

           $('#modal_evento').modal('show');

        $("#tabla_nombre").empty();
        $("#tabla_tipo").empty();
        $("#tabla_lugar").empty();
        $("#tabla_inicio").empty();
        $("#tabla_fin").empty();
        $("#tabla_descripcion").empty();
        $("#footer_vista_evento").empty();

        $("#tabla_nombre").append(calEvent.title);


        if(calEvent.tipo == 'vencimiento_ANS')
            {   
                 var posiciones = calEvent.inicio.split(' ');

                $("#tabla_inicio").append('<i class="fa fa-calendar"></i> '+posiciones[0]+' Todo el Día');
                $("#tabla_fin").append('<i class="fa fa-calendar"></i> '+posiciones[0]+' Todo el Día');


            }
        else
            {
                $("#tabla_inicio").append('<i class="fa fa-calendar"></i> '+calEvent.inicio);
                $("#tabla_fin").append('<i class="fa fa-calendar"></i> '+calEvent.fin);
            }

      

        if(calEvent.lugar == '')
        {$("#tabla_lugar").append('<i>No Establecido</i>');}
        else
        {$("#tabla_lugar").append(calEvent.lugar);}

        if(calEvent.tipo == 'revision_ANS')
            {$("#tabla_tipo").append('<span class="label" style="background-color:#42A321;">Revisión de ANS</span>');}

        if(calEvent.tipo == 'renovacion_ANS')
            {$("#tabla_tipo").append('<span class="label" style="background-color:#FF7519;" >Renovación de ANS</span>');}

        if(calEvent.tipo == 'vencimiento_ANS')
            {$("#tabla_tipo").append('<span class="label" style="background-color:#E64545;">Vencimiento de ANS</span>');}

        if(calEvent.tipo == 'reunion')
            {$("#tabla_tipo").append('<span class="label" style="background-color:#3366FF;" >Reunión</span>');}

        if(calEvent.tipo == 'otro')
            {$("#tabla_tipo").append('<span class="label" style="background-color:#8E8E86;" >Otro</span>');}
        
        

        if(calEvent.descripcion == '')
        {$("#tabla_descripcion").append('<i>No Posee</i>');}
        else
        {$("#tabla_descripcion").append(calEvent.descripcion);}


        $("#footer_vista_evento").append('<button type="button" onclick="modificarEvento('+calEvent.id+');" class="btn btn-warning"><i class="fa fa-pencil"></i> Modicar</button> <button type="button" onclick="deleteEvento('+calEvent.id+');" class="btn btn-danger"><i class="fa fa-times"></i> Eliminar</button> <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>');
        
        //alert('Event: ' + calEvent.title);
        //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
        //alert('View: ' + calEvent.id);

        // change the border color just for fun
        //$(this).css('border-color', 'red');

    },


    });


 $('#inicio_evento_modificar').datetimepicker({
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });
 $('#fin_evento_modificar').datetimepicker({                     
              icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
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


 $('#modificar_boton').click(function(){ 

    $('#modificar_evento').modal('hide');
      
   });

  $('#cancelar_modificacion').click(function(){ 

    $('#modificar_evento').modal('show');
      
   });


  $('#cancelar_eliminacion').click(function(){ 

    $('#modal_evento').modal('show');
      
   });


   $('#add_asistente').click(function()
    {
      var id_personal = $('#personal').val();
      var personal = $('#personal option:selected').data('nombre');
      var dpto = $('#personal option:selected').data('dpto');
      var codigo = $('#personal option:selected').data('codigo');
      // alert('id_personal: '+id_personal+' - personal: '+personal+' - dpto: '+dpto);
      if(id_personal != null && id_personal != '')
      {
        $('#personal option:selected').remove();
        $('select[name=asistentes_evento\\[\\]]').append('<option value="'+id_personal+'" data-nombre="'+personal+'" data-codigo="'+codigo+'" data-dpto="'+dpto+'">'+personal+' - '+codigo+'</option>');
      }else
      {
        //alert('Debe seleccionar personal para agregarlo al campo de asistentes_evento de desarrollo');
      }
    });
    
    $('#remove_asistente').click(function()
    {
      var id_personal = $('select[name=asistentes_evento\\[\\]]').val();
      var personal = $('select[name=asistentes_evento\\[\\]] option:selected').data('nombre');
      var dpto = $('select[name=asistentes_evento\\[\\]] option:selected').data('dpto');
      var codigo = $('select[name=asistentes_evento\\[\\]] option:selected').data('codigo');
      // alert('id_personal: '+id_personal+' - personal: '+personal+' - dpto: '+dpto);
      if(id_personal != null && id_personal != '')
      {
        $('select[name=asistentes_evento\\[\\]] option:selected').remove();
        $('#personal optgroup[label="'+dpto+'"]').append('<option style="margin-left:16px;" value="'+id_personal+'" data-nombre="'+personal+'" data-codigo="'+codigo+'" data-dpto="'+dpto+'">'+personal+' - '+codigo+'</option>');
      }else
      {
       // alert('Debe seleccionar personal para removerlo del campo de asistentes_evento de desarrollo');
      }
    });


    $('#agregar_asistentes').click(function(){ 

        $('#nuevo_evento').modal('hide');

        
        $('#asistentes').modal('show');
   });


    $('#listo_modal_asistentes').click(function(){ 

        $('#nuevo_evento').modal('show');
   });

  
});


