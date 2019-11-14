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
        <h3>Data Entry: Production details</h3><hr>
        {!! Form::open(['action' => 'AgriProductionController@store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
            <div class="form-product">
                <label for="">Year</label>
                <select id="year" name="year" class="form-control" required>
                    <option value=''>Year</option>
                    @for($yr=now()->year-3; $yr<=now()->year; $yr++)
                        <option value="{{$yr}}">{{$yr}}</option>
                    @endfor
                </select>
            </div>
            <div class="form-product">
                <label for="">Category</label>
                <select id="category" name="category" class="form-control" required>
                    <option value=''>Category</option>
                    @foreach($category as $row)
                        <option value="{{$row->id}}">{{$row->category}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-product">
                <label for="">Products</label>
                <select id="product" name="product" class="form-control" required>
                    <option value=''>Select Category</option>
                </select>
            </div>
            <center><strong>{{Form::label('staff','Producation details')}}</strong></center>
            <div class="form-row border" style="color:coral">
                <div class="form-product col-md-6">
                    {{Form::label('staff','Area/Number of Trees (per tree)')}}
                    {{Form::number('area',0,['class'=>'form-control','id'=>'area', 'placeholder' =>'Total Area/ No of trees'])}}
                </div>
                <div class="form-product col-md-6">
                    {{Form::label('staff','Productions (kg/acre)')}}
                    {{Form::number('production',0,['class'=>'form-control','id'=>'production', 'placeholder' =>'Total production'])}}
                </div>  
            </div> 
            
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
        //called when key is pressed in textbox
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