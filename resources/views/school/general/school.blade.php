@extends('layouts.master')
@section('script')
    <script>
      $(function () {
        $('#table5').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
        });
      });
    </script>

@endsection
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
            <h1>School Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Education</a></li>
              <li class="breadcrumb-item active">School details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="title">School Infrastructures detail</h3>
            </div>
            <div class="card-body">
                @if(count($infras)>0)
                <table id="table5" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>School Name</th>
                            <th>Location</th>
                            <th>Year Estd.</th>
                            <th>School Level</th>
                            <th>Multipurpose Hall</th>
                            <th>Classroom</th>
                            <th>Football Ground</th>
                            <th>Volleyball Ground</th>
                            <th>Basketball Ground</th>
                            <th>Indoor Games</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($infras as $row)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$row->schoolname}}</td>
                            <td>{{$row->location}}</td> 
                            <td>{{$row->estdyear}}</td>
                            <td>{{$row->schoollevel}}</td>
                            <td>{{$row->hall}}</td>
                            <td>{{$row->classroom}}</td>
                            <td>{{($row->football=='Y') ? 'Yes': 'No'}}</td>
                            <td>{{($row->volleyball=='Y') ? 'Yes': 'No'}}</td>
                            <td>{{($row->basketball=='Y') ? 'Yes': 'No'}}</td>
                            <td>{{$row->indoor}}</td>
                        </tr>
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
    
    
       
