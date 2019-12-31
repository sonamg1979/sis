@extends('layouts.master')
@section('script')
    <script>
      $(function () {
        $('#example2').DataTable({
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
            <h1>Student by Class</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Education</a></li>
              <li class="breadcrumb-item active">Student by age-range</li>
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
                    @if(count($students)>0)
                    @php
                        $m=0; $f=0; $t=0;
                    @endphp
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Class</th>
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
                                <td>{{$row->male}}</td>
                                <td>{{$row->female}}</td>
                                <td>{{$row->male+$row->female}}</td>    
                            </tr> 
                            @php
                                $m=$m+$row->male;
                                $f=$f+$row->female;
                                $t=$t+($row->male+$row->female);
                            @endphp
                            @endforeach
                            <tr>
                                <th>Total</th>
                                <th></th>
                                <th>{{$m}}</th>
                                <th>{{$f}}</th>
                                <th>{{$t}}</th>
                            </tr>
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

   