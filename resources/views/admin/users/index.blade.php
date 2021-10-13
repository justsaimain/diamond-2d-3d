@extends('admin.layout.app')
@section('title', 'Users')
@section('nav-users', 'active-page')
@section('content')
    <div class="row mb-3">
        <div class="col">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#createUserAccount">
                Create user account
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
                            <form action="{{ route('admin.users.store') }}" id="create-form" method="POST"
                                class="row g-3">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="phone">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="text" name="password" class="form-control" id="password">
                                </div>
                                <div class="col-12 mt-3 mb-5">
                                    <button class="btn btn-primary" type="submit">Create</button>
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

    <!-- Edit Modal -->
    <div class="modal fade" id="editUserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm" method="POST" class="row g-3">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="edit-name">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" id="edit-phone">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" name="password" class="form-control" id="edit-password">
                        </div>
                        <div class="col-12 mt-3 mb-5">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>
        $(document).ready(function() {
            var table = $('#dataTable').DataTable({
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

            $(document).on('click', '.delete-btn', function(e) {
                e.preventDefault();
                var id = $(this).data('id');

                Swal.fire({
                    icon: 'error',
                    text: "Are you sure you want to delete?",
                    showDenyButton: true,
                    confirmButtonColor: '#9C6EFC',
                    focusConfirm: false,
                    confirmButtonText: 'Yes, Delete',
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            method: "DELETE",
                            url: `/admin/users/${id}`,
                        }).done(function(res) {
                            table.ajax.reload();
                        });
                    } else if (result.isDenied) {
                        Swal.fire('Changes are not saved', '', 'info')
                    }
                })
            });

            $(document).on('click', '.edit-btn', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var name = $(this).attr("data-name");
                var phone = $(this).attr("data-phone");

                $('#editUserForm').attr('action', '/admin/users/' + id);

                $('#edit-name').val(name);
                $('#edit-phone').val(phone);
                var editModal = new bootstrap.Modal(document.getElementById('editUserModal'), 'backdrop');
                editModal.show();
            });
        });
    </script>
@endsection
