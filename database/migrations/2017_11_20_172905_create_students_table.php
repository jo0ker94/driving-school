<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('studentname');
            $table->string('email');
            $table->string('password');
            $table->string('admission_no')->unique();;
            $table->integer('Id_number')->length(8)->unsigned();
            $table->integer('phone_no')->length(10)->unsigned();
            $table->integer('course_ID')->unsigned();
            $table->foreign('course_ID')->references('ID')->on('courses');
            $table->string('location');
            $table->date('start_date');
            $table->boolean('passed');
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
        Schema::dropIfExists('students');
    }
}
