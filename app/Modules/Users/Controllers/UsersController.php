<?php

namespace App\Modules\Users\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Modules\Users\Repository\IUsers;
use Hash;
use Redirect;
use Validator;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    
    protected $model;

    public function __construct(IUsers $model)
    {
        //$this->middleware('auth');
        $this->model = $model;
    }

    public function getData()
    {
        
        $data = $this->model->paginate(10);
        
        $response = [
            'pagination' => [
                'total' => $data->total(),
                'per_page' => $data->perPage(),
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
                'from' => $data->firstItem(),
                'to' => $data->lastItem()
            ],
            'data' => $data
          

        ];
        return response()->json($response);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['name','email', 'password','password_confirmation']);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password'         => 'required|min:4',
            'password_confirmation' => 'required|same:password',

        ]);

        if($validator->fails()) {
            return response()->json($validator);
        }

        $user = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])];

        $response = $this->model->create($user);

        if ($response->exists) {
            $notification = array(
                'message' => 'User Successfully Stored!',
                'alert-class' => 'alert-success'
            );

            return response()->json($notification);
        } else {
            $notification = array(
                'message' => $errors->all(),
                'alert-class' => 'alert-danger'
            );

            return response()->json($notification);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->model->find($id);

        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request) {
        if($request->new_password) {
            $this->changePassword($id, $request);
        } else {
            $this->update_details($id, $request);
        }
    }
    public function update_details($id, Request $request)
    {
        

        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'name'=>'required',
            'email'=>'required',
            'current_password' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json($validator);
        }

        $user = $this->model->find($id);

        if (!$user) {         
            return response()->json('user not found');
        }

        if(!Hash::check($request->current_password, $user->password)) {
            return response()->json(["status"=>"error", "message"=>"incorrect password"]);
        }

        $user->email = $request->input('email');
        $user->name = $request->input('name');

        if ($user->save()) {
            $response = "success";
        } else {
            $response = "success";
        }
        
        return response()->json($response);

    }

    public function changePassword($id, Request $request){
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'name'=>'required',
            'email'=>'required',
            'password_confirmation' => 'required',
            'old_password' => Auth::user()->password,
            'new_password' => 'confirmed|min:4|different:password'
        ]);

        if($validator->fails()) {
            return response()->json($validator);
        }

        $user = $this->model->find($id);
        if (!$user) {
         
            return response()->json('user not found');
        }
        $user->password = Hash::make($request->input('new_password'));
        if ($user->save()) {
            $response = "success";
        } else {
            $response = "success";
        }
        
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->user->find($id);
        if ($data->delete()) {
            return response()->json("success");
        }else {
            return response()->json(
                ["status"=>"error",
                "code" => 404,
                "message"=> "process failed"
              ]);
        }
    }



}
