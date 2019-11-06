@extends('layouts.app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3> Livestock infrastructure</h3>
    @if(count($datas)>0)
        <table class="table table-striped table-sm">
            @foreach ($datas as $row)
                <tr>
                    <th>Artifical Insemination center</th>
                    <th>Bio Gas</th>
                </tr>
                <tr>
                    <td>{{$row->ais}}</td>
                    <td>{{$row->biogas}}</td>
                </tr> 
                <tr>
                    <th colspan="4">Production Farm (unit-nos)</th>
                </tr>
                <tr>
                    <th rowspan="2">Poultry</th>
                    <th>Micro</th>
                    <th>Commercial</th>
                    <th>Brolier</th>
                </tr>
                <tr>
                    <td>{{$row->poultry_micro}}</td>
                    <td>{{$row->poultry_commercial}}</td>
                    <td>{{$row->poultry_broiler}}</td>
                </tr>
                <tr>
                    <th rowspan="2">Diary</th>
                    <th>Micro</th>
                    <th>Commercial</th>
                </tr>
                <tr>
                    <td>{{$row->diary_micro}}</td>
                    <td>{{$row->diary_commercial}}</td>
                </tr>
            @endforeach
        </table>
    @else
        <p>No data to display</p>
    @endif
@endsection
