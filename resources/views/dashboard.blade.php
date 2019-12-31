@extends('layouts.master')
@section('script')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js "></script>
    <script>
      $(function () {
        $('#table16').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
        });
      });
    </script>
    <script type="text/javascript">
        var analytics = @json($array);

    google.charts.load('current', {'packages':['corechart']});

    google.charts.setOnLoadCallback(drawChart);

    function drawChart()
    {
      var data=google.visualization.arrayToDataTable(analytics);
      
      var options={

        title: 'ALL PROJECT STATUS IN PERCENTAGE',
          is3D: true,
      }; 
      var chart= new google.visualization.PieChart(document.getElementById('pieChart'));
      chart.draw(data, options);
    }

    </script>

@endsection
@section('content')
<section class="content-header">
<div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Activity Status</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
<section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-5">
        <div class="card">
            <div class="card-header bg-warning">
                <h3 class="card-title">Activities</h3>
            </div>
            <div class="card-body">
                <div class="carousel vert slide" data-ride="carousel" data-interval="2000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <ul class="">
                            @foreach ($acty as $data)
                                <li>
                                    <!--"_blank" tıklanan linkin yeni sekmede açılmasını sağlar.-->
                                    <a href="/dashboard/activity_show/{{$data->id}}">{{$data->subsector}}</a>
                                    <span class="float-right">{{$data->edate}}</span>
                                    <p class="article">{{$data->activity}}</p>
                                </li>
                            @endforeach
                            <div class="row">
                                <div class="col-12 text-center">
                                    {{$acty->links()}}
                                </div>
                    
                            </div>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-7">
        <div class="card">
            <div class="card-header bg-success">
                <h3 class="card-title">Important Events</h3>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="agenda">
                        <div class="table-responsive">
                            <table class="table table-sm table-stripped">
                                <thead>
                                    <tr>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Event Title</th>
                                        <th width="10%">Agency</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach ($events as $data)
                                    <tr>
                                        <td class="agenda-date" class="active" rowspan="1">
                                            <div class="dayofmonth">{{Carbon\Carbon::parse($data->sdate)->format('d')}}</div>
                                            <div class="dayofweek">{{Carbon\Carbon::parse($data->sdate)->format('l')}}</div>
                                            <div class="shortdate text-muted">{{Carbon\Carbon::parse($data->sdate)->format('F Y')}}</div>
                                        </td>
                                        <td class="agenda-date" class="active" rowspan="1">
                                            <div class="dayofmonth">{{Carbon\Carbon::parse($data->edate)->format('d')}}</div>
                                            <div class="dayofweek">{{Carbon\Carbon::parse($data->edate)->format('l')}}</div>
                                            <div class="shortdate text-muted">{{Carbon\Carbon::parse($data->edate)->format('F Y')}}</div>
                                        </td>
                                        <td class="agenda-events">
                                            <div class="agenda-event">
                                               {{$data->events}}
                                            </div>
                                        </td>
                                        <td>{{$data->subsector}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-12 text-center">
                                    {{$events->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>

<section class="content">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="card-title">Employee Details</h3>
            </div>
            <div class="card-body">
                <table id="table16" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                            <th>Designation</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($profiles as $row)
                          
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$row->employee_id}}</td>
                                <td>{{$row->employee_name}}</td>
                                <td>{{$row->designation}}</td>
                                <td><a href="/dashboard/employee_show/{{$row->id}}"><button type="button" class="btn btn-primary btn-sm">Details</button></a>
                                <a href="/dashboard/employee_history/{{$row->employee_id}}"><button type="button" class="btn btn-danger btn-sm">History</button></a>
                                </td>

                            </tr> 
                        
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center"><a href="/dashboard/employee_all">View All</a></div>
            </div>
        </div>
    </div>
</section>
</section>
@endsection
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>