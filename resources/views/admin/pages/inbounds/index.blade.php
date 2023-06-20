@extends('admin.layout.main')

@section('title', 'Inbounds')

@section('actions')
  <div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
      <a href="{{ route('admin.inbounds') }}" class="btn btn-primary d-none d-sm-inline-block">
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
              <th><button class="table-sort" data-sort="sort-name">Title</button></th>
              <th><button class="table-sort" data-sort="sort-rule">IP:Port</button></th>
              <th><button class="table-sort" data-sort="sort-email">Description</button></th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-tbody">
          @php $index = 1; @endphp
          {{-- @foreach($inbounds as $eachInbound) --}}
              <tr>
                  <td class="sort-index">1</td>
                  <td class="sort-name">user_01</td>
                  <td class="sort-email">192.168.1.1:443</td>
                  <td class="sort-rule">
                    trojan://tkgfAdsdkjd@95.192.168.1.1:443?security=tls&sni=sag.sagcitynation.shop&type=tcp&headerType=none#trojan_1_8080%7Cuser_01%40gamil.com
                  </td>
                  <td>
                      <div class="btn-list flex-nowrap">
                          <a href="" class="btn">
                              Edit
                          </a>
                          <a href=""
                             class="btn border-danger text-danger">
                              Delete
                          </a>
                      </div>
                  </td>
              </tr>
          {{-- @endforeach --}}
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection
