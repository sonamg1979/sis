@extends('layouts.master')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>Summery of population by Age-group</h3>
    @if(count($populations)>0)
        @php 
            $m=0; $f=0; $t=0;
        @endphp
        <table class="table table-striped table-sm">
            <tr>
                <th>Sl</th>
                <th>Age Group</th>
                <th>Male</th>
                <th>Female</th>
                <th>Total</th>
            </tr>
            @foreach ($populations as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->age_group}}</td>
                    <td>{{$row->mtot}}</td>
                    <td>{{$row->ftot}}</td>
                    <th>{{$row->tot}}</th>
                </tr>
                @php
                    $m=$m+$row->mtot; 
                    $f=$f+$row->ftot; 
                    $t=$t+$row->tot;
                @endphp
                    
            @endforeach
            <tr>
                <th colspan="2">Total</th>
                <th>{{$m}}</th>
                <th>{{$f}}</th>
                <th>{{$t}}</th>
            </tr>
        </table>
    @else
        <p>No data to display</p>
    @endif
@endsection
