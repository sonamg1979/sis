@extends('layouts.app')
@section('content')
<div class="container-fluid">
        <div class="card mb-5">
                <div class="card-header bg-info">Employee Details</div>
                <div class="card-block p-0">
                    <table class="table table-sm">
                        <thead class="">
                            <tr>
                                <th>Sl</th>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Designation</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody> 
                        @foreach ($profiles as $row)
                          
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$row->employee_id}}</td>
                                <td>{{$row->employee_name}}</td>
                                <td>{{$row->designation}}</td>
                                <td><a href="/dashboard/employee_show/{{$row->id}}">Details</td>
                                <td><a href="/dashboard/employee_history/{{$row->employee_id}}">History</td>

                            </tr> 
                        
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center"><a href="/dashboard/employee_all">View All</a></div>
                    <div class="row">
                        <div class="col-12 text-center">
                            {{$profiles->links()}}
                        </div>
            
                    </div>
                </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary"><strong>Demographic Information</strong></div>
                @php
                    $mtot=0;
                    $ftot=0;
                    $tot1=0;
                    $tot=0;
                @endphp
                <div class="card-body">
                    @foreach ($populations as $popu)
                    @php
                        $mtot=$mtot+$popu->mtot;
                        $ftot=$ftot+$popu->ftot;
                        $tot1=$popu->mtot+$popu->ftot;
                        $tot=$tot+$tot1;
                    @endphp
                    @endforeach
                    <table class="table table-stripped">
                        <tr>
                            <th>Male<th>
                            <th>Female<th>
                            <th>Total<th>
                        </tr>
                        <tr>
                            <td>{{$mtot}}<td>
                            <td>{{$ftot}}<td>
                            <td>{{$tot}}<td>
                        </tr>
                    </table>
                    <div>
                        <a href="/dashboard/populationage">Population by Age-group</a><br>
                        <a href="/dashboard/populationplace">Population by Age-group and Place</a>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header bg-danger"><strong>Heath</strong></div>
                @php
                    $ambulance = 0;
                    $doctor = 0;
                    $dungtsho = 0;
                    $clinicofficer = 0;
                    $asstclinicofficer = 0;
                    $ha = 0;
                    $bhw = 0;
                    $physiotherapists = 0;
                    $nurses = 0;
                    $sowamenpa = 0;
                    $pharmacists = 0;
                    $technicians = 0;
                    $labtechonologist = 0;
                    $vhw = 0;
                    $supportstaff = 0;
                @endphp
                <div class="card-body">
                    @foreach ($healths as $health)
                    @php
                        $ambulance = $ambulance+$health->ambulance;
                        $doctor = $doctor+$health->doctor;
                        $dungtsho = $dungtsho+$health->dungtsho;
                        $clinicofficer = $clinicofficer+$health->clinicofficer;
                        $asstclinicofficer = $asstclinicofficer+$health->asstclinicofficer;
                        $ha = $ha+$health->ha;
                        $bhw = $bhw+$health->bhw;
                        $physiotherapists = $physiotherapists+$health->physiotherapists;
                        $nurses = $nurses+$health->nurses;
                        $sowamenpa = $sowamenpa+$health->sowamenpa;
                        $pharmacists = $pharmacists+$health->pharmacists;
                        $technicians = $technicians+$health->technicians;
                        $labtechonologist = $labtechonologist+$health->labtechonologist;
                        $vhw = $vhw+$health->vhw;
                        $supportstaff = $supportstaff+$health->supportstaff;
                    @endphp
                    @endforeach
                    <table class="table-sm table-stripped">
                        <tr>
                            <th>Ambulance</th>
                            <td>{{$ambulance}}</td>
                        </tr>
                        <tr>
                            <th>Doctor</th>
                            <td>{{$doctor}}</td>
                        </tr>
                        <tr>
                            <th>Dungtsho</th>
                            <td>{{$dungtsho}}</td>
                        </tr>
                        <tr>
                            <th>Clinic Officer</th>
                            <td>{{$clinicofficer}}</td>
                        </tr>
                        <tr>
                            <th>Asst. Clinic Officer</th>
                            <td>{{$asstclinicofficer}}</td>
                        </tr>
                        <tr>
                            <th>HA</th>
                            <td>{{$ha}}</td>
                        </tr>
                        <tr>
                            <th>BHW</th>
                            <td>{{$bhw}}</td>
                        </tr>
                        <tr>
                            <th>Physiotherapists</th>
                            <td>{{$physiotherapists}}</td>
                        </tr>
                        <tr>
                            <th>Nurses</th>
                            <td>{{$nurses}}</td>
                        </tr>
                        <tr>
                            <th>Sowa Menpa</th>
                            <td>{{$sowamenpa}}</td>
                        </tr>
                        <tr>
                            <th>Pharmacists</th>
                            <td>{{$pharmacists}}</td>
                        </tr>
                        <tr>
                            <th>Technicians</th>
                            <td>{{$technicians}}</td>
                        </tr>
                        <tr>
                            <th>Lab. Techonologist</th>
                            <td>{{$labtechonologist}}</td>
                        </tr>
                        <tr>
                            <th>Village Heath Worker</th>
                            <td>{{$vhw}}</td>
                        </tr>
                        <tr>
                            <th>Support Staff</th>
                            <td>{{$supportstaff}}</td>
                        </tr>
                    </table>
                    <div>
                        <a href="/dashboard/healthinfo">Health Information by Organization</a><br>
                        <a href="/dashboard/morbidity">Over-all Morbidity Information</a><br>
                        <a href="/dashboard/morbidityby">Health Morbidity by Organization</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-success"><strong>Education</strong></div>

                <div class="card-body">
                    @php
                        $smtot=0;
                        $sftot=0;
                        $stot1=0;
                        $stot=0;
                        $tmtot=0;
                        $tftot=0;
                        $ttot1=0;
                        $ttot=0;
                        $cmtot=0;
                        $cftot=0;
                        $ctot1=0;
                        $ctot=0;
                        $ssmtot=0;
                        $ssftot=0;
                        $sstot1=0;
                        $sstot=0;
                    @endphp
                    <div class="card-body">
                        @foreach ($students as $std)
                        @php
                            $smtot=$smtot+$std->male;
                            $sftot=$sftot+$std->female;
                            $stot1=$std->male+$std->female;
                            $stot=$stot+$stot1;
                        @endphp
                        @endforeach
                        @foreach ($teachers as $tech)
                        @php
                            $ssmtot=$ssmtot+$tech->smale;
                            $ssftot=$ssftot+$tech->sfemale;
                            $sstot1=$tech->smale+$tech->sfemale;
                            $sstot=$sstot+$sstot1;

                            $cmtot=$cmtot+$tech->cmale;
                            $cftot=$cftot+$tech->cfemale;
                            $ctot1=$tech->cmale+$tech->cfemale;
                            $ctot=$ctot+$ctot1;

                            $tmtot=$tmtot+$tech->tmale;
                            $tftot=$tftot+$tech->tfemale;
                            $ttot1=$tech->tmale+$tech->tfemale;
                            $ttot=$ttot+$ttot1;
                        @endphp
                        @endforeach
                        Student Information
                        <table class="table table-stripped">
                            <tr>
                                <th>Male<th>
                                <th>Female<th>
                                <th>Total<th>
                            </tr>
                            <tr>
                                <td>{{$smtot}}<td>
                                <td>{{$sftot}}<td>
                                <td>{{$stot}}<td>
                            </tr>
                        </table>
                        Teacher Information
                        <table class="table table-stripped">
                            <tr>
                                <th>Category.</th>
                                <th>M<th>
                                <th>F<th>
                                <th>T<th>
                            </tr>
                            <tr>
                                <td>Teacher</td>
                                <td>{{$tmtot}}<td>
                                <td>{{$tftot}}<td>
                                <td>{{$ttot}}<td>
                            </tr>
                            <tr>
                                <td>Contract</td>
                                <td>{{$cmtot}}<td>
                                <td>{{$cftot}}<td>
                                <td>{{$ctot}}<td>
                            </tr>
                            <tr>
                                <td>Support Staff</td>
                                <td>{{$ssmtot}}<td>
                                <td>{{$ssftot}}<td>
                                <td>{{$sstot}}<td>
                            </tr>
                        </table>
                        <div>
                            <a href="/dashboard/studentinfo">Student by Age-group and Class</a><br>
                            <a href="/dashboard/studentschool">Student by Age-group, School and Class</a><br>
                            <a href="/dashboard/schoolstaff">Teacher & Staff by Category and School</a>
                            <a href="/dashboard/schoollist">School details</a>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header bg-default">
                    RNR Sector
                </div>
                <div class="card-body">
                    <div class="carousel vert slide" data-ride="carousel" data-interval="2000">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <ol>
                                    <li><a href="/dashboard/livestock">Overall Livestock Information</a></li>
                                    <li><a href="/dashboard/livestockgewog">Livestock Information by Gewog</a></li>
                                    <li><a href="/dashboard/livestockproduct">Livestock Production</a></li>
                                    <li><a href="/dashboard/livestockproductgewog">Livestock Production by Gewog</a></li>
                                    <li><a href="/dashboard/agriculture">Agriculture Infrastructures</a></li>
                                    <li><a href="/dashboard/agriculturegewog">Agriculture Infrastructures by Gewog</a></li>
                                    <li><a href="/dashboard/agricultureproduct">Agriculture Product Information</a></li>
                                    <li><a href="/dashboard/agricultureproductgewog">Agriculture Product by Gewog</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                        <div class="card-header bg-warning">
                            Major Activities
                        </div>
                        <div class="card-body">
                          <div class="carousel vert slide" data-ride="carousel" data-interval="2000">
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <ul class="timeline">
                                    @foreach ($activity as $data)
                                        <li>
                                            <!--"_blank" tıklanan linkin yeni sekmede açılmasını sağlar.-->
                                            <a href="/dashboard/activity_show/{{$data->id}}">{{$data->sector}}</a>
                                            <span class="float-right">{{$data->edate}}</span>
                                            <p class="article">{{$data->activity}}</p>
                                        </li>
                                    @endforeach
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            {{$activity->links()}}
                                        </div>
                            
                                    </div>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
    </div>
</div>
@endsection
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>