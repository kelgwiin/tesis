
function deleteProcesoServicio(id_proceso) {

          $("#eliminar").modal('show');

          $("#eliminar_confirm").click(function(){


                 $.ajax({
                 
                            
                            url: config.base+'index.php/cargar_data/cargar_data/eliminar_servicio_proceso',
                            type: 'POST',
                            data: {                         
                                    proceso_id : id_proceso,                                            
                                  },
                            //dataType: 'json',
                            cache : false,  

                             success: function(data){
                                               
                              $("#eliminar").modal('hide');
                              window.location.href = config.base+'index.php/cargar_data/cargar_data/servicio_proceso';
                                       
                             },
                             error: function(xhr, ajaxOptions, thrownError){
                                   //alert(xhr.status+" "+thrownError);
                                   //$("#modal_error").modal('show');
                                                
                                 }
                        });

            });


    }

$( document ).ready(function() {


    //Inicializar Editor de Texto
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
                 
              url: config.base+'index.php/cargar_data/cargar_data/eliminar_servicio_procesos',
              type: 'POST',
              data: {                         
                      proceso_id : procesos_id,

                   },
              //dataType: 'json',
              cache : false,  

              success: function(data){
             
                 window.location.href = config.base+'index.php/cargar_data/cargar_data/servicio_proceso';
                                          
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

    setTimeout(function() {
        $("#message").fadeOut(1500);
    },10000);


     // Desactiva el tablesorter.
     $('#dataTables-procesos').unbind('appendCache applyWidgetId applyWidgets sorton update updateCell')
       .removeClass('tablesorter')
       .find('thead th')
       .unbind('click mousedown')
       .removeClass('header headerSortDown headerSortUp');

    // Crea el Datatable
    $('#dataTables-procesos').dataTable();

     //:: btn add Componente al dpto ::
    $('button#add_proceso_servicio_soportado').on('click',function(){
        options = $('select#lista_procesos_servicio :selected'); 
        options.each(     
                function(){
                    op = $(this);
                    $('select#procesos_servicio_soporte').append(op);
                }
            );
    });

    //:: btn rm Componente al dpto ::
    //remueve los procesos seleccionados
    $('button#rm_proceso_servicio_soportado').on('click',function(){
        options = $('select#procesos_servicio_soporte :selected');
        lon = options.length;
        vals = "";
        options.each(     
                function(){
                    op = $(this);
                    $('select#lista_procesos_servicio').append(op);
                }
            );
    });
 
 


});


 