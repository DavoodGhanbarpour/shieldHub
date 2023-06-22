@extends('admin.layout.main')

@section('title', 'Add Inbound')

@section('content')

    <form action="{{ route('admin.inbounds.update', ['inbound' => $inbound->id]) }}" method="POST" class="card">
        @csrf
        @method('put')

        <div class="card-body">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Title</label>
                    <div>
                        <input type="text" name="title" value="{{$inbound->title}}" class="form-control" placeholder="Title">
                    </div>
                </div>


                <div class="col-md-6 mb-3">
                    <label class="form-label required">Password</label>
                    <div class="input-group input-group-flat">
                        <input type="text" class="form-control w-75 border_right" name="ip" value="{{$inbound->ip}}" placeholder="192.168.1.1" autocomplete="off">
                        <input type="text" class="form-control w-25 border_left" name="port" value="{{$inbound->port}}" placeholder="443">
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Link</label>
                    <div>
                        <input type="text" name="link" class="form-control" placeholder="Link" value="{{$inbound->link}}">
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Description</label>
                    <div>
                        <input type="text" name="description" class="form-control" placeholder="Description" value="{{$inbound->description}}">
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
