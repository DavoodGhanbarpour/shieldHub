@extends('customer.layout.main')

@section('title', __('app.dashboard.home'))

@section('content')

<div class="row row-deck row-cards">
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Social Media Traffic</h3>
            </div>

            <div class="card-body">
                <div class="row row-cards">


                    <div class="col-12">
                        <div class="card card-sm social-media-card" role="button">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-green text-white avatar">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-android" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 10l0 6"></path>
                                                <path d="M20 10l0 6"></path>
                                                <path d="M7 9h10v8a1 1 0 0 1 -1 1h-8a1 1 0 0 1 -1 -1v-8a5 5 0 0 1 10 0"></path>
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
                                        <div class="text-muted">
                                            {{ __('app.auth.roles.admins') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-8">
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
                                {{$eachInbound->ip}}:<span class="text-muted">{{$eachInbound->port}}</span>
                            </td>
                            <td class="sort-description">
                                {{$eachInbound->description}}
                            </td>
                            <td class="copy-parent">
                                <span class="d-none copy-text">{{$eachInbound->link}}</span>

                                <div class="btn-list flex-nowrap">
                                    <x-buttons.copy :class="'copy-button'" data-id="{{$eachInbound->id}}"/>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    @include('components.scripts.copy')
@endpush

@push('styles')
    <style>
        .social-media-card {
            background-image: url("{{asset('static/icons/download.svg')}}");
            background-repeat: no-repeat;
            background-position: center;
            background-size: 15%;
            transition: opacity 0s ease-in-out;
        }
        .social-media-card:hover {
            opacity: 0.5; /* مقدار شفافیت SVG هنگام hover */
        }
    </style>
@endpush

@endsection
