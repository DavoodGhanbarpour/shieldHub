@extends('customer.layout.main')

@section('title', __('app.dashboard.home'))

@section('content')

    <div class="row row-deck row-cards">
        <div class="col-md-12 col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{__('app.inbounds.available_inbounds')}}</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter">
                        @php $index = 1 @endphp
                        @foreach($inbounds as $eachInbound)
                            <tr>
                                <td class="sort-index">{{$index++}}</td>
                                <td class="sort-title">{{$eachInbound->title}}</td>
                                <td class="sort-ip">
                                    {{$eachInbound->server->ip}}:<span class="text-muted">{{$eachInbound->port}}</span>
                                </td>
                                <td class="sort-date">
                                    {{convertDate($eachInbound->date)}}
                                </td>
                                <td class="sort-quota">
                                    {{
                                        __('app.general.days_remain',['count' =>
                                            \Carbon\Carbon::parse($eachInbound->pivot->start_date)->diffInDays($eachInbound->pivot->end_date)
                                        ])
                                    }}
                                </td>
                                <td class="sort-description">
                                    {{$eachInbound->pivot->description}}
                                </td>
                                <td class="copy-parent">
                                    <span class="d-none copy-text">{{$eachInbound->link}}</span>

                                    <div class="btn-list flex-nowrap">
                                        <x-buttons.qrcode :class="'w-100'" data-bs-toggle="modal" data-bs-target="#QRCodeModal"/>
                                    </div>
                                    <div class="btn-list flex-nowrap">
                                        <x-buttons.copy :class="'w-100'"/>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{__('app.inbounds.inbounds_clients')}}</h3>
                </div>

                <div class="card-body">
                    <div class="row row-cards">


                        <div class="col-md-6 col-lg-12">
                            <a download
                               href="https://github.com/2dust/v2rayNG/releases/download/1.8.5/v2rayNG_1.8.5.apk"
                               target="_blank" class="card card-sm social-media-card" role="button">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                        <span class="bg-green text-white avatar">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="icon icon-tabler icon-tabler-brand-{{__('app.platforms.android')}}"
                                                 width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                 stroke="currentColor" fill="none" stroke-linecap="round"
                                                 stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 10l0 6"></path>
                                                <path d="M20 10l0 6"></path>
                                                <path
                                                    d="M7 9h10v8a1 1 0 0 1 -1 1h-8a1 1 0 0 1 -1 -1v-8a5 5 0 0 1 10 0"></path>
                                                <path d="M8 3l1 2"></path>
                                                <path d="M16 3l-1 2"></path>
                                                <path d="M9 18l0 3"></path>
                                                <path d="M15 18l0 3"></path>
                                             </svg>
                                        </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                v2rayNG
                                            </div>
                                            <div class="text-info">
                                                {{__('app.platforms.android')}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6 col-lg-12">
                            <a href="https://s28.picofile.com/file/8462366668/v2ray_for_Windows.rar.html"
                               target="_blank" class="card card-sm social-media-card" role="button">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                        <span class="bg-primary text-white avatar">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="icon icon-tabler icon-tabler-brand-windows" width="24"
                                                 height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                 fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M17.8 20l-12 -1.5c-1 -.1 -1.8 -.9 -1.8 -1.9v-9.2c0 -1 .8 -1.8 1.8 -1.9l12 -1.5c1.2 -.1 2.2 .8 2.2 1.9v12.1c0 1.2 -1.1 2.1 -2.2 1.9z"></path>
                                                <path d="M12 5l0 14"></path>
                                                <path d="M4 12l16 0"></path>
                                            </svg>
                                        </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                v2rayN
                                            </div>
                                            <div class="text-info">
                                                {{ __('app.platforms.windows') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6 col-lg-12">
                            <a href="https://apps.apple.com/us/app/foxray/id6448898396?platform=iphone" target="_blank"
                               class="card card-sm social-media-card" role="button">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                        <span class="bg-white text-dark avatar">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="icon icon-tabler icon-tabler-brand-apple" width="24" height="24"
                                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                 stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M9 7c-3 0 -4 3 -4 5.5c0 3 2 7.5 4 7.5c1.088 -.046 1.679 -.5 3 -.5c1.312 0 1.5 .5 3 .5s4 -3 4 -5c-.028 -.01 -2.472 -.403 -2.5 -3c-.019 -2.17 2.416 -2.954 2.5 -3c-1.023 -1.492 -2.951 -1.963 -3.5 -2c-1.433 -.111 -2.83 1 -3.5 1c-.68 0 -1.9 -1 -3 -1z"></path>
                                                <path d="M12 4a2 2 0 0 0 2 -2a2 2 0 0 0 -2 2"></path>
                                            </svg>
                                        </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                FoXray
                                            </div>
                                            <div class="text-info">
                                                {{__('app.platforms.ios')}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6 col-lg-12">
                            <a href="https://apps.apple.com/us/app/v2box-v2ray-client/id6446814690?platform=iphone"
                               target="_blank" class="card card-sm social-media-card" role="button">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                        <span class="bg-white text-dark avatar">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="icon icon-tabler icon-tabler-brand-apple" width="24" height="24"
                                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                 stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M9 7c-3 0 -4 3 -4 5.5c0 3 2 7.5 4 7.5c1.088 -.046 1.679 -.5 3 -.5c1.312 0 1.5 .5 3 .5s4 -3 4 -5c-.028 -.01 -2.472 -.403 -2.5 -3c-.019 -2.17 2.416 -2.954 2.5 -3c-1.023 -1.492 -2.951 -1.963 -3.5 -2c-1.433 -.111 -2.83 1 -3.5 1c-.68 0 -1.9 -1 -3 -1z"></path>
                                                <path d="M12 4a2 2 0 0 0 2 -2a2 2 0 0 0 -2 2"></path>
                                            </svg>
                                        </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                V2Box
                                            </div>
                                            <div class="text-info">
                                                {{__('app.platforms.ios')}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6 col-lg-12">
                            <a href="https://apps.apple.com/us/app/foxray/id6448898396?platform=mac" target="_blank"
                               class="card card-sm social-media-card" role="button">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                        <span class="bg-dark text-white avatar">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="icon icon-tabler icon-tabler-brand-apple" width="24" height="24"
                                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                 stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M9 7c-3 0 -4 3 -4 5.5c0 3 2 7.5 4 7.5c1.088 -.046 1.679 -.5 3 -.5c1.312 0 1.5 .5 3 .5s4 -3 4 -5c-.028 -.01 -2.472 -.403 -2.5 -3c-.019 -2.17 2.416 -2.954 2.5 -3c-1.023 -1.492 -2.951 -1.963 -3.5 -2c-1.433 -.111 -2.83 1 -3.5 1c-.68 0 -1.9 -1 -3 -1z"></path>
                                                <path d="M12 4a2 2 0 0 0 2 -2a2 2 0 0 0 -2 2"></path>
                                            </svg>
                                        </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                FoXray
                                            </div>
                                            <div class="text-info">
                                                {{__('app.platforms.mac')}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6 col-lg-12">
                            <a href="https://apps.apple.com/us/app/v2box-v2ray-client/id6446814690?platform=mac"
                               target="_blank" class="card card-sm social-media-card" role="button">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                        <span class="bg-dark text-white avatar">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="icon icon-tabler icon-tabler-brand-apple" width="24" height="24"
                                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                 stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M9 7c-3 0 -4 3 -4 5.5c0 3 2 7.5 4 7.5c1.088 -.046 1.679 -.5 3 -.5c1.312 0 1.5 .5 3 .5s4 -3 4 -5c-.028 -.01 -2.472 -.403 -2.5 -3c-.019 -2.17 2.416 -2.954 2.5 -3c-1.023 -1.492 -2.951 -1.963 -3.5 -2c-1.433 -.111 -2.83 1 -3.5 1c-.68 0 -1.9 -1 -3 -1z"></path>
                                                <path d="M12 4a2 2 0 0 0 2 -2a2 2 0 0 0 -2 2"></path>
                                            </svg>
                                        </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                V2Box
                                            </div>
                                            <div class="text-info">
                                                {{__('app.platforms.mac')}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="QRCodeModal" tabindex="-1">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">QR Code</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="QRCodeDisplay" class="modal-body">

                </div>
                <div class="modal-footer copy-parent">
                    <span class="d-none copy-text"></span>
                    <x-buttons.copy :class="'w-100'"/>
                </div>
            </div>
        </div>
    </div>



    @push('scripts')
        <script type="text/javascript">

            var qrcode = new QRCode(document.getElementById("QRCodeDisplay"), {
                width : 200,
                height : 200,
                useSVG: true
            });

            $(document).on( 'click', '.qrcode-button', function(){

                makeCode($(this));
                $('#QRCodeModal .copy-text').text($(this).closest('.copy-parent').find('.copy-text').text());
            });

            function makeCode(element) {

                qrcode.makeCode(element.closest('.copy-parent').find('.copy-text').text());
            }
        </script>
    @endpush

    <x-scripts.copy/>

    @push('styles')
        <style>
            .social-media-card {
                background-image: none;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                background-size: contain;
            }

            .social-media-card:hover {
                background-image: linear-gradient(
                    to bottom,
                    #62666c00,
                    #49525d38
                ), url("{{asset('static/icons/download.svg')}}");
                opacity: 1;
            }
        </style>
    @endpush

@endsection
