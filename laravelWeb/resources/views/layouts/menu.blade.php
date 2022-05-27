<!--LOGO MENU-->
<div class="brand flex-column-auto" id="kt_brand" kt-hidden-height="65">
    <!--begin::Logo-->
    <a href="#" class="brand-logo">
        <img alt="Logo" src="{{asset('assets/media/custom_identya/identya-logotipo-negativo.svg')}}" width="90%" height="auto">
    </a>
    <!--end::Logo-->
    <!--begin::Toggle-->
    <button class="brand-toggle btn btn-sm px-0 ml-4" id="kt_aside_toggle">
        <span class="svg-icon svg-icon svg-icon-xl">
            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Angle-double-left.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                    <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)"></path>
                    <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)"></path>
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
    </button>
    <!--end::Toolbar-->
</div>

<!--MENU-->
<div class="aside-menu-wrapper flex-column-fluid bg-white" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4 scroll ps ps--active-y bg-white" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500" style="height: 350px; overflow: hidden;">
        <!--begin::Menu Nav-->
        <ul class="menu-nav">
            <li class="menu-item {{ Request::is('home*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{!! route('home') !!}" class="menu-link">
                    @if(Request::is('home*')) <!--si el menu esta seleccionado entonces cambia color-->
                    <span class="svg-icon menu-icon"><img src="{{url('assets/media/custom_identya/menu-inicio-blanco.svg')}}" width="20px" height="auto"></span>
                    <span class="menu-text text-white">Inicio</span>
                    @else
                    <span class="svg-icon menu-icon"><img src="{{url('assets/media/custom_identya/menu-inicio-azul.svg')}}" width="20px" height="auto"></span>
                    <span class="menu-text text-color-purple-blue">Inicio</span>
                    @endif
                </a>
            </li>
            @if(Auth::user()->role_id == 1) <!-- si el usuario es admin entonces puede ver esta pestaña-->
            <li class="menu-item {{ Request::is('crear_user*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{!! route('crear_user') !!}" class="menu-link">
                    @if(Request::is('crear_user*')) <!--si el menu esta seleccionado entonces cambia color-->
                    <span class="svg-icon menu-icon"><img src="{{url('assets/media/custom_identya/accion-editar-gris.svg')}}" width="20px" height="auto"></span>
                    <span class="menu-text text-white">Crear Usuario</span>
                    @else
                    <span class="svg-icon menu-icon"><img src="{{url('assets/media/custom_identya/accion-editar-gris.svg')}}" width="20px" height="auto"></span>
                    <span class="menu-text text-color-purple-blue">Crear Usuario</span>
                    @endif
                </a>
            </li>
            @endif
            @if(Auth::user()->role_id == 1) <!-- si el usuario es admin entonces puede ver esta pestaña-->
                <li class="menu-item {{ Request::is('index_producto*') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{!! route('index_producto') !!}"  class="menu-link menu-toggle">
                        @if(Request::is('index_producto*')) <!--si el menu esta seleccionado entonces cambia color-->
                        <span class="svg-icon menu-icon"><img src="{{url('assets/media/custom_identya/menu-productos-blanco.svg')}}" width="20px" height="auto"></span>
                        <span class="menu-text text-white">Productos</span>
                        @else
                        <span class="svg-icon menu-icon"><img src="{{url('assets/media/custom_identya/menu-productos-azul.svg')}}" width="20px" height="auto"></span>
                        <span class="menu-text text-color-purple-blue">Productos</span>
                        @endif
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{!! route('index_producto') !!}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text ">Tabla Productos</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{!! route('crear_producto') !!}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text ">Añadir Nuevo Producto</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{!! route('view_producto') !!}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text ">Ver Productos</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @else
                <li class="menu-item {{ Request::is('view_producto*') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{!! route('view_producto') !!}"  class="menu-link menu-toggle">
                        @if(Request::is('view_producto*')) <!--si el menu esta seleccionado entonces cambia color-->
                        <span class="svg-icon menu-icon"><img src="{{url('assets/media/custom_identya/menu-productos-blanco.svg')}}" width="20px" height="auto"></span>
                        <span class="menu-text text-white">Productos</span>
                        @else
                        <span class="svg-icon menu-icon"><img src="{{url('assets/media/custom_identya/menu-productos-azul.svg')}}" width="20px" height="auto"></span>
                        <span class="menu-text text-color-purple-blue">Productos</span>
                        @endif
                    </a>
                </li>
            @endif
        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>
<!--SUBMENU-->
<!--begin::Footer-->
