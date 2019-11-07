@extends('layouts.super-app')
@section('content')
    <h3>Channel Type</h3>
    <a href="/channel/create" class="btn btn-sm btn-success">Add New</a><br>
    <br>
    @if(count($sectors)>0)
        <table class="table table-striped" id="myTable">
            <thead>
            <tr>
                <th>Sl</th>
                <th>Channel Type</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($sectors as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->chennel_type}}</td>
                    <td><a href="/channel/{{$row->id}}/edit" class="btn btn-sm btn-primary">Edit</td>
                    <td>{!!Form::open(['action'=>['MasterChannelController@destroy',$row->id],'method'=>'POST','class'=>'pull-right'])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('DELETE',['class'=>'btn btn-sm btn-danger'])}}
                            {!!Form::close()!!}</td>
                </tr> 
            @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-12 text-center">
                {{$sectors->links()}}
            </div>

        </div>
    @else
        <p>No data to display</p>
    @endif
@endsection
