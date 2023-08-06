@extends('admin.layout.main')

@section('title', __('app.auth.users'))

@section('content')

    <div class="card">
        <div class="card-body">
            <div id="table-default" class="table-responsive">

                <x-tables.default>

                    <thead>
                        <tr>
                            <th>{{__('app.pageComponents.index')}}</th>
                            <th>{{__('app.general.name')}}</th>
                            <th>{{__('app.general.email')}}</th>
                            <th>{{__('app.inbounds.inbounds')}}</th>
                            <th>{{__('app.auth.last_visit')}}</th>
                            <th>{{__('app.pageComponents.actions')}}</th>

                        </tr>
                    </thead>
                    <tbody class="table-tbody">
                        @php $index = 1 @endphp
                        @foreach($users as $eachUser)
                            <tr>
                                <td class="sort-index">{{$index++}}</td>
                                <td class="sort-name">{{$eachUser->name}}</td>
                                <td class="sort-email">{{$eachUser->email}}</td>
                                <td class="sort-inbounds-count">{{$eachUser->inbounds_count}}</td>
                                <td class="sort-last-visit">{{$eachUser->last_visit}}</td>
                                <td>
                                    <div class="btn-list flex-nowrap justify-content-center">
                                        <x-buttons.history :user="$eachUser->id"/>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </x-tables.default>

            </div>
        </div>
    </div>

    <x-scripts.datatable-search/>

@endsection
