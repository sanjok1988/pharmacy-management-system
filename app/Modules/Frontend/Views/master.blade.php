<!DOCTYPE html>
<html>
<head>
<title>{{ config('app.name', 'Okhati') }}</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="{{ asset('front/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="{{ asset('front/css/style.css') }}" rel='stylesheet' type='text/css' />
<!-- js -->
   <script src="{{ asset('front/js/jquery-1.11.1.min.js') }}"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{ asset('front/js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/easing.js') }}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<link href="{{ asset('front/css/font-awesome.css') }}" rel="stylesheet"> 
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>

<link href="{{ asset("vue/css/toastr.css")}}" rel="stylesheet" type="text/css">

<link href="{{ asset('css/sweet.css') }}" rel="stylesheet" type="text/css">

<script src="{{ asset('vue/vue.js') }}"></script>
<script src="{{ asset('vue/vue-resource.js') }}"></script>
<script src="{{ asset('vue/vuex.js') }}"></script>
<script src="{{ asset('vue/toastr.js') }}"></script>

@yield('css')
</head>
<body>
<a href=""><img src="{{ asset('front/images/download.png') }}" class="img-head" alt=""></a>
<div id="app">
<div class="header">

		<div class="container">
			
			<div class="logo">
            <h1 ><a href="{{ url('/')}}">{{ config('app.name', 'Okhati') }}</a></h1>
			</div>
			@include('Frontend::nav')
					
	</div>			
</div>
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="text-align:center">{{ Session::get('message') }}</p>
@endif


<!--content-->
	@yield('content')
</div>
<!--footer-->


<div class="footer">
	<div class="container">
		<div class="col-md-3 footer-grid">
			<h3>About Us</h3>
			<p>Nam libero tempore, cum soluta nobis est eligendi 
				optio cumque nihil impedit quo minus id quod maxime 
				placeat facere possimus.</p>
		</div>
		<div class="col-md-3 footer-grid ">
			<h3>Menu</h3>
			<ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ route('front.products.list') }}">products</a></li>
			
				<li><a href="{{ route('contact') }}">Contact</a></li>
			</ul>
		</div>
		<div class="col-md-3 footer-grid ">
			<h3>Customer Services</h3>
			<ul>
				<li><a href="shipping.html">Shipping</a></li>
				<li><a href="terms.html">Terms & Conditions</a></li>
				<li><a href="faqs.html">Faqs</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
				<li><a href="offer.html">Online Shopping</a></li>						 
				 
			</ul>
		</div>
		<div class="col-md-3 footer-grid">
			<h3>My Account</h3>
			<ul>
				<li><a href="login.html">Login</a></li>
				<li><a href="register.html">Register</a></li>
				<li><a href="wishlist.html">Wishlist</a></li>
				
			</ul>
		</div>
		<div class="clearfix"></div>
			<div class="footer-bottom">
				<h2 ><a href="index.html">{{ config('app.name', 'Okhati') }}<span>The Best Online Medicine Shop</span></a></h2>
				<p class="fo-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
				<ul class="social-fo">
					<li><a href="#" class=" face"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#" class=" twi"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="#" class=" pin"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
					<li><a href="#" class=" dri"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
				</ul>
				<div class=" address">
					<div class="col-md-4 fo-grid1">
							<p><i class="fa fa-home" aria-hidden="true"></i> Pathri, Morang.</p>
					</div>
					<div class="col-md-4 fo-grid1">
							<p><i class="fa fa-phone" aria-hidden="true"></i>+1234 758 839 , +1273 748 730</p>	
					</div>
					<div class="col-md-4 fo-grid1">
						<p><a href="mailto:info@okhati.com"><i class="fa fa-envelope-o" aria-hidden="true"></i>info@okhati.com</a></p>
					</div>
					<div class="clearfix"></div>
					
					</div>
			</div>
		<div class="copy-right">
			<p> &copy; All Rights Reserved | Design by  <a href=""> Tulasi Bhandari</a></p>
		</div>
	</div>
</div>
<!-- //footer-->

<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<!-- for bootstrap working -->
		<script src="{{ asset('front/js/bootstrap.js') }}"></script>
		<script src="{{ asset('js/sweet.js') }}"></script>
<!-- //for bootstrap working -->
<script src="{{ asset('front/vue/my.js') }}"></script>
  
  @yield('js')
</body>
</html>