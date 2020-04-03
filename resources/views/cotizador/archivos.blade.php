@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="alert alert-info text-center" role="alert">
                      <h3><strong>Subir Archivos</strong></h3>
                       </div>
                </div>
                <div class="card-body">
            
            <form method="POST" action="{{ route('filesave') }}" enctype="multipart/form-data" file="true">
            @csrf
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Archivo</span>
                </div>
                <div class="custom-file">
                 <input type="file" name="filenew" class="custom-file-input" id="customFile" required>
                 <label class="custom-file-label" for="customFile">Seleciona tu archivo PDF o Excel</label>
                 </div>
            </div>
            <div>
            <label style="color:red">{!! $errors->first('filenew', '<small>:message</small><br>') !!}</label>
            </div>

            <div class="justify-content-end">
            <button type="submit" class="btn btn-success btn-lg btn-block"> <strong>Enviar <i class="fas fa-paper-plane fa-lg"></i></strong> </button>
            </div>
        </form>
<hr>
        <div class=".col">
            <li class="list-group-item"><button type="button" class="btn btn-outline-secondary btn-lg btn-block documentos"> <i class="far fa-folder"></i><strong>://Documentos</strong> </button></li>
        </div>
        
    <br>
        <div class=".col">
                <!-- tabla archivos-->

                <table class="table table-hover .table-responsive table-sm">
                    <thead>
                      <tr>
                        <th scope="col">Nombre de archivo</th>
                        <th scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tbody id="mostrararchivos">
                        
                    </tbody>
                    </table>             
            </div>
        <div id="paginate"></div>    
            </div>
        </div>
    </div>
    </div>

<script>
// leer nombre del archivo
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<script src="{{ asset('js/archivos.js')}}" ></script>
</div>
@endsection