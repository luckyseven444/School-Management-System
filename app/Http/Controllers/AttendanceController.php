<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\Student;
use App\User;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
   public function Load(){
       $current_user=Auth::user()->id;
      $class= DB::table('assignments')->where('user_id',$current_user)->first();

      $data['students']=Student::
            join('users', 'students.user_id', '=', 'users.id')
            ->where('class',$class->class)
            ->select('name', 'roll_no', 'class','users.id')
           ->get();
      return view('attendance', $data);
   }

   public function Submit(Request $request){

       for($i=0; $i <= count($request->name)-1; $i++){
           DB::table('attendance')
               ->insert(['user_id'=>$request->user_id[$i],
                   'name'=>$request->name[$i],
                   'class'=>$request->class[$i],
                   'roll_no'=>$request->roll_no[$i],
                   'date'=>$request->input('date')]);
       }
   }


}
