<?php

namespace App\Http\Controllers;

use App\User;
use App\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeAuthController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        
        // Check if a user with the specified email exists
        $user = User::whereEmail($request->email)->first();
     
        if (!$user) {
            Session::flash('message', "User not found");
        }

        // If a user with the email was found - check if the specified password
        // belongs to this user
        if (Hash::check($request->password, $user->password)) {
            return redirect(route('employee.profile'));
        }
    }

    public function profile()
    {
        $records = Attendance::where("employee_id", Auth::user()->id)->get();
        return view('employee_profile', compact('records'));
    }
}
