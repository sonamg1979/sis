<style>
    .container .img{
        text-align:center;
    }
    .container .details{
        border-left:3px solid #ded4da;
    }
    .container .details p{
        font-size:15px;
        font-weight:bold;
    }
    p{
        text-transform: capitalize;
    }
</style>

@extends('layouts.master')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <center><h3> Activity Details</h3></center>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Project/Activites</a></li>
              <li class="breadcrumb-item active">Activity detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
               @foreach($activitys as $activity)
            <div class="row">
                <div class="col-md-6 img">
                    <h5>{{$activity->sector.' : '.$activity->subsector}}</h5>
                    <p><b>Activity: </b>{{$activity->activity}}</p>
                    <strong>Status: </strong>
                    @if (($activity->status) == 'C')
                        <span class="text-success">Completed</span>
                    @elseif (($activity->status)== 'O')
                        <span class="text-info">On Going</span>
                    @elseif (($activity->status)== 'A')
                        <span class="text-warning">At Risk</span>
                    @elseif (($activity->status)== 'I')
                        <span class="text-danger">Inompleted</span>
                    @elseif (($activity->status)== 'H')
                        <span class="text-default">On hold</span>
                    @else
                    <span class="text-default">No updates made by Site Engineer</span>
                    @endif
                    <hr>
                    <strong>Site Engineer: </strong>
                    {{$activity->employee_name}}
                    <br><br>
                    <a href="/dashboard/site_visit/{{$activity->id}}">Site visit information</a>
                </div>
                <div class="col-md-6 details">
                    <blockquote>
                        <p><small>Financial Year:</small> {{$activity->f_year}}</p>
                        <p><small>Funding:</small> {{$activity->budget}}</p>
                        <p><small>Budget Line:</small> {{$activity->budget_line}}</p>
                        <p><small>Alloted Budget:</small> {{$activity->allotted_budget}} (in millions)</p>
                    </blockquote>
                    <small>Start Date</small>
                    <p>{{$activity->sdate}}</p>
                    <small>End Date</small>
                    <p>{{$activity->edate}}</p>
                </div>
            </div>
        @endforeach 
            </div>
        </div>
    </div>
</section>
    
    
        <hr>
        <center><a href="/dashboard" class="btn btn-primary">Home</a></center>
    
@endsection
