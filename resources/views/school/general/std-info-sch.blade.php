@extends('layouts.master')
@section('content')
<style>
    td {
        height: 5px;
    }
</style>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student by School</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Education</a></li>
              <li class="breadcrumb-item active">Student by School</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Students by School</h3>
            </div>
            <div class="card-body">
                @if(count($students)>0)
                    @php
                        $sch='';
                        $cnt=1;
                    @endphp
                <table class="table table-bordered table-hover" id="table3">
                    <thead>
                        <tr>
                            <th>School</th>
                            <th>Class</th>
                            <th>Male</th>
                            <th>Female</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $row)
                        <tr>
                            <td>{{($sch==$row->subsector) ? '' : $row->subsector}}</td>
                            <td>{{$row->class}}</td>
                            <td>{{$row->male}}</td>
                            <td>{{$row->female}}</td>
                            <td>{{$row->male+$row->female}}</td>

                        </tr>
                        @php
                            $sch=$row->subsector;
                            $cnt++
                        @endphp
                        @endforeach
                    </tbody>
                </table>
                @else
                <p>No data to display</p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
    
   
