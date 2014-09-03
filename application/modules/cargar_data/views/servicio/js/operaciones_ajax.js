$( document ).ready(function() {

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