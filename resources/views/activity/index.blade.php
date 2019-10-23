@extends('layouts.admin-app')
@section('content')
    <h3>Employee Details</h3>
    @if(count($activitys)>0)
        <table class="table table-striped">
            <tr>
                <th>Sl</th>
                <th>Activities</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Type</th>
                <th>Total Budget</th>
                <th colspan="2" width="20%">Action</th>
            </tr>
            @foreach ($activitys as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->activity}}</td>
                    <td>{{$row->sdate}}</td>
                    <td>{{$row->edate}}</td>
                    <td>{{$row->budget_line}}</td>
                    <td>{{$row->allotted_budget}}</td>
                    <td><a href="/activity/{{$row->id}}/edit" class="btn btn-sm btn-primary">Edit</td>
                    <td>
                        {!!Form::open(['action'=>['ActivityController@destroy',$row->id],'method'=>'POST','class'=>'pull-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('DELETE',['class'=>'btn btn-sm btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                </tr> 
            @endforeach
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
