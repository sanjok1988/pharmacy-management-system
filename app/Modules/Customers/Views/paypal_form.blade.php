@extends('Frontend::master')
@section('content')
@if ($message = Session::get('success'))
    <div class="w3-panel w3-green w3-display-container">
        <span onclick="this.parentElement.style.display='none'"
                class="w3-button w3-green w3-large w3-display-topright">&times;</span>
        <p>{!! $message !!}</p>
    </div>
    <?php Session::forget('success');?>
    @endif
@if ($message = Session::get('error'))
    <div class="w3-panel w3-red w3-display-container">
        <span onclick="this.parentElement.style.display='none'"
                class="w3-button w3-red w3-large w3-display-topright">&times;</span>
        <p>{!! $message !!}</p>
    </div>
    <?php Session::forget('error');?>
    @endif


  <!--banner-->
<div class="banner-top">
    <div class="container">
        <h3 >Login</h3>
        <h4><a href="index.html">Home</a><label>/</label>Pay</h4>
        <div class="clearfix"> </div>
    </div>
</div>
<!--login-->

    <div class="login">
    
        <div class="main-agileits">
                <div class="form-w3agile">
                    <h3>Pay with PayPal</h3>
                    <form role="form" method="POST" action="{{ url('payment/add-funds/paypal')}}" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <i class="fa fa-envelope" aria-hidden="true"></i><label> Enter Amount</label>
                            <input class="form-control" type="text" name="amount" required="">
                            <div class="clearfix"></div>
                        </div>
                       
                        <input type="submit" value="Pay with PayPal">
                    </form>
                </div>
                <div class="forg">
                    
                    <a href="" class="forg-right">Paid On Delivery</a>
                <div class="clearfix"></div>
                </div>
            </div>
        </div>

  @endsection