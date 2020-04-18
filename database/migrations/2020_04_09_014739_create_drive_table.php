<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drive', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('name')->nullable();
            $table->unsignedBigInteger('size')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('drive', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('drive');
    }
}
