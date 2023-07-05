@extends('admin.layout.main')

@section('title', __('app.invoices.invoices'))

@section('actions')
    <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
            <x-buttons.add :title="__('app.pageComponents.add') .' '. __('app.invoices.invoice')"/>
        </div>
    </div>
@endsection

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
                                {{__('app.general.date')}}
                            </th>
                            <th>
                                {{__('app.general.description')}}
                            </th>
                            <th>
                                {{__('app.pageComponents.actions')}}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-tbody">
                        @php $index = 1 @endphp
                        @foreach($invoices as $eachInvoice)
                            <tr>
                                <td class="sort-index">{{$index++}}</td>
                                <td class="sort-user">{{$eachInvoice->user->name}}</td>
                                <td class="sort-debit">{{number_format($eachInvoice->debit)}}</td>
                                <td class="sort-credit">{{number_format($eachInvoice->credit)}}</td>
                                <td class="sort-date">
                                    {{convertDate($eachInvoice->date)}}
                                </td>
                                <td class="sort-description">
                                    {{$eachInvoice->description}}
                                </td>
                                <td>
                                    <div class="btn-list flex-nowrap justify-content-center">
                                        <x-buttons.edit :link="route('admin.invoices.edit', ['invoice' => $eachInvoice->id])"/>
                                        <x-buttons.destroy :link="route('admin.invoices.destroy', ['invoice' => $eachInvoice->id])"/>
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
