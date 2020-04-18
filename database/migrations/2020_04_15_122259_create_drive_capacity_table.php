<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriveCapacityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drive_capacity', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('capacity')->nullable();
            $table->bigInteger('usage')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('drive_capacity', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drive_capacity');
    }
}
