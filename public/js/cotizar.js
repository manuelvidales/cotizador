/*
 * ::cotizador desde excel.
 */
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('#formcotizar').submit(function(e){
    e.preventDefault();
    let msg = $('#resultados');
    let input1 = $('#formcotizar input[name="contado"]');
    let input2 = $('#formcotizar input[name="inicial"]');
    let input3 = $('#formcotizar select[name="plazo"]');
    let formData = {
        contado: $(input1).val(),
        inicial: $(input2).val(),
        plazo: $(input3).val(),
    }
    $.ajax({
        type: 'POST',
        url: '/cotizador',
        dataType: 'json',
        data: formData,
        success: function(data){
            $(msg).html('');
            console.log(data);
            $(msg).prepend(`
              <div class="alert alert-primary">
              <div class="table-responsive">
              <table class="table table-striped"">
                  <tbody>
                    <tr>
                      <th scope="row">CUOTA:</th>
                      <td >$ `+ data[1] +`</td>
                    </tr>
                    <tr>
                      <th scope="row">PRECIO FACTURA:</th>
                      <td>$ `+ data[0] +`</td>
                    </tr>
                     <tr>
                      <th scope="row">PRECIO FINAL:</th>
                      <td>$ `+ data[2] +`</td>
                    </tr>
                  </tbody>
                </table>
                </div>
                </div>`);
        $(input1).val('');
        $(input2).val('');
        $(input3).val('Selecionar...');          
        },
        error: function(error){
            $(msg).html('');
            console.log(error);
              $(msg).prepend(`
              <div class="alert alert-danger">
                <p>Error al consultar: Revise los campos y Vuelva a intentarlo</p>
                <p><strong>Prube borrando las cookies</strong></p>
              </div>`);
        }
    });
});