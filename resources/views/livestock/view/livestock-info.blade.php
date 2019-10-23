@extends('layouts.app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>Livestock Information</h3>
    @if(count($livestock)>0)
        <table class="table table-sm">
            <tr>
                <th>Sl</th>
                <th>Animal Type</th>
                <th>Total</th>
                
            </tr>
            @foreach ($livestock as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->animal}}</td>
                    <td>{{$row->total}}</td>
                </tr> 
            @endforeach
        </table>
    @else
        <p>No data to display</p>
    @endif
@endsection
