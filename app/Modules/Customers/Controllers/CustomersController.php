<?php

namespace App\Modules\Customers\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Modules\Customers\Models\Customers;

class CustomersController extends Controller
{

    public function __construct(Customers $customer){
        $this->customer = $customer;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginPage()
    {
        return view("Customers::login");
    }

    public function login(Request $request)
    {
       
        $Validator = Validator::make($request->all(),[
            'password' => 'required',
            'email'=> 'required'
            
        ]);
        if($Validator->fails()){
           
            return redirect()->back()->withErrors($Validator->errors())->withInput($request->all());
        }
        
        $customer = $this->customer->select('id', 'email', 'fullname', 'age', 'address', 'mobile', 'password')
            ->where('email', $request->email)
            ->first();

            if(!$customer){
                Session::flash("message", "Email Not Found");
                return back();
            }
       

        if (Hash::check($request->password, $customer->password)) {
           
            //user is defined here to adjust with existing system session
            session(['user' => $customer]);
         
            Session::flash("message", "Success");
        } else {
            Session::flash("message", "Incorrect Password");
            return redirect()->back();
        }
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registerPage(Request $request)
    {

        return view("Customers::register");
    }

    public function register(Request $request)
    {
       
        $Validator = Validator::make($request->all(),[
            'username' => 'required',
            'email'=> 'required|email|unique:customers'
            
        ]);
        if($Validator->fails()){
            return redirect()->back()->withErrors($Validator->errors())->withInput($request->all());
        }

        $data = $request->except('_token', 'confirm_password','password');
        $data['password'] = bcrypt($request->password);
        

        if($this->customer->create($data)){
            Session::flash("message", "success");
        }else{
            Session::flash("message", "success");
        }

        return redirect(route('customer.login'));
    }

    public function logout()
    {
        
        session()->forget('user');
        session()->flush();
        return redirect('/');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
