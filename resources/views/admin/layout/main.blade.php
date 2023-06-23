<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>{{env('APP_NAME')}} | @yield('title')</title>
    <!-- CSS files -->
    <link href="{{ asset('css/tabler.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tabler-flags.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tabler-payments.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/demo.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/custom-css.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('libs/select2/select2.css') }}" rel="stylesheet"/>
    @stack('styles')



    <style>
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>
<body>
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
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="{{ asset('libs/select2/select2.js') }}"></script>


<script>
    $(document).ready(function() {
        
        $('.select2').select2();
        toastr.options = {
            'positionClass' : "toast-bottom-right",
        }
    });
</script>

@stack('scripts')

@if( $errors->any() )
    <script>
        toastr.error('@foreach ($errors->all() as $error)<li class="mx-3"> {{ $error }} </li> @endforeach')
    </script>
@endif

</body>
</html>
