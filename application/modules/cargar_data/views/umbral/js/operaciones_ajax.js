
function deleteServicio(id_servicio) {

          $("#eliminar").modal('show');

          $("#eliminar_confirm").click(function(){


                 $.ajax({
                 
                            
                            url: config.base+'index.php/cargar_data/cargar_data/eliminar_servicio',
                            type: 'POST',
                            data: {                         
                                    servicio_id : id_servicio,                                             
                                  },
                            //dataType: 'json',
                            cache : false,  

                             success: function(data){
                                               
                              $("#eliminar").modal('hide');
                              window.location.href = config.base+'index.php/cargar_data/cargar_data/servicios';
                                       
                             },
                             error: function(xhr, ajaxOptions, thrownError){
                                   //alert(xhr.status+" "+thrownError);
                                   //$("#modal_error").modal('show');
                                                
                                 }
                        });

            });


    }


$( document ).ready(function() {


    tinymce.init({
           selector: "textarea",
           plugins: [
                       " advlist autolink autosave link image lists charmap print preview hr  anchor pagebreak spellchecker",
                       "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
                       "table contextmenu directionality smileys template textcolor paste textcolor colorpicker textpattern"
                    ],
           toolbar1: "bold italic underline strikethrough | bullist numlist outdent indent | fontsizeselect | cut copy paste",
           menubar: false,
           toolbar_items_size: 'small',
           language : 'es',
           entity_encoding : "raw"
           });

    setTimeout(function() {
        $("#message").fadeOut(1500);
    },10000);

      // Mostrar Advertencia para Eliminar los elementos seleccionados
   $("#delete_checkbox").click(function(){ 

    $("#eliminar_todos").modal('show');

   });

    // Mostrar Advertencia para Eliminar los elementos seleccionados
   $("#eliminarselect_confirm").click(function(){ 

      $("#eliminar_todos").modal('hide');
      var i=0;
      var servicios_id = [];
      $(".checkbox").each(function(){
          if(this.checked)
            {
              servicios_id[i] = $(this).val();
              i++;
            }
      })
      $.ajax({
                 
              url: config.base+'index.php/cargar_data/cargar_data/eliminar_servicios',
              type: 'POST',
              data: {                         
                      servicio_id : servicios_id,                                             
                   },
              //dataType: 'json',
              cache : false,  

              success: function(data){
             
                 window.location.href = config.base+'index.php/cargar_data/cargar_data/servicios';
                                          
              },
             error: function(xhr, ajaxOptions, thrownError){
               //alert(xhr.status+" "+thrownError);
               //$("#modal_error").modal('show');
                                                
               }
            });

   });

    // Seleccionar y Deseleccionar todos los Checkboxes
    $("#checkbox_all").change(function(){
             if(this.checked){
            $(".checkbox").each(function(){
                this.checked=true;
                $('#delete_checkbox').removeClass('disabled');
            })              
        }else{
            $(".checkbox").each(function(){
                this.checked=false;
                 $('#delete_checkbox').addClass('disabled');
            })              
        }
    });

    // Activar y Desactivar boton para Eliminar elementos Seleccionados
    $(".checkbox").click(function () {
        if (!$(this).is(":checked"))
          {
            $("#checkbox_all").prop("checked", false);
            var flag = 0;
            $(".checkbox").each(function(){
                if(this.checked)
                flag=1;
            })              
            if(flag == 0){ $('#delete_checkbox').addClass('disabled');}
            
          }
        else
          {
            $('#delete_checkbox').removeClass('disabled');
            var flag = 0;
            $(".checkbox").each(function(){
                if(!this.checked)
                flag=1;
            })              
            if(flag == 0){ $("#checkbox_all").prop("checked", true); }
      
          }
    });

     // Desactiva el tablesorter.
     $('#dataTables-servicio').unbind('appendCache applyWidgetId applyWidgets sorton update updateCell')
       .removeClass('tablesorter')
       .find('thead th')
       .unbind('click mousedown')
       .removeClass('header headerSortDown headerSortUp');

    // Crea el Datatable
    $('#dataTables-servicio').dataTable();



  /*$("#dropdown_categorias" ).click(function() {

});*//*
		tinymce.init({
           selector: "textarea",
           plugins: [
                       " advlist autolink autosave link image lists charmap print preview hr  anchor pagebreak spellchecker",
                       "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
                       "table contextmenu directionality smileys template textcolor paste textcolor colorpicker textpattern"
                    ],
           toolbar1: "bold italic underline strikethrough | bullist numlist outdent indent | fontsizeselect | cut copy paste",
           menubar: false,
           toolbar_items_size: 'small',
           language : 'es',
           entity_encoding : "raw"
           });*/

	// LLena el dropdown de Categorias de Servicio
   /* $.ajax({
                url: config.base+'index.php/cargar_data/cargar_data/obtenerCategoriasServicio',
                type: 'POST',              
                dataType: 'json',
                cache : false,  
                success: function(dropdown_data){
                 
                  // alert('exxito'); 
                  $('#dropdown_categorias').html(dropdown_data);       

                },
                error: function(xhr, ajaxOptions, thrownError){
                	
                	alert(xhr.status+" "+thrownError);
                    //$("#modal_error").modal('show');
                        }
            });*/

    // LLena el dropdown de Tipos de Servicio
 /*   $.ajax({
                url: config.base+'index.php/cargar_data/cargar_data/obtenerTiposServicio',
                type: 'POST',              
                dataType: 'json',
                cache : false,  
                success: function(dropdown_data){
                 
                  // alert('exxito'); 
                  $('#dropdown_tipos').html(dropdown_data);       

                },
                error: function(xhr, ajaxOptions, thrownError){
                	
                	alert(xhr.status+" "+thrownError);
                    //$("#modal_error").modal('show');
                        }
            });*/

    // LLena el dropdown de Propietario del Servicio
   /* $.ajax({
                url: config.base+'index.php/cargar_data/cargar_data/obtenerPropietarioServicio',
                type: 'POST',              
                dataType: 'json',
                cache : false,  
                success: function(dropdown_data){
                 
                  // alert('exxito'); 
                  $('#dropdown_propietario').html(dropdown_data);       

                },
                error: function(xhr, ajaxOptions, thrownError){
                	
                	alert(xhr.status+" "+thrownError);
                    //$("#modal_error").modal('show');
                        }
            });*/



	
 
});