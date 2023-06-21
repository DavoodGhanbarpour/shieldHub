@extends('admin.layout.main')

@section('title', 'Inbounds')

@section('actions')
  <div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
      <a href="{{ route('admin.inbounds.create') }}" class="btn btn-primary d-none d-sm-inline-block">
        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
        New Inbound
      </a>
    </div>
  </div>
@endsection

@section('content')

  <div class="card">
    <div class="card-body">
      <div id="table-default" class="table-responsive">
        <table class="table card-table table-vcenter text-nowrap datatable">
          <thead>
            <tr>
              <th><button class="table-sort" data-sort="sort-index">Index</button></th>
              <th><button class="table-sort" data-sort="sort-title">Title</button></th>
              <th><button class="table-sort" data-sort="sort-ip">IP:Port</button></th>
              <th><button class="table-sort" data-sort="sort-description">Description</button></th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-tbody">
          @php $index = 1; @endphp
           @foreach($inbounds as $eachInbound)
              <tr>
                  <td class="sort-index">{{$index++}}</td>
                  <td class="sort-title">{{$eachInbound->title}}</td>
                  <td class="sort-ip">
                      {{$eachInbound->ip}}:<span class="text-muted">{{$eachInbound->port}}</span>
                  </td>
                  <td class="sort-description">
                    {{$eachInbound->description}}
                  </td>
                  <td>
                      <div class="btn-list flex-nowrap">
                          <a href="" class="btn btn-blue">
                              Copy
                          </a>
                          <a href="{{ route('admin.inbounds.edit', ['inbound' => $eachInbound->id]) }}" class="btn">
                              Edit
                          </a>
                          <form action="{{ route('admin.inbounds.destroy', ['inbound' => $eachInbound->id]) }}" method="post">
                              @method('delete')
                              @csrf
                              <Button type="submit" class="btn border-danger text-danger">Delete</Button>
                          </form>
                      </div>
                  </td>
              </tr>
           @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection
