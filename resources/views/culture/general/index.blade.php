@extends('layouts.app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>Cultural Heritage Details</h3>
    @if(count($infras)>0)
        <table class="table table-sm">
            <thead>
            <tr>
                <th>Sl</th>
                <th>Cultural Heritage</th>
                <th>Established Year</th>
                <th>Location</th>
                <th>Type of Heritage</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($infras as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->sitename}}</td>
                    <td>{{$row->estdyear}}</td>
                    <td>{{$row->location}}</td>
                    <td>{{$row->heritage_type}}</td>
                    <td><a href="/dashboard/culture_show/{{$row->id}}" class="btn btn-sm btn-success">Details</td>
                </tr> 
            @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-12 text-center">
                {{$infras->links()}}
            </div>

        </div>
    @else
        <p>No data to display</p>
    @endif
@endsection
