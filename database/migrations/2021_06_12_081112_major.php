<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Major extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Tao table
        Schema::create('major', function (Blueprint $table) {
            $table->id('idMajor');
            $table->string('nameMajor',30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Xoa table
        Schema::dropIfExists('specialized');
    }
}
