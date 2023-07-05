<header class="navbar navbar-expand-md d-print-none" data-bs-theme="dark">
    <div class="container-xl">
        <h1 class="navbar-brand navbar-brand-autodark">
            <a href="{{ route('customer.home') }}" class="text-decoration-none d-flex align-items-center">
                <img src="{{asset('static/logo_croped.png')}}" width="110" height="32" alt="{{env('APP_NAME')}}"
                    class="navbar-brand-image m-1">
                {{env('APP_NAME')}}
            </a>
        </h1>
        <div class="navbar-nav flex-row order-md-last">
            <div class="d-flex align-items-center">
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

                <x-buttons.theme-mode />
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm"
                        style="background-image: url({{asset('static/avatars/profile_white_outlined.png')}})"></span>
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
<header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar">
            <div class="container-xl">
                <ul class="navbar-nav">

                    <li class="nav-item{{Route::is('customer.home') ? ' active' : '' }}">
                        <a class="nav-link" href="{{route('customer.home')}}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                {{__('app.dashboard.home')}}
                            </span>
                        </a>
                    </li>

                    <li class="nav-item{{Route::is('customer.invoices') ? ' active' : '' }}">
                        <a class="nav-link" href="{{route('customer.invoices')}}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-history" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 8l0 4l2 2"></path>
                                    <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                {{__('app.invoices.invoices_history')}}
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
