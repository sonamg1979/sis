@extends('layouts.app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>Farm road details</h3>
    @if(count($datas)>0)
        <table class="table table-sm" id="myTable">
            <thead>
            <tr>
                <th>Sl</th>
                <th>Year</th>
                <th>Road Name</th>
                <th>Chiwog</th>
                <th>Existing length (KM)</th>
                <th>Benefeciaries (HH)</th>
                <th>Construction Mode</th>
                <th>Construction Type</th>
                <th>Road user group</th>
                <th>Male</th>
                <th>Female</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody
            @foreach ($datas as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->year}}</td>
                    <td>{{$row->road_name}}</td>
                    <td>{{$row->chiwog}}</td>
                    <td>{{$row->length}}</td>
                    <td>{{$row->benefeciaries}}</td>
                    <td>{{$row->construct_mode}}</td>
                    <td>{{$row->construct_type}}</td>
                    <td>{{$row->group == 'Y' ? 'Yes' : 'No' }}</td>
                    <td>{{$row->male}}</td>
                    <td>{{$row->female}}</td>
                    <td>{{$row->status == 'C' ? 'Completed' : 'Incomplete'}}</td>
                </tr> 
            @endforeach
            </tbody>
        </table>
    @else
        <p>No data to display</p>
    @endif
@endsection
