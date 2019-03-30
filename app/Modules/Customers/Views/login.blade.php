@extends('Frontend::master')
@section('content')
<!--banner-->
<div class="banner-top">
        <div class="container">
            <h3 >Login</h3>
            <h4><a href="index.html">Home</a><label>/</label>Login</h4>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!--login-->
    
        <div class="login">
        
            <div class="main-agileits">
                    <div class="form-w3agile">
                        <h3>Login</h3>
                        <form role="form" method="POST" action="{{ route('customer.login')}}" >
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="key">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <input  type="text" value="" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                                <div class="clearfix"></div>
                            </div>
                            <div class="key">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <input  type="password" value="" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
                                <div class="clearfix"></div>
                            </div>
                            <input type="submit" value="Login">
                        </form>
                    </div>
                    <div class="forg">
                        <a href="#" class="forg-left">Forgot Password</a>
                        <a href="register.html" class="forg-right">Register</a>
                    <div class="clearfix"></div>
                    </div>
                </div>
            </div>
    @stop
    @section('js')
    
    <script>
    
var vm = new Vue({
    el:'#app',
    store,
    data:{
     
        gt:0

    },
    mounted(){
       
        this.getGT();
    },
    computed(){

    },
    methods:{
        
        getGT(){
            this.$http.get('cart/total').then((response)=>{
              
               this.gt = response.data.total;
                
            });
           
        }
        

    }
});
    </script>
    @endsection