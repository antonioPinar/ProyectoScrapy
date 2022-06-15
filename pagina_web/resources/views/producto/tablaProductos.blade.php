@extends('layouts.app')
@section('content')

@if(Auth::user()->role_id == 1) <!-- si el usuario es admin entonces puede ver esta pestaña-->
<div class="container">
    <div class="row justify-content-center">

                <div class="col-md-12 pl-0">
                    <div class="card card-custom">
                        <div class="card-body">
                            <!--begin: Datatable-->
                            <div class="card-header">
                                <div class="card-title">
                                    <div class="input-group custom col-md-12">
                                        <input id="search_products" type="text" class="form-control custom-search-table my-auto" placeholder="Buscar">
                                        <div class="input-group-append my-auto" style="height: fit-content;">
                                            <button class="btn btn-secondary custom-btn-search bg-blue" type="button"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="datatable datatable-bordered datatable-head-custom" id="list_products" style="width: 100%;"></div>
                            @include('producto.editProducto')
                        </div>
                    </div>
                </div>
                
    </div>
</div>

@else
<div class="container">
        @include('producto.viewProducto')
</div>
@endif
@endsection

@section('scripts')
<script>
    var url_img = "{!! url('assets/media/custom_identya') !!}";
    var url_upload_img = "{!! url('assets/media/products') !!}";

    var url_list_productos = "{!! url('list_productos') !!}";

    var url_delete_product = "{!! url('delete_producto') !!}";
    var url_get_product = "{!! url('get_producto') !!}";
</script>

<script src="{{url('assets/js/table_product.js')}}"></script>
@endsection