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
                <table class="table card-table table-vcenter datatable">
                    <thead>
                    <tr>
                        <th>
                            <button class="table-sort" data-sort="sort-index">{{__('app.pageComponents.index')}}</button>
                        </th>
                        <th>
                            <button class="table-sort" data-sort="sort-title">{{__('app.general.title')}}</button>
                        </th>
                        <th>
                            <button class="table-sort" data-sort="sort-ip">{{__('app.general.ip')}}</button>
                        </th>
                        <th>
                            <button class="table-sort" data-sort="sort-date">{{__('app.general.start_date')}}</button>
                        </th>
                        <th>
                            <button class="table-sort" data-sort="sort-date">{{__('app.general.end_date')}}</button>
                        </th>
                        <th>
                            <button class="table-sort" data-sort="sort-description">{{__('app.general.description')}}</button>
                        </th>
                        <th>
                            <button class="table-sort" data-sort="sort-users-count">{{__('app.general.subscription_price_per_month')}}</button>
                        </th>
                        <th>{{__('app.pageComponents.actions')}}</th>
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
                                    {{$eachServer->subscription_price_per_month}}
                                </td>
                                <td class="copy-parent">
                                    <div class="btn-list flex-nowrap">
                                        <x-buttons.edit :link="route('admin.servers.edit', ['server' => $eachServer->id])"/>
                                        <x-buttons.destroy :link="route('admin.servers.destroy', ['server' => $eachServer->id])"/>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
        @include('components.scripts.copy')
    @endpush

@endsection
