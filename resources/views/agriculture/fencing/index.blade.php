@extends('layouts.admin-app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3> Electric/solar fencing</h3>
    @if(count($fencing)>0)
        <table class="table table-sm">
            <tr>
                <th>Sl</th>
                <th>Year</th>
                <th>Location</th>
                <th>Length</th>
                <th>Benefeciaries (HH)</th>
                <th>Dry Land</th>
                <th>Wet Land</th>
                <th>Total</th>
                <th>Status</th>
                <th>Type</th>
                <th colspan="2">Action</th>
            </tr>
            @foreach ($fencing as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->year}}</td>
                    <td>{{$row->location}}</td>
                    <td>{{$row->length}}</td>
                    <td>{{$row->beneficiaries}}</td>
                    <td>{{$row->dry}}</td>
                    <td>{{$row->wet}}</td>
                    <td>{{$row->dry+$row->wet}}</td>
                    <td>{{$row->status}}</td>
                    <td>{{$row->type}}</td>
                    <td><a href="/electricfencing/{{$row->id}}/edit" class="btn btn-sm btn-primary">Edit</td>
                    <td>
                        {!!Form::open(['action'=>['ElectricFencingController@destroy',$row->id],'method'=>'POST','class'=>'pull-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('DELETE',['class'=>'btn btn-sm btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                </tr> 
            @endforeach
        </table>
        <div class="row">
            <div class="col-12 text-center">
                {{$fencing->links()}}
            </div>

        </div>
    @else
        <p>No data to display</p>
    @endif
@endsection
