@extends('layouts.app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>General Agriculture Information</h3>
    @if(count($agriculture)>0)
        <table class="table table-sm">
            @foreach ($agriculture as $row)
                <tr>
                    <th>Details</th>
                    <td>Total</td>
                </tr>
                <tr>
                    <th>Dry Land</th>
                    <td>{{$row->dry}}</td>
                </tr>
                <tr>
                    <th>Wet Land</th>
                    <td>{{$row->wet}}</td>
                </tr>
                <tr>
                    <th>Orchard</th>
                    <td>{{$row->orchad}}</td>
                </tr>
                <tr>
                    <th>Functional Irrigation channels</th>
                    <td>{{$row->f_irrigation}}</td>
                </tr>
                <tr>
                    <th>Non-Functional Irrigation channels</th>
                    <td>{{$row->n_irrigation}}</td>
                </tr>
                <tr>
                    <th>Total length of channels (km)</th>
                    <td>{{$row->l_irrigation}}</td>
                </tr>
                <tr>
                    <th>Area covered by irrigation  (acres)</th>
                    <td>{{$row->area_irrigation}}</td>
                </tr>
                <tr>
                    <th>Household benefitted by Irrigation</th>
                    <td>{{$row->benefit_irrigation}}</td>
                </tr>
                <tr>
                    <th>Number of Food Processing Unit</th>
                    <td>{{$row->processing_unit}}</td>
                </tr>
                <tr>
                    <th>Number of agriculture mills </th>
                    <td>{{$row->mills}}</td>
                </tr> 
            @endforeach
        </table>
    @else
        <p>No data to display</p>
    @endif
@endsection
