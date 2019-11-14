@extends('layouts.app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>Land Development Plan</h3>
    @if(count($datas)>0)
        <table class="table table-striped table-sm" id="myTable">
            <thead>
            <tr>
                <th>Sl</th>
                <th>Year</th>
                <th>Gewog</th>
                <th>Location</th>
                <th>Dry</th>
                <th>Wet</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($datas as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->year}}</td>
                    <td>{{$row->subsector}}</td>
                    <td>{{$row->location}}</td>
                    <td>{{$row->dry}}</td>
                    <td>{{$row->wet}}</td>
                    <td>{{$row->dry+$row->wet}}</td>
                </tr> 
            @endforeach
            </tbody>
        </table>

    @else
        <p>No data to display</p>
    @endif
@endsection
