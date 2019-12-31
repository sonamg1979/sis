@extends('layouts.master')
@section('script')
    <script>
      $(function () {
        $('#table8').DataTable({
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
            <h1>Farm road details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Agriculture</a></li>
              <li class="breadcrumb-item active">farm road</li>
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
               <table id="table8" class="table table-bordered table-hover table-responsive">
                   <thead>
                       <tr>
                            <th>Sl</th>
                            <th>Year</th>
                            <th>Gewog</th>
                            <th>Road Name</th>
                            <th>Chiwog</th>
                            <th>Existing length (KM)</th>
                            <th>Benefeciaries (HH)</th>
                            <th>Construction Mode</th>
                            <th>Construction Type</th>
                            <th>Road user group</th>
                            <th>Male</th>
                            <th>Female</th>
                            <th>Status</th>
                        </tr>
                   </thead>
                   <tbody>
                        @foreach ($datas as $row)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$row->year}}</td>
                            <td>{{$row->subsector}}</td>
                            <td>{{$row->road_name}}</td>
                            <td>{{$row->chiwog}}</td>
                            <td>{{$row->length}}</td>
                            <td>{{$row->benefeciaries}}</td>
                            <td>{{$row->construct_mode}}</td>
                            <td>{{$row->construct_type}}</td>
                            <td>{{$row->group == 'Y' ? 'Yes' : 'No' }}</td>
                            <td>{{$row->male}}</td>
                            <td>{{$row->female}}</td>
                            <td>{{$row->status == 'C' ? 'Completed' : 'Incomplete'}}</td>
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

    
        