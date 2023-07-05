@extends('admin.layout.main')

@section('title', __('app.pageComponents.add') .' '. __('app.inbounds.inbounds'))

@section('content')

    <form class="repeater card" action="{{ route('admin.inbounds.bulk.store') }}" method="POST">
        @csrf

        <div class="card-header row">

            <div class="w-auto ps-0">
                <a href="#"  data-bs-toggle="modal" data-bs-target="#inboudsModal" class="btn btn-primary btn-block d-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-zoom-replace" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M21 21l-6 -6"></path>
                        <path d="M3.291 8a7 7 0 0 1 5.077 -4.806a7.021 7.021 0 0 1 8.242 4.403"></path>
                        <path d="M17 4v4h-4"></path>
                        <path d="M16.705 12a7 7 0 0 1 -5.074 4.798a7.021 7.021 0 0 1 -8.241 -4.403"></path>
                        <path d="M3 16v-4h4"></path>
                     </svg>
                    Extractor
                </a>
            </div>

            <div class="w-auto ps-0">
                <a href="#" data-repeater-create class="btn btn-success btn-block d-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M12 5l0 14"/>
                    <path d="M5 12l14 0"/>
                    </svg>
                    {{__('app.pageComponents.add')}}
                </a>
            </div>

            <div class="w-auto ps-0">
                <a href="#" id="clearAll" class="btn btn-danger btn-block d-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 7l16 0"></path>
                    <path d="M10 11l0 6"></path>
                    <path d="M14 11l0 6"></path>
                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                    </svg>
                    {{__('app.pageComponents.clearAll')}}
                </a>
            </div>

        </div>

        <div class="card-body" data-repeater-list="inbounds">



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
                            <label class="form-label required">{{__('app.servers.server')}}</label>
                            <div>
                                <select name="server_id" class="form-select server-select" placeholder="{{__('app.general.server')}}">
                                    <option value="" hidden>Choose a server...</option>
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
                                <input type="text" class="form-control w-75 border_right serverIP" disabled="" autocomplete="off">
                                <input type="text" class="form-control w-25 border_left" name="port" placeholder="443">
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


    <div class="modal" id="inboudsModal" tabindex="-1">
        <div class="modal-dialog modal-2xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Inbound Extractor</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <textarea class="form-control" id="inboundsPlace" rows="20" placeholder="Please provide a set of inbounds"></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
              <button id="detectButton" type="button" class="btn btn-primary" data-bs-dismiss="modal">Extract</button>
            </div>
          </div>
        </div>
    </div>


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
        <script src="{{ asset('libs/jquery.repeater/jquery.repeater.min.js') }}"></script>

        <script>

            const SERVERS_IPS = Object.freeze(JSON.parse('{!! addslashes($servers_pluck) !!}'));
            var repeater;

            $(document).ready(function () {

                repeater = $('.repeater').repeater({
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
                });

                $(document).on( 'click', '#clearAll', function(){

                    if ( confirm('Are you sure you want to delete All elements?') ) {
                        $('[data-repeater-list]').empty();
                    }
                });

                $(document).on( 'click', '#detectButton', function(){

                    let inbounds = makeInboundsArray();
                    repeater.setList(inbounds);
                    setServerIPs();
                    toastr.info(`<strong>${inbounds.length}</strong> inbound(s) added to the list`);
                });

                $(document).on( 'change', '.server-select', function(){

                    setServerIP($(this).closest('[data-repeater-item]'));
                });


                function getInbound(text)
                {
                    let link        = text;
                    let server_id   = SERVERS_IPS[text.split('@')[1].split(':')[0]];
                    let port        = text.split('@')[1].split(':')[1].split('?')[0];
                    let title       = `${text.split('#')[1].split('|')[0]}|${text.split('#')[1].split('|')[1]}`;

                    link        = (link != 'undefined' ? link : '' );
                    server_id   = (server_id != 'undefined' ? server_id : '' );
                    port        = (port != 'undefined' ? port : '' );
                    title       = (title != 'undefined' ? title : '' );

                    return {link, server_id, port, title};
                }

                function makeInboundsArray()
                {
                    let inbounds = [];
                    var inboundsArray = $('#inboundsPlace').val().replace(/\r/g, "").split(/\n/);

                    inboundsArray.forEach(text => {
                        if( text != undefined && text.length )
                            inbounds.push(getInbound(text));
                    });

                    return inbounds;
                }

                function setServerIPs() {

                    $('[data-repeater-item]').each(function(){

                        setServerIP($(this));
                    });
                }

                function setServerIP(row) {

                    row.find('.serverIP').val(row.find('.server-select').find('option:selected').data('server-ip'));
                }

            });

        </script>
    @endpush
@endsection
