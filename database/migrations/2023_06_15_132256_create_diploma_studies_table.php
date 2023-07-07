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
        Schema::create('diploma_studies', function (Blueprint $table) {
            $table->id();
            $table->string('diploma_file')->nullable()->default(null);
            $table->string('graduatestudies_file')->nullable()->default(null);   
            $table->string('master_file')->nullable()->default(null);


                 
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
        Schema::dropIfExists('diploma_studies');
    }
};
