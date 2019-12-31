@extends('layouts.master')
@section('script')
    <script>
      $(function () {
        $('#table10').DataTable({
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
            <h1>Land Development Plan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Agriculture</a></li>
              <li class="breadcrumb-item active">land development</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if(count($datas)>0)
                <table id="table10" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Sl</th>
                        <th>Year</th>
                        <th>Gewog</th>
                        <th>Location</th>
                        <th>Dry (in acres)</th>
                        <th>Wet (in acres)</th>
                        <th>Total Land (in acres)</th>
                    </tr>  
                    </thead>
                    <tbody>
                        @foreach ($datas as $row)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$row->year}}</td>
                            <td>{{$row->subsector}}</td>
                            <td>{{$row->location}}</td>
                            <td>{{$row->dry}}</td>
                            <td>{{$row->wet}}</td>
                            <td>{{$row->dry+$row->wet}}</td>
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
    
        