$( document ).ready(function(){

  $( window ).on('click', function() {
    if (typeof addButtons[0] != 'undefined') {
      for(var i = 0; i < addButtons.length; i += 1) {
        var id = '#' + addButtons[i];
        $(id).on('click', function(event) {
          console.log(event.target.id);
          var form = 'form' + event.target.id;
          console.log(form_sections[form]);
          $('#'+event.target.id).before(form_sections[form]);
        })
      }
    }

  })
})
