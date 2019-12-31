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
<style>
    td {
        height: 5px;
    }
</style>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agriculture Production Information. Year : {{session('sess_Year')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Agriculture</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if(count($agriculture)>0)
                <table id="table10" class="table table-bordered table-hover">
                    <thead>
                       <tr>
                            <th>Sl</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Area/Number</th>
                            <th>Total</th>
                        </tr> 
                    </thead>
                    <tbody>
                        @foreach ($agriculture as $row)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$row->category}}</td>
                            <td>{{$row->product}}</td>
                            <td>{{$row->area}}</td>
                            <td>{{$row->productions}}</td>
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
    
        