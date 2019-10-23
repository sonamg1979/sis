@extends('layouts.admin-app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>Students by age-range</h3>
    @if(count($students)>0)
        <table class="table table-sm">
            <tr>
                <th>Sl</th>
                <th>Year</th>
                <th>Class</th>
                <th>Age-Range</th>
                <th>Male</th>
                <th>Female</th>
                <th>Total</th>
                <th colspan="2" width="20%">Action</th>
            </tr>
            @foreach ($students as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->year}}</td>
                    <td>{{$row->class}}</td>
                    <td>{{$row->age}}</td>
                    <td>{{$row->male}}</td>
                    <td>{{$row->female}}</td>
                    <td>{{$row->male+$row->female}}</td>
                    <td><a href="/student/{{$row->id}}/edit" class="btn btn-sm btn-primary">Edit</td>
                    <td>
                        {!!Form::open(['action'=>['SchoolStudentInfoController@destroy',$row->id],'method'=>'POST','class'=>'pull-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('DELETE',['class'=>'btn btn-sm btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                </tr> 
            @endforeach
        </table>
        <div class="row">
            <div class="col-12 text-center">
                {{$students->links()}}
            </div>

        </div>
    @else
        <p>No data to display</p>
    @endif
@endsection
