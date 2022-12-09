<?php

namespace App\Http\Controllers;

use App\Models\Currently;
use App\Models\Daily;
use App\Models\Hourly;
use App\Models\Monthly;
use App\Models\Sensors;
use App\Models\Weekly;
use Illuminate\Http\Request;

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
            $error = "From Time is larger than to Time";
            return $error;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
