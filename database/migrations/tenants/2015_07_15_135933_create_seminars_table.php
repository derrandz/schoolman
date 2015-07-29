<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeminarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('serialcode');
            $table->integer('student_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
            $table->string('year');
            $table->string('grade');
            $table->date('starts_at');

            $table->foreign('student_id')
                  ->references('id')
                  ->on('students');

            $table->foreign('teacher_id')
                  ->references('id')
                  ->on('teachers');

            $table->timestamps('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('seminars');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
