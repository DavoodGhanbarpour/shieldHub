@extends('admin.layout.main')

@section('title', __('app.pageComponents.add') .' '. __('app.servers.server'))

@section('content')

    <form action="{{ route('admin.servers.store') }}" method="POST" class="card">
        @csrf

        <div class="card-body">

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label required">{{__('app.auth.user')}}</label>
                    <div>
                        <select name="user_id" class="form-select" placeholder="{{__('app.auth.user')}}">
                            @foreach($users as $eachUser)
                                <option
                                    value="{{$eachUser->id}}">
                                    {{$eachUser->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label required">{{__('app.general.credit')}}</label>
                    <div>
                        <input type="text" name="credit" class="form-control number_format" placeholder="{{__('app.general.credit')}}">
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label required">{{__('app.general.date')}}</label>
                    <div>
                        <input type="text" name="date" class="form-control datepicker"
                               placeholder="{{__('app.general.date')}}">
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">{{__('app.general.description')}}</label>
                            <div>
                                <textarea name="description" rows="4" class="form-control resize-none"
                                    placeholder="{{__('app.general.description')}}">
                                </textarea>
                            </div>
                        </div>
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
