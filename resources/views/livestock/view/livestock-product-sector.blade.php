@extends('layouts.app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>Livestock Information by Gewog</h3>
    @if(count($livestock)>0)
        <table class="table table-sm">
            <tr>
                <th>Sl</th>
                <th>Gewog</th>
                <th>Products</th>
                <th>Total</th>
                
            </tr>
            @foreach ($livestock as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->subsector}}</td>
                    <td>{{$row->products}}</td>
                    <td>{{$row->total}}</td>
                </tr> 
            @endforeach
        </table>
    @else
        <p>No data to display</p>
    @endif
@endsection
