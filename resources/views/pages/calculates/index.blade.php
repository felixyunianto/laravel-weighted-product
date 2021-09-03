@extends('layouts.app')
@section('title')
Calculate Page
@endsection
@section('title-page')
Calculate Page
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="">
                    <h5>Initial Weight</h5>
                    Formula : <img src="https://latex.codecogs.com/gif.latex?Wj&space;=&space;\frac{Wj}{\sum&space;Wj}"
                        title="Wj = \frac{Wj}{\sum Wj}" />
                    <div class="table-responsive py-3">
                        <table class="table mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Weight / Criteria</th>
                                    <th>C1</th>
                                    <th>C2</th>
                                    <th>C3</th>
                                    <th>C4</th>
                                    <th>C5</th>
                                    <th>C6</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Important weight</td>
                                    <td>{{ $firstCriteriaValue[0]['weight'] }}</td>
                                    <td>{{ $firstCriteriaValue[1]['weight'] }}</td>
                                    <td>{{ $firstCriteriaValue[2]['weight'] }}</td>
                                    <td>{{ $firstCriteriaValue[3]['weight'] }}</td>
                                    <td>{{ $firstCriteriaValue[4]['weight'] }}</td>
                                    <td>{{ $firstCriteriaValue[5]['weight'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="">
                    <h5>Matrix</h5>
                    <div class="table-responsive py-3">
                        <table class="table mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Alternative</th>
                                    <th>C1</th>
                                    <th>C2</th>
                                    <th>C3</th>
                                    <th>C4</th>
                                    <th>C5</th>
                                    <th>C6</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mergeMatrix as $matrix)
                                <tr>
                                    <td>{{ $matrix['alternative_code'] }}</td>
                                    <td>{{ $matrix['C1'] }}</td>
                                    <td>{{ $matrix['C2'] }}</td>
                                    <td>{{ $matrix['C3'] }}</td>
                                    <td>{{ $matrix['C4'] }}</td>
                                    <td>{{ $matrix['C5'] }}</td>
                                    <td>{{ $matrix['C6'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="">
                            <h5>Vector S</h5>
                            Formula : <img src="https://latex.codecogs.com/gif.latex?Si&space;=&space;\prod&space;\,&space;_{j=i}^{n}&space;\,&space;\,&space;X_{ij}^{Wj}" title="Si = \prod \, _{j=i}^{n} \, \, X_{ij}^{Wj}" />
                            <div class="table-responsive py-3">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Weight / Criteria</th>
                                            <th>C1</th>
                                            <th>C2</th>
                                            <th>C3</th>
                                            <th>C4</th>
                                            <th>C5</th>
                                            <th>C6</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Important weight</td>
                                            <td>{{ $firstCriteriaValue[0]['weight'] }}</td>
                                            <td>{{ $firstCriteriaValue[1]['weight'] }}</td>
                                            <td>{{ $firstCriteriaValue[2]['weight'] }}</td>
                                            <td>{{ $firstCriteriaValue[3]['weight'] }}</td>
                                            <td>{{ $firstCriteriaValue[4]['weight'] }}</td>
                                            <td>{{ $firstCriteriaValue[5]['weight'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="">
                            <h5>Vector S</h5>
                            Formula : <img src="https://latex.codecogs.com/gif.latex?Si&space;=&space;\prod&space;\,&space;_{j=i}^{n}&space;\,&space;\,&space;X_{ij}^{Wj}" title="Si = \prod \, _{j=i}^{n} \, \, X_{ij}^{Wj}" />
                            <div class="table-responsive py-3">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Weight / Criteria</th>
                                            <th>C1</th>
                                            <th>C2</th>
                                            <th>C3</th>
                                            <th>C4</th>
                                            <th>C5</th>
                                            <th>C6</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Important weight</td>
                                            <td>{{ $firstCriteriaValue[0]['weight'] }}</td>
                                            <td>{{ $firstCriteriaValue[1]['weight'] }}</td>
                                            <td>{{ $firstCriteriaValue[2]['weight'] }}</td>
                                            <td>{{ $firstCriteriaValue[3]['weight'] }}</td>
                                            <td>{{ $firstCriteriaValue[4]['weight'] }}</td>
                                            <td>{{ $firstCriteriaValue[5]['weight'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
