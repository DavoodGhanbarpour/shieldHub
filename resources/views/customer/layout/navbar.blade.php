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
                
                <x-buttons.theme-mode/>
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
