@extends('admin.layout.main')

@section('title', 'Add User')

@section('content')

    <form action="{{ route('admin.inbounds.store') }}" method="POST" class="card">
        @csrf

        <div class="card-body">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Title</label>
                    <div>
                        <input type="text" name="title" class="form-control" placeholder="Title">
                    </div>
                </div>


                <div class="col-md-6 mb-3">
                    <label class="form-label required">Password</label>
                    <div class="input-group input-group-flat">
                        <input type="text" class="form-control w-75 border_right" name="ip" placeholder="192.168.1.1" autocomplete="off">
                        <input type="text" class="form-control w-25 border_left" name="port" placeholder="443">
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label required">Link</label>
                    <div>
                        <input type="text" name="link" class="form-control" placeholder="Link">
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Description</label>
                    <div>
                        <input type="text" name="description" class="form-control" placeholder="Description">
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

@endsection
