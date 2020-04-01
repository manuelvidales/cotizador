@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="alert alert-primary text-center" role="alert">
                      <h3><strong>RESulTADOS</strong></h3>
                       </div>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label>CUOTA:</label>
                    <input type="text" class="form-control" value="{{ $vcuota }}">
                    </div>

                    <div class="form-group">
                        <label>PRECIO FACTURA:</label>
                    <input type="text" class="form-control" value="{{ $pfactura }}">
                    </div>

                    <div class="form-group">
                        <label>PRECIO FINAL:</label>
                    <input type="text" class="form-control" value="{{ $pfinal }}">
                    </div>

                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection