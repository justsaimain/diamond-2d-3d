@extends('admin.layout.app')
@section('title', '2D')
@section('nav-2d', 'active-page')
@section('content')

    <div class="row mb-3">
        <div class="col">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addNewNumberModal">
                Add new special number
            </button>

            <!-- Modal -->
            <div class="modal fade" id="addNewNumberModal" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="addNewNumberModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addNewNumberModalLabel">Add new special number</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.two-d.store') }}" id="create-form" method="POST"
                                class="row g-3">
                                @csrf
                                <div class="mb-3">
                                    <label for="number" class="form-label">Number</label>
                                    <input type="number" name="number" class="form-control" id="number">
                                </div>
                                <div class="mb-3">
                                    <label for="limit" class="form-label">Limit</label>
                                    <input type="text" name="limit" class="form-control" id="limit">
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_close">
                                        <label class="form-check-label" for="is_close">Is Close</label>
                                    </div>
                                </div>
                                <div class="col-12 mt-3 mb-5">
                                    <button class="btn btn-primary" type="submit">Add</button>
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
                    <h5 class="card-title">Special Numbers</h5>
                    <table id="dataTable" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th class=" text-center no-sort no-search">
                                </th>
                                <th>Number</th>
                                <th>Limit</th>
                                <th>Is Close</th>
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
            var table = $('#dataTable').DataTable({
                ajax: "/admin/two-d/datatable/ssd",
                columns: [{
                    data: 'plus-icon',
                    name: 'plus-icon',
                    class: 'text-center'
                }, {
                    data: 'number',
                    name: 'number',
                    class: 'text-center'
                }, {
                    data: 'limit',
                    name: 'limit',
                    class: 'text-center'
                }, {
                    data: 'is_close',
                    name: 'is_close',
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
                    [5, "desc"]
                ],
                columnDefs: [{
                        "targets": [5],
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
        })
    </script>
@endsection
