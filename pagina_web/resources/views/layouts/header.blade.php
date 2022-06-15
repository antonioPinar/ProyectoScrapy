<div class="container-fluid d-flex align-items-stretch justify-content-between">
    <div>
        @include('flash_message')
    </div>
    <div class="topbar">
        <!--begin::User-->
        <div class="topbar-item">
            @if(Request::is('view_producto*'))
                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1" id="kt_quick_cart_toggle">
                        <a href="#" class="btn font-weight-bold mr-2">
                            <i class="icon-2x text-dark-50 flaticon2-shopping-cart-1"></i>
                        </a>
                    </div>
                @endif
            <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                <span class="color-blue font-weight-bold font-size-base d-none d-md-inline mr-1">Hola</span>
                <span class="color-blue font-weight-bolder font-size-base d-none d-md-inline mr-3">{{Auth::user()->getNameUser(Auth::user()->id)}}</span>
            </div>
        </div>
        <!--end::User-->
    </div>
</div>

<!-- menu usuario-->
<div id="kt_quick_user" class="offcanvas offcanvas-right p-10 offcanvas-off"> <!-- para dejar cerrado el menu derecha (off)-->
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5" kt-hidden-height="40" style="">
        <h3 class="font-weight-bold m-0">User Profile 
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <!--end::Header-->
    <!--begin::Content-->
    <div class="offcanvas-content pr-5 mr-n5 scroll ps ps--active-y" style="height: 863px; overflow: hidden;">
        <!--begin::Header-->
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
                @if(Auth::user()->hasFotoUser(Auth::user()->id))
                <div class="symbol-label"><img src="/images/{{Auth::user()->getFotoUser(Auth::user()->id)}}" width="100px"/></div>
                @else
                <div class="symbol-label"><img src="/images/generica.jpg" width="100px"/></div>
                @endif
                <i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{Auth::user()->getNameUser(Auth::user()->id)}}</a>
                <div class="text-muted mt-1">Application Developer</div>
                <div class="navi mt-2">
                    <a href="" class="navi-item">
                        <span class="navi-link p-0 pb-2">
                            <span class="navi-icon mr-1">
                                <span class="svg-icon svg-icon-lg svg-icon-primary">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Mail-notification.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"></path>
                                            <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"></circle>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="navi-text text-muted text-hover-primary">{{Auth::user()->getEmailUser(Auth::user()->id)}}</span>
                        </span>
                    </a>
                    
                    <a href="{{route('logout')}}" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    
                </div>
            </div>
        </div>
        <!--end::Notifications-->
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 863px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 300px;"></div></div></div>
    <!--end::Content-->
</div>
