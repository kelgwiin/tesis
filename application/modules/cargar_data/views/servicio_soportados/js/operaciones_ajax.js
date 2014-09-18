


$( document ).ready(function() {

 //:: btn add Componente al dpto ::
    $('button#add_servicio_soportado').on('click',function(){
        options = $('select#lista_servicios :selected');
        options.each(     
                function(){
                    op = $(this);
                    $('select#servicios_soportados').append(op);
                }
            );
    });

    //:: btn rm Componente al dpto ::
    //remueve los componentes seleccionados
    $('button#rm_servicio_soportado').on('click',function(){
        options = $('select#servicios_soportados :selected');
        lon = options.length;
        vals = "";
        options.each(     
                function(){
                    op = $(this);
                    $('select#lista_servicios').append(op);
                }
            );
    });


    setTimeout(function() {
        $("#message").fadeOut(1500);
    },10000);


	
 
});