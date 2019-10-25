@extends('layouts.app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>School Information</h3>
    @if(count($infras)>0)
        <table class="table table-sm" id="myTable">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>School Name</th>
                    <th>Location</th>
                    <th>Year Established</th>
                    <th>School Level</th>
                    <th>Multipurpose Hall</th>
                    <th>Classroom</th>
                    <th>Football Ground</th>
                    <th>Volleyball Ground</th>
                    <th>Basketball Ground</th>
                    <th>Indoor Games</th>
                </tr>

            </thead>
            <tbody>
            @foreach ($infras as $row)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$row->schoolname}}</td>
                <td>{{$row->location}}</td> 
                <td>{{$row->estdyear}}</td>
                <td>{{$row->schoollevel}}</td>
                <td>{{$row->hall}}</td>
                <td>{{$row->classroom}}</td>
                <td>{{$row->football}}</td>
                <td>{{$row->volleyball}}</td>
                <td>{{$row->basketball}}</td>
                <td>{{$row->indoor}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>No data to display</p>
    @endif
@endsection
