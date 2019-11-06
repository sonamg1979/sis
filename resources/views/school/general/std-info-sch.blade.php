@extends('layouts.app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>Students by School</h3>
    @if(count($students)>0)
    @php
        $sch='';
        $cnt=1;
    @endphp
        <table class="table table-sm">
            <tr>
                <th>School</th>
                <th>Class</th>
                <th>Male</th>
                <th>Female</th>
                <th>Total</th>
            </tr>
            @foreach ($students as $row)
                <tr>
                    <td>{{($sch==$row->subsector) ? '' : $row->subsector}}</td>
                    <td>{{$row->class}}</td>
                    <td>{{$row->male}}</td>
                    <td>{{$row->female}}</td>
                    <td>{{$row->male+$row->female}}</td>

                </tr>
                @php
                    $sch=$row->subsector;
                    $cnt++
                @endphp
            @endforeach
            
        </table>
    @else
        <p>No data to display</p>
    @endif
@endsection
