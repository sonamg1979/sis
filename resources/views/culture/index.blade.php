@extends('layouts.admin-app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>Cultural Heritage Details</h3>
    @if(count($infras)>0)
        <table class="table table-sm">
            <tr>
                <th>Sl</th>
                <th>Cultural Heritage</th>
                <th>Established Year</th>
                <th>Location</th>
                <th>Type of Heritage</th>
                <th colspan="3">Action</th>
            </tr>
            @foreach ($infras as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->sitename}}</td>
                    <td>{{$row->estdyear}}</td>
                    <td>{{$row->location}}</td>
                    <td>{{$row->heritage_type}}</td>
                    <td><a href="/culture/{{$row->id}}/edit" class="btn btn-sm btn-primary">Edit</td>
                    <td><a href="/culture/{{$row->id}}" class="btn btn-sm btn-success">Details</td>
                    <td>
                        {!!Form::open(['action'=>['CultureController@destroy',$row->id],'method'=>'POST','class'=>'pull-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('DELETE',['class'=>'btn btn-sm btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                </tr> 
            @endforeach
        </table>
        <div class="row">
            <div class="col-12 text-center">
                {{$infras->links()}}
            </div>

        </div>
    @else
        <p>No data to display</p>
    @endif
@endsection
