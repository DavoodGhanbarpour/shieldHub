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
    <title>{{__('app.auth.login')}}</title>
    <!-- CSS files -->
    @include('components.locale.main-styles')

    <link href="{{ asset('css/tabler-flags.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tabler-payments.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/demo.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/custom-css.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet"/>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <style>
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body class=" d-flex flex-column" data-bs-theme="dark">
    <script src="{{ asset('js/demo-theme.min.js?1684106062') }}"></script>
    <div class="page page-center">
      <div class="container container-normal py-4">
        <div class="row align-items-center g-4">
          <div class="col-lg">
            <div class="container-tight">
              <div class="card card-md">
                <div class="card-body p-4">

                  <div class="row">
                    <a class="w-auto px-0" href="{{ route('auth.login', [ App\Models\User::SUPPORTED_LANGUAGES['en']['key'] ]) }}">
                      <span class="flag btn flag-sm flag-country-gb" role="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="English"></span>
                    </a>
                    <a class="w-auto" href="{{ route('auth.login', [ App\Models\User::SUPPORTED_LANGUAGES['fa']['key'] ]) }}">
                      <span class="flag btn flag-sm flag-country-ir" role="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="فارسی"></span>
                    </a>
                    
                    <x-buttons.theme-mode :class="'w-auto'"/>
                  </div>

                  <h2 class="h2 text-center mb-4">{{__('app.login.login_to_your_account')}}</h2>
                  <form action="{{route('auth.authenticate', [config()->get('app.locale')])}}" method="post" autocomplete="off" novalidate>
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">{{__('app.general.email_address')}}</label>
                      <input type="email" class="form-control" name="email" placeholder="{{__('app.general.email')}}" autocomplete="off">
                    </div>
                    <div class="mb-2">
                      <label class="form-label">
                          {{__('app.passwords.password')}}
                      </label>
                      <div class="input-group input-group-flat">
                        <input type="password" id="password" class="form-control" name="password" placeholder="{{__('app.passwords.password')}}" autocomplete="off">
                        <span class="input-group-text">
                          <a href="#" class="link-secondary" id="passwordDisplay" title="{{__('app.passwords.show_password')}}" data-bs-toggle="tooltip">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                              <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                              <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                            </svg>
                          </a>
                        </span>
                      </div>
                    </div>
                    <div class="mb-2">
                      <label class="form-check">
                        <input type="checkbox" class="form-check-input" value="1" name="remember"/>
                        <span class="form-check-label">{{__('app.login.remember')}}</span>
                      </label>
                    </div>
                    <div class="form-footer">
                      <button type="submit" class="btn btn-primary w-100">{{__('app.login.sign_in')}}</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg d-none d-lg-block">
            <img src="{{ asset('static/illustrations/undraw_secure_login_pdn4.svg') }}" height="300" class="d-block mx-auto" alt="">
          </div>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('js/tabler.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/demo.min.js?1684106062') }}" defer></script>
    <script>
      $(document).on( 'click', '#passwordDisplay', function(){

        if ( $(this).hasClass('text-info') ) {
          $(this).removeClass('text-info');
          $(this).attr('data-bs-original-title', '{{__('app.passwords.show_password')}}').tooltip('show');
          $('#password').attr('type', 'password');
        } else {
          $(this).addClass('text-info');
          $(this).attr('data-bs-original-title', '{{__('app.passwords.hide_password')}}').tooltip('show');
          $('#password').attr('type', 'text');
        }
      });
    </script>

    <x-alerts.toastr />

  </body>
</html>
