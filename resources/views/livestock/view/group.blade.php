@extends('layouts.master')
@section('script')
    <script>
      $(function () {
        $('#table11').DataTable({
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
            <h1>Farmers' Group/Cooperatives</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Livestocks</a></li>
              <li class="breadcrumb-item active">Farmers' Group/Cooperatives</li>
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
                <table id="table11" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Estd. Year</th>
                            <th>Gewog</th>
                            <th>Name of Farmers' Group/Cooperatives</th>
                            <th>Registration Number</th>
                            <th>Male</th>
                            <th>Female</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $row)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$row->year}}</td>
                            <td>{{$row->subsector}}</td>
                            <td>{{$row->group_name}}</td>
                            <td>{{$row->registration_number}}</td>
                            <td>{{$row->male}}</td>
                            <td>{{$row->female}}</td>
                            <td>{{$row->male+$row->female}}</td>
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
   
    
