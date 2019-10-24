@extends('layouts.admin-app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>School Information</h3>
    @if(count($infras)>0)
        <table class="table table-sm">
            @foreach ($infras as $row)
                <tr>
                    <th>School Name</th>
                    <td>{{$row->schoolname}}</td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td>{{$row->location}}</td>
                </tr>
                <tr>
                    <th>Year Established</th>
                    <td>{{$row->estdyear}}</td>
                </tr>
                <tr>
                    <th>School Level</th>
                    <td>{{$row->schoollevel}}</td>
                </tr>
                <tr>
                    <th>No. Multipurpose Hall</th>
                    <td>{{$row->hall}}</td>
                </tr>
                <tr>
                    <th>No. of Classroom</th>
                    <td>{{$row->classroom}}</td>
                </tr>
                <tr>
                    <th>Football Ground</th>
                    <td>{{$row->football}}</td>
                </tr>
                <tr>
                    <th>Volleyball Ground</th>
                    <td>{{$row->volleyball}}</td>
                </tr>
                <tr>
                    <th>Basketball Ground</th>
                    <td>{{$row->basketball}}</td>
                </tr>
                <tr>
                    <th>Indoor Games</th>
                    <td>{{$row->indoor}}</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <th><a href="/school/{{$row->id}}/edit" class="btn btn-sm btn-primary">Edit</th>
                    <td>
                    
                        {!!Form::open(['action'=>['SchoolInfraController@destroy',$row->id],'method'=>'POST','class'=>'pull-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('DELETE',['class'=>'btn btn-sm btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                </tr> 
            @endforeach
        </table>
    @else
        <p>No data to display</p>
    @endif
@endsection
