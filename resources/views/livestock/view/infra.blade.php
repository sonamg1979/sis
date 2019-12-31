@extends('layouts.master')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Livestock infrastructure</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">livestock</a></li>
              <li class="breadcrumb-item active">infrastructure</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if(count($datas)>0)
                <table id="table11" class="table table-bordered table-hover">
                    @foreach ($datas as $row)
                <tr>
                    <th>Artifical Insemination center</th>
                    <th>Bio Gas</th>
                </tr>
                <tr>
                    <td>{{$row->ais}}</td>
                    <td>{{$row->biogas}}</td>
                </tr> 
                <tr>
                    <th colspan="4">Production Farm (unit-nos)</th>
                </tr>
                <tr>
                    <th rowspan="2">Poultry</th>
                    <th>Micro</th>
                    <th>Commercial</th>
                    <th>Brolier</th>
                </tr>
                <tr>
                    <td>{{$row->poultry_micro}}</td>
                    <td>{{$row->poultry_commercial}}</td>
                    <td>{{$row->poultry_broiler}}</td>
                </tr>
                <tr>
                    <th rowspan="2">Diary</th>
                    <th>Micro</th>
                    <th>Commercial</th>
                </tr>
                <tr>
                    <td>{{$row->diary_micro}}</td>
                    <td>{{$row->diary_commercial}}</td>
                </tr>
                @endforeach
                </table>
                @else
                <p>No data to display</p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
    
        
