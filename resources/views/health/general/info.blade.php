@extends('layouts.app')
@section('content')
<style>
    td {
        height: 5px;
        text-align: center;
    }
</style>
    <h3>Health Personnel by type</h3>
    @if(count($info)>0)
        <table class="table table-sm">
            <tr>
                <th>Sl</th>
                <th>Organization</th>
                <th>Type</th>
                <th>Ambu.</th>
                <th>Doc.</th>
                <th>Drung.</th>
                <th>CO</th>
                <th>ACO</th>
                <th>HA</th>
                <th>BHW</th>
                <th>Physo.</th>
                <th>Nurses</th>
                <th>Menpas</th>
                <th>Pharma</th>
                <th>Tech.</th>
                <th>Lab.Tech.</th>
                <th>VHW</th>
                <th>Staffs</th>
            </tr>
            @foreach ($info as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <th>{{$row->subsector}}</th>
                    <th>{{$row->type}}</th>
                    <td>{{$row->ambulance}}</td>
                    <td>{{$row->doctor}}</td>
                    <td>{{$row->ambulance}}</td>
                    <td>{{$row->clinicofficer}}</td>
                    <td>{{$row->asstclinicofficer}}</td>
                    <td>{{$row->ha}}</td>
                    <td>{{$row->bhw}}</td>
                    <td>{{$row->physiotherapists}}</td>
                    <td>{{$row->nurses}}</td>
                    <td>{{$row->sowamenpa}}</td>
                    <td>{{$row->pharmacists}}</td>
                    <td>{{$row->technicians}}</td>
                    <td>{{$row->labtechonologist}}</td>
                    <td>{{$row->vhw}}</td>
                    <td>{{$row->supportstaff}}</td>
                </tr> 
            @endforeach
        </table>
    @else
        <p>No data to display</p>
    @endif
@endsection
