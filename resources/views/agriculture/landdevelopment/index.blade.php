@extends('layouts.admin-app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>Land Development Plan</h3>
    @if(count($development)>0)
        <table class="table table-striped table-sm">
            <tr>
                <th>Sl</th>
                <th>Year</th>
                <th>Location</th>
                <th>Dry</th>
                <th>Wet</th>
                <th>Total</th>
                <th colspan="2" width="20%">Action</th>
            </tr>
            @foreach ($development as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->year}}</td>
                    <td>{{$row->location}}</td>
                    <td>{{$row->dry}}</td>
                    <td>{{$row->wet}}</td>
                    <td>{{$row->dry+$row->wet}}</td>
                    <td><a href="/landdevelopment/{{$row->id}}/edit" class="btn btn-sm btn-primary">Edit</td>
                    <td>
                        {!!Form::open(['action'=>['LandDevelopmentController@destroy',$row->id],'method'=>'POST','class'=>'pull-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('DELETE',['class'=>'btn btn-sm btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                </tr> 
            @endforeach
        </table>
        <div class="row">
            <div class="col-12 text-center">
                {{$development->links()}}
            </div>

        </div>
    @else
        <p>No data to display</p>
    @endif
@endsection
