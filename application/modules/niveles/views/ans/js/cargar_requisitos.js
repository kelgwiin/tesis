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

$(document).ready(function() {


  $('#cargar_requisito').click(function(){


         if($('#dropdown_requisitos').val() == 'seleccione')
            {
                $("#error_requisitos").append('Por favor Seleccione un Requisito.');
            }
        else
            {
                $("#error_requisitos").empty();


                
                                 $("#error_requisitos").empty();
                                 $('#checkbox_lunes').prop('checked', false).change();
                                 $('#checkbox_martes').prop('checked', false).change();
                                 $('#checkbox_miercoles').prop('checked', false).change();
                                 $('#checkbox_jueves').prop('checked', false).change();
                                 $('#checkbox_viernes').prop('checked', false).change();
                                 $('#checkbox_sabado').prop('checked', false).change();
                                 $('#checkbox_domingo').prop('checked', false).change();

                                  $('#porcentaje_disponibilidad').val('');

                                 $('#checkbox_lunes_mantenimiento').prop('checked', false).change();
                                 $('#checkbox_martes_mantenimiento').prop('checked', false).change();
                                 $('#checkbox_miercoles_mantenimiento').prop('checked', false).change();
                                 $('#checkbox_jueves_mantenimiento').prop('checked', false).change();
                                 $('#checkbox_viernes_mantenimiento').prop('checked', false).change();
                                 $('#checkbox_sabado_mantenimiento').prop('checked', false).change();
                                 $('#checkbox_domingo_mantenimiento').prop('checked', false).change();

                                 $('#dropdown_intervalo_mantenimiento').val('seleccione');

                                 $('#options_pregunta_1').prop('checked', false);
                                 $('#options_pregunta_2').prop('checked', false);

                                 // tinymce.get('complemento_disponibilidad').setContent('');

                                 $('#dropdown_unidad_medida').val('seleccione');
                                                          $("#minimo_caida").prop('disabled', true);
                                                          $('#minimo_caida').val('');
                                                          $("#maximo_caida").prop('disabled', true);
                                                          $('#maximo_caida').val(''); 

                                 $('#dropdown_unidad_tiempo').val('seleccione');
                                                          $("#minimo_duracion_caida").prop('disabled', true);
                                                          $('#minimo_duracion_caida').val('');
                                                          $("#maximo_duracion_caida").prop('disabled', true);
                                                          $('#maximo_duracion_caida').val('');

                                  $('#dropdown_tiempo_respuesta').val('seleccione');
                                                          $("#minimo_duracion_respuesta").prop('disabled', true);
                                                          $('#minimo_duracion_respuesta').val('');
                                                          $("#maximo_duracion_respuesta").prop('disabled', true);
                                                          $('#maximo_duracion_respuesta').val('');


                                  $('#dropdown_unidad_tiempo_restauracion').val('seleccione');
                                                          $("#minimo_duracion_restauracion").prop('disabled', true);
                                                          $('#minimo_duracion_restauracion').val('');
                                                          $("#maximo_duracion_restauracion").prop('disabled', true);
                                                          $('#maximo_duracion_restauracion').val('');

                               // tinymce.get('soporte').setContent('');


                                $('#tiempo_respuesta_critico').val('');
                                $('#dropdown_unidad_respuesta_critico').val('seleccione');

                                 $('#tiempo_respuesta_severo').val('');
                                $('#dropdown_unidad_respuesta_severo').val('seleccione');

                                 $('#tiempo_respuesta_medio').val('');
                                $('#dropdown_unidad_respuesta_medio').val('seleccione');

                                 $('#tiempo_respuesta_menor').val('');
                                $('#dropdown_unidad_respuesta_menor').val('seleccione');


                                $('#tiempo_resolucion_critico').val('');
                                $('#dropdown_unidad_resolucion_critico').val('seleccione');

                                 $('#tiempo_resolucion_severo').val('');
                                $('#dropdown_unidad_resolucion_severo').val('seleccione');

                                 $('#tiempo_resolucion_medio').val('');
                                $('#dropdown_unidad_resolucion_medio').val('seleccione');

                                 $('#tiempo_resolucion_menor').val('');
                                $('#dropdown_unidad_resolucion_menor').val('seleccione');

                 waitingDialog.show('Cargando');

                 $.ajax({
                 
                            
                            url: config.base+'index.php/niveles/acuerdos_ns/datos_requisitos',
                            type: 'POST',
                            data: {                         
                                    requisito_id : $('#dropdown_requisitos').val(),                                             
                                  },
                            dataType: 'json',
                            cache : false,  

                             success: function(requisito){
                                               

                                if(requisito.lunes_disp_ini != null)
                                  {
                                     $('#checkbox_lunes').prop('checked', true);
                                     $("#inicio_lunes").prop('disabled', false); 
                                     $("#fin_lunes").prop('disabled', false); 
                                     $('#inicio_lunes').val(requisito.lunes_disp_ini);
                                     $('#fin_lunes').val(requisito.lunes_disp_fin);
                                    
                                  }
                                if(requisito.martes_disp_ini != null)
                                  {
                                     $('#checkbox_martes').prop('checked', true);
                                     $("#inicio_martes").prop('disabled', false); 
                                     $("#fin_martes").prop('disabled', false); 
                                      $('#inicio_martes').val(requisito.martes_disp_ini);
                                     $('#fin_martes').val(requisito.martes_disp_fin);
                                  }
                                if(requisito.miercoles_disp_ini != null)
                                  {
                                     $('#checkbox_miercoles').prop('checked', true);
                                     $("#inicio_miercoles").prop('disabled', false); 
                                     $("#fin_miercoles").prop('disabled', false); 
                                      $('#inicio_miercoles').val(requisito.miercoles_disp_ini);
                                     $('#fin_miercoles').val(requisito.miercoles_disp_fin);
                                  }
                                if(requisito.jueves_disp_ini != null)
                                  {
                                     $('#checkbox_jueves').prop('checked', true);
                                     $("#inicio_jueves").prop('disabled', false); 
                                     $("#fin_jueves").prop('disabled', false); 
                                      $('#inicio_jueves').val(requisito.jueves_disp_ini);
                                     $('#fin_jueves').val(requisito.jueves_disp_fin); 
                                  }
                                if(requisito.viernes_disp_ini != null)
                                  {
                                     $('#checkbox_viernes').prop('checked', true);
                                     $("#inicio_viernes").prop('disabled', false); 
                                     $("#fin_viernes").prop('disabled', false); 
                                      $('#inicio_viernes').val(requisito.viernes_disp_ini);
                                     $('#fin_viernes').val(requisito.viernes_disp_fin);
                                  }
                                if(requisito.sabado_disp_ini != null)
                                  {
                                     $('#checkbox_sabado').prop('checked', true);
                                    $("#inicio_sabado").prop('disabled', false); 
                                     $("#fin_sabado").prop('disabled', false); 
                                      $('#inicio_sabado').val(requisito.sabado_disp_ini);
                                     $('#fin_sabado').val(requisito.sabado_disp_fin);
                                  }
                                if(requisito.domingo_disp_ini != null)
                                  {
                                     $('#checkbox_domingo').prop('checked', true);
                                    $("#inicio_domingo").prop('disabled', false); 
                                     $("#fin_domingo").prop('disabled', false); 
                                      $('#inicio_domingo').val(requisito.domingo_disp_ini);
                                     $('#fin_domingo').val(requisito.domingo_disp_fin);
                                  }


                                  $('#porcentaje_disponibilidad').val(requisito.porcentaje_disp);



                                   if(requisito.lunes_mant_ini != null)
                                  {
                                     $('#checkbox_lunes_mantenimiento').prop('checked', true);
                                     $("#inicio_lunes_mantenimiento").prop('disabled', false); 
                                     $("#fin_lunes_mantenimiento").prop('disabled', false); 
                                     $('#inicio_lunes_mantenimiento').val(requisito.lunes_mant_ini);
                                     $('#fin_lunes_mantenimiento').val(requisito.lunes_mant_fin);
                                    
                                  }
                                if(requisito.martes_mant_ini != null)
                                  {
                                     $('#checkbox_martes_mantenimiento').prop('checked', true);
                                     $("#inicio_martes_mantenimiento").prop('disabled', false); 
                                     $("#fin_martes_mantenimiento").prop('disabled', false); 
                                      $('#inicio_martes_mantenimiento').val(requisito.martes_mant_ini);
                                     $('#fin_martes_mantenimiento').val(requisito.martes_mant_fin);
                                  }
                                if(requisito.miercoles_mant_ini != null)
                                  {
                                     $('#checkbox_miercoles_mantenimiento').prop('checked', true);
                                     $("#inicio_miercoles_mantenimiento").prop('disabled', false); 
                                     $("#fin_miercoles_mantenimiento").prop('disabled', false); 
                                      $('#inicio_miercoles_mantenimiento').val(requisito.miercoles_mant_ini);
                                     $('#fin_miercoles_mantenimiento').val(requisito.miercoles_mant_fin);
                                  }
                                if(requisito.jueves_mant_ini != null)
                                  {
                                     $('#checkbox_jueves_mantenimiento').prop('checked', true);
                                     $("#inicio_jueves_mantenimiento").prop('disabled', false); 
                                     $("#fin_jueves_mantenimiento").prop('disabled', false); 
                                      $('#inicio_jueves_mantenimiento').val(requisito.jueves_mant_ini);
                                     $('#fin_jueves_mantenimiento').val(requisito.jueves_mant_fin); 
                                  }
                                if(requisito.viernes_mant_ini != null)
                                  {
                                     $('#checkbox_viernes_mantenimiento').prop('checked', true);
                                     $("#inicio_viernes_mantenimiento").prop('disabled', false); 
                                     $("#fin_viernes_mantenimiento").prop('disabled', false); 
                                      $('#inicio_viernes_mantenimiento').val(requisito.viernes_mant_ini);
                                     $('#fin_viernes_mantenimiento').val(requisito.viernes_mant_fin);
                                  }
                                if(requisito.sabado_mant_ini != null)
                                  {
                                     $('#checkbox_sabado_mantenimiento').prop('checked', true);
                                    $("#inicio_sabado_mantenimiento").prop('disabled', false); 
                                     $("#fin_sabado_mantenimiento").prop('disabled', false); 
                                      $('#inicio_sabado_mantenimiento').val(requisito.sabado_mant_ini);
                                     $('#fin_sabado_mantenimiento').val(requisito.sabado_mant_fin);
                                  }
                                if(requisito.domingo_mant_ini != null)
                                  {
                                     $('#checkbox_domingo_mantenimiento').prop('checked', true);
                                    $("#inicio_domingo_mantenimiento").prop('disabled', false); 
                                     $("#fin_domingo_mantenimiento").prop('disabled', false); 
                                      $('#inicio_domingo_mantenimiento').val(requisito.domingo_mant_ini);
                                     $('#fin_domingo_mantenimiento').val(requisito.domingo_mant_fin);
                                  }


                                $('#dropdown_intervalo_mantenimiento').val(requisito.modalidad_mantenimiento);


                                if(requisito.pregunta_mant == "si")
                                  {
                                      $('#options_pregunta_1').prop('checked', true);
                                  }
                                else
                                  {
                                      $('#options_pregunta_2').prop('checked', true);
                                  }

                                 if(requisito.complemento_disponibilidad != null){
                                 tinymce.get('complemento_disponibilidad').setContent(requisito.complemento_disponibilidad);
                                }
                                else{
                                   tinymce.get('complemento_disponibilidad').setContent('');
                                }



                                $('#dropdown_unidad_medida').val(requisito.unidad_num_caidas);
                                $("#minimo_caida").prop('disabled', false);
                                $('#minimo_caida').val(requisito.minimo_num_caidas);
                                $("#maximo_caida").prop('disabled', false);
                                $('#maximo_caida').val(requisito.maximo_num_caidas);


                                $('#dropdown_unidad_tiempo').val(requisito.unidad_duracion_caidas);
                                $("#minimo_duracion_caida").prop('disabled', false);
                                $('#minimo_duracion_caida').val(requisito.minimo_duracion_caidas);
                                $("#maximo_duracion_caida").prop('disabled', false);
                                $('#maximo_duracion_caida').val(requisito.maximo_duracion_caidas);

                                $('#dropdown_tiempo_respuesta').val(requisito.unidad_tiempo_respuesta);
                                $("#minimo_duracion_respuesta").prop('disabled', false);
                                $('#minimo_duracion_respuesta').val(requisito.minimo_tiempo_respuesta);
                                $("#maximo_duracion_respuesta").prop('disabled', false);
                                $('#maximo_duracion_respuesta').val(requisito.maximo_tiempo_respuesta);

                                $('#dropdown_unidad_tiempo_restauracion').val(requisito.unidad_tiempo_restauracion);
                                $("#minimo_duracion_restauracion").prop('disabled', false);
                                $('#minimo_duracion_restauracion').val(requisito.minimo_tiempo_restauracion);
                                $("#maximo_duracion_restauracion").prop('disabled', false);
                                $('#maximo_duracion_restauracion').val(requisito.maximo_tiempo_restauracion);

                                tinymce.get('soporte').setContent(requisito.soporte_tecnico);


                                $('#tiempo_respuesta_critico').val(requisito.tiempo_respuesta_critico);
                                $('#dropdown_unidad_respuesta_critico').val(requisito.unidad_respuesta_critico);

                                $('#tiempo_respuesta_severo').val(requisito.tiempo_respuesta_severo);
                                $('#dropdown_unidad_respuesta_severo').val(requisito.unidad_respuesta_severo);

                                 $('#tiempo_respuesta_medio').val(requisito.tiempo_respuesta_medio);
                                $('#dropdown_unidad_respuesta_medio').val(requisito.unidad_respuesta_medio);

                                 $('#tiempo_respuesta_menor').val(requisito.tiempo_respuesta_menor);
                                $('#dropdown_unidad_respuesta_menor').val(requisito.unidad_respuesta_menor);


                                $('#tiempo_resolucion_critico').val(requisito.tiempo_resolucion_critico);
                                $('#dropdown_unidad_resolucion_critico').val(requisito.unidad_resolucion_critico);

                                 $('#tiempo_resolucion_severo').val(requisito.tiempo_resolucion_severo);
                                $('#dropdown_unidad_resolucion_severo').val(requisito.unidad_resolucion_severo);

                                 $('#tiempo_resolucion_medio').val(requisito.tiempo_resolucion_medio);
                                $('#dropdown_unidad_resolucion_medio').val(requisito.unidad_resolucion_medio);

                                 $('#tiempo_resolucion_menor').val(requisito.tiempo_resolucion_menor);
                                $('#dropdown_unidad_resolucion_menor').val(requisito.unidad_resolucion_menor);


                                $("#exito_requisitos").empty();
                                $("#exito_requisitos").append('<i class="fa fa-check"></i> <b>Los datos han sido cargados con Exito.</b>');
                                $("#exito_requisitos").fadeIn();


                                waitingDialog.hide('Cargando');     
                             },
                             error: function(xhr, ajaxOptions, thrownError){
                                   //alert(xhr.status+" "+thrownError);
                                   //$("#modal_error").modal('show');
                                                
                                 }
                        });
            }

    setTimeout(function() {
        $("#exito_requisitos").fadeOut(1000);
    },5000);

  }); 



});