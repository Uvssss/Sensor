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
        DB::unprepared('create trigger update_weekly after insert on currently for each row
		begin
			set @sensor1=(select sensor_id from currently order by `time` DESC limit 1);
			set @sensor2=(select sensor_id from weekly order by `week` desc limit 1);
			set @days=(select left(`time`,10) from currently where @sensor1=sensor_id order by `time` DESC limit 1 );
			set @weeks=(select `week` from weekly where @sensor2=sensor_id order by `week` DESC limit 1);
			set @mintemp=(select min(temp) from currently where left(`time`,10)>= date_add(@days,interval -7 day)and @sensor1=sensor_id);
			set @maxtemp=(select max(temp) from currently where left(`time`,10)>= date_add(@days,interval -7 day)and @sensor1=sensor_id);
			set @averagetemp=(select avg(temp) from currently  where left(`time`,10)>= date_add(@days,interval -7 day)and @sensor1=sensor_id );
			set @averagehumid=(select avg(humid) from currently  where left(`time`,10)>= date_add(@days,interval -7 day)and @sensor1=sensor_id );
			set @maxhumid=(select max(humid) from currently where left(`time`,10)>= date_add(@days,interval -7 day)and @sensor1=sensor_id);
			set @minhumid=(select min(humid) from currently where left(`time`,10)>= date_add(@days,interval -7 day) and @sensor1=sensor_id);
			if datediff(@weeks,@days)<=7  and @sensor1=@sensor2 then
				update weekly
				set
					max_temp= @maxtemp,
					min_temp=@mintemp,
					average_temp=@averagetemp,
					average_humid=@averagehumid,
					min_humid=@minhumid,
					max_humid=@maxhumid where `week`=@days and @sensor2=sensor_id;
			else
				INSERT INTO `weekly`
				VALUES
					(DATE_ADD(@days,interval 7 day), @maxtemp, @mintemp, @averagetemp, @averagehumid,@minhumid,@maxhumid,@sensor1);
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
        DB::unprepared('DROP TRIGGER `update_weekly`');
    }
};
