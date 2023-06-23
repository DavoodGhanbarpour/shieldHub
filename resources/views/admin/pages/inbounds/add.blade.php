@extends('admin.layout.main')

@section('title', __('app.pageComponents.add') .' '. __('app.inbounds.inbound'))

@section('content')

    <form action="{{ route('admin.inbounds.store') }}" method="POST" class="card">
        @csrf

        <div class="card-body">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label required">{{__('app.inbounds.title')}}</label>
                    <div>
                        <input type="text" name="title" class="form-control" placeholder="{{__('app.inbounds.title')}}">
                    </div>
                </div>


                <div class="col-md-6 mb-3">
                    <label class="form-label required">{{__('app.inbounds.ip') . ':' . __('app.inbounds.port')}}</label>
                    <div class="input-group input-group-flat">
                        <input type="text" class="form-control w-75 border_right" name="ip" placeholder="192.168.1.1" autocomplete="off">
                        <input type="text" class="form-control w-25 border_left" name="port" placeholder="443">
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label required">{{__('app.inbounds.link')}}</label>
                    <div>
                        <input type="text" name="link" class="form-control" placeholder="{{__('app.inbounds.link')}}">
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">{{__('app.inbounds.description')}}</label>
                    <div>
                        <input type="text" name="description" class="form-control" placeholder="{{__('app.inbounds.description')}}">
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

@endsection
