@extends('layouts.admin-app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>Population Details</h3>
    @if(count($populations)>0)
        <table class="table table-striped table-sm">
            <tr>
                <th>Sl</th>
                <th>Year</th>
                <th>Place</th>
                <th>Age Group</th>
                <th>Male</th>
                <th>Female</th>
                <th>Total</th>
                <th colspan="2" width="20%">Action</th>
            </tr>
            @foreach ($populations as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->year}}</td>
                    <td>{{$row->subsector}}</td>
                    <td>{{$row->age_group}}</td>
                    <td>{{$row->mtot}}</td>
                    <td>{{$row->ftot}}</td>
                    <td>{{$row->tot}}</td>
                    <td><a href="/population/{{$row->id}}/edit" class="btn btn-sm btn-primary">Edit</td>
                    <td>
                        {!!Form::open(['action'=>['PopulationController@destroy',$row->id],'method'=>'POST','class'=>'pull-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('DELETE',['class'=>'btn btn-sm btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                </tr> 
            @endforeach
        </table>
        <div class="row">
            <div class="col-12 text-center">
                {{$populations->links()}}
            </div>

        </div>
    @else
        <p>No data to display</p>
    @endif
@endsection
