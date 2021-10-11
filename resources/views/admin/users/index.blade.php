@extends('admin.layout.app')
@section('title', 'Index')
@section('nav-users', 'active-page')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Zero Configuration</h5>
                    <p>DataTables has most features enabled by default, so all you need to do to use it with your own tables
                        is to call the construction function: <code>$().DataTable();</code>.</p>
                    <table id="dataTable" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th class=" text-center no-sort no-search">
                                </th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th class="no-sort">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                ajax: "/admin/users/datatable/ssd",
                columns: [{
                    data: 'plus-icon',
                    name: 'plus-icon',
                    class: 'text-center'
                }, {
                    data: 'name',
                    name: 'name',
                    class: 'text-center'
                }, {
                    data: 'phone',
                    name: 'phone',
                    class: 'text-center'
                }, {
                    data: 'created_at',
                    name: 'created_at',
                    class: 'text-center'
                }, {
                    data: 'updated_at',
                    name: 'updated_at',
                    class: 'text-center'
                }, {
                    data: 'action',
                    name: 'action',
                    class: 'text-center'
                }, ],
                order: [
                    [3, "desc"]
                ],
                columnDefs: [{
                        "targets": [4],
                        "visible": false,
                    }, {
                        "targets": [0],
                        "class": 'control',
                    }, {
                        "targets": 'no-sort',
                        "orderable": false
                    },
                    {
                        "targets": 'no-search',
                        "searchable": false
                    },
                    {
                        "targets": 'hidden',
                        "visible": false
                    }
                ],
            });
        });
    </script>
@endsection
