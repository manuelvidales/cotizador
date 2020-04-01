@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="alert alert-success text-center" role="alert">
                      <h3><strong>COTIZADOR</strong></h3>
                       </div>
                </div>
                <div class="card-body">

                    <form id="formcotizar">

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" >PRECIO CONTADO</span>
                          <span class="input-group-text">$</span>
                        </div>
                        <input type="text" class="form-control" id="contado" name="contado" placeholder="Ingresar cantidad" aria-label="preciocontado" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">INICIAL</span>
                          <span class="input-group-text">$</span>
                        </div>
                        <input type="text" class="form-control" id="inicial" name="inicial" placeholder="Ingresar cantidad" aria-label="inicial" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" >PLAZO</label>
                          <span class="input-group-text">#</span>
                        </div>
                        <select class="custom-select" id="plazo" name="plazo">
                          <option selected>Selecionar...</option>
                          <option value="1">3</option>
                          <option value="6">6</option>
                          <option value="9">9</option>
                          <option value="12">12</option>
                          <option value="15">15</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="24">24</option>
                          <option value="27">27</option>
                          <option value="30">30</option>
                          <option value="36">36</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success"> CALCULAR CUOTAS </button>
                    </form>
<hr>
                    <div class="card-footer" >
                        <div id="resultados"> </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection