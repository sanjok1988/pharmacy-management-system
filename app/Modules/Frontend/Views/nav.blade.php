<div class="head-t">
        <ul class="card">
        
          
        <li><a href="{{ route('customer.register') }}" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Register</a></li>
            <li><a href="{{ route('order.history') }}" ><i class="fa fa-file-text-o" aria-hidden="true"></i>Order History</a></li>

            @if(isLogIn())
            <li><a href="{{ route('customer.logout') }}" ><i class="fa fa-user" aria-hidden="true"></i>Logout</a></li>           
            @else
            <li><a href="{{ route('customer.login') }}" ><i class="fa fa-user" aria-hidden="true"></i>Login</a></li>
            @endif
        </ul>	
    </div>
    
    <div class="header-ri">
        <ul class="social-top">
            <li><a href="#" class="icon facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a></li>
            <li><a href="#" class="icon twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span></span></a></li>
            <li><a href="#" class="icon pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i><span></span></a></li>
            <li><a href="#" class="icon dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i><span></span></a></li>
        </ul>	
    </div>


        <div class="nav-top">
            <nav class="navbar navbar-default">
            
            <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                

            </div> 
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav ">
                    <li class="{{ (Request::is('/'))?'active':'' }}"><a href="{{ url('/') }}" class="hyper "><span>Home</span></a></li>	
          
                {{-- <li><a href="{{ route('front.products.list') }}" class="hyper"> <span>Products</span></a></li> --}}
               
                <li class="{{ (request()->type=='pres')?'active':'' }}"><a href="{{ route('front.products.type', ['type'=>'pres']) }}" class="hyper"> <span>Prescription</span></a></li>
                <li class="{{ (request()->type=='nonpres')?'active':'' }}"><a href="{{ route('front.products.type', ['type'=>'nonpres']) }}" class="hyper"> <span>Non Prescription</span></a></li>
                    <li class="{{ (Request::is('contact'))?'active':'' }}"><a href="{{ route('contact') }}" class="hyper"><span>Contact Us</span></a></li>
                </ul>
            </div>
            </nav>
             <div class="cart" >
            
             <a href="{{ route('cart.list') }}"><span class="fa fa-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span>
                </span>
             </a>
             <b style="margin-left:30px">Rs.@{{ gt }}</b>
            </div>
            <div class="clearfix"></div>
        </div>