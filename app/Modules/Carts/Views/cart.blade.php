@extends('Frontend::master')
@section('content')
<div id="mycart">
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 ">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                   
                    <tr v-for="(item, index) in items">
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                            <h4 class="media-heading"><a href="#">@{{ item.name}}</a></h4>
                                <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="number" class="form-control"  v-model.qty="item.qty">
                       
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>@{{ item.price }}</strong></td>
                    <td class="col-sm-1 col-md-1 text-center">
                        <input  type="number" class="form-control no-border"  v-model.total="getTotal(item)" v-on:change="foo" readonly>
                    </td>
                        <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </button></td>
                    </tr>
                  
                 
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                    <td class="text-right"><h5><strong>@{{ subtotal }}</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>$6.94</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                    <td class="text-right"><h3><strong><input  type="number" class="form-control no-border"  v-model="total" readonly></strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></td>
                        <td>
                        <button type="button" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection

@section('js')
<script>
        var vm = new Vue({
            el:'#mycart',
            data:{
                items:[{
                    name:'',
                    qty:'',
                    price:''
                }],
                subtotal: 0,
                total:0,
                shipping:0


            },
            computed : {
                    total: function() {
                    let sum = 0;
                    return 10;
                    },
                    subtotal: function(){
                        let sum = 0;
                        // this.items.reduce(function(total, item){
                        //     return total + item.price;
                        // },0);
                        
                    },
                    foo: function(){
                        return this.total += 10; 
                    }
                },
            mounted(){
                this.getCartList();
                
            },
           
            methods:{
                getCartList(){
                    this.$http.get('cart/data').then((response) => {
                        this.items = response.data;			
                        
                    });
                },
                getTotal(item){
                    return item.price * item.qty
                },
                foo(){
                    alert(1);
                }
                
            }
        });
    </script>
@endsection
@section('css')
        <style>
            .no-border{
                border:none;
            }
            </style>
@endsection