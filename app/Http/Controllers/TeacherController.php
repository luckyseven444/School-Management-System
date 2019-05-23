<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DB;

class TeacherController extends Controller
{
    public function Approve($id){
        $user=User::where('id', $id)->first();
        $user->assignRole('teacher');
        $user->status=1;
        $user->save();
    }

    public function Delete($id){
       DB::table('model_has_roles')->where('model_id',$id)->delete();

       $user=User::where('id', $id)->first();
       $user->delete();
    }

    public function Assignment(Request $request){
        DB::table('assignments')->insert(['user_id'=>$request->teacher,'class'=>$request->class]);
    }
}
