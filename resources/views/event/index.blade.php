@extends('layouts.admin-app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>Important Events</h3>
    @if(count($events)>0)
        <table class="table table-striped table-sm">
            <tr>
                <th>Sl</th>
                <th>Events</th>
                <th>Start date</th>
                <th>End date</th>
                <th colspan="2" width="20%">Action</th>
            </tr>
            @foreach ($events as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->events}}</td>
                    <td>{{$row->sdate}}</td>
                    <td>{{$row->edate}}</td>
                    <td><a href="/events/{{$row->id}}/edit" class="btn btn-sm btn-primary">Edit</td>
                    <td>
                        {!!Form::open(['action'=>['EventsController@destroy',$row->id],'method'=>'POST','class'=>'pull-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('DELETE',['class'=>'btn btn-sm btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                </tr> 
            @endforeach
        </table>
        <div class="row">
            <div class="col-12 text-center">
                {{$events->links()}}
            </div>

        </div>
    @else
        <p>No data to display</p>
    @endif
@endsection
