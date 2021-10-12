@extends('admin.layout.app')
@section('title', 'Users')
@section('nav-users', 'active-page')
@section('content')
    <div class="row mb-3">
        <div class="col">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#createUserAccount">
                Create User Account
            </button>

            <!-- Modal -->
            <div class="modal fade" id="createUserAccount" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="createUserAccountLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createUserAccountLabel">Create User Account</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="#" class="row g-3 needs-validation">
                                <div class="col">
                                    <label for="name" class="form-label">Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="inputGroupPrepend"><i
                                                class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" id="name"
                                            aria-describedby="inputGroupPrepend">
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3 mb-5">
                                    <button class="btn btn-primary" type="submit">Submit form</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Users Database</h5>
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
