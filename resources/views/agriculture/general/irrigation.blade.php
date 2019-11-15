@extends('layouts.app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3> Irrigation channel details</h3>
    @if(count($datas)>0)
    <div class="table-responsive">
        <table class="table table-sm" id="myTable">
            <thead>
            <tr>
                <th>Sl</th>
                <th>Construct Year</th>
                <th>Gewog</th>
                <th>Location</th>
                <th>Length (KM)</th>
                <th>Benefeciaries (HH)</th>
                <th>Command area (Ac)</th>
                <th>Construction Mode</th>
                <th>Construction Type</th>
                <th>Chennel Type</th>
                <th>Association</th>
                <th>Male</th>
                <th>Female</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($datas as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->year}}</td>
                    <td>{{$row->subsector}}</td>
                    <td>{{$row->location}}</td>
                    <td>{{$row->length}}</td>
                    <td>{{$row->benefeciaries}}</td>
                    <td>{{$row->area}}</td>
                    <td>{{$row->construct_mode}}</td>
                    <td>{{$row->construct_type}}</td>
                    <td>{{$row->chennel_type}}</td>
                    <td>{{$row->associations == 'Y' ? 'Yes' : 'No' }}</td>
                    <td>{{$row->male}}</td>
                    <td>{{$row->female}}</td>
                    <td>{{$row->status == 'F' ? 'Functional' : 'Non-functional' }}</td>
                </tr> 
            @endforeach
            </tbody>
        </table>
    </div>
        <!-- <div class="row">
            <div class="col-12 text-center">
                
            </div>

        </div> -->
    @else
        <p>No data to display</p>
    @endif
@endsection
