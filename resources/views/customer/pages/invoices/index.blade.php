@extends('customer.layout.main')

@section('title', __('app.invoices.invoices_history'))

@section('content')

    <div class="card">
        <div class="card-body">
            <div id="table-default" class="table-responsive">
                <x-ribbon.default/>
                <x-tables.default>
                    <thead>
                    <tr>
                        <th class="w-10">
                            {{__('app.pageComponents.index')}}
                        </th>
                        <th class="w-20">
                            {{__('app.general.date')}}
                        </th>
                        <th class="w-50">
                            {{__('app.general.description')}}
                        </th>
                        <th class="w-20">
                            {{__('app.general.price')}}
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
                            <td class="sort-date">{{isset($eachInvoice['date']) ? convertDate($eachInvoice['date']) : ''}}</td>
                            <td class="sort-description">{{$eachInvoice['description']}}</td>
                            <td class="sort-price">
                                @if ($eachInvoice['credit'] > 0)
                                    <strong class="text-success">
                                        +
                                        {{addSeparator($eachInvoice['credit'])}}
                                    </strong>
                                @else
                                    <strong class="text-danger">
                                        -
                                        {{addSeparator($eachInvoice['debit'])}}
                                    </strong>
                                @endif
                            </td>
                        </tr>
                        @php
                            $debits += $eachInvoice['debit'];
                            $credits += $eachInvoice['credit']
                        @endphp
                    @endforeach
                    </tbody>
                    <tfoot>
                        <x-general.remaining :colspan="4" :price="($credits - $debits)"/>
                    </tfoot>
                </x-tables.default>
            </div>
        </div>
    </div>

    <x-scripts.datatable/>
    <x-scripts.copy/>

    @push('styles')
        <style>
            .table.dataTable thead th, table.dataTable thead td, table.dataTable tfoot th, table.dataTable tfoot td {
                text-align: center !important;
            }
        </style>
    @endpush
@endsection
