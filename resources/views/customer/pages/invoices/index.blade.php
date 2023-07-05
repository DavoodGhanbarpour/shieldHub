@extends('customer.layout.main')

@section('title', __('app.invoices.invoices').' '.__('app.general.history'))

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
                                {{__('app.general.description')}}
                            </th>
                            <th>
                                {{__('app.general.date')}}
                            </th>
                            <th>
                                {{__('app.general.debit')}}
                            </th>
                            <th>
                                {{__('app.general.credit')}}
                            </th>
                            <th>
                                {{__('app.general.remaining')}}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-tbody">
                        @php $index = 1; @endphp
                        @foreach($invoices as $eachInvoice)
                            <tr>
                                <td class="sort-index">{{$index++}}</td>
                                <td class="sort-description">
                                    {{$eachInvoice->description}}
                                </td>
                                <td class="sort-date">
                                    {{convertDate($eachInvoice->date)}}
                                </td>
                                <td class="sort-debit">{{addSeparator($eachInvoice->debit)}}</td>
                                <td class="sort-credit">{{addSeparator($eachInvoice->credit)}}</td>
                                <td class="sort-remaining">{{addSeparator($eachInvoice->debit - $eachInvoice->credit)}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">Final Price:</td>
                            <td>50,043,531,000</td>
                        </tr>
                    </tfoot>
                </x-tables.default>
            </div>
        </div>
    </div>

    <x-scripts.copy/>
    <x-scripts.datatable-search/>

@endsection
