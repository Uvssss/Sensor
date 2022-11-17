<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currently;
use App\Models\Hourly;
use App\Models\Daily;
use App\Models\Weekly;
use App\Models\Sensors;
use App\Models\Monthly;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   // do this later
        return view("home");
    }
    public function getdata()
    {
        return view("data.get_data");
    }
    public function insertdata()
    {
        return view("data.insert_data");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id,$humid,$temp)
    {
        //$result= DB::table('sensor')->where('sensor', $name)
        //->where('location',$location)
       // ->get();                              somehow make it work when choosing sensors
       // $id=$result->id;
        $date = Carbon::now()->toDateTimeString();
        DB::insert('insert into currently (time,humid,temp,sensor_id) values (?,?,?, ?)', [$date,$humid,$temp,$id]);
        return "OK";
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
