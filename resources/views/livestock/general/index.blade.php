@extends('layouts.admin-app')
@section('content')
<style>
    td {
        height: 5px;
    }

</style>
    <h3>General Livestock Information</h3>
    @if(count($info)>0)
        <table class="table table-sm">
            <tr>
                <th>Sl</th>
                <th>Year</th>
                <th>Animals</th>
                <th>Total</th>
                <th colspan="2" width="20%">Action</th>
            </tr>
            @foreach ($info as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->year}}</td>
                    <td>{{$row->animal}}</td>
                    <td>{{$row->total}}</td>
                    <td><a href="/livestockgeneral/{{$row->id}}/edit" class="btn btn-sm btn-primary">Edit</td>
                    <td>
                        {!!Form::open(['action'=>['LivestockGeneralController@destroy',$row->id],'method'=>'POST','class'=>'pull-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('DELETE',['class'=>'btn btn-sm btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                </tr> 
            @endforeach
        </table>
        <div class="row">
            <div class="col-12 text-center">
                {{$info->links()}}
            </div>

        </div>
    @else
        <p>No data to display</p>
    @endif
@endsection
