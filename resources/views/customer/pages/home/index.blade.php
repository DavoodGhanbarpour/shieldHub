@extends('customer.layout.main')

@section('title', 'Home')

@section('content')

<div class="card">
    <div class="card-body">
        <div id="table-default" class="table-responsive">
            <table class="table card-table table-vcenter datatable">
                <thead>
                    <tr>
                        <th><button class="table-sort" data-sort="sort-index">Index</button></th>
                        <th><button class="table-sort" data-sort="sort-title">title</button></th>
                        <th><button class="table-sort" data-sort="sort-ip">IP:PORT</button></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-tbody">
                    @php $index = 1 @endphp
                    @foreach($inbounds as $eachInbound)
                        <tr>
                            <td class="sort-index">{{$index++}}</td>
                            <td class="sort-title">{{$eachInbound->title}}</td>
                            <td class="sort-ip">
                                {{$eachInbound->ip}}:<span class="text-muted">{{$eachInbound->port}}</span>
                            </td>
                            <td>
                                <span class="d-none row-inbound-link">{{$eachInbound->link}}</span>

                                <div class="btn-list flex-nowrap">
                                    <a class="btn border-blue text-blue inbound-copy-button" data-id="{{$eachInbound->id}}">
                                        Copy
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
