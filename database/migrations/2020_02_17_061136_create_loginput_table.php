<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginputTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_input', function (Blueprint $table) {
            $table->bigIncrements('log_ID');
            $table->unsignedBigInteger('event_ID');
            $table->unsignedBigInteger('user_ID');
            $table->timestamps();
            $table->string('status');
            $table->foreign('event_ID')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('user_ID')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_input');
    }
}
