@extends('layouts.app')
@section('content')

<div class="container">
                @if(Auth::user()->role_id == 1) <!-- si el usuario es admin entonces puede ver esta pestaña-->
                    @include('producto.indexProductosScrappy')
                    <!-- #include('usuario.tablaUsuarios')  hay q incluir el yield para llamar hay q estar logueados para  que funcione sino da error de variable users-->
                @else
                    @include('producto.indexProductosScrappy')
                @endif
</div>
@endsection
