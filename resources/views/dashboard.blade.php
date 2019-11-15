@extends('layouts.app')
@section('content')

<div class="container-fluid">
        <div class="card mb-5">
                <div class="card-header bg-alert"><h4>Employee Details</h4></div>
                <div class="card-block p-1">
                    <div class="table-responsive">
                    <table class="table table-sm" id="employee">
                        <thead class="">
                            <tr>
                                <th>Sl</th>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Designation</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody> 
                        @foreach ($profiles as $row)
                          
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$row->employee_id}}</td>
                                <td>{{$row->employee_name}}</td>
                                <td>{{$row->designation}}</td>
                                <td><a href="/dashboard/employee_show/{{$row->id}}">Details</td>
                                <td><a href="/dashboard/employee_history/{{$row->employee_id}}">History</td>

                            </tr> 
                        
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center"><a href="/dashboard/employee_all">View All</a></div>
                    <div class="row">
                    </div>
                        
            
                    </div>
                </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-warning">
                    <h3>Activities</h3>
                </div>
                <div class="card-body">
                    <div class="carousel vert slide" data-ride="carousel" data-interval="2000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <ul class="timeline">
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
        <div class="col-md-7">
            <div class="card">
                <div class="card-header bg-success"><h3>Important Events</h3></div>
                        <div class="container">
                            <div class="agenda">
                                <div class="table-responsive">
                                    <br>
                                    <table class="table table-sm table-stripped">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Event</th>
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