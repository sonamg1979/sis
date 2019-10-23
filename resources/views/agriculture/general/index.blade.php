@extends('layouts.admin-app')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
    <h3>General Information</h3>
    @if(count($datas)>0)
        <table class="table table-sm">
            <tr>
                <th>Sl</th>
                <th>Year</th>
                <th>Wet</th>
                <th>Dry</th>
                <th>Orch.</th>
                <th>Fun-Irri</th>
                <th>Nonfun-Irri</th>
                <th>Len-Irri</th>
                <th>Area-Irri</th>
                <th>Benefit-Irri</th>
                <th>Pro.Unit</th>
                <th>Mills</th>
                <th colspan="2">Action</th>
            </tr>
            @foreach ($datas as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->year}}</td>
                    <td>{{$row->dry}}</td>
                    <td>{{$row->wet}}</td>
                    <td>{{$row->orchad}}</td>
                    <td>{{$row->f_irrigation}}</td>
                    <td>{{$row->n_irrigation}}</td>
                    <td>{{$row->l_irrigation}}</td>
                    <td>{{$row->area_irrigation}}</td>
                    <td>{{$row->benefit_irrigation}}</td>
                    <td>{{$row->processing_unit}}</td>
                    <td>{{$row->mills}}</td>
                    <td><a href="/agrigeneral/{{$row->id}}/edit" class="btn btn-sm btn-primary">Edit</td>
                    <td>
                        {!!Form::open(['action'=>['AgriGeneralController@destroy',$row->id],'method'=>'POST','class'=>'pull-right'])!!}
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
