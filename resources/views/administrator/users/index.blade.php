@extends('layouts.super-app')
@section('content')
    <h3>Admin User Details</h3>
    <a href="/users/create" class="btn btn-sm btn-success">Add New</a><br>
    <br>
    @if(count($users)>0)
        <table class="table table-striped">
            <tr>
                <th>Sl</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Agency</th>
                <th colspan="3" width="25%">Action</th>
            </tr>
            @foreach ($users as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->subsector}}</td>
                    <td><a href="/users/{{$row->id}}/edit" class="btn btn-sm btn-primary">Edit</td>
                    <td><a href="/users/create" class="btn btn-sm btn-success">Add</td>
                    <td>{!!Form::open(['action'=>['SuperUserController@destroy',$row->id],'method'=>'POST','class'=>'pull-right'])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('DELETE',['class'=>'btn btn-sm btn-danger'])}}
                            {!!Form::close()!!}</td>
                </tr> 
            @endforeach
        </table>
        <div class="row">
            <div class="col-12 text-center">
                {{$users->links()}}
            </div>

        </div>
    @else
        <p>No data to display</p>
    @endif
@endsection
