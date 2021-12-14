<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Admin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Tao table
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
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
        Schema::dropIfExists('admin');
    }
}
