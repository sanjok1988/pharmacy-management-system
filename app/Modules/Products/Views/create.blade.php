@extends('layouts.master')
@section('content')
<?php

$is_editing = false;
if(isset($action) && $action == 'edit')
{
    $is_editing = true;
}
?>
<div class="box-header">
   
   <h3 class="box-title">Products {{ ($is_editing)?"Edit":"Create" }}</h3>
 
   <a class="btn btn-success btn-sm pull-right" title="List" href="{{ route('product.index')}}" ><i class="fa fa-list"></i> List</a>
</div>
<!-- /.box-header -->
<div class="box-body">
   <!-- form start -->
   <form role="form" method="POST" action="{{ route('product.store')}}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      @if($is_editing)
      <input type="hidden" name="id" value="{{ $data->id }}">
      @endif
      <div class="box-body">
       
            <div class="col-md-6">
                    <div class="form-group">
                            <label for="">Product Name</label>
                    <input type="text" class="form-control" name="product_name" placeholder="Product Name" value="{{ ($is_editing)?$data->product_name:old('product_name') }}" >
                    <small class="text-danger">{{ $errors->first('product_name') }}</small>    
                </div>
                    <div class="form-group">
                        <label for="">Product Price</label>
                    <input type="text" class="form-control" name="price" placeholder="Product Price" value="{{ ($is_editing)?$data->price:'' }}" >
                    <small class="text-danger">{{ $errors->first('price') }}</small>    
                </div>
                    <div class="form-group">
                    <label for="">Company</label>
                    <input type="text" class="form-control" name="company" placeholder="Company" value="{{ ($is_editing)?$data->company:'' }}">
                    <small class="text-danger">{{ $errors->first('company') }}</small>    
                </div>
                    <div class="form-group">
                    <label for="">Manufacutured Date</label>
                    <input type="text" id="datepicker" class="form-control " name="mfd" placeholder="Manufacutured Date" value="{{ ($is_editing)?$data->mfd:'' }}">
                    <small class="text-danger">{{ $errors->first('mfd') }}</small>    
                </div>
                    <div class="form-group">
                            <label for=""> Expiration Date</label>
                            <input type="text" id="datepicker1" class="form-control " name="exp_date" placeholder=" Expiration Date" value="{{ ($is_editing)?$data->exp_date:'' }}">
                            <small class="text-danger">{{ $errors->first('exp_date') }}</small>
                        </div>
                    <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" class="form-control" name="details" placeholder="Description" value="{{ ($is_editing)?$data->details:'' }}">
                    <small class="text-danger">{{ $errors->first('details') }}</small>
                    </div>
                    
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Product Status</label>
                    <hr>
                   
                    <input type="radio" name="status" value="available" {{ ($is_editing && $data->status == 'available')?'checked':'' }} >Available<br>
                    <input type="radio" name="status" value="unavailable"  {{ ($is_editing && $data->status == 'uavailable')?'checked':'' }}>Unavailable<br>                 
                   
                </div>
                <hr>
                    <div class="form-group">
                        <label for="">Product Category</label>
                        <hr>
                        @foreach($categories as $cat)
                        <input type="radio" name="category_id" value="{{ $cat->id }}" {{ ($is_editing && $data->category_id == $cat->id)?'checked':'' }}>{{$cat->category_name}}<br>
                        @endforeach  
                       
                </div>
                
            </div>

         <!-- /.box-body -->
         <div class="box-footer pull-right">
            <button type="submit" class="btn btn-primary">{{ ($is_editing)?"Update":"Add New" }}</button>
         </div>
   </form>
   </div>
</div>
@endsection
@section('script')
<script src="/js/moment.min.js"></script>
<script src="/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    $(function() {
      $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yyyy-mm-dd'
      });
      $( "#datepicker1" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yyyy-mm-dd'
      });
    });
    </script>
@endsection
@section('style')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
@endsection