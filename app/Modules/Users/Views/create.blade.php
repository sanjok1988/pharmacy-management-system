@include('admin.layouts.locale')
@extends('admin.layouts.app')
@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="paypasa-heading">
                <h4>User Create</h4>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <form   method="post" class="" action="{{ route('storeUser') }}" enctype='multipart/form-data' >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

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
                                    <div>
                                         <button type="submit" class="btn btn-primary waves-effect waves-light float-right">Create</button>
                                    </div>
                                </div>
                        </div>
                       
                    </div>
                </div>

                <!-- end col -->

            </div>
            <!-- end container -->
        </div>
    </div>
@endsection
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $(".content").fadeOut(1500);
        },3000);
    });
</script>