@extends('layouts.app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>Students by School</h3>
    @if(count($students)>0)
        <table class="table table-sm" id="myTable">
            <thead>
            <tr>
                <th>Sl</th>
                <th>School</th>
                <th>Male</th>
                <th>Female</th>
                <th>Total</th>
            </tr>
            </thead>
        </body>
            @foreach ($students as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->subsector}}</td>
                    <td>{{$row->male}}</td>
                    <td>{{$row->female}}</td>
                    <td>{{$row->male+$row->female}}</td>

                </tr> 
            @endforeach
        </table>
        </table>
    @else
        <p>No data to display</p>
    @endif
@endsection
