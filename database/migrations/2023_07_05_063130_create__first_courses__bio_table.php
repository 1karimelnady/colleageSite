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
        Schema::create('First_course_Bio', function (Blueprint $table) {
            $table->id();
            $table->string('course_name');
            $table->string('course_num');
            $table->string('credit_hour_course');
            $table->string('previous_course_name');
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
        Schema::dropIfExists('First_course_Bio');
    }
};
