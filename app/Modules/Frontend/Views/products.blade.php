@extends('Frontend::master')
@section('content')

<div class="product ">
    <div class="container ">
        <div class="spec ">
            <h3>Products</h3>
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
                                @foreach($data as $p)
                            <div class="col-md-3 m-wthree">
                                <div class="col-m">								
                                    <a href="{{ route('front.products.view', ['id'=>$p->id]) }}" class="offer-img">
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
                                           <a class="btn btn-danger my-cart-btn my-cart-b " href="{{ route('add.to.cart', ['id'=>$p->id])}}">Add to Cart</a>
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

{{ $data->render() }}
          
@endsection

