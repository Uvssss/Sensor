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
        Schema::create('currently', function (Blueprint $table) {

            $table->timestamp('time');
            $table->integer('humid');
            $table->float('temp');
            $table->unsignedBigInteger("sensor_id");
            $table->foreign('sensor_id')->
            references('id')
            ->on('sensor')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currently');
    }
};
