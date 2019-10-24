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
        <h3>New Activity</h3>
        {!! Form::open(['action' => 'ActivityController@store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                <label for="">Financial Year</label>
                <select id="fyear" name="fyear" class="form-control" required>
                    <option value=''>Financial Year</option>
                    @foreach($fyears as $fyear)
                        <option value="{{$fyear->year_id}}">{{$fyear->year}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::label('activity','Activity')}}
                {{Form::textarea('activity',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40, 'placeholder' =>'Name of Activity'])}}
            </div>
            <div class="form-group">
                {{Form::label('sdate','Start Date')}}<br/>
                {{Form::date('sdate', date('Y-m-d'), ['class'=>'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('edate','End Date')}}<br/>
                {{Form::date('edate', date('Y-m-d'), ['class'=>'form-control'])}}
            </div>
            <div class="form-group">
                <label for="">Budget</label>
                <select id="budget" name="budget" class="form-control" required>
                    <option value=''>Funding</option>
                    @foreach($budgets as $budget)
                        <option value="{{$budget->budget_code}}">{{$budget->budget}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Budget Line</label>
                <select id="budget_line" name="budget_line" class="form-control" required>
                    <option value=''>Select Budget Line</option>
                    <option value='Current'>Current</option>
                    <option value='Capital'>Capital</option>
                </select>
            </div>
            
            <div class="form-group">
                {{Form::label('abudget','Allotted Budget (in million)')}}
                {{Form::text('allotted_budget','',['class'=>'form-control','placeholder'=>'Budget Allotted'])}}
            </div>
            <div class="form-group">
                <label for="">Site Engineer</label>
                <select id="engineer" name="engineer" class="form-control" required>
                    <option value=''>Site Engineer</option>
                    @foreach($engineer as $data)
                        <option value="{{$data->employee_id}}">{{$data->employee_name}}</option>
                    @endforeach
                </select>
            </div>
            {{Form::submit('Save',['class'=>'btn btn-primary'])}}
    </div>
        
    {!! Form::close() !!}
@endsection
