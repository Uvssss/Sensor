<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly', function (Blueprint $table) {

            $table->timestamp('month');
            $table->float('max_temp');
            $table->float('min_temp');
            $table->float('average_temp');
            $table->float('average_humid');
            $table->float('min_humid');
            $table->float('max_humid');
            $table->unsignedBigInteger("sensor_id");
            $table->foreign('sensor_id')->
            references('id')
            ->on('sensor')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monthly');
    }
};
