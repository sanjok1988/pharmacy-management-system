<?php

namespace App\Http\Controllers;

use PayPal\Api\Item;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use Illuminate\Support\Facades\URL;
use App\Modules\Orders\Models\Orders;
use Illuminate\Support\Facades\Input;
use PayPal\Auth\OAuthTokenCredential;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;

class PaypalController extends Controller
{

    public function __construct()
        {
    /** PayPal api context **/
            $paypal_conf = \Config::get('paypal');
            $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
            );
            $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function payForm(){
        return view('Customers::paypal_form');
    }
    
    public function payWithpaypal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $orders = Orders::join('products as p', 'p.id', '=', 'orders.product_id')->where('orders.status','pending')->get();
        $items = [];
        foreach($orders as $item){
            $item_1 = new Item();
            $item_1->setName($item->product_name) /** item name **/
            ->setCurrency('USD')
            ->setQuantity($item->qty)
            ->setPrice($item->price); /** unit price **/
            array_push($items, $item_1);
        }
        
        $item_list = new ItemList();
                $item_list->setItems($items);

        $amount = new Amount();
        
        $amount->setCurrency('USD')
                    ->setTotal(1265.0);

        $transaction = new Transaction();
                $transaction->setAmount($amount)
                    ->setItemList($item_list)
                    ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
                $redirect_urls->setReturnUrl(URL::route('status')) /** Specify return URL **/
                    ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
                $payment->setIntent('Sale')
                    ->setPayer($payer)
                    ->setRedirectUrls($redirect_urls)
                    ->setTransactions(array($transaction));
       
        // dd($payment->create($this->_api_context));

        try {
        $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            echo '<pre>';
            print_r(json_decode($ex->getData()));exit;
        if (\Config::get('app.debug')) {
        \Session::put('error', 'Connection timeout');
                        return Redirect::route('paywithpaypal');
        } else {
        \Session::put('error', 'Some error occur, sorry for inconvenient');
                        return Redirect::route('paywithpaypal');
        }
        }
        foreach ($payment->getLinks() as $link) {
        if ($link->getRel() == 'approval_url') {
        $redirect_url = $link->getHref();
                        break;
        }
        }
        /** add payment ID to session **/
                Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
        /** redirect to paypal **/
                    return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
                return Redirect::route('paywithpaypal');
    }


    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
                $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
                Session::forget('paypal_payment_id');
              
                if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {

        \Session::flash('message', 'Payment failed');
                    return redirect('/');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
                $execution = new PaymentExecution();
                $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
                $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {

        \Session::flash('message', 'Payment success');
                    return redirect('/');
        }
        \Session::flash('message', 'Payment failed');
                return redirect('/');
    }
}
