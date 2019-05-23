<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use DB;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data['apr_teachers']=User::where('role_id',2)->where('status', 1)->get();
        $data['teachers']=User::where('role_id',2)->where('status', 0)->get();
        return view('home', $data);
    }

    public function downloadPDF(Request $request){

     $data['class']= $request->class;
     $data['from_date']=$request->from_date;
     $data['end_date']=$request->end_date;

     $data['students'] = DB::table('attendance')->where('class', $request->class)
                               ->whereBetween('date',[$request->from_date, $request->end_date])
                               ->selectRaw('roll_no, COUNT(*) as count')
                               ->groupBy('roll_no')
                               ->orderBy('roll_no', 'asc')
                               ->get();

     $pdf = PDF::loadView('pdf', $data);
     return $pdf->download('attendance.pdf');

    }
}
