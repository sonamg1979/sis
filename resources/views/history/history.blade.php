@extends('layouts.admin-app')
@section('content')
    <h3>Employee History Details</h3>
    @if(count($historys)>0)
        <table class="table table-striped">
            <tr>
                <th>Sl</th>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Place</th>
                <th>Job</th>
                <th>From</th>
                <th>To</th>
                <th colspan="2" width="20%">Action</th>
            </tr>
            @foreach ($historys as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->employee_id}}</td>
                    <td>{{$row->employee_name}}</td>
                    <td>{{$row->place}}</td>
                    <td>{{$row->job}}</td>
                    <td>{{$row->from}}</td>
                    <td>{{$row->to}}</td>
                    <td><a href="/history/{{$row->id}}/edit" class="btn btn-sm btn-primary">Edit</td>
                    <td>
                        {!!Form::open(['action'=>['HistoryController@destroy',$row->id],'method'=>'POST','class'=>'pull-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('DELETE',['class'=>'btn btn-sm btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
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
