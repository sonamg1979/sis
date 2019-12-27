@extends('layouts.app')
@section('content')
<style>
    th {
        text-align: center;
    }
    td {
        height: 5px;
    }
</style>
    <h3>Primary Focus</h3>
    @if(count($focus)>0)
        <table class="table border table-sm" id="myTable">
            <thead>
            <tr>
                <th>Sl</th>
                <th>Year</th>
                <th>Agency</th>
                <th>Title</th>
                <th>Description</th>
                <th>Estimated Budget (in million)</th>
                <th>Completion Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($focus as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->year}}</td>
                    <td>{{$row->subsector}}</td>
                    <td>{{$row->title}}</td>
                    <td>{{$row->description}}</td>
                    <td>{{$row->budget}}</td>
                    <td>{{$row->complete_date}}</td>
                </tr> 
            @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-12 text-center">
                {{$focus->links()}}
            </div>

        </div>
    @else
        <p>No data to display</p>
    @endif
@endsection
