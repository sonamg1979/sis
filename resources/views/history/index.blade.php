@extends('layouts.admin-app')
@section('content')
    <h3>Employee History List</h3>
    @if(count($historys)>0)
        <table class="table table-striped">
            <tr>
                <th>Sl</th>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th width="20%">Action</th>
            </tr>
            @foreach ($historys as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->employee_id}}</td>
                    <td>{{$row->employee_name}}</td>
                    <td><a href="/history/{{$row->employee_id}}" class="btn btn-sm btn-dark">Details</td>
                </tr> 
            @endforeach
        </table>
        <div class="row">
            <div class="col-12 text-center">
                {{$historys->links()}}
            </div>

        </div>
    @else
        <p>No data to display</p>
    @endif
@endsection
