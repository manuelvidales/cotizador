/*
 * ::cotizador desde excel.
 */
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//documentos
$(document).on('click', '.documentos', function(){
    let tabla = $('#mostrararchivos');
    let tablaall = $('#admin');
    let alerta = $('#alerta');
      $.ajax({
          type:'GET',
          url:'/mostrararchivos',
          success: function(data){
            $(tabla).html('');
            $(tablaall).html('');
            $(alerta).html('');
            console.log(data);        
           for (x in data) {
              $(tabla).append(`<tr data-id="`+data[x]+`">
              <td>`+data[x]+`</td>
              <td>
                  <a href="/files/`+data[x]+`" class="btn btn-primary btn-sm"><i class="far fa-file-alt"></i></a>
              </td>                
            </tr>`);          
            }               
          },
          error: function(error){
            console.log(error);
          }
      });
  });
  $(document).on('click', '.documentosall', function(){
    let tabla = $('#mostrararchivos');
    let tablaall = $('#admin');
    let alerta = $('#alerta');
      $.ajax({
          type:'GET',
          url:'/mostrararchivos',
          success: function(data){
            $(tabla).html('');
            $(tablaall).html('');
            $(alerta).html('');
            console.log(data);        
           for (x in data) {
              $(tabla).append(`<tr data-id="`+data[x]+`">
              <td>`+data[x]+`</td>
              <td>
                  <a href="/files/`+data[x]+`" class="btn btn-primary btn-sm"><i class="far fa-file-alt"></i></a>
                  <a href="/removefile/`+data[x]+`" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
              </td>                
            </tr>`);          
            }               
          },
          error: function(error){
            console.log(error);
          }
      });
  });