@extends('admin.layout.main')

@section('title', __('app.inbounds.inbounds'))

@section('actions')
    <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
            <x-buttons.add :title="__('app.pageComponents.add') .' '. __('app.inbounds.inbound')"/>
            <x-buttons.add :class="'btn-info'" :link="route('admin.inbounds.bulk.create')" :title="__('app.pageComponents.add') .' '. __('app.inbounds.inbounds')"/>
        </div>
    </div>
@endsection

@section('content')

    <div class="card">
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
                                {{__('app.general.ip').':'.__('app.general.port')}}
                            </th>
                            <th>
                                {{__('app.servers.server')}}
                            </th>
                            <th>
                                {{__('app.general.quota')}}
                            </th>
                            <th>
                                {{__('app.general.description')}}
                            </th>
                            <th>
                                {{__('app.general.users_count')}}
                            </th>
                            <th>
                                {{__('app.pageComponents.actions')}}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-tbody">
                        @php $index = 1 @endphp
                        @foreach($inbounds as $eachInbound)
                            <tr>
                                <td class="sort-index">{{$index++}}</td>
                                <td class="sort-title">{{$eachInbound->title}}</td>
                                <td class="sort-ip">
                                    {{$eachInbound->server->ip}}:<span class="text-muted">{{$eachInbound->port}}</span>
                                </td>
                                <td class="sort-server">
                                    {{$eachInbound->server->title}}
                                </td>
                                <td class="sort-quota">
                                    {{ \Carbon\Carbon::parse($eachInbound->date)->diffInDays(\Carbon\Carbon::now())  }}
                                </td>
                                <td class="sort-description">
                                    {{$eachInbound->description}}
                                </td>
                                <td class="sort-users-count">
                                    {{$eachInbound->active_subscriptions_count}}
                                </td>
                                <td class="copy-parent">
                                    <span class="d-none copy-text">{{$eachInbound->link}}</span>

                                    <div class="btn-list flex-nowrap justify-content-center">
                                        <x-buttons.copy/>
                                        <x-buttons.edit :link="route('admin.inbounds.edit', ['inbound' => $eachInbound->id])"/>
                                        <x-buttons.destroy :link="route('admin.inbounds.destroy', ['inbound' => $eachInbound->id])"/>
                                    </div>
                                </td>
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
