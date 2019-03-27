<?php

namespace App\Modules\Carts\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Products\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartsController extends Controller
{
    public function __construct(Products $product)
    {
        $this->product = $product;
    }

    public function getGrandTotal(){
        $total = Cart::total();
        return response()->json(['total'=>$total]);
    }
    public function addToCart(Request $request)
    {
        $product = $this->product->find($request->id);
        $data = [
            'id' => $product->id,
            'name'=> $product->product_name,
            'qty'=>1,
            'price'=> $product->price
        ];

        Cart::add($data);
        $total = Cart::total();
        if($request->ajax()){
            return response()->json(['total'=>$total]);
        }

        $request->session()->flash('message', "product is added to cart");
        return redirect()->back();
    }

    public function cart(Request $request)
    {
        
        $data = Cart::content();
       

        return view('Carts::cart', compact('data'));
    }

    public function getCartList(Request $request)
    {
        if ($request->ajax()) {
            $data = Cart::content();
            return response()->json($data);
        }
    }

    public function remove(Request $request)
    {
        
        Cart::remove($request->rid);
       

        return response()->json(200);
    }

    public function checkout(){
        return view("Carts::payment");
    }
}
