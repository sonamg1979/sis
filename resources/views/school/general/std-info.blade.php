@extends('layouts.master')
@section('script')
    <script>
      $(function () {
        $('#table1').DataTable({
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
            <h1>Student by  Class & Age-Group</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Education</a></li>
              <li class="breadcrumb-item active">Student by  Class & Age-Group</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Summery of students by age-range. Year: {{session('sess_Year')}}</h3>
            </div>
            <div class="card-body">
                @if(count($students)>0)
                <table id="table1" class="table table-bordered table-hover">
                    <thead>
                       <tr>
                            <th>Sl</th>
                            <th>Class</th>
                            <th>Age-Range</th>
                            <th>Male</th>
                            <th>Female</th>
                            <th>Total</th>
                        </tr> 
                    </thead>
                    <tbody>
                         @foreach ($students as $row)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$row->class}}</td>
                            <td>{{$row->age}}</td>
                            <td>{{$row->male}}</td>
                            <td>{{$row->female}}</td>
                            <td>{{$row->male+$row->female}}</td>
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
    
    
        
