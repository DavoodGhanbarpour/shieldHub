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
                            <td class="sort-date">{{isset($eachInvoice['date'])?convertDate($eachInvoice['date']):''}}</td>
                            <td class="sort-description">{{$eachInvoice['description']}}</td>
                            <td class="sort-price">
                                <script>
                                    console.log('credit: ' + '{{$eachInvoice['credit']}}');
                                    console.log('debit: ' + '{{$eachInvoice['debit']}}');
                                </script>
                                @if ($eachInvoice['credit'] > 0)
                                    <strong class="text-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 5l0 14"></path>
                                            <path d="M5 12l14 0"></path>
                                        </svg>
                                        {{addSeparator($eachInvoice['credit'])}}
                                    </strong>
                                @else
                                    <strong class="text-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-minus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M5 12l14 0"></path>
                                        </svg>
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
                        <x-general.remaining :colspan="5" :price="($credits - $debits)"/>
                    </tfoot>
                </x-tables.default>
            </div>
        </div>
    </div>

    <x-scripts.copy/>

    @push('styles')
        <style>
            .table.dataTable thead th, table.dataTable thead td, table.dataTable tfoot th, table.dataTable tfoot td {
                text-align: center !important;
            }
        </style>
    @endpush
@endsection
