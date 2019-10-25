@extends('layouts.admin-app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>Site Visit Details</h3>
    @if(count($sitevisit)>0)
        <table class="table table-striped table-sm">
            <tr>
                <th>Sl</th>
                <th>Activity</th>
                <th>Visit Date</th>
                <th>Status</th>
                <th colspan="2" width="20%">Action</th>
            </tr>
            @foreach ($sitevisit as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->activity}}</td>
                    <td>{{$row->visit_date}}</td>
                    <td>{{$row->status}}</td>
                    <td><a href="/engineer/{{$row->id}}/edit" class="btn btn-sm btn-primary">Edit</td>
                    <td>
                        {!!Form::open(['action'=>['EngineerController@destroy',$row->id],'method'=>'POST','class'=>'pull-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('DELETE',['class'=>'btn btn-sm btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                </tr> 
            @endforeach
        </table>
        <div class="row">
            <div class="col-12 text-center">
                {{$sitevisit->links()}}
            </div>

        </div>
    @else
        <p>No data to display</p>
    @endif
@endsection
