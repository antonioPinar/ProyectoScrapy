@extends('layouts.app')
@section('content')

<div class="container mt-10">
    <div class="col-md-12 pl-0">
      <div class="card card-custom">
          <div class="card-header">
              <div class="card-title">
                  <div class="input-group custom col-md-12">
                      <input id="search_users" type="text" class="form-control custom-search-table my-auto" placeholder="Buscar">
                      <div class="input-group-append my-auto" style="height: fit-content;">
                          <button class="btn btn-secondary custom-btn-search bg-blue" type="button"><i class="fa fa-search"></i></button>
                      </div>
                  </div>
              </div>

          </div>
          <!--begin::Card body-->
          <div class="card-body">
              <!--begin: Datatable-->
              <div class="datatable datatable-bordered datatable-head-custom" id="list_users" style="width: 100%;"></div>
              @include('usuario.editUsuario')
              <!--end: Datatable-->
          </div>
          <!--begin::Card body-->
      </div>
  </div>
</div>

@endsection
@section('scripts')
<script>
    var url_img = "{!! url('assets/media/custom_identya') !!}";
    var url_upload_img = "{!! url('images') !!}";

    var url_delete_user = "{!! url('delete_user') !!}";
    var url_get_user = "{!! url('get_user') !!}";

    var url_list_usuarios = "{!! url('list_usuarios') !!}";
    var url_list_normal_user = "{!! url('list_usuarios_normales') !!}";
</script>

<script src="{{url('assets/js/table.js')}}"></script>
@endsection