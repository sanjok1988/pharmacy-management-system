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
   
   <h3 class="box-title">Products Create</h3>
 
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
                    <input type="text" class="form-control" name="product_name" placeholder="Product Name" value="{{ ($is_editing)?$data->product_name:'' }}" >
                    </div>
                    <div class="form-group">
                    <label for="">Company</label>
                    <input type="text" class="form-control" name="company" placeholder="Company" value="{{ ($is_editing)?$data->company:'' }}">
                    </div>
                    <div class="form-group">
                    <label for="">Manufacutured Date</label>
                    <input type="text" class="form-control" name="mfd" placeholder="Manufacutured Date" value="{{ ($is_editing)?$data->mfd:'' }}">
                    </div>
                    <div class="form-group">
                            <label for=""> Expiration Date</label>
                            <input type="text" class="form-control" name="exp_date" placeholder=" Expiration Date" value="{{ ($is_editing)?$data->exp_date:'' }}">
                        </div>
                    <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" class="form-control" name="details" placeholder="Description" value="{{ ($is_editing)?$data->details:'' }}">
                    </div>
            </div>
            <div class="col-md-6">
               
                    <div class="form-group">
                        <label for="">Product Category</label>
                        
                        @foreach($categories as $data)
                    <input type="checkbox" class="form-control" name="category_id" value="{{ ($is_editing)?$data->id:$data->id }}" >{{$data->category_name}}<br>
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