<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Личный кабинет</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Корпоративнй портал" name="description" />
    <meta content="Корпоративный портал" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="/images/favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/grt-youtube-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/employee-style.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick-theme.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    @toastr_css
    @livewireStyles
    @wireUiScripts
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Podkova:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body{
            background: #EDEBEB!important;
            font-family: 'Montserrat', sans-serif;
        }
        .my-date{
            border:1px solid #ced4da!important;
            padding: 10px!important;
        }
        .gj-datepicker-md [role="right-icon"]{
            right: 10px!important;
            top: 10px!important;
        }
    </style>
</head>

<body data-topbar="colored">
@include("employee-navbar")

<!-- Begin page -->
<div id="layout-wrapper" class="min-vh-100">
    <!-- ============================================================== -->
    <div class="container mx-auto relative">
        @yield('content')
        <div class="fixed bottom-5 right-5">
            <a href="{{route("employee-notifications")}}">
            <button class="relative bg-[#ffa41c] text-white p-4 rounded-full shadow-lg hover:bg-[#ffa41c] focus:outline-none focus:ring-2 focus:ring-orange-300">
                💬 <small>{{\App\Models\Notification::where(["user_id"=>auth()->id(),"seen" => false])->count()}}</small>
                <span class="absolute top-0 right-0 w-3 h-3 bg-red-500 rounded-full animate-ping"></span>
            </button>
            </a>
        </div>

    </div>

</div>
<section class="bg-[#1D1D1D] py-10">
    <div class="container">
        <div class="grid grid-cols-12">
            <div class="col-span-12 md:col-span-9">
                <div class="md:flex align-items-center mx-auto text-center md:text-left">
                    <img src="{{asset("/images/footer-logo.png")}}" class="max-w-[100px] px-2 d-inline-block"/>
                    <div>
                        <p class="text-lg lg:text-lg xl:text-2xl 2xl:text-3xl text-white font-weight-bold">
                            Темир Транс Сервис
                        </p>
                        <div class="md:flex my-3">
                            <div class="text-white text-center md:text-left mr-2">
                                <i class="fas fa-envelope ml-2 text-[#F09E32]"></i>
                                tts@gmail.com
                            </div>
                            <div class="text-white mr-2 text-center md:text-left">
                                <i class="fab fa-instagram ml-2 text-[#F09E32]"></i>
                                tts.kazakhstan
                            </div>
                            <div class="text-white mr-2 text-center md:text-left">
                                <i class="fab fa-linkedin ml-2 text-[#F09E32]"></i>
                                TTS.KAZ
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 md:col-span-3 sm:py-[20px]">
                <li class="flex
                justify-content-center
                align-items-center
                text-center">
                    <a class="{{ request()->is('tech-support-ticket-list') ? 'employee-nav-link-active' : 'text-white' }} border-[1px] border-white hover:!border-[#f09e32] hover:bg-[#f09e32] nav-link text-uppercase text-md font-weight-bold h-full xl:flex align-items-center justify-content-center" href="{{ route('tech-support-ticket-list') }}">Техподдержка</a>
                </li>

            </div>
            <div class="col-span-12 mt-4">
                <li class="flex
                justify-content-center
                align-items-center
                text-center">
                    <p class="text-md text-white font-weight-bold text-center text-md-right">
                        Corp TTS © 2024 tts kazakhstan. All Rights Reserved.
                    </p>
                </li>

            </div>
        </div>
    </div>
</section>

<!-- END layout-wrapper -->
<!-- Laravel Javascript Validation -->

<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('js/grt-youtube-popup.js')}}"></script>
<script src="{{asset('js/slick.min.js')}}"></script>
<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mb.YTPlayer/3.3.9/jquery.mb.YTPlayer.min.js" integrity="sha512-rVFx7vXgVV8cmgG7RsZNQ68CNBZ7GL3xTYl6GAVgl3iQiSwtuDjTeE1GESgPSCwkEn/ijFJyslZ1uzbN3smwYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
<script src="{{ asset('vendor/pharaonic/pharaonic.select2.min.js') }}"></script>
@stack('scripts')
@livewireScripts
@livewireCalendarScripts
@if(isset($jsValidator))
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! $jsValidator->selector('#js-form') !!}
@endif
</body>
@toastr_js
@toastr_render
</html>
