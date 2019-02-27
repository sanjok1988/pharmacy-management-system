
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
        @if(isset($page))
        <h3 class="box-title">Users List</h3>
        @endif
        <a class="btn btn-success btn-sm pull-right" title="Create New" href="{{ route('user.index')}}" ><i class="fa fa-list"></i> list</a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
                            <form   method="post" class="" action="{{ route('user.store') }}" enctype='multipart/form-data' >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                @if($is_editing)
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                @endif

                                <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}"/>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
			                             <strong>{{ $errors->first('name') }}</strong>
		                                  </span>
                                    @endif
                                </div>
                                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label>
                                        Email
                                    </label>
                                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}"/>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
		                        	<strong>{{ $errors->first('email') }}</strong>
		                               </span>
                                    @endif
                                </div>
                                <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password"/>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
		                          	<strong>{{ $errors->first('password') }}</strong>
		                           </span>
                                    @endif
                                </div>
                                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label> Re Password</label>
                                    <input type="password" class="form-control" placeholder="Password Confirmation" name="password_confirmation"/>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
			                        <strong>{{ $errors->first('password_confirmation') }}</strong>
		                          </span>
                                    @endif
                                </div>

                                <div class="form-group m-b-50">
                                        <div class="box-footer pull-right">
                                                <button type="submit" class="btn btn-primary">{{ ($is_editing)?"Update":"Add New" }}</button>
                                             </div>
                                </div>
                        </div>
                       
                    </div>
                
    </div>
@endsection
