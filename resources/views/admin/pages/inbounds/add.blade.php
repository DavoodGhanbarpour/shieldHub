@extends('admin.layout.main')

@section('title', __('app.pageComponents.add') .' '. __('app.inbounds.inbound'))

@section('content')

    <form action="{{ route('admin.inbounds.store') }}" method="POST" class="card">
        @csrf

        <div class="card-body">

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label required">{{__('app.general.title')}}</label>
                    <div>
                        <input type="text" name="title" class="form-control" placeholder="{{__('app.general.title')}}">
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label required">{{__('app.servers.server')}}</label>
                    <div>
                        <select name="server" class="form-select" placeholder="{{__('app.general.server')}}">
                            @foreach($servers as $eachServer)
                                <option
                                    data-server-ip="{{$eachServer->ip}}"
                                    value="{{$eachServer->id}}">
                                    {{$eachServer->title}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label required">{{__('app.general.ip') . ':' . __('app.general.port')}}</label>
                    <div class="input-group input-group-flat">
                        <input type="text" class="form-control w-75 border_right" id="serverIP" disabled="" autocomplete="off">
                        <input type="text" class="form-control w-25 border_left" name="port" placeholder="443">
                    </div>
                </div>


                <div class="col-md-12 mb-3">
                    <label class="form-label required">{{__('app.general.link')}}</label>
                    <div>
                        <textarea name="link" rows="3" class="form-control" placeholder="{{__('app.general.link')}}"></textarea>
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">{{__('app.general.description')}}</label>
                    <div>
                        <textarea type="text" rows="3" name="description" class="form-control"
                               placeholder="{{__('app.general.description')}}"></textarea>
                    </div>
                </div>

            </div>

        </div>

        <div class="card-footer text-end">
            <div class="d-flex">
                <x-buttons.cancel/>
                <x-buttons.submit/>
            </div>
        </div>

    </form>

    @include('components.libs.pwt-datepicker')

    @push('scripts')
        <script>
            $(document).ready( function(){

                setServerIP()
            });

            $(document).on( 'change', 'select[name=server]', function(){

                setServerIP()
            });

            function setServerIP() {

                $('#serverIP').val($('select[name=server]').find('option:selected').data('server-ip'));
            }
        </script>
    @endpush

@endsection
