@extends('layouts.app')
@section('title')
    Criteria Page
@endsection
@section('title-page')
    Criteria Page
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="py-2">
                        <button type="button" onclick="window.location.href='{{ route('criteria.create') }}'" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                            data-target=".add-modal">Add</button>
                    </div>
                    <table id="criteria-table" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Criteria Code</th>
                                <th>Criteria Name</th>
                                <th>Criteria Weight</th>
                                <th>Criteria Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="body-criteria-table">
                            @foreach ($criterias as $key => $criteria)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $criteria->criteria_code }}</td>
                                    <td>{{ $criteria->criteria }}</td>
                                    <td>{{ $criteria->weight }}</td>
                                    <td>{{ $criteria->category }}</td>
                                    <td>
                                        <button class="btn btn-warning">
                                            <i class="bx bx-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-warning">
                                            <i class="bx bx-trash-alt"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#criteria-table').DataTable({})
        })
    </script>
@endsection
