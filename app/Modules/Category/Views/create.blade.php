
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
   
   <h3 class="box-title">category Create</h3>
 
   <a class="btn btn-success btn-sm pull-right" title="List" href="{{ route('category.index')}}" ><i class="fa fa-list"></i> List</a>
</div>
<!-- /.box-header -->
<div class="box-body">
   <!-- form start -->
   <form role="form" method="POST" action="{{ route('category.store')}}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      @if($is_editing)
      <input type="hidden" name="id" value="{{ $data->id }}">
      @endif
      <div class="box-body">
                            <form  method="post" class="" action="{{ route('category.store') }}" enctype='multipart/form-data' >
                                @csrf
                                @if($is_editing)
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                @endif
                                <div class="form-group">
                                    <label for="name">Display Name</label>
                                    <input type="text" name="category_name" class="form-control" id="" placeholder="name" value="{{ ($is_editing)?$data->category_name:'' }}" required>
                                    <small class="text-danger">{{ $errors->first('category_name') }}</small>
                                </div>
                                <div class="form-group">
                                    <label for="display_name">Slug name</label>
                                    <input type="text" name="slug" class="form-control" id="" placeholder="Unique name" value="{{ ($is_editing)?$data->slug:'' }}" {{ ($is_editing)?"disabled":'' }}>
                                    <small class="text-danger">{{ $errors->first('slug') }}</small>
                                </div>
                                <div class="form-group">
                                    <label for="display_name">Description</label>
                                    <input type="text" name="details" class="form-control" id="" placeholder="Description" value="{{ ($is_editing)?$data->details:'' }}">
                                    <small class="text-danger">{{ $errors->first('details') }}</small>
                                </div>
                              
                                <div class="box-footer pull-right">
                                        <button type="submit" class="btn btn-primary">{{ ($is_editing)?"Update":"Add New" }}</button>
                                     </div>
                               </form>
                               </div>
                            </div>
@endsection