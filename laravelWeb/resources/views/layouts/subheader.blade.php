<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">

    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="color-blue font-weight-bold mt-2 mb-2 mr-5"></h5>
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
            <span class="color-purple-blue font-weight-bold mr-4">Tablero</span>
        </div>
    
            <div class="d-flex align-items-center">
                <div class="bg-light-graybrown rounded p-2">

                        <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1" id="kt_quick_cart_toggle">
                            @if(Request::is('view_producto*'))
                                <a href="#" class="btn font-weight-bold mr-2">
                                    <i class="icon-2x text-dark-50 flaticon2-shopping-cart-1"></i>
                                </a>
                                @endif
                        </div>

                    <span class="color-brown font-size-base font-weight-bold mr-2">Hoy:</span>
                    <span class="color-blue font-size-base font-weight-bolder">
                        {{date("d ");}}
                        @if(date("M") == "Jan")
                        Ene,
                        @endif
                        @if(date("M") == "Feb")
                        Feb,
                        @endif
                        @if(date("M") == "Mar")
                        Mar,
                        @endif
                        @if(date("M") == "Apr")
                        Abr,
                        @endif
                        @if(date("M") == "May")
                        May,
                        @endif
                        @if(date("M") == "Jun")
                        Jun,
                        @endif
                        @if(date("M") == "Jul")
                        Jul,
                        @endif
                        @if(date("M") == "Aug")
                        Ago,
                        @endif
                        @if(date("M") == "Sep")
                        Sep,
                        @endif
                        @if(date("M") == "Oct")
                        Oct,
                        @endif
                        @if(date("M") == "Nov")
                        Nov,
                        @endif
                        @if(date("M") == "Dec")
                        Dic,
                        @endif
                        {{date("y");}}
                    </span>
                </div>
            </div>
    </div>
</div>