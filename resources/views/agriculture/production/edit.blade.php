@extends('layouts.admin-app')
@section('content')
<style>
    .card {
    margin: 0 auto; /* Added */
    float: none; /* Added */
    margin-bottom: 10px; /* Added */
    #errmsg
{
color: red;
}
}
</style>
    <div class="card card-body" style="max-width: 40rem;">
        <h3>Edit: Student Information</h3><hr>
        {!! Form::open(['action' => ['AgriProductionController@update',$info->id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                <label for="">Year</label>
                <select id="year" name="year" class="form-control" required>
                    <option value=''>Year</option>
                    @for($yr=now()->year-3; $yr<=now()->year; $yr++)
                        <option value="{{$yr}}" {{($yr == $info->year) ? 'selected' : '' }}>{{$yr}}</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <select id="category" name="category" class="form-control" required>
                    <option value=''>Class</option>
                    @foreach($category as $row)
                        <option value="{{$row->id}}" {{($row->id == $info->category) ? 'selected' : '' }}>{{$row->category}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Products</label>
                <select id="product" name="product" class="form-control" required>
                    <option value=''>Select Category first</option>
                    @foreach($product as $row1)
                        <option value="{{$row1->id}}" {{($row1->id == $info->products) ? 'selected' : '' }}>{{$row1->product}}</option>
                    @endforeach
                </select>
            </div>
            <center><strong>{{Form::label('staff','Producation details')}}</strong></center>
            <div class="form-row border" style="color:coral">
                <div class="form-group col-md-6">
                    {{Form::label('staff','Area/Number of Trees')}}
                    {{Form::text('area',$info->area_number,['class'=>'form-control','id'=>'male'])}}
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('staff','Productions')}}
                    {{Form::text('production',$info->productions,['class'=>'form-control','id'=>'production'])}}
                </div>  
            </div> 
            {{Form::hidden('_method','PUT')}}
            <br>
            {{Form::submit('Save',['class'=>'btn btn-primary'])}}
    </div>
        
    {!! Form::close() !!}
@endsection
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#area").keypress(function (e) {
            var keyCode = (e.which) ? e.which : e.keyCode;
            if ((keyCode >= 48 && keyCode <= 57) || (keyCode == 8))
                return true;
            else if (keyCode == 46) {
                var curVal = document.activeElement.value;
                if (curVal != null && curVal.trim().indexOf('.') == -1)
                    return true;
                else
                    return false;
            }
            else
                return false;
        });
        $("#production").keypress(function (e) {
            var keyCode = (e.which) ? e.which : e.keyCode;
            if ((keyCode >= 48 && keyCode <= 57) || (keyCode == 8))
                return true;
            else if (keyCode == 46) {
                var curVal = document.activeElement.value;
                if (curVal != null && curVal.trim().indexOf('.') == -1)
                    return true;
                else
                    return false;
            }
            else
                return false;
        });
        $("#category").on('change',function(e){
            console.log(e);
            var id = e.target.value;
            $.get('/json-product?category=' + id, function(data){
                console.log(data);
                $('#product').empty();
                $('#product').append('<option value="">Select Products</option>');
                $.each(data, function(index, ageproductObj){
                    $('#product').append('<option value="'+ ageproductObj.id +'">'+ ageproductObj.product + '</option>');
                })
            });

        });
    })
     
</script>