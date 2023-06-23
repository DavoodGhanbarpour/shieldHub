@extends('admin.layout.main')

@section('title', __('app.inbounds.assign_inbounds',['user' => $user->name]))

@section('content')

    <form action="{{ route('admin.users.assignInbounds', ['user' => $user->id]) }}" method="POST" class="card">
        @csrf

        <div class="card-body">
            <div class="row">
                @foreach($inbounds as $eachInbound)
                    <div class="col-lg-6 col-xl-3 mb-3">
                        <div class="card inbound-card copy-parent {{$eachInbound->isUsing ? 'card-active' : ''}}" role="button">
                            <input class="d-none inbound-checkbox" value="{{$eachInbound->id}}" type="checkbox" name="inbounds[]">
                            <span class="d-none copy-text">{{$eachInbound->link}}</span>

                            <div
                                class="ribbon btn btn-primary copy-button">{{__('app.pageComponents.copy')}}</div>
                            <div class="card-body">
                                <p class="card-title fw-bold">{{$eachInbound->title}}</p>
                                <hr class="p-0 m-0">
                                <p class="card-title my-2" dir="ltr">{{$eachInbound->ip}}:{{$eachInbound->port}}</p>
                                <p>
                                    {{$eachInbound->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="card-footer text-end">
            <div class="d-flex">
                <a href="{{ url()->previous() }}" class="btn btn-link">{{__('app.pageComponents.cancel')}}</a>
                <button type="submit" class="btn btn-primary ms-auto">{{__('app.pageComponents.submit')}}</button>
            </div>
        </div>

    </form>


    @push('scripts')
        @include('components.scripts.copy')
    
        <script>

            function setInboundStatus(element) {

                element.find('.inbound-checkbox').prop('checked', element.hasClass('card-active'));
                element.find('.inbound-checkbox').prop('disabled', !element.hasClass('card-active'));
            }

            function setInboundsStatus() {

                $('.inbound-card').each(function () {
                    setInboundStatus($(this));
                })
            }

            $(document).ready(function () {

                setInboundsStatus();
            });

            $(document).on('click', '.inbound-card', function (e) {

                if ($(e.target).is('div.copy-button'))
                    return;

                $(this).toggleClass('card-active');
                setInboundStatus($(this));
            });

        </script>
    @endpush

    @push('styles')
        <style>
            .copy-button {
                cursor: copy;
            }
            .inbound-card {
                display: flex;
                flex-direction: column;
                height: 100%;
            }
        </style>
    @endpush

@endsection
