@extends('admin.layout.main')

@section('title', __('app.pageComponents.edit') .' '. __('app.inbounds.inbound'))

@section('content')

    <form action="{{ route('admin.inbounds.update', ['inbound' => $inbound->id]) }}" method="POST" class="card">
        @csrf
        @method('put')

        <div class="card-body">

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label required">{{__('app.inbounds.title')}}</label>
                    <div>
                        <input type="text" name="title" value="{{$inbound->title}}" class="form-control"
                               placeholder="{{__('app.inbounds.title')}}">
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label required">{{__('app.inbounds.ip') . ':' . __('app.inbounds.port')}}</label>
                    <div class="input-group input-group-flat">
                        <input type="text" class="form-control w-75 border_right" name="ip" value="{{$inbound->ip}}"
                               placeholder="192.168.1.1" autocomplete="off">
                        <input type="text" class="form-control w-25 border_left" name="port" value="{{$inbound->port}}"
                               placeholder="443">
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label required">{{__('app.inbounds.date')}}</label>
                    <div>
                        <input type="text" name="date" value="{{$inbound->date}}" class="form-control datepicker"
                               placeholder="{{__('app.inbounds.date')}}">
                    </div>
                </div>


                <div class="col-md-12 mb-3">
                    <label class="form-label">{{__('app.inbounds.link')}}</label>
                    <div>
                        <input type="text" name="link" class="form-control" placeholder="{{__('app.inbounds.link')}}"
                               value="{{$inbound->link}}">
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">{{__('app.inbounds.description')}}</label>
                    <div>
                        <input type="text" name="description" class="form-control"
                               placeholder="{{__('app.inbounds.description')}}" value="{{$inbound->description}}">
                    </div>
                </div>

            </div>

        </div>

        <div class="card-footer text-end">
            <div class="d-flex">
                <a href="{{ url()->previous() }}" class="btn btn-link">{{__('app.pageComponents.cancel')}}</a>
                <button type="submit" class="btn btn-primary ms-auto">{{__('app.pageComponents.submit')}}</button>
            </div>
        </div>

    </form>

    @include('components.libs.pwt-datepicker')

@endsection
