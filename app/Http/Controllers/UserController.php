<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
class UserController extends Controller
{


    // to show and to forward it to fortify hopefully


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("profile.settings");
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

    public function update(Request $request,)
    {

        $id=Auth::user()->id;
        $post=User::find($id);
        $post->name = $request->name;
        $post->email = $request->email;
        $post->password =Hash::make($request->password);
        $post->save();
        return redirect("/logout");
    }
    public function existsUsername($username){
        $UsernameExists =(User::where('name',$username)->get());
        if(count($UsernameExists)==0){
            $UsernameExists=false;
        }
        else{
            $UsernameExists=true;
        }
        return json_encode($UsernameExists);
    }

    /**
     * Summary of existsEmail
     *
     * Check if email is already claimed
     * and return boolean
     */
    public function existsEmail($email){
        $EmailExists =(User::where('email',$email)->get());
        if(count($EmailExists)==0){
            $EmailExists=false;
        }
        else{
            $EmailExists=true;
        }
        return json_encode($EmailExists);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $date=Carbon::now()->toDateTimeString();
        $post=User::find($id);
        $post->deleted_at = $date;
        $post->WhoDeleted =Auth::user()->id;
        $post->save();;

        // WHYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY


        // $user = User::find($request->id);
        // $user->delete();

        // $date=$date = Carbon::now()->toDateTimeString();
        // $user->deleted_at=$date;
        // // $user->SoftDeletes();ph
        // $user->WhoDeleted=Auth::user()->name;
        // $user->save();
    }
}
