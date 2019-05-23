<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Student;
use App\Guardian;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

    $user=  User::create([

            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => 0,
            'role_id' => $data['role_id'],

      ]);

    $result=User::select('id')->where('email', $data['email'])->first();

    if($data['role_id']==2){
            DB::table('model_has_roles')->insert(['role_id'=>$data['role_id'],'model_type'=>'App\User','model_id'=>$result->id]);
        }
    elseif($data['role_id']==3){
        Student::create([
            'user_id' => $result->id,
            'class'=>$data['class'],
            'roll_no'=>$data['roll_no']
        ]);
        DB::table('model_has_roles')->insert(['role_id'=>$data['role_id'],'model_type'=>'App\User','model_id'=>$result->id]);
    }elseif ($data['role_id']==4){
        Guardian::create([
            'user_id' => $result->id,
            'class'=>$data['class'],
            'roll_no'=>$data['roll_no']
        ]);
        DB::table('model_has_roles')->insert(['role_id'=>$data['role_id'],'model_type'=>'App\User','model_id'=>$result->id]);
    }
      return $user;

    }
}
