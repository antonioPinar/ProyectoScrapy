@extends('layouts.app')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="d-flex flex-column-fluid">
        <div class="container">
            
            <div class="row">
                <!--begin::Col-->
                @foreach ($productos as $producto)
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b card-stretch">
                        <!--begin::Body-->
                        <div class="card-body pt-4">
                            <form method="POST" action="{{ route('add_product') }}" enctype="multipart/form-data"> <!-- llama al store para guardar la info en la bd-->
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $producto->id }}" id="idp" name="idp">
                                @foreach($items as $item)
                                <input type="hidden" value="1" id="cantidad_prod" name="cantidad_prod">
                                @endforeach

                            <!--begin::User-->
                            <div class="d-flex align-items-end mb-7">
                                <!--begin::Pic-->
                                <div class="d-flex align-items-center mb-7">
                                    <!--begin::Pic-->
                                    <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                                        <div class="symbol symbol-50 symbol-lg-100">
                                            <img src="assets/media/products/{{$producto->img}}" >
                                            <input type="file" src="assets/media/products/{{$producto->img}}" id="imgp" name="imgp" style="display: none;">
                                        </div>
                                    </div>
                                    <!--end::Pic-->

                                    <!--begin::Title-->
                                    <div class="d-flex flex-column">
                                        <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{$producto->titulo}}</a>
                                        <input type="hidden" value="{{$producto->titulo}}" id="titulo" name="titulo">
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::User-->
                            <!--begin::Desc-->
                            <div class="mb-7">
                                <div class="align-items-center ">
                                    <span class="text-dark-75 font-weight-bolder mr-2">Descripcion:</span>
                                    <p class="mb-7">{{$producto->descripcion}}</p>
                                    <input type="hidden" value="{{$producto->descripcion}}" id="descripcion" name="descripcion">
                                    
                                </div>
                            </div>
                            <!--end::Desc-->
                            <!--begin::Info-->
                            <div class="mb-7">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-dark-75 font-weight-bolder mr-2">Precio:</span>
                                    <span class="text-muted font-weight-bold">{{$producto->precio}} €</span>
                                    <input type="hidden" value="{{$producto->precio}}" id="precio" name="precio">
                                </div>
                            </div>
                            <!--end::Info-->
                            <button type="submit" class="btn btn-block btn-sm btn-light-warning font-weight-bolder text-uppercase py-4">Agregar al Carrito</button>
                            
                        </form>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
                @endforeach
                <!--end::Col-->
            </div>
        </div>
    </div>
</div>


<!-- menu carrito compra-->
<div id="kt_quick_cart" class="offcanvas offcanvas-right p-10 offcanvas-off">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7" kt-hidden-height="46" style="">
        <h4 class="font-weight-bold m-0">Shopping Cart</h4>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_cart_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <!--end::Header-->

    <!--begin::Content-->
    <div class="offcanvas-content">
        <!--begin::Wrapper-->
        <div class="offcanvas-wrapper mb-5 scroll-pull scroll ps ps--active-y" style="height: 240px; overflow: hidden;">
            <!--begin::Item-->
            
            @foreach($items as $item)
            <div class="d-flex align-items-center justify-content-between py-8">
                <div class="d-flex flex-column mr-2">
                    <a href="#" class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">{{$item->titulo}}</a>
                    <div class="d-flex align-items-center mt-2">
                        <span class="font-weight-bold mr-1 text-dark-75 font-size-lg">{{$item->precio}}€</span>
                        <span class="text-muted mr-1">for</span>
                        <span class="font-weight-bold mr-2 text-dark-75 font-size-lg"> {{$item->cantidad_prod}} </span>
                        <a href="#" class="btn btn-xs btn-light-success btn-icon mr-2">
                            <i class="ki ki-minus icon-xs"></i>
                        </a>
                        <a href="#" class="btn btn-xs btn-light-success btn-icon">
                            <i class="ki ki-plus icon-xs"></i>
                        </a>
                    </div>
                </div>
                <a href="#" class="symbol symbol-70 flex-shrink-0">
                    <img src="assets/media/products/{{$item->img}}" title="" alt="">
                </a>
            </div>
            @endforeach
            <!--end::Item-->
            <!--begin::Separator-->
            <div class="separator separator-solid"></div>
            <!--end::Separator-->

        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: -2px; height: 240px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 90px;"></div></div></div>
        <!--end::Wrapper-->
        <!--begin::Purchase-->
        <div class="offcanvas-footer" kt-hidden-height="113" style="">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <span class="font-weight-bold text-muted font-size-sm mr-2">Total</span>
                <span class="font-weight-bolder text-dark-50 text-right">{{$totalCompra}}€</span>
            </div>  
            <div class="text-right">
                <a href="{{route('comprar_orden')}}" class="btn btn-primary text-weight-bold">Place Order</a>
            </div>
        </div>
        <!--end::Purchase-->
    </div>
    <!--end::Content-->
</div>
@endsection