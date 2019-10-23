@extends('layouts.admin-app')
@section('content')
<style>
    td {
        height: 5px;
    }
    th {
        text-align: center;
    }
</style>
    <h3>Staff Details</h3>
    @if(count($staffs)>0)
        <table class="table table-sm">
            <tr>
                <th rowspan="2" align="center">Sl</th>
                <th rowspan="2">Year</th>
                <th colspan="2" align="center">Teacher</th>
                <th colspan="2">Contract</th>
                <th colspan="2">Staff</th>
                <th colspan="2" width="20%">Action</th>
            </tr>
            <tr>
                    <td>Male</td>
                    <td>Female</td>
                    <td>Male</td>
                    <td>Female</td>
                    <td>Male</td>
                    <td>Female</td>
                </tr>
            @foreach ($staffs as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->year}}</td>
                    <td>{{$row->tmale}}</td>
                    <td>{{$row->tfemale}}</td>
                    <td>{{$row->cmale}}</td>
                    <td>{{$row->cfemale}}</td>
                    <td>{{$row->smale}}</td>
                    <td>{{$row->sfemale}}</td>
                    <td><a href="/staff/{{$row->id}}/edit" class="btn btn-sm btn-primary">Edit</td>
                    <td>
                        {!!Form::open(['action'=>['SchoolStaffInfoController@destroy',$row->id],'method'=>'POST','class'=>'pull-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('DELETE',['class'=>'btn btn-sm btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                </tr> 
            @endforeach
        </table>
        <div class="row">
            <div class="col-12 text-center">
                {{$staffs->links()}}
            </div>

        </div>
    @else
        <p>No data to display</p>
    @endif
@endsection
