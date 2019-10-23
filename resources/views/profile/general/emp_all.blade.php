@extends('layouts.app')
@section('content')
    <h3>Employee Details</h3>
    @if(count($profiles)>0)
    <table class="table table-bordered table-sm m-0">
            <thead class="">
                <tr>
                    <th>Sl</th>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Designation</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            @foreach ($profiles as $row)
            <tbody>   
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->employee_id}}</td>
                    <td>{{$row->employee_name}}</td>
                    <td>{{$row->designation}}</td>
                    <td><a href="/profile/{{$row->id}}/edit">View Details</td>
                    <td><a href="/profile/{{$row->id}}">History</td>

                </tr> 
            </tbody>
                @endforeach
            
        </table>

    @else
        <p>No data to display</p>
    @endif
@endsection
