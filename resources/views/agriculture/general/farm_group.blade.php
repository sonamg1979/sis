@extends('layouts.app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>Farmer's groups/associations/corporatives</h3>
    @if(count($datas)>0)
        <table class="table table-sm" id="myTable">
            <thead>
            <tr>
                <th>Sl</th>
                <th>Estd. Year</th>
                <th>Gewog</th>
                <th>Group Name</th>
                <th>Member</th>
                <th>Registration Number</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($datas as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->year}}</td>
                    <td>{{$row->subsector}}</td>
                    <td>{{$row->group_name}}</td>
                    <td>{{$row->number}}</td>
                    <td>{{$row->registration_number}}</td>
                </tr> 
            @endforeach
            </tbody>
        </table>
    @else
        <p>No data to display</p>
    @endif
@endsection
