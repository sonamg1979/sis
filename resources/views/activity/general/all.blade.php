@extends('layouts.master')
@section('script')
    <script>
      $(function () {
        $('#table12').DataTable({
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
            <h1>Major Activities</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="#">Home</a></li>
              <li class="breadcrumb-item "><a href="#">Project/Activity</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if(count($activitys)>0)
                <table id="table12" class="table table-hovered table-hover">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Agency</th>
                            <th>Activities</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Type</th>
                            <th>Total Budget (in million)</th>
                            <th>Status</th>
                            <th>Site Engineer</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activitys as $row)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$row->subsector}}</td>
                                <td>{{$row->activity}}</td>
                                <td>{{$row->sdate}}</td>
                                <td>{{$row->edate}}</td>
                                <td>{{$row->budget_line}}</td>
                                <td>{{$row->allotted_budget}}</td>
                                <td>{{$row->status}}</td>
                                <td>{{$row->employee_name}}</td>
                                <td><a href="/dashboard/activity_show/{{$row->id}}">View</td>
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
    
        