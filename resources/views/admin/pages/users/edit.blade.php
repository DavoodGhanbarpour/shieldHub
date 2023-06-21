@extends('admin.layout.main')

@section('title', 'Add User')

@section('content')

<form action="{{ route('admin.users.update', ['user' => 1]) }}" method="POST" class="card">
    @csrf

    <div class="card-body">

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label required">Name</label>
                <div>
                    <input type="text" value="{{ $user->name }}" name="name" class="form-control" aria-describedby="emailHelp" placeholder="Name">
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label required">Email address</label>
                <div>
                    <input type="email" value="{{ $user->email }}" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
            </div>



            <div class="col-md-6 mb-3">
                <label class="form-label required">Password</label>
                <div class="input-group input-group-flat">
                    <input  type="password" id="password" class="form-control" name="password" placeholder="Your password" autocomplete="new-password">
                    <span class="input-group-text">
                        <a href="#" class="link-secondary" id="passwordDisplay" title="Show password" data-bs-toggle="tooltip">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                            </svg>
                        </a>
                    </span>
                    <button id="randomPassword" class="btn" type="button">Create Random Password</button>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label required">Role</label>
                <div>
                    <select class="form-select">
                        <option {{($user->role->isCustomer()) ? 'selected' : ''}} value="{{\App\Models\User::CUSTOMER}}">Customer</option>
                        <option {{($user->role->isAdmin()) ? 'selected' : ''}} value="{{\App\Models\User::ADMIN}}">Admin</option>
                    </select>
                </div>
            </div>
        </div>

    </div>

    <div class="card-footer text-end">
        <div class="d-flex">
            <a href="{{ url()->previous() }}" class="btn btn-link">Cancel</a>
            <button type="submit" class="btn btn-primary ms-auto">Submit</button>
        </div>
    </div>

</form>

<script>
    $(document).on('click', '#passwordDisplay', function () {

        if ($(this).hasClass('text-info')) {
            $(this).removeClass('text-info');
            $(this).attr('data-bs-original-title', 'Show password').tooltip('show');
            $('#password').attr('type', 'password');
        } else {
            $(this).addClass('text-info');
            $(this).attr('data-bs-original-title', 'Hide password').tooltip('show');
            $('#password').attr('type', 'text');
        }
    });

    $(document).on('click', '#randomPassword', function () {

        var randomPassword = Math.random().toString(15).slice(-8);
        $('#password').val(randomPassword);
    });
  </script>


@endsection
