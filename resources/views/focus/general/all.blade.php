@extends('layouts.master')
@section('content')
<style>
    th {
        text-align: center;
    }
    td {
        height: 5px;
    }
</style>
@section('script')
    <script>
      $(function () {
        $('#focusTable').DataTable({
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
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Primary Focus of the Sector</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Primary focus of the sector</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if(count($focus)>0)
                <table class="table table-bordered table-hover table-responsive" id="focusTable">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Year</th>
                    <th>Agency</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Estimated Budget (in million)</th>
                    <th>Completion Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($focus as $row)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$row->year}}</td>
                        <td>{{$row->subsector}}</td>
                        <td>{{$row->title}}</td>
                        <td>{{$row->description}}</td>
                        <td>{{$row->budget}}</td>
                        <td>{{$row->complete_date}}</td>
                    </tr> 
                @endforeach
                </tbody>
                @else
                <p>No data to display</p>
                @endif
                </table>
            </div>
        </div>
    </div>
</section>  
@endsection
