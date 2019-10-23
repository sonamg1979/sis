@extends('layouts.app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>Population Details by Place</h3>
    @if(count($populations)>0)
        <table class="table table-striped table-sm">
            <tr>
                <th>Sl</th>
                <th>Place</th>
                <th>Age Group</th>
                <th>Male</th>
                <th>Female</th>
                <th>Total</th>
            </tr>
            @foreach ($populations as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->subsector}}</td>
                    <td>{{$row->age_group}}</td>
                    <td>{{$row->mtot}}</td>
                    <td>{{$row->ftot}}</td>
                    <th>{{$row->tot}}</th>
                </tr> 
            @endforeach
        </table>
    @else
        <p>No data to display</p>
    @endif
@endsection
