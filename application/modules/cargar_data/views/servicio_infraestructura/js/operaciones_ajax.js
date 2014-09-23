
$( document ).ready(function() {


	  setTimeout(function() {
        $("#message").fadeOut(1500);
    },10000);


    //:: btn add Componente al dpto ::
    $('button#add_componente_soportado').on('click',function(){
        options = $('select#lista_componentes :selected');
        options.each(     
                function(){
                    op = $(this);
                    $('select#infraestructura_soporte').append(op);
                }
            );
    });

    //:: btn rm Componente al dpto ::
    //remueve los componentes seleccionados
    $('button#rm_compoenente_soportado').on('click',function(){
        options = $('select#infraestructura_soporte :selected');
        lon = options.length;
        vals = "";
        options.each(     
                function(){
                    op = $(this);
                    $('select#lista_componentes').append(op);
                }
            );
    });
 


});


 