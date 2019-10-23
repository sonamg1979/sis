@extends('layouts.app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>General Agriculture Production Information</h3>
    @if(count($agriculture)>0)
        <table class="table table-sm">
            <tr>
                <th>Sl</th>
                <th>Gewog Office</th>
                <th>Category</th>
                <th>Product</th>
                <th>Area/Number</th>
                <th>Total</th>
            </tr>
            @foreach ($agriculture as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->subsector}}</td>
                    <td>{{$row->category}}</td>
                    <td>{{$row->product}}</td>
                    <td>{{$row->area_number}}</td>
                    <td>{{$row->productions}}</td>
                </tr> 
            @endforeach
        </table>
    @else
        <p>No data to display</p>
    @endif
@endsection
