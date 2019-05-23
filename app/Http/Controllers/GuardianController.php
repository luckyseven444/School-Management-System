<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class GuardianController extends Controller
{
    public  function CheckAttendance(Request $request){
          $current_guardian_id=Auth::user()->id;
          $temp_guardian= DB::table('guardians')->where('user_id', $current_guardian_id)->first();

          $kid= DB::table('students')
            ->where('class',$temp_guardian->class)
            ->where('roll_no',$temp_guardian->roll_no)
            ->first();

          $data['dates']= DB::table('attendance')
            ->where('user_id',$kid->user_id)
            ->whereBetween('date',[$request->from_date, $request->end_date])
            ->get();
          return view('print_dates',$data);
    }
}
