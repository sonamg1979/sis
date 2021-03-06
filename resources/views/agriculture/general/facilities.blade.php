@extends('layouts.master')
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
            <h1>Agriculture Land Holdings and Facilities</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Agriculture</a></li>
              <li class="breadcrumb-item active">facilities</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if(count($activitys)>0)
                <table id="table6" class="table table-bordered table-hover">
                     @foreach ($activitys as $row)
                    <tr>
                        <th>Land Holding</th>
                        <th>Total Land (in acres)</th>
                        <th>Cultivated Land (in acres)</th>
                        <th>Felow Land (in acres)</th>
                    </tr>
                    <tr>
                        <td>Wet Land</td>
                        <td>{{$row->wet}}</td>
                        <td>{{$row->c_wet}}</td>
                        <td>{{$row->wet - $row->c_wet}}</td>
                    </tr> 
                    <tr>
                        <td>Dry Land</td>
                        <td>{{$row->dry}}</td>
                        <td>{{$row->c_dry}}</td>
                        <td>{{$row->dry - $row->c_dry}}</td>
                    </tr>
                    <tr>
                        <td>Orchard</td>
                        <td>{{$row->orchard}}</td>
                        <td>{{$row->c_orchard}}</td>
                        <td>{{$row->orchard - $row->c_orchard}}</td>
                    </tr>
                    <tr>
                        <th>Details</th>
                        <th colspan="3">Number</th>
                    </tr>
                    <tr>
                        <th>Number of food processing units</th>
                        <th colspan="3">{{$row->food_processing}}</th>
                    </tr>
                    <tr>
                        <th>Number of agriculture mills  Rice & flour</th>
                        <th colspan="3">{{$row->mills}}</th>
                    </tr>
                    <tr>
                        <th>Traditional mills</th>
                        <th colspan="3">{{$row->tradition_mills}}</th>
                    </tr>
                    <tr>
                        <th>Oil Expeller</th>
                        <th colspan="3">{{$row->oil_expeller}}</th>
                    </tr>
                    <tr>
                        <th>Corn flake</th>
                        <th colspan="3">{{$row->corn_flake}}</th>
                    </tr>
                    <tr>
                        <th>Electric dryer</th>
                        <th colspan="3">{{$row->electric_dryer}}</th>
                    </tr>
                    <tr>
                        <th>Potato deep fryer</th>
                        <th colspan="3">{{$row->potatoe_fryer}}</th>
                    </tr>
                    <tr>
                        <th>Number of power tiller</th>
                        <th colspan="3">{{$row->power_tiller}}</th>
                    </tr>
                    <tr>
                        <th>Number of Tractor</th>
                        <th colspan="3">{{$row->tractor}}</th>
                    </tr>
                    <tr>
                        <th>Number of Transplanter</th>
                        <th colspan="3">{{$row->transplanter}}</th>
                    </tr>
                    <tr>
                        <th>Number of grass-cutter</th>
                        <th colspan="3">{{$row->grass_cutter}}</th>
                    </tr>
                    <tr>
                        <th>Number of green house</th>
                        <th colspan="3">{{$row->green_house}}</th>
                    </tr>
                    @endforeach
                </table>
                @else
                <p>No data to display</p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
    
    