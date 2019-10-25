@extends('layouts.app')
@section('content')
    <h3>Major Activities</h3>
    @if(count($activitys)>0)
        <table class="table border" id="myTable">
            <thead>
            <tr>
                <th>Sl</th>
                <th>Agency</th>
                <th>Activities</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Type</th>
                <th>Total Budget</th>
                <th>Status</th>
                <th>Site Engineer</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($activitys as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->subsector}}</td>
                    <td>{{$row->activity}}</td>
                    <td>{{$row->sdate}}</td>
                    <td>{{$row->edate}}</td>
                    <td>{{$row->budget_line}}</td>
                    <td>{{$row->allotted_budget}}</td>
                    <td>{{$row->status}}</td>
                    <td>{{$row->employee_name}}</td>
                    <td><a href="/dashboard/activity_show/{{$row->id}}">View</td>
                </tr> 
            @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-12 text-center">
                {{$activitys->links()}}
            </div>

        </div>
    @else
        <p>No data to display</p>
    @endif
@endsection
