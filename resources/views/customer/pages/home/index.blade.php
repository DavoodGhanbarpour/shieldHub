@extends('customer.layout.main')

@section('title', 'Home')

@section('content')

<div class="card">
    <div class="card-body">
        <div id="table-default" class="table-responsive">
            <table class="table card-table table-vcenter datatable">
                <thead>
                    <tr>
                        <th><button class="table-sort" data-sort="sort-index">Index</button></th>
                        <th><button class="table-sort" data-sort="sort-name">Name</button></th>
                        <th><button class="table-sort" data-sort="sort-email">Email</button></th>
                        <th><button class="table-sort" data-sort="sort-rule">Rule</button></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-tbody">
                    <tr>
                        <td class="sort-index">1</td>
                        <td class="sort-name">test</td>
                        <td class="sort-email">test@gmail.com</td>
                        <td class="sort-rule">Admin</td>
                        <td>
                            <div class="btn-list flex-nowrap">
                                <a class="btn">
                                    Edit
                                </a>
                                <a class="btn border-danger text-danger">
                                    Delete
                                </a>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
