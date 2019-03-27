@extends('Frontend::master')
@section('content')
@if($data)
<div class="single">
			<div class="container">
						<div class="single-top-main">
	   		<div class="col-md-5 single-top">
	   		<div class="single-w3agile">
							
<div id="picture-frame">
			<img src="{{ asset('uploads/'.$data->image) }}" data-src="{{ asset('uploads/'.$data->image) }}" alt="" class="img-responsive"/>
		</div>
										<script src="{{ asset('front/js/jquery.zoomtoo.js') }}"></script>
								<script>
			$(function() {
				$("#picture-frame").zoomToo({
					magnify: 1
				});
			});
		</script>
		
		
		
			</div>
			</div>
			<div class="col-md-7 single-top-left ">
            <form action="{{ route('add.to.cart') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="id" value="{{ $data->id }}" />

				<div class="single-right">
				<h3>{{ $data->product_name}}</h3>		
					
				 <div class="pr-single">
				  <p class="reduced ">Rs.{{ $data->price}}</p>
				</div>
				<div class="block block-w3">
					<div class="starbox small ghosting"> </div>
				</div>
                <p class="in-pa"> {{ $data->details }}</p>
                <div class="col-md-1">
                <p>Qty:</p>
                </div>
                <div class="col-md-3">
                    <input name="qty" type="number" class="form-control pull-left" />
                </div>
                <div class="clearfix"> </div>
                <br>
			
                <div class="add add-3">
                    <button type="submit" class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="Wheat" data-summary="summary 1" data-price="6.00" data-quantity="1" data-image="images/si.jpg">Add to Cart</button>
                </div>
				
				 
			   
			
			</div>
        </form>

			</div>
		   <div class="clearfix"> </div>
	   </div>	
				 
				
	</div>
</div>

<div class="content-top offer-w3agile">
        <div class="container ">
                <div class="spec ">
                    <h3>Similar Products</h3>
                        <div class="ser-t">
                            <b></b>
                            <span><i></i></span>
                            <b class="line"></b>
                        </div>
                </div>
                            <div class=" con-w3l wthree-of">
                            @foreach($similars as $p)
                            
                                <div class="col-md-3 pro-1">
                                    <div class="col-m">
                                    <a href="{{ route('front.products.view') }}">
                                            <img src="{{ asset('uploads/'.$p->image)}}" class="img-responsive" alt="">
                                    <div class="offer"><p><span>{{ $p->category_name }}</span></p></div>
                                        </a>
                                        <div class="mid-1">
                                            <div class="women">
                                                <h6><a href="">{{ $p->product_name }}</a></h6>							
                                            </div>
                                            <div class="mid-2">
                                                <p ><label></label><em class="item_price">{{ $p->price }}</em></p>
                                                  <div class="block">
                                                       
                                                    <div class="starbox small ghosting"> </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                
                                            </div>
                                                <div class="add">
                                               <button class="btn btn-danger my-cart-btn my-cart-b" data-id="5" data-name="Lays" data-summary="summary 5" data-price="0.70" data-quantity="1" data-image="images/of4.png">Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                                <div class="clearfix"></div>
                             </div>
                        </div>
                    </div>
          
    @endif
@endsection

@section('js')
<script>
var id = '{{ request()->id }}';
var vm = new Vue({
    el:'#app',
    store,
    data:{
        item:[],
       
        gt:0

    },
    mounted(){
       
        this.getGT();
        this.get_product();
    },
    computed(){

    },
    methods:{
        show(id){
            window.location.href = 'product/view?id='+id;
        },
        add_to_cart(p){          
            
            this.$http.get('add/to/cart?id='+p.id).then((response)=>{
                console.log(response.data.total);
                this.getGT(response.data.total);
                
                toastr.success('Thank You!', 'Added To Cart', {
                    timeOut: 5000
                });
    
            });
        },
        get_product(){
            this.$http.get('product/detail?id='+id).then((response)=>{
                console.log(response);
              
                this.item(response.data)
               
                
            });
        },
        getGT(){
            this.$http.get('cart/total').then((response)=>{
              
               this.gt = response.data.total;
                
            });
           
        }
        

    }
});
</script>
@endsection
@section('css')
        
@endsection