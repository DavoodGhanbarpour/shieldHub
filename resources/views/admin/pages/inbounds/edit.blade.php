@extends('admin.layout.main')

@section('title', __('app.pageComponents.edit') .' '. __('app.inbounds.inbound'))

@section('content')

    <form action="{{ route('admin.inbounds.update', ['inbound' => $inbound->id]) }}" method="POST" class="card">
        @csrf
        @method('put')

        <div class="card-body">

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label required">{{__('app.general.title')}}</label>
                    <div>
                        <input type="text" name="title" value="{{$inbound->title}}" class="form-control"
                               placeholder="{{__('app.general.title')}}">
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label required">{{__('app.general.ip') . ':' . __('app.general.port')}}</label>
                    <div class="input-group input-group-flat">
                        <input type="text" class="form-control w-75 border_right" name="ip" value="{{$inbound->ip}}"
                               placeholder="192.168.1.1" autocomplete="off">
                        <input type="text" class="form-control w-25 border_left" name="port" value="{{$inbound->port}}"
                               placeholder="443">
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label required">{{__('app.general.date')}}</label>
                    <div>
                        <input type="text" name="date" value="{{$inbound->date}}" class="form-control datepicker"
                               placeholder="{{__('app.general.date')}}">
                    </div>
                </div>


                <div class="col-md-12 mb-3">
                    <label class="form-label required">{{__('app.general.link')}}</label>
                    <div>
                        <textarea name="link" rows="3" class="form-control" placeholder="{{__('app.general.link')}}">{{$inbound->link}}</textarea>
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">{{__('app.general.description')}}</label>
                    <div>
                        <textarea type="text" rows="3" name="description" class="form-control" placeholder="{{__('app.general.description')}}">{{$inbound->description}}</textarea>
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

@endsection
