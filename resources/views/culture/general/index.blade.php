@extends('layouts.master')
@section('script')
    <script>
      $(function () {
        $('#table15').DataTable({
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
            <h1>Cultural & Heritage Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Culture and Heritage sites</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if(count($infras)>0)
                <table id="table15" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Cultural Heritage</th>
                            <th>Established Year</th>
                            <th>Location</th>
                            <th>Type of Heritage</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($infras as $row)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$row->sitename}}</td>
                            <td>{{$row->estdyear}}</td>
                            <td>{{$row->location}}</td>
                            <td>{{$row->heritage_type}}</td>
                            <td><a href="/dashboard/culture_show/{{$row->id}}" class="btn btn-sm btn-success">Details</td>
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
    
        
