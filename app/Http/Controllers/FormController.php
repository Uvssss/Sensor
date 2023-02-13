<?php

namespace App\Http\Controllers;

use App\Models\Forms as ModelsForms;
use Carbon\Carbon;
use Illuminate\Http\Request;
class FormController extends Controller
{
    public function form_input(Request $request)
    {
        $date = Carbon::now()->toDateTimeString();
        $post = new ModelsForms();
        $post->name=$request->name;
        $post->phone_number=$request->tel;
        $post->website=$request->url;
        $post->email=$request->email;
        $post->text=$request->text;
        $post->created_at=$date;
        $post->save();
        return redirect('/');
    }
}
