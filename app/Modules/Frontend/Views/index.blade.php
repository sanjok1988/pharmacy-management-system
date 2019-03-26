
@extends('Frontend::master')
@section('content')
<div class="product ">
        <div class="container ">
            <div class="spec ">
                <h3>Special Offers</h3>
                <div class="ser-t">
                    <b></b>
                    <span><i></i></span>
                    <b class="line"></b>
                </div>
            </div>
                <div class="tab-head ">
                    
                    <div class=" tab-content tab-content-t ">
                        <div class="tab-pane active text-style" id="tab1">
                            <div class=" con-w3l">
                                    @foreach($products as $p)
                                <div class="col-md-3 m-wthree">
                                    <div class="col-m">								
                                        <a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img">
                                            <img src="{{ asset('uploads/'.$p->image)}}" class="img-responsive" alt="">
                                            <div class="offer"><p><span>{{ $p->category_name }}</span></p></div>
                                        </a>
                                        <div class="mid-1">
                                            <div class="women">
                                            <h6><a href="{{ route('front.products.view', ['id'=>$p->id]) }}">{{ $p->product_name }}</a></h6>							
                                            </div>
                                            <div class="mid-2">
                                                <p ><em class="item_price">Rs. {{ $p->price }}</em></p>
                                                  <div class="block">
                                                    <div class="starbox small ghosting"> </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="add">
                                               {{-- <a href="{{ route('add.to.cart', ['id'=>$p->id])}}" class="btn btn-danger my-cart-btn my-cart-b ">Add to Cart</a> --}}
                                               <button @click="add_to_cart()" class="btn btn-danger my-cart-btn my-cart-b ">Add to Cart</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                                <div class="clearfix"></div>
                             </div>
                        </div>
                        
                        
                        
                    </div>
                </div>
            
        </div>
     
        </div>
<div class="product">
        <div class="container ">
            <div class="spec ">
                <h3>Prescription</h3>
                <div class="ser-t">
                    <b></b>
                    <span><i></i></span>
                    <b class="line"></b>
                </div>
            </div>
                <div class="tab-head ">
                    
                    <div class=" tab-content tab-content-t ">
                        <div class="tab-pane active text-style" id="tab1">
                            <div class=" con-w3l">
                                  
                                <div v-for="(p, index) in pres" class="col-md-3 m-wthree">
                                    <div class="col-m">								
                                        <a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img">
                                           
                                            <img style="width:100%" :src="'{{ url('uploads') }}/' + p.image" class="img-responsive">
                                            <div class="offer"><p><span>@{{ p.category_name }}</span></p></div>
                                        </a>
                                        <div class="mid-1">
                                            <div class="women">
                                            <h6><a href="">@{{ p.product_name }}</a></h6>							
                                            </div>
                                            <div class="mid-2">
                                                <p ><em class="item_price">Rs. @{{ p.price }}</em></p>
                                                  <div class="block">
                                                    <div class="starbox small ghosting"> </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="add">
                                               {{-- <a href="{{ route('add.to.cart', ['id'=>$p->id])}}" class="btn btn-danger my-cart-btn my-cart-b ">Add to Cart</a> --}}
                                               <button @click="add_to_cart(p)" class="btn btn-danger my-cart-btn my-cart-b ">Add to Cart</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            
                                
                                <div class="clearfix"></div>
                             </div>
                        </div>
                        
                        
                        
                    </div>
                </div>
            
        </div>
     
        </div>
    
    
    <div class="product">
        <div class="container ">
            <div class="spec ">
                <h3>Non Prescription</h3>
                <div class="ser-t">
                    <b></b>
                    <span><i></i></span>
                    <b class="line"></b>
                </div>
            </div>
                <div class="tab-head ">
                    
                    <div class=" tab-content tab-content-t ">
                        <div class="tab-pane active text-style" id="tab1">
                            <div class=" con-w3l">
                                  
                                <div v-for="(p, index) in nonpres" class="col-md-3 m-wthree">
                                    <div class="col-m">								
                                        <a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img">
                                           
                                            <img style="width:100%" :src="'{{ url('uploads') }}/' + p.image" class="img-responsive">
                                            <div class="offer"><p><span>@{{ p.category_name }}</span></p></div>
                                        </a>
                                        <div class="mid-1">
                                            <div class="women">
                                            <h6><a href="">@{{ p.product_name }}</a></h6>							
                                            </div>
                                            <div class="mid-2">
                                                <p ><em class="item_price">Rs. @{{ p.price }}</em></p>
                                                  <div class="block">
                                                    <div class="starbox small ghosting"> </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="add">
                                               {{-- <a href="{{ route('add.to.cart', ['id'=>$p->id])}}" class="btn btn-danger my-cart-btn my-cart-b ">Add to Cart</a> --}}
                                               <button @click="add_to_cart(p)" class="btn btn-danger my-cart-btn my-cart-b ">Add to Cart</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            
                                
                                <div class="clearfix"></div>
                             </div>
                        </div>
                        
                        
                        
                    </div>
                </div>
            
        </div>
     
        </div>
	</div>
    @endsection
    @section('js')
    <script src="{{ asset('front/vue/index.js') }}"></script>
    @endsection