<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use PhpParser\Node\Stmt\Return_;

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
        $perms_id = Auth::user()->perms_id;
        return view("profile.settings", ["perms_id" => $perms_id]);
    }

    public function update(Request $request,)
    {
        $id = Auth::user()->id;
        $post = User::find($id);
        $post->name = $request->name;
        $post->password = Hash::make($request->password);
        $post->save();
        return redirect("/logout");
    }
    public function existsUsername($username)
    {
        $UsernameExists = (User::where('name', $username)->get());
        if (count($UsernameExists) == 0) {
            $UsernameExists = false;
        } else {
            $UsernameExists = true;
        }
        return response()->json($UsernameExists);
    }

    /**
     * Summary of existsEmail
     *
     * Check if email is already claimed
     * and return boolean
     */
    public function existsEmail($email)
    {
        $EmailExists = (User::where('email', $email)->get());
        if (count($EmailExists) == 0) {
            $EmailExists = false;
        } else {
            $EmailExists = true;
        }
        return response()->json($EmailExists);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $id=Auth::user()->id;
        $user = User::find($id);
        $user->delete();
        return back();
    }
    public function restore($id)
    {
        User::withTrashed()
            ->where('id', $id)
            ->restore();
        return back();
    }
}
