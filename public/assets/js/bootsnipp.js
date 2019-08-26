
            $(document).ready(function() {
                $("#lista1").sortable({
                    connectWith : ['#lista2'],
                  update : function(event, ui) {

                    $('#resultado').append(ui.item.parent().attr('id')+"<br/>");
                    $('#resultado').append(ui.item.parent().sortable('toArray')+"<br/>");
                    var request = $.ajax('un.php', { data : { orden : ui.item.parent().sortable('toArray') }});
                    request.done(function(mensaje) {
                        $('#resultado').append(mensaje+"<br/>");
                    });  
                  }});

                $("#lista2").sortable({connectWith : ['#lista1']});

                


            });   
  