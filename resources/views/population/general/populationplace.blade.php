@extends('layouts.master')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>Population Details by Place</h3>
    @if(count($populations)>0)
    @php
        $sec='';
        $sec1='';
        $cnt=1;
        $m=0;$f=0;$t=0;
    @endphp
        <table class="table table-striped table-sm">
            <tr>
                <th>Sl</th>
                <th>Place</th>
                <th>Age Group</th>
                <th>Male</th>
                <th>Female</th>
                <th>Total</th>
            </tr>
            @foreach ($populations as $row)
                @php
                    $m=$row->mtot+$m;
                    $f=$row->ftot+$f;
                    $t=$row->tot+$t;
                @endphp
                <tr>
                    <td>{{$cnt}}</td>
                    <td>{{($sec==$row->subsector) ? '': $row->subsector}}</td>
                    <td>{{$row->age_group}}</td>
                    <td>{{$row->mtot}}</td>
                    <td>{{$row->ftot}}</td>
                    <th>{{$row->tot}}</th>
                </tr> 
                    @php
                        $sec=$row->subsector;
                        $cnt++;
                    @endphp
                    
            @endforeach
        </table>
    @else
        <p>No data to display</p>
    @endif
@endsection
