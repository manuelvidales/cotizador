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
    let input3 = $('#formcotizar input[name="plazo"]');

    let formData = {
        contado: $(input1).val(),
        inicial: $(input2).val(),
        plazo: $(input3).val(),
    }
    console.log(formData);

    $.ajax({
        type: 'POST',
        url: '/cotizador',
        dataType: 'json',
        data: formData,
        success: function(data){
          console.log(data);
          $(msg).prepend(`
          <div class="alert alert-primary">Respuesta: <label style= "font-weight: bold;">`+ data +`</label></div>`);
          
        },
        error: function(error){
            console.log(error);
        }
    });
    
});