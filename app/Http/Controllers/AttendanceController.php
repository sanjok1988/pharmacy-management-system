<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function __construct(Attendance $attendance)
    {
        $this->middleware('auth');
        $this->attendance = $attendance;
    }

    /**
     * @todo get mac address
     */
    public function getMacAddress() {

    }
    
    /**
     * Employee Sign In Function
     * Check is already sign in
     * If not record current time
     * Employee can only sign in with current date
     * @return void
     */
    public function signIn(Request $request){
        $uid = Auth::user()->id;

        if(Attendance::get_signed_id()) {
            if(Attendance::is_signout())
            $request->session()->flash('message', "You have already sign out. Please sign in tomorrow");
            else
            $request->session()->flash('message', "You have already sign in. Please sign out if you want to leave!");
            return redirect(route('employee.profile')); 
        }

        if($uid){
            $current_time = Carbon::now()->toDateTimeString();
            $data = [
                'employee_id' => $uid,
                'time_in' => $current_time,
                'time_out' => $current_time
            ];
            $this->attendance->create($data);
            $request->session()->flash('message', "successfully Recorded. Thank you!");
            return redirect(route('employee.profile'));
        }else{
            return redirect(route('employee.profile'));
        }
    }

    /**
     * Employee signout
     * Check is already sign in
     * If not first sign in message
     * If already signned in Update with sign in id
     * If Employee forget to signout today, he cannot signout in following days for today
     * @return void
     */
    public function signOut(Request $request){
        $uid = Auth::user()->id;
        
        if($uid){
        
            if($sid = Attendance::get_signed_id()){
                $current_time = Carbon::now()->toDateTimeString();
                $data = [
                    'employee_id' => $uid,               
                    'time_out' => $current_time
                ];
                $find = $this->attendance->find($sid);
                //if already sign out then do not allow to signout again
                if($find->time_in != $find->time_out) {
                    $request->session()->flash('message', "Already Sign out. You cannot sign out again. Thank you!");
                    return redirect(route('employee.profile'));
                }
                if($find->update($data)){
                    $request->session()->flash('message', "successfully Recorded. Thank you!");
                    return redirect(route('employee.profile'));
                } else {
                    return "signout process failed";
                }
               
            } else {
                $request->session()->flash('message', "Sign in first!");
                return redirect(route('employee.profile')); 
            }
            
        }else{
            return redirect(route('employee.profile'));
        }
    }

    /**
     * Check if Employee is late
     */
    public function is_late_sign_in() {

    }
    /**
     * Fetch late time
     */
    public function get_late_period() {

    }

    /**
     * Is Signout early
     */
    public function is_eary_sign_out() {

    }
}
