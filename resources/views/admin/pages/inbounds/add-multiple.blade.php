@extends('admin.layout.main')

@section('title', __('app.pageComponents.add') .' '. __('app.inbounds.inbounds'))

@section('content')

    <form class="repeater card" action="{{ route('admin.inbounds.store') }}" method="POST">
        @csrf
        
        <div class="card-body" data-repeater-list="inboundsList">
                
            <div class="row mb-3">
                <a href="#" data-repeater-create class="btn btn-success w-20 d-sm-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 5l0 14"/>
                        <path d="M5 12l14 0"/>
                    </svg>
                    {{__('app.pageComponents.add')}}
                </a>
            </div>
            
            <div class="row form_border p-0" data-repeater-item>
                <div class="col-12 p-4 pe-7">
                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <label class="form-label required">{{__('app.general.title')}}</label>
                            <div>
                                <input type="text" name="title" class="form-control" placeholder="{{__('app.general.title')}}">
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label required">{{__('app.general.ip') . ':' . __('app.general.port')}}</label>
                            <div class="input-group input-group-flat">
                                <input type="text" class="form-control w-75 border_right" name="ip" placeholder="192.168.1.1" autocomplete="off">
                                <input type="text" class="form-control w-25 border_left" name="port" placeholder="443">
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label required">{{__('app.general.date')}}</label>
                            <div>
                                <input type="text" name="date" class="form-control datepicker"
                                    placeholder="{{__('app.general.date')}}">
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label required">{{__('app.general.link')}}</label>
                            <div>
                                <input type="text" name="link" class="form-control" placeholder="{{__('app.general.link')}}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">{{__('app.general.description')}}</label>
                            <div>
                                <input type="text" name="description" class="form-control"
                                    placeholder="{{__('app.general.description')}}">
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="col d-flex justify-content-end p-0">
                    <button type="button" data-repeater-delete type="submit" class="btn btn-danger h-100 rounded-start-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash mx-auto" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 7l16 0"></path>
                            <path d="M10 11l0 6"></path>
                            <path d="M14 11l0 6"></path>
                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                        </svg>
                    </button>
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

    @push('styles')
        <style>
            .form_border {
                border: 1px solid #d8d8d8;
                border-radius: 5px;
                padding: 1.5rem;
                position: relative;
                margin-bottom: 1rem !important;
            }
        </style>
    @endpush    
    
    @push('scripts')
        <script src="{{ asset('libs/jquery.repeater/jquery.repeater.js') }}"></script>

        <script>
            $(document).ready(function () {
                $('form').repeater({
                    show: function () {
                        $(this).slideDown();
                        $(".datepicker").pDatepicker({
                            calendarType: 'gregorian', 
                            format: 'L', 
                            autoClose: true
                        });
                    },
                    hide: function (deleteElement) {
                        if(confirm('Are you sure you want to delete this element?')) {
                            $(this).slideUp(deleteElement);
                        }
                    },
                    ready: function (setIndexes) {
                        setIndexes();
                    },
                    isFirstItemUndeletable: true
                })
            });
        </script>
    @endpush
@endsection
