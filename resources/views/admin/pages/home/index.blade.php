@extends('admin.layout.main')

@section('title', __('app.dashboard.home'))

@section('content')

    <div class="row row-deck row-cards">

        <div class="col-12">
            <div class="row row-cards">

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Visits</div>
                                <div class="ms-auto lh-1">
                                    <span class="text-muted" href="#" data-bs-toggle="dropdown"
                                          aria-haspopup="true" aria-expanded="false">Last 7 days</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-baseline">
                                <div class="h1 mb-0 me-2">{{collect($charts['user_visits'])->sum('count')}}</div>
                            </div>
                        </div>
                        <div id="chart-users-visits" class="chart-sm"></div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Inbounds</div>
                                <div class="ms-auto lh-1">
                                    <span class="text-muted" href="#" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">Last 7 days</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-baseline">
                                <div class="h1 mb-0 me-2">{{collect($charts['added_inbounds_count'])->sum('count')}}</div>
                            </div>
                        </div>
                        <div id="chart-inbounds" class="chart-sm"></div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Users</div>
                                <div class="ms-auto lh-1">
                                    <span class="text-muted" href="#" data-bs-toggle="dropdown"
                                          aria-haspopup="true" aria-expanded="false">Last 7 days</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-baseline">
                                <div class="h1 mb-0 me-2">{{collect($charts['added_users_count'])->sum('count')}}</div>
                            </div>
                        </div>
                        <div id="chart-users" class="chart-sm"></div>
                    </div>
                </div>

                <div class="col-sm-6">
                </div>


                <div class="col-sm-6 col-xl-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="icon icon-tabler icon-tabler-users-group" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                           <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                           <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                                           <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                           <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                                           <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                           <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        {{ $cards['user_counts']['customers'] }} {{ __('app.auth.roles.customers') }}
                                    </div>
                                    <div class="text-muted">
                                        {{ $cards['user_counts']['admins'] }} {{ __('app.auth.roles.admins') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-info text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                           <path
                                               d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                                           <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        {{__('app.inbounds.inbounds_in_use', ['count' => $cards['inbound_counts']['inUse'] ])}}
                                    </div>
                                    <div class="text-muted">
                                        {{__('app.inbounds.inbounds_not_in_use', ['count' => $cards['inbound_counts']['notInUse'] ])}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-xl-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-twitter text-white avatar">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        623 Shares
                                    </div>
                                    <div class="text-muted">
                                        16 today
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-facebook text-white avatar">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        132 Likes
                                    </div>
                                    <div class="text-muted">
                                        21 today
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="mb-3">Using Storage <strong> {{$system_statics['usedDisk']}} GB </strong>of {{$system_statics['totalDisk']}} GB</p>
                            <div class="progress progress-separated mb-3">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 44%"
                                    aria-label="Regular">
                                </div>
                                <div class="progress-bar bg-info" role="progressbar" style="width: 19%"
                                    aria-label="System">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-auto d-flex align-items-center pe-2">
                                    <span class="legend me-2 bg-primary"></span>
                                    <span>Regular</span>
                                    <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">915MB</span>
                                </div>
                                <div class="col-auto d-flex align-items-center px-2">
                                    <span class="legend me-2 bg-info"></span>
                                    <span>System</span>
                                    <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">415MB</span>
                                </div>
                                <div class="col-auto d-flex align-items-center ps-2">
                                    <span class="legend me-2"></span>
                                    <span>Free</span>
                                    <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">612MB</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    @push('scripts')
        <script src="{{ asset('libs/apexcharts/dist/apexcharts.min.js') }}"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                window.ApexCharts && (new ApexCharts(document.getElementById('chart-users-visits'), {
                    chart: {
                        type: "area",
                        fontFamily: 'inherit',
                        height: 40.0,
                        sparkline: {
                            enabled: true
                        },
                        animations: {
                            enabled: false
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    fill: {
                        opacity: .16,
                        type: 'solid'
                    },
                    stroke: {
                        width: 2,
                        lineCap: "round",
                        curve: "smooth",
                    },
                    series: [{
                        name: "Visits",
                        data: [
                            @foreach( $charts['user_visits'] as $each )'{{$each['count']}}',@endforeach
                        ],
                    }],
                    tooltip: {
                        theme: 'dark'
                    },
                    grid: {
                        strokeDashArray: 4,
                    },
                    xaxis: {
                        labels: {
                            padding: 0,
                        },
                        tooltip: {
                            enabled: false
                        },
                        axisBorder: {
                            show: false,
                        },
                        type: 'datetime',
                    },
                    yaxis: {
                        labels: {
                            padding: 4
                        },
                    },
                    labels: [
                        @foreach( $charts['user_visits'] as $each )'{{$each['date']}}',@endforeach
                    ],
                    colors: [tabler.getColor("primary")],
                    legend: {
                        show: false,
                    },
                })).render();
            });
            document.addEventListener("DOMContentLoaded", function () {
                window.ApexCharts && (new ApexCharts(document.getElementById('chart-inbounds'), {
                    chart: {
                        type: "area",
                        fontFamily: 'inherit',
                        height: 40.0,
                        sparkline: {
                            enabled: true
                        },
                        animations: {
                            enabled: false
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    fill: {
                        opacity: .16,
                        type: 'solid'
                    },
                    stroke: {
                        width: 2,
                        lineCap: "round",
                        curve: "smooth",
                    },
                    series: [{
                        name: "Inbounds",
                        data: [
                            @foreach( $charts['added_inbounds_count'] as $each )'{{$each['count']}}',@endforeach
                        ]
                    }],
                    tooltip: {
                        theme: 'dark'
                    },
                    grid: {
                        strokeDashArray: 4,
                    },
                    xaxis: {
                        labels: {
                            padding: 0,
                        },
                        tooltip: {
                            enabled: false
                        },
                        axisBorder: {
                            show: false,
                        },
                        type: 'datetime',
                    },
                    yaxis: {
                        labels: {
                            padding: 4
                        },
                    },
                    labels: [
                        @foreach( $charts['added_inbounds_count'] as $each )'{{$each['date']}}',@endforeach
                    ],
                    colors: [tabler.getColor("primary")],
                    legend: {
                        show: false,
                    },
                })).render();
            });
            document.addEventListener("DOMContentLoaded", function () {
                window.ApexCharts && (new ApexCharts(document.getElementById('chart-users'), {
                    chart: {
                        type: "area",
                        fontFamily: 'inherit',
                        height: 40.0,
                        sparkline: {
                            enabled: true
                        },
                        animations: {
                            enabled: false
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    fill: {
                        opacity: .16,
                        type: 'solid'
                    },
                    stroke: {
                        width: 2,
                        lineCap: "round",
                        curve: "smooth",
                    },
                    series: [{
                        name: "Inbounds",
                        data: [
                            @foreach( $charts['added_users_count'] as $each )'{{$each['count']}}',@endforeach
                        ]
                    }],
                    tooltip: {
                        theme: 'dark'
                    },
                    grid: {
                        strokeDashArray: 4,
                    },
                    xaxis: {
                        labels: {
                            padding: 0,
                        },
                        tooltip: {
                            enabled: false
                        },
                        axisBorder: {
                            show: false,
                        },
                        type: 'datetime',
                    },
                    yaxis: {
                        labels: {
                            padding: 4
                        },
                    },
                    labels: [
                        @foreach( $charts['added_users_count'] as $each )'{{$each['date']}}',@endforeach
                    ],
                    colors: [tabler.getColor("primary")],
                    legend: {
                        show: false,
                    },
                })).render();
            });
        </script>
    @endpush

@endsection
