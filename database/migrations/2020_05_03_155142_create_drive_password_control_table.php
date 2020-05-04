<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrivePasswordControlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drive_password_control', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('password')->nullable();
            $table->string('drive_code')->nullable();
            $table->timestamps();
        });

        Schema::table('drive_password_control', function (Blueprint $table) {
            $table->unsignedBigInteger('drive_id')->nullable();
            $table->foreign('drive_id')->references('id')->on('drive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drive_password_control');
    }
}
