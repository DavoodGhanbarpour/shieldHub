@extends('admin.layout.main')

@section('title', __('app.auth.users'))

@section('actions')
    <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
            <x-buttons.add :title="__('app.pageComponents.add') .' '. __('app.auth.user')"/>
        </div>
    </div>
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <div id="table-default" class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                    <tr>
                        <th>
                            <button class="table-sort" data-sort="sort-index">{{__('app.pageComponents.index')}}</button>
                        </th>
                        <th>
                            <button class="table-sort" data-sort="sort-name">{{__('app.general.name')}}</button>
                        </th>
                        <th>
                            <button class="table-sort" data-sort="sort-email">{{__('app.general.email')}}</button>
                        </th>
                        <th>
                            <button class="table-sort" data-sort="sort-role">{{__('app.auth.role')}}</button>
                        </th>
                        <th>
                            <button class="table-sort" data-sort="sort-inbounds">{{__('app.inbounds.inbounds')}}</button>
                        </th>
                        <th>
                            <button class="table-sort" data-sort="sort-last-visit">{{__('app.auth.last_visit')}}</button>
                        </th>
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
                            <td class="sort-role">{{__('app.auth.roles.'.$eachUser->role)}}</td>
                            <td class="sort-inbounds">{{$eachUser->inbounds_count}}</td>
                            <td class="sort-last-visit">{{$eachUser->last_visit}}</td>
                            <td>
                                <div class="btn-list flex-nowrap">

                                    <a href="{{route('admin.users.inbounds', ['user' => $eachUser->id])}}" class="btn btn-secondary my-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-broadcast" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M18.364 19.364a9 9 0 1 0 -12.728 0"></path>
                                            <path d="M15.536 16.536a5 5 0 1 0 -7.072 0"></path>
                                            <path d="M12 13m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                        </svg>
                                        {{__('app.inbounds.inbounds')}}
                                    </a>
                                    <x-buttons.edit :link="route('admin.users.edit', ['user' => $eachUser->id])"/>
                                    <x-buttons.destroy :link="route('admin.users.destroy', ['user' => $eachUser->id])"/>

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
