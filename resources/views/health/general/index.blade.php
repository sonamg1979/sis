@extends('layouts.admin-app')
@section('content')
<style>
    td {
        height: 5px;
        text-align: center;
    }
</style>
    <h3>General Information</h3>
    @if(count($datas)>0)
        <table class="table table-sm">
            <tr>
                <th>Sl</th>
                <th>Year</th>
                <th>Type</th>
                <th>Ambu.</th>
                <th>Doc.</th>
                <th>Drung.</th>
                <th>CO</th>
                <th>ACO</th>
                <th>HA</th>
                <th>BHW</th>
                <th>Physo.</th>
                <th>Nurses</th>
                <th>Menpas</th>
                <th>Pharma</th>
                <th>Tech.</th>
                <th>Lab.Tech.</th>
                <th>VHW</th>
                <th>Staffs</th>
                <th colspan="2">Action</th>
            </tr>
            @foreach ($datas as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->year}}</td>
                    <td>{{$row->type}}</td>
                    <td>{{$row->ambulance}}</td>
                    <td>{{$row->doctor}}</td>
                    <td>{{$row->ambulance}}</td>
                    <td>{{$row->clinicofficer}}</td>
                    <td>{{$row->asstclinicofficer}}</td>
                    <td>{{$row->ha}}</td>
                    <td>{{$row->bhw}}</td>
                    <td>{{$row->physiotherapists}}</td>
                    <td>{{$row->nurses}}</td>
                    <td>{{$row->sowamenpa}}</td>
                    <td>{{$row->pharmacists}}</td>
                    <td>{{$row->technicians}}</td>
                    <td>{{$row->labtechonologist}}</td>
                    <td>{{$row->vhw}}</td>
                    <td>{{$row->supportstaff}}</td>
                    <td><a href="/general/{{$row->id}}/edit" class="btn btn-sm btn-primary">Edit</td>
                    <td>
                        {!!Form::open(['action'=>['GeneralHealthController@destroy',$row->id],'method'=>'POST','class'=>'pull-right'])!!}
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
