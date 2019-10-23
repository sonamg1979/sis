@extends('layouts.app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>General Agriculture Information by Gewog</h3>
    @if(count($agriculture)>0)
        <table class="table table-sm table-bordered">
            <tr>
                <th rowspan="2">Sl</th>
                <th rowspan="2">Gewog Office</th>
                <th colspan="2">Land Holdings</th>
                <th rowspan="2">Orchard</th>
                <th colspan="5">Irrigation channels</th>
                <th rowspan="2">Food Processing Unit</th>
                <th rowspan="2">Agri.Mills</th>
            </tr>
            <tr>
                <th>Dry</th>
                <th>Wet</th>
                <th>Functional</th>
                <th>Non-functional</th>
                <th>Length</th>
                <th>Area Covered</th>
                <th>Household Benefitted</th>
            </tr>
            @foreach ($agriculture as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->subsector}}</td>
                    <td>{{$row->dry}}</td>
                    <td>{{$row->wet}}</td>
                    <td>{{$row->orchad}}</td>
                    <td>{{$row->f_irrigation}}</td>
                    <td>{{$row->n_irrigation}}</td>
                    <td>{{$row->l_irrigation}}</td>
                    <td>{{$row->area_irrigation}}</td>
                    <td>{{$row->benefit_irrigation}}</td>
                    <td>{{$row->processing_unit}}</td>
                    <td>{{$row->mills}}</td>
                </tr> 
            @endforeach
        </table>
    @else
        <p>No data to display</p>
    @endif
@endsection
