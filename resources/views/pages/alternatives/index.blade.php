@extends('layouts.app')
@section('title')
    Alternative Page
@endsection
@section('title-page')
    Alternative Page
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="py-2">
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                            data-target=".add-modal">Add</button>
                    </div>
                    <table id="alternative-table" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Alternative Code</th>
                                <th>Alternative Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="body-alternative-table"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Add --}}
    <div class="modal fade add-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Add modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Alternative Code</label>
                        <input type="text" name="alternative_code" id="alternative-code-add" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Alternative Name</label>
                        <input type="text" name="alternative_name" id="alternative-name-add" class="form-control"
                            placeholder="Alternative Name">
                    </div>
                    <div class="form-group">
                        <button class="form-control btn btn-primary" id="add-submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit --}}
    <div class="modal fade edit-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Edit modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="alternative-id-edit">
                    <div class="form-group">
                        <label for="">Alternative Code</label>
                        <input type="text" name="alternative_code" id="alternative-code-edit" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Alternative Name</label>
                        <input type="text" name="alternative_name" id="alternative-name-edit" class="form-control"
                            placeholder="Alternative Name">
                    </div>
                    <div class="form-group">
                        <button class="form-control btn btn-primary" id="edit-submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            getAllData()
            $('#alternative-table').DataTable({});

            // ADD FUNCTION
            $('#add-submit').on('click', function() {
                let data = {
                    alternative_code: $('#alternative-code-add').val(),
                    alternative_name: $('#alternative-name-add').val()
                }

                $.ajax({
                    type: 'POST',
                    url: 'http://localhost:8000/api/json-alternative',
                    dataType: 'json',
                    data,
                    success: (data) => {
                        $('.add-modal').modal('hide');
                        getAllData()
                        $('#alternative-name-add').val('')
                    },
                    error: (error) => {
                        console.log(error);
                    }
                })
            });

            // EDIT FUNCTION
            $('#body-alternative-table').on('click', '#btn-edit', function() {
                $.ajax({
                    type: 'GET',
                    url: 'http://localhost:8000/api/json-alternative/' + $(this).data('id'),
                    dataType: 'json',
                    success: (data) => {
                        $('#alternative-id-edit').val(data.data.id);
                        $('#alternative-code-edit').val(data.data.alternative_code);
                        $('#alternative-name-edit').val(data.data.alternative_name);
                        $('.edit-modal').modal('show');
                    },
                    error: (error) => {
                        console.log(error)
                    }
                })
            })

            //UPDATE FUNCTION
            $('#edit-submit').on('click', function() {
                let alternativeId = $('#alternative-id-edit').val()
                let data = {
                    alternative_code: $('#alternative-code-edit').val(),
                    alternative_name: $('#alternative-name-edit').val()
                }

                $.ajax({
                    type: 'PUT',
                    url: 'http://localhost:8000/api/json-alternative/' + alternativeId,
                    dataType: 'json',
                    data,
                    success: (data) => {
                        $('.edit-modal').modal('hide');
                        getAllData()
                    },
                    error: (error) => {
                        console.log(error.responseText);
                    }
                })
            })

            //DELETE FUNCTION
            $('#body-alternative-table').on('click', '#btn-delete', function() {
                $.ajax({
                    type: 'DELETE',
                    url: 'http://localhost:8000/api/json-alternative/' + $(this).data('id'),
                    dataType: 'json',
                    success: (data) => {
                        getAllData()
                    },
                    error: (error) => {
                        console.log(error)
                    }
                })
            })
        })

        // GET FUNCTION
        function getAllData() {
            $.ajax({
                type: 'GET',
                url: 'http://localhost:8000/api/json-alternative',
                dataType: 'json',
                success: (data) => {
                    let html = ``;
                    let alternativeCode = 1;
                    $.each(data.data, function(key, value) {
                        alternativeCode += 1;
                        html += `
                            <tr>
                                <td>${key+1}</td>
                                <td>${value.alternative_code}</td>
                                <td>${value.alternative_name}</td>
                                <td>
                                    <button class="btn btn-warning" id="btn-edit" data-id="${value.id}">
                                        <i class="bx bx-edit"></i>
                                        Edit
                                    </button>
                                    <button class="btn btn-danger" id="btn-delete" data-id="${value.id}">
                                        <i class="bx bx-trash-alt"></i>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        `
                    });
                    $('#alternative-code-add').val(`A${alternativeCode}`)
                    $('#body-alternative-table').html(html)
                }
            })
        }
    </script>
@endsection
