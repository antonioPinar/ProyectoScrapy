@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                @if(Auth::user()->role_id == 1) <!-- si el usuario es admin entonces puede ver esta pestaña-->
                    @include('usuario.tablaUsuarios') <!-- hay q incluir el yield para llamar hay q estar logueados para  que funcione sino da error de variable users-->
                @else
                    @include('usuario.viewUsuario')
                @endif
            </div>
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
