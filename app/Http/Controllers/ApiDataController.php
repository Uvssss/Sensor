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
        $fromTime =($request->fromTime);
        $toTime = ($request->toTime);
        $table = $request->table;

        $time = DB::table($table)
            ->whereBetween('date', [$fromTime, $toTime])
            ->where("sensor_id",$sensor);
        return response()->json(array('data' => $time->get()));
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
}
