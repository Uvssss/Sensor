<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
      /**
     * Summary of existsusername
     *
     * Check if username is already claimed
     * and return boolean
     */
    public function existsUsername($username){
        $UsernameExists =(User::where('name',$username)->get()); // use model where
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
        $EmailExists =(User::where('email',$email)->get());// user mmmodel where
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
        //
    }
}
