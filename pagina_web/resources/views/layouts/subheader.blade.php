
<div class="d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url('/assets/media/bg/bg-9.jpg')">
    <div class="container">
        <!--begin::Topbar-->
        <div class="d-flex justify-content-between align-items-center border-bottom border-white py-7">
            <div class="d-flex align-items-center flex-wrap mr-2">
                <h5 class="color-blue font-weight-bold mt-2 mb-2 mr-5"></h5>
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <span class="color-purple-blue font-weight-bold mr-4">Tablero</span>
            </div>

            <div class="d-flex">
                <a href="#" class="font-size-h6 font-weight-bold">Community</a>
                <a href="#" class="font-size-h6 font-weight-bold ml-8">Visit Blog</a>
                <span class="color-brown font-size-base font-weight-bold ml-8">Hoy:</span>
            <span class="color-blue font-size-base font-weight-bolder ml-2">
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
        <!--end::Topbar-->
        <div class="d-flex align-items-stretch text-center flex-column py-40">
            <!--begin::Heading-->
            <h1 class="text-dark font-weight-bolder mb-12">Bienvenidos a Scrappy Retail</h1>
            <!--end::Heading-->
            <!--begin::Form-->
            <form class="d-flex position-relative w-75 px-lg-40 m-auto">
                <div class="input-group">
                    <!--begin::Icon-->
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white border-0 py-7 px-8">
                            <span class="svg-icon svg-icon-xl">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/Search.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                    </div>
                    <!--end::Icon-->
                    <!--begin::Input-->
                    <input type="text" class="form-control h-auto border-0 py-7 px-1 font-size-h6" placeholder="Ask a question">
                    <!--end::Input-->
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>