@extends('layouts.app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>Summery of students by age-range. Year: {{session('sess_Year')}}</h3>
    @if(count($students)>0)
        @php
            $m=0; $f=0; $t=0;
        @endphp
        <table class="table border" id="myTable">
            <thead>
            <tr>
                <th>Sl</th>
                <th>Class</th>
                <th>Male</th>
                <th>Female</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($students as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->class}}</td>
                    <td>{{$row->male}}</td>
                    <td>{{$row->female}}</td>
                    <td>{{$row->male+$row->female}}</td>

                </tr> 
                @php
                    $m=$m+$row->male;
                    $f=$f+$row->female;
                    $t=$t+($row->male+$row->female);
                @endphp
            @endforeach
            <tr>
                <th>Total</th>
                <th></th>
                <th>{{$m}}</th>
                <th>{{$f}}</th>
                <th>{{$t}}</th>
            </tr>
            </tbody>
        </table>
    @else
        <p>No data to display</p>
    @endif
@endsection
