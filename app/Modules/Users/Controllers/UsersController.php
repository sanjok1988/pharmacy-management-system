<?php

namespace App\Modules\Users\Controllers;

use Hash;
use App\User;
use Redirect;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Contracts\Encryption\DecryptException;

class UsersController extends Controller
{
    protected $model;

    public function __construct(User $user)
    {
        //$this->middleware('auth');
    
        $this->user = $user;
    }

    public function index()
    {
        $data = $this->user->paginate(10);
        return view("Users::index", compact('data'));
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

        if ($validator->fails()) {
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

    public function create()
    {
        $page = "users";
        $action = 'create';
        return view("Users::create", compact('action', 'page'));
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

        return view('Users::edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        if ($request->new_password) {
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

        if ($validator->fails()) {
            return response()->json($validator);
        }

        $user = $this->model->find($id);

        if (!$user) {
            return response()->json('user not found');
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(["status"=>"error", "message"=>"incorrect password"]);
        }

        $user->email = $request->input('email');
        $user->name = $request->input('name');

        if ($user->save()) {
            $response = "success";
        } else {
            $response = "success";
        }
    
        return redirect(route('user.index'));
    }

    public function changePassword($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'name'=>'required',
            'email'=>'required',
            'password_confirmation' => 'required',
            'old_password' => Auth::user()->password,
            'new_password' => 'confirmed|min:4|different:password'
        ]);

        if ($validator->fails()) {
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
        
        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $data = $this->user->find($id);
        if ($data->delete()) {
            $request->session()->flash('message', trans('words.success'));
        } else {
            $request->session()->flash('message', trans('words.failed'));
        }
        return redirect(route('user.index'));
    }
}
