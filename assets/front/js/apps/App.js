//---------------------------------------------
//Creado por Kelwin Gamez <kelgwiin@gmail.com> |
//Fecha: 05-02-2014                            |
//---------------------------------------------

$(document).ready(function() 
{    
    //Crea la instancia del popover
    $('#popoverMenu').popover();

    //Crea la instancia de los toolitips en general
    $('[data-toggle=tooltip]').tooltip();

    //--------------------------------
    //EVENTOS DE CARGAR DATOS BÁSICOS |
    //--------------------------------
    
    //:: Guardar Datos Básicos ::
    //Los son procesados a través de ajax
    $('form#fr-datos-basicos').on('submit',function(event){
        event.preventDefault();
        // store reference to the form
        var bk_this = $(this);

        // grab the url from the form element
        var url = bk_this.attr('action');
            
        //Obteniendo la data del form
        var dataToSend = bk_this.serialize();

        //Función procesar llamada desde el post
        var fo_proccess = function (data){
            if(data.estatus == "ok"){
                //Dehabilitando todos los campos
                $('input#nombre-organizacion-basico').attr('disabled','disabled');
                $('input#nombre-moneda-basico').attr('disabled','disabled');
                $('input#abreviatura-moneda-basico').attr('disabled','disabled');
                $('textarea#descripcion-basico').attr('disabled','disabled');

                //Deshabilitando el boton de guardado
                $('button#btn_guardar_datos_basicos').attr('disabled','disabled');

                //Deshabilitando mensaje de error (puede estar o no habilitado)
                $('div#error-datos-basicos-cargar-datos').attr('class','alert alert-danger alert-dismissable hidden');

                //Habilitando mensaje de guardado o actualizado
                if($('a#btn-editar-datos-basicos-basico').attr('data-status-edicion') == 'on'){
                    $('div#msj-datos-basicos-actualizado').attr('class','alert alert-success alert-dismissable show');
                }else{
                    $('div#msj-datos-basicos-guardado').attr('class','alert alert-success alert-dismissable show');
                }

                //Cambiando el estatus de edición a off, poterior al guardado
                $('a#btn-editar-datos-basicos-basico').attr('data-status-edicion','off');

                //Habilitando el boton de edición
                $('a#btn-editar-datos-basicos-basico').removeAttr('disabled');

                //Colocando el id de la Organización para que este disponible para actualización
                $('a#btn-editar-datos-basicos-basico').attr('data-organizacion-id',data.organizacion_id);

                //Escondiendo msj de error inesperado
                $('div#msj-error-inesperado-basico').attr('class','alert alert-danger alert-dismissable hidden');
            }else{
                $('div#msj-error-inesperado-basico').attr('class','alert alert-danger alert-dismissable show');
            }
            
        }//end-of: function fo_proccess

        //Verificando si es actualizar para cambiar el la  llamada al controlador
        if($('a#btn-editar-datos-basicos-basico').attr('data-status-edicion') == 'on'){
            url = 'cargar_datos/basico/'+$('a#btn-editar-datos-basicos-basico').attr('data-organizacion-id');
        }
        //Haciendo la llamada post desde ajax
        $.post( url, dataToSend, fo_proccess,'json');
    });
    
    //:: Muestra los Mensajes de Error ::
    //Cuando no se encuentren llenos los campos obligatorios.
    $('#btn_guardar_datos_basicos').on('click', function(){
        //Nombre de la Organización
        var in1 = $('input#nombre-organizacion-basico').val();

       if(in1.length <= 0 ){
            $('div[data-id=fg-nombre-organizacion-basico]').attr('class','form-group has-error');
            $('div[data-id=icon-nombre-organizacion-basico]').attr('class','col-md-1 show');
        }else{
            $("div[data-id=fg-nombre-organizacion-basico]").attr('class','form-group');
            $('div[data-id=icon-nombre-organizacion-basico]').attr('class','col-md-1 hidden');
        }
        
        //Nombre de la Moneda
        var in2 = $('input#nombre-moneda-basico').val();
        if(in2.length <= 0 ){
            $('div[data-id=fg-nombre-moneda-basico]').attr('class','form-group has-error');
            $('div[data-id=icon-nombre-moneda-basico]').attr('class', "col-md-1 show");
        }else{
            $('div[data-id=fg-nombre-moneda-basico]').attr('class','form-group');
            $('div[data-id=icon-nombre-moneda-basico]').attr('class', "col-md-1 hidden");
        }

        //Abreviatura de la moneda
        var in3 = $('input#abreviatura-moneda-basico').val();
        if(in3.length <= 0){
            $('div[data-id=fg-abreviatura-moneda-basico]').attr('class','form-group has-error');
            $('div[data-id=icon-abreviatura-moneda-basico]').attr('class','col-md-1 show');
        }else{
            $('div[data-id=fg-abreviatura-moneda-basico]').attr('class','form-group');
            $('div[data-id=icon-abreviatura-moneda-basico]').attr('class','col-md-1 hidden');
        }

        if(in1.length <= 0 || in2.length <= 0 || in3.length <= 0){
            $('#error-datos-basicos-cargar-datos').attr('class','alert alert-danger alert-dismissable show');
        }else{
            $('#error-datos-basicos-cargar-datos').attr('class','alert alert-danger alert-dismissable hidden');
        }
        
    });
    
    //:: btn Editar::
    //Habilita los campos para que se puedan editar
    $('a#btn-editar-datos-basicos-basico').on('click', function(){
        
        //Habilitando los campos
        $('input#nombre-organizacion-basico').removeAttr('disabled');
        $('input#nombre-moneda-basico').removeAttr('disabled');
        $('input#abreviatura-moneda-basico').removeAttr('disabled');
        $('textarea#descripcion-basico').removeAttr('disabled');

        //Habilitando el boton de guardar
        $('button#btn_guardar_datos_basicos').removeAttr('disabled');

        //Activando el status de edicion
        $(this).attr('data-status-edicion','on');
        

        //Deshabilitando el msj de guardado
        $('div#msj-datos-basicos-guardado').attr('class','alert alert-success alert-dismissable hidden');
        
        //Deshabilitando el msj de actualizado
        $('div#msj-datos-basicos-actualizado').attr('class','alert alert-success alert-dismissable hidden');
    });

    //FIN: CARGAR DATOS BÁSICOS 




    //--------------------------------
    //EVENTOS DE COMPONENTES DE TI |
    //-----------------------------
    
    //btn Características: Al pulsar el caret que despliega el panel [PANEL]
    $('a[data-fieldIT=caracteristicas]').on('click', function(){
        var id  = $(this).attr('data-id');

        //Mostrando el Panel
        if($('div[data-id='+id+']').attr('class') == 'panel-body hidden') {
                
            $('div[data-id='+id+']').attr('class', 'panel-body show');
            //cambiando el caret
            $('i#'+id).attr('class','fa fa-caret-down fa-lg');
        }else{

            $('div[data-id='+id+']').attr('class', 'panel-body hidden');
            //cambiando el caret
            $('i#'+id).attr('class','fa fa-caret-right fa-lg');
        }
    });

    //btn editar
    $('a[data-fieldIT=editar]').on('click', function(){
        var id_editar  = $(this).attr('data-id');
        alert('editar id - '+id_editar);    
    });

    //btn eliminar
    $('a[data-fieldIT=eliminar]').on('click', function(){
        var id  = $(this).attr('data-id');
        alert('eliminar id - '+id);    
    });

    //FIN: COMPONENTES DE TI
    



    //---------------------
    //EVENTOS DE SERVICIOS |
    //---------------------
    
    //Btn para mostrar la lista de Comandos/Operaciones dentro del 
    //apartado "Cronograma de Ejecución"
    $('a[data-fieldIT=comandos-operaciones]').on('click', function(){
        var id  = $(this).attr('data-id');

        //Mostrando la lista de comandos que se encuentran ocultos en la tabla
        if($('ul[data-id='+id+']').attr('class') == 'hidden') {

            $('ul[data-id='+id+']').attr('class', 'show');
            //cambiando el caret
            $('i#'+id).attr('class','fa fa-caret-down fa-lg');
        }else{

            $('ul[data-id='+id+']').attr('class', 'hidden');
            //cambiando el caret
            $('i#'+id).attr('class','fa fa-caret-right fa-lg');
        }
    });

    //Mostrando los sub-menus dentro de las Características de los Servicios
    $('a[data-fieldIT=caracteristicas-servicios]').on('click', function (){
        var titulo_tooltip = $(this).attr('data-original-title');
        var id = $(this).attr('data-id');

        if(titulo_tooltip == 'Mostrar'){//esta oculto?
            $('div[data-id='+id+']').attr('class','show');
            $(this).attr('data-original-title','Ocultar');

            //cambiando el caret
            $('i#'+id).attr('class','fa fa-caret-down fa-lg');
        }else{
            $('div[data-id='+id+']').attr('class','hidden');
            $(this).attr('data-original-title','Mostrar');

            //cambiando el caret
            $('i#'+id).attr('class','fa fa-caret-right fa-lg');
        }
    });

    //Checkbox que habilita el campo de montos
    $('input[data-cb=genera-ingresos-nuevo-servicio]').on('click', function(){
        if($(this).is(':checked')){
            $('input[data-id=monto-ingreso-nuevo-servicio]').removeAttr('disabled');   
        }else{
            $('input[data-id=monto-ingreso-nuevo-servicio]').attr('disabled','on');            
        }
    });

    //Agregar formulario Principal de Cronograma de Ejecución
    $('a[data-id=btn-add-forms-cronograma]').on('click', function (){
        var num = parseInt($('label#num-filas-cronogramas').attr('data-num-filas'))+1;//Número de fila actual
        var form_cronogramas = '<div class="panel panel-info" data-id = "form-cronograma-'+num+'"> <div class="panel-body"> <!-- Numeración --> <div class="row"> <div class ="col-md-12"> <p class = "text-muted "><strong><small>CRONOGRAMA #'+num+'</small></strong></p> </div> </div><!-- Numeración --> <br> <!-- Campos de Cronograma de Ejecución --> <div class = "row" ><!-- inner --> <!-- Desccripción del  Cronograma --> <div class = "col-md-1"><!-- label --> <label for = "descripcion-cronograma-'+num+'" class ="control-label">Descripción</label> </div> <div class="col-md-3"> <input type="text" name="descripcion-cronograma-'+num+'" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Descripción"data-toggle = "tooltip" data-original-title = "Descripción del Cronograma"> </div><!-- /col-3: Descripción del Cronograma--> <!-- Horario desde--> <div class = "col-md-1"><!-- label --> <label for = "horario-desde-cronograma-'+num+'" class = "control-label">Desde</label> </div> <div class="col-md-3"> <input type="time" name="horario-desde-cronograma-'+num+'" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Desde"data-toggle = "tooltip" data-original-title = "Horario inicial"> </div><!-- /col-3: Horario desde--> <!-- Horario hasta --> <div class = "col-md-1"><!-- label --> <label for = "horario-hasta-cronograma-'+num+'" class = "control-label">Hasta</label> </div> <div class="col-md-3"> <input type="time" name="horario-hasta-cronograma-'+num+'" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Hasta"data-toggle = "tooltip" data-original-title = "Horario final"> </div><!-- /col-3: Horario hasta--> </div><!-- /row: Campos de Cronograma de Ejecución--> <!-- Registro de Comandos y Operaciones --> <br> <h4 class = "text-primary">Registro de Comandos y Operaciones </h4> <!-- Boton de Añadir y Eliminar formulario de Comandos y Operaciones--> <div class = "row"> <div class="col-md-1"> <a  class = "btn "data-id = "btn-add-forms-comandos-oper"data-secuencia = "'+num+'"data-toggle = "tooltip"data-original-title = "Agregar formulario al final"data-placement = "top"> <i class = "fa fa-plus fa-lg"></i> Añadir </a> </div><!-- /col-1--> <div class="col-md-1"> <a  class = "btn "data-id = "btn-remove-forms-comandos-oper"data-secuencia = "'+num+'"data-toggle = "tooltip"data-original-title = "Eliminar último formulario"data-placement = "top"> <i class = "fa fa-minus fa-lg"></i> Eliminar </a> </div><!-- /col-1--> <div class = "col-md-10"></div><!-- Vacío--> </div><!-- /row: Boton Añadir y Eliminar formulario de Comandos y Operaciones --> <!-- Lista de Comandos y Operaciones --> <div class = "row"  > <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" data-fcomandos-oper = "form-comando-oper-'+num+'"> <!--Contador de numeros  de filas de comandos y operaciones --> <label class = "sr-only" id = "num-filas-comandos-oper-'+num+'" data-num-filas = "1"></label> <!--Campos Iniciales --> <div class="row" data-id = "sec-'+num+'-comando-oper-1"><!-- inner de Comandos y Operaciones --> <!-- Comando --> <div class = "col-md-3"> <input type="text" name="comando-1" data-secuencia = "1"class="form-control"  required="required"  placeholder = "Comando"data-toggle = "tooltip" data-original-title = "Comando"> </div><!-- /col-3: Comando --> <!-- Operación --> <div class = "col-md-3"> <input type="text" name="operacion-1" data-secuencia = "1"class="form-control"  required="required"  placeholder = "Operación"data-toggle = "tooltip" data-original-title = "Operación a ejecutar"> </div><!-- /col-3: Operación --> <div class = "col-md-6"></div><!-- Vacío--> <!-- /row: Comandos y Operaciones --> </div> <!-- A partir de aquí se agregar desde jquery --> </div><!-- /col-12--> <!-- /row: Lista de Comandos y Operaciones --> </div> </div><!-- /panel-body--> <!-- /panel--> </div>'; $('div[data-fcronograma=forms-cronograma]').append(form_cronogramas);//Creando el nuevo formulario
        $('label#num-filas-cronogramas').attr('data-num-filas',num);//Actualizando el contador 
        $('[data-toggle=tooltip]').tooltip();//Enlazando tooltips nuevos

        //Enlazando eventos de botones 
        //Desenlazar eventos viejos y enlazarlos todos de nuevo.
        //Puede optimizarse buscando el selector exacto que acepte mas de un atributo de "data". Buscar despues
        //Notas desde 06-03-2014
        $('a[data-id=btn-add-forms-comandos-oper]').unbind('click',add_form_comandos_operaciones);
        $('a[data-id=btn-remove-forms-comandos-oper]').unbind('click',remove_form_comandos_operaciones);
        $('a[data-id=btn-add-forms-comandos-oper]').bind('click',add_form_comandos_operaciones);
        $('a[data-id=btn-remove-forms-comandos-oper]').bind('click',remove_form_comandos_operaciones);
        
    });

    //Eliminar formulario Principal de Cronograma de Ejecución
    $('a[data-id=btn-remove-forms-cronograma]').on('click',function(){
        var num = parseInt($('label#num-filas-cronogramas').attr('data-num-filas'));
        
        if(num != 0){
            $('div[data-id=form-cronograma-'+num+']').remove();
            $('label#num-filas-cronogramas').attr('data-num-filas',num-1);//Actualizando el contador    
        }
    });
    
    //Agregar formulario Comandos y Operaciones (Cronograma de Ejecución )
    $('a[data-id=btn-add-forms-comandos-oper]').on('click',add_form_comandos_operaciones);
    
    //Eliminar formulario Comandos y Operaciones (Cronograma de Ejecución )
    $('a[data-id=btn-remove-forms-comandos-oper]').on('click',remove_form_comandos_operaciones);

    //Agregar formulario del Umbral
    $('a#btn-add-forms-umbrales').on('click',function(){

        var num = parseInt($('label#num-filas-umbrales').attr('data-num-filas'))+1;//Número de fila actual
        var form_umbrales =     '<div class = "row" data-id ="form-umbral-'+num+'"> <!-- inner--> <div class = "col-md-3"> <input type="text" name="descripcion-umbrales-'+num+'" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Descripción"data-toggle = "tooltip" data-original-title = "Descripción del Umbral"> </div> <div class = "col-md-3"> <input type="number" name="tiempo-acordado-umbrales-'+num+'" min = "1" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Tiempo"data-toggle = "tooltip" data-original-title = "Tiempo acordado"> </div> <div class = "col-md-3"> <select name="medida-umbrales-'+num+'"  class="form-control" data-secuencia = "'+num+'"data-toggle = "tooltip" data-original-title = "Medida del Tiempo"> <option value="header"> Medida </option> <option value="hh"> Horas</option> <option value="mm"> Minutos </option> <option value="ss"> Segundos </option> </select> </div> <div class = "col-md-3"> <input type="number" name="valor-umbrales-'+num+'" min = "1" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Valor"data-toggle = "tooltip" data-original-title = "Valor"> </div> </div> <br data-id ="form-umbral-'+num+'">';
     
        $('div[data-fumbrales=forms-umbrales]').append(form_umbrales);//Creando el nuevo formulario
        $('label#num-filas-umbrales').attr('data-num-filas',num);//Actualizando el contador

        //Se hace la llamada del tooltip de nuevo para que la instancia que se creo 
        //se le puedan enlazar los eventos.
        $('[data-toggle=tooltip]').tooltip();

    });

    //Eliminar formulario del Umbral
    $('a#btn-remove-forms-umbrales').on('click',function(){
        var num = parseInt($('label#num-filas-umbrales').attr('data-num-filas'));
        if(num != 0){
            $('div[data-id=form-umbral-'+num+']').remove();
            $('br[data-id=form-umbral-'+num+']').remove();
            $('label#num-filas-umbrales').attr('data-num-filas',num-1);//Actualizando el contador    
        }
    });

    //FIN: EVENTOS DE SERVICIOS


}); 

//--------------------
//LISTA DE FUNCIONES  |
//--------------------
//
/**
 * Agrega un nuevo formulario de comandos y operaciones en la sección de
 * Cronograma de Ejecución
 */
function add_form_comandos_operaciones(){
    var num_secuencia = $(this).attr('data-secuencia');
    var num = parseInt($('label#num-filas-comandos-oper-'+num_secuencia).attr('data-num-filas'))+1;//Número de fila actual
    var form_comandos_oper = '<div class="row" data-id = "sec-'+num_secuencia+'-comando-oper-'+num+'"><!-- inner de Comandos y Operaciones --> <!-- Comando --> <div class = "col-md-3"> <input type="text" name="comando-'+num+'" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Comando"data-toggle = "tooltip" data-original-title = "Comando"> </div><!-- /col-3: Comando --> <!-- Operación --> <div class = "col-md-3"> <input type="text" name="operacion-'+num+'" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Operación"data-toggle = "tooltip" data-original-title = "Operación a ejecutar"> </div><!-- /col-3: Operación --> <div class = "col-md-6"></div><!-- Vacío--> <!-- /row: Comandos y Operaciones --> </div>';

    $('div[data-fcomandos-oper=form-comando-oper-'+num_secuencia+']').append(form_comandos_oper);//Creando el nuevo formulario
    $('label#num-filas-comandos-oper-'+num_secuencia).attr('data-num-filas',num);//Actualizando el contador 
    $('[data-toggle=tooltip]').tooltip();//Enlazando tooltips nuevos
}

/**
 * Remueve el último formulario de comandos y operaciones en la sección de
 * Cronograma de Ejecución
 */
function remove_form_comandos_operaciones(){
    var num_secuencia = $(this).attr('data-secuencia');
    var num = parseInt($('label#num-filas-comandos-oper-'+num_secuencia).attr('data-num-filas'));//Número de fila actual
        
    if(num != 0 ){
        $('div[data-id=sec-'+num_secuencia+'-comando-oper-'+num+']').remove();
        $('label#num-filas-comandos-oper-'+num_secuencia).attr('data-num-filas',num-1);//Actualizando el contador 
    }
}
