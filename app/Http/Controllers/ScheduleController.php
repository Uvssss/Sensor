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
use Illuminate\Support\Arr;

class ScheduleController extends Controller
{
    public function create_data(){
        $sensors=Sensors::all();
        foreach ($sensors as $sensor) {
            $sensor_id=$sensor->id;
            $this->sensor_insert($sensor_id);
        }
        // return dd($sensors);
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
        // return $this->hourly($id,$date);
        // $this->daily($id,$date);
        // $this->weekly($id,$date);
        // $this->monthly($id,$date);
    }
    public function hourly($id,$date){
        $hour=substr($date,0,13);
        $avg_temp=DB::table("currently")
            ->where('sensor_id', $id)
            ->where("date","like",$hour)
            ->avg('temp');
        $avg_humid=DB::table("currently")
            ->where('sensor_id', $id)
            ->where("date","like",$hour)
            ->avg('humid');
        $max_temp=DB::table("currently")
            ->where('sensor_id', $id)
            ->where("date","like",$hour)
            ->max('temp');
        $min_temp=DB::table("currently")
            ->where('sensor_id', $id)
            ->where("date","like",$hour)
            ->min('temp');
        $max_humid=DB::table("currently")
            ->where('sensor_id', $id)
            ->where("date","like",$hour)
            ->max('humid');
        $min_humid=DB::table("currently")
            ->where('sensor_id', $id)
            ->where("date","like",$hour)
            ->min('humid');
        return dd($avg_temp);
    }
    public function daily($id,$date){
        $daily=substr($date,0, 10);
        $avg_temp=DB::table("currently")
            ->where('sensor_id', $id)
            ->where("left(date,10)",$daily)
            ->avg('temp');
        $avg_humid=DB::table("currently")
            ->where('sensor_id', $id)
            ->where("left(date,10)",$daily)
            ->avg('humid');
        $max_temp=DB::table("currently")
            ->where('sensor_id', $id)
            ->where("left(date,10)",$daily)
            ->max('temp');
        $min_temp=DB::table("currently")
            ->where('sensor_id', $id)
            ->where("left(date,10)",$daily)
            ->min('temp');
        $max_humid=DB::table("currently")
            ->where('sensor_id', $id)
            ->where("left(date,10)",$daily)
            ->max('humid');
        $min_humid=DB::table("currently")
            ->where('sensor_id', $id)
            ->where("left(date,10)",$daily)
            ->min('humid');
        $arr=[$daily,$avg_humid,$avg_temp,$max_temp,$max_humid,$min_temp,$min_humid];
        return dd($arr);
    }
    public function weekly($id,$date){
        $week=substr($date,0,  10);
        $avg_temp=DB::table("currently")
            ->where('sensor_id', $id)
            ->where("left(date,10)",$week)
            ->avg('temp');
        $avg_humid=DB::table("currently")
            ->where('sensor_id', $id)
            ->where("left(date,10)",$week)
            ->avg('humid');
        $max_temp=DB::table("currently")
            ->where('sensor_id', $id)
            ->where("left(date,10)",$week)
            ->max('temp');
        $min_temp=DB::table("currently")
            ->where('sensor_id', $id)
            ->where("left(date,10)",$week)
            ->min('temp');
        $max_humid=DB::table("currently")
            ->where('sensor_id', $id)
            ->where("left(date,10)",$week)
            ->max('humid');
        $min_humid=DB::table("currently")
            ->where('sensor_id', $id)
            ->where("left(date,10)",$week)
            ->min('humid');
        $arr=[$week,$avg_humid,$avg_temp,$max_temp,$max_humid,$min_temp,$min_humid];
        return dd($arr);

    }
    public function monthly($id,$date){
        $month=substr($date, 0, 7);
        $avg_temp=DB::table("currently")
            ->where('sensor_id', $id)
            ->where("left(date,7)",$month)
            ->avg('temp');
        $avg_humid=DB::table("currently")
            ->where('sensor_id', $id)
            ->where("left(date,7)",$month)
            ->avg('humid');
        $max_temp=DB::table("currently")
            ->where('sensor_id', $id)
            ->where("left(date,7)",$month)
            ->max('temp');
        $min_temp=DB::table("currently")
            ->where('sensor_id', $id)
            ->where("left(date,7)",$month)
            ->min('temp');
        $max_humid=DB::table("currently")
            ->where('sensor_id', $id)
            ->where("left(date,7)",$month)
            ->max('humid');
        $min_humid=DB::table("currently")
            ->where('sensor_id', $id)
            ->where("left(date,7)",$month)
            ->min('humid');
        $arr=[$month,$avg_humid,$avg_temp,$max_temp,$max_humid,$min_temp,$min_humid];
        return dd($arr);
    }
    // create trigger update_hourly after insert on currently for each row
	// 	begin
    //     set @sensor1=(select sensor_id from currently order by `date` DESC limit 1);
    //     set @sensor2=(select sensor_id from hourly order by `date` desc limit 1);
    //     set @times=(select left(`date`,13) from currently where @sensor1=sensor_id order by `date` DESC limit 1);
    //     set @hours=(select left(`date`,13) from hourly where @sensor1=sensor_id order by `date` DESC limit 1);
    //        set @mintemp=(select min(temp) from currently where @times=left(`date`,13) and @sensor1=sensor_id);
    //     set @maxtemp=(select max(temp) from currently where @times=left(`date`,13) and @sensor1=sensor_id);
    //     set @averagetemp=(select avg(temp) from currently where @times=left(`date`,13) and @sensor1=sensor_id);
    //     set @averagehumid=(select avg(humid) from currently where @times=left(`date`,13) and @sensor1=sensor_id);
    //     set @maxhumid=(select max(humid) from currently where @times=left(`date`,13) and @sensor1=sensor_id);
    //     set @minhumid=(select min(humid) from currently where @times=left(`date`,13) and @sensor1=sensor_id);
    //     if @hours=@times and @sensor1=@sensor2 then
    //         update hourly
    //         set
    //             max_temp= @maxtemp,
    //             min_temp=@mintemp,
    //             average_temp=@averagetemp,
    //             average_humid=@averagehumid,
    //             min_humid=@minhumid,
    //             max_humid=@maxhumid where `date`=@times and sensor_id=@sensor2;
    //     else
    //     INSERT INTO `hourly`
    //         (`date`,`max_temp`,`min_temp`,`average_temp`,`average_humid`,`min_humid`,`max_humid`,`sensor_id`)
    //     VALUES
    //         (@times,@maxtemp, @mintemp, @averagetemp, @averagehumid, @minhumid,@maxhumid,@sensor1);
    //     end if;
    // end'
}
