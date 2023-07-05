@extends('admin.layout.main')

@section('title', __('app.inbounds.inbounds'))

@section('content')

    <div class="card">

        <div class="card-header">
            @include('admin.pages.users.header')
        </div>

        <div class="card-body">
            <div id="table-default" class="table-responsive">
                <x-tables.default>
                    <thead>
                        <tr>
                            <th>
                                {{__('app.pageComponents.index')}}
                            </th>
                            <th>
                                {{__('app.general.title')}}
                            </th>
                            <th>
                                {{__('app.servers.server')}}
                            </th>
                            <th>
                                {{__('app.general.start_date')}}
                            </th>
                            <th>
                                {{__('app.general.end_date')}}
                            </th>
                            <th>
                                {{__('app.general.remains')}}
                            </th>
                            <th>
                                {{__('app.general.subscription_price')}}
                            </th>
                            <th>
                                {{__('app.general.total')}}
                            </th>
                            <th>
                                {{__('app.general.description')}}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-tbody">
                        @php $index = 1 @endphp
                        @foreach($subscriptions as $eachSubscription)
                            @php $diffDayCount = \Carbon\Carbon::parse($eachSubscription->pivot->start_date)->diffInDays($eachSubscription->pivot->end_date) @endphp

                            <tr>
                                <td class="sort-index">{{$index++}}</td>
                                <td class="sort-title">{{$eachSubscription->title}}</td>
                                <td class="sort-server-title">
                                    {{$eachSubscription->server->title}}
                                    <br>
                                    {{$eachSubscription->server->ip}}:<span class="text-muted">{{$eachSubscription->port}}</span>
                                </td>
                                <td class="sort-start-date">{{$eachSubscription->pivot->start_date}}</td>
                                <td class="sort-end-date">{{$eachSubscription->pivot->end_date}}</td>
                                <td class="sort-diff">{{$diffDayCount}}</td>
                                <td class="sort-subscription-price">
                                    {{addSeparator($eachSubscription->pivot->subscription_price)}}
                                </td>
                                <td class="sort-subscription-price">
                                    {{addSeparator($eachSubscription->pivot->subscription_price * $diffDayCount)}}
                                </td>
                                <td class="sort-description">{{$eachSubscription->pivot->description}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-tables.default>
            </div>
        </div>

    </div>

    <x-scripts.copy/>
    <x-scripts.datatable-search/>

@endsection
