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
    public function addToCart(Request $request)
    {
        $product = $this->product->find($request->id);
        
        Cart::add($product);
        $request->session()->flash('message', "product is added to cart");
        return redirect()->back();
    }

    public function cart(Request $request)
    {
        Cart::add([
            ['id' => '1', 'name' => 'Product 1', 'qty' => 1, 'price' => 10.00],
            ['id' => '2', 'name' => 'Product 2', 'qty' => 1, 'price' => 10.00, ]
          ]);
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
}
