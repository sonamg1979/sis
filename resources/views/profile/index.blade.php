@extends('layouts.admin-app')
@section('content')
    <h3>Employee Details</h3>
    @if(count($profiles)>0)
        <table class="table table-striped">
            <tr>
                <th>Sl</th>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th colspan="3" width="25%">Action</th>
            </tr>
            @foreach ($profiles as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->employee_id}}</td>
                    <td>{{$row->employee_name}}</td>
                    <td><a href="/profile/{{$row->id}}/edit" class="btn btn-sm btn-primary">Edit</td>
                        <td><a href="/profile/{{$row->id}}" class="btn btn-sm btn-success">Details</td>
                    <td>
                        {!!Form::open(['action'=>['ProfileController@destroy',$row->id],'method'=>'POST','class'=>'pull-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('DELETE',['class'=>'btn btn-sm btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                </tr> 
            @endforeach
        </table>
        <div class="row">
            <div class="col-12 text-center">
                {{$profiles->links()}}
            </div>

        </div>
    @else
        <p>No data to display</p>
    @endif
@endsection
