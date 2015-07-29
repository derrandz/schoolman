<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->float('score');
            $table->integer('exam_id')->unsigned();
            $table->string('rating', 3);
            $table->timestamps();

            $table->foreign('exam_id')
                  ->references('id')
                  ->on('exams');
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
        Schema::drop('results');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
