<header class="navbar navbar-expand-md d-print-none d-none d-xl-flex" data-bs-theme="dark">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">

        </h1>
        <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex align-items-center">
                <div class="row">
                    <a class="w-auto px-0"
                        href="{{route('profile.locale.update', ['locale' => \App\Models\User::SUPPORTED_LANGUAGES['en']['key'], 'user' => auth()->user()->id])}}">
                        <span class="flag btn flag-xs flag-country-gb" role="button" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" data-bs-original-title="English"></span>
                    </a>
                    <a class="w-auto"
                        href="{{route('profile.locale.update', ['locale' => \App\Models\User::SUPPORTED_LANGUAGES['fa']['key'], 'user' => auth()->user()->id])}}">
                        <span class="flag btn flag-xs flag-country-ir" role="button" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" data-bs-original-title="فارسی"></span>
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
                    <a href="{{ route('auth.logout') }}" class="dropdown-item justify-content-between">
                        {{__('app.auth.logout')}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                            <path d="M9 12h12l-3 -3"></path>
                            <path d="M18 15l3 -3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
