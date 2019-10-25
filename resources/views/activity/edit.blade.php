@extends('layouts.admin-app')
@section('content')
<style>
    .card {
    margin: 0 auto; /* Added */
    float: none; /* Added */
    margin-bottom: 10px; /* Added */
}
</style>
    <div class="card card-body" style="max-width: 40rem;">
        <h3>Edit Activity</h3>
        {!! Form::open(['action' => ['ActivityController@update',$activitys->id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                <label for="">Financial Year</label>
                <select id="fyear" name="fyear" class="form-control" required>
                    <option value=''>Financial Year</option>
                    @foreach($fyears as $fyear)
                        <option value="{{$fyear->year_id}}" {{($fyear->year_id == $activitys->f_year) ? 'selected' : '' }}>{{$fyear->year}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::label('activity','Activity')}}
                {{Form::textarea('activity',$activitys->activity,['class'=>'form-control', 'rows' => 2, 'cols' => 40, 'placeholder' =>'Name of Activity'])}}
            </div>
            <div class="form-group">
                {{Form::label('sdate','Start Date')}}<br/>
                {{Form::date('sdate', $activitys->sdate, ['class'=>'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('edate','End Date')}}<br/>
                {{Form::date('edate', $activitys->edate, ['class'=>'form-control'])}}
            </div>
            <div class="form-group">
                <label for="">Budget</label>
                <select id="budget" name="budget" class="form-control" required>
                    <option value=''>Funding</option>
                    @foreach($budgets as $budget)
                        <option value="{{$budget->budget_code}}" {{($budget->budget_code == $activitys->budget) ? 'selected' : '' }}>{{$budget->budget}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Budget Line</label>
                <select id="budget_line" name="budget_line" class="form-control" required>
                    <option value=''>Select Budget Line</option>
                    <option value='Current' {{($activitys->budget_line == 'Current') ? 'selected' : '' }}>Current</option>
                    <option value='Capital' {{($activitys->budget_line == 'Capital') ? 'selected' : '' }}>Capital</option>
                </select>
            </div>
            
            <div class="form-group">
                {{Form::label('abudget','Allotted Budget (in million)')}}
                {{Form::text('allotted_budget',$activitys->allotted_budget,['class'=>'form-control','placeholder'=>'Budget Allotted'])}}
            </div>
            <div class="form-group">
                <label for="">Site Engineer</label>
                <select id="engineer" name="engineer" class="form-control" required>
                    <option value=''>Funding</option>
                    @foreach($engineer as $data)
                        <option value="{{$data->employee_id}}" {{($data->employee_id == $activitys->site_engineer) ? 'selected' : '' }}>{{$data->employee_name}}</option>
                    @endforeach
                </select>
            </div>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Save',['class'=>'btn btn-primary'])}}
    </div>
        
    {!! Form::close() !!}
@endsection
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $("#fyear").on('change',function(e){
            console.log(e);
            var fyear = e.target.value;
            $.get('/json-fyear?fyear=' + fyear, function(data){
                console.log(data);
                $('#budget').empty();
                $('#budget').append('<option value="">Budget Head</option>');
                $.each(data, function(index, subsectorObj){
                    $('#budget').append('<option value="'+ subsectorObj.budget_code +'">'+ subsectorObj.budget + '</option>');
                })
            });

        });
    });
</script>