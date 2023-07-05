@extends('admin.layout.main')

@section('title', __('app.pageComponents.edit') .' '. __('app.auth.user'))

@section('content')

    <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="POST" class="card">
        @method('put')
        @csrf

        <div class="card-body">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label required">{{__('app.general.name')}}</label>
                    <div>
                        <input type="text" value="{{ $user->name }}" name="name" class="form-control"
                               aria-describedby="emailHelp" placeholder="{{__('app.general.name')}}">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label required">{{__('app.general.email_address')}}</label>
                    <div>
                        <input type="email" value="{{ $user->email }}"  name="email" class="form-control"
                               aria-describedby="emailHelp" placeholder="{{__('app.general.email_address')}}">
                    </div>
                </div>


                <div class="col-md-6 mb-3">
                    <label class="form-label required">{{__('app.passwords.password')}}</label>
                    <div class="input-group input-group-flat">
                        <input type="password" id="password" class="form-control" name="password"
                               placeholder="{{__('app.passwords.password')}}" autocomplete="new-password">
                        <span class="input-group-text">
                        <a href="#" class="link-secondary" id="passwordDisplay" title="{{__('app.passwords.show_password')}}"
                            data-bs-toggle="tooltip">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/>
                                <path
                                    d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"/>
                            </svg>
                        </a>
                    </span>
                        <button id="randomPassword" class="btn" type="button">{{__('app.passwords.generate_password')}}</button>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label required">{{__('app.auth.role')}}</label>
                    <div>
                        <select class="form-select" name="role">
                            <option {{($user->isCustomer()) ? 'selected' : ''}} value="{{\App\Models\User::CUSTOMER}}">
                                {{__('app.auth.roles.'.\App\Models\User::CUSTOMER)}}
                            </option>
                            <option {{($user->isAdmin()) ? 'selected' : ''}} value="{{\App\Models\User::ADMIN}}">
                                {{__('app.auth.roles.'.\App\Models\User::ADMIN)}}
                            </option>
                        </select>
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

    @push('scripts')
        <script>
            $(document).on('click', '#passwordDisplay', function () {

                if ( $(this).hasClass('text-info') ) {
                    $(this).removeClass('text-info');
                    $(this).attr('data-bs-original-title', '{{__('app.passwords.show_password')}}').tooltip('show');
                    $('#password').attr('type', 'password');
                } else {
                    $(this).addClass('text-info');
                    $(this).attr('data-bs-original-title', '{{__('app.passwords.hide_password')}}').tooltip('show');
                    $('#password').attr('type', 'text');
                }
            });

            $(document).on('click', '#randomPassword', function () {

                var randomPassword = Math.random().toString(15).slice(-8);
                $('#password').val(randomPassword);
            });
        </script>
    @endpush


@endsection
