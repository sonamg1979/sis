@extends('layouts.master')
@section('content')
    <h3>Employee Details</h3>
    @if(count($profiles)>0)
    <table class="table border" id="myTable">
            <thead class="">
                <tr>
                    <th>Sl</th>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Designation</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody> 
            @foreach ($profiles as $row)  
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->employee_id}}</td>
                    <td>{{$row->employee_name}}</td>
                    <td>{{$row->designation}}</td>
                    <td><a href="/dashboard/employee_show/{{$row->id}}">Details</td>
                    <td><a href="/dashboard/employee_history/{{$row->employee_id}}">History</td>
                </tr> 
                @endforeach
            </tbody>
        </table>

    @else
        <p>No data to display</p>
    @endif
    <center><a href="/dashboard" class="btn btn-primary">Home</a></center>
@endsection
