<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\Table\Table;
use PHPUnit\Framework\Constraint\Operator;
class OperatorController extends Controller
{
    public function ShowView(){
        $id=Auth::user()->id;
        $perms_id=DB::table('users')->where('id', $id)->pluck("perms_id");
        $results = DB::table("users")->select('users.id',"users.id as users_id","permisions.id","permisions.id as permision_id","permisions.Status","users.name")->join('permisions', 'permisions.id', '=', 'users.perms_id')->where('perms_id', '<', $perms_id)->where("deleted_at","=",null)->get();
        return view("operator.all_users", ["results" => $results]);
        // return dd($results);
    }
    public function downgrade($id){
        $post=User::find($id);
        $perms=$post->perms_id;
        if($perms==1){
            return redirect("/operator");
        }
        else{
            $post->perms_id = $perms - 1;
            $post->save();
            return redirect("/operator");
        }
    }
    public function upgrade($id){
        $post=User::find($id);
        $perms=$post->perms_id;
        $post->perms_id = $perms + 1;
        $post->save();
        return redirect("/operator");
    }


}
