$(document).ready(function() {

    //Editor de Texto
        tinymce.init({
           selector: "textarea",
           plugins: [
                       " advlist autolink autosave link image lists charmap print preview hr  anchor pagebreak spellchecker",
                       "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
                       "table contextmenu directionality smileys template textcolor paste textcolor colorpicker textpattern"
                    ],
           toolbar1: "bold italic underline strikethrough | bullist numlist outdent indent | fontsizeselect | cut copy paste | link",
           menubar: false,
           toolbar_items_size: 'small',
           language : 'es',
           entity_encoding : "raw"
           });


    // Pasos 
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
    
    $('#activate-step-1').on('click', function(e) {
        $('ul.setup-panel li:eq(1)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-1"]').trigger('click');
      
    });

    $('#activate-step-2').on('click', function(e) {
        $('ul.setup-panel li:eq(1)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-2"]').trigger('click');
      
    }) ; 

    
    $('#activate-step-3').on('click', function(e) {
        $('ul.setup-panel li:eq(2)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-3"]').trigger('click');
      
    });  

    $('#activate-step-4').on('click', function(e) {
        $('ul.setup-panel li:eq(3)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-4"]').trigger('click');
        
    });   
    // END Pasos 

    //DATEPICKER

    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
     
    var checkin = $('#dpd1').datepicker({
      onRender: function(date) {
        return date.valueOf() < now.valueOf() ? 'disabled' : '';
      }
    }).on('changeDate', function(ev) {
      if (ev.date.valueOf() > checkout.date.valueOf()) {
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        checkout.setValue(newDate);
      }
      checkin.hide();
      $('#dpd2')[0].focus();
    }).data('datepicker');
    var checkout = $('#dpd2').datepicker({
      onRender: function(date) {
        return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
      }
    }).on('changeDate', function(ev) {
      checkout.hide();
    }).data('datepicker');

    //END DATEPICKER

});

