<?php

namespace App\Http\Controllers;

use App\Models\Sensors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use function GuzzleHttp\Promise\all;

class SensorsControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results=Sensors::all();
        return view('data.sensor',["sensor"=>$results]);
    }
    public function upt_index()
    {
        return view('data.update_sensors');
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
    public function store(Request $request)
    {
        $post = new Sensors;
        $post->sensor = $request->sensor;
        $post->location = $request->location;
        $post->save();
        return redirect('/sensors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $results = DB::table('sensor')->where('id', $id)->get();
        return $results;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id=Sensors::find("do something idk");
        $post=Sensors::find($id);
        $post->sensor = $request->sensor;
        $post->location = $request->location;
        $post->save();
        return redirect("/sensors");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from sensor where $id = :id',['id'=>$id]);
    }
}
