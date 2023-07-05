@extends('customer.layout.main')

@section('title', __('app.invoices.invoices_history'))

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
                            {{__('app.general.date')}}
                        </th>
                        <th>
                            {{__('app.general.description')}}
                        </th>
                        <th>
                            {{__('app.general.credit')}}
                        </th>
                        <th>
                            {{__('app.general.debit')}}
                        </th>
                    </tr>
                    </thead>
                    <tbody class="table-tbody">
                    @php
                        $index = 1;
                        $credits = 0;
                        $debits = 0
                    @endphp
                    @foreach($invoices as $eachInvoice)
                        <tr>
                            <td class="sort-index">{{$index++}}</td>
                            <td class="sort-date">{{convertDate($eachInvoice->date)}}</td>
                            <td class="sort-description">{{$eachInvoice->description}}</td>
                            <td class="sort-credit">{{addSeparator($eachInvoice->credit)}}</td>
                            <td class="sort-debit">{{addSeparator($eachInvoice->debit)}}</td>
                        </tr>
                        @php
                            $debits += $eachInvoice->debit;
                            $credits += $eachInvoice->credit
                        @endphp
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">{{__('app.general.total')}}:</td>
                            <td class="text-center">{{addSeparator($credits)}}</td>
                            <td class="text-center">{{addSeparator($debits)}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">{{__('app.general.remain')}}:</td>
                            <td class="text-center" colspan="2">{{addSeparator($credits - $debits)}}</td>
                        </tr>
                        <x-general.remaining :colspan="5" :price="($credits - $debits)"/>
                    </tfoot>
                </x-tables.default>
            </div>
        </div>
    </div>

    <x-scripts.copy/>
    <x-scripts.datatable-search/>

@endsection
