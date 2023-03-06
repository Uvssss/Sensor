<?php

namespace App\Http\Controllers;
use App\Models\Currently;
use App\Models\Daily;
use App\Models\Hourly;
use App\Models\Monthly;
use App\Models\Sensors;
use App\Models\Weekly;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ScheduleController extends Controller
{
    public function create_data(){
        $sensors=Sensors::all();
        foreach ($sensors as $sensor) {
            $sensor_id=$sensor->id;
            $this->sensor_insert($sensor_id);
        }
    }
    public function sensor_insert($id){
        $date = Carbon::now()->toDateTimeString();
        $humid = random_int(10, 100);
        $temp=random_int(-30,100);
        $post = new Currently;
        $post->date = $date;
        $post->humid = $humid;
        $post->temp = $temp;
        $post->sensor_id =$id;
        $post->save();
        $this->hourly($id,$date);
        $this->daily($id,$date);
        $this->weekly($id,$date);
        $this->monthly($id,$date);
    }
    public function hourly($id,$date){
        $hour=substr($date,0,13);
        $avg_temp=DB::table("currently")
            ->where('sensor_id', $id)
            ->whereRaw('left(date,13) = ?', [$hour])
            ->avg('temp');
        $avg_humid=DB::table("currently")
            ->where('sensor_id', $id)
            ->whereRaw('left(date,13) = ?', [$hour])
            ->avg('humid');
        $max_temp=DB::table("currently")
            ->where('sensor_id', $id)
            ->whereRaw('left(date,13) = ?', [$hour])
            ->max('temp');
        $min_temp=DB::table("currently")
            ->where('sensor_id', $id)
            ->whereRaw('left(date,13) = ?', [$hour])
            ->min('temp');
        $max_humid=DB::table("currently")
            ->where('sensor_id', $id)
            ->whereRaw('left(date,13) = ?', [$hour])
            ->max('humid');
        $min_humid=DB::table("currently")
            ->where('sensor_id', $id)
            ->whereRaw('left(date,13) = ?', [$hour])
            ->min('humid');
        $date=Hourly::where('date',$hour)->where("sensor_id",$id)->first();
        $update=[
            'max_temp' =>$max_temp,
            'min_temp' =>$min_temp,
            'average_temp' =>$avg_temp,
            'average_humid' =>$avg_humid,
            'min_humid' =>$min_humid,
            'max_humid' =>$max_humid,
        ];
        if (empty($date)){
            $post = new Hourly;
            $post->date = $hour;
            $post->max_temp = $max_temp;
            $post->min_temp=$min_temp;
            $post->average_temp = $avg_temp;
            $post->average_humid = $avg_humid;
            $post->min_humid = $min_humid;
            $post->max_humid = $max_humid;
            $post->sensor_id = $id;
            $post->save();
        }
        else{
            DB::table("hourly")->where("sensor_id",$id)->whereRaw('left(date,13) = ?', [$hour])->update($update);
        }

    }
    public function daily($id,$date){
        $daily=substr($date,0, 10);
        $avg_temp=DB::table("currently")
            ->where('sensor_id', $id)
            ->whereRaw('left(date,10) = ?', [$daily])
            ->avg('temp');
        $avg_humid=DB::table("currently")
            ->where('sensor_id', $id)
            ->whereRaw('left(date,10) = ?', [$daily])
            ->avg('humid');
        $max_temp=DB::table("currently")
            ->where('sensor_id', $id)
            ->whereRaw('left(date,10) = ?', [$daily])
            ->max('temp');
        $min_temp=DB::table("currently")
            ->where('sensor_id', $id)
            ->whereRaw('left(date,10) = ?', [$daily])
            ->min('temp');
        $max_humid=DB::table("currently")
            ->where('sensor_id', $id)
            ->whereRaw('left(date,10) = ?', [$daily])
            ->max('humid');
        $min_humid=DB::table("currently")
            ->where('sensor_id', $id)
            ->whereRaw('left(date,10) = ?', [$daily])
            ->min('humid');
            $date=Daily::where('date',$daily)->where("sensor_id",$id)->first();
            $update=[
                'max_temp' =>$max_temp,
                'min_temp' =>$min_temp,
                'average_temp' =>$avg_temp,
                'average_humid' =>$avg_humid,
                'min_humid' =>$min_humid,
                'max_humid' =>$max_humid,
            ];
            if (empty($date)){
                $post = new Daily;
                $post->date = $daily;
                $post->max_temp = $max_temp;
                $post->min_temp=$min_temp;
                $post->average_temp = $avg_temp;
                $post->average_humid = $avg_humid;
                $post->min_humid = $min_humid;
                $post->max_humid = $max_humid;
                $post->sensor_id = $id;
                $post->save();
            }
            else{
                DB::table("daily")->where("sensor_id",$id)->whereRaw('date = ?', [$daily])->update($update);
            }
    }
    public function weekly($id,$date){
        $week=substr($date,0,  10);
        $startOfWeek=Carbon::now()->startOfWeek()->format('Y-m-d');
        $endOfWeek=Carbon::now()->endOfWeek()->format('Y-m-d');
        $avg_temp=DB::table("currently")
            ->where('sensor_id', $id)
            ->whereRaw('left(date,10) between ? and ?',[$startOfWeek, $endOfWeek])
            ->avg('temp');
        $avg_humid=DB::table("currently")
            ->where('sensor_id', $id)
            ->whereRaw('left(date,10) between ? and ?',[$startOfWeek, $endOfWeek])
            ->avg('humid');
        $max_temp=DB::table("currently")
            ->where('sensor_id', $id)
            ->whereRaw('left(date,10) between ? and ?',[$startOfWeek, $endOfWeek])
            ->max('temp');
        $min_temp=DB::table("currently")
            ->where('sensor_id', $id)
            ->whereRaw('left(date,10)between ? and ?',[$startOfWeek, $endOfWeek])
            ->min('temp');
        $max_humid=DB::table("currently")
            ->where('sensor_id', $id)
            ->whereRaw('left(date,10)between ? and ?',[$startOfWeek, $endOfWeek])
            ->max('humid');
        $min_humid=DB::table("currently")
            ->where('sensor_id', $id)
            ->whereRaw('left(date,10) between ? and ?',[$startOfWeek, $endOfWeek])
            ->min('humid');
        $date=Weekly::whereRaw('? between date and end_date', [$week])->where("sensor_id",$id)->first();
        $update=[
            'max_temp' =>$max_temp,
            'min_temp' =>$min_temp,
            'average_temp' =>$avg_temp,
            'average_humid' =>$avg_humid,
            'min_humid' =>$min_humid,
            'max_humid' =>$max_humid,
        ];
        if (empty($date)){
            $post = new Weekly;
            $post->date = $startOfWeek;
            $post->end_date = $endOfWeek;
            $post->max_temp = $max_temp;
            $post->min_temp=$min_temp;
            $post->average_temp = $avg_temp;
            $post->average_humid = $avg_humid;
            $post->min_humid = $min_humid;
            $post->max_humid = $max_humid;
            $post->sensor_id = $id;
            $post->save();
        }
        else{
            DB::table("weekly")->where("sensor_id",$id)->whereRaw('? between date and end_date ', [$week])->update($update);
        }
    }
    public function monthly($id,$date){
        $month=substr($date, 0, 7);
        $avg_temp=DB::table("currently")
            ->where('sensor_id', $id)
            ->whereRaw('left(date,7) = ?', [$month])
            ->avg('temp');
        $avg_humid=DB::table("currently")
            ->where('sensor_id', $id)
            ->whereRaw('left(date,7) = ?', [$month])
            ->avg('humid');
        $max_temp=DB::table("currently")
            ->where('sensor_id', $id)
            ->whereRaw('left(date,7) = ?', [$month])
            ->max('temp');
        $min_temp=DB::table("currently")
            ->where('sensor_id', $id)
            ->whereRaw('left(date,7) = ?', [$month])
            ->min('temp');
        $max_humid=DB::table("currently")
            ->where('sensor_id', $id)
            ->whereRaw('left(date,7) = ?', [$month])
            ->max('humid');
        $min_humid=DB::table("currently")
            ->where('sensor_id', $id)
            ->whereRaw('left(date,7) = ?', [$month])
            ->min('humid');
            $date=Monthly::where('date',$month)->where("sensor_id",$id)->first();
            $update=[
                'max_temp' =>$max_temp,
                'min_temp' =>$min_temp,
                'average_temp' =>$avg_temp,
                'average_humid' =>$avg_humid,
                'min_humid' =>$min_humid,
                'max_humid' =>$max_humid,
            ];
            if (empty($date)){
                $post = new Monthly;
                $post->date = $month;
                $post->max_temp = $max_temp;
                $post->min_temp=$min_temp;
                $post->average_temp = $avg_temp;
                $post->average_humid = $avg_humid;
                $post->min_humid = $min_humid;
                $post->max_humid = $max_humid;
                $post->sensor_id = $id;
                $post->save();
            }
            DB::table("monthly")->where("sensor_id",$id)->whereRaw('date = ? ', [$month])->update($update);
    }

}
