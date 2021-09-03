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
                <form action="{{ route('criteria.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="criteria_code">Criteria Code</label>
                        <input type="text" name="criteria_code" class="form-control" placeholder="Criteria Code" value="{{ $criteriaCode }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="criteria">Criteria Name</label>
                        <input type="text" name="criteria" class="form-control" placeholder="Criteria Name">
                    </div>
                    <div class="form-group">
                        <label for="weight">Criteria Weight</label>
                        <select name="weight" id="" class="form-control">
                            <option value="">Choose one</option>
                            <option value="1">Not important</option>
                            <option value="2">Not too important</option>
                            <option value="3">Quite important</option>
                            <option value="4">Important</option>
                            <option value="5">Very Important</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="weight">Criteria Category</label>
                        <select name="category" id="" class="form-control">
                            <option value="">Choose one</option>
                            <option value="Cost">Cost</option>
                            <option value="Benefit">Benefit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection