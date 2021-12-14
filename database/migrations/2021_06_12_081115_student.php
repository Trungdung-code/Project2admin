<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Student extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Tao table
        Schema::create('student', function (Blueprint $table) {
            $table->id('idStudent');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('gender');
            $table->date('dob');
            $table->unsignedBigInteger('idClass');
            $table->foreign('idClass')->references('idClass')->on('classroom');
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
        Schema::dropIfExists('student');
    }
}
