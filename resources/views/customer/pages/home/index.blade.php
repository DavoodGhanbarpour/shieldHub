@extends('customer.layout.main')

@section('title', 'Home')

@section('content')

<div class="row row-deck row-cards">
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Social Media Traffic</h3>
            </div>
            <table class="table card-table table-vcenter">
                <thead>
                    <tr>
                        <th>Network</th>
                        <th colspan="2">Visitors</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Instagram</td>
                        <td>3,550</td>
                        <td class="w-50">
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-primary" style="width: 71.0%"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Twitter</td>
                        <td>1,798</td>
                        <td class="w-50">
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-primary" style="width: 35.96%"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Facebook</td>
                        <td>1,245</td>
                        <td class="w-50">
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-primary" style="width: 24.9%"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>TikTok</td>
                        <td>986</td>
                        <td class="w-50">
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-primary" style="width: 19.72%"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Pinterest</td>
                        <td>854</td>
                        <td class="w-50">
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-primary" style="width: 17.08%"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>VK</td>
                        <td>650</td>
                        <td class="w-50">
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-primary" style="width: 13.0%"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Pinterest</td>
                        <td>420</td>
                        <td class="w-50">
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-primary" style="width: 8.4%"></div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-12 col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Available Configs</h3>
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
                                    <a class="btn border-blue text-blue copy-button" data-id="{{$eachInbound->id}}">
                                        Copy
                                    </a>
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

@endsection
