<?php

namespace App\Modules\Orders\Controllers;

use App\Traits\Upload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Orders\Models\Orders;
use Illuminate\Support\Facades\Session;
use App\Modules\Products\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrdersController extends Controller
{
    use Upload;

    public function __construct(Orders $order){
        $this->order = $order;
    }

    public function index(){
        $data = $this->getOrders()->select('p.price', 'p.product_name','orders.status', 'orders.qty','c.email', 'c.mobile', 'orders.id')->paginate();
        return view('Orders::index', compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadPrescription(Request $request)
    {
        $imagename = '';
        if($request->hasFile('image')){
            $imagename = $this->createThumbnail($request->file('image'), 350, 350);
        }
        Session::flash('message', "Successfully uploaded. Thank you");
        $data = [
            'user_id'=> getUserId(),
            'product_id' => $request->pid,
            'image' => $imagename,
            'status' => 'pending',
            'qty' => 1
        ];
        $p = Products::find($request->pid);
       
        if($p){
            Cart::add(['id'=> $p->id, 'name'=> $p->product_name, 'qty'=>1, 'price'=>$p->price ]);
        
            $this->order->create($data);
            return redirect(route('front.products.view', ['id'=>$request->pid]));

        }else{
            Session::flash('message', "Product Not Found");
            return redirect()->back();
        }
        
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUploadPage()
    {
        return view('Frontend::upload_image');
    }

    public function getOrders(){
        return $this->order
        ->join('products as p', 'p.id', 'orders.product_id')
        ->join('customers as c', 'c.id', 'orders.user_id');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getOrderHistory(Request $request)
    {
        $data = $this->getOrders()->paginate(10);
        return view('Orders::order_history', compact('data'));
    }

    public function closeOrder(Request $request){
        $order = $this->order->find($request->id);
      
        if($order){
            if($order->status == 'pending')
            $data = ['status'=>'closed'];
            else
            $data = ['status'=>'pending'];

            $this->order->where('id', $request->id)->update($data);
        }
        return redirect()->back();
    }

    
}
