@include('admin.layouts.locale')
@extends('admin.layouts.app')
@section('content')

    <div class="wrapper">
        <div class="container-fluid">
            <div class="paypasa-heading">
                <h4>Edit  User</h4>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <form  method="post" class="" action="{{ route('updateUser',['id'=>$user->id]) }}" enctype='multipart/form-data' >


                                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label>Name</label>
                                 
                                        <input type="text" name="name" value="{{$user->name}}" class="form-control " />
                                        @if ($errors->has('name'))
                                            <span class="help-block">{{ $errors->first('name') }}</span>
                                        @endif
                               
                                </div>

                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label>Email</label>
                                    
                                        <input type="email" name="email" value="{{$user->email}}" class="form-control " />
                                        @if ($errors->has('email'))
                                            <span class="help-block">{{ $errors->first('email') }}</span>
                                        @endif
                                
                                </div>


                                <div class="form-group {{ $errors->has('old_password') ? ' has-error' : '' }}">
                                    <label>Old Password</label>
                                   
                                        <input type="password" name="old_password" value="{{ old('old_password') }}"  class="form-control " />
                                        @if ($errors->has('old_password'))
                                            <span class="help-block">{{ $errors->first('old_password') }}</span>
                                        @endif
                              
                                </div>

                                <div class="form-group {{ $errors->has('new_password') ? ' has-error' : '' }}">
                                    <label>New Password</label>
                               
                                        <input type="password" name="new_password" value="{{ old('new_password') }}"  class="form-control " />
                                        @if ($errors->has('new_password'))
                                            <span class="help-block">{{ $errors->first('new_password') }}</span>
                                        @endif
                                   
                                </div>

                                <div class="form-group {{ $errors->has('re_password') ? ' has-error' : '' }}">
                                    <label>Re Password</label>
                                 
                                        <input type="password" name="re_password" value="{{ old('re_password') }}"  class="form-control " />
                                        @if ($errors->has('re_password'))
                                            <span class="help-block">{{ $errors->first('re_password') }}</span>
                                        @endif
                                
                                </div>
                                <div class="form-group m-b-50 ">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light float-right">Update</button>  
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