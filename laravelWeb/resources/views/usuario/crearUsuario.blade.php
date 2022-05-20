@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">{{ __('Dashboard') }}</div>
                <form method="POST" action="{{ route('usuario.store') }}" enctype="multipart/form-data"> <!-- llama al store para guardar la info en la bd-->
                    {{ csrf_field() }}
                    <div class="modal-header border-0">
                      <div class="form-group">
                        <h5 class="color-blue" id="newModalLabel">Nuevo Usuario</h5>
                        <span class="color-muted mt-3 font-weight-bold font-size-sm">Crea un nuevo usuario introduciendo sus datos.</span>
                      </div>
                    </div>
                    <div class="modal-body py-0">
                      <div class="form-group">
                        <label class="font-weight-bolder text-dark">Image</label>
                        <input type="file" name="foto_id" class="form-control h-auto py-4 px-4 bg-light-brown" placeholder="image"/>
                      </div>
                    </div>
                    <div class="modal-body py-0">
                        <div class="form-group">
                          <label class="font-weight-bolder text-dark">Nombre</label>
                          <input class="form-control h-auto py-4 px-4 bg-light-brown" type="text" name="name" required/>
                        </div>
                        <div class="form-group">
                          <label class="font-weight-bolder text-dark">Email</label>
                          <input class="form-control h-auto py-4 px-4 bg-light-brown" type="text" name="email" required/>
                        </div>
                        <div class="form-group">
                          <label class="font-weight-bolder text-dark">Password</label>
                          <input class="form-control h-auto py-4 px-4 bg-light-brown" type="password" name="password" required/>
                        </div>
                        <div class="form-group">
                          <label class="font-weight-bolder text-dark">Asignar Rol</label>
                          <select name="role_id" class="form-control h-auto py-4 px-4 bg-light-brown">
                              <option value="1">Administrador</option>
                              <option value="2">Usuario</option>
                          </select>
                        </div>
                        <div class="modal-footer d-flex justify-content-between border-0">
                          <a href="{{route('home')}}" class="btn btn-brown font-weight-bold">Cancelar</a>
                          <button type="submit" class="btn btn-blue font-weight-bold">Crear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection