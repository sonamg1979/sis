@extends('layouts.admin-app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>Farm road details</h3>
    @if(count($datas)>0)
        <table class="table table-sm">
            <tr>
                <th>Sl</th>
                <th>Year</th>
                <th>Road Name</th>
                <th>Chiwog</th>
                <th>Existing length (KM)</th>
                <th>Benefeciaries (HH)</th>
                <th>Construction Mode</th>
                <th>Construction Type</th>
                <th>Road user group</th>
                <th>Male</th>
                <th>Female</th>
                <th>Status</th>
                <th colspan="2">Action</th>
            </tr>
            @foreach ($datas as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->year}}</td>
                    <td>{{$row->road_name}}</td>
                    <td>{{$row->chiwog}}</td>
                    <td>{{$row->length}}</td>
                    <td>{{$row->benefeciaries}}</td>
                    <td>{{$row->construct_mode}}</td>
                    <td>{{$row->construct_type}}</td>
                    <td>{{$row->group == 'Y' ? 'Yes' : 'No' }}</td>
                    <td>{{$row->male}}</td>
                    <td>{{$row->female}}</td>
                    <td>{{$row->status == 'C' ? 'Completed' : 'Incomplete'}}</td>
                    <td><a href="/farmroad/{{$row->id}}/edit" class="btn btn-sm btn-primary">Edit</td>
                    <td>
                        {!!Form::open(['action'=>['FarmRoadController@destroy',$row->id],'method'=>'POST','class'=>'pull-right'])!!}
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
