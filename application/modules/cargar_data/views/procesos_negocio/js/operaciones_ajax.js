
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



});


 