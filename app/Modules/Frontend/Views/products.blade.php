@extends('Frontend::master')
@section('content')
@if(request()->type=='pres')
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
                                            
                                           <button @click.prevent="upload(p.id)" class="btn btn-danger my-cart-btn my-cart-b ">Add to Cart</button>
                                           
                                           {{-- <button @click="add_to_cart(p)" class="btn btn-danger my-cart-btn my-cart-b ">Add to Cart</a> --}}
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
@endif
@if(request()->type=='nonpres')
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
                                        <h6><a href="" @click.prevent="show(p.id)">@{{ p.product_name }}</a></h6>							
                                        </div>
                                        <div class="mid-2">
                                            <p ><em class="item_price">Rs. @{{ p.price }}</em></p>
                                              <div class="block">
                                                <div class="starbox small ghosting"> </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="add">
                                           
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
@endif  
@endsection

@section('js')
<script src="{{ asset('front/vue/products.js') }}"></script>
@endsection