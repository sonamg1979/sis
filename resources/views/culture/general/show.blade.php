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

@extends('layouts.master')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             @foreach($infras as $data)
            <center><h3>{{$data->sitename}}</h3></center>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Culture & Heritage sites</a></li>
              <li class="breadcrumb-item active">Culture detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
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
        </div>
    </div>
</section>
    
        <hr>
        <center><a href="/dashboard" class="btn btn-primary">Back</a></center>
    
@endsection
