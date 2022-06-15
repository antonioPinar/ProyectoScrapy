
<div class="modal fade" id="editUsuario" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="card-header">{{ __('Dashboard') }}</div>
                        <form method="POST" action="{{ route('edit_usuario') }}" enctype="multipart/form-data">
                         <!--llama al update y le pasa el parametro para actualizar el registro-->
                            {{ csrf_field()}}
                            <div class="modal-header border-0">
                                <div class="form-group">
                                  <h5 class="color-blue" id="editModalLabel">Editar Usuario</h5>
                                  <span class="color-muted mt-3 font-weight-bold font-size-sm">Edita el usuario introduciendo sus datos.</span>
                                </div>
                              </div>
                              <div class="modal-body py-0">
                                <input type="hidden" name="id" id="ide">
                                  <div class="form-group">
                                    <label class="font-weight-bolder text-dark">Nombre</label>
                                    <input class="form-control h-auto py-4 px-4 bg-light-brown" type="text" name="name" id="namee"/>
                                  </div>
                                  <div class="form-group">
                                    <label class="font-weight-bolder text-dark">Email Adress</label>
                                    <input type="text" class="form-control h-auto py-4 px-4 bg-light-brown" type="email" name="email" id="emaile" required>
                                  </div>
                                  <div class="form-group">
                                    <label class="font-weight-bolder text-dark">Asignar Rol</label>
                                    <select name="role_id" id="role_ide" class="form-control select-gray">
                                        <option value="1">Administrador</option>
                                        <option value="2">Usuario</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label class="font-weight-bolder text-dark">Imagen del Usuario <span class="text-muted">(opcional)</span></label>
                                    <input class="form-control h-auto py-4 px-4" type="file" accept="image/png, image/jpg, image/jpeg" name="foto_id" id="foto_ide"/>
                                  </div>
                                  <div class="form-group">
                                    <span class="text-muted">Máximo 1 fichero.</span><br>
                                    <span class="text-muted">Peso máx. 16 MB.</span><br>
                                    <span class="text-muted">Tipos permitidos: png, jpg, jpeg.</span>
                                  </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-between border-0">
                                    <button type="button" class="btn btn-brown font-weight-bold" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-blue font-weight-bold">Guardar cambios</button>
                                </div>
                        </form>
      </div>
    </div>
</div>
