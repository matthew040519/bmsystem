<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblresidence extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblresidence', function (Blueprint $table) {
            $table->id();
            $table->integer('purok_id');
            $table->integer('user_id');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->integer('age');
            $table->string('email');
            $table->string('contact_number');
            $table->string('address');
            $table->string('gender');
            $table->string('status');
            $table->string('employment_status');
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
        Schema::dropIfExists('tblresidence');
    }
}
