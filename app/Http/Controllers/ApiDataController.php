<?php

namespace App\Http\Controllers;

use App\Models\Currently;
use App\Models\Daily;
use App\Models\Hourly;
use App\Models\Monthly;
use App\Models\Sensors;
use App\Models\Weekly;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiDataController extends Controller
{
    /**
     * Gets data from view from query and returns data
     *
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request)
    {
        $sensor = $request->sensor_id;
        $fromTime = $request->fromTime;
        $ToTime = $request->toTime;
        if(date_diff($fromTime,$ToTime)>=0){
            if($request->table=="currently"){
                $currently=Currently::where("sensor_id",$sensor)->whereBetween('time', [$fromTime, $ToTime]);
                return $currently;
            }
            if($request->table=="hourly"){
                $hourly=Hourly::where("sensor_id",$sensor)->whereBetween('hour', [$fromTime, $ToTime]);
                return $hourly;
            }
            if($request->table=="daily"){
                $daily=Daily::where("sensor_id",$sensor)->whereBetween('day', [$fromTime, $ToTime]);
                return $daily;
            }
            if($request->table=="weekly"){
                $weekly=Weekly::where("sensor_id",$sensor)->whereBetween('week', [$fromTime, $ToTime]);
                return $weekly;
            }
            if($request->table=="monthly"){
                $monthly=Monthly::where("sensor_id",$sensor)->whereBetween('month', [$fromTime, $ToTime]);
                return $monthly;
            }
        }
        else{
            return "Failed";
        }
    }

    public function getsensors()
    {
        $sensors = Sensors::all();
        return json_encode($sensors);
    }
    public function gettime($table,$sensor_id){
        // $time = Currently::all();
        // $time = Currently::select();
        // $time=DB::select('select date from ?', [$table]);
        // return response()->json(array('date'=> $time));
        $time = DB::table($table)->where("sensor_id",$sensor_id)->pluck('date');
        // return dd($time);
        return response()->json(array('date' => $time));
    }
}
