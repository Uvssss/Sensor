<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OperatorController extends Controller
{
    public function ShowView($column = null, $value = null)
    {
        $perms_id1 = Auth::user()->perms_id;
        if (!empty($value)) {
            $results = DB::table("users")
            ->select('users.id', "users.id as users_id", "permisions.id", "permisions.id as permision_id",
            "permisions.Status", "users.name", "users.email","users.created_at","users.updated_at")
                ->join('permisions', 'permisions.id', '=', 'users.perms_id')
                ->where('perms_id', '<', $perms_id1)
                ->where("deleted_at", "=", null)->where($column, 'Like', '%' . $value . '%')->orderBy("permision_id", "DESC")->simplePaginate(8);
        } else {
            $results = DB::table("users")
                ->select('users.id', "users.id as users_id", "permisions.id", "permisions.id as permision_id",
                "permisions.Status", "users.name", "users.email","users.created_at","users.updated_at")
                ->join('permisions', 'permisions.id', '=', 'users.perms_id')
                ->where('perms_id', '<', $perms_id1)
                ->where("deleted_at", "=", null)->orderBy("permision_id", "DESC")->simplePaginate(4);
        }
        return view("operator.all_users", ["results" => $results, "perms_id" => $perms_id1]);
    }
    public function downgrade($id)
    {
        $post = User::find($id);
        $perms = $post->perms_id;
        if ($perms == 1) {
            return redirect("/operator");
        } else {
            $post->perms_id = $perms - 1;
            $post->save();
            return redirect("/operator");
        }
    }
    public function upgrade($id)
    {
        $post = User::find($id);
        $perms = $post->perms_id;
        $post->perms_id = $perms + 1;
        $post->save();
        return redirect("/operator");
    }
    public function restore($column = null, $value = null)
    {
        $perms_id = Auth::user()->perms_id;
        if (!empty($value)) {
            $users = DB::table("users")
            ->select("users.id as users_id","permisions.id as permision_id",
            "permisions.Status", "users.name", "users.email","users.created_at","users.updated_at","users.deleted_at")
            ->join('permisions', 'permisions.id', '=', 'users.perms_id')
            ->whereRaw("deleted_at is not null")->where("users.".$column, 'Like', '%' . $value . '%')
            ->orderByDesc("users.perms_id")
            ->simplePaginate(4);
        }
        else {
        $users = DB::table("users")
            ->select('users.id', "users.id as users_id", "permisions.id", "permisions.id as permision_id",
            "permisions.Status", "users.name", "users.email","users.created_at","users.updated_at","users.deleted_at")
            ->join('permisions', 'permisions.id', '=', 'users.perms_id')
            ->whereRaw("deleted_at is not null")
            ->orderByDesc("users.perms_id")
            ->simplePaginate(4);
        }
        return view("operator.restore", ["results" => $users, "perms_id" => $perms_id]);
    }
    public function delete_user($id)
    {
        $user = User::find($id);
        $user->delete();
        return back();
    }
}
