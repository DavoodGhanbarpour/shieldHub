@extends('admin.layout.main')

@section('title', __('app.inbounds.inbounds'))

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
                                {{__('app.auth.user')}}
                            </th>
                            <th>
                                {{__('app.general.debit')}}
                            </th>
                            <th>
                                {{__('app.general.credit')}}
                            </th>
                            <th>
                                {{__('app.general.credit')}}
                            </th>
                            <th>
                                {{__('app.pageComponents.actions')}}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-tbody">
                        @php $index = 1 @endphp
                        @foreach($users as $eachUser)
                            <tr>
                                <td class="sort-index">{{$index++}}</td>
                                <td class="sort-user">{{$eachUser->name}}</td>
                                <td class="sort-credit">{{number_format($eachUser->credit)}}</td>
                                <td class="sort-debit">{{number_format($eachUser->debit)}}</td>
                                <td class="sort-debit">{{''}}</td>
                                <td>
                                    <div class="btn-list flex-nowrap justify-content-center">
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
