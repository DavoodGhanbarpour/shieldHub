@extends('admin.layout.main')

@section('title', __('app.inbounds.inbounds'))

@section('actions')
    <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
            <x-buttons.add :title="__('app.pageComponents.add') .' '. __('app.servers.server')"/>
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
                                {{__('app.general.ip')}}
                            </th>
                            <th>
                                {{__('app.general.start_date')}}
                            </th>
                            <th>
                                {{__('app.general.end_date')}}
                            </th>
                            <th>
                                {{__('app.general.description')}}
                            </th>
                            <th>
                                {{__('app.general.subscription_price_per_month')}}
                            </th>
                            <th>
                                {{__('app.pageComponents.actions')}}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-tbody">
                        @php $index = 1 @endphp
                        @foreach($servers as $eachServer)
                            <tr>
                                <td class="sort-index">{{$index++}}</td>
                                <td class="sort-title">{{$eachServer->title}}</td>
                                <td class="sort-ip">{{$eachServer->ip}}</td>
                                <td class="sort-date">
                                    {{convertDate($eachServer->start_date)}}
                                </td>
                                <td class="sort-date">
                                    {{convertDate($eachServer->end_date)}}
                                </td>
                                <td class="sort-description">
                                    {{$eachServer->description}}
                                </td>
                                <td class="sort-users-count">
                                    {{number_format($eachServer->subscription_price_per_month)}}
                                </td>
                                <td class="copy-parent">
                                    <div class="btn-list flex-nowrap justify-content-center">
                                        <x-buttons.edit :link="route('admin.servers.edit', ['server' => $eachServer->id])"/>
                                        <x-buttons.destroy :link="route('admin.servers.destroy', ['server' => $eachServer->id])"/>
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
