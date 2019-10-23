@extends('layouts.app')
@section('content')
<style>
    td {
        height: 5px;
        text-align: left;
    }
</style>
    <h3>Morbidity details by organization</h3>
    @if(count($info)>0)
        <table class="table table-sm">
            <tr>
                <th>Sl</th>
                <th>Organization</th>
                <th>Morbidity</th>
                <th>Male</th>
                <th>Female</th>
                <th>Total</th>
            </tr>
            @foreach ($info as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->subsector}}</td>
                    <th>{{$row->morbidity}}</th>
                    <td>{{$row->male}}</td>
                    <td>{{$row->female}}</td>
                    <td>{{$row->total}}</td>
                </tr> 
            @endforeach
        </table>
    @else
        <p>No data to display</p>
    @endif
@endsection
