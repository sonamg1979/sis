@extends('layouts.admin-app')
@section('content')
<style>
    th {
        text-align: center;
    }
    td {
        height: 5px;
    }
</style>
    <h3>Primary Focus</h3>
    @if(count($focus)>0)
        <table class="table table-striped table-sm">
            <tr>
                <th>Sl</th>
                <th>Title</th>
                <th>Description</th>
                <th>Estimated Budget</th>
                <th>Completion Date</th>
                <th colspan="2" width="20%">Action</th>
            </tr>
            @foreach ($focus as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->title}}</td>
                    <td>{{$row->description}}</td>
                    <td>{{$row->budget}}</td>
                    <td>{{$row->complete_date}}</td>
                    <td><a href="/focus/{{$row->id}}/edit" class="btn btn-sm btn-primary">Edit</td>
                    <td>
                        {!!Form::open(['action'=>['PrimaryFocusController@destroy',$row->id],'method'=>'POST','class'=>'pull-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('DELETE',['class'=>'btn btn-sm btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                </tr> 
            @endforeach
        </table>
        <div class="row">
            <div class="col-12 text-center">
                {{$focus->links()}}
            </div>

        </div>
    @else
        <p>No data to display</p>
    @endif
@endsection
