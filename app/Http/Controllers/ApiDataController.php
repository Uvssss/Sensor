<?php

namespace App\Http\Controllers;

use App\Models\Currently;
use App\Models\Daily;
use App\Models\Hourly;
use App\Models\Monthly;
use App\Models\Sensors;
use App\Models\Weekly;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Raw;

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
        $fromTime =($request->fromTime);
        $toTime = ($request->toTime);
        $table = $request->table;

        $time = DB::table($table)
            ->whereBetween('date', [$fromTime, $toTime])
            ->where("sensor_id",$sensor);
        return response()->json(array('data' => $time->get()));
    }
    public function GetDataBetween(Request $request){
        $from_sensor=$request->from_Sensor;
        $to_Sensor=$request->to_sensor;
        $fromTime=$request->fromTime;
        $toTime=$request->toTime;
        $table=$request->table;
        $column=$request->column;
        $time = DB::table($table)->selectRaw('date,sensor,sensor_id,'.$column)
            ->whereBetween('date', [$fromTime, $toTime])
            ->whereBetween("sensor_id",[$from_sensor,$to_Sensor])->join('sensor', 'sensor.id', '=', $table.'.sensor_id')->orderBy('id', 'DESC');
            // return dd($time->get());
        return response()->json(array('data' => $time->get()));
    }
    public function existsSensorname($sensor){
        $Exists =(Sensors::where('sensor',$sensor)->get());
        if(count($Exists)==0){
            $Exists=false;
        }
        else{
            $Exists=true;
        }
        return response()->json($Exists);
    }
    public function getsensors()
    {
        $sensors = Sensors::all();
        return json_encode($sensors);
    }

    public function gettime($table,$sensor_id){
        $time = DB::table($table)->where("sensor_id",$sensor_id)->pluck('date');
        return response()->json(array('date' => $time));
    }
    public function chart(){
        $endarray=[];
        $total=DB::table("sensor")->count();
        $locations= DB::table("sensor")->selectRaw("count(location) as loc_count,location")->groupBy("location")->get();
        foreach ($locations as $location){
            $percentage=$location->loc_count / $total * 100;
            $endarray[]=[$percentage,$location->location];
        }
        return response()->json(array('data' => $endarray));
    }

    public function avg_humid_line_chart(){
        $date = Carbon::now();
        $startOfDay=$date->copy()->startOfDay();
        $endOfDay=$date->copy()->endOfDay();
        $time = DB::table("hourly")->selectRaw('date,sensor_id,sensor,average_humid')
            ->whereBetween('date', [$startOfDay,$endOfDay])->join('sensor', 'sensor.id', 'hourly.sensor_id')->orderBy('id', 'DESC')->get();
        if ($time->groupBy("id")->count()<2){
            $yesterday_start=Carbon::yesterday()->copy()->startOfDay();
            $yesterday_end=Carbon::yesterday()->copy()->endOfDay();
            $time = DB::table("hourly")->selectRaw('date,sensor_id,sensor,average_humid')
            ->whereBetween('date', [$yesterday_start,$yesterday_end])->join('sensor', 'sensor.id', 'hourly.sensor_id')->orderBy('id', 'DESC')->get();
        }
        return response()->json(array('data' =>$time));
    }

    public function avg_temp_line_chart(){
        $date = Carbon::now();
        $startOfDay=$date->copy()->startOfDay();
        $endOfDay=$date->copy()->endOfDay();
        $time = DB::table("hourly")
            ->selectRaw('date,sensor_id,sensor,average_temp')
            ->whereBetween('date', [$startOfDay,$endOfDay])->join('sensor', 'sensor.id', 'hourly.sensor_id')
            ->orderBy('id', 'DESC')->get();
        if ($time->groupBy("id")->count()<2){
                $yesterday_start=Carbon::yesterday()->copy()->startOfDay();
                $yesterday_end=Carbon::yesterday()->copy()->endOfDay();
                $time = DB::table("hourly")
                ->selectRaw('date,sensor_id,sensor,average_temp')
                ->whereBetween('date', [$yesterday_start,$yesterday_end])->join('sensor', 'sensor.id', 'hourly.sensor_id')
                ->orderBy('id', 'DESC')->get();
            }
        return response()->json(array('data' =>$time));
    }

    public function temp_area_chart(){
        $startOfWeek=Carbon::now()->startOfWeek()->format('Y-m-d');
        $endOfWeek=Carbon::now()->endOfWeek()->format('Y-m-d');
        $time=DB::table("daily")
        ->selectRaw("date,sensor_id,sensor,min_temp,max_temp")->whereBetween('date',[$startOfWeek,$endOfWeek])
        ->join('sensor', 'sensor.id', 'daily.sensor_id')
        ->orderBy('id', 'DESC');
        return response()->json(array('data' => $time->get()));
    }
    public function humid_area_chart(){
        $startOfWeek=Carbon::now()->startOfWeek()->format('Y-m-d');
        $endOfWeek=Carbon::now()->endOfWeek()->format('Y-m-d');
        $time=DB::table("daily")
        ->selectRaw("date,sensor_id,sensor,min_humid,max_humid")->whereBetween('date',[$startOfWeek,$endOfWeek])
        ->join('sensor', 'sensor.id', 'daily.sensor_id')
        ->orderBy('id', 'DESC');
        return response()->json(array('data' => $time->get()));
    }
    public function column_chart(){
        $time=DB::table("sensor")->selectRaw("location,count(location) as loc_count")->groupBy("location");
        // return dd($time->get());
        return response()->json(array('data' => $time->get()));
    }
}
