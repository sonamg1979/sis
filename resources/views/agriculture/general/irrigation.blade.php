@extends('layouts.master')
@section('script')
    <script>
      $(function () {
        $('#table7').DataTable({
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
            <h1>Irrigation channel details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Agriculture</a></li>
              <li class="breadcrumb-item active">irrigation</li>
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
                 <table id="table7" class="table table-bordered table-hover table-responsive">
                     <thead>
                         <tr>
                            <th>Sl</th>
                            <th>Construct Year</th>
                            <th>Gewog</th>
                            <th>Location</th>
                            <th>Length (KM)</th>
                            <th>Benefeciaries (HH)</th>
                            <th>Command area (Ac)</th>
                            <th>Construction Mode</th>
                            <th>Construction Type</th>
                            <th>Chennel Type</th>
                            <th>Association</th>
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
                            <td>{{$row->location}}</td>
                            <td>{{$row->length}}</td>
                            <td>{{$row->benefeciaries}}</td>
                            <td>{{$row->area}}</td>
                            <td>{{$row->construct_mode}}</td>
                            <td>{{$row->construct_type}}</td>
                            <td>{{$row->chennel_type}}</td>
                            <td>{{$row->associations == 'Y' ? 'Yes' : 'No' }}</td>
                            <td>{{$row->male}}</td>
                            <td>{{$row->female}}</td>
                            <td>{{$row->status == 'F' ? 'Functional' : 'Non-functional' }}</td>
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
    
   
