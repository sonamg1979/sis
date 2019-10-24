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
    <div class="container">
        @foreach($infras as $data)
        <center><h3>{{$data->sitename}}</h3></center>
        <hr>
            <div class="row">
                <div class="col-md-6 img">
                    <img src="/storage/c_image/{{$data->photo}}" alt="Site Photo" class="img-circle" style="width:500px;height:300px; border:1px;"/>
                </div>
                <div class="col-md-6 details">
                    
                    <p>{{$data->description}}</p>
                </div>
            </div>
        @endforeach
        </div>
        <hr>
        <center><a href="/culture" class="btn btn-primary">Back</a></center>
    
@endsection
