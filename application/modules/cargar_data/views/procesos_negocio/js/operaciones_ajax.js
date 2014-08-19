
function deleteProceso(id_proceso) {

          $("#eliminar").modal('show');

          $("#eliminar_confirm").click(function(){
          	
          	//alert(id_proceso);

                  //alert('delete');

                 $.ajax({
                 
                            
                            url: config.base+'index.php/cargar_data/cargar_data/eliminarProcesoNegocio',
                            type: 'POST',
                            data: {                         
                                    proceso_id : id_proceso,                                             
                                   },
                            //dataType: 'json',
                            cache : false,  

                             success: function(data){
                                               
                              $("#eliminar").modal('hide');
                              //alert('delete');
                              location.reload();
                                       
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
        $("#success").fadeOut(1500);
    },10000);


   // Mostrar Advertencia para Eliminar los elementos seleccionados
   $("#delete_checkbox").click(function(){ 

    $("#eliminar_todos").modal('show');

   });


    // Mostrar Advertencia para Eliminar los elementos seleccionados
   $("#eliminarselect_confirm").click(function(){ 

      $("#eliminar_todos").modal('hide');
      var i=0;
      var procesos_id = [];
      $(".checkbox").each(function(){
          if(this.checked)
            {
              procesos_id[i] = $(this).val();
              i++;
            }
      })
      $.ajax({
                 
              url: config.base+'index.php/cargar_data/cargar_data/eliminarProcesosNegocio',
              type: 'POST',
              data: {                         
                      proceso_id : procesos_id,                                             
                   },
              cache : false,  

              success: function(data){
             
                location.reload();
                                       
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
     $('#dataTables-proceso').unbind('appendCache applyWidgetId applyWidgets sorton update updateCell')
       .removeClass('tablesorter')
       .find('thead th')
       .unbind('click mousedown')
       .removeClass('header headerSortDown headerSortUp');

    // Crea el Datatable
    $('#dataTables-proceso').dataTable();
 


});


 