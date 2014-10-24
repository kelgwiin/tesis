$(document).ready(function() {

    //Editor de Texto
        tinymce.init({
           selector: "textarea",
           plugins: [
                       " advlist autolink autosave link image lists charmap print preview hr  anchor pagebreak spellchecker",
                       "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
                       "table contextmenu directionality smileys template textcolor paste textcolor colorpicker textpattern"
                    ],
           toolbar1: "bold italic underline strikethrough | bullist numlist outdent indent | fontsizeselect | cut copy paste | link",
           menubar: false,
           toolbar_items_size: 'small',
           language : 'es',
           entity_encoding : "raw"
           });

    //ToolTIP
    $('[data-toggle="popover"]').popover();

    $('body').on('click', function (e) {
        $('[data-toggle="popover"]').each(function () {
            //the 'is' for buttons that trigger popups
            //the 'has' for icons within a button that triggers a popup
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                $(this).popover('hide');
            }
        });
    });

    // Pasos 
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');

    $('#back-step-1').on('click', function(e) {
        
        $("html, body").scrollTop($('#menu_pasos_ans').offset().top);
        $('ul.setup-panel li a[href="#step-1"]').trigger('click');
      
    });

     $('#back-step-2').on('click', function(e) {
        
        $("html, body").scrollTop($('#menu_pasos_ans').offset().top);
        $('ul.setup-panel li a[href="#step-2"]').trigger('click');
      
    });

    $('#back-step-3').on('click', function(e) {
        
        $("html, body").scrollTop($('#menu_pasos_ans').offset().top);
        $('ul.setup-panel li a[href="#step-3"]').trigger('click');
      
    });


    $('#back-step-4').on('click', function(e) {
        
        $("html, body").scrollTop($('#menu_pasos_ans').offset().top);
        $('ul.setup-panel li a[href="#step-4"]').trigger('click');
      
    });
    
    
    $('#activate-step-1').on('click', function(e) {
        $('ul.setup-panel li:eq(1)').removeClass('disabled');
        
         $("html, body").scrollTop($('#menu_pasos_ans').offset().top);
        $('ul.setup-panel li a[href="#step-1"]').trigger('click');
      
    });

    $('#activate-step-2').on('click', function(e) {

        $('ul.setup-panel li:eq(1)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-2"]').trigger('click');
         $("html, body").scrollTop($('#menu_pasos_ans').offset().top);
      
    }) ; 

    
    $('#activate-step-3').on('click', function(e) {
        $('ul.setup-panel li:eq(2)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-3"]').trigger('click');
         $("html, body").scrollTop($('#menu_pasos_ans').offset().top);
      
    });  

    $('#activate-step-4').on('click', function(e) {

      
      if($('.checkbox_dias:checkbox:checked').length < 1)
        {
          $("#error_disponibilidad").empty();
          $("#error_disponibilidad").append('Debe Seleccionar algún Día e ingresar la Hora de Inicio y de Fin');
          $("html, body").scrollTop($('#tabla_disponibilidad').offset().top);     
        }
        if($('.checkbox_dias:checkbox:checked').length > 0)
        {
            bandera = 0;
            $("#error_disponibilidad").empty();
            $(".hora_disponibilidad").each(function(){
                    if( !($(this).is(':disabled')) && ($(this).val() == "") )
                    {
                      bandera = 1;  
                    }                    
                })

            if(bandera == 1)
            {
              $("#error_disponibilidad").append('No debe dejar campos de Hora vacio.');
              $("html, body").scrollTop($('#tabla_disponibilidad').offset().top);

            }
            else{

                bandera4 = 0;
                if ($("#checkbox_lunes").is(":checked"))
                    {
                        var inicio = $('#inicio_lunes').data("DateTimePicker").getDate() ;
                        var fin = $('#fin_lunes').data("DateTimePicker").getDate();
                         if( $('#inicio_lunes').val() ==  $('#fin_lunes').val())
                            {
                                if(($('#inicio_lunes').val() != "12:00 AM") && ($('#fin_lunes').val() != "12:00 AM"))
                                bandera4 = 1;
                            }
                       
                    } 
                if ($("#checkbox_martes").is(":checked"))
                    {
                        var inicio = $('#inicio_martes').data("DateTimePicker").getDate() ;
                        var fin = $('#fin_martes').data("DateTimePicker").getDate();
                         if( $('#inicio_martes').val() ==  $('#fin_martes').val())
                            {
                                if(($('#inicio_martes').val() != "12:00 AM") && ($('#fin_martes').val() != "12:00 AM"))
                                bandera4 = 1;
                            }
                       
                    } 
                  if ($("#checkbox_miercoles").is(":checked"))
                    {
                        var inicio = $('#inicio_miercoles').data("DateTimePicker").getDate() ;
                        var fin = $('#fin_miercoles').data("DateTimePicker").getDate();
                         if( $('#inicio_miercoles').val() ==  $('#fin_miercoles').val())
                            {
                                if(($('#inicio_miercoles').val() != "12:00 AM") && ($('#fin_miercoles').val() != "12:00 AM"))
                                bandera4 = 1;
                            }
                       
                    }
                  if ($("#checkbox_jueves").is(":checked"))
                    {
                        var inicio = $('#inicio_jueves').data("DateTimePicker").getDate() ;
                        var fin = $('#fin_jueves').data("DateTimePicker").getDate();
                         if( $('#inicio_jueves').val() ==  $('#fin_jueves').val())
                            {
                                if(($('#inicio_jueves').val() != "12:00 AM") && ($('#fin_jueves').val() != "12:00 AM"))
                                bandera4 = 1;
                            }
                       
                    }
                    if ($("#checkbox_viernes").is(":checked"))
                    {
                        var inicio = $('#inicio_viernes').data("DateTimePicker").getDate() ;
                        var fin = $('#fin_viernes').data("DateTimePicker").getDate();
                         if( $('#inicio_viernes').val() ==  $('#fin_viernes').val())
                            {
                                if(($('#inicio_viernes').val() != "12:00 AM") && ($('#fin_viernes').val() != "12:00 AM"))
                                bandera4 = 1;
                            }
                       
                    }
                    if ($("#checkbox_sabado").is(":checked"))
                    {
                        var inicio = $('#inicio_sabado').data("DateTimePicker").getDate() ;
                        var fin = $('#fin_sabado').data("DateTimePicker").getDate();
                         if( $('#inicio_sabado').val() ==  $('#fin_sabado').val())
                            {
                                if(($('#inicio_sabado').val() != "12:00 AM") && ($('#fin_sabado').val() != "12:00 AM"))
                                bandera4 = 1;
                            }
                       
                    }
                    if ($("#checkbox_domingo").is(":checked"))
                    {
                        var inicio = $('#inicio_domingo').data("DateTimePicker").getDate() ;
                        var fin = $('#fin_domingo').data("DateTimePicker").getDate();
                         if( $('#inicio_domingo').val() ==  $('#fin_domingo').val())
                            {
                                if(($('#inicio_domingo').val() != "12:00 AM") && ($('#fin_domingo').val() != "12:00 AM"))
                                bandera4 = 1;
                            }
                       
                    }
             
                 if(bandera4 == 1)
                {
                  $("#error_disponibilidad").append('Revise los Campos del Horario. No pueden existir campos de un mismo día con la misma hora. La Hora de Inicio debe ser menor a la de Fin');
                  $("html, body").scrollTop($('#tabla_disponibilidad').offset().top);

                }   

            }  

         }

        if($('.checkbox_dias_mantenimiento:checkbox:checked').length < 1)
        {
          $("#error_mantenimiento").empty();
          $("#error_mantenimiento").append('Debe Seleccionar algún Día e ingresar la Hora de Inicio y de Fin del Mantenimiento');
          if(bandera == 0)
               {
                  $("html, body").scrollTop($('#tabla_mantenimiento').offset().top);   
               }  
        }
        if($('.checkbox_dias_mantenimiento:checkbox:checked').length > 0)
        {
             bandera2 = 0;
            $("#error_mantenimiento").empty();
            $(".hora_mantenimiento").each(function(){
                    if( !($(this).is(':disabled')) && ($(this).val() == "") )
                    {
                      bandera2 = 1;  
                    }                    
                })

            if(bandera2 == 1)
            {
              $("#error_mantenimiento").append('No debe dejar campos de Hora vacio.');
              if(bandera == 0)
               {
                   $("html, body").scrollTop($('#tabla_mantenimiento').offset().top);
               }
            }  
            else{
                 bandera5 = 0;
                if ($("#checkbox_lunes_mantenimiento").is(":checked"))
                    {
                        var inicio = $('#inicio_lunes_mantenimiento').data("DateTimePicker").getDate() ;
                        var fin = $('#fin_lunes_mantenimiento').data("DateTimePicker").getDate();
                         if( $('#inicio_lunes_mantenimiento').val() ==  $('#fin_lunes_mantenimiento').val())
                            {
                                if(($('#inicio_lunes_mantenimiento').val() != "12:00 AM") && ($('#fin_lunes_mantenimiento').val() != "12:00 AM"))
                                bandera5 = 1;
                            }
                       
                    } 
                if ($("#checkbox_martes_mantenimiento").is(":checked"))
                    {
                        var inicio = $('#inicio_martes_mantenimiento').data("DateTimePicker").getDate() ;
                        var fin = $('#fin_martes_mantenimiento').data("DateTimePicker").getDate();
                         if( $('#inicio_martes_mantenimiento').val() ==  $('#fin_martes_mantenimiento').val())
                            {
                                if(($('#inicio_martes_mantenimiento').val() != "12:00 AM") && ($('#fin_martes_mantenimiento').val() != "12:00 AM"))
                                bandera5 = 1;
                            }
                       
                    } 
                  if ($("#checkbox_miercoles_mantenimiento").is(":checked"))
                    {
                        var inicio = $('#inicio_miercoles_mantenimiento').data("DateTimePicker").getDate() ;
                        var fin = $('#fin_miercoles_mantenimiento').data("DateTimePicker").getDate();
                         if( $('#inicio_miercoles_mantenimiento').val() ==  $('#fin_miercoles_mantenimiento').val())
                            {
                                if(($('#inicio_miercoles_mantenimiento').val() != "12:00 AM") && ($('#fin_miercoles_mantenimiento').val() != "12:00 AM"))
                                bandera5 = 1;
                            }
                       
                    }
                  if ($("#checkbox_jueves_mantenimiento").is(":checked"))
                    {
                        var inicio = $('#inicio_jueves_mantenimiento').data("DateTimePicker").getDate() ;
                        var fin = $('#fin_jueves_mantenimiento').data("DateTimePicker").getDate();
                         if( $('#inicio_jueves_mantenimiento').val() ==  $('#fin_jueves_mantenimiento').val())
                            {
                                if(($('#inicio_jueves_mantenimiento').val() != "12:00 AM") && ($('#fin_jueves_mantenimiento').val() != "12:00 AM"))
                                bandera5 = 1;
                            }
                       
                    }
                    if ($("#checkbox_viernes_mantenimiento").is(":checked"))
                    {
                        var inicio = $('#inicio_viernes_mantenimiento').data("DateTimePicker").getDate() ;
                        var fin = $('#fin_viernes_mantenimiento').data("DateTimePicker").getDate();
                         if( $('#inicio_viernes_mantenimiento').val() ==  $('#fin_viernes_mantenimiento').val())
                            {
                                if(($('#inicio_viernes_mantenimiento').val() != "12:00 AM") && ($('#fin_viernes_mantenimiento').val() != "12:00 AM"))
                                bandera5 = 1;
                            }
                       
                    }
                    if ($("#checkbox_sabado_mantenimiento").is(":checked"))
                    {
                        var inicio = $('#inicio_sabado_mantenimiento').data("DateTimePicker").getDate() ;
                        var fin = $('#fin_sabado_mantenimiento').data("DateTimePicker").getDate();
                         if( $('#inicio_sabado_mantenimiento').val() ==  $('#fin_sabado_mantenimiento').val())
                            {
                                if(($('#inicio_sabado_mantenimiento').val() != "12:00 AM") && ($('#fin_sabado_mantenimiento').val() != "12:00 AM"))
                                bandera5 = 1;
                            }
                       
                    }
                    if ($("#checkbox_domingo_mantenimiento").is(":checked"))
                    {
                        var inicio = $('#inicio_domingo_mantenimiento').data("DateTimePicker").getDate() ;
                        var fin = $('#fin_domingo_mantenimiento').data("DateTimePicker").getDate();
                         if( $('#inicio_domingo_mantenimiento').val() ==  $('#fin_domingo_mantenimiento').val())
                            {
                                if(($('#inicio_domingo_mantenimiento').val() != "12:00 AM") && ($('#fin_domingo_mantenimiento').val() != "12:00 AM"))
                                bandera5 = 1;
                            }
                       
                    }
             
                 if(bandera5 == 1)
                {
                  $("#error_mantenimiento").append('Revise los Campos del Horario. No pueden existir campos de un mismo día con la misma hora. La Hora de Inicio debe ser menor a la de Fin');
                  $("html, body").scrollTop($('#tabla_mantenimiento').offset().top);

                }  
            }          
         }

        if($('input[name=options_pregunta]:radio:checked').length < 1)
          {
            $("#error_pregunta").empty();
            $("#error_pregunta").append('Debe Seleccionar una Respuesta');
             if(bandera == 0 && bandera2 == 0)
               {
                  $("html, body").scrollTop($('#dropdown_intervalo_mantenimiento').offset().top);   
               }  
          }

         if($('input[name=options_pregunta]:radio:checked').length > 0)
          { 
            $("#error_pregunta").empty();
            bandera3 = 0;
          }


         if((bandera == 0) && (bandera2 == 0) && (bandera3 == 0) && (bandera4 == 0) && (bandera5 == 0))
         {

              $("#error_disponibilidad").empty();
              $("#error_mantenimiento").empty();
              $("#error_pregunta").empty();
              $('ul.setup-panel li:eq(3)').removeClass('disabled');
              $('ul.setup-panel li a[href="#step-4"]').trigger('click');
              $("html, body").scrollTop($('#menu_pasos_ans').offset().top);
         }
        
    }); 

    $('#activate-step-5').on('click', function(e) {
        $('ul.setup-panel li:eq(4)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-5"]').trigger('click');
         $("html, body").scrollTop($('#menu_pasos_ans').offset().top);
        
    });   
    // END Pasos 

    //DATEPICKER

    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
     
    var checkin = $('#dpd1').datepicker({
      onRender: function(date) {
        return date.valueOf() < now.valueOf() ? 'disabled' : '';
      }
    }).on('changeDate', function(ev) {
      if (ev.date.valueOf() > checkout.date.valueOf()) {
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        checkout.setValue(newDate);
      }
      checkin.hide();
      $('#dpd2')[0].focus();
    }).data('datepicker');
    var checkout = $('#dpd2').datepicker({
      onRender: function(date) {
        return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
      }
    }).on('changeDate', function(ev) {
      checkout.hide();
    }).data('datepicker');

    //END DATEPICKER


     //Seleccion de Horas de disponibilidad del servicio
    $('#inicio_trabajo').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });

    $('#fin_trabajo').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });

     $("#inicio_trabajo").on("dp.change",function (e) {
               $('#fin_trabajo').data("DateTimePicker").setMinDate(e.date);
            });
            $("#fin_trabajo").on("dp.change",function (e) {
              $('#inicio_trabajo').data("DateTimePicker").setMaxDate(e.date);
              $('#fin_trabajo').data("DateTimePicker").setMaxDate(e.date);
            });

    $("#fin_trabajo").click(function () {

       $('#fin_trabajo').data("DateTimePicker").setDate($('#inicio_trabajo').data("DateTimePicker").getDate());
                  
    });  

     $('#inicio_lunes').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });

    $('#fin_lunes').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });

    $("#inicio_lunes").on("dp.change",function (e) {
               $('#fin_lunes').data("DateTimePicker").setMinDate(e.date);
            });
            $("#fin_lunes").on("dp.change",function (e) {
              $('#inicio_lunes').data("DateTimePicker").setMaxDate(e.date);
              $('#fin_lunes').data("DateTimePicker").setMaxDate(e.date);
            });

    $("#fin_lunes").click(function () {

       $('#fin_lunes').data("DateTimePicker").setDate($('#inicio_lunes').data("DateTimePicker").getDate());
                  
    });  


     $('#inicio_martes').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });
      
     $('#fin_martes').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });

    $("#inicio_martes").on("dp.change",function (e) {
               $('#fin_martes').data("DateTimePicker").setMinDate(e.date);
            });
            $("#fin_martes").on("dp.change",function (e) {
              $('#inicio_martes').data("DateTimePicker").setMaxDate(e.date);
              $('#fin_martes').data("DateTimePicker").setMaxDate(e.date);
            });

    $("#fin_martes").click(function () {

       $('#fin_martes').data("DateTimePicker").setDate($('#inicio_martes').data("DateTimePicker").getDate());
                  
    }); 

     $('#inicio_miercoles').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });
      
       $('#fin_miercoles').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });
    $("#inicio_miercoles").on("dp.change",function (e) {
               $('#fin_miercoles').data("DateTimePicker").setMinDate(e.date);
            });
            $("#fin_miercoles").on("dp.change",function (e) {
              $('#inicio_miercoles').data("DateTimePicker").setMaxDate(e.date);
              $('#fin_miercoles').data("DateTimePicker").setMaxDate(e.date);
            });

    $("#fin_miercoles").click(function () {

       $('#fin_miercoles').data("DateTimePicker").setDate($('#inicio_miercoles').data("DateTimePicker").getDate());
                  
    }); 

       $('#inicio_jueves').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });
      
       $('#fin_jueves').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });

       $("#inicio_jueves").on("dp.change",function (e) {
               $('#fin_jueves').data("DateTimePicker").setMinDate(e.date);
            });
            $("#fin_jueves").on("dp.change",function (e) {
              $('#inicio_jueves').data("DateTimePicker").setMaxDate(e.date);
              $('#fin_jueves').data("DateTimePicker").setMaxDate(e.date);
            });

        $("#fin_jueves").click(function () {

           $('#fin_jueves').data("DateTimePicker").setDate($('#inicio_jueves').data("DateTimePicker").getDate());
                      
        }); 

      $('#inicio_viernes').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });
      
       $('#fin_viernes').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });
          $("#inicio_viernes").on("dp.change",function (e) {
                   $('#fin_viernes').data("DateTimePicker").setMinDate(e.date);
                });
                $("#fin_viernes").on("dp.change",function (e) {
                  $('#inicio_viernes').data("DateTimePicker").setMaxDate(e.date);
                  $('#fin_viernes').data("DateTimePicker").setMaxDate(e.date);
                });

        $("#fin_viernes").click(function () {

           $('#fin_viernes').data("DateTimePicker").setDate($('#inicio_viernes').data("DateTimePicker").getDate());
                      
        }); 

        $('#inicio_sabado').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });
      
       $('#fin_sabado').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });

     $("#inicio_sabado").on("dp.change",function (e) {
               $('#fin_sabado').data("DateTimePicker").setMinDate(e.date);
            });
            $("#fin_sabado").on("dp.change",function (e) {
              $('#inicio_sabado').data("DateTimePicker").setMaxDate(e.date);
              $('#fin_sabado').data("DateTimePicker").setMaxDate(e.date);
            });

    $("#fin_sabado").click(function () {

       $('#fin_sabado').data("DateTimePicker").setDate($('#inicio_sabado').data("DateTimePicker").getDate());
                  
    }); 

      $('#inicio_domingo').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });
      
       $('#fin_domingo').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });

     $("#inicio_domingo").on("dp.change",function (e) {
               $('#fin_domingo').data("DateTimePicker").setMinDate(e.date);
            });
            $("#fin_domingo").on("dp.change",function (e) {
              $('#inicio_domingo').data("DateTimePicker").setMaxDate(e.date);
              $('#fin_domingo').data("DateTimePicker").setMaxDate(e.date);
            });

    $("#fin_domingo").click(function () {

       $('#fin_domingo').data("DateTimePicker").setDate($('#inicio_domingo').data("DateTimePicker").getDate());
                  
    }); 

    // Desactivar todos los timepicker por defecto  
    $("#inicio_trabajo").prop('disabled', true); 
    $("#fin_trabajo").prop('disabled', true);


    $("#inicio_lunes").prop('disabled', true); 
    $("#fin_lunes").prop('disabled', true); 

    $("#inicio_martes").prop('disabled', true); 
    $("#fin_martes").prop('disabled', true);

     $("#inicio_miercoles").prop('disabled', true); 
    $("#fin_miercoles").prop('disabled', true);

     $("#inicio_jueves").prop('disabled', true); 
    $("#fin_jueves").prop('disabled', true);

     $("#inicio_viernes").prop('disabled', true); 
    $("#fin_viernes").prop('disabled', true);

     $("#inicio_sabado").prop('disabled', true); 
    $("#fin_sabado").prop('disabled', true);

     $("#inicio_domingo").prop('disabled', true); 
    $("#fin_domingo").prop('disabled', true);

     $("#boton_asignar_horario").prop('disabled', true);


    // Opciones de radio buttons

    //Menu de dias
    $("input[name=options_dias]:radio").change(function () {
        
        //$('.checkbox_dias').prop('checked', false).change();

        if ($('#options_dias_1').is(":checked"))
        {
            $('.checkbox_dias').prop('checked', true).change();
            $(".hora_disponibilidad").each(function(){
                   if(!this.disabled)
                   {
                        $(this).val('12:00 AM');
                   }
                })
        }

         if ($('#options_dias_2').is(":checked"))
        {
            $('.checkbox_dias').prop('checked', true).change();
        }

         if ($('#options_dias_3').is(":checked"))
        {
            $('#checkbox_lunes').prop('checked', true).change();
            $('#checkbox_martes').prop('checked', true).change();
            $('#checkbox_miercoles').prop('checked', true).change();
            $('#checkbox_jueves').prop('checked', true).change();
            $('#checkbox_viernes').prop('checked', true).change();
             $('#checkbox_sabado').prop('checked', false).change();
              $('#checkbox_domingo').prop('checked', false).change();
        }

           if ($('#options_dias_4').is(":checked"))
        { 
             //$(".hora_disponibilidad").val('');
            $('.checkbox_dias').prop('checked', false).change();
        }
    });

    //Menu de horas
     $("input[name=options_horas]:radio").change(function () {
        
        //$('.checkbox_dias').prop('checked', false).change();
        if($('.checkbox_dias:checkbox:checked').length > 0)
        {
             $('#inicio_trabajo').prop('disabled', true);
             $('#fin_trabajo').prop('disabled', true);
             $('#boton_asignar_horario').prop('disabled', true);

            if ($('#options_horas_1').is(":checked"))
             {
                $(".hora_disponibilidad").each(function(){
                   if(!this.disabled)
                   {
                        $(this).val('12:00 AM');
                   }
                })
             }
            if ($('#options_horas_2').is(":checked"))
             {
                $(".hora_inicio").each(function(){
                   if(!this.disabled)
                   {
                        $(this).val('12:00 AM');
                   }
                })

                $(".hora_fin").each(function(){
                   if(!this.disabled)
                   {
                        $(this).val('12:00 PM');
                   }
                })

             }
             if ($('#options_horas_3').is(":checked"))
             {
                 $(".hora_inicio").each(function(){
                   if(!this.disabled)
                   {
                        $(this).val('12:00 PM');
                   }
                })

                $(".hora_fin").each(function(){
                   if(!this.disabled)
                   {
                        $(this).val('12:00 AM');
                   }
                })

             }
            if ($('#options_horas_4').is(":checked"))
             {
                $('#inicio_trabajo').prop('disabled', false);
                $('#fin_trabajo').prop('disabled', false);
                $('#boton_asignar_horario').prop('disabled', false);
             }
            if ($('#options_horas_5').is(":checked"))
             {
                $(".hora_disponibilidad").val('');
             }
            
        }
        else
        {
          
            $('#options_horas_5').prop('checked', true)
            $('#modal_seleccione_dia').modal('show');

            
        }
    });

     // END Opciones de radio buttons
    
     //Click añadir horario de trabajo
       $("#boton_asignar_horario").click( function () {

        $(".hora_inicio").each(function(){
                   if(!this.disabled)
                   {
                        $(this).val($('#inicio_trabajo').val());
                   }
                })

                $(".hora_fin").each(function(){
                   if(!this.disabled)
                   {
                        $(this).val($('#fin_trabajo').val());
                   }
                })
        
    });



    if ($("#checkbox_lunes").is(":checked"))
          {
            $("#inicio_lunes").prop('disabled', false); 
            $("#fin_lunes").prop('disabled', false); 
          }
     if ($("#checkbox_martes").is(":checked"))
          {
            $("#inicio_martes").prop('disabled', false); 
            $("#fin_martes").prop('disabled', false); 
          }
     if ($("#checkbox_miercoles").is(":checked"))
          {
            $("#inicio_miercoles").prop('disabled', false); 
            $("#fin_miercoles").prop('disabled', false); 
          }
    if ($("#checkbox_jueves").is(":checked"))
          {
            $("#inicio_jueves").prop('disabled', false); 
            $("#fin_jueves").prop('disabled', false); 
          }
     if ($("#checkbox_viernes").is(":checked"))
          {
            $("#inicio_viernes").prop('disabled', false); 
            $("#fin_viernes").prop('disabled', false); 
          }
      if ($("#checkbox_sabado").is(":checked"))
          {
            $("#inicio_sabado").prop('disabled', false); 
            $("#fin_sabado").prop('disabled', false); 
          }
       if ($("#checkbox_domingo").is(":checked"))
          {
            $("#inicio_domingo").prop('disabled', false); 
            $("#fin_domingo").prop('disabled', false); 
          }           
        if ($('#options_horas_4').is(":checked"))
             {
                $('#inicio_trabajo').prop('disabled', false);
                $('#fin_trabajo').prop('disabled', false);
                $('#boton_asignar_horario').prop('disabled', false);
             }






    $("#checkbox_lunes").change(function () {
        if (!$(this).is(":checked"))
          {
              $("#inicio_lunes").prop('disabled', true); 
              $("#fin_lunes").prop('disabled', true); 
              $("#inicio_lunes").val(''); 
              $("#fin_lunes").val('');         
          }
        else
          {
            $("#inicio_lunes").prop('disabled', false); 
            $("#fin_lunes").prop('disabled', false); 

                
          }
    });


    $("#checkbox_martes").change(function () {
        if (!$(this).is(":checked"))
          {
              $("#inicio_martes").prop('disabled', true); 
              $("#fin_martes").prop('disabled', true);  
              $("#inicio_martes").val(''); 
              $("#fin_martes").val('');       
          }
        else
          {
            $("#inicio_martes").prop('disabled', false); 
            $("#fin_martes").prop('disabled', false);   
                 
          }
    });

    $("#checkbox_miercoles").change(function () {
        if (!$(this).is(":checked"))
          {
              $("#inicio_miercoles").prop('disabled', true); 
              $("#fin_miercoles").prop('disabled', true);   
              $("#inicio_miercoles").val(''); 
              $("#fin_miercoles").val('');       
          }
        else
          {
            $("#inicio_miercoles").prop('disabled', false); 
            $("#fin_miercoles").prop('disabled', false);      
              
          }
    });

  $("#checkbox_jueves").change(function () {
        if (!$(this).is(":checked"))
          {
              $("#inicio_jueves").prop('disabled', true); 
              $("#fin_jueves").prop('disabled', true); 
              $("#inicio_jueves").val(''); 
              $("#fin_jueves").val('');         
          }
        else
          {
            $("#inicio_jueves").prop('disabled', false); 
            $("#fin_jueves").prop('disabled', false);  
             

          }
    });

  $("#checkbox_viernes").change(function () {
        if (!$(this).is(":checked"))
          {
              $("#inicio_viernes").prop('disabled', true); 
              $("#fin_viernes").prop('disabled', true); 
              $("#inicio_viernes").val(''); 
              $("#fin_viernes").val('');         
          }
        else
          {
            $("#inicio_viernes").prop('disabled', false); 
            $("#fin_viernes").prop('disabled', false);   
                 
          }
    });

   $("#checkbox_sabado").change(function () {
        if (!$(this).is(":checked"))
          {
              $("#inicio_sabado").prop('disabled', true); 
              $("#fin_sabado").prop('disabled', true);
              $("#inicio_sabado").val(''); 
              $("#fin_sabado").val('');          
          }
        else
          {
            $("#inicio_sabado").prop('disabled', false); 
            $("#fin_sabado").prop('disabled', false);  
                  
          }
    });

   $("#checkbox_domingo").change(function () {
        if (!$(this).is(":checked"))
          {
              $("#inicio_domingo").prop('disabled', true); 
              $("#fin_domingo").prop('disabled', true);  
              $("#inicio_domingo").val(''); 
              $("#fin_domingo").val('');        
          }
        else
          {
            $("#inicio_domingo").prop('disabled', false); 
            $("#fin_domingo").prop('disabled', false); 
                   
          }
    });  



   //Seleccion de Horas de Mantenimiento del servicio


    $('#inicio_mantenimiento').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });

    $('#fin_mantenimiento').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });

    $("#inicio_mantenimiento").on("dp.change",function (e) {
               $('#fin_mantenimiento').data("DateTimePicker").setMinDate(e.date);
            });
            $("#fin_mantenimiento").on("dp.change",function (e) {
              $('#inicio_mantenimiento').data("DateTimePicker").setMaxDate(e.date);
              $('#fin_mantenimiento').data("DateTimePicker").setMaxDate(e.date);
            });

    $("#fin_mantenimiento").click(function () {

       $('#fin_mantenimiento').data("DateTimePicker").setDate($('#inicio_mantenimiento').data("DateTimePicker").getDate());
                  
    });  

     $('#inicio_lunes_mantenimiento').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });

    $('#fin_lunes_mantenimiento').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });


    $("#inicio_lunes_mantenimiento").on("dp.change",function (e) {
               $('#fin_lunes_mantenimiento').data("DateTimePicker").setMinDate(e.date);
            });
            $("#fin_lunes_mantenimiento").on("dp.change",function (e) {
              $('#inicio_lunes_mantenimiento').data("DateTimePicker").setMaxDate(e.date);
              $('#fin_lunes_mantenimiento').data("DateTimePicker").setMaxDate(e.date);
            });

    $("#fin_lunes_mantenimiento").click(function () {

       $('#fin_lunes_mantenimiento').data("DateTimePicker").setDate($('#inicio_lunes_mantenimiento').data("DateTimePicker").getDate());
                  
    });


     $('#inicio_martes_mantenimiento').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });
      
     $('#fin_martes_mantenimiento').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });

     $("#inicio_martes_mantenimiento").on("dp.change",function (e) {
               $('#fin_martes_mantenimiento').data("DateTimePicker").setMinDate(e.date);
            });
            $("#fin_martes_mantenimiento").on("dp.change",function (e) {
              $('#inicio_martes_mantenimiento').data("DateTimePicker").setMaxDate(e.date);
              $('#fin_martes_mantenimiento').data("DateTimePicker").setMaxDate(e.date);
            });

    $("#fin_martes_mantenimiento").click(function () {

       $('#fin_martes_mantenimiento').data("DateTimePicker").setDate($('#inicio_martes_mantenimiento').data("DateTimePicker").getDate());
                  
    });

     $('#inicio_miercoles_mantenimiento').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });
      
       $('#fin_miercoles_mantenimiento').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });
       $("#inicio_miercoles_mantenimiento").on("dp.change",function (e) {
               $('#fin_miercoles_mantenimiento').data("DateTimePicker").setMinDate(e.date);
            });
            $("#fin_miercoles_mantenimiento").on("dp.change",function (e) {
              $('#inicio_miercoles_mantenimiento').data("DateTimePicker").setMaxDate(e.date);
              $('#fin_miercoles_mantenimiento').data("DateTimePicker").setMaxDate(e.date);
            });

    $("#fin_miercoles_mantenimiento").click(function () {

       $('#fin_miercoles_mantenimiento').data("DateTimePicker").setDate($('#inicio_miercoles_mantenimiento').data("DateTimePicker").getDate());
                  
    });

       $('#inicio_jueves_mantenimiento').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });
      
       $('#fin_jueves_mantenimiento').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });
     $("#inicio_jueves_mantenimiento").on("dp.change",function (e) {
               $('#fin_jueves_mantenimiento').data("DateTimePicker").setMinDate(e.date);
            });
            $("#fin_jueves_mantenimiento").on("dp.change",function (e) {
              $('#inicio_jueves_mantenimiento').data("DateTimePicker").setMaxDate(e.date);
              $('#fin_jueves_mantenimiento').data("DateTimePicker").setMaxDate(e.date);
            });

    $("#fin_jueves_mantenimiento").click(function () {

       $('#fin_jueves_mantenimiento').data("DateTimePicker").setDate($('#inicio_jueves_mantenimiento').data("DateTimePicker").getDate());
                  
    });

      $('#inicio_viernes_mantenimiento').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });
      
       $('#fin_viernes_mantenimiento').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });

        $("#inicio_viernes_mantenimiento").on("dp.change",function (e) {
               $('#fin_viernes_mantenimiento').data("DateTimePicker").setMinDate(e.date);
            });
            $("#fin_viernes_mantenimiento").on("dp.change",function (e) {
              $('#inicio_viernes_mantenimiento').data("DateTimePicker").setMaxDate(e.date);
              $('#fin_viernes_mantenimiento').data("DateTimePicker").setMaxDate(e.date);
            });

        $("#fin_viernes_mantenimiento").click(function () {

           $('#fin_viernes_mantenimiento').data("DateTimePicker").setDate($('#inicio_viernes_mantenimiento').data("DateTimePicker").getDate());
                      
        });

        $('#inicio_sabado_mantenimiento').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });
      
       $('#fin_sabado_mantenimiento').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });
      $("#inicio_sabado_mantenimiento").on("dp.change",function (e) {
               $('#fin_sabado_mantenimiento').data("DateTimePicker").setMinDate(e.date);
            });
            $("#fin_sabado_mantenimiento").on("dp.change",function (e) {
              $('#inicio_sabado_mantenimiento').data("DateTimePicker").setMaxDate(e.date);
              $('#fin_sabado_mantenimiento').data("DateTimePicker").setMaxDate(e.date);
            });

        $("#fin_sabado_mantenimiento").click(function () {

           $('#fin_sabado_mantenimiento').data("DateTimePicker").setDate($('#inicio_sabado_mantenimiento').data("DateTimePicker").getDate());
                      
        });

      $('#inicio_domingo_mantenimiento').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });
      
       $('#fin_domingo_mantenimiento').datetimepicker({
                    pickDate: false,
                     icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down"
                }
                });
    $("#inicio_domingo_mantenimiento").on("dp.change",function (e) {
               $('#fin_domingo_mantenimiento').data("DateTimePicker").setMinDate(e.date);
            });
            $("#fin_domingo_mantenimiento").on("dp.change",function (e) {
              $('#inicio_domingo_mantenimiento').data("DateTimePicker").setMaxDate(e.date);
              $('#fin_domingo_mantenimiento').data("DateTimePicker").setMaxDate(e.date);
            });

        $("#fin_domingo_mantenimiento").click(function () {

           $('#fin_domingo_mantenimiento').data("DateTimePicker").setDate($('#inicio_domingo_mantenimiento').data("DateTimePicker").getDate());
                      
        });

        // Desactivar todos los timepicker por defecto  
    $("#inicio_mantenimiento").prop('disabled', true); 
    $("#fin_mantenimiento").prop('disabled', true);

    $("#inicio_lunes_mantenimiento").prop('disabled', true); 
    $("#fin_lunes_mantenimiento").prop('disabled', true); 

    $("#inicio_martes_mantenimiento").prop('disabled', true); 
    $("#fin_martes_mantenimiento").prop('disabled', true);

     $("#inicio_miercoles_mantenimiento").prop('disabled', true); 
    $("#fin_miercoles_mantenimiento").prop('disabled', true);

     $("#inicio_jueves_mantenimiento").prop('disabled', true); 
    $("#fin_jueves_mantenimiento").prop('disabled', true);

     $("#inicio_viernes_mantenimiento").prop('disabled', true); 
    $("#fin_viernes_mantenimiento").prop('disabled', true);

     $("#inicio_sabado_mantenimiento").prop('disabled', true); 
    $("#fin_sabado_mantenimiento").prop('disabled', true);

     $("#inicio_domingo_mantenimiento").prop('disabled', true); 
    $("#fin_domingo_mantenimiento").prop('disabled', true);

     $("#boton_asignar_horario_mantenimiento").prop('disabled', true);



     if ($("#checkbox_lunes_mantenimiento").is(":checked"))
          {
            $("#inicio_lunes_mantenimiento").prop('disabled', false); 
            $("#fin_lunes_mantenimiento").prop('disabled', false); 
          }
     if ($("#checkbox_martes_mantenimiento").is(":checked"))
          {
            $("#inicio_martes_mantenimiento").prop('disabled', false); 
            $("#fin_martes_mantenimiento").prop('disabled', false); 
          }
     if ($("#checkbox_miercoles_mantenimiento").is(":checked"))
          {
            $("#inicio_miercoles_mantenimiento").prop('disabled', false); 
            $("#fin_miercoles_mantenimiento").prop('disabled', false); 
          }
    if ($("#checkbox_jueves_mantenimiento").is(":checked"))
          {
            $("#inicio_jueves_mantenimiento").prop('disabled', false); 
            $("#fin_jueves_mantenimiento").prop('disabled', false); 
          }
     if ($("#checkbox_viernes_mantenimiento").is(":checked"))
          {
            $("#inicio_viernes_mantenimiento").prop('disabled', false); 
            $("#fin_viernes_mantenimiento").prop('disabled', false); 
          }
      if ($("#checkbox_sabado_mantenimiento").is(":checked"))
          {
            $("#inicio_sabado_mantenimiento").prop('disabled', false); 
            $("#fin_sabado_mantenimiento").prop('disabled', false); 
          }
       if ($("#checkbox_domingo_mantenimiento").is(":checked"))
          {
            $("#inicio_domingo_mantenimiento").prop('disabled', false); 
            $("#fin_domingo_mantenimiento").prop('disabled', false); 
          }  

      if($('.checkbox_dias_mantenimiento:checkbox:checked').length > 0)
        {
          $('#inicio_mantenimiento').prop('disabled', false);
          $('#fin_mantenimiento').prop('disabled', false);
          $('#boton_asignar_horario_mantenimiento').prop('disabled', false);  
        }


     $("#checkbox_lunes_mantenimiento").change(function () {
        if (!$(this).is(":checked"))
          {
              $("#inicio_lunes_mantenimiento").prop('disabled', true); 
              $("#fin_lunes_mantenimiento").prop('disabled', true); 
              $("#inicio_lunes_mantenimiento").val(''); 
              $("#fin_lunes_mantenimiento").val('');         
          }
        else
          {
            $("#inicio_lunes_mantenimiento").prop('disabled', false); 
            $("#fin_lunes_mantenimiento").prop('disabled', false);  

             $('#inicio_mantenimiento').prop('disabled', false);
            $('#fin_mantenimiento').prop('disabled', false);
            $('#boton_asignar_horario_mantenimiento').prop('disabled', false);      
          }
    });


    $("#checkbox_martes_mantenimiento").change(function () {
        if (!$(this).is(":checked"))
          {
              $("#inicio_martes_mantenimiento").prop('disabled', true); 
              $("#fin_martes_mantenimiento").prop('disabled', true);  
              $("#inicio_martes_mantenimiento").val(''); 
              $("#fin_martes_mantenimiento").val('');       
          }
        else
          {
            $("#inicio_martes_mantenimiento").prop('disabled', false); 
            $("#fin_martes_mantenimiento").prop('disabled', false);  
             $('#inicio_mantenimiento').prop('disabled', false);
            $('#fin_mantenimiento').prop('disabled', false);
            $('#boton_asignar_horario_mantenimiento').prop('disabled', false);      
          }
    });

    $("#checkbox_miercoles_mantenimiento").change(function () {
        if (!$(this).is(":checked"))
          {
              $("#inicio_miercoles_mantenimiento").prop('disabled', true); 
              $("#fin_miercoles_mantenimiento").prop('disabled', true);   
              $("#inicio_miercoles_mantenimiento").val(''); 
              $("#fin_miercoles_mantenimiento").val('');       
          }
        else
          {
            $("#inicio_miercoles_mantenimiento").prop('disabled', false); 
            $("#fin_miercoles_mantenimiento").prop('disabled', false);   
             $('#inicio_mantenimiento').prop('disabled', false);
            $('#fin_mantenimiento').prop('disabled', false);
            $('#boton_asignar_horario_mantenimiento').prop('disabled', false);     
          }
    });

  $("#checkbox_jueves_mantenimiento").change(function () {
        if (!$(this).is(":checked"))
          {
              $("#inicio_jueves_mantenimiento").prop('disabled', true); 
              $("#fin_jueves_mantenimiento").prop('disabled', true); 
              $("#inicio_jueves_mantenimiento").val(''); 
              $("#fin_jueves_mantenimiento").val('');         
          }
        else
          {
            $("#inicio_jueves_mantenimiento").prop('disabled', false); 
            $("#fin_jueves_mantenimiento").prop('disabled', false);  
             $('#inicio_mantenimiento').prop('disabled', false);
            $('#fin_mantenimiento').prop('disabled', false);
            $('#boton_asignar_horario_mantenimiento').prop('disabled', false); 

          }
    });

  $("#checkbox_viernes_mantenimiento").change(function () {
        if (!$(this).is(":checked"))
          {
              $("#inicio_viernes_mantenimiento").prop('disabled', true); 
              $("#fin_viernes_mantenimiento").prop('disabled', true); 
              $("#inicio_viernes_mantenimiento").val(''); 
              $("#fin_viernes_mantenimiento").val('');         
          }
        else
          {
            $("#inicio_viernes_mantenimiento").prop('disabled', false); 
            $("#fin_viernes_mantenimiento").prop('disabled', false); 
             $('#inicio_mantenimiento').prop('disabled', false);
            $('#fin_mantenimiento').prop('disabled', false);
            $('#boton_asignar_horario_mantenimiento').prop('disabled', false);       
          }
    });

   $("#checkbox_sabado_mantenimiento").change(function () {
        if (!$(this).is(":checked"))
          {
              $("#inicio_sabado_mantenimiento").prop('disabled', true); 
              $("#fin_sabado_mantenimiento").prop('disabled', true);
              $("#inicio_sabado_mantenimiento").val(''); 
              $("#fin_sabado_mantenimiento").val('');          
          }
        else
          {
            $("#inicio_sabado_mantenimiento").prop('disabled', false); 
            $("#fin_sabado_mantenimiento").prop('disabled', false);  
             $('#inicio_mantenimiento').prop('disabled', false);
            $('#fin_mantenimiento').prop('disabled', false);
            $('#boton_asignar_horario_mantenimiento').prop('disabled', false);      
          }
    });

   $("#checkbox_domingo_mantenimiento").change(function () {
        if (!$(this).is(":checked"))
          {
              $("#inicio_domingo_mantenimiento").prop('disabled', true); 
              $("#fin_domingo_mantenimiento").prop('disabled', true);  
              $("#inicio_domingo_mantenimiento").val(''); 
              $("#fin_domingo_mantenimiento").val('');        
          }
        else
          {
            $("#inicio_domingo_mantenimiento").prop('disabled', false); 
            $("#fin_domingo_mantenimiento").prop('disabled', false);   
             $('#inicio_mantenimiento').prop('disabled', false);
            $('#fin_mantenimiento').prop('disabled', false);
            $('#boton_asignar_horario_mantenimiento').prop('disabled', false);     
          }
    });  


   $(".checkbox_dias_mantenimiento").change(function () {

       if($('.checkbox_dias_mantenimiento:checkbox:checked').length < 1)
        {
          $('#inicio_mantenimiento').prop('disabled', true);
          $('#fin_mantenimiento').prop('disabled', true);
          $('#boton_asignar_horario_mantenimiento').prop('disabled', true);  
        }
       
    });

   //Menu de dias de mantenimiento

    $("input[name=options_dias_mantenimiento]:radio").change(function () {
        
        //$('.checkbox_dias').prop('checked', false).change();

        if ($('#options_dias_mantenimiento_1').is(":checked"))
        {
            $('.checkbox_dias_mantenimiento').prop('checked', true).change();
        }

         if ($('#options_dias_mantenimiento_2').is(":checked"))
        {
            $('#checkbox_lunes_mantenimiento').prop('checked', true).change();
            $('#checkbox_martes_mantenimiento').prop('checked', true).change();
            $('#checkbox_miercoles_mantenimiento').prop('checked', true).change();
            $('#checkbox_jueves_mantenimiento').prop('checked', true).change();
            $('#checkbox_viernes_mantenimiento').prop('checked', true).change();
             $('#checkbox_sabado_mantenimiento').prop('checked', false).change();
              $('#checkbox_domingo_mantenimiento').prop('checked', false).change();
            
        }

         if ($('#options_dias_mantenimiento_3').is(":checked"))
        {
            $('#checkbox_lunes_mantenimiento').prop('checked', false).change();
            $('#checkbox_martes_mantenimiento').prop('checked',false).change();
            $('#checkbox_miercoles_mantenimiento').prop('checked', false).change();
            $('#checkbox_jueves_mantenimiento').prop('checked', false).change();
            $('#checkbox_viernes_mantenimiento').prop('checked', true).change();
             $('#checkbox_sabado_mantenimiento').prop('checked', true).change();
              $('#checkbox_domingo_mantenimiento').prop('checked', true).change();
        }

           if ($('#options_dias_mantenimiento_4').is(":checked"))
        { 
             //$(".hora_disponibilidad").val('');
            $('.checkbox_dias_mantenimiento').prop('checked', false).change();
        }
    });



  //Click añadir horario de trabajo
       $("#boton_asignar_horario_mantenimiento").click( function () {

        $(".hora_inicio_mantenimiento").each(function(){
                   if(!this.disabled)
                   {
                        $(this).val($('#inicio_mantenimiento').val());
                   }
                })

                $(".hora_fin_mantenimiento").each(function(){
                   if(!this.disabled)
                   {
                        $(this).val($('#fin_mantenimiento').val());
                   }
                })
        
    });


    //Desactivar maximos y minimos confiabilidad
    $("#minimo_caida").prop('disabled', true); 
    $("#maximo_caida").prop('disabled', true);
    $("#minimo_duracion_caida").prop('disabled', true); 
    $("#maximo_duracion_caida").prop('disabled', true);
    $("#minimo_duracion_respuesta").prop('disabled', true); 
    $("#maximo_duracion_respuesta").prop('disabled', true);
     $("#minimo_duracion_restauracion").prop('disabled', true); 
    $("#maximo_duracion_restauracion").prop('disabled', true);



   $("#dropdown_unidad_medida").change(function () {
          
          if($("#dropdown_unidad_medida").val() != 'seleccione')
          {
              $("#minimo_caida").prop('disabled', false); 
              $("#maximo_caida").prop('disabled', false);
          }
          else
          {
            $("#minimo_caida").prop('disabled', true); 
            $("#maximo_caida").prop('disabled', true);
          }

    });


     $("#dropdown_unidad_tiempo").change(function () {
          
          if($("#dropdown_unidad_tiempo").val() != 'seleccione')
          {
              $("#minimo_duracion_caida").prop('disabled', false); 
              $("#maximo_duracion_caida").prop('disabled', false)
          }
          else
          {
            $("#minimo_duracion_caida").prop('disabled', true); 
             $("#maximo_duracion_caida").prop('disabled', true);
          }

    });


        $("#dropdown_tiempo_respuesta").change(function () {
          
          if($("#dropdown_tiempo_respuesta").val() != 'seleccione')
          {
              $("#minimo_duracion_respuesta").prop('disabled', false); 
              $("#maximo_duracion_respuesta").prop('disabled', false)
          }
          else
          {
            $("#minimo_duracion_respuesta").prop('disabled', true); 
             $("#maximo_duracion_respuesta").prop('disabled', true);
          }

    });


        $("#dropdown_unidad_tiempo_restauracion").change(function () {
          
          if($("#dropdown_unidad_tiempo_restauracion").val() != 'seleccione')
          {
              $("#minimo_duracion_restauracion").prop('disabled', false); 
              $("#maximo_duracion_restauracion").prop('disabled', false)
          }
          else
          {
            $("#minimo_duracion_restauracion").prop('disabled', true); 
             $("#maximo_duracion_restauracion").prop('disabled', true);
          }

    });

      if($("#dropdown_unidad_medida").val() != 'seleccione')
          {
              $("#minimo_caida").prop('disabled', false); 
              $("#maximo_caida").prop('disabled', false);
          }

      if($("#dropdown_unidad_tiempo").val() != 'seleccione')
          {
              $("#minimo_duracion_caida").prop('disabled', false); 
              $("#maximo_duracion_caida").prop('disabled', false)
          }
        if($("#dropdown_tiempo_respuesta").val() != 'seleccione')
          {
              $("#minimo_duracion_respuesta").prop('disabled', false); 
              $("#maximo_duracion_respuesta").prop('disabled', false)
          }
      if($("#dropdown_unidad_tiempo_restauracion").val() != 'seleccione')
          {
              $("#minimo_duracion_restauracion").prop('disabled', false); 
              $("#maximo_duracion_restauracion").prop('disabled', false)
          }



   
     
      
});

