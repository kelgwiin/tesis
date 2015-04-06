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

                                alert(data.dias.length);

                                data.dias.forEach(function(dia) {

                                  alert(dia);

                                });

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