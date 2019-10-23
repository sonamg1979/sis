@extends('layouts.app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>School staff details</h3>
    @if(count($staffs)>0)
        <table class="table table-sm">
            <tr>
                <th>Sl</th>
                <th>School</th>
                <th colspan="3" class="bg-primary">Teacher</th>
                <th colspan="3" class="bg-danger">Contract</th>
                <th colspan="3" class="bg-success">Support Staff</th>
                
            </tr>
            <tr>
                <th colspan="2"></th>
                <th>Male</th>
                <th>Female</th>
                <th>Total</th>
                <th>Male</th>
                <th>Female</th>
                <th>Total</th>
                <th>Male</th>
                <th>Female</th>
                <th>Total</th>
            </tr>
            @foreach ($staffs as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->subsector}}</td>
                    <td>{{$row->tmale}}</td>
                    <td>{{$row->tfemale}}</td>
                    <td>{{$row->tmale+$row->tfemale}}</td>
                    <td>{{$row->cmale}}</td>
                    <td>{{$row->cfemale}}</td>
                    <td>{{$row->cmale+$row->cfemale}}</td>
                    <td>{{$row->smale}}</td>
                    <td>{{$row->sfemale}}</td>
                    <td>{{$row->smale+$row->sfemale}}</td>

                </tr> 
            @endforeach
        </table>
    @else
        <p>No data to display</p>
    @endif
@endsection
