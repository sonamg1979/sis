@extends('layouts.master')
@section('script')
    <script>
      $(function () {
        $('#table9').DataTable({
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
<style>
    td {
        height: 5px;
    }
</style>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Electric/solar data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Agriculture</a></li>
              <li class="breadcrumb-item active">electric fencing</li>
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
                <table id="table9" class="table table-bordered table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Year</th>
                            <th>Gewog</th>
                            <th>Location</th>
                            <th>Length</th>
                            <th>Benefeciaries (HH)</th>
                            <th>Dry Land (in acres)</th>
                            <th>Wet Land (in acres)</th>
                            <th>Total Land (in acres)</th>
                            <th>Status</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $row)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$row->year}}</td>
                            <td>{{$row->subsector}}</td>
                            <td>{{$row->location}}</td>
                            <td>{{$row->length}}</td>
                            <td>{{$row->beneficiaries}}</td>
                            <td>{{$row->dry}}</td>
                            <td>{{$row->wet}}</td>
                            <td>{{$row->dry+$row->wet}}</td>
                            <td>{{$row->status}}</td>
                            <td>{{$row->type}}</td>
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
    
        