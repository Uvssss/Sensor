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
        DB::unprepared('create trigger check_data before insert on currently for each row
        begin
            if new.humid not between 0 and 100 then
                signal sqlstate "45000" set message_text = "not believeable";
            end if;
            if new.temp not between -30 and 100 then
                signal sqlstate "45000" set message_text = "not believeable";
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
        DB::unprepared('DROP TRIGGER `check_data`');
    }
};
