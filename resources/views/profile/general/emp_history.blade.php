@extends('layouts.master')
@section('content')
    <h3>Employee History List</h3>
    @if(count($historys)>0)
        <table class="table table-striped">
            <tr>
                <th>Sl</th>
                <th>Place</th>
                <th>Position</th>
                <th>From</th>
                <th>To</th>
            </tr>
            @foreach ($historys as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->place}}</td>
                    <td>{{$row->job}}</td>
                    <td>{{$row->from}}</td>
                    <td>{{$row->to}}</td>
                </tr> 
            @endforeach
        </table>
    @else
        <p>No data to display</p>
    @endif
    <hr>
    <center><a href="/dashboard" class="btn btn-primary">Home</a></center>
@endsection
