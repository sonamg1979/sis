@extends('layouts.master')
@section('script')
    <script>
      $(function () {
        $('#table4').DataTable({
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
              <li class="breadcrumb-item active">teacher & Staff By School</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">School staff details</h3>
            </div>
            <div class="card-body">
                @if(count($staffs)>0)
                <table id="table4" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>School</th>
                            <th colspan="3" class="bg-primary">Teacher</th>
                            <th colspan="3" class="bg-danger">Contract</th>
                            <th colspan="3" class="bg-success">Support Staff</th>
                            
                        </tr>
                        <tr>
                            <th colspan="2"></th>
                            <th>Male</th>
                            <th>Female</th>
                            <th>Total</th>
                            <th>Male</th>
                            <th>Female</th>
                            <th>Total</th>
                            <th>Male</th>
                            <th>Female</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($staffs as $row)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$row->subsector}}</td>
                                <td>{{$row->tmale}}</td>
                                <td>{{$row->tfemale}}</td>
                                <td>{{$row->tmale+$row->tfemale}}</td>
                                <td>{{$row->cmale}}</td>
                                <td>{{$row->cfemale}}</td>
                                <td>{{$row->cmale+$row->cfemale}}</td>
                                <td>{{$row->smale}}</td>
                                <td>{{$row->sfemale}}</td>
                                <td>{{$row->smale+$row->sfemale}}</td>

                            </tr> 
                        @endforeach
                    </tbody>
                </table>
                @else
                <p>No Date to Display</p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
    
    