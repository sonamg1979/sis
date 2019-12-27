@extends('layouts.app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3> Electric/solar datas</h3>
    @if(count($datas)>0)
        <table class="table table-sm" id="myTable">
            <thead>
            <tr>
                <th>Sl</th>
                <th>Year</th>
                <th>Gewog</th>
                <th>Location</th>
                <th>Length</th>
                <th>Benefeciaries (HH)</th>
                <th>Dry Land (in acres)</th>
                <th>Wet Land (in acres)</th>
                <th>Total Land (in acres)</th>
                <th>Status</th>
                <th>Type</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($datas as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->year}}</td>
                    <td>{{$row->subsector}}</td>
                    <td>{{$row->location}}</td>
                    <td>{{$row->length}}</td>
                    <td>{{$row->beneficiaries}}</td>
                    <td>{{$row->dry}}</td>
                    <td>{{$row->wet}}</td>
                    <td>{{$row->dry+$row->wet}}</td>
                    <td>{{$row->status}}</td>
                    <td>{{$row->type}}</td>
                </tr> 
            @endforeach
            </tbody>
        </table>

    @else
        <p>No data to display</p>
    @endif
@endsection
