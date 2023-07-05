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
                                {{__('app.general.credit')}}
                            </th>
                            <th>
                                {{__('app.general.debit')}}
                            </th>
                            <th>
                                {{__('app.general.total')}}
                            </th>
                            <th>
                                {{__('app.inbounds.inbounds_count')}}
                            </th>
                            <th>
                                {{__('app.pageComponents.actions')}}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-tbody">
                        @php
                            $index = 1;
                            $credits = 0;
                            $debits = 0;
                        @endphp
                        @foreach($users as $eachUser)
                            <tr>
                                <td class="sort-index">{{$index++}}</td>
                                <td class="sort-user">{{$eachUser->name}}</td>
                                <td class="sort-credit">{{addSeparator($eachUser->invoices_sum_credit)}}</td>
                                <td class="sort-debit">{{addSeparator($eachUser->invoices_sum_debit)}}</td>
                                <td class="sort-total">{{addSeparator($eachUser->invoices_sum_credit - $eachUser->invoices_sum_debit)}}</td>
                                <td class="sort-subscription-count">{{$eachUser->active_subscriptions_count}}</td>
                                <td>
                                    <div class="btn-list flex-nowrap justify-content-center">
                                        <x-buttons.history :user="$eachUser->id"/>
                                    </div>
                                </td>
                            </tr>
                        @php
                            $debits += $eachUser->invoices_sum_credit;
                            $credits += $eachUser->invoices_sum_debit;
                        @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <td class="text-center">{{addSeparator($credits)}}</td>
                        <td class="text-center">{{addSeparator($debits)}}</td>
                        <td class="text-center">{{addSeparator($credits-$debits)}}</td>
                        <td></td>
                    </tr>
                    </tfoot>
                </x-tables.default>
            </div>
        </div>
    </div>

    <x-scripts.copy/>
    <x-scripts.datatable-search/>

@endsection
