@extends('layouts.admin-app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>Production by Category</h3>
    @if(count($data)>0)
        <table class="table table-sm">
            <tr>
                <th>Sl</th>
                <th>Year</th>
                <th>Category</th>
                <th>Products</th>
                <th>Area/Number</th>
                <th>Producation</th>
                <th colspan="2" width="20%">Action</th>
            </tr>
            @foreach ($data as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->year}}</td>
                    <td>{{$row->category}}</td>
                    <td>{{$row->product}}</td>
                    <td>{{$row->area_number}}</td>
                    <td>{{$row->productions}}</td>
                    <td><a href="/agriproduction/{{$row->id}}/edit" class="btn btn-sm btn-primary">Edit</td>
                    <td>
                        {!!Form::open(['action'=>['AgriProductionController@destroy',$row->id],'method'=>'POST','class'=>'pull-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('DELETE',['class'=>'btn btn-sm btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                </tr> 
            @endforeach
        </table>
        <div class="row">
            <div class="col-12 text-center">
                {{$data->links()}}
            </div>

        </div>
    @else
        <p>No data to display</p>
    @endif
@endsection
