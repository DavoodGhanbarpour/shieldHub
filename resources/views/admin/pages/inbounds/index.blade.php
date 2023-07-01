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
                            <button class="table-sort" data-sort="sort-ip">{{__('app.general.ip').':'.__('app.general.port')}}</button>
                        </th>
                        <th>
                            <button class="table-sort" data-sort="sort-date">{{__('app.general.date')}}</button>
                        </th>
                        <th>
                            <button class="table-sort" data-sort="sort-date">{{__('app.general.quota')}}</button>
                        </th>
                        <th>
                            <button class="table-sort" data-sort="sort-description">{{__('app.general.description')}}</button>
                        </th>
                        <th>
                            <button class="table-sort" data-sort="sort-users-count">{{__('app.general.users_count')}}</button>
                        </th>
                        <th>{{__('app.pageComponents.actions')}}</th>
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
                                <td class="sort-date">
                                    {{convertDate($eachInbound->date)}}
                                </td>
                                <td class="sort-quota">
                                    {{ \Carbon\Carbon::parse($eachInbound->date)->diffInDays(\Carbon\Carbon::now())  }}
                                </td>
                                <td class="sort-description">
                                    {{$eachInbound->description}}
                                </td>
                                <td class="sort-users-count">
                                    {{$eachInbound->users_count}}
                                </td>
                                <td class="copy-parent">
                                    <span class="d-none copy-text">{{$eachInbound->link}}</span>

                                    <div class="btn-list flex-nowrap">
                                        <x-buttons.copy/>
                                        <x-buttons.edit :link="route('admin.inbounds.edit', ['inbound' => $eachInbound->id])"/>
                                        <x-buttons.destroy :link="route('admin.inbounds.destroy', ['inbound' => $eachInbound->id])"/>
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
