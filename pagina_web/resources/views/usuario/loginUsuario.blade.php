<!DOCTYPE html>
<html lang="en">
    <!--begin::Head-->
    <head><base href="../../../">
        <meta charset="utf-8" />
        <title>Login | nft-myticket</title>
        <meta name="description" content="Login page example" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Page Custom Styles(used by this page)-->
        <link href="{{ url('assets/css/login.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/css/pages/login/login-1.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Page Custom Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="{{ url('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles-->
        <!--begin::Layout Themes(used by all pages)-->
        <!--end::Layout Themes-->
        <link rel="shortcut icon" />
        <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}"/> 
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body id="kt_body" class="header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-secondary-enabled page-loading">
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-login" id="kt_login">
                <div class="col-md-10 flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
                    <!--begin::Content body-->
                    <div class="d-flex flex-column-fluid flex-center">
                        <!--begin::Signin-->
                        <div class="login-form login-signin col-md-6 card p-10 login-content" id="login-signin">
                            <!--begin::Form-->
                            <form method="POST" action="{{ route('login') }}" class="form" id="kt_login_signin_form">
                                @csrf
                                <!--begin::Title-->
                                <div class="pb-5 pt-lg-0 pt-5 text-center">
                                    <h3 class="text-dark font-size-h4 font-size-h1-lg">Bienvenido/a</span></h3>
                                </div>
                                <!--begin::Title-->
                                <!--begin::Form group-->
                                @csrf
                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-dark">Email</label>
                                    <input class="form-control h-auto py-4 px-4 bg-light-green @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email') }}" autocomplete="off" />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!--end::Form group-->
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <div class="d-flex justify-content-between mt-n5">
                                        <label class="font-size-h6 font-weight-bolder text-dark pt-5 mr-10">Contraseña</label>
                                        <a href="javascript:;" class="font-size-h8 font-weight-bolder enlaces pt-5" id="kt_login_forgot">¿Has olvidado tu contraseña?</a>
                                    </div>
                                    <input class="form-control h-auto py-4 px-4 bg-light-green @error('password') is-invalid @enderror" type="password" name="password" autocomplete="off" />
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!--end::Form group-->
                                <!--begin::Action-->
                                <div class="d-flex justify-content-around">
                                    <a href="javascript:;" id="kt_login_signup" class="btn btn-login-light font-weight-bolder py-4 px-6">Crear cuenta</a>
                                    <button type="submit" id="kt_login_signin_submit" class="btn-login btn btn-primary font-weight-bolder py-4 px-6">Iniciar sesión</button>
                                </div>
                                <!--end::Action-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Signin-->
                        <!--begin::Signup-->
                        <div class="login-form login-signup col-md-6 card p-7 login-content" id="login-signup">
                            <!--begin::Form-->
                            <form class="form" method="POST" action="{{ route('register') }}" novalidate="novalidate" id="kt_login_signup_form">
                                <div class="pb-5 pt-lg-0 pt-5 text-center">
                                    <h3 class="text-dark font-size-h4 font-size-h1-lg">Registro</h3>
                                    <p class="font-size-h6 color-subtitle">Introduce tus datos para crear tu cuenta</p>
                                </div>
                                <!--begin::Form group-->
                                @csrf
                                <div class="form-group">
                                    <input class="form-control h-auto py-4 px-4 rounded-lg font-size-h6 bg-light-green @error('name') is-invalid @enderror" type="text" placeholder="Nombre" name="name" autocomplete="off" />
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        <input type="hidden" name="error" value="1">
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control h-auto py-4 px-4 rounded-lg font-size-h6 bg-light-green @error('surnames') is-invalid @enderror" type="text" placeholder="Apellidos" name="surnames" autocomplete="off" />
                                    @error('surnames')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        <input type="hidden" name="error" value="1">
                                    </span>
                                    @enderror
                                </div>
                                <!--end::Form group-->
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <input class="form-control h-auto py-4 px-4 rounded-lg font-size-h6 bg-light-green @error('email_r') is-invalid @enderror" type="email" placeholder="Email" name="email" autocomplete="off" />
                                    @error('email_r')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <input type="hidden" name="error" value="1">
                                        </span>
                                    @enderror
                                </div>
                                <!--end::Form group-->
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <input class="form-control h-auto py-4 px-4 rounded-lg font-size-h6 bg-light-green @error('password_r') is-invalid @enderror" type="password" placeholder="Contraseña" name="password" autocomplete="off" />
                                    @error('password_r')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <input type="hidden" name="error" value="1">
                                        </span>
                                    @enderror
                                </div>
                                <!--end::Form group-->
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <input class="form-control h-auto py-4 px-4 rounded-lg font-size-h6 bg-light-green" type="password" placeholder="Confirmar contraseña" name="password_confirmation" autocomplete="off" />
                                </div>
                                <!--end::Form group-->
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <label class="checkbox mb-0">
                                        <input type="checkbox" name="agree" />
                                        <span></span>
                                        <div class="ml-2">Acepto los <a href="http://nft-myticket.io/blog/politica-de-privacidad/" style="color: #0071bc ">términos y condiciones</a>.</div>
                                    </label>
                                </div>
                                <!--end::Form group-->
                                <!--begin::Form group-->
                                <div class="form-group d-flex flex-wrap mb-0">
                                    <button type="submit" id="kt_login_signup_submit" class="btn-login btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Crear</button>
                                    <button type="button" id="kt_login_signup_cancel" class="btn btn-login-light font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancelar</button>
                                </div>
                                <!--end::Form group-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Signup-->
                        <!--begin::Forgot-->
                        <div class="login-form login-forgot card p-7 login-content" id="login-forgot">
                            <!--begin::Form-->
                            <form class="form" method="POST" action="{{ route('password.email') }}" novalidate="novalidate" id="kt_login_forgot_form">
                                {!! csrf_field() !!}
                                <!--begin::Title-->
                                <div class="pb-5 pt-lg-0 pt-5">
                                    <h3 class="text-dark font-size-h4 font-size-h1-lg">¿Olvidaste tu contraseña?</h3>
                                    <p class="color-subtitle">Ingrese su correo electrónico para restablecer su contraseña</p>
                                </div>
                                <!--end::Title-->
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <input class="form-control h-auto py-4 px-4 rounded-lg bg-light-green" type="email" placeholder="Email" name="email" value="{{ old('email') }}" id="email" autocomplete="off" />
                                </div>
                                <!--end::Form group-->
                                <!--begin::Form group-->
                                <div class="form-group d-flex justify-content-between mb-0">
                                    <button type="button" id="kt_login_forgot_cancel" class="btn btn-login-light font-weight-bolder px-8 py-4 my-3">Volver</button>
                                    <button type="submit" id="kt_login_forgot_submit" class="btn btn-login btn-primary font-weight-bolder px-8 py-4 my-3">Enviar clave</button>
                                </div>
                                <!--end::Form group-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Forgot-->
                    </div>
                    <!--end::Content body-->
                    <!--Footer-->
                    <!--<div class="custom-footer">
                        <span class="color-subtitle"> ©2021 <b class="text-dark">nft-myticket</b></span>
                    </div>-->
                    @if(session()->get('msg_register'))
                    <input id="msg_register_success" name="msg_register_success" type="hidden" value="true">
                    @else
                    <input id="msg_register_success" name="msg_register_success" type="hidden" value="false">
                    @endif
                </div>
                <!--end::Content-->
            </div>
            <!--end::Login-->
        </div>
        <!--end::Main-->
        <script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#1BC5BD", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#6993FF", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#1BC5BD", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#E1E9FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
        <!--end::Global Config-->
        <!--begin::Global Theme Bundle(used by all pages)-->
        <script src="{{ url('assets/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ url('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
        <script src="{{ url('assets/js/scripts.bundle.js') }}"></script>
        <!--end::Global Theme Bundle-->
        <!--begin::Page Scripts(used by this page)-->
        <script src="{{ url('assets/js/login.js') }}"></script> 
        <!--end::Page Scripts-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            
        </script>
    </body>
    <!--end::Body-->
</html>