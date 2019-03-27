@extends('Frontend::master')
@section('content')
  <!--banner-->
  <div class="banner-top">
        <div class="container">
            <h3 >Register</h3>
            <h4><a href="index.html">Home</a><label>/</label>Register</h4>
            <div class="clearfix"> </div>
        </div>
    </div>
    
    <!--login-->
    
        <div class="login">
            <div class="main-agileits">
                    <div class="form-w3agile form1">
                        <h3>Register</h3>
                        <form role="form" method="POST" action="{{ route('customer.register.post')}}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="key">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <input  type="text" value="" name="username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" placeholder="Username" required="">
                                <div class="clearfix"></div>
                            </div>
                            <div class="key">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <input  type="text" value="" name="fullname" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Full Name';}" placeholder="Full Name" required="">
                                    <div class="clearfix"></div>
                                </div>
                            <div class="key">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <input  type="text" value="" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" placeholder="Email" required="">
                                <div class="clearfix"></div>
                            </div>
                            <div class="key">
                                    <i class="fa fa-globe" aria-hidden="true"></i>
                                    <input  type="text" value="" name="address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Address';}" placeholder="Address" required="">
                                    <div class="clearfix"></div>
                                </div>
                                <div class="key">
                                        <i class="fa fa-mobile" aria-hidden="true"></i>
                                        <input  type="text" value="" name="mobile" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Mobile';}" placeholder="mobile" required="">
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="key">
                                            <i class="fa fa-mobile" aria-hidden="true"></i>
                                            <input  type="number" value="" name="age" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Age';}" placeholder="Age" required="">
                                            <div class="clearfix"></div>
                                        </div>
                            <div class="key">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <input  type="password" value="" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" placeholder="Password" required="">
                                <div class="clearfix"></div>
                            </div>
                            <div class="key">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <input  type="password" value="" name="confirm_password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Confirm Password';}" placeholder="Confirm Password" required="">
                                <div class="clearfix"></div>
                            </div>
                            <input type="submit" value="Register">
                        </form>
                    </div>
                    
                </div>
            </div>

            @stop