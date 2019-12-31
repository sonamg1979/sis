<style>
    th {
        text-align: justify;
    }
</style>
@extends('layouts.master')
@section('script')
    <script>
      $(function () {
        $('#table14').DataTable({
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
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Site visit details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Project/Activities</a></li>
              <li class="breadcrumb-item"><a href="#">Activity detail</a></li>
              <li class="breadcrumb-item active">Site visit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if(count($history)>0)
                <table id="table14" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Visit date</th>
                            <th>Observation</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($history as $row)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$row->visit_date}}</td>
                            <td>{{$row->observation}}</td>
                            <td>@if (($row->status) == 'C')
                                    <span class="text-success">Completed</span>
                                @elseif (($row->status)== 'O')
                                    <span class="text-info">On Going</span>
                                @elseif (($row->status)== 'A')
                                    <span class="text-warning">At Risk</span>
                                @elseif (($row->status)== 'I')
                                    <span class="text-danger">Inompleted</span>
                                @elseif (($row->status)== 'H')
                                    <span class="text-default">On hold</span>
                                @else
                                <span class="text-default">No updates made by Site Engineer</span>
                                @endif</td>
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
<center><a href="/dashboard" class="btn btn-primary">Home</a></center>
@endsection
    
        