@extends('admin.layout.main')

@section('title', __('app.pageComponents.edit') .' '. __('app.servers.server'))

@section('content')

    <form action="{{ route('admin.servers.update', ['server' => $server->id]) }}" method="POST" class="card">
        @csrf
        @method('put')

        <div class="card-body">

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label required">{{__('app.servers.title')}}</label>
                    <div>
                        <input type="text" name="title" value="{{$inbound->title}}" class="form-control" placeholder="{{__('app.servers.title')}}">
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label required">{{__('app.servers.start_date')}}</label>
                    <div>
                        <input type="text" name="start_date" class="form-control datepicker"
                            value="{{$inbound->start_date}}" placeholder="{{__('app.servers.start_date')}}">
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label required">{{__('app.servers.end_date')}}</label>
                    <div>
                        <input type="text" name="end_date" class="form-control datepicker"
                            value="{{$inbound->end_date}}" placeholder="{{__('app.servers.end_date')}}">
                    </div>
                </div>
                

                <div class="col-md-4" id="twoInputsParent">
                    <div class="row">

                        <div class="col-md-12 mb-3" id="inputParent">
                            <label class="form-label required">{{__('app.servers.ip')}}</label>
                            <div>
                                <input type="text" name="ip" value="{{$inbound->end_date}}" 
                                    class="form-control" placeholder="{{__('app.servers.ip')}}">
                            </div>
                        </div>
        
                        <div class="col-md-12 mb-3">
                            <label class="form-label required">{{__('app.servers.subscription_price_per_month')}}</label>
                            <div>
                                <input type="text" value="{{$inbound->subscription_price_per_month}}" name="subscription_price_per_month" 
                                    class="form-control number_format" placeholder="{{__('app.servers.subscription_price_per_month')}}">
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">{{__('app.servers.description')}}</label>
                            <div>
                                <textarea id="textarea" name="description" rows="4" class="form-control"
                                    placeholder="{{__('app.servers.description')}}">{{$inbound->description}}</textarea>
                            </div>
                        </div>
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

    @push('styles')
        <style>
            textarea {
                resize: none;
            }
        </style>
    @endpush

    @push('scripts')
        <script> 
            $(document).ready(adjustTextareaHeight);
            function adjustTextareaHeight() {
                let height = Math.round(($('#inputParent').height() * 2) - $('#inputParent label').height() + 8);
                console.log('height', height);
                $('#textarea').css('height', `${height}px`)
            }
        </script>
    @endpush

@endsection
