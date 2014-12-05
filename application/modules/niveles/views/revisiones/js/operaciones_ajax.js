function modificarEvento(id_evento) {

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

                                 $("#personal_modificar").empty();
                                 $("#asistentes_evento_modificar").empty();


                                var select_empleados;

                                for (var key in data_evento.empleados) {
                                     
                                     select_empleados = select_empleados+'<optgroup label="'+key+'" class="'+key+'">';

                                     data_evento.empleados[key].forEach(function(empleado) {



                                      if((jQuery.inArray(empleado.id_personal, data_evento.asistentes_arreglo)) == (-1))
                                        {
                                         
                                          select_empleados = select_empleados+'<option value="'+empleado.id_personal+'" data-nombre="'+empleado.nombre+'" data-codigo="'+empleado.codigo_empleado+'" data-dpto="'+key+'">'+empleado.nombre+' - '+empleado.codigo_empleado+'</option>';
                                        
                                        }
                                     });

                                     select_empleados = select_empleados+'</optgroup>';
                                  }

                                 $('select#personal_modificar').append(select_empleados);

                                  $(".lista_empleados_modificar optgroup").each(function(){

                                       // alert('hijos: '+$(this).children().length);

                                         if($(this).children().length == 0)
                                                          {
                                                             $(this).hide();                                         
                                                          }    
                                    });

                                  var select_asistentes;

                                  data_evento.asistentes.forEach(function(asistente) {

                                  select_asistentes = select_asistentes+'<option style="margin-left:16px;" value="'+asistente.id_personal+'" data-nombre="'+asistente.nombre+'" data-codigo="'+asistente.codigo_empleado+'" data-dpto="'+asistente.departamento+'">'+asistente.nombre+' - '+asistente.codigo_empleado+'</option>';

                                  });

                                  $('select#asistentes_evento_modificar').append(select_asistentes);


                                       
                             },
                             error: function(xhr, ajaxOptions, thrownError){
                                   //alert(xhr.status+" "+thrownError);
                                   //$("#modal_error").modal('show');
                                                
                                 }
                        });


       


         $('#modificar_evento').modal('show');

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

// $('#asistentes').modal('show');

     

      $("optgroup").each(function(){

                     if($(this).children().length == 0)
                                      {
                                         $(this).hide();                                         
                                      }       
                });


     if($('#errores').val() != '0' && $('#nuevo_bandera').val() == 'nuevo_bandera')
      {
         $('#nuevo_evento').modal('show');
      }


    if($('#errores_modificar').val() != '0' && $('#modificar_bandera').val() == 'modificar_bandera')
      {
          $('#modificar_evento').modal('show');
      }

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
 
        var fecha_actual = date.format('MM/DD/YYYY h:mm a');

        $('#inicio_evento').data("DateTimePicker").setDate(fecha_actual);
       // $('#fin_evento').data("DateTimePicker").setDate(fecha_actual);

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
        $("#tabla_asistentes").empty();
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
                $("#tabla_inicio").append('<i class="fa fa-calendar"></i> '+calEvent.fecha_inicio);
                $("#tabla_fin").append('<i class="fa fa-calendar"></i> '+calEvent.fecha_fin);
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


      //$("#tabla_asistentes").append(calEvent.asistentes[1].nombre);

        if(calEvent.asistentes.length == 0)
          {
              $("#tabla_asistentes").append('<i>No Posee</i>');
          }
        else
          {
              var informacion_asistentes = '<div class="panel panel-default" style="width:400px; height:200px; overflow-y: auto; overflow-x: scroll;"><table class="table table-striped" style="width: 100%;">';

              /* informacion_asistentes = informacion_asistentes+'<thead>';

              informacion_asistentes = informacion_asistentes+'<tr>';

                 informacion_asistentes = informacion_asistentes+'<th><b>Código</b></th>';
                  informacion_asistentes = informacion_asistentes+'<th><b>Nombre</b></th>';
                  informacion_asistentes = informacion_asistentes+'<th><b>Email Personal</b></th>';
                  informacion_asistentes = informacion_asistentes+'<th><b>Email Corporativo</b></th>';
                  informacion_asistentes = informacion_asistentes+'<th><b>Telf Personal</b></th>';
                  informacion_asistentes = informacion_asistentes+'<th><b>Telf Corporativo</b></th>';


               informacion_asistentes = informacion_asistentes+'</tr>';

                informacion_asistentes = informacion_asistentes+'</thead>';*/

               informacion_asistentes = informacion_asistentes+'<tbody>';

              calEvent.asistentes.forEach(function(asistente) {

                  informacion_asistentes = informacion_asistentes+'<tr>';



                  informacion_asistentes = informacion_asistentes+'<td><b>'+asistente.codigo_empleado+'</b></td>';
                  informacion_asistentes = informacion_asistentes+'<td>'+asistente.nombre+'</td>';                  
                  informacion_asistentes = informacion_asistentes+'<td>'+asistente.departamento+'</td>';
                  informacion_asistentes = informacion_asistentes+'<td>'+asistente.email_personal+'</td>';
                  informacion_asistentes = informacion_asistentes+'<td>'+asistente.email_corporativo+'</td>';
                  informacion_asistentes = informacion_asistentes+'<td>'+asistente.tlfn_personal+'</td>';
                  informacion_asistentes = informacion_asistentes+'<td>'+asistente.tlfn_corporativo+'</td>';
                
                  informacion_asistentes = informacion_asistentes+'</tr>';
              });

                 informacion_asistentes = informacion_asistentes+'</tbody>';


              informacion_asistentes = informacion_asistentes+'</table> </div>';

               // $("#tabla_asistentes").append(asistente.nombre);

                $("#tabla_asistentes").append(informacion_asistentes);
          }

        $("#footer_vista_evento").append('<button type="button" onclick="modificarEvento('+calEvent.id+');" class="btn btn-warning"><i class="fa fa-pencil"></i> Modicar</button> <button type="button" onclick="deleteEvento('+calEvent.id+');" class="btn btn-danger"><i class="fa fa-times"></i> Eliminar</button> <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>');
        
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
 // $('#fin_evento').data("DateTimePicker").setMinDate(e.date);
 });
 $("#fin_evento").on("dp.change",function (e) {
 //$('#inicio_evento').data("DateTimePicker").setMaxDate(e.date);
 //$('#fin_evento').val($('#inicio_evento').val());
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


  $('#agregar_asistentes').click(function(){ 

        $('#nuevo_evento').modal('hide');

        
        $('#asistentes').modal('show');
   });


    $('#listo_modal_asistentes').click(function(){ 

        $('#nuevo_evento').modal('show');

                $('select#asistentes_evento option:not(selected)').each(function(){ 

                                    ($this).prop("selected", true);

                                });
   });



     $('#agregar_asistentes_modificar').click(function(){ 

        $('#modificar_evento').modal('hide');

        
        $('#asistentes_modificar').modal('show');
   });


      $('#listo_modal_asistentes_modificar').click(function(){ 

        $('#modificar_evento').modal('show');

        var $checkBox = $('.dual-list .selector');

         if (!$checkBox.hasClass('selected')) {
                    $checkBox.addClass('selected').closest('.well').find('select#asistentes_evento_modificar option:not(selected)').prop("selected", true);
                    $checkBox.addClass('selected').closest('.well').find('select#personal_modificar option:not(selected)').prop("selected", true);
                } 
   });


    
        $('.list-arrows button').click(function () {
                var $button = $(this);
                if ($button.hasClass('move-left')) {

                     options = $('select#asistentes_evento :selected');
                       options.each(     
                                function(){

                                    op = $(this);
                                    
                                     var dpto = $(this).data('dpto');


                                     $(".lista_empleados_nuevo optgroup[label='" +dpto+ "']").append(op);

                                    if($(".lista_empleados_nuevo optgroup[label='" +dpto+ "']").children().length != 0)
                                      {
                                         $(".lista_empleados_nuevo optgroup[label='" +dpto+ "']").show();                                         
                                      }

                                }                               
                            );

                        var $checkBox = $('.dual-list .selector');
                        if ($checkBox.hasClass('selected')){
                              $checkBox.removeClass('selected').closest('.well').find('ul a.active').removeClass('active');
                              $checkBox.children('i').removeClass('fa-check-square-o').addClass('fa-square-o');
                          }
                      

                } else if ($button.hasClass('move-right')) {


                       options = $('select#personal :selected');
                       options.each(     
                                function(){
                                    op = $(this);
                                    $('select#asistentes_evento').append(op);
                                     var dpto = $(this).data('dpto');
                                    if($(".lista_empleados_nuevo optgroup[label='" +dpto+ "']").children().length == 0)
                                      {
                                         $(".lista_empleados_nuevo optgroup[label='" +dpto+ "']").hide();                                         
                                      }
                                      
                                }                               
                            );

                      var $checkBox = $('.dual-list .selector');
                        if ($checkBox.hasClass('selected')){
                              $checkBox.removeClass('selected').closest('.well').find('ul a.active').removeClass('active');
                              $checkBox.children('i').removeClass('fa-check-square-o').addClass('fa-square-o');
                          }

                                        
                }
            });


         $('.dual-list .selector').click(function () {
                 var $checkBox = $(this);
                if (!$checkBox.hasClass('selected')) {
                    $checkBox.addClass('selected').closest('.well').find('.lista_empleados option:not(selected)').prop("selected", true);
                    $checkBox.children('i').removeClass('fa-square-o').addClass('fa-check-square-o');
                } else {
                    $checkBox.removeClass('selected').closest('.well').find('.lista_empleados option:selected').prop("selected", false);
                    $checkBox.children('i').removeClass('fa-check-square-o').addClass('fa-square-o');
                }
            });

            $('[name="SearchDualList"]').keyup(function (e) {
                var code = e.keyCode || e.which;
                if (code == '9') return;
                if (code == '27') $(this).val(null);
                var $rows = $(this).closest('.dual-list').find('.lista_empleados option');
                var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
                $rows.show().filter(function () {
                    var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                    return !~text.indexOf(val);
                }).hide();
            });




             $('.list-arrows button').click(function () {
                var $button = $(this);
                if ($button.hasClass('move-left_modificar')) {

                     options = $('select#asistentes_evento_modificar :selected');
                       options.each(     
                                function(){

                                    op = $(this);
                                    
                                     var dpto = $(this).data('dpto');

                                     $(".lista_empleados_modificar optgroup[label='" +dpto+ "']").append(op);

                                    if($(".lista_empleados_modificar optgroup[label='" +dpto+ "']").children().length != 0)
                                      {
                                         $(".lista_empleados_modificar optgroup[label='" +dpto+ "']").show();                                         
                                      }
                                }                               
                            );

                        var $checkBox = $('.dual-list .selector');
                        if ($checkBox.hasClass('selected')){
                              $checkBox.removeClass('selected').closest('.well').find('ul a.active').removeClass('active');
                              $checkBox.children('i').removeClass('fa-check-square-o').addClass('fa-square-o');
                          }
                      

                } else if ($button.hasClass('move-right_modificar')) {


                       options = $('select#personal_modificar :selected');
                       options.each(     
                                function(){

                                    op = $(this);
                                    $('select#asistentes_evento_modificar').append(op);
                                     var dpto = $(this).data('dpto');

                                    if($(".lista_empleados_modificar optgroup[label='"+dpto+"']").children().length == 0)
                                      {
                                         $(".lista_empleados_modificar optgroup[label='"+dpto+"']").hide();  

                                      }
                                }                               
                            );

                      var $checkBox = $('.dual-list .selector');
                        if ($checkBox.hasClass('selected')){
                              $checkBox.removeClass('selected').closest('.well').find('ul a.active').removeClass('active');
                              $checkBox.children('i').removeClass('fa-check-square-o').addClass('fa-square-o');
                          }

                                        
                }
            });




  
});