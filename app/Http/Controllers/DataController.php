<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currently;
use App\Models\Hourly;
use App\Models\Daily;
use App\Models\Weekly;
use App\Models\Sensors;
use App\Models\Monthly;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    /**
     * Displaying Views.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perms_id=Auth::user()->perms_id;
        return view("guest.home",["perms_id"=>$perms_id]);

    }

    public function about()
    {
        return view("guest.about");
    }
    public function getdata()
    {
        $result=Sensors::all();
        return view("data.get_data",["sensors"=>$result]);
    }
    public function insertdata()
    {
        $result=Sensors::all();
        return view("data.insert_data",["sensors"=>$result]);
    }
    public function getmultipledata(){
        $result=Sensors::all();
        return view("data.get_multiple_data",["sensors"=>$result]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request)
    {
        $date = Carbon::now()->toDateTimeString();
        $post = new Currently;
        $post->date = $date;
        $post->humid = $request->humid;
        $post->temp = $request->temp;
        $post->sensor_id = $request->sensor_id;
        $post->save();
        $controller = new ScheduleController();
        $controller->hourly($request->sensor_id,$date);
        $controller->daily($request->sensor_id,$date);
        $controller->weekly($request->sensor_id,$date);
        $controller->monthly($request->sensor_id,$date);
        return redirect("/insertdata");
    }
    public function sensorstore(Request $request){
        $date = Carbon::now()->toDateTimeString();
        $humid = random_int(10, 100);
        $temp=random_int(-30,100);
        $post = new Currently;
        $post->date = $date;
        $post->humid = $humid;
        $post->temp = $temp;
        $post->sensor_id = $request->sensor_id;
        $post->save();
        $controller = new ScheduleController();
        $controller->hourly($request->sensor_id,$date);
        $controller->daily($request->sensor_id,$date);
        $controller->weekly($request->sensor_id,$date);
        $controller->monthly($request->sensor_id,$date);
        return redirect("/insertdata");
       }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id,$table)
    {
        $results = DB::table($table)->where('sensor_id',$id)->get();
        return $results;
    }
}
