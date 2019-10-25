<style>
    th {
        text-align: justify;
    }
</style>
@extends('layouts.app')
@section('content')
    <h3>Site visit details</h3>
    @if(count($history)>0)
        <table class="table border" id="myTable">
            <thead>
            <tr>
                <th>Sl</th>
                <th>Visit date</th>
                <th>Observation</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($history as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->visit_date}}</td>
                    <td>{{$row->observation}}</td>
                    <td>@if (($row->status) == 'C')
                            <span class="text-success">Completed</span>
                        @elseif (($row->status)== 'O')
                            <span class="text-info">On Going</span>
                        @elseif (($row->status)== 'A')
                            <span class="text-warning">At Risk</span>
                        @elseif (($row->status)== 'I')
                            <span class="text-danger">Inompleted</span>
                        @elseif (($row->status)== 'H')
                            <span class="text-default">On hold</span>
                        @else
                        <span class="text-default">No updates made by Site Engineer</span>
                        @endif</td>
                </tr> 
            @endforeach
            </tbody>
        </table>
    @else
        <p>No data to display</p>
    @endif
    <center><a href="/dashboard" class="btn btn-primary">Home</a></center>
@endsection
