@extends('layouts.admin-app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>Farmers' Group/Associations/Cooperatives</h3>
    @if(count($groups)>0)
        <table class="table table-striped table-sm">
            <tr>
                <th>Sl</th>
                <th>Estd. Year</th>
                <th>Name of Farmers' Group/Associations/Cooperatives</th>
                <th>Number of Members</th>
                <th>Registration Number</th>
                <th colspan="2" width="20%">Action</th>
            </tr>
            @foreach ($groups as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->year}}</td>
                    <td>{{$row->group_name}}</td>
                    <td>{{$row->number}}</td>
                    <td>{{$row->registration_number}}</td>
                    <td><a href="/farmgroup/{{$row->id}}/edit" class="btn btn-sm btn-primary">Edit</td>
                    <td>
                        {!!Form::open(['action'=>['FarmGroupController@destroy',$row->id],'method'=>'POST','class'=>'pull-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('DELETE',['class'=>'btn btn-sm btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                </tr> 
            @endforeach
        </table>
        <div class="row">
            <div class="col-12 text-center">
                {{$groups->links()}}
            </div>

        </div>
    @else
        <p>No data to display</p>
    @endif
@endsection
