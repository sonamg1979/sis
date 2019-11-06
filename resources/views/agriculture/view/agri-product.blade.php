@extends('layouts.app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>Agriculture Production Information. Year : {{session('sess_Year')}}</h3>
    @if(count($agriculture)>0)
        <table class="table table-sm table-bordered" id="myTable">
            <thead>
            <tr>
                <th>Sl</th>
                <th>Category</th>
                <th>Product</th>
                <th>Area/Number</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($agriculture as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->category}}</td>
                    <td>{{$row->product}}</td>
                    <td>{{$row->area}}</td>
                    <td>{{$row->productions}}</td>
                </tr> 
            @endforeach
            </tbody>
        </table>
    @else
        <p>No data to display</p>
    @endif
@endsection
