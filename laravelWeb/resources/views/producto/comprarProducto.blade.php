@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder font-size-h3 text-dark">My Shopping Cart</span>
        </h3>
        <div class="card-toolbar">
            <div class="dropdown dropdown-inline">
                <a href="{{ route('view_producto') }}" class="btn btn-primary font-weight-bolder font-size-sm">Continue Shopping</a>
            </div>
        </div>
    </div>
    <!--end::Header-->
    <div class="card-body">
        <!--begin::Shopping Cart-->
        <div class="table-responsive">
            <table class="table">
                <!--begin::Cart Header-->
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-right">Precio</th>
                        <th></th>
                    </tr>
                </thead>
                <!--end::Cart Header-->
                <tbody>
                    <!--begin::Cart Content-->
                    <tr>
                        <td class="d-flex align-items-center font-weight-bolder">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-60 flex-shrink-0 mr-4 bg-light">
                                <div class="symbol-label" style="background-image: url('/metronic/theme/html/demo1/dist/assets/media/products/11.png')"></div>
                            </div>
                            <!--end::Symbol-->
                            <a href="#" class="text-dark text-hover-primary">Street Sneakers</a>
                        </td>
                        <td class="text-center align-middle">
                            <a href="javascript:;" class="btn btn-xs btn-light-success btn-icon mr-2">
                                <i class="ki ki-minus icon-xs"></i>
                            </a>
                            <span class="mr-2 font-weight-bolder">1</span>
                            <a href="javascript:;" class="btn btn-xs btn-light-success btn-icon">
                                <i class="ki ki-plus icon-xs"></i>
                            </a>
                        </td>
                        <td class="text-right align-middle font-weight-bolder font-size-h5">$90.00</td>
                        <td class="text-right align-middle">
                            <a href="#" class="btn btn-danger font-weight-bolder font-size-sm">Remove</a>
                        </td>
                    </tr>
                    <!--begin::Cart Footer-->
                    <tr>
                        <td colspan="2"></td>
                        <td class="font-weight-bolder font-size-h4 text-right">Subtotal</td>
                        <td class="font-weight-bolder font-size-h4 text-right">$1538.00</td>
                    </tr>

                    <tr>
                        <td colspan="4" class="border-0 text-muted text-right pt-0">Excludes Delivery. GST Included</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="border-0 pt-10">
                            <form>
                                <div class="form-group row">
                                    <div class="col-md-3 d-flex align-items-center">
                                        <label class="font-weight-bolder">Apply Voucher</label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="input-group w-100">
                                            <input type="text" class="form-control" placeholder="Voucher Code">
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary" type="button">Apply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </td>
                        <td colspan="2" class="border-0 text-right pt-10">
                            <a href="#" class="btn btn-success font-weight-bolder px-8">Proceed to Checkout</a>
                        </td>
                    </tr>
                    <!--end::Cart Footer-->
                </tbody>
            </table>
        </div>
        <!--end::Shopping Cart-->
    </div>
</div>
    </div>
</div>
@endsection