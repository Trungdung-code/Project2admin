<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Subject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Tao table
        Schema::create('subject', function (Blueprint $table) {
            $table->id('idSub');
            $table->string('nameSub',30);
            $table->unsignedBigInteger('idMajor');
            $table->foreign('idMajor')->references('idMajor')->on('major');
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
        Schema::dropIfExists('subject');
    }
}
