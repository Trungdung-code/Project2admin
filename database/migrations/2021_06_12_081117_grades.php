<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Grades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Tao table
        Schema::create('grades', function (Blueprint $table) {
            $table->unsignedBigInteger('idStudent');
            $table->foreign('idStudent')->references('idStudent')->on('student');
            $table->unsignedBigInteger('idSub');
            $table->foreign('idSub')->references('idSub')->on('subject');
            $table->float('Skill1');
            $table->float('Skill2');
            $table->float('Final1');
            $table->float('Final2');
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
        Schema::dropIfExists('grades');
    }
}
