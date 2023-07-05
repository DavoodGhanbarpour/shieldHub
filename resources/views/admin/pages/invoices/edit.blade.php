@extends('admin.layout.main')

@section('title', __('app.pageComponents.edit') .' '. __('app.invoices.invoice'))

@section('content')

    <form action="{{ route('admin.invoices.update', ['invoice' => $invoice->id]) }}" method="POST" class="card">
        @csrf
        @method('put')

        <div class="card-body">

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label required">{{__('app.auth.user')}}</label>
                    <div>
                        <select name="user_id" class="form-select" placeholder="{{__('app.auth.user')}}">
                            @foreach($users as $eachUser)
                                <option
                                    @if($eachUser->id == $invoice->user_id)
                                        {{'selected'}}
                                    @endif
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
                        <input type="text" name="credit"
                               class="form-control number_format"
                               value="{{addSeparator($invoice->credit)}}"
                               placeholder="{{__('app.general.credit')}}">
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label required">{{__('app.general.date')}}</label>
                    <div>
                        <input type="text" name="date" class="form-control datepicker"
                               value="{{$invoice->date}}"
                               placeholder="{{__('app.general.date')}}">
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">{{__('app.general.description')}}</label>
                            <div>
                                <textarea name="description" rows="4" class="form-control resize-none"
                                    placeholder="{{__('app.general.description')}}">{{$invoice->description}}</textarea>
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
