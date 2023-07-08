@extends('admin.layout.main')

@section('title', __('app.invoices.invoices'))

@section('content')

    <div class="card">

        <div class="card-header">
            @include('admin.pages.users.header')
        </div>

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
                    @foreach($invoices as $eachInvoice)
                        <tr>
                            <td class="sort-index">{{$index++}}</td>
                            <td class="sort-date">{{$eachInvoice->date}}</td>
                            <td class="sort-description">{{$eachInvoice->description}}</td>
                            <td class="sort-credit">{{addSeparator($eachInvoice->credit)}}</td>
                            <td class="sort-debit">{{addSeparator($eachInvoice->debit)}}</td>
                            <td>
                                <div class="btn-list flex-nowrap justify-content-center">
                                    <x-buttons.edit
                                        :link="route('admin.invoices.edit', ['invoice' => $eachInvoice->id])"/>
                                    <x-buttons.destroy
                                        :link="route('admin.invoices.destroy', ['invoice' => $eachInvoice->id])"/>
                                </div>
                            </td>
                        </tr>
                    @php
                        $debits += $eachInvoice->debit;
                        $credits += $eachInvoice->credit;
                    @endphp
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-center">{{addSeparator($credits)}}</td>
                            <td class="text-center">{{addSeparator($debits)}}</td>
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
