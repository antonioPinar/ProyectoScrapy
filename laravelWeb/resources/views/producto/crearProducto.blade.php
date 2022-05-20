@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">{{ __('Dashboard') }}</div>
                <form method="POST" action="{{ route('new_product') }}" enctype="multipart/form-data"> <!-- llama al store para guardar la info en la bd-->
                    {{ csrf_field() }}
                    <div class="modal-header border-0">
                      <div class="form-group">
                        <h5 class="color-blue" id="newModalLabel">Nuevo Producto</h5>
                        <span class="color-muted mt-3 font-weight-bold font-size-sm">Crea un nuevo producto introduciendo los datos.</span>
                      </div>
                    </div>
                    <div class="modal-body py-0">
                      <div class="form-group">
                        <label class="font-weight-bolder text-dark">Imagen</label>
                        <input type="file" name="img" class="form-control h-auto py-4 px-4 bg-light-brown" placeholder="image"/>
                      </div>
                    </div>
                    <div class="modal-body py-0">
                        <div class="form-group">
                          <label class="font-weight-bolder text-dark">Titulo</label>
                          <input class="form-control h-auto py-4 px-4 bg-light-brown" type="text" name="titulo" required/>
                        </div>
                        <div class="form-group">
                          <label class="font-weight-bolder text-dark">Precio</label>
                          <input class="form-control h-auto py-4 px-4 bg-light-brown" type="text" name="precio" required/>
                        </div>
                        <div class="form-group">
                          <label class="font-weight-bolder text-dark">Cantidad</label>
                          <input class="form-control h-auto py-4 px-4 bg-light-brown" type="text" name="cantidad" required/>
                        </div>
                        <div class="form-group">
                          <label class="font-weight-bolder text-dark">Descripcion</label>
                          <textarea class="form-control h-auto py-4 px-4 bg-light-brown" rows="5" cols="40" type="text" name="descripcion"></textarea>
                        </div>
                        <div class="modal-footer d-flex justify-content-between border-0">
                          <a href="{{route('index_producto')}}" class="btn btn-brown font-weight-bold">Cancelar</a>
                          <button type="submit" class="btn btn-blue font-weight-bold">Crear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection