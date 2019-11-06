@extends('layouts.app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>Livestock Production</h3>
    @if(count($livestock)>0)
        <table class="table table-sm" id="myTable">
            <thead>
            <tr>
                <th>Sl</th>
                <th>Products</th>
                <th>Total</th>
                
            </tr>
            </thead>
            <tbody>
            @foreach ($livestock as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->products}}</td>
                    <td>{{$row->total}}</td>
                </tr> 
            @endforeach
            </tbody>
        </table>
    @else
        <p>No data to display</p>
    @endif
@endsection
