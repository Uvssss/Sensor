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
        DB::unprepared('create trigger update_monthly after insert on currently for each row
		begin
			set @sensor1=(select sensor_id from currently order by `time` DESC limit 1);
			set @sensor2=(select sensor_id from monthly order by `month` desc limit 1);
			set @days=(select left(`time`,7) from currently where @sensor1=sensor_id order by `time` DESC limit 1 );
			set @months=(select `month` from monthly where @sensor2=sensor_id order by `month` DESC limit 1 );
    		set @mintemp=(select min(temp) from currently where @days=left(`time`,7) );
    		set @maxtemp=(select max(temp) from currently where @days=left(`time`,7));
			set @averagetemp=(select avg(temp) from currently where @days=left(`time`,7) );
    		set @averagehumid=(select avg(humid) from currently where @days=left(`time`,7) );
		    set @maxhumid=(select max(humid) from currently where @days=left(`time`,7));
		    set @minhumid=(select min(humid) from currently where @days=left(`time`,7));
    		if @days=@months and @sensor1=@sensor2 then
				update monthly
				set
					max_temp= @maxtemp,
					min_temp=@mintemp,
					average_temp=@averagetemp,
					average_humid=@averagehumid,
					min_humid=@minhumid,
					max_humid=@maxhumid where `month`=@days and @sensor2=sensor_id;
			else
				INSERT INTO `monthly`
				VALUES
					(@days, @maxtemp, @mintemp, @averagetemp, @averagehumid, @minhumid,@maxhumid,@sensor1);
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
        DB::unprepared('DROP TRIGGER `update_monthly`');
    }
};
