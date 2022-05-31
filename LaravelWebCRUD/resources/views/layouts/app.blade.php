<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
    <head>
        <meta charset="utf-8">
        <title>Laravel Web</title>
        <meta name="description" content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{asset('assets/plugins/global/plugins.bundle.css?v=7.2.8')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.2.8')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/style.bundle.css?v=7.2.8')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="{{asset('assets/css/themes/layout/header/base/light.css?v=7.2.8')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/themes/layout/header/menu/light.css?v=7.2.8')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/themes/layout/brand/dark.css?v=7.2.8')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/themes/layout/aside/dark.css?v=7.2.8')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/plugins/custom/sweetalert/dist/sweetalert.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/wizard/wizard-4.css?v=7.1.8')}}" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
        <link href="{{asset('/css/identya.css')}}" rel="stylesheet" type="text/css" />
		@yield('css')     
		<link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}"/>  
    </head>
	<!--end::Head-->
	<!--begin::Body-->
    <body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px" cz-shortcut-listen="true">
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
			<!--begin::Logo-->
			<a href="/">
				<img style="width: 50px;" alt="identya" src="{{url('assets/media/custom_identya/identya-logotipo-negativo.svg')}}" />
			</a>
			<!--end::Logo-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<!--begin::Aside Mobile Toggle-->
				<button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
					<span></span>
				</button>
				<!--end::Aside Mobile Toggle-->
			</div>
			<!--end::Toolbar-->
		</div>
		<!--end::Header Mobile-->
        <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
            @include('layouts.menu')<!--incluye el menu de la derecha-->
        </div>
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <div id="kt_header" class="header header-fixed">
                @include('layouts.header')<!--incluye la cabecera-->
            </div>
            <div class="d-flex flex-column flex-column-fluid" id="kt_content">
				@include('layouts.subheader')<!-- incluye la subcabecera-->
				@include('flash_message')
				
				<div class="content d-flex flex-column-fluid">
					@yield('content')<!-- llama al contenido de home.blade.php-->
				</div>
			</div>
			<div class="footer bg-light-graybrown py-4 d-flex flex-lg-column" id="kt_footer">
				<!--begin::Container-->
				<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
					<!--begin::Copyright-->
					<div class="text-dark order-2 order-md-1">
						<span class="color-blue font-weight-bold mr-2">2022©</span>
						<a href="script;" target="_blank" class="text-hover-primary color-blue">Identya</a>
					</div>
					<!--end::Copyright-->
					<!--begin::Nav-->
					<div class="nav nav-dark">
						<a href="#" target="_blank" class="nav-link pl-0 pr-5" style="color:#566acc;">Acerca de</a>
						<a href="#" target="_blank" class="nav-link pl-0 pr-0" style="color:#566acc;">Contacto</a>
					</div>
					<!--end::Nav-->
				</div>
				<!--end::Container-->
			</div>
        </div>
        <!--end::Main-->
        <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#1BC5BD", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#6993FF", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#1BC5BD", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#E1E9FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
        <script src="{{asset('assets/plugins/global/plugins.bundle.js?v=7.2.8')}}"></script>
		<script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.2.8')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js?v=7.2.8')}}"></script>
		
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{asset('assets/plugins/custom/sweetalert/dist/sweetalert.min.js')}}" type="text/javascript"></script>
		@yield('scripts')
		<script>
			
		</script>
		<!--end::Page Scripts-->
    </body>
	<!--end::Body-->
</html>