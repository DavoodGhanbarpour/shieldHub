@extends('admin.layout.main')

@section('title', 'Login Logs(unauthorized)')

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
                            <th>User Agent</th>
                            <th>Platform</th>
                            <th>Browser</th>
                            <th>IP</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Creation Date</th>
                        </tr>
                    </thead>
                    <tbody class="table-tbody">
                        @php
                            $index = 1;
                        @endphp
                        @foreach($visits as $eachVisit)
                            <tr>
                                <td class="sort-index">{{$index++}}</td>
                                <td class="sort-useragent">{{$eachVisit->useragent}}</td>
                                <td class="sort-platform">{{$eachVisit->platform}}</td>
                                <td class="sort-browser">{{$eachVisit->browser}}</td>
                                <td class="sort-ip">{{$eachVisit->ip}}</td>
                                <td class="sort-username">{{ $eachVisit->request['email'] }}</td>
                                <td class="sort-password">{{ $eachVisit->request['password'] }}</td>
                                <td class="sort-created">{{$eachVisit->created_at}}</td>
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
