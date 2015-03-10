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

         		alert('realizar consulta');
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


});