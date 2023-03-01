<?php

namespace App\Http\Controllers;

use App\Models\Sensors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\Paginator;


class SensorsControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showsensors($searchby,$name = null){
        if(!empty($name)){
            $results=Sensors::where($searchby, 'Like', '%' . $name . '%')->simplePaginate(8);
        }
        else{
            $results=DB::table("sensor")->simplePaginate(8);
        }
        return view('data.showsensors',["sensors"=>$results]);
    }
    public function index()
    {
        $results=DB::table("sensor")->simplePaginate(8);
        // return dd($results);
        return view('data.sensor',["sensors"=>$results]);
    }
    public function updateview(Request $request){
        $id=$request->route('id');
        return view('data.update_sensors',["id"=>$id]);
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
        $id=$request->route('id');

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
        $sensor = Sensors::find($id);
        $sensor->delete();
        return redirect("/sensors");
    }
}
