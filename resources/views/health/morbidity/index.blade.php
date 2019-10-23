@extends('layouts.admin-app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>General Morbidity Information</h3>
    @if(count($datas)>0)
        <table class="table table-sm">
            <tr>
                <th>Sl</th>
                <th>Year</th>
                <th>Disease</th>
                <th>Male</th>
                <th>Female</th>
                <th>Total</th>
                <th colspan="2">Action</th>
            </tr>
            @foreach ($datas as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->year}}</td>
                    <td>{{$row->morbidity}}</td>
                    <td>{{$row->male}}</td>
                    <td>{{$row->female}}</td>
                    <td>{{$row->total}}</td>
                    <td><a href="/morbidity/{{$row->id}}/edit" class="btn btn-sm btn-primary">Edit</td>
                    <td>
                        {!!Form::open(['action'=>['MorbidityController@destroy',$row->id],'method'=>'POST','class'=>'pull-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('DELETE',['class'=>'btn btn-sm btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                </tr> 
            @endforeach
        </table>
        <div class="row">
            <div class="col-12 text-center">
                {{$datas->links()}}
            </div>

        </div>
    @else
        <p>No data to display</p>
    @endif
@endsection
