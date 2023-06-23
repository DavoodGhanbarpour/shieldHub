@extends('admin.layout.main')

@section('title', __('app.inbounds.inbounds'))

@section('actions')
    <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
            <a href="{{ route('admin.inbounds.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                     stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M12 5l0 14"/>
                    <path d="M5 12l14 0"/>
                </svg>
                {{__('app.pageComponents.add') .' '. __('app.inbounds.inbound')}}
            </a>
        </div>
    </div>
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <div id="table-default" class="table-responsive">
                <table class="table card-table table-vcenter datatable">
                    <thead>
                    <tr>
                        <th>
                            <button class="table-sort" data-sort="sort-index">{{__('app.pageComponents.index')}}</button>
                        </th>
                        <th>
                            <button class="table-sort" data-sort="sort-title">{{__('app.inbounds.title')}}</button>
                        </th>
                        <th>
                            <button class="table-sort" data-sort="sort-ip">{{__('app.inbounds.ip').':'.__('app.inbounds.port')}}</button>
                        </th>
                        <th>
                            <button class="table-sort" data-sort="sort-description">{{__('app.inbounds.description')}}</button>
                        </th>
                        <th>{{__('app.pageComponents.actions')}}</th>
                    </tr>
                    </thead>
                    <tbody class="table-tbody">
                        @php $index = 1 @endphp
                        @foreach($inboundsComposed as $eachInbound)
                            <tr>
                                <td class="sort-index">{{$index++}}</td>
                                <td class="sort-title">{{$eachInbound->title}}</td>
                                <td class="sort-ip">
                                    {{$eachInbound->ip}}:<span class="text-muted">{{$eachInbound->port}}</span>
                                </td>
                                <td class="sort-description">
                                    {{$eachInbound->description}}
                                </td>
                                <td>
                                    <span class="d-none row-inbound-link">{{$eachInbound->link}}</span>

                                    <div class="btn-list flex-nowrap">
                                        <x-buttons.copy :class="'inbound-copy-button'" data-id="{{$eachInbound->id}}"/>
                                        <x-buttons.edit :link="route('admin.inbounds.edit', ['inbound' => $eachInbound->id])"/>
                                        <x-buttons.destroy :link="route('admin.inbounds.destroy', ['inbound' => $eachInbound->id])"/>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).on( 'click', '.inbound-copy-button', function(){

                let link = $(this).closest('td').find('.row-inbound-link').text();
                navigator.clipboard.writeText(link);
                toastr.success('Copied to clipboard!');
            });
        </script>
    @endpush

@endsection
