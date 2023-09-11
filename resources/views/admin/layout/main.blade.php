<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html dir="{{App\Models\User::SUPPORTED_LANGUAGES[config()->get('app.locale')]['dir']}}" lang="{{config()->get('app.locale')}}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    @yield('head')
    <title>{{env('APP_NAME')}} | @yield('title')</title>
    <!-- CSS files -->
    <link href="{{ asset('libs/select2/select2.css') }}" rel="stylesheet"/>
    @include('components.locale.main-styles')

    <link href="{{ asset('css/tabler-flags.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tabler-payments.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/demo.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/custom-css.css') }}" rel="stylesheet"/>
    <link href="{{ asset('libs/datatables/datatables.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet"/>
    @stack('styles')
    <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>



    <style>
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }

        .dataTables_filter {
            display: none;
        }
    </style>
</head>
<body class="layout-fluid">
    <script src="{{ asset('js/demo-theme.min.js?1684106062') }}"></script>
    <div class="page">
        <!-- Sidebar -->
        @include('admin.layout.sidebar')

        <!-- Navbar -->
        @include('admin.layout.navbar')

        <div class="page-wrapper">
            <!-- Page header -->
            @include('admin.layout.header')


            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">

                    @yield('content')

                </div>
            </div>

            <!-- Page Footer -->
            @include('admin.layout.footer')


        </div>
    </div>

    <!-- Tabler Core -->
    <script src="{{ asset('js/tabler.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('js/demo.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('libs/select2/select2.js') }}"></script>
    <script src="{{ asset('libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('libs/clipboard-js/clipboard.min.js') }}"></script>
    <script src="{{ asset('libs/qrcodejs/qrcode.js') }}"></script>
    <script src="{{ asset('js/number-format.js') }}" defer></script>

    <script>
        $(document).ready(function () {

            $('.select2').select2();
        });
    </script>

    <x-alerts.toastr />
    @stack('scripts')

</body>
</html>
