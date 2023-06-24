<header class="navbar navbar-expand-md d-print-none" data-bs-theme="dark">
    <div class="container-xl">
        <h1 class="navbar-brand navbar-brand-autodark">
            <a href="{{ route('customer.home') }}" class="text-decoration-none d-flex align-items-center">
                <img src="{{asset('static/logo_croped.png')}}" width="110" height="32" alt="{{env('APP_NAME')}}" class="navbar-brand-image m-1">
                {{env('APP_NAME')}}
            </a>
        </h1>
        <div class="navbar-nav flex-row order-md-last">
            <div class="d-flex align-items-center">
                <div class="row">
                    <a class="w-auto px-0" href="{{route('profile.locale.update', ['locale' => \App\Models\User::SUPPORTED_LANGUAGES['en']['key'], 'user' => auth()->user()->id])}}">
                      <span class="flag btn flag-xs flag-country-gb" role="button" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="English"></span>
                    </a>
                    <a class="w-auto" href="{{route('profile.locale.update', ['locale' => \App\Models\User::SUPPORTED_LANGUAGES['fa']['key'], 'user' => auth()->user()->id])}}">
                      <span class="flag btn flag-xs flag-country-ir" role="button" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="فارسی"></span>
                    </a>
                </div>
                
                <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="{{__('app.dashboard.enable_dark_mode')}}"
                   data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"/>
                    </svg>
                </a>
                <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="{{__('app.dashboard.enable_light_mode')}}"
                   data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"/>
                        <path
                            d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"/>
                    </svg>
                </a>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                   aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url({{asset('static/avatars/profile_white_outlined.png')}})"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{auth()->user()->name}}</div>
                        <div class="mt-1 small text-muted">{{__('app.auth.roles.'.auth()->user()->role)}}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    {{-- <a href="./profile.html" class="dropdown-item">Profile</a> --}}
                    <a href="{{ route('auth.logout') }}" class="dropdown-item">{{__('app.auth.logout')}}</a>
                </div>
            </div>
        </div>
    </div>
</header>
