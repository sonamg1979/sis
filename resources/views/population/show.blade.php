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
    h5{
        text-transform: capitalize;
    }
</style>

@extends('layouts.admin-app')
@section('content')
    <center><h3> School Staff Details</h3></center><hr>
    <div class="container">
        @foreach($staffs as $staff)
            <div class="row">
                <div class="col-md-6 img">
                    <img src="/storage/images/{{$staff->photo}}" alt="Employee Photo" class="img-circle" style="width:350px;height:300px; border:1px;"/>
                </div>
                <div class="col-md-6 details">
                    <blockquote>
                        <h5>{{$staff->employee_name}}</h5>
                        <h5><strong>{{$staff->designation}}</strong></h5>
                        <small><cite title="Source Title">{{$staff->sector .', '.$staff->subsector}} <i class="icon-map-marker"></i></cite></small>
                    </blockquote>
                    <small>Employee ID</small>
                    <h5>{{$staff->employee_id}}</h5>
                    <small>Date of Birth</small>
                    <h5>{{$staff->dob}}</h5>
                    <small>CID Number</small>
                    <h5>{{$staff->cid_number}}</h5>
                    <small>Qualification</small>
                    <h5>{{$staff->qualification}}</h5>
                </div>
            </div>
        @endforeach
        </div>
        <hr>
        <center><a href="/staff" class="btn btn-primary">Back</a></center>
    
@endsection
