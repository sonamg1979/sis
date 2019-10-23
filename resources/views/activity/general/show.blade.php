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

@extends('layouts.app')
@section('content')
    <center><h3> Activity Details</h3></center><hr>
    <div class="container">
        @foreach($activitys as $activity)
            <div class="row">
                <div class="col-md-6 img">
                    <p>{{$activity->sector.' : '.$activity->subsector}}</p><hr>
                    <p><b>Activity: </b>{{$activity->activity}}</p>
                    <small>Status</small>
                    <p class="text-danger">Not Completed</p>
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
        <hr>
        <center><a href="/dashboard" class="btn btn-primary">Home</a></center>
    
@endsection
