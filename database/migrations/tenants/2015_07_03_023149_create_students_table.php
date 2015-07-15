<?php

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
     Schema::create('students', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('file_id')->unsigned();
            $table->string('name');
            $table->string('age');
            $table->string('grade');
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
        Schema::dropIfExists('students');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
