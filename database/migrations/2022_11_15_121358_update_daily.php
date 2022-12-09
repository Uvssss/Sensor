<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('create trigger update_daily after insert on currently for each row
		begin
			set @sensor1=(select sensor_id from currently order by `date` DESC limit 1);
			set @sensor2=(select sensor_id from daily  order by `date` desc limit 1);
			set @times=(select left(`date`,10) from currently where @sensor1=sensor_id order by `date` DESC limit 1);
			set @days=(select left(`date`,10) from daily where @sensor1=sensor_id order by `date` DESC limit 1);
   			set @mintemp=(select min(temp) from currently where @times=left(`date`,10) and @sensor1=sensor_id);
    		set @maxtemp=(select max(temp) from currently where @times=left(`date`,10) and @sensor1=sensor_id);
			set @averagetemp=(select avg(temp) from currently where @times=left(`date`,10) and @sensor1=sensor_id);
    		set @averagehumid=(select avg(humid) from currently where @times=left(`date`,10) and @sensor1=sensor_id);
    		set @maxhumid=(select max(humid) from currently where @times=left(`date`,10) and @sensor1=sensor_id);
    		set @minhumid=(select min(humid) from currently where @times=left(`date`,10) and @sensor1=sensor_id);
    		if @times=@days and @sensor1=@sensor2 then
				update daily
				set
					max_temp= @maxtemp,
					min_temp=@mintemp,
					average_temp=@averagetemp,
					average_humid=@averagehumid,
					min_humid=@minhumid,
					max_humid=@maxhumid where `date`=@times and sensor_id=@sensor2;
			else
				INSERT INTO `daily`
				VALUES
					(@times, @maxtemp, @mintemp, @averagetemp, @averagehumid, @minhumid,@maxhumid,@sensor1);
			end if;
		end');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `update_daily`');
    }
};
