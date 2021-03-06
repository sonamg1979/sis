@extends('layouts.master')
@section('content')
    <center><h3> Employee Details</h3></center><hr>
    <div class="container">
        @foreach($profiles as $profile)
            <div class="row">
                <div class="col-md-6 img">
                        
                    <img src="/storage/images/{{$profile->photo}}" alt="Employee Photo" class="ratio img-responsive img-circle" style="width:350px;height:300px; border:1px;"/>
                </div>
                <div class="col-md-6 details">
                    <blockquote>
                        <h5>{{$profile->employee_name}}</h5>
                        <h5><strong>{{$profile->designation}}</strong></h5>
                        <small><cite title="Source Title">{{$profile->sector .', '.$profile->subsector}} <i class="icon-map-marker"></i></cite></small>
                    </blockquote>
                    <small>Employee ID</small>
                    <h5>{{$profile->employee_id}}</h5>
                    <small>Date of Birth</small>
                    <h5>{{$profile->dob}}</h5>
                    <small>CID Number</small>
                    <h5>{{$profile->cid_number}}</h5>
                    <small>Qualification</small>
                    <h5>{{$profile->qualification}}</h5>
                </div>
            </div>
        @endforeach
        </div>
        <hr>
        <center><a href="/dashboard" class="btn btn-primary">Home</a></center>
    
    
@endsection
