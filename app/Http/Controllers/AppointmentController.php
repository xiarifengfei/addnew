<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Silber\Bouncer\Database\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Appointment;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function builddata()
    {
        return(DB::table('appointments')
                ->join('products', 'products.id', '=', 'appointments.pid')
                ->join('users', 'users.id', '=', 'appointments.uid')
                ->join('users as cusers', 'cusers.id', '=', 'appointments.cid')
                ->select('cusers.name as cName','users.name as uName','products.name as pName','appointments.*','products.price as price')
                ->orderBy('stime')
                ->get()
        );
    }
    public function index()
    {   
        $timenow=Carbon::now();
        $appointments = AppointmentController::builddata();
        $appointments=$appointments->where('stime','>',$timenow);
        return view('Appointment.index',['appointments' => $appointments]);
                //return $timenow;
    }
    public function showhis()
    {
        $timenow=Carbon::now();
        $appointments = AppointmentController::builddata();
        return view('Appointment.index',['appointments' => $appointments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = DB::table('users')->get();
        $products = DB::table('products')->get();
        $appointments = DB::table('appointments')->select('uid','stime','pid')->get();
        return view('Appointment.add', ['users' => $users,'products' => $products,'appointment'=>$appointments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cid=$request->input('cid');
        $pid=$request->input('pid');
        $uid=$request->input('uid');
        $stime=$request->input('stime');
        if($request->has('note')){
            $note=$request('note');
        }
        else{
            $note="None";

        }
        $data=array('uid'=>$uid,
            'pid'=>$pid,
            'cid'=>$cid,
            'stime'=>$stime,
            'note' =>$note,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),);
        DB::table('appointments')->insert($data);
        return redirect('/appointment')->with('message', 'success to make appointment!');
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
